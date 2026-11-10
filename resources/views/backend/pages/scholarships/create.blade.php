@extends('backend.layouts.app')

@section('content')
    <form action="{{ role_route('role.scholarships.store') }}"
          method="POST">

        @csrf

       @include('backend.pages.scholarships._form')

    </form>
@endsection
