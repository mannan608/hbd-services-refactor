@extends('backend.layouts.app')

@section('content')
    <form action="{{ role_route('role.universities.update', ['university' => $university->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('backend.pages.universities._form', [
            'university' => $university,
            'formMode' => 'edit',
        ])
    </form>
@endsection
