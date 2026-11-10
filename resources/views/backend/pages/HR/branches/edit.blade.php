
@extends('backend.layouts.app')

@section('content')
    <div class="mx-auto max-w-3xl pb-12">

        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-800 dark:text-white">
                    Edit Branch
                </h1>
                <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                    Update branch information and status.
                </p>
            </div>

            <a href="{{ route('role.branches.index', ['role' => request()->route('role')]) }}"
                class="inline-flex h-10 items-center justify-center gap-2 rounded-lg border border-neutral-300 px-4 text-sm font-semibold text-neutral-700 hover:bg-neutral-50 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800">
                <span aria-hidden="true">&larr;</span> Back to Branches
            </a>
        </div>

        <div class="overflow-hidden rounded-2xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900">

            <div class="border-b border-neutral-200 px-6 py-5 dark:border-neutral-800">
                <h2 class="text-base font-semibold text-neutral-800 dark:text-white">
                    Update Branch Information
                </h2>
                <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                    Editing: {{ $branch->name }}
                </p>
            </div>

            <form action="{{ role_route('role.branches.update', [
                'role' => request()->route('role'),
                'branch' => $branch->id
            ]) }}" method="POST" class="p-6">

                @csrf
                @method('PUT')

                @include('backend.pages.HR.branches._form')

                <div class="mt-8 flex flex-col-reverse justify-end gap-3 border-t border-neutral-200 pt-5 sm:flex-row dark:border-neutral-800">

                    <a href="{{ role_route('role.branches.index', ['role' => request()->route('role')]) }}"
                        class="inline-flex h-11 items-center justify-center rounded-lg border border-neutral-300 px-5 text-sm font-semibold text-neutral-700 hover:bg-neutral-50 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800">
                        Cancel
                    </a>

                    <button type="submit"
                        class="inline-flex h-11 items-center justify-center gap-2 rounded-lg bg-brand-600 px-5 text-sm font-semibold text-white transition hover:bg-brand-700">
                        Update Branch
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
