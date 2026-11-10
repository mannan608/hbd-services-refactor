<section class="py-12 md:py-16 lg:py-20 bg-brand-50 defer-render">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <header
            class="mx-auto max-w-2xl px-4 pb-8 text-center font-sans reveal-on-scroll opacity-0 translate-y-10 transition-all duration-1000 ease-out">
            <div
                class="inline-flex items-center gap-2 px-4 py-2 bg-brand-500/10 rounded-full mb-6 transition-all duration-700 delay-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-zap w-4 h-4 text-brand-500 transition-transform duration-500 group-hover:scale-110">
                    <path
                        d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z">
                    </path>
                </svg>
                <span class="text-sm font-semibold text-brand-500 uppercase">One-on-One Support</span>
            </div>

            <!-- Main Heading -->
            <h1
                class="text-2xl sm:text-3xl font-extrabold tracking-tight text-slate-900 md:text-4xl lg:text-5xl uppercase transition-all duration-700 delay-200">
                Meet Our Expert Counsellors
            </h1>

            <!-- Subheading Description -->
            <p
                class="mx-auto mt-4 max-w-2xl text-base text-neutral-600 sm:text-lg transition-all duration-700 delay-300">
                Connect with certified, empathetic professionals dedicated to mapping your precise academic outcome.
            </p>
        </header>
        <div class="h-80">
            <div class="swiper myCounsellerSwiper w-full overflow-hidden py-4">
                <div class="swiper-wrapper">
                    @forelse ($counsellors ?? [] as $counsellor)
                        <div class="swiper-slide h-auto">
                            @include('frontend.pages.counsellors.counseller-card', [
                                'counsellor' => $counsellor,
                            ])
                        </div>
                    @empty
                        <div class="swiper-slide h-auto">
                            <div class="rounded-2xl border border-slate-100 bg-white p-6 text-center text-slate-500 shadow-sm">
                                No counsellors are available right now.
                            </div>
                        </div>
                    @endforelse

                </div>

                <!-- Pagination Dots -->
                {{-- <div class="swiper-pagination mt-4"></div> --}}
            </div>
        </div>
    </div>
</section>
