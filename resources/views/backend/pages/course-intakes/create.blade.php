@extends('backend.layouts.app')

@section('content')
    <form action="{{ role_route('role.course-intakes.store') }}"
          method="POST">

        @csrf

        @include('backend.pages.course-intakes._form')

    </form>
@endsection
