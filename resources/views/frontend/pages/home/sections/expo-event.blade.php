<section class="py-12 md:py-16 lg:py-20 defer-render">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <header
            class="mx-auto max-w-2xl px-4 pb-6 text-center font-sans reveal-on-scroll opacity-0 translate-y-10 transition-all duration-1000 ease-out">
            <div
                class="inline-flex items-center gap-2 px-4 py-2 bg-brand-500/10 rounded-full mb-6 transition-all duration-700 delay-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-zap w-4 h-4 text-brand-500 transition-transform duration-500 group-hover:scale-110">
                    <path
                        d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z">
                    </path>
                </svg>
                <span class="text-sm font-semibold text-brand-500 uppercase">Expos & Live Learning</span>
            </div>

            <!-- Main Heading -->
            <h1
                class="text-2xl sm:text-3xl font-extrabold tracking-tight text-slate-900 md:text-4xl lg:text-5xl uppercase transition-all duration-700 delay-200">
                Upcoming Digital Events
            </h1>

            <!-- Subheading Description -->
            <p
                class="mx-auto mt-4 max-w-2xl text-base text-neutral-600 sm:text-lg transition-all duration-700 delay-300">
                Reserve your spot in high-value webinars and virtual expos to fast-track your university planning.
            </p>
        </header>

        <div
            class="relative w-full overflow-hidden bg-neutral-50 reveal-on-scroll opacity-0 translate-y-10 transition-all duration-1000 ease-out delay-200 rounded-3xl">
            <div
                class="pointer-events-none absolute bottom-0 left-0 top-0 z-10 w-8 md:w-28 bg-gradient-to-r from-neutral-50 via-neutral-50/80 to-transparent">
            </div>
            <div
                class="pointer-events-none absolute bottom-0 right-0 top-0 z-10 w-8 md:w-28 bg-gradient-to-l from-neutral-50 via-neutral-50/80 to-transparent">
            </div>

            <div class="animate-marquee flex w-max gap-6 py-4">
                @forelse ($events as $event)
                    @for ($i = 0; $i < 5; $i++)
                        <div class="w-113.5">
                            @include('frontend.pages.events.event-card', ['event' => $event])
                        </div>
                    @endfor
                @empty
                    <div class="col-span-full py-12 text-center">
                        <p class="text-gray-500">No events found.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</section>
