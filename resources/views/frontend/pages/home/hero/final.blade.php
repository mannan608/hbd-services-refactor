@php
    $destinations = [
        [
            'name' => 'Australia',

            'badge' => 'Study in Australia',

            'title' => 'Your Future in Australia.',

            'description' =>
                'Compare tuition, English scores, intakes and scholarships across 620+ institutions — then talk to a verified counsellor for free.',

            'image' => 'frontend-img/hero/hcamp.jpeg',

            'alt' => 'International students walking through an Australian university campus',

            'search_placeholder' => 'Search courses, e.g. Master of IT in Melbourne',
        ],

        [
            'name' => 'United Kingdom',

            'badge' => 'Study in the UK',

            'title' => 'Build Your Future in the UK.',

            'description' =>
                'Explore leading UK universities, discover the right course and find scholarship opportunities for your future.',

            'image' => 'frontend-img/hero/hero-1.jpeg',

            'alt' => 'Students studying in the United Kingdom',

            'search_placeholder' => 'Search courses, e.g. MSc Computer Science in London',
        ],

        [
            'name' => 'Canada',

            'badge' => 'Study in Canada',

            'title' => 'Start Your Canadian Journey.',

            'description' =>
                'Discover Canadian universities and colleges, compare programs, tuition fees, intakes and scholarship opportunities.',

            'image' => 'frontend-img/hero/hero-2.jpeg',

            'alt' => 'International students studying in Canada',

            'search_placeholder' => 'Search courses, e.g. MBA in Toronto',
        ],

        [
            'name' => 'United States',

            'badge' => 'Study in the USA',

            'title' => 'Your USA Dream Starts Here.',

            'description' =>
                'Find the right US university and course while comparing tuition fees, admission requirements and scholarship opportunities.',

            'image' => 'frontend-img/hero/hero-3.jpeg',

            'alt' => 'University campus in the United States',

            'search_placeholder' => 'Search courses, e.g. MS in Computer Science in California',
        ],

        [
            'name' => 'Malaysia',

            'badge' => 'Study in Malaysia',

            'title' => 'Your Future in Malaysia.',

            'description' =>
                'Explore world-class universities, flexible programs, affordable tuition and exciting career opportunities in Malaysia.',

            'image' => 'frontend-img/hero/hero-4.jpeg',

            'alt' => 'International students in Malaysia',

            'search_placeholder' => 'Search courses, e.g. Bachelor of Business in Malaysia',
        ],
    ];

    $suggestions = [
        ['name' => 'Australia', 'code' => 'AU'],
        ['name' => 'UK', 'code' => 'GB'],
        ['name' => 'USA', 'code' => 'US'],
        ['name' => 'Canada', 'code' => 'CA'],
        ['name' => 'New Zealand', 'code' => 'NZ'],
        ['name' => 'Malaysia', 'code' => 'MY'],
        ['name' => 'Germany', 'code' => 'DE'],
    ];
@endphp


<section x-data="{
    destinations: @js($destinations),
    suggestions: @js($suggestions),

    current: 0,

    autoplay: true,

    interval: 3500,

    isPaused: false,

    initialized: false,

    init() {

        this.$nextTick(() => {

            this.initialized = true;

            this.startAutoplay();

        });

    },

    get activeDestination() {

        return this.destinations[this.current];

    },

    showSlide(index) {

        if (index < 0) {

            index = this.destinations.length - 1;

        }

        if (index >= this.destinations.length) {

            index = 0;

        }

        this.current = index;

        this.restartAutoplay();

    },

    next() {

        this.current =
            (this.current + 1) %
            this.destinations.length;

    },

    previous() {

        this.current =
            (this.current - 1 + this.destinations.length) %
            this.destinations.length;

    },

    startAutoplay() {

        this.stopAutoplay();

        this.autoplay = setInterval(() => {

            if (!this.isPaused) {

                this.next();

            }

        }, this.interval);

    },

    stopAutoplay() {

        if (this.autoplay) {

            clearInterval(this.autoplay);

            this.autoplay = null;

        }

    },

    restartAutoplay() {

        this.startAutoplay();

    },

    pause() {

        this.isPaused = true;

    },

    resume() {

        this.isPaused = false;

    }
}" x-init="init()" @mouseenter="pause()" @mouseleave="resume()"
    @keydown.right.prevent="showSlide(current + 1)" @keydown.left.prevent="showSlide(current - 1)" tabindex="0"
    class="relative isolate flex h-[80vh] w-full items-center justify-center overflow-hidden sm:h-[78vh] md:h-[74vh]">

    {{-- =========================================================
        BACKGROUND SLIDES


    {{-- =========================================================
        BACKGROUND SLIDES
    ========================================================== --}}

    <div class="absolute inset-0">

        <template x-for="(destination, index) in destinations" :key="destination.name">

            <div x-show="current === index" x-transition:enter="transition-opacity duration-[1400ms] ease-out"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity duration-[1400ms] ease-out"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0">

                {{-- Background Image --}}

                <img :src="'{{ asset('') }}' + destination.image" :alt="destination.alt" width="1920"
                    height="1080" :loading="index === 0 ? 'eager' : 'lazy'"
                    :fetchpriority="index === 0 ? 'high' : 'low'"
                    class="size-full object-cover transition-transform duration-8000 ease-out"
                    :class="current === index ?
                        'scale-100' :
                        'scale-110'">

            </div>

        </template>

    </div>


    {{-- =========================================================
        SURFACE OVERLAY
    ========================================================== --}}

    <div class="surface-hero absolute inset-0 z-2">
    </div>


    {{-- =========================================================
        EXTRA DARK OVERLAY
    ========================================================== --}}

    <div class="absolute inset-0 z-3 bg-black/10">
    </div>


    {{-- =========================================================
        BOTTOM GRADIENT
    ========================================================== --}}

    <div class="absolute inset-x-0 bottom-0 z-4 h-1/2 bg-gradient-to-t from-black/40 via-black/10 to-transparent">
    </div>


    {{-- =========================================================
        LEFT / RIGHT GRADIENT
    ========================================================== --}}

    <div class="absolute inset-0 z-[4] bg-gradient-to-r from-black/20 via-transparent to-black/10">
    </div>


    {{-- =========================================================
        MAIN CONTENT
    ========================================================== --}}

    <div class="relative z-10 mx-auto w-full max-w-7xl px-5 py-24 text-center text-white sm:py-32 lg:px-8">

        <div :key="current" x-data="{ loaded: false }" x-init="setTimeout(() => {
            loaded = true
        }, 100)" class="">


            {{-- =================================================
                BADGE
            ================================================== --}}

            <div class="inline-flex items-center gap-2 rounded-full border border-purple-200/50 bg-brand-500/10 px-5 py-2.5 backdrop-blur-sm transition-all duration-700"
                :class="loaded
                    ?
                    'translate-y-0 opacity-100' :
                    'translate-y-6 '">

                {{-- Sparkle icon --}}

                <div class="relative">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="h-4 w-4 animate-pulse text-white">

                        <path
                            d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z" />

                        <path d="M20 3v4" />

                        <path d="M22 5h-4" />

                        <path d="M4 17v2" />

                        <path d="M5 18H3" />

                    </svg>

                    <div class="absolute inset-0 h-4 w-4 animate-pulse bg-brand-500 blur-md">
                    </div>

                </div>


                {{-- Dynamic badge --}}

                <span class="text-sm font-semibold uppercase tracking-wide text-white" x-text="activeDestination.badge">
                </span>

            </div>


            {{-- =================================================
                HEADING
            ================================================== --}}

            <h1 class="mt-7 text-3xl font-bold uppercase leading-tight tracking-tight transition-all duration-700 delay-100 sm:5xl md:text-6xl lg:text-[74px]"
                :class="loaded
                    ?
                    'translate-y-0 opacity-100' :
                    'translate-y-6 '"
                x-text="activeDestination.title">
            </h1>


            {{-- =================================================
                DESCRIPTION
            ================================================== --}}

            <p class="mx-auto mt-5 max-w-3xl text-base leading-relaxed text-white/85 transition-all duration-700 delay-200 sm:text-2xl"
                :class="loaded
                    ?
                    'translate-y-0 opacity-100' :
                    'translate-y-6 '"
                x-text="activeDestination.description">
            </p>

            {{-- <div class="mt-4 flex flex-wrap items-center gap-2.5">

                @foreach ($suggestions as $item)
                    <span
                        class="inline-flex cursor-pointer items-center gap-2 rounded-full border border-brand-200/60 bg-brand-50/70 px-3.5 py-1.5 text-xs font-semibold text-brand-700 shadow-2xs backdrop-blur-xs transition-all duration-200 hover:-translate-y-0.5 hover:border-brand-300 hover:bg-brand-100/80 hover:shadow-xs">

                        <img src="https://flagcdn.com/w20/{{ strtolower($item['code']) }}.png" width="16"
                            height="12" alt="{{ $item['name'] }} flag" loading="lazy"
                            class="h-3.5 w-4.5 rounded-xs object-cover shadow-2xs" />

                        <span>{{ $item['name'] }}</span>

                    </span>
                @endforeach

            </div> --}}


        </div>

        {{-- <div class="mt-8 flex flex-col items-center justify-center gap-4 sm:flex-row">
            <a href="{{ route('register') }}"
                class="group inline-flex w-full items-center justify-center gap-2 rounded-xl bg-red-500 px-6 py-3.5 text-sm font-semibold text-white shadow-lg shadow-brand-950/40 transition-all duration-300 hover:-translate-y-0.5 hover:bg-red-500 sm:w-auto">
                Book an Appointment
                <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
            </a>
            <a href="{{ route('counsellors') }}"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-white px-6 py-3.5 text-sm font-semibold text-brand-800 transition-all duration-300 hover:-translate-y-0.5 hover:bg-brand-50 sm:w-auto">
                Talk to a counsellor
            </a>
        </div> --}}
        <div class="mt-8 flex flex-col items-center justify-center gap-4 sm:flex-row">
                    <a href="#courses"
                       class="inline-flex w-full sm:w-fit justify-center py-3 sm:py-3.5 lg:py-4 text-sm sm:text-base items-center gap-2 rounded-xl bg-red-500 px-6 font-semibold text-white shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:bg-red-600">
                        <span>Book an Appointment</span>
                        <iconify-icon icon="lucide:arrow-right" class="text-base"></iconify-icon>
                    </a>
                    <a href="#contact"
                       class="inline-flex w-full sm:w-fit justify-center py-3 sm:py-3.5 lg:py-4 text-sm sm:text-base items-center gap-2 rounded-xl border border-brand-200 bg-brand-50 px-6 font-semibold text-brand-700 transition-all duration-300 hover:bg-brand-100 hover:border-brand-300">
                        <span>Talk to a Counsellor</span>
                        <iconify-icon icon="lucide:headset" class="text-base"></iconify-icon>
                    </a>
                </div>

    </div>


    {{-- =========================================================
        SLIDER CONTROLS
    ========================================================== --}}

    <div class="absolute bottom-7 left-1/2 z-20 flex -translate-x-1/2 items-center gap-2">

        <template x-for="(destination, index) in destinations" :key="'dot-' + index">

            <button type="button" @click="showSlide(index)" :aria-label="'Show ' + destination.name"
                :aria-current="current === index ? 'true' : 'false'"
                class="h-[7px] rounded-full transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-white/60"
                :class="current === index ?
                    'w-6 bg-white' :
                    'w-[7px] bg-white/45 hover:w-5 hover:bg-white/90'">
            </button>

        </template>

    </div>


    {{-- =========================================================
        PREVIOUS BUTTON
    ========================================================== --}}

    <button type="button" @click="showSlide(current - 1)" aria-label="Previous destination"
        class="group absolute left-4 top-1/2 z-20 hidden -translate-y-1/2 items-center justify-center rounded-full border border-white/20 bg-black/10 p-3 text-white/80 backdrop-blur-sm transition-all duration-300 hover:bg-white/20 hover:text-white focus:outline-none focus:ring-2 focus:ring-white/60 sm:flex">

        <svg xmlns="http://www.w3.org/2000/svg"
            class="size-5 transition-transform duration-300 group-hover:-translate-x-1" fill="none"
            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">

            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />

        </svg>

    </button>


    {{-- =========================================================
        NEXT BUTTON
    ========================================================== --}}

    <button type="button" @click="showSlide(current + 1)" aria-label="Next destination"
        class="group absolute right-4 top-1/2 z-20 hidden -translate-y-1/2 items-center justify-center rounded-full border border-white/20 bg-black/10 p-3 text-white/80 backdrop-blur-sm transition-all duration-300 hover:bg-white/20 hover:text-white focus:outline-none focus:ring-2 focus:ring-white/60 sm:flex">

        <svg xmlns="http://www.w3.org/2000/svg"
            class="size-5 transition-transform duration-300 group-hover:translate-x-1" fill="none"
            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">

            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />

        </svg>

    </button>

</section>
