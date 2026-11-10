
@extends('backend.layouts.app')

@section('content')
      <form
        action="{{ role_route('role.events.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf

           @include('backend.pages.events._form') 

    </form>
       
@endsection

