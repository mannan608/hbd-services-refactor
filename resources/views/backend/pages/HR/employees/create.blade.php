@extends('backend.layouts.app')

@section('content')
    <div class="mx-auto max-w-6xl pb-12">

        {{-- Sticky Action Bar --}}
        <div
            class="sticky top-19 z-20  mb-6 rounded-2xl border-b border-neutral-200/60 bg-white/80 px-4 py-4 backdrop-blur-lg dark:border-neutral-800 dark:bg-neutral-900/80 sm:-mx-6 sm:px-6">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-lg font-semibold text-neutral-900 dark:text-white">Create Employee</h1>
                    <p class="text-sm text-neutral-500 dark:text-neutral-400">Add a new employee with personal, contact and
                        account details.</p>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ role_route('role.employees.index') }}"
                        class="inline-flex items-center gap-2 rounded-xl border border-neutral-300 px-5 py-2.5 text-sm font-medium text-neutral-700 transition hover:bg-neutral-50 focus:outline-none focus:ring-2 focus:ring-neutral-400/30 dark:border-neutral-700 dark:text-neutral-200 dark:hover:bg-neutral-800">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Cancel
                    </a>

                    <button type="submit" form="employee-form"
                        class="inline-flex items-center gap-2 rounded-xl bg-brand-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-brand-500/40">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Create Employee
                    </button>
                </div>
            </div>
        </div>

        {{-- Alerts --}}
        @if (session('error'))
            <div
                class="mb-5 flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700 dark:border-red-900/50 dark:bg-red-950/40 dark:text-red-400">
                <svg class="mt-0.5 h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0 3.75h.008v.008H12v-.008z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9 9 0 100-18 9 9 0 000 18z" />
                </svg>
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div
                class="mb-5 flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700 dark:border-red-900/50 dark:bg-red-950/40 dark:text-red-400">
                <svg class="mt-0.5 h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0 3.75h.008v.008H12v-.008z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9 9 0 100-18 9 9 0 000 18z" />
                </svg>
                Please correct the {{ $errors->count() }} highlighted error{{ $errors->count() > 1 ? 's' : '' }} below and
                try again.
            </div>
        @endif

        <form id="employee-form" action="{{ role_route('role.employees.store') }}" method="POST" novalidate>
            @csrf
            <div class="space-y-6">

                {{-- ============================== --}}
                {{-- Personal Information          --}}
                {{-- ============================== --}}
                <section class="overflow-hidden rounded-2xl border border-neutral-200/80 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900">
                    <header
                        class="flex items-center gap-4 border-b border-neutral-100 bg-neutral-50/60 px-6 py-4 dark:border-neutral-800 dark:bg-neutral-800/40">
                        <span
                            class="flex h-9 w-9 items-center justify-center rounded-lg bg-brand-600/10 text-brand-600 dark:text-brand-400">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                        </span>
                        <div>
                            <h2 class="text-base font-semibold text-neutral-900 dark:text-white">Personal Information</h2>
                            <p class="text-xs text-neutral-500 dark:text-neutral-400">Basic identification and contact
                                details.</p>
                        </div>
                    </header>

                    <div class="space-y-6 p-6">
                        {{-- Names --}}
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                            <x-form.input-text name="first_name" label="First Name" required autocomplete="given-name"
                                value="{{ old('first_name', $employee?->first_name) }}" placeholder="e.g. John" />

                            <x-form.input-text name="last_name" label="Last Name" required autocomplete="family-name"
                                value="{{ old('last_name', $employee?->last_name) }}" placeholder="e.g. Doe" />
                        </div>

                        {{-- Contact --}}
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">
                            <x-form.input-text name="email" label="Email Address" type="email" required
                                autocomplete="email" value="{{ old('email', $employee?->user?->email) }}"
                                placeholder="john@example.com" />

                            <x-form.input-text name="phone" label="Phone Number" type="tel" autocomplete="tel"
                                value="{{ old('phone', $employee?->user?->phone) }}" placeholder="+1 (555) 000-0000" />

                            <x-form.input-text name="password" label="Password" type="password" required
                                autocomplete="new-password" placeholder="Minimum 8 characters" />
                        </div>

                        {{-- Emergency Contact --}}
                        <fieldset class="rounded-xl border border-dashed border-neutral-300 p-5 dark:border-neutral-700">
                            <legend class="sr-only">Emergency Contact</legend>
                            <div class="mb-4 flex items-center gap-2.5">
                                <svg class="h-4 w-4 text-brand-600 dark:text-brand-400" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84" />
                                </svg>
                                <div>
                                    <h3 class="text-sm font-semibold text-neutral-900 dark:text-white">Emergency Contact
                                    </h3>
                                    <p class="text-xs text-neutral-500 dark:text-neutral-400">Who should we reach in case
                                        of an emergency?</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                                <x-form.input-text name="emergency_contact_name" label="Contact Name"
                                    value="{{ old('emergency_contact_name', $employee?->emergency_contact_name) }}"
                                    placeholder="Full name" />

                                <x-form.input-text name="emergency_contact_phone" label="Phone Number" type="tel"
                                    value="{{ old('emergency_contact_phone', $employee?->emergency_contact_phone) }}"
                                    placeholder="+1 (555) 000-0000" />
                            </div>
                        </fieldset>
                    </div>
                </section>

                {{-- ============================== --}}
                {{-- Employment Information        --}}
                {{-- ============================== --}}
                @include('backend.pages.HR.employees.partial.employeement')


                {{-- ============================== --}}
                {{-- Account Settings              --}}
                {{-- ============================== --}}
                <section
                    class="overflow-hidden rounded-2xl border border-neutral-200/80 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900">
                    <header
                        class="flex items-center gap-4 border-b border-neutral-100 bg-neutral-50/60 px-6 py-4 dark:border-neutral-800 dark:bg-neutral-800/40">
                        <span
                            class="flex h-9 w-9 items-center justify-center rounded-lg bg-brand-600/10 text-brand-600 dark:text-brand-400">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                            </svg>
                        </span>
                        <div>
                            <h2 class="text-base font-semibold text-neutral-900 dark:text-white">Account Settings</h2>
                            <p class="text-xs text-neutral-500 dark:text-neutral-400">Manage account privileges and status
                                flags.</p>
                        </div>
                    </header>

                    <div class="p-6">
                        <label for="is_verified"
                            class="group flex cursor-pointer items-start justify-between gap-4 rounded-xl border border-neutral-200 p-4 transition hover:border-brand-400/60 hover:bg-brand-50/40 dark:border-neutral-700 dark:hover:border-brand-500/40 dark:hover:bg-brand-500/5 sm:items-center">
                            <div class="flex items-start gap-3">
                                <input type="hidden" name="is_verified" value="0">
                                <input type="checkbox" id="is_verified" name="is_verified" value="1"
                                    @checked(old('is_verified', $employee?->is_verified ?? false))
                                    class="mt-0.5 h-5 w-5 rounded-md border-neutral-300 text-brand-600 accent-brand-600 focus:ring-2 focus:ring-brand-500/30 dark:border-neutral-600 sm:mt-0">
                                <div>
                                    <span class="text-sm font-semibold text-neutral-900 dark:text-white">Verified
                                        Employee</span>
                                    <p class="mt-0.5 text-xs leading-relaxed text-neutral-500 dark:text-neutral-400">Grants
                                        the profile standard clearance across platform modules. You can change this later.
                                    </p>
                                </div>
                            </div>
                            <span
                                class="hidden rounded-full bg-neutral-100 px-2.5 py-1 text-[11px] font-medium text-neutral-500 dark:bg-neutral-800 dark:text-neutral-400 sm:inline-block">Optional</span>
                        </label>
                    </div>
                </section>

            </div>
        </form>
    </div>
@endsection
