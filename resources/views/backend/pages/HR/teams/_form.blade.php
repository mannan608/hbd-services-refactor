
<div class="space-y-6">

    {{-- Department Selection --}}
    <div>
        <label for="department_id"
            class="mb-2 block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400">
            Department <span class="text-red-500">*</span>
        </label>

        <select name="department_id" id="department_id" required
            class="h-11 w-full rounded-lg border border-neutral-300 bg-white px-4 text-sm text-neutral-800 shadow-theme-xs focus:border-brand-300 focus:outline-none focus:ring-3 focus:ring-brand-500/10 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white/90">

            <option value="">Select Department</option>

            @foreach ($departments as $department)
                <option value="{{ $department->id }}"
                    {{ (string) old('department_id', $team->department_id ?? '') === (string) $department->id ? 'selected' : '' }}>
                    {{ $department->name }}
                </option>
            @endforeach
        </select>

        @error('department_id')
            <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Team Name --}}
    <div>
        <label for="name"
            class="mb-2 block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400">
            Team Name <span class="text-red-500">*</span>
        </label>

        <input type="text" name="name" id="name"
            value="{{ old('name', $team->name ?? '') }}"
            placeholder="e.g., Software Development Team"
            maxlength="191"
            required
            class="h-11 w-full rounded-lg border border-neutral-300 bg-transparent px-4 py-2.5 text-sm text-neutral-800 shadow-theme-xs placeholder:text-neutral-400 focus:border-brand-300 focus:outline-none focus:ring-3 focus:ring-brand-500/10 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white/90">

        @error('name')
            <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Team Lead --}}
    <div>
        <label for="team_lead_id"
            class="mb-2 block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400">
            Team Lead
        </label>

        <select name="team_lead_id" id="team_lead_id"
            class="h-11 w-full rounded-lg border border-neutral-300 bg-white px-4 text-sm text-neutral-800 shadow-theme-xs focus:border-brand-300 focus:outline-none focus:ring-3 focus:ring-brand-500/10 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white/90">

            <option value="">No Team Lead Assigned</option>

            @foreach ($teamLeads as $user)
                <option value="{{ $user->id }}"
                    {{ (string) old('team_lead_id', $team->team_lead_id ?? '') === (string) $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>

        @error('team_lead_id')
            <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
        @enderror
    </div>

</div>
