<section class="relative overflow-hidden bg-brand-25 py-16 sm:py-20 lg:py-24">
    <div class="pointer-events-none absolute -left-32 top-24 h-80 w-80 rounded-full bg-brand-100/60 blur-[120px]"></div>

    <div class="relative mx-auto w-full max-w-7xl px-6 text-center lg:px-8">

        {{-- Section header --}}
        <header class="mx-auto max-w-2xl" data-reveal>
            <span
                class="inline-flex items-center gap-2 rounded-full border border-brand-100 bg-white px-4 py-1.5 text-[12px] font-semibold uppercase tracking-[0.16em] text-brand-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z" />
                </svg>
                Global Education
            </span>
            <h2
                class="mt-5 text-[28px] font-semibold leading-[1.2] tracking-[-0.02em] text-black sm:text-[30px] lg:text-[32px]">
                Choose your <span class="text-red-500">study destination</span>
            </h2>
            <p class="mx-auto mt-4 max-w-xl text-base leading-7 text-black/60">
                Explore top-tier universities, world-class education systems and vibrant cultures across leading global
                destinations.
            </p>
        </header>

        {{-- Destination cards --}}
        <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:mt-14 lg:grid-cols-3">
            @foreach ($destinations as $destination)
                <a href="{{ route('destination.details', ['slug' => $destination['slug']]) }}"
                    class="group block h-full" data-reveal
                    style="--reveal-delay: {{ (($destination['id'] ?? 0) % 3) * 90 }}ms">
                    @include('frontend.pages.destinations.card', ['destination' => $destination])
                </a>
            @endforeach
        </div>

        {{-- View all --}}
        <div class="mt-12 flex justify-center" data-reveal>
            <a href="{{ route('destinations') }}"
                class="group inline-flex items-center gap-2 rounded-xl border border-brand-200 bg-white px-6 py-3.5 text-sm font-semibold text-brand-700 transition-all duration-300 hover:-translate-y-0.5 hover:border-brand-300 hover:bg-brand-50 hover:text-brand-800">
                <span>View all destinations</span>
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>
    </div>
</section>
