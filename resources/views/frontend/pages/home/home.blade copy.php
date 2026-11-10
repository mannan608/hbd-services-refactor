@extends('frontend.layouts.app')


@section('content')


    @include('frontend.pages.home.sections.hero')
     @include('frontend.pages.home.sections.journing')

    {{-- @include('frontend.pages.home.sections.stats') --}}
    @include('frontend.pages.common-section.destination', ['destinations' => $destinations])

 @include('frontend.pages.common-section.service-section')
 @include('frontend.pages.home.sections.language-academy')
 @include('frontend.pages.home.sections.digital-platform')
 @include('frontend.pages.home.sections.achievers')
 @include('frontend.pages.home.sections.certification-awards')



    {{-- @include('frontend.pages.home.sections.course-section') --}}

    {{-- @include('frontend.pages.home.sections.emerging-career') --}}

    {{-- @include('frontend.pages.home.sections.how-it-work')

    <section class="bg-brand-50 py-16 md:py-20 lg:py-24">
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10 relative overflow-hidden rounded-3xl bg-[#155b9d] shadow-xl reveal-on-scroll opacity-0 translate-y-10 transition-all duration-1000 ease-out">

            <!-- Background Image -->
            <img src="{{ asset('frontend-img/home-aus-cta.avif') }}" alt="Australia Landmarks"
                class="absolute inset-0 h-full w-full object-cover object-center transition-transform duration-700 hover:scale-105" />

            <!-- Gradient Overlay (using #1968b2 and #155b9d with opacity so the image stays visible) -->
            <div
                class="absolute inset-0 bg-gradient-to-r from-[#155b9d]/90 via-[#1968b2]/80 to-[#155b9d]/70 backdrop-brightness-90">
            </div>

            <!-- Content Container -->
            <div
                class="relative z-10 flex flex-col items-center justify-center px-6 py-12 text-center sm:px-12 sm:py-16 md:py-20">

                <!-- Quote Icon -->
                <svg class="mb-4 h-10 w-10 text-white/40 sm:h-12 sm:w-12 transition-all duration-700 ease-out delay-150"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                </svg>

                <!-- Quote Text -->
                <h2
                    class="max-w-3xl text-2xl font-black uppercase leading-tight tracking-wide text-white drop-shadow-md sm:text-3xl md:text-4xl transition-all duration-700 ease-out delay-200">
                    "Imagine arriving in Australia knowing you've made the right decision. That's the confidence we build
                    from day one."
                </h2>

                <!-- CTA Button -->
                <a href="{{ route('achieve') }}"
                    class="mt-8 inline-flex items-center gap-2 rounded-full bg-white px-7 py-3.5 text-xs font-bold uppercase tracking-wider text-[#155b9d] shadow-md transition-all duration-500 ease-out hover:bg-slate-100 hover:text-[#1968b2] hover:shadow-lg hover:scale-105 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-[#155b9d] delay-300">
                    <span>See what you can achieve</span>
                    <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>

            </div>
        </div>
    </section>

    @include('frontend.pages.home.sections.expo-event')

    @include('frontend.pages.home.sections.counseller-section', ['counsellors' => $counsellors]) --}}

    @include('frontend.pages.common-section.about-section')

    {{-- @include('frontend.pages.common-section.help-center') --}}

    @include('frontend.pages.home.sections.google-reviews')

    @include('frontend.pages.common-section.university-partners')

    @include('frontend.pages.common-section.cta-section')


@endsection
