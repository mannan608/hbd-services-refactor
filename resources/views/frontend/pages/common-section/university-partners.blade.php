@php
    $universities = [
        ['name' => 'Stanford University', 'logo' => asset('frontend-img/patner/sponsor_1.png')],
        ['name' => 'Harvard University', 'logo' => asset('frontend-img/patner/sponsor_2.png')],
        ['name' => 'University of Oxford', 'logo' => asset('frontend-img/patner/sponsor_3.png')],
        ['name' => 'MIT', 'logo' => asset('frontend-img/patner/sponsor_4.png')],
        ['name' => 'University of Cambridge', 'logo' => asset('frontend-img/patner/sponsor_5.png')],
        ['name' => 'Yale University', 'logo' => asset('frontend-img/patner/sponsor_6.png')],
        ['name' => 'Princeton University', 'logo' => asset('frontend-img/patner/sponsor_7.png')],
        ['name' => 'Columbia University', 'logo' => asset('frontend-img/patner/sponsor_8.png')],
        ['name' => 'ETH Zurich', 'logo' => asset('frontend-img/patner/sponsor_9.png')],
        ['name' => 'UC Berkeley', 'logo' => asset('frontend-img/patner/sponsor_10.png')],
        ['name' => 'UC Berkeley', 'logo' => asset('frontend-img/patner/sponsor_11.png')],
        ['name' => 'UC Berkeley', 'logo' => asset('frontend-img/patner/sponsor_12.png')],
    ];
@endphp

<section class="py-10 sm:py-12 md:py-16 lg:py-20 overflow-hidden defer-render">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-4 md:mb-5 lg:mb-6">
        {{-- Header --}}
        <header class="mx-auto max-w-2xl text-center" data-reveal>
            <span class="inline-flex items-center gap-2 rounded-full border border-brand-100 bg-white px-3.5 py-1.5 text-[11px] sm:text-[12px] font-semibold uppercase tracking-[0.16em] text-brand-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z" />
                </svg>
                Global Network
            </span>
            <h2 class="mt-4 sm:mt-5 text-[24px] sm:text-[28px] lg:text-[32px] font-semibold leading-[1.2] tracking-[-0.02em] text-black">
                Trusted by <span class="text-red-500">2,000+ universities</span>
            </h2>
            <p class="mx-auto mt-3 sm:mt-4 max-w-xl text-sm sm:text-base leading-6 sm:leading-7 text-black/60">
                Partnering with the world's leading educational institutions.
            </p>
        </header>
    </div>

    <div class="relative space-y-4 sm:space-y-5">
        {{-- Left fade --}}
        <div class="absolute left-0 top-0 bottom-0 w-12 sm:w-20 md:w-32 lg:w-40 bg-gradient-to-r from-neutral-50 to-transparent z-20 pointer-events-none"></div>
        {{-- Right fade --}}
        <div class="absolute right-0 top-0 bottom-0 w-12 sm:w-20 md:w-32 lg:w-40 bg-gradient-to-l from-neutral-50 to-transparent z-20 pointer-events-none"></div>

        {{-- Row 1: Left → Right --}}
        <div class="w-full overflow-hidden">
            <div class="flex w-max animate-[university-left-to-right_50s_linear_infinite] hover:[animation-play-state:paused]">
                <div class="flex shrink-0 gap-3 sm:gap-4 md:gap-5 pr-3 sm:pr-4 md:pr-5">
                    @foreach ($universities as $university)
                        <div class="flex shrink-0 items-center justify-center px-5 py-4 sm:px-6 sm:py-5 md:px-7 md:py-6 bg-white rounded-xl sm:rounded-2xl border border-neutral-200 shadow-sm transition-all duration-300 hover:shadow-lg hover:border-brand-500/30 group">
                            <div class="shrink-0 flex items-center justify-center">
                                <img src="{{ $university['logo'] }}" 
                                     alt="{{ $university['name'] }}"
                                     class="max-w-full max-h-8 sm:max-h-9 md:max-h-9.5 w-auto h-auto object-contain transition-transform duration-300 group-hover:scale-110">
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- Duplicate for seamless loop --}}
                <div class="flex shrink-0 gap-3 sm:gap-4 md:gap-5 pr-3 sm:pr-4 md:pr-5" aria-hidden="true">
                    @foreach ($universities as $university)
                        <div class="flex shrink-0 items-center justify-center px-5 py-4 sm:px-6 sm:py-5 md:px-7 md:py-6 bg-white rounded-xl sm:rounded-2xl border border-neutral-200 shadow-sm transition-all duration-300 hover:shadow-lg hover:border-brand-500/30 group">
                            <div class="shrink-0 flex items-center justify-center">
                                <img src="{{ $university['logo'] }}" 
                                     alt="{{ $university['name'] }}"
                                     class="max-w-full max-h-8 sm:max-h-9 md:max-h-9.5 w-auto h-auto object-contain transition-transform duration-300 group-hover:scale-110">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Row 2: Right → Left --}}
        <div class="w-full overflow-hidden">
            <div class="flex w-max animate-[university-right-to-left_50s_linear_infinite] hover:[animation-play-state:paused]">
                <div class="flex shrink-0 gap-3 sm:gap-4 md:gap-5 pr-3 sm:pr-4 md:pr-5">
                    @foreach ($universities as $university)
                        <div class="flex shrink-0 items-center justify-center px-5 py-4 sm:px-6 sm:py-5 md:px-7 md:py-6 bg-white rounded-xl sm:rounded-2xl border border-neutral-200 shadow-sm transition-all duration-300 hover:shadow-lg hover:border-brand-500/30 group">
                            <div class="shrink-0 flex items-center justify-center">
                                <img src="{{ $university['logo'] }}" 
                                     alt="{{ $university['name'] }}"
                                     class="max-w-full max-h-8 sm:max-h-9 md:max-h-9.5 w-auto h-auto object-contain transition-transform duration-300 group-hover:scale-110">
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- Duplicate for seamless loop --}}
                <div class="flex shrink-0 gap-3 sm:gap-4 md:gap-5 pr-3 sm:pr-4 md:pr-5" aria-hidden="true">
                    @foreach ($universities as $university)
                        <div class="flex shrink-0 items-center justify-center px-5 py-4 sm:px-6 sm:py-5 md:px-7 md:py-6 bg-white rounded-xl sm:rounded-2xl border border-neutral-200 shadow-sm transition-all duration-300 hover:shadow-lg hover:border-brand-500/30 group">
                            <div class="shrink-0 flex items-center justify-center">
                                <img src="{{ $university['logo'] }}" 
                                     alt="{{ $university['name'] }}"
                                     class="max-w-full max-h-8 sm:max-h-9 md:max-h-9.5 w-auto h-auto object-contain transition-transform duration-300 group-hover:scale-110">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>