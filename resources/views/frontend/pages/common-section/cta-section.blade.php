<section class="bg-white py-12 sm:py-16 lg:py-24">
    <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="relative overflow-hidden rounded-2xl sm:rounded-3xl border border-brand-800 bg-cover bg-center bg-no-repeat p-6 text-center text-white shadow-2xl sm:p-10 lg:p-16"
            data-reveal
            style="background-image: linear-gradient(to right, rgba(6, 29, 52, 0.94), rgba(10, 48, 83, 0.9)), url('https://images.unsplash.com/photo-1518837695005-2083093ee35b?q=80&w=1400&auto=format&fit=crop');">

            <div class="pointer-events-none absolute -left-16 -top-16 sm:-left-20 sm:-top-20 h-56 w-56 sm:h-72 sm:w-72 rounded-full bg-brand-500/20 blur-[80px] sm:blur-[100px]"></div>
            <div class="pointer-events-none absolute -bottom-20 -right-12 sm:-bottom-24 sm:-right-16 h-56 w-56 sm:h-72 sm:w-72 rounded-full bg-accent-two-500/10 blur-[80px] sm:blur-[100px]"></div>

            <div class="relative mx-auto max-w-3xl">
                <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-3.5 py-1.5 text-[11px] sm:text-[12px] font-semibold uppercase tracking-[0.16em] text-brand-100 backdrop-blur">
                    Get started
                </span>

                <h2 class="mt-5 sm:mt-6 text-[24px] sm:text-[28px] lg:text-[36px] font-semibold leading-[1.2] tracking-[-0.02em] text-white">
                    Start your Australian education journey today
                </h2>

                <p class="mx-auto mt-3 sm:mt-4 max-w-2xl text-sm sm:text-base leading-6 sm:leading-7 text-brand-100/85">
                    Take two minutes to build your safe student profile, connect with universities, unlock scholarships and consult expert mentors instantly.
                </p>

                <div class="mt-6 sm:mt-8 flex flex-col items-center justify-center gap-3 sm:gap-4 sm:flex-row">
                    <a href="{{ route('register') }}"
                        class="group inline-flex w-full items-center justify-center gap-2 rounded-xl bg-red-500 px-5 py-3.5 text-sm font-semibold text-white shadow-lg shadow-brand-950/40 transition-all duration-300 hover:-translate-y-0.5 hover:bg-red-600 sm:w-auto sm:px-6">
                        Create free profile
                        <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                    <a href="#contact"
                       class="inline-flex w-full sm:w-fit justify-center py-2.5 sm:py-3.5 text-[13px] sm:text-sm items-center gap-2 rounded-xl border border-brand-200 bg-brand-50 px-6 font-semibold text-brand-700 transition-all duration-300 hover:bg-brand-100 hover:border-brand-300">
                        <span>Talk to a Counsellor</span>
                        <iconify-icon icon="lucide:headset" class="text-base"></iconify-icon>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>