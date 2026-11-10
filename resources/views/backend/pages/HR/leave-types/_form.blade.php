@extends('backend.layouts.app')

@section('content')
    @php
        $isEdit = isset($leaveType->id);
        $role = request()->route('role');
    @endphp

    <div class="mx-auto max-w-4xl pb-12"
        x-data="{
            canCarryForward: {{ old('can_carry_forward', $isEdit ? $leaveType->can_carry_forward : false) ? 'true' : 'false' }}
        }"
    >
        {{-- Header Section --}}
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-800 dark:text-white">
                    {{ $isEdit ? 'Edit Leave Type' : 'Create Leave Type' }}
                </h1>
                <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                    {{ $isEdit ? 'Update configuration and rules for this leave type.' : 'Add a new leave type configuration for your organization.' }}
                </p>
            </div>

            <a href="{{ role_route('role.leave-types.index', ['role' => $role]) }}"
                class="inline-flex h-10 items-center justify-center gap-2 rounded-lg border border-neutral-300 px-4 text-sm font-semibold text-neutral-700 hover:bg-neutral-50 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800">
                <span aria-hidden="true">&larr;</span> Back to Leave Types
            </a>
        </div>

        {{-- Form Container --}}
        <div class="overflow-hidden rounded-2xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900">

            <div class="border-b border-neutral-200 px-6 py-5 dark:border-neutral-800">
                <h2 class="text-base font-semibold text-neutral-800 dark:text-white">
                    Leave Type Information
                </h2>
                <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                    Enter the basic details and quantitative limits.
                </p>
            </div>

            <form action="{{ $isEdit ? role_route('role.leave-types.update', ['role' => $role, 'leave_type' => $leaveType->id]) : role_route('role.leave-types.store', ['role' => $role]) }}"
                  method="POST"
                  class="p-6 space-y-6"
            >
                @csrf
                @if($isEdit)
                    @method('PATCH')
                @endif

                {{-- Row 1: Name & Slug --}}
                <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">
                    {{-- Name --}}
                    <div>
                        <label for="name"
                            class="mb-2 block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400">
                            Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                            name="name"
                            id="name"
                            value="{{ old('name', $leaveType->name ?? '') }}"
                            placeholder="e.g., Annual Leave"
                            required
                            autofocus
                            class="h-11 w-full rounded-lg border border-neutral-300 bg-transparent px-4 py-2.5 text-sm text-neutral-800 shadow-theme-xs placeholder:text-neutral-400 focus:border-brand-300 focus:outline-none focus:ring-3 focus:ring-brand-500/10 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white/90">
                        @error('name')
                            <p class="mt-1.5 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Slug --}}
                    <div>
                        <label for="slug"
                            class="mb-2 block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400">
                            Slug
                        </label>
                        <input type="text"
                            name="slug"
                            id="slug"
                            value="{{ old('slug', $leaveType->slug ?? '') }}"
                            placeholder="e.g., annual-leave"
                            class="h-11 w-full rounded-lg border border-neutral-300 bg-transparent px-4 py-2.5 text-sm text-neutral-800 shadow-theme-xs placeholder:text-neutral-400 focus:border-brand-300 focus:outline-none focus:ring-3 focus:ring-brand-500/10 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white/90">
                        <p class="mt-1 text-xs text-neutral-500 dark:text-neutral-400">Example: annual-leave, sick-leave</p>
                        @error('slug')
                            <p class="mt-1.5 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Row 2: Max Days & Description --}}
                <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">
                    {{-- Max Days Per Year --}}
                    <div>
                        <label for="max_days_per_year"
                            class="mb-2 block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400">
                            Maximum Days Per Year
                        </label>
                        <input type="number"
                            name="max_days_per_year"
                            id="max_days_per_year"
                            min="0"
                            step="0.5"
                            value="{{ old('max_days_per_year', $leaveType->max_days_per_year ?? '') }}"
                            placeholder="e.g., 14"
                            class="h-11 w-full rounded-lg border border-neutral-300 bg-transparent px-4 py-2.5 text-sm text-neutral-800 shadow-theme-xs placeholder:text-neutral-400 focus:border-brand-300 focus:outline-none focus:ring-3 focus:ring-brand-500/10 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white/90">
                        @error('max_days_per_year')
                            <p class="mt-1.5 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div>
                        <label for="description"
                            class="mb-2 block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400">
                            Description
                        </label>
                        <input type="text"
                            name="description"
                            id="description"
                            value="{{ old('description', $leaveType->description ?? '') }}"
                            placeholder="Brief description of this leave policy"
                            class="h-11 w-full rounded-lg border border-neutral-300 bg-transparent px-4 py-2.5 text-sm text-neutral-800 shadow-theme-xs placeholder:text-neutral-400 focus:border-brand-300 focus:outline-none focus:ring-3 focus:ring-brand-500/10 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white/90">
                        @error('description')
                            <p class="mt-1.5 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Leave Rules Section --}}
                <div class="pt-4 border-t border-neutral-200 dark:border-neutral-800">
                    <h3 class="text-base font-semibold text-neutral-800 dark:text-white mb-4">Leave Rules & Settings</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        
                        {{-- Paid Leave Switch --}}
                        <div class="flex items-center justify-between gap-4 rounded-xl border border-neutral-200 bg-neutral-50/50 p-4 dark:border-neutral-800 dark:bg-neutral-900/50">
                            <div>
                                <label for="is_paid" class="cursor-pointer text-sm font-semibold text-neutral-800 dark:text-neutral-200">
                                    Paid Leave
                                </label>
                                <p class="mt-1 text-xs text-neutral-500 dark:text-neutral-400">Indicates if employees receive salary during this leave.</p>
                            </div>
                            <label class="relative inline-flex shrink-0 cursor-pointer items-center">
                                <input type="hidden" name="is_paid" value="0">
                                <input type="checkbox"
                                    name="is_paid"
                                    value="1"
                                    id="is_paid"
                                    class="peer sr-only"
                                    {{ (string) old('is_paid', $isEdit ? (int) $leaveType->is_paid : 1) === '1' ? 'checked' : '' }}>
                                <span class="h-6 w-11 rounded-full bg-neutral-300 transition-colors after:absolute after:left-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-neutral-300 after:bg-white after:transition-transform peer-checked:bg-brand-600 peer-checked:after:translate-x-5 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-brand-500/20 dark:bg-neutral-700"></span>
                            </label>
                        </div>

                        {{-- Requires Approval Switch --}}
                        <div class="flex items-center justify-between gap-4 rounded-xl border border-neutral-200 bg-neutral-50/50 p-4 dark:border-neutral-800 dark:bg-neutral-900/50">
                            <div>
                                <label for="requires_approval" class="cursor-pointer text-sm font-semibold text-neutral-800 dark:text-neutral-200">
                                    Requires Approval
                                </label>
                                <p class="mt-1 text-xs text-neutral-500 dark:text-neutral-400">Must be reviewed and approved by management.</p>
                            </div>
                            <label class="relative inline-flex shrink-0 cursor-pointer items-center">
                                <input type="hidden" name="requires_approval" value="0">
                                <input type="checkbox"
                                    name="requires_approval"
                                    value="1"
                                    id="requires_approval"
                                    class="peer sr-only"
                                    {{ (string) old('requires_approval', $isEdit ? (int) $leaveType->requires_approval : 1) === '1' ? 'checked' : '' }}>
                                <span class="h-6 w-11 rounded-full bg-neutral-300 transition-colors after:absolute after:left-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-neutral-300 after:bg-white after:transition-transform peer-checked:bg-brand-600 peer-checked:after:translate-x-5 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-brand-500/20 dark:bg-neutral-700"></span>
                            </label>
                        </div>

                        {{-- Requires Document Switch --}}
                        <div class="flex items-center justify-between gap-4 rounded-xl border border-neutral-200 bg-neutral-50/50 p-4 dark:border-neutral-800 dark:bg-neutral-900/50">
                            <div>
                                <label for="requires_document" class="cursor-pointer text-sm font-semibold text-neutral-800 dark:text-neutral-200">
                                    Requires Medical Document
                                </label>
                                <p class="mt-1 text-xs text-neutral-500 dark:text-neutral-400">Requires a doctor note or supporting files.</p>
                            </div>
                            <label class="relative inline-flex shrink-0 cursor-pointer items-center">
                                <input type="hidden" name="requires_document" value="0">
                                <input type="checkbox"
                                    name="requires_document"
                                    value="1"
                                    id="requires_document"
                                    class="peer sr-only"
                                    {{ (string) old('requires_document', $isEdit ? (int) $leaveType->requires_document : 0) === '1' ? 'checked' : '' }}>
                                <span class="h-6 w-11 rounded-full bg-neutral-300 transition-colors after:absolute after:left-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-neutral-300 after:bg-white after:transition-transform peer-checked:bg-brand-600 peer-checked:after:translate-x-5 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-brand-500/20 dark:bg-neutral-700"></span>
                            </label>
                        </div>

                        {{-- Active Status Switch --}}
                        <div class="flex items-center justify-between gap-4 rounded-xl border border-neutral-200 bg-neutral-50/50 p-4 dark:border-neutral-800 dark:bg-neutral-900/50">
                            <div>
                                <label for="is_active" class="cursor-pointer text-sm font-semibold text-neutral-800 dark:text-neutral-200">
                                    Active Status
                                </label>
                                <p class="mt-1 text-xs text-neutral-500 dark:text-neutral-400">Enable or disable this leave type for selection.</p>
                            </div>
                            <label class="relative inline-flex shrink-0 cursor-pointer items-center">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox"
                                    name="is_active"
                                    value="1"
                                    id="is_active"
                                    class="peer sr-only"
                                    {{ (string) old('is_active', $isEdit ? (int) $leaveType->is_active : 1) === '1' ? 'checked' : '' }}>
                                <span class="h-6 w-11 rounded-full bg-neutral-300 transition-colors after:absolute after:left-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-neutral-300 after:bg-white after:transition-transform peer-checked:bg-brand-600 peer-checked:after:translate-x-5 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-brand-500/20 dark:bg-neutral-700"></span>
                            </label>
                        </div>

                    </div>

                    {{-- Carry Forward Section with Alpine Toggle --}}
                    <div class="mt-4 rounded-xl border border-neutral-200 bg-neutral-50/50 p-4 dark:border-neutral-800 dark:bg-neutral-900/50 space-y-4">
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <label for="can_carry_forward" class="cursor-pointer text-sm font-semibold text-neutral-800 dark:text-neutral-200">
                                    Allow Carry Forward
                                </label>
                                <p class="mt-1 text-xs text-neutral-500 dark:text-neutral-400">Allow unused leave balances to roll over into the next cycle.</p>
                            </div>
                            <label class="relative inline-flex shrink-0 cursor-pointer items-center">
                                <input type="hidden" name="can_carry_forward" value="0">
                                <input type="checkbox"
                                    name="can_carry_forward"
                                    value="1"
                                    id="can_carry_forward"
                                    x-model="canCarryForward"
                                    class="peer sr-only"
                                    {{ (string) old('can_carry_forward', $isEdit ? (int) $leaveType->can_carry_forward : 0) === '1' ? 'checked' : '' }}>
                                <span class="h-6 w-11 rounded-full bg-neutral-300 transition-colors after:absolute after:left-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-neutral-300 after:bg-white after:transition-transform peer-checked:bg-brand-600 peer-checked:after:translate-x-5 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-brand-500/20 dark:bg-neutral-700"></span>
                            </label>
                        </div>

                        {{-- Conditional Carry Forward Limit Input --}}
                        <div x-show="canCarryForward" x-cloak x-transition class="pt-3 border-t border-neutral-200 dark:border-neutral-800">
                            <label for="carry_forward_limit"
                                class="mb-2 block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400">
                                Maximum Carry Forward Days
                            </label>
                            <input type="number"
                                name="carry_forward_limit"
                                id="carry_forward_limit"
                                min="0"
                                max="365"
                                value="{{ old('carry_forward_limit', $leaveType->carry_forward_limit ?? 0) }}"
                                placeholder="e.g., 5"
                                class="h-11 w-full rounded-lg border border-neutral-300 bg-transparent px-4 py-2.5 text-sm text-neutral-800 shadow-theme-xs placeholder:text-neutral-400 focus:border-brand-300 focus:outline-none focus:ring-3 focus:ring-brand-500/10 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white/90">
                            @error('carry_forward_limit')
                                <p class="mt-1.5 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-neutral-200 dark:border-neutral-800">
                    <a href="{{ role_route('role.leave-types.index', ['role' => $role]) }}"
                        class="inline-flex h-11 items-center justify-center rounded-lg border border-neutral-300 px-5 text-sm font-semibold text-neutral-700 hover:bg-neutral-50 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800">
                        Cancel
                    </a>

                    <button type="submit"
                        class="inline-flex h-11 items-center justify-center rounded-lg bg-brand-600 px-6 text-sm font-semibold text-white shadow-theme-xs hover:bg-brand-700 focus:outline-none focus:ring-3 focus:ring-brand-500/20">
                        {{ $isEdit ? 'Update Leave Type' : 'Save Leave Type' }}
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection