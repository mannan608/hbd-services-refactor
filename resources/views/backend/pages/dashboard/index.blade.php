@extends('backend.layouts.app')

@section('content')
@include("backend.layouts.sticky-navbar")
    <div class="space-y-6">
        <!-- Page Header -->
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-neutral-900 dark:text-white">Dashboard</h1>
                <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                    Welcome back! Here is an overview of today's performance.
                </p>
            </div>
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center gap-1.5 rounded-lg border border-neutral-200/80 bg-white px-3 py-1.5 text-xs font-medium text-neutral-600 dark:border-neutral-700/60 dark:bg-neutral-800 dark:text-neutral-300">
                    <svg class="h-4 w-4 text-neutral-400 dark:text-neutral-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                    </svg>
                    {{ now()->format('l, F j, Y') }}
                </span>
            </div>
        </div>
        <!-- Section Grid / Reports -->
        {{-- <div class="space-y-6">
            @include('backend.pages.dashboard.lead-summary')
            <!-- Lead Summary Card -->
            <div class="rounded-2xl border border-neutral-200/80 bg-white p-5 transition-all dark:border-neutral-800 dark:bg-neutral-900 sm:p-6">
                <div class="mb-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-neutral-900 dark:text-white">
                            Lead Performance Summary
                        </h2>
                        <p class="mt-0.5 text-xs text-neutral-500 dark:text-neutral-400">
                            Real-time metrics and lead activity breakdown
                        </p>
                    </div>
                    <div class="flex items-center gap-2">
                        <select name="lead_filter"
                            class="cursor-pointer rounded-lg border border-neutral-200 bg-neutral-50 py-1.5 pl-3 pr-8 text-xs font-medium text-neutral-700 transition focus:border-neutral-400 focus:outline-none focus:ring-0 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-200">
                            <option value="today">Today</option>
                            <option value="7_days">Last 7 Days</option>
                            <option value="this_month">This Month</option>
                            <option value="this_year">This Year</option>
                        </select>
                    </div>
                </div>
                @include('backend.pages.dashboard.daily-lead-summary')
            </div>

            <!-- Application Report Card -->
            <div class="rounded-2xl border border-neutral-200/80 bg-white p-5 transition-all dark:border-neutral-800 dark:bg-neutral-900 sm:p-6">
                <div class="mb-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-neutral-900 dark:text-white">
                            Application Report
                        </h2>
                        <p class="mt-0.5 text-xs text-neutral-500 dark:text-neutral-400">
                            Application submission trends and status distribution
                        </p>
                    </div>
                    <div class="flex items-center gap-2">
                        <select name="app_filter"
                            class="cursor-pointer rounded-lg border border-neutral-200 bg-neutral-50 py-1.5 pl-3 pr-8 text-xs font-medium text-neutral-700 transition focus:border-neutral-400 focus:outline-none focus:ring-0 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-200">
                            <option value="today">Today</option>
                            <option value="7_days">Last 7 Days</option>
                            <option value="this_month">This Month</option>
                            <option value="this_year">This Year</option>
                        </select>
                    </div>
                </div>
                @include('backend.pages.dashboard.application-report')
            </div>

            <!-- File Open / Enrollment Report Card -->
            <div class="rounded-2xl border border-neutral-200/80 bg-white p-5 transition-all dark:border-neutral-800 dark:bg-neutral-900 sm:p-6">
                <div class="mb-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-neutral-900 dark:text-white">
                            File Open & Enrollment Report
                        </h2>
                        <p class="mt-0.5 text-xs text-neutral-500 dark:text-neutral-400">
                            Tracking conversions from file opening to active enrollment
                        </p>
                    </div>
                    <div class="flex items-center gap-2">
                        <select name="enrollment_filter"
                            class="cursor-pointer rounded-lg border border-neutral-200 bg-neutral-50 py-1.5 pl-3 pr-8 text-xs font-medium text-neutral-700 transition focus:border-neutral-400 focus:outline-none focus:ring-0 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-200">
                            <option value="today">Today</option>
                            <option value="7_days">Last 7 Days</option>
                            <option value="this_month">This Month</option>
                            <option value="this_year">This Year</option>
                        </select>
                    </div>
                </div>
                @include('backend.pages.dashboard.file-open-enroll')
            </div>

            <!-- IP Call Report Card -->
            <div class="rounded-2xl border border-neutral-200/80 bg-white p-5 transition-all dark:border-neutral-800 dark:bg-neutral-900 sm:p-6">
                @include('backend.pages.dashboard.ipcall-report')
            </div>
        </div>     --}}
    </div>
@endsection