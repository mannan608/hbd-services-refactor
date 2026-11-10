@extends('backend.layouts.app')

@section('content')
    @php
        $isEdit = isset($holiday->id);
        $role = request()->route('role');
    @endphp

    <div class="mx-auto max-w-3xl pb-12"
        x-data="{
            isMultiDay: {{ old('is_multi_day', $isEdit ? $holiday->is_multi_day : false) ? 'true' : 'false' }}
        }"
    >
        {{-- Header Section --}}
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-800 dark:text-white">
                    {{ $isEdit ? 'Edit Holiday' : 'Create Holiday' }}
                </h1>
                <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                    {{ $isEdit ? 'Update holiday details and schedule.' : 'Add a new holiday to your organization calendar.' }}
                </p>
            </div>

            <a href="{{ role_route('role.holidays.index', ['role' => $role]) }}"
                class="inline-flex h-10 items-center justify-center gap-2 rounded-lg border border-neutral-300 px-4 text-sm font-semibold text-neutral-700 hover:bg-neutral-50 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800">
                <span aria-hidden="true">&larr;</span> Back to Holidays
            </a>
        </div>

        {{-- Form Container --}}
        <div class="overflow-hidden rounded-2xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900">

            <div class="border-b border-neutral-200 px-6 py-5 dark:border-neutral-800">
                <h2 class="text-base font-semibold text-neutral-800 dark:text-white">
                    Holiday Information
                </h2>
                <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                    Enter the holiday name, dates, description, and status settings.
                </p>
            </div>

            <form action="{{ $isEdit ? role_route('role.holidays.update', ['role' => $role, 'holiday' => $holiday->id]) : role_route('role.holidays.store', ['role' => $role]) }}"
                  method="POST"
                  class="p-6 space-y-6"
            >
                @csrf
                @if($isEdit)
                    @method('PATCH')
                @endif

                {{-- Holiday Name --}}
                <div>
                    <label for="name"
                        class="mb-2 block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400">
                        Holiday Name <span class="text-red-500">*</span>
                    </label>

                    <input type="text"
                        name="name"
                        id="name"
                        value="{{ old('name', $holiday->name ?? '') }}"
                        maxlength="191"
                        placeholder="e.g., Independence Day"
                        required
                        autofocus
                        class="h-11 w-full rounded-lg border border-neutral-300 bg-transparent px-4 py-2.5 text-sm text-neutral-800 shadow-theme-xs placeholder:text-neutral-400 focus:border-brand-300 focus:outline-none focus:ring-3 focus:ring-brand-500/10 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white/90">

                    @error('name')
                        <p class="mt-1.5 text-xs font-medium text-red-600 dark:text-red-400">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Dates Layout (Start & Optional End Date) --}}
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    {{-- Start Date --}}
                    <div>
                        <label for="date"
                            class="mb-2 block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400">
                            Start Date <span class="text-red-500">*</span>
                        </label>

                        <x-form.date-picker
                            id="date"
                            name="date"
                            placeholder="Select start date"
                            :default-date="old('date', isset($holiday->date) ? $holiday->date->format('Y-m-d') : null)"
                        />

                        @error('date')
                            <p class="mt-1.5 text-xs font-medium text-red-600 dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- End Date (Visible when multi-day is checked) --}}
                    <div x-show="isMultiDay" x-cloak x-transition>
                        <label for="end_date"
                            class="mb-2 block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400">
                            End Date <span class="text-red-500">*</span>
                        </label>

                        <x-form.date-picker
                            id="end_date"
                            name="end_date"
                            placeholder="Select end date"
                            :default-date="old('end_date', isset($holiday->end_date) ? $holiday->end_date->format('Y-m-d') : null)"
                        />

                        @error('end_date')
                            <p class="mt-1.5 text-xs font-medium text-red-600 dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                {{-- Multi-day Toggle Switch --}}
                <div>
                    <div class="flex items-center justify-between gap-4 rounded-xl border border-neutral-200 bg-neutral-50/50 p-4 dark:border-neutral-800 dark:bg-neutral-900/50">
                        <div>
                            <label for="is_multi_day"
                                class="cursor-pointer text-sm font-semibold text-neutral-800 dark:text-neutral-200">
                                Multi-day Holiday
                            </label>
                            <p class="mt-1 text-xs text-neutral-500 dark:text-neutral-400">
                                Enable if this holiday spans multiple consecutive days.
                            </p>
                        </div>

                        <label class="relative inline-flex shrink-0 cursor-pointer items-center">
                            <input type="hidden" name="is_multi_day" value="0">
                            <input type="checkbox"
                                name="is_multi_day"
                                value="1"
                                id="is_multi_day"
                                x-model="isMultiDay"
                                class="peer sr-only"
                                {{ (string) old('is_multi_day', $isEdit ? (int) $holiday->is_multi_day : 0) === '1' ? 'checked' : '' }}>

                            <span class="h-6 w-11 rounded-full bg-neutral-300 transition-colors after:absolute after:left-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-neutral-300 after:bg-white after:transition-transform peer-checked:bg-brand-600 peer-checked:after:translate-x-5 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-brand-500/20 dark:bg-neutral-700">
                            </span>
                        </label>
                    </div>

                    @error('is_multi_day')
                        <p class="mt-1.5 text-xs font-medium text-red-600 dark:text-red-400">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Description --}}
                <div>
                    <label for="description"
                        class="mb-2 block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400">
                        Description (Optional)
                    </label>

                    <textarea
                        name="description"
                        id="description"
                        rows="3"
                        placeholder="Add extra context or notes about this holiday..."
                        class="w-full rounded-lg border border-neutral-300 bg-transparent px-4 py-2.5 text-sm text-neutral-800 shadow-theme-xs placeholder:text-neutral-400 focus:border-brand-300 focus:outline-none focus:ring-3 focus:ring-brand-500/10 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white/90"
                    >{{ old('description', $holiday->description ?? '') }}</textarea>

                    @error('description')
                        <p class="mt-1.5 text-xs font-medium text-red-600 dark:text-red-400">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Side-by-side Toggles (Recurring & Status) --}}
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    {{-- Recurring Toggle --}}
                    <div class="flex items-center justify-between gap-4 rounded-xl border border-neutral-200 bg-neutral-50/50 p-4 dark:border-neutral-800 dark:bg-neutral-900/50">
                        <div>
                            <label for="is_recurring" class="cursor-pointer text-sm font-semibold text-neutral-800 dark:text-neutral-200">
                                Recurring Year-on-Year
                            </label>
                            <p class="mt-1 text-xs text-neutral-500 dark:text-neutral-400">
                                Repeat annually on the same dates.
                            </p>
                        </div>
                        <label class="relative inline-flex shrink-0 cursor-pointer items-center">
                            <input type="hidden" name="is_recurring" value="0">
                            <input type="checkbox"
                                name="is_recurring"
                                value="1"
                                id="is_recurring"
                                class="peer sr-only"
                                {{ (string) old('is_recurring', $isEdit ? (int) $holiday->is_recurring : 0) === '1' ? 'checked' : '' }}>
                            <span class="h-6 w-11 rounded-full bg-neutral-300 transition-colors after:absolute after:left-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-neutral-300 after:bg-white after:transition-transform peer-checked:bg-brand-600 peer-checked:after:translate-x-5 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-brand-500/20 dark:bg-neutral-700"></span>
                        </label>
                    </div>

                    {{-- Status Toggle --}}
                    <div class="flex items-center justify-between gap-4 rounded-xl border border-neutral-200 bg-neutral-50/50 p-4 dark:border-neutral-800 dark:bg-neutral-900/50">
                        <div>
                            <label for="is_active" class="cursor-pointer text-sm font-semibold text-neutral-800 dark:text-neutral-200">
                                Holiday Status
                            </label>
                            <p class="mt-1 text-xs text-neutral-500 dark:text-neutral-400">
                                Enable or disable holiday.
                            </p>
                        </div>
                        <label class="relative inline-flex shrink-0 cursor-pointer items-center">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox"
                                name="is_active"
                                value="1"
                                id="is_active"
                                class="peer sr-only"
                                {{ (string) old('is_active', $isEdit ? (int) $holiday->is_active : 1) === '1' ? 'checked' : '' }}>
                            <span class="h-6 w-11 rounded-full bg-neutral-300 transition-colors after:absolute after:left-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-neutral-300 after:bg-white after:transition-transform peer-checked:bg-brand-600 peer-checked:after:translate-x-5 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-brand-500/20 dark:bg-neutral-700"></span>
                        </label>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-neutral-200 dark:border-neutral-800">
                    <a href="{{ role_route('role.holidays.index', ['role' => $role]) }}"
                        class="inline-flex h-11 items-center justify-center rounded-lg border border-neutral-300 px-5 text-sm font-semibold text-neutral-700 hover:bg-neutral-50 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800">
                        Cancel
                    </a>

                    <button type="submit"
                        class="inline-flex h-11 items-center justify-center rounded-lg bg-brand-600 px-6 text-sm font-semibold text-white shadow-theme-xs hover:bg-brand-700 focus:outline-none focus:ring-3 focus:ring-brand-500/20">
                        {{ $isEdit ? 'Update Holiday' : 'Save Holiday' }}
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection