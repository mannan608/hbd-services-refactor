@props([
    'id' => 'datepicker-' . uniqid(),
    'name',
    'label' => null,
    'placeholder' => null,
    'mode' => 'single',
    'defaultDate' => null,
    'dateFormat' => 'm/d/Y',
])

<div x-data="{
    fp: null,
    loading: null,
    init() {
        this.$nextTick(() => {
            const createPicker = (flatpickr) => {
                this.fp = flatpickr(this.$refs.input, {
                    mode: '{{ $mode }}',
                    static: true,
                    monthSelectorType: 'static',
                    dateFormat: '{{ $dateFormat }}',
                    defaultDate: @js(old($name, $defaultDate)),
                    allowInput: true,
                    clickOpens: true,
                });
            };

            if (window.loadFlatpickr) {
                this.loading = window.loadFlatpickr()
                    .then(createPicker)
                    .catch(() => {
                        this.fp = null;
                    });
                return;
            }

            if (window.flatpickr) {
                createPicker(window.flatpickr);
            }
        });
    },
    destroy() {
        if (this.fp) {
            this.fp.destroy();
            this.fp = null;
        }
    }
}" x-init="init()" x-on:destroy.window="destroy()">
    @if ($label)
        <label for="{{ $id }}" class="mb-1.5 block text-sm font-medium text-neutral-700 dark:text-neutral-400">
            {{ $label }}
        </label>
    @endif

    <div class="relative">
        <input x-ref="input" id="{{ $id }}" name="{{ $name }}" type="text"
            placeholder="{{ $placeholder ?? strtoupper($dateFormat) }}" autocomplete="off"
            {{ $attributes->merge([
                'class' =>
                    'h-11 w-full disabled:cursor-not-allowed disabled:bg-neutral-100  rounded-lg border border-neutral-300 bg-transparent px-4 py-2.5 pr-11 text-sm placeholder:text-sm text-neutral-800 placeholder:text-neutral-400 shadow-theme-xs focus:border-brand-300 focus:ring-1 focus:ring-brand-500/20 focus:outline-hidden dark:border-neutral-700 dark:bg-neutral-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800',
            ]) }} />

        <span
            class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-neutral-500 dark:text-neutral-400">
            <iconify-icon icon="lucide:calendar" class="text-base mt-2"></iconify-icon>
        </span>
    </div>

    @error($name)
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>
