@extends('backend.layouts.app')

@section('content')
    <form action="{{ role_route('role.courses.store') }}" method="POST">
        @csrf

        @include('backend.pages.courses._form')

    </form>
@endsection