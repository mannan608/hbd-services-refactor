@extends('backend.layouts.app')

@section('content')
    <div class="mx-auto max-w-3xl pb-12">

        {{-- Header & Breadcrumb --}}
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div class="flex items-center gap-3">
                <div
                    class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-50 text-brand-600 shadow-sm dark:bg-brand-500/10 dark:text-brand-400">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 4v16m8-8H4" />
                    </svg>
                </div>

                <div>
                    <h3 class="text-xl font-bold tracking-tight text-neutral-900 dark:text-white">
                        Create Designation
                    </h3>
                    <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                        Add a new designation and configure its hierarchy and status.
                    </p>
                </div>
            </div>

            <a href="{{ role_route('role.designations.index') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl border border-neutral-200 bg-white px-4 py-2 text-sm font-medium text-neutral-700 shadow-sm transition hover:bg-neutral-50 dark:border-neutral-800 dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-800">
                <svg class="h-4 w-4 text-neutral-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to List
            </a>
        </div>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="mb-5 rounded-xl border border-red-200 bg-red-50 p-4 dark:border-red-500/20 dark:bg-red-500/10">
                <div class="flex items-start gap-3">
                    <svg class="mt-0.5 h-5 w-5 shrink-0 text-red-600 dark:text-red-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v4m0 4h.01M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z" />
                    </svg>

                    <div>
                        <p class="text-sm font-semibold text-red-700 dark:text-red-400">
                            Please correct the following errors.
                        </p>

                        <ul class="mt-2 list-inside list-disc space-y-1 text-sm text-red-600 dark:text-red-300">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        {{-- Success / Error Messages --}}
        @if (session('success'))
            <div
                class="mb-5 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-700 dark:border-green-500/20 dark:bg-green-500/10 dark:text-green-400">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div
                class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm font-medium text-red-700 dark:border-red-500/20 dark:bg-red-500/10 dark:text-red-400">
                {{ session('error') }}
            </div>
        @endif

        {{-- Form Card --}}
        <div
            class="overflow-hidden rounded-2xl border border-neutral-200/80 bg-white shadow-xl shadow-neutral-100/50 dark:border-white/[0.08] dark:bg-neutral-900 dark:shadow-none">

            <form action="{{ role_route('role.designations.store') }}" method="POST">
                @csrf

                {{-- Card Header --}}
                <div
                    class="border-b border-neutral-100 bg-neutral-50/50 px-6 py-5 dark:border-white/[0.05] dark:bg-white/[0.01] sm:px-8">
                    <h4 class="text-xs font-semibold uppercase tracking-wider text-neutral-500 dark:text-neutral-400">
                        Designation Information
                    </h4>
                    <p class="mt-1 text-xs text-neutral-400 dark:text-neutral-500">
                        Fields marked with * are required.
                    </p>
                </div>

                {{-- Form Fields --}}
                <div class="space-y-6 p-6 sm:p-8">
                    @include('backend.pages.HR.designations._form', [
                        'designation' => null,
                    ])
                </div>

                {{-- Footer --}}
                <div
                    class="flex flex-col-reverse gap-3 border-t border-neutral-100 bg-neutral-50/80 px-6 py-4 dark:border-white/[0.05] dark:bg-white/[0.02] sm:flex-row sm:items-center sm:justify-between sm:px-8">

                    <p class="text-xs text-neutral-500 dark:text-neutral-400">
                        <span class="text-red-500">*</span> Required field
                    </p>

                    <div class="flex items-center justify-end gap-3">
                        <a href="{{ role_route('role.designations.index') }}"
                            class="inline-flex items-center justify-center rounded-xl border border-neutral-200 px-5 py-2.5 text-sm font-medium text-neutral-700 transition hover:bg-neutral-100 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800">
                            Cancel
                        </a>

                        <button type="submit"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-brand-600 px-6 py-2.5 text-sm font-semibold text-white shadow-md shadow-brand-600/20 transition hover:bg-brand-700 active:scale-[0.98]">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Save Designation
                        </button>
                    </div>
                </div>
            </form>
        </div>

        {{-- Helper Note --}}
        <div class="mt-4 flex items-start gap-2 px-1 text-xs leading-5 text-neutral-500 dark:text-neutral-400">
            <svg class="mt-0.5 h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                    d="M12 18h.01M12 14a4 4 0 1 0-4-4m4 4v-1" />
            </svg>
            <p>
                Use hierarchy level to represent organizational seniority and sort order
                to control the display sequence in lists and dropdowns.
            </p>
        </div>
    </div>
@endsection