@extends('backend.layouts.app')

@section('content')
    <form
        action="{{ role_route('role.events.update', ['event' => $event]) }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

                @include('backend.pages.events._form')
    </form>
@endsection
