@extends('backend.layouts.app')

@section('content')
   <form action="{{ role_route('role.university-intakes.store') }}" method="POST">
    @csrf

        @include('backend.pages.university-intakes._form')

    </form>

    
@if ($errors->any())
    <div class="bg-red-100 p-4 rounded">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection
