
@extends('backend.layouts.app')

@section('content')
    <div class="mx-auto max-w-3xl pb-12">

        <div class="mb-6">
            <h1 class="text-2xl font-bold text-neutral-800 dark:text-white">
                Create Team
            </h1>
            <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                Create a team under a department and assign a team lead.
            </p>
        </div>

        <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-800 dark:bg-neutral-900">

            <form action="{{ route('role.teams.store', ['role' => request()->route('role')]) }}"
                method="POST">
                @csrf

                @include('backend.pages.HR.teams._form')

                <div class="mt-8 flex flex-col-reverse justify-end gap-3 sm:flex-row">

                    <a href="{{ route('role.teams.index', ['role' => request()->route('role')]) }}"
                        class="inline-flex h-11 items-center justify-center rounded-lg border border-neutral-300 px-5 text-sm font-semibold text-neutral-700 hover:bg-neutral-50 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800">
                        Cancel
                    </a>

                    <button type="submit"
                        class="inline-flex h-11 items-center justify-center rounded-lg bg-brand-600 px-5 text-sm font-semibold text-white hover:bg-brand-700">
                        Create Team
                    </button>

                </div>
            </form>
        </div>
    </div>
@endsection
