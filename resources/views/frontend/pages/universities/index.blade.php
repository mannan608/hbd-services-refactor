@extends('frontend.layouts.app')

@section('content')
 
@php
    $universities = [
        [
            'id' => 1,
            'name' => 'University of Melbourne',
            'slug' => 'university-of-melbourne',
            'country' => 'Australia',
            'country_code' => 'au',
            'city' => 'Melbourne',
            'image' => 'https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=900&q=85',
            'logo' => 'https://ui-avatars.com/api/?name=U+Melbourne&background=0B1D36&color=fff&size=100',
            'rating' => 4.9,
            'reviews' => 1250,
            'ranking' => '#1 in Australia',
            'tuition' => 'AUD 35,000 – 55,000/year',
            'programs' => 300,
            'students' => '53,000+',
            'type' => 'Public University',
            'featured' => true,
            'popular' => 98,
            'description' => 'A globally recognised research university offering outstanding academic programs and a vibrant student experience.',
        ],
        [
            'id' => 2,
            'name' => 'University of Sydney',
            'slug' => 'university-of-sydney',
            'country' => 'Australia',
            'country_code' => 'au',
            'city' => 'Sydney',
            'image' => 'https://images.unsplash.com/photo-1592280771190-3e2e4d571952?auto=format&fit=crop&w=900&q=85',
            'logo' => 'https://ui-avatars.com/api/?name=US&background=0B1D36&color=fff&size=100',
            'rating' => 4.8,
            'reviews' => 980,
            'ranking' => '#2 in Australia',
            'tuition' => 'AUD 38,000 – 58,000/year',
            'programs' => 250,
            'students' => '70,000+',
            'type' => 'Public University',
            'featured' => true,
            'popular' => 95,
            'description' => 'Discover a historic academic institution known for research excellence, innovation and global opportunities.',
        ],
        [
            'id' => 3,
            'name' => 'Monash University',
            'slug' => 'monash-university',
            'country' => 'Australia',
            'country_code' => 'au',
            'city' => 'Melbourne',
            'image' => 'https://images.unsplash.com/photo-1498243691581-b145c3f54a5a?auto=format&fit=crop&w=900&q=85',
            'logo' => 'https://ui-avatars.com/api/?name=MU&background=0B1D36&color=fff&size=100',
            'rating' => 4.8,
            'reviews' => 870,
            'ranking' => '#3 in Australia',
            'tuition' => 'AUD 32,000 – 52,000/year',
            'programs' => 200,
            'students' => '86,000+',
            'type' => 'Public University',
            'featured' => false,
            'popular' => 92,
            'description' => 'An internationally connected university with innovative teaching, research and diverse study opportunities.',
        ],
        [
            'id' => 4,
            'name' => 'University of Oxford',
            'slug' => 'university-of-oxford',
            'country' => 'United Kingdom',
            'country_code' => 'gb',
            'city' => 'Oxford',
            'image' => 'https://images.unsplash.com/photo-1519452575417-564c1401ecc0?auto=format&fit=crop&w=900&q=85',
            'logo' => 'https://ui-avatars.com/api/?name=OX&background=0B1D36&color=fff&size=100',
            'rating' => 5.0,
            'reviews' => 1450,
            'ranking' => '#1 in UK',
            'tuition' => 'GBP 28,000 – 45,000/year',
            'programs' => 350,
            'students' => '26,000+',
            'type' => 'Public University',
            'featured' => true,
            'popular' => 99,
            'description' => 'Experience centuries of academic excellence, world-leading research and an internationally recognised education.',
        ],
        [
            'id' => 5,
            'name' => 'University of Toronto',
            'slug' => 'university-of-toronto',
            'country' => 'Canada',
            'country_code' => 'ca',
            'city' => 'Toronto',
            'image' => 'https://images.unsplash.com/photo-1607237138185-eedd9c632b0b?auto=format&fit=crop&w=900&q=85',
            'logo' => 'https://ui-avatars.com/api/?name=UT&background=0B1D36&color=fff&size=100',
            'rating' => 4.9,
            'reviews' => 1100,
            'ranking' => '#1 in Canada',
            'tuition' => 'CAD 35,000 – 60,000/year',
            'programs' => 250,
            'students' => '97,000+',
            'type' => 'Public University',
            'featured' => true,
            'popular' => 97,
            'description' => 'Study at a leading research university with a diverse community and a wide range of academic disciplines.',
        ],
        [
            'id' => 6,
            'name' => 'Harvard University',
            'slug' => 'harvard-university',
            'country' => 'United States',
            'country_code' => 'us',
            'city' => 'Cambridge',
            'image' => 'https://images.unsplash.com/photo-1564981797816-1043664bf78d?auto=format&fit=crop&w=900&q=85',
            'logo' => 'https://ui-avatars.com/api/?name=HU&background=0B1D36&color=fff&size=100',
            'rating' => 5.0,
            'reviews' => 1680,
            'ranking' => '#1 in USA',
            'tuition' => 'USD 45,000 – 60,000/year',
            'programs' => 180,
            'students' => '24,000+',
            'type' => 'Private University',
            'featured' => true,
            'popular' => 100,
            'description' => 'Explore an exceptional academic environment with distinguished faculty, research and learning opportunities.',
        ],
        [
            'id' => 7,
            'name' => 'University of Auckland',
            'slug' => 'university-of-auckland',
            'country' => 'New Zealand',
            'country_code' => 'nz',
            'city' => 'Auckland',
            'image' => 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?auto=format&fit=crop&w=900&q=85',
            'logo' => 'https://ui-avatars.com/api/?name=UA&background=0B1D36&color=fff&size=100',
            'rating' => 4.7,
            'reviews' => 520,
            'ranking' => '#1 in New Zealand',
            'tuition' => 'NZD 30,000 – 45,000/year',
            'programs' => 150,
            'students' => '46,000+',
            'type' => 'Public University',
            'featured' => false,
            'popular' => 85,
            'description' => 'A leading university offering a supportive learning environment and internationally recognised qualifications.',
        ],
        [
            'id' => 8,
            'name' => 'University of Manchester',
            'slug' => 'university-of-manchester',
            'country' => 'United Kingdom',
            'country_code' => 'gb',
            'city' => 'Manchester',
            'image' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&w=900&q=85',
            'logo' => 'https://ui-avatars.com/api/?name=UM&background=0B1D36&color=fff&size=100',
            'rating' => 4.7,
            'reviews' => 760,
            'ranking' => 'Top UK University',
            'tuition' => 'GBP 24,000 – 42,000/year',
            'programs' => 220,
            'students' => '44,000+',
            'type' => 'Public University',
            'featured' => false,
            'popular' => 89,
            'description' => 'Discover a dynamic university with a strong research culture and a diverse international student community.',
        ],
        [
            'id' => 9,
            'name' => 'Taylor’s University',
            'slug' => 'taylors-university',
            'country' => 'Malaysia',
            'country_code' => 'my',
            'city' => 'Subang Jaya',
            'image' => 'https://images.unsplash.com/photo-1568792923760-d70635a89fdc?auto=format&fit=crop&w=900&q=85',
            'logo' => 'https://ui-avatars.com/api/?name=TU&background=0B1D36&color=fff&size=100',
            'rating' => 4.6,
            'reviews' => 430,
            'ranking' => 'Top Private University',
            'tuition' => 'MYR 20,000 – 40,000/year',
            'programs' => 100,
            'students' => '20,000+',
            'type' => 'Private University',
            'featured' => false,
            'popular' => 82,
            'description' => 'An international learning destination with modern facilities and industry-focused academic programs.',
        ],
    ];

    $countries = collect($universities)
        ->pluck('country')
        ->unique()
        ->values();
@endphp

    {{-- Hero Section --}}
    <section class="relative isolate overflow-hidden bg-brand-950">

        <div class="absolute inset-0 -z-20 bg-cover bg-center opacity-20"
            style="background-image: url('https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=2000&q=85')">
        </div>

        <div class="absolute inset-0 -z-10 bg-gradient-to-br from-brand-950 via-brand-900/95 to-brand-700/90"></div>

        <div class="absolute -right-40 top-0 -z-10 h-[500px] w-[500px] rounded-full bg-brand-500/25 blur-[120px]"></div>

        <div class="absolute -bottom-40 -left-40 -z-10 h-[400px] w-[400px] rounded-full bg-accent-two-500/10 blur-[100px]"></div>

        <div class="mx-auto max-w-7xl px-4 pb-28 pt-16 sm:px-6 sm:pb-36 sm:pt-20 lg:px-8 lg:pb-40 lg:pt-24">

            <div class="mx-auto max-w-4xl text-center">

                <div class="mb-7 inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-4 py-2 backdrop-blur-md">
                    <iconify-icon icon="lucide:graduation-cap" class="text-base text-accent-two-500"></iconify-icon>
                    <span class="text-xs font-semibold tracking-[0.12em] text-brand-100">
                        DISCOVER YOUR FUTURE UNIVERSITY
                    </span>
                </div>

                <h1 class="text-3xl font-bold leading-[1.15] tracking-tight text-white sm:text-4xl lg:text-5xl">
                    Find Your University.
                    <span class="text-accent-two-500">Shape Your Future.</span>
                </h1>

                <p class="mx-auto mt-6 max-w-2xl text-sm leading-7 text-brand-100/80 sm:text-lg sm:leading-8">
                    Explore leading universities around the world. Discover academic
                    opportunities and find the right institution for your ambitions.
                </p>

                {{-- Hero Search --}}
                <form @submit.prevent="$dispatch('university-search', search)" class="mx-auto mb-10 mt-10 max-w-3xl sm:mb-6">

                    <div class="flex flex-col gap-2 rounded-2xl border border-white/20 bg-white p-2 shadow-2xl shadow-black/20 sm:flex-row sm:items-center sm:rounded-full sm:p-2.5">

                        <div class="flex min-w-0 flex-1 items-center gap-3 px-4">
                            <iconify-icon icon="lucide:search" class="shrink-0 text-xl text-brand-500"></iconify-icon>

                            <input
                                type="search"
                                x-model="search"
                                placeholder="Search university, country or city..."
                                aria-label="Search universities"
                                class="w-full h-11 border-0 bg-transparent px-2 py-2.5 text-base text-neutral-800 placeholder:text-neutral-400 focus:ring-0 focus:outline-none">
                        </div>

                        <button type="submit"
                            class="group flex h-12 shrink-0 items-center justify-center gap-2 rounded-xl bg-brand-500 px-7 text-sm font-semibold text-white transition duration-300 hover:bg-brand-700 sm:rounded-full">
                            Find Universities
                            <iconify-icon icon="lucide:arrow-right" class="text-base transition-transform duration-300 group-hover:translate-x-1"></iconify-icon>
                        </button>

                    </div>
                </form>

                <div class="hidden flex-wrap items-center justify-center gap-x-8 gap-y-4 text-xs font-medium text-brand-100/80 sm:flex sm:text-sm">

                    <div class="flex items-center gap-2">
                        <iconify-icon icon="lucide:globe-2" class="text-base text-accent-two-500"></iconify-icon>
                        Global Universities
                    </div>

                    <div class="hidden h-4 w-px bg-white/20 sm:block"></div>

                    <div class="flex items-center gap-2">
                        <iconify-icon icon="lucide:book-open" class="text-base text-accent-two-500"></iconify-icon>
                        Diverse Study Programs
                    </div>

                    <div class="hidden h-4 w-px bg-white/20 sm:block"></div>

                    <div class="flex items-center gap-2">
                        <iconify-icon icon="lucide:award" class="text-base text-accent-two-500"></iconify-icon>
                        Academic Excellence
                    </div>

                </div>
            </div>
        </div>
    </section>


    {{-- University Explorer --}}
    <section
        id="universities-list"
        x-data="universityExplorer(@js($universities))"
        @university-search.window="search = $event.detail; applySearch()"
        class="relative mx-auto -mt-30 max-w-7xl scroll-mt-6 px-4 pb-20 sm:px-6 lg:px-8">

        {{-- Filters --}}
        <div class="rounded-2xl border border-neutral-200 bg-white p-4 shadow-[0_12px_40px_rgba(6,29,52,0.07)] sm:p-6">

            <div class="flex flex-col gap-5">

                <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

                    <div>
                        <div class="flex items-center gap-2">
                            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-brand-50 text-brand-500">
                                <iconify-icon icon="lucide:sliders-horizontal" class="text-base"></iconify-icon>
                            </div>

                            <h2 class="text-base font-bold text-brand-950">
                                Find Your University
                            </h2>
                        </div>

                        <p class="mt-1 text-xs text-neutral-500">
                            Explore and compare universities worldwide.
                        </p>
                    </div>

                    {{-- Sorting --}}
                    <div class="flex flex-wrap items-center gap-2">

                        <label class="inline-flex cursor-pointer items-center gap-2 rounded-xl border px-4 py-2 text-xs font-medium"
                            :class="sort === 'rating' ? 'border-brand-500 bg-brand-50 text-brand-600' : 'border-neutral-200 bg-neutral-50 text-neutral-600'">

                            <input type="radio" name="university-sort" value="rating"
                                x-model="sort" class="h-3.5 w-3.5 accent-brand-600">
                            Top Rated
                        </label>

                        <label class="inline-flex cursor-pointer items-center gap-2 rounded-xl border px-4 py-2 text-xs font-medium"
                            :class="sort === 'popular' ? 'border-brand-500 bg-brand-50 text-brand-600' : 'border-neutral-200 bg-neutral-50 text-neutral-600'">

                            <input type="radio" name="university-sort" value="popular"
                                x-model="sort" class="h-3.5 w-3.5 accent-brand-600">
                            Most Popular
                        </label>

                    </div>
                </div>

                {{-- Country Filters --}}
                <div class="border-t border-neutral-100 pt-4">

                    <div class="mb-3 flex items-center justify-between">
                        <p class="text-[11px] font-medium uppercase tracking-[0.12em] text-neutral-400">
                            Browse by Country
                        </p>

                        <button type="button" @click="resetFilters()"
                            class="text-xs font-semibold text-brand-600 hover:text-brand-800">
                            Reset Filters
                        </button>
                    </div>

                    <div class="flex gap-2 overflow-x-auto pb-1">

                        <button type="button" @click="country = ''"
                            :class="country === '' ? 'bg-brand-500 text-white border-brand-500' : 'border-neutral-200 bg-white text-neutral-600'"
                            class="shrink-0 rounded-xl border px-4 py-2 text-xs font-medium transition">
                            All Countries
                        </button>

                        @foreach ($countries as $item)
                            <button type="button"
                                @click="country = @js($item)"
                                :class="country === @js($item) ? 'bg-brand-500 text-white border-brand-500' : 'border-neutral-200 bg-white text-neutral-600'"
                                class="shrink-0 rounded-xl border px-4 py-2 text-xs font-medium transition">
                                {{ $item }}
                            </button>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>


        {{-- Results Heading --}}
        <div class="mb-6 mt-10 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">

            <div>
                <div class="flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.15em] text-brand-600">
                    <span class="h-2 w-2 rounded-full bg-accent-two-500"></span>
                    EXPLORE THE WORLD
                </div>

                <h2 class="mt-2 text-2xl font-bold tracking-tight text-brand-950 sm:text-3xl">
                    Featured Universities
                </h2>

                <p class="mt-2 text-sm text-neutral-500">
                    Discover institutions that match your academic goals.
                </p>
            </div>

            <p class="text-xs font-medium text-neutral-500">
                Showing
                <span x-text="visibleUniversities.length" class="font-semibold text-brand-950"></span>
                of
                <span x-text="filteredUniversities.length" class="font-semibold text-brand-950"></span>
                universities
            </p>
        </div>


        {{-- University Cards --}}
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">

            <template x-for="university in visibleUniversities" :key="university.id">

                <a :href="'/universities/' + university.slug" class="group block h-full">

                    <article class="flex h-full flex-col overflow-hidden rounded-2xl border border-brand-100 bg-white shadow-[0_1px_2px_rgba(16,24,40,0.04)] transition-all duration-300 hover:-translate-y-1.5 hover:border-brand-200 hover:shadow-[0_24px_48px_-24px_rgba(16,24,40,0.28)]">

                        {{-- Card Image --}}
                        <div class="relative aspect-[16/10] shrink-0 overflow-hidden">

                            <img :src="university.image"
                                :alt="university.name"
                                loading="lazy"
                                class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105">

                            <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/15 to-transparent"></div>

                            {{-- Country Flag & Featured --}}
                            <div class="absolute left-4 top-4 flex items-center gap-2">

                                <span class="inline-flex h-9 w-9 items-center justify-center overflow-hidden rounded-full bg-white shadow-sm">
                                    <img :src="'https://flagcdn.com/w40/' + university.country_code + '.png'"
                                        :alt="university.country + ' flag'"
                                        class="h-6 w-6 rounded-full object-cover"
                                        loading="lazy">
                                </span>

                                <span x-show="university.featured"
                                    class="inline-flex items-center gap-1 rounded-full bg-brand-500 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wide text-white shadow-sm">
                                    <iconify-icon icon="lucide:star" class="text-xs"></iconify-icon>
                                    Featured
                                </span>

                            </div>

                            {{-- Rating --}}
                            <div class="absolute right-4 top-4 inline-flex items-center gap-1 rounded-full bg-white/95 px-2.5 py-1 text-xs font-bold text-black shadow-sm">
                                <iconify-icon icon="lucide:star" class="text-brand-500"></iconify-icon>
                                <span x-text="Number(university.rating).toFixed(1)"></span>
                            </div>

                            {{-- University Name --}}
                            <div class="absolute bottom-4 left-5 right-5">

                                <h3 class="text-xl font-bold tracking-tight text-white drop-shadow" x-text="university.name"></h3>

                                <div class="mt-1 flex items-center gap-1.5 text-sm text-white/85">
                                    <iconify-icon icon="lucide:map-pin" class="text-sm"></iconify-icon>
                                    <span x-text="university.city + ', ' + university.country"></span>
                                </div>

                            </div>
                        </div>


                        {{-- Card Content --}}
                        <div class="flex flex-1 flex-col p-5 sm:p-6">

                            <div class="mb-3 flex items-center justify-between gap-2">
                                <span class="rounded-lg bg-brand-50 px-2.5 py-1 text-[11px] font-semibold text-brand-600"
                                    x-text="university.type"></span>

                                <span class="text-[11px] font-semibold text-amber-600"
                                    x-text="university.ranking"></span>
                            </div>

                            <p class="line-clamp-2 text-sm leading-6 text-neutral-600" x-text="university.description"></p>

                            {{-- University Information --}}
                            <div class="mt-4 space-y-2">

                                <div class="flex items-center justify-between gap-3 rounded-xl border border-neutral-100 bg-neutral-50 px-3 py-2.5 text-xs">
                                    <span class="flex items-center gap-2 font-medium text-neutral-500">
                                        <iconify-icon icon="lucide:wallet" class="text-brand-500"></iconify-icon>
                                        Tuition Fee
                                    </span>

                                    <span class="text-right font-semibold text-neutral-800" x-text="university.tuition"></span>
                                </div>

                                <div class="grid grid-cols-2 gap-2">

                                    <div class="rounded-xl border border-neutral-100 bg-neutral-50 px-3 py-2.5">
                                        <p class="text-[11px] text-neutral-500">Study Programs</p>
                                        <p class="mt-1 text-sm font-bold text-brand-950">
                                            <span x-text="university.programs"></span>+
                                        </p>
                                    </div>

                                    <div class="rounded-xl border border-neutral-100 bg-neutral-50 px-3 py-2.5">
                                        <p class="text-[11px] text-neutral-500">Students</p>
                                        <p class="mt-1 text-sm font-bold text-brand-950" x-text="university.students"></p>
                                    </div>

                                </div>

                            </div>

                            {{-- Footer --}}
                            <div class="mt-auto mt-5 flex items-center justify-between border-t border-neutral-100 pt-4">

                                <span class="inline-flex items-center gap-1.5 text-xs text-neutral-400">
                                    <iconify-icon icon="lucide:message-circle" class="text-sm"></iconify-icon>
                                    <span x-text="university.reviews.toLocaleString()"></span>
                                    reviews
                                </span>

                                <span class="inline-flex items-center gap-1 text-sm font-semibold text-brand-600">
                                    View University
                                    <iconify-icon icon="lucide:arrow-right" class="transition-transform duration-300 group-hover:translate-x-1"></iconify-icon>
                                </span>

                            </div>

                        </div>
                    </article>
                </a>
            </template>

        </div>


        {{-- Empty State --}}
        <div x-show="filteredUniversities.length === 0" x-cloak
            class="rounded-2xl border border-dashed border-neutral-300 bg-white px-5 py-16 text-center">

            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-brand-50 text-brand-500">
                <iconify-icon icon="lucide:search-x" class="text-3xl"></iconify-icon>
            </div>

            <h3 class="mt-5 text-lg font-bold text-brand-950">
                No Universities Found
            </h3>

            <p class="mt-2 text-sm text-neutral-500">
                We couldn't find any university matching your search. Try another name or country.
            </p>

            <button type="button" @click="resetFilters()"
                class="mt-6 inline-flex items-center gap-2 rounded-xl bg-brand-500 px-5 py-3 text-sm font-semibold text-white transition hover:bg-brand-700">
                <iconify-icon icon="lucide:refresh-ccw"></iconify-icon>
                Reset Filters
            </button>

        </div>


        {{-- Load More --}}
        <div x-show="visibleUniversities.length < filteredUniversities.length"
            class="mt-10 text-center">

            <button type="button" @click="loadMore()"
                class="inline-flex items-center gap-2 rounded-xl border border-brand-200 bg-white px-7 py-3.5 text-sm font-semibold text-brand-600 shadow-sm transition hover:border-brand-500 hover:bg-brand-50">
                Load More Universities
                <iconify-icon icon="lucide:chevron-down"></iconify-icon>
            </button>

        </div>

    </section>
@endsection
{{-- Alpine.js Component --}}
<script>
    document.addEventListener('alpine:init', () => {

        Alpine.data('universityExplorer', (universities) => ({

            universities: universities,

            search: '',
            country: '',
            sort: 'rating',
            limit: 6,

            get filteredUniversities() {

                let result = [...this.universities];

                // Search filter
                if (this.search.trim() !== '') {

                    const keyword = this.search.toLowerCase().trim();

                    result = result.filter(university => {

                        return (
                            university.name.toLowerCase().includes(keyword) ||
                            university.country.toLowerCase().includes(keyword) ||
                            university.city.toLowerCase().includes(keyword)
                        );

                    });
                }

                // Country filter
                if (this.country !== '') {

                    result = result.filter(university =>
                        university.country === this.country
                    );

                }

                // Sorting
                if (this.sort === 'rating') {

                    result.sort((a, b) => b.rating - a.rating);

                } else if (this.sort === 'popular') {

                    result.sort((a, b) => b.popular - a.popular);

                }

                return result;
            },

            get visibleUniversities() {
                return this.filteredUniversities.slice(0, this.limit);
            },

            applySearch() {
                this.limit = 6;

                document.getElementById('universities-list')
                    ?.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
            },

            loadMore() {
                this.limit += 3;
            },

            resetFilters() {

                this.search = '';
                this.country = '';
                this.sort = 'rating';
                this.limit = 6;

            },

        }));

    });
</script>

