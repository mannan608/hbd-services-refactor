@props([
    'name',
    'label' => null,
    'options' => [],
    'selected' => [],
    'placeholder' => 'Select options...',
    'required' => false,
    'id' => null,
])

@php
    $fieldName = str_replace('[]', '', $name);

    $items = collect($options)
        ->map(function ($item, $key) {
            // Associative array:
            // 'Australia' => 'Australia'
            if (is_string($key) && !is_array($item) && !is_object($item)) {
                return [
                    'id' => $key,
                    'name' => $item,
                ];
            }

            // Normal array/object:
            // ['id' => 1, 'name' => 'Australia']
            return [
                'id' => data_get($item, 'id'),
                'name' => data_get($item, 'name'),
            ];
        })
        ->filter(fn ($item) => $item['id'] !== null && $item['name'] !== null)
        ->values();
@endphp

<div
    x-data="{
    open: false,
    search: '',
    options: @js($items),
    selected: @js((array) old($fieldName, $selected ?? [])),
    selectName: @js($fieldName),
    multiSelectId: @js($id ?? $fieldName),

    init() {
        window.addEventListener('multi-select:update', (event) => {
            const payload = event.detail || {};

            if (
                payload.name &&
                payload.name !== this.selectName &&
                payload.id !== this.multiSelectId
            ) {
                return;
            }

            if (Array.isArray(payload.options)) {
                this.options = payload.options;
            }

            if (Array.isArray(payload.selected)) {
                this.selected = payload.selected;
            }

            if (typeof payload.placeholder === 'string') {
                this.placeholder = payload.placeholder;
            }
        });
    },

    toggle(id) {
        if (this.selected.includes(id)) {
            this.selected = this.selected.filter(i => i != id);
        } else {
            this.selected.push(id);
        }
    },

    selectedName(id) {
        let item = this.options.find(x => x.id == id);
        return item ? item.name : '';
    },

    filteredOptions() {
        if (this.search == '') return this.options;

        return this.options.filter(item =>
            item.name.toLowerCase().includes(this.search.toLowerCase())
        );
    },

    isSelected(id) {
        return this.selected.includes(id);
    },

    selectAll() {
        this.selected = this.options.map(x => x.id);
    },

    clearAll() {
        this.selected = [];
    }
}"
    class="w-full"
    data-multi-select-name="{{ $fieldName }}"
    data-multi-select-id="{{ $id ?? $fieldName }}"
>

    @if($label)
        <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <div class="relative" @click.away="open=false">

        {{-- Hidden Inputs --}}
        <template x-for="id in selected" :key="id">
            <input
                type="hidden"
                name="{{ str_replace('[]','',$name) }}[]"
                :value="id"
            >
        </template>

        {{-- Select Box --}}
        <div
            @click="open=!open"
            class="flex min-h-[44px] cursor-pointer flex-wrap items-center gap-2 rounded-lg border border-slate-300 bg-white px-3 py-2 dark:border-slate-700 dark:bg-slate-900"
        >

            <template x-if="selected.length==0">
                <span class="text-slate-400 text-sm">
                    {{ $placeholder }}
                </span>
            </template>

            <template x-for="id in selected" :key="id">

                <span
                    class="flex items-center rounded-full bg-slate-100 px-3 py-1 text-sm dark:bg-slate-800"
                >

                    <span x-text="selectedName(id)"></span>

                    <button
                        type="button"
                        @click.stop="toggle(id)"
                        class="ml-2 text-red-500"
                    >
                        ✕
                    </button>

                </span>

            </template>

            <div class="ml-auto">

                <svg
                    class="h-5 w-5 transition" width="20" height="20"
                    :class="open ? 'rotate-180':''"
                    fill="none"
                    stroke="#98a2b3"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.5"
                        d="M19 9l-7 7-7-7"
                    />
                </svg>               

            </div>

        </div>

        {{-- Dropdown --}}
        <div
            x-show="open"
            x-transition
            class="absolute z-50 mt-2 w-full rounded-lg border border-slate-200 bg-white shadow-xl dark:border-slate-700 dark:bg-slate-900"
        >

            {{-- Search --}}
            <div class="p-2">

                <input
                    x-model="search"
                    type="text"
                    placeholder="Search your options..."
                    class="w-full rounded-md placeholder:text-neutral-400 border border-slate-300 px-3 py-2 text-sm focus:outline-none dark:border-slate-700 dark:bg-slate-800"
                >

            </div>

            {{-- Buttons --}}
            <div class="flex justify-between border-b px-3 py-2">

                <button
                    type="button"
                    class="text-sm text-blue-600"
                    @click="selectAll()"
                >
                    Select All
                </button>

                <button
                    type="button"
                    class="text-sm text-red-600"
                    @click="clearAll()"
                >
                    Clear
                </button>

            </div>

            {{-- Options --}}
            <div class="max-h-60 overflow-y-auto">

                <template
                    x-for="option in filteredOptions()"
                    :key="option.id"
                >

                    <div
                        @click="toggle(option.id)"
                        class="text-sm flex cursor-pointer items-center justify-between px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-800"
                    >

                        <span x-text="option.name"></span>

                        <svg
                            x-show="isSelected(option.id)"
                            class="h-5 w-5 text-green-600"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 13l4 4L19 7"
                            />
                        </svg>

                    </div>

                </template>

            </div>

        </div>

    </div>

    @error($fieldName)
        <p class="mt-1 text-sm text-red-600">
            {{ $message }}
        </p>
    @enderror

</div>
