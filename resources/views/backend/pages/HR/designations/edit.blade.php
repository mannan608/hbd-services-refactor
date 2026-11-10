
@extends('backend.layouts.app')

@section('content')
    <div class="mx-auto max-w-3xl pb-12">

        {{-- Header --}}
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-blue-600 shadow-sm dark:bg-blue-500/10 dark:text-blue-400">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="m16.862 4.487 2.651 2.651M4 20l4.5-1 11.3-11.3a1.875 1.875 0 0 0-2.65-2.65L5.85 16.35 4 20Z" />
                    </svg>
                </div>

                <div>
                    <h3 class="text-xl font-bold tracking-tight text-neutral-900 dark:text-white">
                        Edit Designation
                    </h3>

                    <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                        Update designation information, hierarchy and status.
                    </p>
                </div>
            </div>

            <a href="{{ role_route('role.designations.index') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl border border-neutral-200 bg-white px-4 py-2 text-sm font-medium text-neutral-700 shadow-sm transition hover:bg-neutral-50 dark:border-neutral-800 dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-800">
                <svg class="h-4 w-4 text-neutral-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to List
            </a>
        </div>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="mb-5 rounded-xl border border-red-200 bg-red-50 p-4 dark:border-red-500/20 dark:bg-red-500/10">
                <p class="text-sm font-semibold text-red-700 dark:text-red-400">
                    Please correct the following errors.
                </p>

                <ul class="mt-2 list-inside list-disc space-y-1 text-sm text-red-600 dark:text-red-300">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="mb-5 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-700 dark:border-green-500/20 dark:bg-green-500/10 dark:text-green-400">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm font-medium text-red-700 dark:border-red-500/20 dark:bg-red-500/10 dark:text-red-400">
                {{ session('error') }}
            </div>
        @endif

        {{-- Form Card --}}
        <div class="overflow-hidden rounded-2xl border border-neutral-200/80 bg-white shadow-xl shadow-neutral-100/50 dark:border-white/[0.08] dark:bg-neutral-900 dark:shadow-none">

            <form
                action="{{ role_route('role.designations.update', ['designation' => $designation->id]) }}"
                method="POST"
            >
                @csrf
                @method('PUT')

                {{-- Card Header --}}
                <div class="border-b border-neutral-100 bg-neutral-50/50 px-6 py-5 dark:border-white/[0.05] dark:bg-white/[0.01] sm:px-8">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h4 class="text-xs font-semibold uppercase tracking-wider text-neutral-500 dark:text-neutral-400">
                                Designation Information
                            </h4>

                            <p class="mt-1 text-xs text-neutral-400 dark:text-neutral-500">
                                Record ID: #{{ $designation->id }}
                            </p>
                        </div>

                        <span class="inline-flex w-fit items-center rounded-full px-3 py-1 text-xs font-semibold {{ $designation->is_active ? 'bg-green-50 text-green-700 dark:bg-green-500/10 dark:text-green-400' : 'bg-red-50 text-red-700 dark:bg-red-500/10 dark:text-red-400' }}">
                            <span class="mr-2 h-1.5 w-1.5 rounded-full {{ $designation->is_active ? 'bg-green-500' : 'bg-red-500' }}"></span>
                            {{ $designation->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>

                {{-- Form Fields --}}
                <div class="space-y-6 p-6 sm:p-8">
                    @include('backend.pages.HR.designations._form', [
                        'designation' => $designation
                    ])
                </div>

                {{-- Footer --}}
                <div class="flex flex-col-reverse gap-3 border-t border-neutral-100 bg-neutral-50/80 px-6 py-4 dark:border-white/[0.05] dark:bg-white/[0.02] sm:flex-row sm:items-center sm:justify-between sm:px-8">

                    <p class="text-xs text-neutral-500 dark:text-neutral-400">
                        Last updated:
                        {{ $designation->updated_at?->format('d M Y, h:i A') ?? 'N/A' }}
                    </p>

                    <div class="flex items-center justify-end gap-3">
                        <a href="{{ role_route('role.designations.index') }}"
                            class="inline-flex items-center justify-center rounded-xl border border-neutral-200 px-5 py-2.5 text-sm font-medium text-neutral-700 transition hover:bg-neutral-100 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800">
                            Cancel
                        </a>

                        <button type="submit"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-brand-600 px-6 py-2.5 text-sm font-semibold text-white shadow-md shadow-brand-600/20 transition hover:bg-brand-700 active:scale-[0.98]">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m5 12 4 4L19 6" />
                            </svg>
                            Update Designation
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection