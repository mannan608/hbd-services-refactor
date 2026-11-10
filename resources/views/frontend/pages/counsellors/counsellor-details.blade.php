@extends('frontend.layouts.app')

@section('title', $counsellor->user?->name ?? 'Counsellor')


@section('content')
    {{-- Hero Section --}}
    <section class="relative py-8 md:py-0 min-h-60 md:min-h-70 lg:min-h-80 flex items-center overflow-hidden -mt-4">

        <div class="absolute inset-0 z-0">
            <img src="{{ asset('frontend-img/course-page-header.jpg') }}" alt="Training" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-linear-to-r  bg-black/70 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="relative z-10 max-w-3xl">
                <div
                    class="inline-flex items-center space-x-2 bg-white/10 backdrop-blur-md px-3 py-1 rounded-full text-xs font-medium tracking-wide text-brand-200 mb-3">
                    <i class="fa-regular fa-paper-plane"></i>
                    <span>Schedule Consultation</span>
                </div>
                <h1 class="text-2xl font-bold tracking-tight text-white sm:text-3xl lg:text-4xl uppercase">
                    We focus on your Story & Success
                </h1>
                
                <p class="text-brand-100 text-xs sm:text-sm mt-2 leading-relaxed">
                    Select your desired service, pick an available date and time slot, and confirm your confidential session.
                </p>
            </div>
        </div>

    </section>

    <section class="mt-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
           <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- LEFT COLUMN: Counsellor Profile Details (4 Cols) -->
            <div class="lg:col-span-4 bg-white rounded-3xl p-6 sm:p-8 border border-neutral-100 shadow-sm space-y-6">
                @include('frontend.pages.counsellors.profile', ['counsellor' => $counsellor])
            </div>

            <!-- RIGHT COLUMN: Booking Form & Selection (8 Cols) -->
            <div class="lg:col-span-8 ">
                @include('frontend.pages.counsellors.appointment', ['counsellor' => $counsellor])               

            </div>

        </div>
        </div>
    </section>
@endsection
