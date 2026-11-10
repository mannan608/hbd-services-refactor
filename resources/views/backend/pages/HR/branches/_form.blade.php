
<div class="space-y-6">

    {{-- Branch Name --}}
    <div>
        <label for="name"
            class="mb-2 block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400">
            Branch Name <span class="text-red-500">*</span>
        </label>

        <input type="text"
            name="name"
            id="name"
            value="{{ old('name', $branch->name ?? '') }}"
            maxlength="191"
            placeholder="e.g., Dhaka Head Office"
            required
            autofocus
            class="h-11 w-full rounded-lg border border-neutral-300 bg-transparent px-4 py-2.5 text-sm text-neutral-800 shadow-theme-xs placeholder:text-neutral-400 focus:border-brand-300 focus:outline-none focus:ring-3 focus:ring-brand-500/10 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white/90">

        @error('name')
            <p class="mt-1.5 text-xs font-medium text-red-600 dark:text-red-400">
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- Branch Code --}}
    <div>
        <label for="code"
            class="mb-2 block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400">
            Branch Code
        </label>

        <input type="text"
            name="code"
            id="code"
            value="{{ old('code', $branch->code ?? '') }}"
            maxlength="191"
            placeholder="e.g., DHAKA-01"
            class="h-11 w-full rounded-lg border border-neutral-300 bg-transparent px-4 py-2.5 text-sm font-medium text-neutral-800 shadow-theme-xs placeholder:text-neutral-400 focus:border-brand-300 focus:outline-none focus:ring-3 focus:ring-brand-500/10 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white/90">

        @error('code')
            <p class="mt-1.5 text-xs font-medium text-red-600 dark:text-red-400">
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- Branch Status --}}
    <div>
        <div class="flex items-center justify-between gap-4 rounded-xl border border-neutral-200 bg-neutral-50/50 p-4 dark:border-neutral-800 dark:bg-neutral-900/50">

            <div>
                <label for="is_active"
                    class="cursor-pointer text-sm font-semibold text-neutral-800 dark:text-neutral-200">
                    Branch Status
                </label>

                <p class="mt-1 text-xs text-neutral-500 dark:text-neutral-400">
                    Enable or disable this branch in the system.
                </p>
            </div>

            <label class="relative inline-flex shrink-0 cursor-pointer items-center">
                <input type="hidden" name="is_active" value="0">

                <input type="checkbox"
                    name="is_active"
                    value="1"
                    id="is_active"
                    class="peer sr-only"
                    {{ (string) old('is_active', isset($branch) ? (int) $branch->is_active : 1) === '1' ? 'checked' : '' }}>

                <span class="h-6 w-11 rounded-full bg-neutral-300 transition-colors after:absolute after:left-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-neutral-300 after:bg-white after:transition-transform peer-checked:bg-brand-600 peer-checked:after:translate-x-5 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-brand-500/20 dark:bg-neutral-700">
                </span>
            </label>
        </div>

        @error('is_active')
            <p class="mt-1.5 text-xs font-medium text-red-600 dark:text-red-400">
                {{ $message }}
            </p>
        @enderror
    </div>

</div>
