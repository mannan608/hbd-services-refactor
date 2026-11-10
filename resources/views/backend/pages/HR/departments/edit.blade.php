@extends('backend.layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto pb-12">
        <div class="flex items-center justify-between gap-4 mb-6">
            <div>
                <h3 class="text-xl font-bold text-neutral-900 dark:text-white">Edit Department</h3>
                <p class="text-sm text-neutral-500 dark:text-neutral-400">Update {{ $department->name }}.</p>
            </div>
            <a href="{{ role_route('role.departments.index') }}" class="rounded-xl border px-4 py-2 text-sm">Back to List</a>
        </div>
        <div class="rounded-2xl border border-neutral-200 dark:border-neutral-800 bg-white dark:bg-neutral-900 shadow-sm overflow-hidden">
            <form action="{{ role_route('role.departments.update', ['department' => $department->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="p-6 sm:p-8">
                    @include('backend.pages.HR.departments._form')
                </div>
                <div class="flex justify-end gap-3 px-6 py-4 border-t border-neutral-100 dark:border-neutral-800">
                    <button type="submit" class="rounded-xl bg-brand-600 px-6 py-2.5 text-sm font-semibold text-white">Update Department</button>
                </div>
            </form>
        </div>
    </div>
@endsection
