@extends('backend.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-neutral-200 dark:border-neutral-800 pb-5">
        <div>
            <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">Create Lead</h1>
            <p class="text-sm text-neutral-500 dark:text-neutral-400 mt-1">Choose how you would like to add new leads to your pipeline.</p>
        </div>
        <a href="{{ role_route('role.students.index') }}" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-200 bg-white dark:bg-neutral-800 border border-neutral-300 dark:border-neutral-700 rounded-lg hover:bg-neutral-50 dark:hover:bg-neutral-700/50 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Back to Leads List
        </a>
    </div>

    <!-- Selection Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Single Lead Card -->
        <div class="group relative bg-white dark:bg-neutral-900 rounded-2xl p-8 border border-neutral-200 dark:border-neutral-800 hover:border-brand-500 dark:hover:border-brand-500 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
            <div class="space-y-4">
                <div class="w-14 h-14 rounded-xl bg-brand-50 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                    <iconify-icon icon="lucide:user" class="text-brand-600"></iconify-icon>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-neutral-900 dark:text-white group-hover:text-brand-600 transition-colors">Add New Lead</h3>
                    <p class="text-neutral-500 dark:text-neutral-400 text-sm mt-2 leading-relaxed">
                        Manually enter detailed lead information including contact details, custom fields, assignment, and status.
                    </p>
                </div>
            </div>
            <div class="mt-8 pt-6 border-t border-neutral-100 dark:border-neutral-800 flex items-center justify-between text-brand-600 font-semibold text-sm">
                <span>Fill Form Manually</span>
                <a href="{{ role_route('role.students.add') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-brand-600 hover:bg-brand-700 text-white rounded-xl shadow-md hover:shadow-brand-500/20 transition">
                    Create Lead
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>

        <!-- Bulk Import Card -->
        <div class="group relative bg-white dark:bg-neutral-900 rounded-2xl p-8 border border-neutral-200 dark:border-neutral-800 hover:border-brand-500 dark:hover:border-brand-500 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
            <div class="space-y-4">
                <div class="w-14 h-14 rounded-xl bg-purple-50 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-neutral-900 dark:text-white group-hover:text-purple-600 transition-colors">Bulk Import Leads</h3>
                    <p class="text-neutral-500 dark:text-neutral-400 text-sm mt-2 leading-relaxed">
                        Upload a CSV, XLSX, or XLS file to import multiple leads simultaneously. Includes validation & error logging.
                    </p>
                </div>
            </div>
            <div class="mt-8 pt-6 border-t border-neutral-100 dark:border-neutral-800 flex items-center justify-between text-purple-600 font-semibold text-sm">
                <span>Upload CSV / Excel</span>
                <a href="{{ role_route('role.students.import') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-xl shadow-md hover:shadow-purple-500/20 transition">
                    Bulk Import
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

