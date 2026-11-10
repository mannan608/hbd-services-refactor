@extends('frontend.layouts.app')

@section('content')
    @php

        $sections = [
            ['id' => 'overview', 'label' => 'Overview'],
            ['id' => 'why-choose', 'label' => 'Why Choose'],
            ['id' => 'courses', 'label' => 'Popular Courses'],
            ['id' => 'study-levels', 'label' => 'Study Levels'],
            ['id' => 'universities', 'label' => 'Universities'],
            ['id' => 'requirements', 'label' => 'Entry Requirements'],
            ['id' => 'costs', 'label' => 'Living Costs & Aid'],
            ['id' => 'process', 'label' => 'How We Work'],
            ['id' => 'faq', 'label' => 'FAQs'],
        ];
    @endphp

    <main class="min-h-screen bg-white" x-data="destinationPage()" x-init="init()">

        {{-- HERO SECTION --}}
        <header class="relative isolate overflow-hidden bg-brand-950 text-white">
            {{-- Background layers --}}
            <div class="absolute inset-0 -z-10 overflow-hidden">
                <img src="{{ asset($destination['image'] ?? 'frontend-img/destinations/default.webp') }}"
                    alt="{{ $destination['name'] }}" class="h-full w-full object-cover opacity-15"
                    onerror="this.style.display='none'">
                <div class="absolute inset-0 bg-gradient-to-r from-brand-950 via-brand-950/95 to-brand-900/80"></div>
                <div class="pointer-events-none absolute -right-32 -top-32 h-96 w-96 rounded-full bg-brand-500/10 blur-3xl">
                </div>
                <div class="pointer-events-none absolute -bottom-32 -left-32 h-96 w-96 rounded-full bg-sky/10 blur-3xl">
                </div>
            </div>

            <div
                class="mx-auto grid max-w-7xl items-center gap-12 px-4 py-16 sm:px-6 lg:grid-cols-12 lg:gap-12 lg:px-8 lg:py-20">
                {{-- Left column: Headline, summary, features, and CTAs --}}
                <div class="lg:col-span-7" data-reveal>
                    <div
                        class="mb-5 inline-flex items-center gap-2 rounded-full border border-brand-400/30 bg-brand-500/15 px-4 py-1.5 text-[10px] md:text-[12px] font-semibold uppercase tracking-[0.16em] text-brand-200 backdrop-blur-sm">
                        <iconify-icon icon="lucide:graduation-cap" class="text-base text-brand-300"></iconify-icon>
                        <span>{{ $destination['hero']['badge'] ?? 'Study in ' . $details['code'] }}</span>
                    </div>

                    <h1
                        class="max-w-3xl text-2xl font-bold leading-[1.15] tracking-tight text-white sm:text-3xl lg:text-5xl">
                        {{ $details['hero']['title'] }} <br>
                        <span class="text-brand-300">{{ $details['name'] }}</span>
                    </h1>

                    <p class="mt-6 max-w-2xl text-sm leading-6 text-brand-100/80 sm:text-base sm:leading-7">
                        {{ $details['hero']['description'] }}
                    </p>

                    <div class="mt-10 flex items-center gap-4 flex-col sm:flex-row sm:gap-6">
                        <a href="#contact"
                            class="inline-flex w-full sm:w-fit items-center justify-center gap-2 rounded-xl bg-brand-500 px-6 py-2.5 sm:py-3.5 text-[13px] sm:text-sm font-semibold text-white shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:bg-brand-600">
                            <span>Get Free Consultation</span>
                            <iconify-icon icon="lucide:arrow-up-right" class="text-base"></iconify-icon>
                        </a>
                        <a href="#universities"
                            class="inline-flex w-full sm:w-fit items-center justify-center gap-2 rounded-xl border border-white/20 bg-white/10 px-6 py-2.5 sm:py-3.5 text-[13px] sm:text-smfont-semibold text-white backdrop-blur-sm transition-all duration-300 hover:bg-white/15">
                            <span>Explore Universities</span>
                            <iconify-icon icon="lucide:graduation-cap" class="text-base"></iconify-icon>
                        </a>
                    </div>
                </div>

                {{-- Right column: Hero summary snapshot card --}}
                <div class="lg:col-span-5" data-reveal style="--reveal-delay: 150ms">
                    <div
                            class="group relative overflow-hidden rounded-2xl border border-white bg-slate-white/50 p-2 shadow-2xl backdrop-blur-sm transition-all duration-500 hover:border-slate-700">
                            <div class="relative overflow-hidden rounded-xl">
                                <img src="/frontend-img/destinations/australia.webp" alt=""
                                    class="h-[420px] w-full object-cover transition-transform duration-700 group-hover:scale-105">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-slate-950/60 via-transparent to-transparent">
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </header>

        {{-- =========================================================
         STICKY SECTION NAVIGATION
    ========================================================== --}}
        <nav class="sticky top-26 sm:top-30 z-40 border-b border-brand-100 bg-white/95 shadow-sm backdrop-blur-md"
            aria-label="Destination sections">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div
                    class="-mb-px flex gap-1.5 overflow-x-auto py-2.5 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                    @foreach ($sections as $section)
                        <a href="#{{ $section['id'] }}" @click="activeSection = '{{ $section['id'] }}'"
                            :class="activeSection === '{{ $section['id'] }}'
                                ?
                                'bg-brand-500 text-white shadow-sm' :
                                'text-black/70 hover:bg-brand-50 hover:text-brand-600'"
                            class="shrink-0 rounded-xl px-4 py-2 text-xs font-semibold transition-all duration-200 sm:text-sm">
                            {{ $section['label'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        </nav>

        {{-- =========================================================
         ALL DESTINATION SECTIONS (Alternating Rhythm)
    ========================================================== --}}
        <div class="relative">

            {{-- Section 1: Overview & Cities (bg-white) --}}
            @include('frontend.pages.destinations.details-section.overview', [
                'details' => $details,
            ])

            {{-- Section 2: Why Choose & Benefits (bg-brand-25) --}}
            @include('frontend.pages.destinations.details-section.why-uk', ['details' => $details])

            {{-- Section 3: Popular Courses (bg-white) --}}
            @include('frontend.pages.destinations.details-section.course-section', [
                'details' => $details,
            ])

            {{-- Section 4: Academic Study Levels (bg-brand-25) --}}
            @include('frontend.pages.destinations.details-section.study-label', [
                'destination' => $destination,
            ])

            {{-- Section 5: Universities (bg-white) --}}
            @include('frontend.pages.destinations.details-section.universities', [
                'details' => $details,
            ])

            {{-- Section 6: Entry Requirements & Roadmap (bg-brand-25) --}}
            @include('frontend.pages.destinations.details-section.requirements', [
                'destination' => $destination,
            ])

            {{-- Section 7: Living Costs & Scholarships (bg-white) --}}
            @include('frontend.pages.destinations.details-section.cost-schollership', [
                'destination' => $destination,
            ])

            {{-- Section 8: How We Work / Process (bg-brand-25) --}}
            @include('frontend.pages.destinations.details-section.how-we-work', [
                'destination' => $destination,
            ])

           


        </div>
    </main>

    @push('scripts')
        <noscript>
            <style>
                [data-reveal] {
                    opacity: 1 !important;
                    transform: none !important;
                }
            </style>
        </noscript>

        <script>
            function destinationPage() {
                return {
                    activeSection: 'overview',
                    observer: null,
                    init() {
                        const sections = document.querySelectorAll('[data-section]');
                        if ('IntersectionObserver' in window) {
                            this.observer = new IntersectionObserver((entries) => {
                                entries.forEach((entry) => {
                                    if (entry.isIntersecting) {
                                        this.activeSection = entry.target.id;
                                    }
                                });
                            }, {
                                rootMargin: '-20% 0px -60% 0px',
                                threshold: 0
                            });

                            sections.forEach((section) => this.observer.observe(section));
                        }
                    }
                };
            }

            // Conflict-free scroll reveal initialization
            (function() {
                function setupReveal() {
                    var nodes = document.querySelectorAll('[data-reveal]');
                    if (!nodes.length) return;

                    if (!('IntersectionObserver' in window)) {
                        nodes.forEach(function(node) {
                            node.classList.add('is-revealed', 'is-visible');
                        });
                        return;
                    }

                    var revealObserver = new IntersectionObserver(function(entries, observer) {
                        entries.forEach(function(entry) {
                            if (entry.isIntersecting) {
                                entry.target.classList.add('is-revealed', 'is-visible');
                                observer.unobserve(entry.target);
                            }
                        });
                    }, {
                        threshold: 0.05,
                        rootMargin: '0px 0px -20px 0px'
                    });

                    nodes.forEach(function(node) {
                        var rect = node.getBoundingClientRect();
                        // Reveal immediately if already in view on page load
                        if (rect.top < window.innerHeight && rect.bottom > 0) {
                            node.classList.add('is-revealed', 'is-visible');
                        } else {
                            revealObserver.observe(node);
                        }
                    });

                    // Safety fallback: ensure nothing stays invisible even on edge viewports or fast scroll
                    setTimeout(function() {
                        nodes.forEach(function(node) {
                            node.classList.add('is-revealed', 'is-visible');
                        });
                    }, 1200);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', setupReveal);
                } else {
                    setupReveal();
                }
            })();
        </script>
    @endpush
@endsection
