@php
    $isEdit = isset($intake) && $intake;

    $applicationDeadline = old('application_deadline', $intake?->application_deadline?->format('Y-m-d\TH:i'));

    $startDate = old('application_open_date', $intake?->application_open_date?->format('Y-m-d\TH:i'));
@endphp

<div x-data="{}" class="mx-auto max-w-5xl">
    <div class="">

        {{-- LEFT MAIN SECTION --}}
        <div class="space-y-6">

            {{-- Form Section Card --}}
            <div
                class="overflow-hidden rounded-2xl border border-neutral-200/80 bg-white shadow-sm transition-all dark:border-neutral-800 dark:bg-neutral-900">

                {{-- Card Header --}}
                <div
                    class="border-b border-neutral-100 bg-neutral-50/50 px-6 py-4 dark:border-neutral-800/80 dark:bg-neutral-900/50">
                    <div class="flex items-center space-x-3">
                        <div
                            class="flex h-9 w-9 items-center justify-center rounded-xl bg-brand-50 text-brand-600 dark:bg-brand-500/10 dark:text-brand-400">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-base font-semibold text-neutral-900 dark:text-white">
                                {{ $isEdit ? 'Update ' : 'Ctreate' }} University Intake
                            </h2>
                            <p class="text-xs text-neutral-500 dark:text-neutral-400">
                                {{ $isEdit ? 'Update existing intake schedule and settings.' : 'Set up a new intake period for your university.' }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Card Body --}}
                <div class="space-y-6 p-6">
                    {{-- University --}}
                    @if ($university)
                        {{-- Coming from University --}}
                        <input type="hidden" name="university_id" value="{{ $university->id }}">

                        <div>
                            <label
                                class="mb-2 block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400">
                                University
                            </label>

                            <div
                                class="rounded-xl border border-neutral-300 bg-neutral-50 px-4 py-3 text-sm text-neutral-700 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-200">
                                {{ $university->name }}
                            </div>
                        </div>
                    @else
                        {{-- Manual creation --}}
                        <div>
                            <label
                                class="mb-2 block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400">
                                University <span class="text-red-500">*</span>
                            </label>

                            <select name="university_id"
                                class="h-11 w-full rounded-xl border border-neutral-300 bg-white px-4 text-sm text-neutral-800 focus:border-brand-500 focus:outline-none focus:ring-4 focus:ring-brand-500/10 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100">

                                <option value="">Select University</option>

                                @foreach ($universities as $item)
                                    <option value="{{ $item->id }}" @selected(old('university_id') == $item->id)>
                                        {{ $item->name }}
                                    </option>
                                @endforeach

                            </select>

                            @error('university_id')
                                <p class="mt-1.5 text-xs font-medium text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    @endif
                    {{-- Intake Month & Year Grid --}}
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                        {{-- Intake Month --}}
                        <div>
                            <label
                                class="mb-2 block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400">
                                Intake Month <span class="text-red-500">*</span>
                            </label>

                            <select name="name"
                                class="h-11 w-full rounded-xl border border-neutral-300 bg-white px-4 text-sm text-neutral-800 transition-all focus:border-brand-500 focus:outline-none focus:ring-4 focus:ring-brand-500/10 dark:border-neutral-700/80 dark:bg-neutral-900 dark:text-neutral-100 dark:focus:border-brand-400 dark:focus:ring-brand-400/20">

                                <option value="">Select Month</option>

                                @foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $month)
                                    <option value="{{ $month }}" @selected(old('name', $intake?->name) === $month)>
                                        {{ $month }}
                                    </option>
                                @endforeach
                            </select>

                            @error('name')
                                <p class="mt-1.5 text-xs font-medium text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        {{-- Intake Year --}}
                        <div>
                            <label
                                class="mb-2 block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400">
                                Intake Year <span class="text-red-500">*</span>
                            </label>

                            <select name="year"
                                class="h-11 w-full rounded-xl border border-neutral-300 bg-white px-4 text-sm text-neutral-800 transition-all focus:border-brand-500 focus:outline-none focus:ring-4 focus:ring-brand-500/10 dark:border-neutral-700/80 dark:bg-neutral-900 dark:text-neutral-100 dark:focus:border-brand-400 dark:focus:ring-brand-400/20">

                                <option value="">Select Year</option>

                                @for ($year = now()->year; $year <= now()->year + 5; $year++)
                                    <option value="{{ $year }}" @selected((int) old('year', $intake?->year) === $year)>
                                        {{ $year }}
                                    </option>
                                @endfor

                            </select>

                            @error('year')
                                <p class="mt-1.5 text-xs font-medium text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                    </div>

                    {{-- Dates Grid --}}
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                        <x-form.input-text name="application_open_date" label="Application Start" type="datetime-local"
                            value="{{ $startDate }}" />
                        <x-form.input-text name="application_deadline" label="Application End" type="datetime-local"
                            value="{{ $applicationDeadline }}" />
                    </div>

                    {{-- Status Field --}}
                    <div>
                        <label
                            class="mb-2 block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400">
                            Status <span class="text-red-500">*</span>
                        </label>

                        <div class="relative">
                            <select name="status"
                                class="h-11 w-full appearance-none rounded-xl border border-neutral-300 bg-white px-4 pr-10 text-sm text-neutral-800 transition-all focus:border-brand-500 focus:outline-none focus:ring-4 focus:ring-brand-500/10 dark:border-neutral-700/80 dark:bg-neutral-900 dark:text-neutral-100 dark:focus:border-brand-400 dark:focus:ring-brand-400/20">
                                <option value="">Select Status</option>
                                @foreach (['open', 'closed', 'upcoming'] as $status)
                                    <option value="{{ $status }}" @selected(old('status', $intake?->status) === $status)>
                                        {{ ucfirst($status) }}
                                    </option>
                                @endforeach
                            </select>

                        </div>

                        @error('status')
                            <p class="mt-1.5 flex items-center text-xs font-medium text-red-500">
                                <svg class="mr-1 h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="pt-2">
                        <button type="submit"
                            class="inline-flex w-full items-center justify-center rounded-xl bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition-all hover:bg-brand-500 focus:outline-none focus:ring-4 focus:ring-brand-500/20 active:scale-[0.98]">
                            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            {{ $isEdit ? 'Update Intake' : 'Create Intake' }}
                        </button>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>
