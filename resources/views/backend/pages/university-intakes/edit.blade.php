@extends('backend.layouts.app')

@section('content')

<div class="container-fluid">
    <form action="{{ role_route('role.university-intakes.update', ['university' => $university->id, 'university_intake' => $intake->id]) }}"
          method="POST">

        @csrf
        @method('PUT')

        @include('backend.pages.university-intakes._form')

    </form>

</div>

@endsection
