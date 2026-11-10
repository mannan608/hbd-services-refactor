@extends('backend.layouts.app')

@section('content')
    <form action="{{ role_route('role.course-categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">

            <div class="lg:col-span-8 space-y-6">

                <div class="rounded-2xl border border-neutral-200 bg-white dark:border-neutral-800 dark:bg-neutral-900">

                    <div class="border-b border-neutral-100 p-5 dark:border-neutral-800">
                        <h2 class="text-lg font-semibold text-neutral-800 dark:text-white">
                            Course Category Information
                        </h2>
                    </div>

                    <div class="p-5 space-y-5">

                        {{-- Name --}}
                        <x-form.input-text name="name" label=" Course Category Name" value="{{ old('name') }}"
                            placeholder="Enter  Course Category Name..." />

                           {{-- Name --}}
                        <x-form.textarea-input name="description" label="Category Description" value="{{ old('description') }}"
                            placeholder="Enter  Category Description..." />

                    </div>

                </div>
                <button type="submit"
                    class="w-full rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-brand-500">
                    Create Category
                </button>

            </div>

        </div>
    </form>
@endsection
