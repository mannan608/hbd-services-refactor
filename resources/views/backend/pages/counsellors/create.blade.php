@extends('backend.layouts.app')

@section('content')
      <form
        action="{{ role_route('role.counsellors.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf

        @include('backend.pages.counsellors._form')

        <div class="mt-6 lg:w-8/12">
            <button
                type="submit"
                class="w-full rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-brand-500"
            >
                Add Counsellors
            </button>
        </div>

    </form>
       
@endsection
