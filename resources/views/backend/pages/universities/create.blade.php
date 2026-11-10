@extends('backend.layouts.app')

@section('content')
    <form
        action="{{ role_route('role.universities.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="w-full"
    >
        @csrf

        @include('backend.pages.universities._form', [
            'university' => null,
            'formMode' => 'create',
        ])

    </form>
@endsection