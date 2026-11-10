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
                    Explore Thousands of Courses Across Australia
                </h1>

            </div>
            <div class="max-w-2xl mx-auto">
                <!-- Search Box -->
                <form action="" method="GET"
                    class="mt-5 flex flex-col gap-2 rounded-2xl border border-slate-200 bg-white p-2 shadow-lg sm:mt-6 sm:flex-row">

                    <!-- Input -->
                    <div class="relative min-w-0 flex-1">

                        <!-- Search Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400 sm:h-5 sm:w-5"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" aria-hidden="true">

                            <path d="m21 21-4.34-4.34"></path>
                            <circle cx="11" cy="11" r="8"></circle>
                        </svg>

                        <input type="search" name="search" value="{{ request('search') }}"
                            placeholder="Keyword: Name, Expart, location or university"
                            class="h-11 w-full rounded-xl placeholder:text-[15px] border-0 bg-transparent px-3 pl-10 text-sm text-slate-900 outline-none placeholder:text-slate-400 focus:ring-0 sm:text-base">
                    </div>

                    <!-- Actions -->
                    <div class="flex gap-2">

                        <!-- AI Assist -->
                        <button type="button"
                            class="inline-flex h-11 flex-1 items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 text-sm font-medium text-slate-700 shadow-sm transition-all duration-200 hover:border-[#1068b2]/30 hover:bg-slate-50 hover:text-[#1068b2] active:scale-[0.98] sm:flex-none">

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">

                                <path
                                    d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z" />

                                <path d="M20 2v4"></path>
                                <path d="M22 4h-4"></path>
                                <circle cx="4" cy="20" r="2"></circle>
                            </svg>

                            <span>AI assist</span>
                        </button>

                        <!-- Search -->
                        <button type="submit"
                            class="inline-flex h-11 flex-1 items-center justify-center gap-2 rounded-xl bg-[#1068b2] px-5 text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-[#0d5796] active:scale-[0.98] sm:flex-none">

                            Search
                        </button>

                    </div>
                </form>
            </div>
        </div>

    </section>


    <section class="mt-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">

                <!-- Listing Content Area -->
                <div class="flex-1 space-y-5">

                    <!-- Top Navigation & Utility Controls -->
                    <div
                        class="flex flex-col sm:flex-row sm:items-end justify-end gap-4 rounded-2xl bg-white p-3 shadow-xs">
                        <div class="flex items-center gap-2 ">
                            <span class="text-sm font-medium text-neutral-400">Sort:</span>
                            <select
                                class="rounded-lg border-none bg-neutral-50 py-1.5 pl-2 pr-7 text-sm font-semibold text-neutral-800 focus:ring-0 cursor-pointer">
                                <option value="relevance">Branch</option>
                                <option value="fee_asc">Location:Dhanmondi</option>
                                <option value="fee_asc">Location:Bangla Motor</option>
                                <option value="fee_asc">Location:Gulshan</option>
                                <option value="fee_asc">Location:Banani</option>
                            </select>
                        </div>
                        <!-- Sort By Select -->
                        <div class="flex items-center gap-2 ">
                            <span class="text-sm font-medium text-neutral-400">Sort:</span>
                            <select
                                class="rounded-lg border-none bg-neutral-50 py-1.5 pl-2 pr-7 text-sm font-semibold text-neutral-800 focus:ring-0 cursor-pointer">
                                <option value="relevance">Expertise</option>
                                <option value="fee_asc">Agriculture & Environmental</option>
                                <option value="fee_desc">Architecture and Building</option>
                                <option value="duration">Creative Arts</option>
                                <option value="duration">Education</option>
                                <option value="duration">Engineering and Related Technologies</option>
                                <option value="duration">Food, Hospitality and Personal</option>
                            </select>
                        </div>

                    </div>

                    <!-- Course Cards Stream Placeholder -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($counsellors as $counsellor)
                            @include('frontend.pages.counsellors.counseller-card', [
                                'counsellor' => $counsellor,
                            ])
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection
