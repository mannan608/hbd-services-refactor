@extends('backend.layouts.app')

@section('content')
    <form action="{{ role_route('role.courses.update', ['course' => $course->id]) }}" method="POST">
        @csrf
        @method('PUT')

        @include('backend.pages.courses._form')

    </form>
@endsection