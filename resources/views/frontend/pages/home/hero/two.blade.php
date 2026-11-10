{{-- ============================================================
    HERO DESTINATION SLIDER
    Tailwind CSS + Alpine.js
============================================================ --}}

@php
    $destinations = [
        [
            'name' => 'Australia',

            'badge' => 'Study in Australia',

            'title' => 'Your Future in Australia Starts Here.',

            'description' =>
                'Compare tuition, English scores, intakes and scholarships across 620+ institutions — then talk to a verified counsellor for free.',

            'image' => 'frontend-img/hero/hero-campus.jpg',

            'alt' => 'International students walking through an Australian university campus',

            'search_placeholder' => 'Search courses, e.g. Master of IT in Melbourne',
        ],

        [
            'name' => 'United Kingdom',

            'badge' => 'Study in the UK',

            'title' => 'Build Your Future in the UK.',

            'description' =>
                'Explore leading UK universities, discover the right course and find scholarship opportunities for your future.',

            'image' => 'frontend-img/hero/hero-1.jpg',

            'alt' => 'Students studying in the United Kingdom',

            'search_placeholder' => 'Search courses, e.g. MSc Computer Science in London',
        ],

        [
            'name' => 'Canada',

            'badge' => 'Study in Canada',

            'title' => 'Start Your Canadian Journey.',

            'description' =>
                'Discover Canadian universities and colleges, compare programs, tuition fees, intakes and scholarship opportunities.',

            'image' => 'frontend-img/hero/hero-2.jpg',

            'alt' => 'International students studying in Canada',

            'search_placeholder' => 'Search courses, e.g. MBA in Toronto',
        ],

        [
            'name' => 'United States',

            'badge' => 'Study in the USA',

            'title' => 'Your American Dream Starts Here.',

            'description' =>
                'Find the right US university and course while comparing tuition fees, admission requirements and scholarship opportunities.',

            'image' => 'frontend-img/hero/hero-3.jpg',

            'alt' => 'University campus in the United States',

            'search_placeholder' => 'Search courses, e.g. MS in Computer Science in California',
        ],

        [
            'name' => 'Malaysia',

            'badge' => 'Study in Malaysia',

            'title' => 'Discover Your Future in Malaysia.',

            'description' =>
                'Explore world-class universities, flexible programs, affordable tuition and exciting career opportunities in Malaysia.',

            'image' => 'frontend-img/hero/hero-4.jpg',

            'alt' => 'International students in Malaysia',

            'search_placeholder' => 'Search courses, e.g. Bachelor of Business in Malaysia',
        ],
    ];
@endphp


<section x-data="{
    destinations: @js($destinations),

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
    class="relative isolate flex min-h-[84vh] w-full items-center justify-center overflow-hidden">


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


        {{-- =====================================================
            CONTENT WRAPPER
        ====================================================== --}}

        <div :key="current" x-data="{ loaded: false }" x-init="setTimeout(() => {
            loaded = true
        }, 100)" class="mx-auto max-w-4xl">


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

            <h1 class="mt-7 text-4xl font-bold uppercase leading-tight tracking-tight transition-all duration-700 delay-100 sm:text-6xl lg:text-7xl"
                :class="loaded
                    ?
                    'translate-y-0 opacity-100' :
                    'translate-y-6 '"
                x-text="activeDestination.title">
            </h1>


            {{-- =================================================
                DESCRIPTION
            ================================================== --}}

            <p class="mx-auto mt-5 max-w-2xl text-base leading-relaxed text-white/85 transition-all duration-700 delay-200 sm:text-lg"
                :class="loaded
                    ?
                    'translate-y-0 opacity-100' :
                    'translate-y-6 '"
                x-text="activeDestination.description">
            </p>


            {{-- =================================================
                SEARCH BOX
            ================================================== --}}

            <div class="mx-auto mt-9 flex max-w-2xl flex-col gap-2 rounded-2xl bg-white p-2 shadow-lift transition-all duration-700 delay-300 hover:scale-[1.01] hover:shadow-xl focus-within:ring-2 focus-within:ring-brand-300 focus-within:shadow-xl sm:flex-row"
                :class="loaded
                    ?
                    'translate-y-0 opacity-100' :
                    'translate-y-6 '">


                {{-- Search input --}}

                <div class="relative flex-1">


                    {{-- Search icon --}}

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="absolute left-3 top-1/2 size-6 -translate-y-1/2 text-neutral-500">

                        <path d="m21 21-4.34-4.34">
                        </path>

                        <circle cx="11" cy="11" r="8">
                        </circle>

                    </svg>


                    <input type="text" :placeholder="activeDestination.search_placeholder"
                        class="h-12 w-full rounded-md border-0 bg-transparent px-3 py-1 pl-12 text-base text-neutral-800 shadow-none outline-none placeholder:text-neutral-400 focus:ring-0">

                </div>


                {{-- =================================================
                    AI ASSIST BUTTON
                ================================================== --}}

                <button type="button"
                    class="group inline-flex h-12 cursor-pointer items-center justify-center gap-2 whitespace-nowrap rounded-md bg-brand-500/20 px-6 text-base font-bold text-brand-500 shadow transition-all duration-500 ease-out hover:scale-105 hover:bg-brand-500 hover:text-white hover:shadow-lg active:scale-95">


                    {{-- AI Icon --}}

                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                        fill="none" class="transition-transform duration-500 ease-out group-hover:rotate-12">

                        <path
                            d="M13.3338 1.33407V4.00063M14.6672 2.66735H12.0004M7.34461 1.87701C7.37318 1.72408 7.45434 1.58596 7.57403 1.48657C7.69372 1.38717 7.84441 1.33276 8 1.33276C8.15559 1.33276 8.30628 1.38717 8.42597 1.48657C8.54566 1.58596 8.62682 1.72408 9.35611 5.58219C9.40588 5.84561 9.53391 6.08792 9.72349 6.27748C9.91308 6.46704 10.1554 6.59506 10.4189 6.64482L14.1245 7.34546C14.2774 7.37402 14.4156 7.45517 14.515 7.57485C14.6144 7.69452 14.6688 7.84519 14.6688 8.00076C14.6688 8.15633 14.6144 8.307 14.515 8.42668C14.4156 8.54636 14.2774 8.62751 14.1245 8.65607L10.4189 9.35671C10.1554 9.40647 9.91308 9.53449 9.72349 9.72405C9.53391 9.91361 9.40588 9.35671 9.35611 10.4193L8.65539 14.1245C8.62682 14.2774 8.54566 14.4156 8.42597 14.515C8.30628 14.6144 8.15559 14.6688 8 14.6688C7.84441 14.6688 7.69372 14.6144 7.57403 14.515C7.45434 14.4156 7.37318 14.2774 7.34461 14.1245L6.64389 10.4193C6.59412 10.1559 6.46692 9.91361 6.27651 9.72405C6.08692 9.53449 5.84459 9.40647 5.58114 9.35671L1.87551 8.65607C1.72256 8.62751 1.58443 8.54636 1.48502 8.42668C1.38561 8.307 1.3312 8.15633 1.3312 8.00076C1.3312 7.84519 1.38561 7.69452 1.48502 7.57485C1.58443 7.45517 1.72256 7.37402 1.48502 7.57485Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />

                    </svg>


                    <span>
                        AI Assist
                    </span>

                </button>

            </div>

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