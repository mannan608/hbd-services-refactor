@extends('frontend.layouts.app')

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
                    Explore Thousands of Providers Across Australia
                </h1>
                {{-- <button class="mt-3 inline-flex items-center gap-2 rounded-xl bg-brand-500 px-5 py-2.5 text-sm font-bold text-white  transition hover:bg-brand-600 active:scale-95">
              <span>Check if you are eligible</span>
              <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </button> --}}

            </div>
        </div>

    </section>

    <!-- Main Content Grid -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Left & Center Columns (Overview, Pathways, Content Sections) -->
            <div class="lg:col-span-2 space-y-12">

                <!-- Overview Section -->
                <section class="bg-white rounded-3xl p-8 border border-neutral-100 ">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-neutral-900">Overview</h2>
                        <div class="flex items-center space-x-4 text-xs font-semibold text-neutral-500">
                            <span class="flex items-center"><i class="fa-regular fa-clock mr-1 text-brand-500"></i> 50 hrs
                                ago</span>
                            <span class="flex items-center"><i class="fa-regular fa-eye mr-1 text-brand-500"></i> 1 Spa
                                Publication • release</span>
                        </div>
                    </div>
                    <p class="text-neutral-600 leading-relaxed text-base">
                        Marmora municipal Adelaide was status-free tertiary institution, its status a primary blueprinting
                        educational hub for arts, music, visual and cultural studies intelligence campus. Underway with
                        Australian Council of States, it was securely community awareness framework and standard core
                        framework campus mental security. This team was structured fully with industry experts, under Study
                        configuration program manager. During the university era within international environment, campus
                        core ecosystem rendered local identity with international identity perspective.
                    </p>
                </section>

                <!-- Quick Pathway Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div
                        class="bg-white p-6 rounded-2xl border border-neutral-100  hover:border-brand-300 transition group">
                        <div
                            class="w-10 h-10 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center mb-4 group-hover:bg-brand-600 group-hover:text-white transition">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <h3 class="font-semibold text-neutral-900 mb-1">Direct Career Pathways</h3>
                        <p class="text-sm text-neutral-500">Structured action frameworks tailored for community consultants.
                        </p>
                    </div>
                    <div
                        class="bg-white p-6 rounded-2xl border border-neutral-100  hover:border-brand-300 transition group">
                        <div
                            class="w-10 h-10 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center mb-4 group-hover:bg-brand-600 group-hover:text-white transition">
                            <i class="fa-solid fa-award"></i>
                        </div>
                        <h3 class="font-semibold text-neutral-900 mb-1">Hands-on Training</h3>
                        <p class="text-sm text-neutral-500">Connected with academia tasks, real case practices.</p>
                    </div>
                    <div
                        class="bg-white p-6 rounded-2xl border border-neutral-100  hover:border-brand-300 transition group">
                        <div
                            class="w-10 h-10 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center mb-4 group-hover:bg-brand-600 group-hover:text-white transition">
                            <i class="fa-solid fa-briefcase"></i>
                        </div>
                        <h3 class="font-semibold text-neutral-900 mb-1">Industry Alignment</h3>
                        <p class="text-sm text-neutral-500">Streamlined course mapping to support student identity development.
                        </p>
                    </div>
                </div>

            </div>
            <!-- Right Sidebar Column (University Highlights & Metrics) -->
            <div class="space-y-6">
                <div
                    class="bg-gradient-to-br from-brand-700 to-brand-900 text-white rounded-3xl p-6 shadow-xl relative overflow-hidden">
                    <div
                        class="absolute right-0 top-0 translate-x-4 -translate-y-4 w-32 h-32 bg-white/5 rounded-full blur-2xl">
                    </div>

                    <!-- University Logo Box -->
                    <div class="bg-white rounded-2xl p-4 mb-6 text-center ">
                        <span class="font-black tracking-wider text-brand-800 text-sm uppercase">ADELAIDE UNIVERSITY</span>
                    </div>

                    <h3 class="text-lg font-bold mb-6 text-center tracking-wide">University Highlights</h3>

                    <div class="space-y-4">
                        <div
                            class="bg-white/10 backdrop-blur-md rounded-2xl p-4 flex items-center justify-between border border-white/10">
                            <div>
                                <span
                                    class="text-xs text-brand-200 block uppercase tracking-wider font-semibold">SATISFACTION</span>
                                <span class="text-2xl font-black">2977</span>
                            </div>
                            <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-brand-200">
                                <i class="fa-solid fa-face-smile"></i>
                            </div>
                        </div>

                        <div
                            class="bg-white/10 backdrop-blur-md rounded-2xl p-4 flex items-center justify-between border border-white/10">
                            <div>
                                <span class="text-xs text-brand-200 block uppercase tracking-wider font-semibold">WORLD
                                    RANKING</span>
                                <span class="text-2xl font-black">140+</span>
                            </div>
                            <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-brand-200">
                                <i class="fa-solid fa-trophy"></i>
                            </div>
                        </div>

                        <div
                            class="bg-white/10 backdrop-blur-md rounded-2xl p-4 flex items-center justify-between border border-white/10">
                            <div>
                                <span
                                    class="text-xs text-brand-200 block uppercase tracking-wider font-semibold">PROGRAMS</span>
                                <span class="text-2xl font-black">400+</span>
                            </div>
                            <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-brand-200">
                                <i class="fa-solid fa-book-open"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Tabs & Detailed Categories Content -->
        <div class="bg-white rounded-3xl p-8 border border-neutral-100  space-y-10 mt-12">
            <!-- Nav Tabs -->
            <div class="flex border-b border-neutral-100 space-x-8 text-base font-semibold">
                <button class="pb-3 border-b-2 border-brand-600 text-brand-600">Facilities</button>
                <button class="pb-3 text-neutral-400 hover:text-neutral-600 transition">Scholarships</button>
                <button class="pb-3 text-neutral-400 hover:text-neutral-600 transition">Accommodation</button>
                <button class="pb-3 text-neutral-400 hover:text-neutral-600 transition">Locations</button>
            </div>

            <!-- Facilities Item -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div class="bg-brand-900 text-white p-8 rounded-2xl space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center text-brand-300">
                        <i class="fa-solid fa-building-columns text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold">Facilities</h3>
                    <p class="text-brand-100 text-sm leading-relaxed">
                        Graduates of this program are prepared for a range of exciting career paths across local government
                        and private sectors. Key roles include creative directors, strategy managers, design & development
                        managers, advisors.
                    </p>
                </div>
                <div class="space-y-3">
                    <div
                        class="flex items-center justify-between p-4 rounded-xl bg-neutral-50 border border-neutral-100 text-sm font-medium hover:bg-brand-50/50 transition">
                        <span class="flex items-center text-neutral-700"><i class="fa-solid fa-check text-brand-500 mr-3"></i>
                            Campus audio and visual requirements studio</span>
                    </div>
                    <div
                        class="flex items-center justify-between p-4 rounded-xl bg-neutral-50 border border-neutral-100 text-sm font-medium hover:bg-brand-50/50 transition">
                        <span class="flex items-center text-neutral-700"><i class="fa-solid fa-check text-brand-500 mr-3"></i>
                            Central cafeteria facilities</span>
                    </div>
                    <div
                        class="flex items-center justify-between p-4 rounded-xl bg-neutral-50 border border-neutral-100 text-sm font-medium hover:bg-brand-50/50 transition">
                        <span class="flex items-center text-neutral-700"><i class="fa-solid fa-check text-brand-500 mr-3"></i>
                            Advanced mechanics research laboratory units</span>
                    </div>
                    <div
                        class="flex items-center justify-between p-4 rounded-xl bg-neutral-50 border border-neutral-100 text-sm font-medium hover:bg-brand-50/50 transition">
                        <span class="flex items-center text-neutral-700"><i class="fa-solid fa-check text-brand-500 mr-3"></i>
                            International standard student study cubicles</span>
                    </div>
                </div>
            </div>

            <!-- Airport Pickup Item -->
            <div class="pt-6 border-t border-neutral-100">
                <h3 class="text-lg font-bold text-neutral-900 mb-2">Airport Pickup</h3>
                <p class="text-sm text-neutral-600 leading-relaxed">
                    Students can book airport pickup service from Australia borders or regional areas back to Adelaide's
                    buildings via booking made on the HBD Services account to join regular weekly arrival points at the
                    Accommodation Center.
                </p>
            </div>

            <!-- Scholarships Item -->
            <div class="pt-6 border-t border-neutral-100 space-y-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-neutral-900">Scholarships</h3>
                        <p class="text-sm text-neutral-600 mt-1">Adelaide University provides scholarships for both domestic
                            and international students via the Student Accommodation Center.</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="p-5 rounded-2xl bg-neutral-50 border border-neutral-100 space-y-2">
                        <h4 class="font-bold text-neutral-900 text-base flex items-center"><i
                                class="fa-solid fa-award text-brand-500 mr-2"></i> International Bursary</h4>
                        <p class="text-sm text-neutral-500 leading-relaxed">International student discount is available for
                            Global Foundation and Diploma students. Managed by Student Leadership.</p>
                    </div>
                    <div class="p-5 rounded-2xl bg-neutral-50 border border-neutral-100 space-y-2">
                        <h4 class="font-bold text-neutral-900 text-base flex items-center"><i
                                class="fa-solid fa-award text-brand-500 mr-2"></i> Research Grant</h4>
                        <p class="text-sm text-neutral-500 leading-relaxed">Research funding up to 50% for community foundation
                            programs. Sponsored by regional partner programs.</p>
                        <button class="mt-2 text-xs font-bold text-brand-600 hover:text-brand-700 flex items-center">Apply
                            for scholarship <i class="fa-solid fa-arrow-right ml-1"></i></button>
                    </div>
                </div>
            </div>

            <!-- Accommodation Item -->
            <div class="pt-6 border-t border-neutral-100 space-y-4">
                <h3 class="text-lg font-bold text-neutral-900">Accommodation</h3>
                <p class="text-sm text-neutral-600 leading-relaxed">
                    Purpose-built, all-inclusive style living. Living in student accommodation with excellent security is
                    this type of housing is prepared specially for students to make living easier and more comfortable
                    wherever necessary, full of focus systems. We recommend student accommodation for the first year of
                    study, giving you time to settle in your studies, plus establish student networks.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-2">
                    <div class="p-4 rounded-xl border border-neutral-100 bg-white ">
                        <h5 class="font-bold text-sm text-neutral-900 mb-1">University-managed student accommodation</h5>
                        <p class="text-sm text-neutral-500">Shared accommodation provided by Adelaide University to offer
                            secure community habits.</p>
                    </div>
                    <div class="p-4 rounded-xl border border-neutral-100 bg-white ">
                        <h5 class="font-bold text-sm text-neutral-900 mb-1">Preferred partner providers</h5>
                        <p class="text-sm text-neutral-500">Secure accommodation surrounding the campus designed to foster
                            student engagement.</p>
                    </div>
                    <div class="p-4 rounded-xl border border-neutral-100 bg-white ">
                        <h5 class="font-bold text-sm text-neutral-900 mb-1">Residential colleges</h5>
                        <p class="text-sm text-neutral-500">Traditional colleges providing structured support and community.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Campus Locations Grid -->
            <div>
                <h2 class="text-xl font-bold mb-4">Available Campus Locations</h2>
                <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach (['Albury-Wodonga', 'Bathurst', 'Canberra'] as $location)
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
                                                    Albury-Wodonga
                                                </h3>

                                                <p class="mt-0.5 text-xs font-medium text-slate-500">
                                                    New South Wales
                                                </p>
                                            </div>

                                        </div>

                                        <!-- Country -->
                                        <span
                                            class="rounded-full bg-emerald-50 px-2.5 py-1 text-[10px] font-semibold text-emerald-700">
                                            Australia
                                        </span>

                                    </div>

                                    <!-- Divider -->
                                    <div class="my-5 border-t border-slate-100"></div>

                                    <!-- Location Info -->
                                    <div class="flex items-center gap-2 text-xs text-slate-500">

                                        <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor"
                                            stroke-width="1.8" viewBox="0 0 24 24">

                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 2v20M2 12h20" />
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
                                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">

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

        <!-- Selected Providers Section -->
        <div class="space-y-6 mt-12">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-bold text-neutral-900">Similar Providers</h2>
                <button
                    class="rounded-xl border border-neutral-300 bg-white px-4 py-2 text-sm font-semibold text-neutral-700 hover:bg-neutral-50 transition">
                    View All Providers
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ([['uni' => 'Curtin University', 'title' => 'Doctor of Philosophy - Humanities', 'location' => 'Bentley, Australia'], ['uni' => 'Curtin University', 'title' => 'Doctor of Philosophy - Social Sciences', 'location' => 'Bentley, Australia'], ['uni' => 'University of Newcastle', 'title' => 'Doctor of Philosophy (Aboriginal Studies)', 'location' => 'Callaghan, Australia']] as $course)
                    <a href="#"
                        class="group rounded-2xl border border-neutral-200 bg-white p-5  hover:shadow-md transition flex flex-col justify-between">
                        <div>
                            <div
                                class="h-12 w-full rounded-lg bg-brand-100 flex items-center justify-center font-bold text-brand-500 text-sm mb-4">
                                {{ $course['uni'] }}
                            </div>
                            <span class="text-[10px] font-bold text-brand-500 uppercase">{{ $course['uni'] }}</span>
                            <h3
                                class="text-sm font-bold text-neutral-900 mt-1 group-hover:text-brand-500 transition-colors">
                                {{ $course['title'] }}
                            </h3>
                            <p class="text-xs text-neutral-500 mt-2">Doctorate • CRICOS 041959M</p>
                        </div>

                        <div class="mt-6 pt-4 border-t border-neutral-100 flex items-center justify-between">
                            <span class="text-xs text-brand-500">{{ $course['location'] }}</span>
                            <button
                                class="rounded-lg bg-brand-100 px-3 py-1.5 text-xs font-bold text-brand-500 group-hover:bg-brand-500 group-hover:text-white transition">
                                View →
                            </button>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
