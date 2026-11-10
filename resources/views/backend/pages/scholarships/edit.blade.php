

@extends('backend.layouts.app')

@section('content')
    <form action="{{ role_route('role.scholarships.update', ['scholarship' => $scholarship]) }}"
          method="POST">

        @csrf
        @method('PUT')

        @include('backend.pages.scholarships._form')

    </form>
@endsection

