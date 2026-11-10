@extends('backend.layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto pb-12">
        <!-- Top Header & Breadcrumb / Back Navigation -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
            <div class="flex items-center gap-3">
                <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-brand-50 text-brand-600 dark:bg-brand-500/10 dark:text-brand-400 font-semibold shadow-sm">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round5" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h-4m-6 0H5a2 2 0 002-2v-4" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold tracking-tight text-neutral-900 dark:text-white">Create Department</h3>
                    <p class="text-sm text-neutral-500 dark:text-neutral-400">Add a new department entity and configure operational details.</p>
                </div>
            </div>

            <a href="{{ role_route('role.departments.index') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl border border-neutral-200 dark:border-neutral-800 px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 bg-white dark:bg-neutral-900 hover:bg-neutral-50 dark:hover:bg-neutral-800 shadow-sm transition-all">
                <svg class="w-4 h-4 text-neutral-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Back to List</span>
            </a>
        </div>

        <!-- Form Card Container -->
        <div class="rounded-2xl border border-neutral-200/80 dark:border-white/[0.08] bg-white dark:bg-neutral-900 shadow-xl shadow-neutral-100/50 dark:shadow-none overflow-hidden">
            <form action="{{ role_route('role.departments.store') }}" method="POST">
                @csrf

                <!-- Form Section Heading (Optional visual polish) -->
                <div class="px-6 sm:px-8 pt-6 pb-4 border-b border-neutral-100 dark:border-white/[0.05] bg-neutral-50/50 dark:bg-white/[0.01]">
                    <h4 class="text-xs font-semibold uppercase tracking-wider text-neutral-400 dark:text-neutral-500">Department Information</h4>
                </div>

                <!-- Form Fields Body -->
                <div class="p-6 sm:p-8 space-y-6">
                    @include('backend.pages.HR.departments._form')
                </div>

                <!-- Form Footer Actions -->
                <div class="flex items-center justify-end gap-3 px-6 py-4 bg-neutral-50/80 dark:bg-white/[0.02] border-t border-neutral-100 dark:border-white/[0.05]">
                    <a href="{{ role_route('role.departments.index') }}"
                       class="inline-flex items-center justify-center rounded-xl border border-neutral-200 dark:border-neutral-700 px-5 py-2.5 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:bg-neutral-100 dark:hover:bg-neutral-800 transition-all">
                        Cancel
                    </a>
                    
                    <button type="submit"
                        class="inline-flex items-center justify-center rounded-xl bg-brand-600 hover:bg-brand-700 active:scale-[0.98] px-6 py-2.5 text-sm font-semibold text-white shadow-md shadow-brand-600/20 transition-all">
                        Save Department
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection