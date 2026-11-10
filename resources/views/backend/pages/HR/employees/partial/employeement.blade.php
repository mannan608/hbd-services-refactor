@php
    $employment = $employee?->currentEmployment;

    $mainBranchId = $branches->first(fn($branch) => (bool) ($branch->is_head_office ?? false))?->id;

    $branchId = old('branch_id', $employment?->branch_id ?? $mainBranchId);

    $departmentId = old('department_id', $employment?->department_id);
    $teamId = old('team_id', $employment?->team_id);
    $designationId = old('designation_id', $employment?->designation_id);
@endphp

<section class="rounded-2xl border border-neutral-200/80 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900"
    x-data="{
        branchId: @js((string) ($branchId ?? '')),
        departmentId: @js((string) ($departmentId ?? '')),
        teamId: @js((string) ($teamId ?? '')),
        designationId: @js((string) ($designationId ?? '')),
    
        departments: @js(
    $departments
        ->map(
            fn($department) => [
                'id' => (string) $department->id,
                'name' => $department->name,
                'branch_id' => (string) $department->branch_id,
            ],
        )
        ->values(),
),
    
        teams: @js(
    $teams
        ->map(
            fn($team) => [
                'id' => (string) $team->id,
                'name' => $team->name,
                'department_id' => (string) $team->department_id,
            ],
        )
        ->values(),
),
    
        get filteredDepartments() {
            return this.departments.filter(
                department =>
                !this.branchId ||
                department.branch_id === this.branchId
            );
        },
    
        get filteredTeams() {
            return this.teams.filter(
                team =>
                !this.departmentId ||
                team.department_id === this.departmentId
            );
        },
    
        branchChanged() {
            const department = this.departments.find(
                item => item.id === this.departmentId
            );
    
            if (
                department &&
                this.branchId &&
                department.branch_id !== this.branchId
            ) {
                this.departmentId = '';
                this.teamId = '';
                return;
            }
    
            const team = this.teams.find(
                item => item.id === this.teamId
            );
    
            if (
                team &&
                this.departmentId &&
                team.department_id !== this.departmentId
            ) {
                this.teamId = '';
            }
        },
    
        departmentChanged() {
            const department = this.departments.find(
                item => item.id === this.departmentId
            );
    
            if (
                department &&
                this.branchId &&
                department.branch_id !== this.branchId
            ) {
                this.departmentId = '';
                this.teamId = '';
                return;
            }
    
            const team = this.teams.find(
                item => item.id === this.teamId
            );
    
            if (
                team &&
                team.department_id !== this.departmentId
            ) {
                this.teamId = '';
            }
        },
    
        teamChanged() {
            if (!this.teamId) return;
    
            const team = this.teams.find(
                item => item.id === this.teamId
            );
    
            if (!team) return;
    
            const department = this.departments.find(
                item => item.id === team.department_id
            );
    
            if (!department) {
                this.teamId = '';
                return;
            }
    
            if (
                this.branchId &&
                department.branch_id !== this.branchId
            ) {
                this.teamId = '';
                return;
            }
    
            if (
                this.departmentId &&
                team.department_id !== this.departmentId
            ) {
                this.teamId = '';
                return;
            }
    
            this.departmentId = department.id;
            this.branchId = department.branch_id;
        },
    
        init() {
            this.branchChanged();
        }
    }">
    {{-- Header --}}
    <div class="border-b border-neutral-100 bg-neutral-50/50 px-6 py-4 dark:border-neutral-800 dark:bg-neutral-800/50">
        <h2 class="text-base font-semibold text-neutral-900 dark:text-white">
            Employment Information
        </h2>

        <p class="text-xs text-neutral-500 dark:text-neutral-400">
            Assign the employee's branch, department, team, designation,
            and employment details.
        </p>
    </div>

    <div class="space-y-6 p-6">

        {{-- Employee Code --}}
        <div>
            <label for="employee_code" class="mb-1.5 block text-sm font-medium text-neutral-700 dark:text-neutral-400">
                Employee Code <span class="text-red-500">*</span>
            </label>

            <input type="text" id="employee_code" name="employee_code"
                value="{{ old('employee_code', $employment?->employee_code) }}" required maxlength="50"
                placeholder="e.g. EMP-001"
                class="h-11 w-full placeholder:text-slate-400 rounded-lg border border-neutral-300 bg-white px-4 text-sm text-neutral-800 focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white">

            @error('employee_code')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        {{-- Branch and Department --}}
        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

            {{-- Branch --}}
            <div>
                <label for="branch_id" class="mb-1.5 block text-sm font-medium text-neutral-700 dark:text-neutral-400">
                    Branch
                </label>

                <select id="branch_id" name="branch_id" x-model="branchId" @change="branchChanged()"
                    class="h-11 w-full rounded-lg border border-neutral-300 bg-white px-4 text-sm text-neutral-800 focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white">
                    <option value="">Select Branch</option>

                    @foreach ($branches as $branch)
                        <option value="{{ $branch->id }}">
                            {{ $branch->name }}
                            @if ($branch->code === 'DHK-HO')
                                (Main Branch)
                            @endif
                        </option>
                    @endforeach
                </select>

                @error('branch_id')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Department --}}
            <div>
                <label for="department_id"
                    class="mb-1.5 block text-sm font-medium text-neutral-700 dark:text-neutral-400">
                    Department
                </label>

                <select id="department_id" name="department_id" x-model="departmentId" @change="departmentChanged()"
                    :disabled="!branchId"
                    class="h-11 w-full rounded-lg border border-neutral-300 bg-white px-4 text-sm text-neutral-800 focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 disabled:cursor-not-allowed disabled:opacity-60 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white">
                    <option value="">No Department</option>

                    <template x-for="department in filteredDepartments" :key="department.id">
                        <option :value="department.id" x-text="department.name"></option>
                    </template>
                </select>

                @error('department_id')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Team and Designation --}}
        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

            {{-- Team --}}
            <div>
                <label for="team_id" class="mb-1.5 block text-sm font-medium text-neutral-700 dark:text-neutral-400">
                    Team
                </label>

                <select id="team_id" name="team_id" x-model="teamId" @change="teamChanged()" :disabled="!departmentId"
                    class="h-11 w-full rounded-lg border border-neutral-300 bg-white px-4 text-sm text-neutral-800 focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 disabled:cursor-not-allowed disabled:opacity-60 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white">
                    <option value="">No Team</option>

                    <template x-for="team in filteredTeams" :key="team.id">
                        <option :value="team.id" x-text="team.name"></option>
                    </template>
                </select>

                @error('team_id')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Designation --}}
            <div>
                <label for="designation_id"
                    class="mb-1.5 block text-sm font-medium text-neutral-700 dark:text-neutral-400">
                    Designation <span class="text-red-500">*</span>
                </label>

                <select id="designation_id" name="designation_id" x-model="designationId" required
                    class="h-11 w-full rounded-lg border border-neutral-300 bg-white px-4 text-sm text-neutral-800 focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white">
                    <option value="">Select Designation</option>

                    @foreach ($designations as $designation)
                        <option value="{{ $designation->id }}">
                            {{ $designation->name }}
                        </option>
                    @endforeach
                </select>

                @error('designation_id')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Work Type, Status and Joining Date --}}
        <div class="grid grid-cols-1 gap-5 md:grid-cols-3">

            <x-form.select-input name="work_type" label="Work Type" :options="[
                'onsite' => 'Onsite',
                'remote' => 'Remote',
                'hybrid' => 'Hybrid',
            ]"
                value="{{ old('work_type', $employment?->work_type ?? 'onsite') }}" />

            <x-form.select-input name="employment_status" label="Employment Status" :options="[
                'probation' => 'Probation',
                'permanent' => 'Permanent',
                'resigned' => 'Resigned',
                'terminated' => 'Terminated',
            ]"
                value="{{ old('employment_status', $employment?->employment_status ?? 'probation') }}" />

            <x-form.date-picker name="joining_date" label="Joining Date" type="date"
                value="{{ old('joining_date', $employment?->joining_date?->format('Y-m-d')) }}"
                placeholder="YYYY-MM-DD" />
        </div>

        <div>
            <x-form.multi-select name="weekend_days" label="Weekend Days" :options="[
                'monday' => 'Monday',
                'tuesday' => 'Tuesday',
                'wednesday' => 'Wednesday',
                'thursday' => 'Thursday',
                'friday' => 'Friday',
                'saturday' => 'Saturday',
                'sunday' => 'Sunday',
            ]" :selected="old('weekend_days', $employment?->weekend_days ?? ['saturday'])" />
        </div>       
    </div>
</section>
