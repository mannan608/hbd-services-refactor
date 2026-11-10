@extends('frontend.layouts.app')

@section('content')
    <section class="relative overflow-hidden">
        <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">


            <!-- Main Content -->
            <div class="mt-14 grid grid-cols-1 gap-8  lg:grid-cols-[1fr_560px] lg:gap-12">

                <!-- Left Content -->
                <div class="flex flex-col justify-center">

                    <!-- Intro -->
                    <div class="max-w-2xl">
                        <span class="text-sm font-semibold uppercase tracking-wider text-brand-500">
                            Let's Talk
                        </span>

                        <h2 class="mt-2 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl lg:text-4xl">
                            We’re here to help you.
                        </h2>

                        <p class="mt-4 text-sm leading-relaxed text-slate-600 sm:text-base">
                            Whether you have a question about our services, need
                            assistance, or simply want to share your thoughts,
                            feel free to reach out. Our team is ready to listen.
                        </p>
                    </div>


                    <!-- Contact Information -->
                    <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2">

                        <!-- Email -->
                        <div
                            class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                            <div class="flex items-start gap-4">
                                <div
                                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-brand-500/10 text-brand-500">

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="h-5 w-5">
                                        <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                                    </svg>
                                </div>

                                <div class="min-w-0">
                                    <p class="text-sm font-semibold text-slate-900">
                                        Email Us
                                    </p>

                                    <p class="mt-1 break-all text-sm text-slate-500">
                                        info@hbdservices.com
                                    </p>
                                </div>
                            </div>
                        </div>


                        <!-- Phone -->
                        <div
                            class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                            <div class="flex items-start gap-4">
                                <div
                                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-brand-500/10 text-brand-500">

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="h-5 w-5">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2
                                                    19.79 19.79 0 0 1-8.63-3.07
                                                    19.5 19.5 0 0 1-6-6
                                                    19.79 19.79 0 0 1-3.07-8.67
                                                    A2 2 0 0 1 4.11 2h3
                                                    a2 2 0 0 1 2 1.72
                                                    12.84 12.84 0 0 0 .7 2.81
                                                    2 2 0 0 1-.45 2.11L8.09 9.91
                                                    a16 16 0 0 0 6 6l1.27-1.27
                                                    a2 2 0 0 1 2.11-.45
                                                    12.84 12.84 0 0 0 2.81.7
                                                    A2 2 0 0 1 22 16.92z">
                                        </path>
                                    </svg>
                                </div>

                                <div>
                                    <p class="text-sm font-semibold text-slate-900">
                                        Call Us
                                    </p>

                                    <p class="mt-1 text-sm text-slate-500">
                                        09617-990099
                                    </p>
                                </div>
                            </div>
                        </div>


                        <!-- Location -->
                        <div
                            class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                            <div class="flex items-start gap-4">
                                <div
                                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-brand-500/10 text-brand-500">

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="h-5 w-5">
                                        <path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                </div>

                                <div>
                                    <p class="text-sm font-semibold text-slate-900">
                                        Our Location
                                    </p>

                                    <p class="mt-1 text-sm leading-6 text-slate-500">
                                        Standard Center, 27/1, 7th Floor, New Eskaton Road, Dhaka-1000
                                    </p>
                                </div>
                            </div>
                        </div>


                        <!-- Working Hours -->
                        <div
                            class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                            <div class="flex items-start gap-4">
                                <div
                                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-brand-500/10 text-brand-500">

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="h-5 w-5">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="12 6 12 12 16 14"></polyline>
                                    </svg>
                                </div>

                                <div>
                                    <p class="text-sm font-semibold text-slate-900">
                                        Working Hours
                                    </p>

                                    <p class="mt-1 text-sm leading-6 text-slate-500">
                                        Sat - Thu · 9:00 AM - 5:00 PM
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>


                    <!-- Bottom Highlight -->
                    <div
                        class="mt-8 flex items-center gap-4 rounded-2xl border border-brand-500/10 bg-brand-500/5 p-4 lg:p-5">

                        <div
                            class="flex h-8 w-8 md:h-10 md:w-10 lg:h-12 lg:w-12 shrink-0 items-center justify-center rounded-full bg-brand-500 text-white">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                <path d="M20 6 9 17l-5-5"></path>
                            </svg>
                        </div>

                        <div>
                            <p class="font-semibold text-slate-900 text-[15px]">
                                We usually respond within 24 hours.
                            </p>

                            <p class="mt-1 text-sm text-slate-500">
                                Your message matters to us.
                            </p>
                        </div>
                    </div>

                </div>


                <!-- Contact Form -->
                <div id="get-in-touch-form" class="relative mt-0 md:mt-8 lg:mt-10">

                    <!-- Decorative background -->
                    <div class="absolute -inset-2 -z-10 rounded-[2rem] bg-brand-500/5 blur-xl">
                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white p-5  sm:p-6 lg:p-7">

                        <!-- Form Header -->
                        <div class="mb-6">
                            <div
                                class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-brand-500/10 text-brand-500">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="h-6 w-6">
                                    <path d="m22 2-7 20-4-9-9-4Z"></path>
                                    <path d="M22 2 11 13"></path>
                                </svg>
                            </div>

                            <h2 class="text-xl font-bold text-slate-900 sm:text-2xl">
                                Any Questions? Ask Us!
                            </h2>

                            <p class="mt-2 text-sm leading-6 text-slate-500">
                                Fill out the form below and we’ll get back to you shortly.
                            </p>
                        </div>

                        <!-- Existing Form Component -->
                        <x-frontend.get-in-touch />

                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- REAL-TIME GOOGLE MAP & GLOBAL OFFICES SECTION -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">OUR GLOBAL OFFICES</h2>
            <p class="text-slate-500 text-sm mt-1">Explore our interactive map to find our exact office locations
                worldwide!</p>
        </div>

        <!-- Real Live Google Map Container -->
        <div
            class="relative w-full h-[450px] sm:h-[550px] rounded-3xl overflow-hidden shadow-md border border-slate-200/80 mb-10">
            <!-- Google Maps API Canvas -->
            @include('frontend.pages.google-map.google-map')

            @if (config('services.google_maps.key'))
                {{-- <div id="real-google-map" class="w-full h-full"></div> --}}
                
            @else
                <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                    <p class="text-sm text-slate-500">Office map is unavailable until a Google Maps API key is configured.</p>
                </section>
            @endif
        </div>

    </section>


@endsection
