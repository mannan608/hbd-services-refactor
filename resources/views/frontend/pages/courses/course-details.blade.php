@extends('frontend.layouts.app')

@section('title', 'Course Details')

@section('content')
    {{-- Hero Section --}}
    <section class="relative py-8 md:py-0 min-h-60 md:min-h-70 lg:min-h-80 flex items-center overflow-hidden -mt-4">

        <div class="absolute inset-0 z-0">
            <img src="{{ asset('frontend-img/course-page-header.jpg') }}" alt="Training" class="w-full h-full object-cover">

            <div class="absolute inset-0 bg-linear-to-r  bg-black/70 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">

            <div class="max-w-2xl mx-auto">

                <h1 class="text-2xl font-bold tracking-tight text-white sm:text-3xl lg:text-4xl uppercase text-center">
                    Explore Thousands of Courses
                </h1>

            </div>
        </div>

    </section>

    <div class="min-h-screen bg-neutral-50/50 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">

            <!-- Top Grid: Course Header + Sticky Sidebar Card -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                <!-- Left Column: Course Header & Overview -->
                <div class="lg:col-span-8 space-y-8">
                    <div>
                        <div class="flex items-center gap-2 text-sm font-semibold uppercase tracking-wider text-brand-500">
                            <span>{{ $course->university->name }}</span>
                        </div>
                        <h1 class="mt-2 text-3xl font-extrabold tracking-tight text-neutral-900 sm:text-4xl">
                            {{ $course->title }}
                        </h1>

                        <!-- Meta Tags -->
                        <div class="mt-4 flex flex-wrap items-center gap-3 text-xs font-medium text-neutral-600">
                            <span
                                class="inline-flex items-center gap-1.5 rounded-full bg-neutral-100 px-3 py-1 text-neutral-700">
                                <svg class="h-3.5 w-3.5 text-neutral-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                </svg>
                                {{ $course->degree_level }}
                            </span>
                            <span
                                class="inline-flex items-center rounded-full bg-neutral-100 px-3 py-1 text-neutral-500 font-mono">
                                CRICOS: {{ $course->code }}
                            </span>
                            <span class="inline-flex items-center gap-1.5 text-neutral-500">
                                <svg class="h-4 w-4 text-neutral-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Thurgoona, Australia
                            </span>
                        </div>
                    </div>

                    <!-- Course Description -->
                    <div class="prose prose-neutral max-w-none">
                        <h3 class="text-lg font-bold text-neutral-900">Course Overview</h3>
                        <p class="text-sm text-neutral-600 leading-relaxed">
                            {{ $course->overview }}
                        </p>
                        <div class="mt-4">
                            <button
                                class="inline-flex items-center gap-2 rounded-xl bg-brand-500 px-5 py-2.5 text-sm font-bold text-white  transition hover:bg-brand-600 active:scale-95">
                                <span>Find a Counselor</span>
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Value Highlights Grid -->
                    <div
                        class="grid grid-cols-1 md:grid-cols-3 gap-4 rounded-2xl border border-neutral-200/80 bg-white p-5 ">
                        <div class="flex items-start gap-3">
                            <div class="rounded-lg bg-brand-50 p-2 text-brand-500 shrink-0">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-neutral-900">Real Career Pathways</h4>
                                <p class="text-xs text-neutral-500 mt-0.5">Urban Planner, Policy Officer, or Community
                                    Consultant.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="rounded-lg bg-brand-50 p-2 text-brand-500 shrink-0">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-neutral-900">Hands-on Training</h4>
                                <p class="text-xs text-neutral-500 mt-0.5">Practical skills with real urban design
                                    scenarios.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="rounded-lg bg-brand-50 p-2 text-brand-500 shrink-0">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-neutral-900">Industry Aligned</h4>
                                <p class="text-xs text-neutral-500 mt-0.5">Accredited & taught by experts in sustainable
                                    development.</p>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Right Column: Sticky Summary Sidebar Card -->
                <div class="lg:col-span-4 lg:sticky lg:top-6">
                    <div class="rounded-2xl border border-neutral-200 bg-white p-6  space-y-5">
                        <!-- Logo Header -->

                        <div class="flex items-center px-4 py-2 gap-4 bg-neutral-50 rounded-xl border border-neutral-100">
                            <div
                                class="flex h-12 w-12 border border-neutral-200  shrink-0 items-center justify-center rounded-lg bg-neutral-50 p-2">
                                <img src="{{ asset($course->university->logo) }}" alt="{{ $course->university->name }}"
                                    class="h-full w-full object-contain">
                            </div>

                            <div class="min-w-0">
                                <p class="truncate text-sm font-bold tracking-tight text-neutral-900">
                                    {{ $course->university->name }}
                                </p>
                                <p class="mt-0.5 text-xs text-neutral-500">
                                    University
                                </p>
                            </div>
                        </div>

                        <div class="space-y-3.5 text-sm">
                            <div class="flex justify-between pb-2 border-b border-neutral-100">
                                <span class="text-neutral-500">Annual Fee</span>
                                <span class="font-bold text-neutral-900">USD ${{ $course->tuition_fee * 12 }} / year</span>
                            </div>
                            <div class="flex justify-between pb-2 border-b border-neutral-100">
                                <span class="text-neutral-500">Estimated Total Fee</span>
                                <span class="font-bold text-neutral-900">USD ${{ $course->tuition_fee * 13 }}</span>
                            </div>
                            <div class="flex justify-between pb-2 border-b border-neutral-100">
                                <span class="text-neutral-500">Duration</span>
                                {{ intdiv($course->duration_months, 12) }} Years Full-time
                            </div>
                            <div class="flex justify-between pb-2 border-b border-neutral-100">
                                <span class="text-neutral-500">Next Intake</span>

                                @php
                                    $intake = $course->university->intakes->where('status', 'upcoming')->first();
                                @endphp

                                <span class="font-bold text-brand-500">
                                    {{ $intake ? $intake->name . ' ' . $intake->year : 'N/A' }}
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-neutral-500">Application Fee</span>
                                <span class="font-bold text-emerald-600">Online: Free</span>
                            </div>
                        </div>

                        <button
                            class="w-full rounded-xl bg-brand-500 py-3 text-sm font-bold text-white shadow-md hover:bg-brand-600 transition">
                            Apply Now
                        </button>
                    </div>
                </div>

            </div>

            <!-- Section: Academic Requirements & Outcomes -->
            <div class="bg-white rounded-3xl p-8 border border-neutral-100  space-y-10 mt-12">

                <!-- Entry Requirements -->

                @if (!empty($course->outcomes))
                    <div>
                        <div class="flex items-center gap-2 mb-4">
                            <span class="rounded-lg bg-brand-500 p-2 text-white">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            <h2 class="text-xl font-bold">Entry Requirements</h2>
                        </div>
                        <div
                            class="rounded-2xl  p-5 border border-brand-300  text-sm text-neutral-600 leading-relaxed space-y-3">
                            <p>
                                Bachelor degree with Honours Class 1 or Class 2, Division 1, or a Master's degree with a
                                significant research component, or equivalent.
                            </p>
                            @foreach ($course->entry_requirements as $requirement)
                                <p class="text-neutral-600">
                                    {{ $requirement }}
                                </p>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Career Outcomes -->
                @if (!empty($course->outcomes))
                    <div>
                        <div class="flex items-center gap-2 mb-4">
                            <span class="rounded-lg bg-brand-500 p-2 text-white">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                </svg>
                            </span>
                            <h2 class="text-xl font-bold">Career Outcomes</h2>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            @foreach ($course->outcomes as $outcome)
                                <div
                                    class="flex items-center gap-2 rounded-xl bg-brand-100 px-4 py-3 text-sm font-semibold text-brand-500">
                                    <span class="h-2 w-2 rounded-full bg-brand-500"></span>
                                    {{ $outcome }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <!-- Campus Locations Grid -->
                <div>
                    <h2 class="text-xl font-bold mb-4">Available Campus Locations</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($course->campuses as $location)
                            <div class="w-full max-w-sm">
                                <div
                                    class="group relative overflow-hidden rounded-2xl
                                    border border-slate-200 bg-white
                                     transition-all duration-300
                                    hover:-translate-y-1 hover:border-blue-200
                                    hover:shadow-xl">

                                    <div class="p-5">

                                        <!-- Header -->
                                        <div class="flex items-start justify-between gap-4">

                                            <div class="flex items-center gap-3">

                                                <!-- Location Icon -->
                                                <div
                                                    class="flex h-11 w-11 items-center justify-center rounded-full bg-blue-50 text-[#1068b2]">

                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                        stroke-width="1.8" viewBox="0 0 24 24">

                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M12 21s7-5.2 7-11a7 7 0 10-14 0c0 5.8 7 11 7 11z" />

                                                        <circle cx="12" cy="10" r="2.5" />
                                                    </svg>
                                                </div>

                                                <div>
                                                    <h3 class="text-base font-bold text-slate-900">
                                                        {{ $location->name }}
                                                    </h3>

                                                    <p class="mt-0.5 text-xs font-medium text-slate-500">
                                                        {{ $location->address }}
                                                    </p>
                                                </div>

                                            </div>

                                            <!-- Country -->
                                            <span
                                                class="rounded-full bg-emerald-50 px-2.5 py-1 text-[10px] font-semibold text-emerald-700">
                                                {{ $course->university->country->name }}
                                            </span>

                                        </div>

                                        <!-- Divider -->
                                        <div class="my-5 border-t border-slate-100"></div>

                                        <!-- Location Info -->
                                        <div class="flex items-center gap-2 text-xs text-slate-500">

                                            <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor"
                                                stroke-width="1.8" viewBox="0 0 24 24">

                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 2v20M2 12h20" />
                                            </svg>

                                            <span>
                                                Explore this location on map
                                            </span>

                                        </div>

                                        <!-- Button -->
                                        <a href="#"
                                            class="mt-4 flex w-full items-center justify-center gap-2 rounded-xl bg-[#1068b2]  px-4 py-3 text-sm font-semibold text-white
                                             shadow-blue-200
                                            transition-all duration-200
                                            hover:bg-[#0d5795] hover:shadow-md">

                                            View on map

                                            <svg class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-1"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                viewBox="0 0 24 24">

                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M5 12h14m-6-6 6 6-6 6" />
                                            </svg>

                                        </a>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

            <!-- Section: Similar Courses -->

            @if ($relatedCourses->count() > 0)
                <div class="space-y-6">
                    <div class="flex items-center justify-between">
                        <h2 class="text-2xl font-bold text-neutral-900">Similar Courses</h2>
                        <button
                            class="rounded-xl border border-neutral-300 bg-white px-4 py-2 text-sm font-semibold text-neutral-700 hover:bg-neutral-50 transition">
                            View All Courses
                        </button>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach ($relatedCourses as $relatedcourse)
                            <a href="{{ route('course-details', ['course' => $relatedcourse]) }}"
                                class="group rounded-2xl border border-neutral-200 bg-white p-5 shadow-xs hover:shadow-md transition flex flex-col justify-between">
                                <div>
                                    <div
                                        class="flex items-center px-4 py-2 gap-4 bg-neutral-50 rounded-xl border border-neutral-100">
                                        <div
                                            class="flex h-12 w-12 border border-neutral-200  shrink-0 items-center justify-center rounded-lg bg-neutral-50 p-2">
                                            <img src="{{ asset($relatedcourse->university->logo) }}"
                                                alt="{{ $relatedcourse->university->name }}"
                                                class="h-full w-full object-contain">
                                        </div>

                                        <div class="min-w-0">
                                            <p class="truncate text-sm font-bold tracking-tight text-neutral-900">
                                                {{ $relatedcourse->university->name }}
                                            </p>
                                            <p class="mt-0.5 text-xs text-neutral-500">
                                                University
                                            </p>
                                        </div>
                                    </div>
                                    <span
                                        class="text-[10px] font-bold text-brand-500 uppercase">{{ $relatedcourse->category->name }}</span>
                                    <h3
                                        class="text-sm font-bold text-neutral-900 mt-1 group-hover:text-brand-500 transition-colors">
                                        {{ $relatedcourse->title }}
                                    </h3>
                                    <p class="text-xs text-neutral-500 mt-2">{{ $relatedcourse->degree_level }} • CRICOS
                                        {{ $relatedcourse->code }}</p>
                                </div>

                                <div class="mt-6 pt-4 border-t border-neutral-100 flex items-center justify-between">
                                    <span
                                        class="text-xs text-brand-500">{{ $relatedcourse->university->country->name }}</span>
                                    <button
                                        class="rounded-lg bg-brand-100 px-3 py-1.5 text-xs font-bold text-brand-500 group-hover:bg-brand-500 group-hover:text-white transition">
                                        View →
                                    </button>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
