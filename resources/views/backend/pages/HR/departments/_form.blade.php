{{-- Clean, Modern Form Fields --}}
<div class="space-y-6">

    <!-- Branch Selection (If Branches Exist) -->
    @if (isset($branches) && count($branches) > 0)
        <div>
            <label
                class="block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400 mb-2">
                Branch
            </label>
            <select name="branch_id"
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-neutral-300 bg-transparent px-4 py-2.5 text-sm text-neutral-800 focus:ring-3 focus:outline-hidden dark:border-neutral-700 dark:bg-neutral-900 dark:text-white/90">
                <option value="">Select Branch (Optional)</option>
                @foreach ($branches as $branch)
                    <option value="{{ $branch->id }}"
                        {{ old('branch_id', $department->branch_id ?? '') == $branch->id ? 'selected' : '' }}>
                        {{ $branch->name }}
                    </option>
                @endforeach
            </select>
            @error('branch_id')
                <p class="mt-1.5 text-xs text-red-600 dark:text-red-400 font-medium">{{ $message }}</p>
            @enderror
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Department Name -->
        <div>
            <label
                class="block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400 mb-2">
                Department Name <span class="text-red-500">*</span>
            </label>
            <input type="text" name="name" value="{{ old('name', $department->name ?? '') }}"
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-neutral-300 bg-transparent px-4 py-2.5 text-sm text-neutral-800 placeholder:text-neutral-400 focus:ring-3 focus:outline-hidden dark:border-neutral-700 dark:bg-neutral-900 dark:text-white/90 dark:placeholder:text-white/30"
                placeholder="e.g., Engineering, HR, Marketing" required>
            @error('name')
                <p class="mt-1.5 text-xs text-red-600 dark:text-red-400 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <!-- Department Code -->
        <div>
            <label
                class="block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400 mb-2">
                Department Code
            </label>
            <input type="text" name="code" value="{{ old('code', $department->code ?? '') }}"
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-neutral-300 bg-transparent px-4 py-2.5 text-sm text-neutral-800 font-mono uppercase placeholder:text-neutral-400 focus:ring-3 focus:outline-hidden dark:border-neutral-700 dark:bg-neutral-900 dark:text-white/90 dark:placeholder:text-white/30"
                placeholder="e.g., IT, HR, SALES">
            @error('code')
                <p class="mt-1.5 text-xs text-red-600 dark:text-red-400 font-medium">{{ $message }}</p>
            @enderror
        </div>
    </div>
 

    <div>
        <label class="block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400 mb-2">
            Description
        </label>
        <textarea name="description" rows="4"
            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-neutral-300 bg-transparent px-4 py-3 text-sm text-neutral-800 placeholder:text-neutral-400 focus:ring-3 focus:outline-hidden dark:border-neutral-700 dark:bg-neutral-900 dark:text-white/90 dark:placeholder:text-white/30"
            placeholder="Provide a brief description of this department's responsibilities...">{{ old('description', $department->description ?? '') }}</textarea>
        @error('description')
            <p class="mt-1.5 text-xs text-red-600 dark:text-red-400 font-medium">{{ $message }}</p>
        @enderror
    </div>

    <!-- Active Status Card Switch Option -->
    <div class="pt-2">
        <div
            class="flex items-center justify-between p-4 rounded-xl border border-neutral-200 dark:border-neutral-800 bg-neutral-50/30 dark:bg-neutral-900/30">
            <div class="space-y-0.5">
                <label for="is_active"
                    class="text-sm font-semibold text-neutral-800 dark:text-neutral-200 cursor-pointer">
                    Department Status
                </label>
                <p class="text-xs text-neutral-500 dark:text-neutral-400">
                    Enable or disable this department's visibility across system modules.
                </p>
            </div>

            <label class="relative inline-flex items-center cursor-pointer">
                <!-- Hidden unchecked value so '0' is sent when unticked -->
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" value="1" id="is_active" class="sr-only peer"
                    {{ old('is_active', $department->is_active ?? true) ? 'checked' : '' }}>
                <div
                    class="w-11 h-6 bg-neutral-200 peer-focus:outline-none rounded-full peer dark:bg-neutral-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-neutral-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-neutral-600 peer-checked:bg-brand-600">
                </div>
            </label>
        </div>
        @error('is_active')
            <p class="mt-1.5 text-xs text-red-600 dark:text-red-400 font-medium">{{ $message }}</p>
        @enderror
    </div>
</div>
