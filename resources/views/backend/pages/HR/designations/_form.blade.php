<div class="space-y-6">

    {{-- Name & Code --}}
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

        {{-- Designation Name --}}
        <div>
            <label for="name"
                class="mb-2 block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400">
                Designation Name <span class="text-red-500">*</span>
            </label>

            <input type="text" name="name" id="name" value="{{ old('name', $designation->name ?? '') }}"
                class="h-11 w-full rounded-lg border border-neutral-300 bg-transparent px-4 py-2.5 text-sm text-neutral-800 shadow-theme-xs placeholder:text-neutral-400 focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 focus:outline-hidden dark:border-neutral-700 dark:bg-neutral-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"
                placeholder="e.g., Software Engineer, HR Manager" required>

            @error('name')
                <p class="mt-1.5 text-xs font-medium text-red-600 dark:text-red-400">
                    {{ $message }}
                </p>
            @enderror
        </div>

        {{-- Designation Code --}}
        <div>
            <label for="code"
                class="mb-2 block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400">
                Designation Code
            </label>

            <input type="text" name="code" id="code" value="{{ old('code', $designation->code ?? '') }}"
                class="h-11 w-full rounded-lg border border-neutral-300 bg-transparent px-4 py-2.5 font-mono text-sm uppercase text-neutral-800 shadow-theme-xs placeholder:text-neutral-400 focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 focus:outline-hidden dark:border-neutral-700 dark:bg-neutral-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"
                placeholder="e.g., SWE, HRM, CTO">

            @error('code')
                <p class="mt-1.5 text-xs font-medium text-red-600 dark:text-red-400">
                    {{ $message }}
                </p>
            @enderror
        </div>

    </div>

    {{-- Level & Sort Order --}}
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

        {{-- Designation Level --}}
        <div>
            <label for="level"
                class="mb-2 block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400">
                Designation Level
            </label>

            <input type="number" name="level" id="level" value="{{ old('level', $designation->level ?? '') }}"
                min="1" step="1"
                class="h-11 w-full rounded-lg border border-neutral-300 bg-transparent px-4 py-2.5 text-sm text-neutral-800 shadow-theme-xs placeholder:text-neutral-400 focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 focus:outline-hidden dark:border-neutral-700 dark:bg-neutral-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"
                placeholder="e.g., 1, 2, 3">

            <p class="mt-1.5 text-xs text-neutral-500 dark:text-neutral-400">
                Represents the hierarchy level of this designation.
            </p>

            @error('level')
                <p class="mt-1.5 text-xs font-medium text-red-600 dark:text-red-400">
                    {{ $message }}
                </p>
            @enderror
        </div>

    </div>

    {{-- Description --}}
    <div>
        <label for="description"
            class="mb-2 block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400">
            Description
        </label>

        <textarea name="description" id="description" rows="4"
            class="w-full rounded-lg border border-neutral-300 bg-transparent px-4 py-3 text-sm text-neutral-800 shadow-theme-xs placeholder:text-neutral-400 focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 focus:outline-hidden dark:border-neutral-700 dark:bg-neutral-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"
            placeholder="Describe the responsibilities and scope of this designation...">{{ old('description', $designation->description ?? '') }}</textarea>

        @error('description')
            <p class="mt-1.5 text-xs font-medium text-red-600 dark:text-red-400">
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- Active Status --}}
    <div class="pt-2">
        <div
            class="flex items-center justify-between rounded-xl border border-neutral-200 bg-neutral-50/30 p-4 dark:border-neutral-800 dark:bg-neutral-900/30">

            <div class="space-y-0.5">
                <label for="is_active"
                    class="cursor-pointer text-sm font-semibold text-neutral-800 dark:text-neutral-200">
                    Designation Status
                </label>

                <p class="text-xs text-neutral-500 dark:text-neutral-400">
                    Enable or disable this designation for new employment assignments.
                </p>
            </div>

            <label class="relative inline-flex cursor-pointer items-center">
                <input type="hidden" name="is_active" value="0">

                <input type="checkbox" name="is_active" value="1" id="is_active" class="peer sr-only"
                    {{ old('is_active', $designation->is_active ?? true) ? 'checked' : '' }}>

                <div
                    class="relative h-6 w-11 rounded-full bg-neutral-200 transition-colors after:absolute after:left-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-neutral-300 after:bg-white after:transition-transform after:content-[''] peer-checked:bg-brand-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-3 peer-focus:ring-brand-500/20 dark:bg-neutral-700 dark:after:border-neutral-600">
                </div>
            </label>

        </div>

        @error('is_active')
            <p class="mt-1.5 text-xs font-medium text-red-600 dark:text-red-400">
                {{ $message }}
            </p>
        @enderror
    </div>

</div>