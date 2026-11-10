
<section
    x-data="{
        active: 0,
        slides: [
            {
                title: 'Study Abroad.<br>Build Your Future.',
                subtitle: 'Explore world-class universities, discover the right program, and take the first step toward your global career.',
                image: 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&w=1200&q=85'
            },
            {
                title: 'Your Journey.<br>Our Guidance.',
                subtitle: 'Get personalized guidance from choosing a university to preparing your application with confidence.',
                image: 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1200&q=85'
            },
            {
                title: 'Learn Globally.<br>Grow Without Limits.',
                subtitle: 'Connect with leading institutions and create opportunities that take your career further.',
                image: 'https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=1200&q=85'
            }
        ]
    }"
    x-init="setInterval(() => active = (active + 1) % slides.length, 6000)"
    class="relative overflow-hidden bg-slate-50"
>
    <div class="mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-10 lg:py-24">

        <div class="grid min-h-[620px] items-center gap-12 lg:grid-cols-2 lg:gap-16">

            <!-- Content -->
            <div class="relative z-10">
                <div class="max-w-xl">

                    <div class="mb-5 flex items-center gap-3 text-sm font-semibold uppercase tracking-[0.18em] text-indigo-600">
                        <span class="h-px w-8 bg-indigo-600"></span>
                        Your journey starts here
                    </div>

                    <div class="relative min-h-[250px] sm:min-h-[280px]">
                        <template x-for="(slide, index) in slides" :key="index">
                            <div
                                x-show="active === index"
                                x-transition:enter="transition ease-out duration-700"
                                x-transition:enter-start="opacity-0 translate-x-6"
                                x-transition:enter-end="opacity-100 translate-x-0"
                                x-transition:leave="transition ease-in duration-500 absolute inset-0"
                                x-transition:leave-start="opacity-100 translate-x-0"
                                x-transition:leave-end="opacity-0 -translate-x-6"
                                class="absolute inset-0"
                            >
                                <h1
                                    class="text-4xl font-bold leading-[1.08] tracking-tight text-slate-950 sm:text-5xl lg:text-6xl"
                                    x-html="slide.title"
                                ></h1>

                                <p
                                    class="mt-6 max-w-lg text-base leading-7 text-slate-600 sm:text-lg"
                                    x-text="slide.subtitle"
                                ></p>

                                <a
                                    href="#"
                                    class="mt-8 inline-flex items-center gap-3 rounded-xl bg-slate-950 px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-indigo-600"
                                >
                                    Explore Programs
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-5-5 5 5-5 5"/>
                                    </svg>
                                </a>
                            </div>
                        </template>
                    </div>

                    <!-- Dots -->
                    <div class="mt-10 flex items-center gap-2">
                        <template x-for="(slide, index) in slides" :key="index">
                            <button
                                @click="active = index"
                                class="h-1.5 rounded-full transition-all duration-500"
                                :class="active === index ? 'w-8 bg-indigo-600' : 'w-2 bg-slate-300'"
                                :aria-label="'Go to slide ' + (index + 1)"
                            ></button>
                        </template>
                    </div>

                </div>
            </div>

            <!-- Image -->
            <div class="relative">
                <div class="relative h-[420px] overflow-hidden rounded-[2rem] sm:h-[520px] lg:h-[600px]">

                    <template x-for="(slide, index) in slides" :key="index">
                        <img
                            x-show="active === index"
                            x-transition:enter="transition ease-out duration-1000"
                            x-transition:enter-start="opacity-0 scale-105"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-700 absolute inset-0"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-105"
                            :src="slide.image"
                            alt=""
                            class="absolute inset-0 h-full w-full object-cover"
                        >
                    </template>

                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/20 to-transparent"></div>
                </div>

                <!-- Floating label -->
                <div class="absolute bottom-5 left-5 rounded-2xl bg-white/90 px-5 py-4 shadow-lg backdrop-blur sm:bottom-7 sm:left-7">
                    <p class="text-xs font-medium text-slate-500">Discover your next destination</p>
                    <p class="mt-1 text-sm font-semibold text-slate-900">Global education opportunities</p>
                </div>
            </div>

        </div>
    </div>
</section>


<section
    x-data="{
        active: 0,
        slides: [
            {
                title: 'Discover a world<br>of possibilities.',
                subtitle: 'Find universities, programs, and opportunities designed around your ambitions.',
                image: 'https://images.unsplash.com/photo-1498243691581-b145c3f54a5a?auto=format&fit=crop&w=1800&q=85'
            },
            {
                title: 'Turn your ambition<br>into a career.',
                subtitle: 'Build the skills, experience, and international network to move your future forward.',
                image: 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&w=1800&q=85'
            },
            {
                title: 'Your future starts<br>with one decision.',
                subtitle: 'Get expert support throughout your study abroad journey.',
                image: 'https://images.unsplash.com/photo-1519452575417-564c1401ecc0?auto=format&fit=crop&w=1800&q=85'
            }
        ]
    }"
    x-init="setInterval(() => active = (active + 1) % slides.length, 6500)"
    class="bg-white p-4 sm:p-6 lg:p-8"
>
    <div class="relative mx-auto max-w-[1500px] overflow-hidden rounded-[2rem]">

        <!-- Images -->
        <div class="absolute inset-0">
            <template x-for="(slide, index) in slides" :key="index">
                <img
                    x-show="active === index"
                    x-transition:enter="transition duration-1000 ease-out"
                    x-transition:enter-start="opacity-0 scale-105"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition duration-700 absolute inset-0"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    :src="slide.image"
                    alt=""
                    class="absolute inset-0 h-full w-full object-cover"
                >
            </template>

            <div class="absolute inset-0 bg-gradient-to-r from-slate-950/75 via-slate-950/40 to-slate-950/10"></div>
        </div>

        <!-- Content -->
        <div class="relative flex min-h-[650px] items-center px-6 py-20 sm:px-12 lg:px-20">

            <div class="max-w-2xl text-white">

                <p class="mb-5 text-sm font-semibold uppercase tracking-[0.2em] text-white/70">
                    Study abroad with confidence
                </p>

                <div class="relative min-h-[280px] sm:min-h-[300px]">

                    <template x-for="(slide, index) in slides" :key="index">
                        <div
                            x-show="active === index"
                            x-transition:enter="transition duration-700 ease-out"
                            x-transition:enter-start="opacity-0 translate-x-5"
                            x-transition:enter-end="opacity-100 translate-x-0"
                            x-transition:leave="transition duration-400 absolute inset-0"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0 -translate-x-5"
                            class="absolute inset-0"
                        >
                            <h1
                                x-html="slide.title"
                                class="text-4xl font-bold leading-[1.05] tracking-tight sm:text-5xl lg:text-7xl"
                            ></h1>

                            <p
                                x-text="slide.subtitle"
                                class="mt-6 max-w-xl text-base leading-7 text-white/80 sm:text-lg"
                            ></p>

                            <a
                                href="#"
                                class="mt-8 inline-flex items-center rounded-xl bg-white px-6 py-3.5 text-sm font-semibold text-slate-950 transition hover:bg-indigo-50"
                            >
                                Start Your Journey
                            </a>
                        </div>
                    </template>

                </div>

                <div class="mt-8 flex gap-2">
                    <template x-for="(slide, index) in slides" :key="index">
                        <button
                            @click="active = index"
                            class="h-1 rounded-full transition-all duration-500"
                            :class="active === index ? 'w-10 bg-white' : 'w-3 bg-white/40'"
                        ></button>
                    </template>
                </div>

            </div>
        </div>
    </div>
</section>


<section
    x-data="{
        active: 0,
        slides: [
            {
                title: 'Make your next<br>chapter global.',
                subtitle: 'Explore leading universities and find a study destination that fits your goals.',
                image: 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1200&q=85'
            },
            {
                title: 'Choose the right<br>path for you.',
                subtitle: 'Compare programs, discover opportunities, and make your decision with confidence.',
                image: 'https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=1200&q=85'
            },
            {
                title: 'Build your future<br>anywhere.',
                subtitle: 'Get the guidance you need from your first search to your final application.',
                image: 'https://images.unsplash.com/photo-1519452575417-564c1401ecc0?auto=format&fit=crop&w=1200&q=85'
            }
        ]
    }"
    x-init="setInterval(() => active = (active + 1) % slides.length, 6000)"
    class="bg-white"
>
    <div class="mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-10 lg:py-28">

        <div class="grid items-center gap-14 lg:grid-cols-[0.9fr_1.1fr] lg:gap-20">

            <!-- Text -->
            <div>

                <span class="inline-flex items-center rounded-full bg-indigo-50 px-4 py-2 text-xs font-semibold uppercase tracking-wider text-indigo-600">
                    Global education
                </span>

                <div class="relative mt-7 min-h-[300px]">

                    <template x-for="(slide, index) in slides" :key="index">
                        <div
                            x-show="active === index"
                            x-transition:enter="transition duration-700 ease-out"
                            x-transition:enter-start="opacity-0 translate-y-4"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition duration-400 absolute inset-0"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0 -translate-y-4"
                            class="absolute inset-0"
                        >
                            <h1
                                x-html="slide.title"
                                class="text-4xl font-bold leading-[1.08] tracking-tight text-slate-950 sm:text-5xl lg:text-6xl"
                            ></h1>

                            <p
                                x-text="slide.subtitle"
                                class="mt-6 max-w-lg text-base leading-7 text-slate-500 sm:text-lg"
                            ></p>

                            <div class="mt-8 flex flex-wrap gap-3">
                                <a
                                    href="#"
                                    class="rounded-xl bg-indigo-600 px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-indigo-700"
                                >
                                    Explore Programs
                                </a>

                                <a
                                    href="#"
                                    class="rounded-xl border border-slate-200 px-6 py-3.5 text-sm font-semibold text-slate-700 transition hover:border-slate-300 hover:bg-slate-50"
                                >
                                    Learn More
                                </a>
                            </div>
                        </div>
                    </template>

                </div>

                <div class="mt-8 flex items-center gap-4">

                    <div class="flex gap-2">
                        <template x-for="(slide, index) in slides" :key="index">
                            <button
                                @click="active = index"
                                class="h-2 rounded-full transition-all duration-500"
                                :class="active === index ? 'w-8 bg-indigo-600' : 'w-2 bg-slate-200'"
                            ></button>
                        </template>
                    </div>

                    <span class="text-xs text-slate-400">
                        <span x-text="String(active + 1).padStart(2, '0')"></span>
                        /
                        <span x-text="String(slides.length).padStart(2, '0')"></span>
                    </span>

                </div>

            </div>

            <!-- Image -->
            <div class="relative">

                <div class="relative aspect-[4/3] overflow-hidden rounded-[2rem] bg-slate-100 sm:aspect-[5/4]">

                    <template x-for="(slide, index) in slides" :key="index">
                        <img
                            x-show="active === index"
                            x-transition:enter="transition duration-1000 ease-out"
                            x-transition:enter-start="opacity-0 scale-105"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition duration-600 absolute inset-0"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0 scale-105"
                            :src="slide.image"
                            alt=""
                            class="absolute inset-0 h-full w-full object-cover"
                        >
                    </template>

                </div>

                <!-- Small accent card -->
                <div class="absolute -bottom-5 left-5 hidden rounded-2xl bg-white p-4 shadow-xl sm:block lg:left-8">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 14l9-5-9-5-9 5 9 5z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 12v5c2 2 4.5 3 7 3s5-1 7-3v-5"/>
                            </svg>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-slate-900">Global Opportunities</p>
                            <p class="text-xs text-slate-500">Your future starts here</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
