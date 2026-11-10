<div class="w-full">
    @if ($label ?? false)
        <label class="block mb-2 text-xs font-bold tracking-wider text-neutral-400 uppercase">
            {{ $label }}
        </label>
    @endif

    <div x-data="{
        open: false,
        search: '',
        selected: @js(old($name, $value ?? '')),
        options: @js($options),
    
        get filteredOptions() {
            return this.options.filter(option =>
                option.text.toLowerCase().includes(this.search.toLowerCase())
            );
        },
    
        get selectedText() {
            const option = this.options.find(
                option => String(option.key) === String(this.selected)
            );
    
            return option ? option.text : '{{ $placeholder ?? 'Select Option' }}';
        }
    }" class="relative" @click.outside="open = false">

        {{-- Hidden Input --}}
        <input type="hidden" name="{{ $name }}" x-model="selected">

        {{-- Select Button --}}
        <button type="button" @click="open = !open"
            class="dark:bg-dark-900 shadow-theme-xs w-full rounded-xl border border-neutral-300 bg-transparent px-3.5 py-2.5 pr-10 text-left text-sm dark:border-neutral-700 dark:bg-neutral-900">
            <span x-text="selectedText"
                :class="selected
                    ?
                    'text-neutral-800 dark:text-white/90' :
                    'text-neutral-400 dark:text-white/30'"></span>

            <span
                class="pointer-events-none absolute top-1/2 right-4 -translate-y-1/2 transition-transform duration-200"
                :class="{ 'rotate-180': open }">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" class="text-neutral-500">
                    <path d="M5 7.5L10 12.5L15 7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </span>
        </button>

        {{-- Dropdown --}}
        <div x-show="open" x-transition style="display: none;"
            class="absolute left-0 right-0 z-50 mt-1 overflow-hidden rounded-lg border border-neutral-200 bg-white shadow-lg dark:border-neutral-700 dark:bg-neutral-900">

            {{-- Search --}}
            <div class="border-b border-neutral-200 p-2 dark:border-neutral-700">
                <input type="text" x-model="search" @click.stop placeholder="Search your options..."
                    class="h-10 placeholder:text-neutral-400 w-full rounded-xl border border-neutral-300 bg-transparent px-3 text-sm text-neutral-800 outline-none focus:border-brand-500 dark:border-neutral-700 dark:text-white">
            </div>

            {{-- Options --}}
            <div class="max-h-60 overflow-y-auto p-1">

                <template x-for="option in filteredOptions" :key="option.key">
                    <button type="button"
                        @click="
                            selected = option.key;
                            open = false;
                            search = '';
                        "
                        class="block w-full rounded-md px-3 py-2 text-left text-sm text-neutral-700 hover:bg-neutral-100 dark:text-neutral-300 dark:hover:bg-neutral-800"
                        x-text="option.text"></button>
                </template>

                {{-- No Results --}}
                <div x-show="filteredOptions.length === 0" class="px-3 py-3 text-center text-sm text-neutral-500">
                    No results found
                </div>

            </div>
        </div>

    </div>

    {{-- Validation Error --}}
    @error($name)
        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
    @enderror
</div>
