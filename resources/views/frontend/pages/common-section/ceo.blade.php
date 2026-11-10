

<section class="relative isolate overflow-hidden bg-[#050b12] text-white pt-10 mt-16 md:mt-20 lg-mt-24">

    <div
        class="relative mx-auto flex min-h-[500px] max-w-7xl flex-col items-center px-5 lg:flex-row lg:items-center lg:px-8">

        {{-- =======================
            CONTENT
        ======================== --}}
        <div
            class="relative z-30 w-full py-12 sm:py-16 lg:w-[56%] lg:py-20">

            {{-- Label --}}
            <div class="mb-4 flex items-center gap-3">
                <span class="h-px w-8 bg-brand-500"></span>

                <span class="text-[10px] font-semibold uppercase tracking-[0.22em] text-brand-400">
                    Leadership
                </span>
            </div>

            {{-- Heading --}}
            <h2
                class="max-w-xl font-sans text-3xl font-bold leading-[1.12] tracking-[-0.025em] text-white sm:text-4xl lg:text-[42px]">
                A Message From
                <span class="text-brand-400">
                    Our CEO
                </span>
            </h2>

            {{-- Heading decoration --}}
            <div class="mt-6 flex items-center gap-2">
                <div class="h-[3px] w-14 rounded-full bg-brand-500"></div>
                <div class="h-[3px] w-3 rounded-full bg-brand-700"></div>
            </div>

            {{-- Message --}}
            <p
                class="mt-7 max-w-[590px] font-sans text-[13px] font-normal leading-[1.9] text-slate-300 sm:text-sm">
                HBD Services started as a student recruitment agency,
                partnering with top-ranking education institutions in
                Australia. Today, it has grown into one of the leading
                study abroad counselling agencies, operating across
                Australia, the UAE, and Bangladesh.
            </p>

            <p
                class="mt-4 max-w-[590px] font-sans text-[13px] font-normal leading-[1.9] text-slate-400 sm:text-sm">
                Over the years, HBD Services has expanded its portfolio
                to include three accredited training organizations,
                offering Diploma and Advanced Diploma programs to
                on-shore students in Australia. 
                <a href="{{ route('owner') }}"
                           class="inline-flex items-center gap-1.5 text-xs font-bold text-[#00a8ff] hover:text-[#33b8ff] transition-colors uppercase">
                           Meet Our CEO
                           <svg class="h-3.5 w-3.5 transition-transform group-hover:tranneutral-x-1" fill="none"
                               stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                               <path stroke-linecap="round" stroke-linejoin="round"
                                   d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                           </svg>
                       </a>
            </p>

            {{-- Signature --}}
            <div class="mt-8 sm:mt-10">

                <div
                    class="mb-4 h-px w-full max-w-[590px] bg-gradient-to-r from-brand-700/70 via-brand-800/30 to-transparent">
                </div>

                <p class="text-[9px] font-medium uppercase tracking-[0.2em] text-brand-400">
                    With Sincere Regards
                </p>

                <h3 class="mt-2 text-[17px] font-semibold tracking-tight text-white">
                    Abu Shahdat Sarkar
                </h3>

                <p class="mt-1 text-[10px] font-medium uppercase tracking-[0.16em] text-slate-500">
                    Chief Executive Officer
                    <span class="mx-1 text-brand-700">•</span>
                    HBD Services
                </p>

            </div>

        </div>


        {{-- =======================
            CEO IMAGE / DECORATION
        ======================== --}}
        <div
            class="pointer-events-none relative mt-0 md:mt-6 h-[360px] w-full sm:h-[430px] lg:absolute lg:right-0 lg:top-0 lg:mt-0 lg:h-full lg:w-[54%]">

            {{-- Glow --}}
            <div
                class="absolute left-1/2 top-1/2 z-0 h-[250px] w-[250px]
                       -translate-x-1/2 -translate-y-1/2 rounded-full
                       bg-brand-500/10 blur-[60px]
                       sm:h-[320px] sm:w-[320px]
                       lg:left-auto lg:right-[13%]
                       lg:h-[380px] lg:w-[380px]
                       lg:translate-x-0 lg:blur-[70px]">
            </div>

            <div
                class="absolute left-1/2 top-1/2 z-0 h-[210px] w-[210px]
                       -translate-x-1/2 -translate-y-1/2 rounded-full
                       bg-brand-600/10 blur-[35px]
                       sm:h-[270px] sm:w-[270px]
                       lg:left-auto lg:right-[13%]
                       lg:h-[300px] lg:w-[300px]
                       lg:translate-x-0 lg:blur-[40px]">
            </div>


            {{-- Outer circles --}}
            <div
                class="absolute left-1/2 top-1/2 z-0 h-[230px] w-[230px]
                       -translate-x-1/2 -translate-y-1/2 rounded-full
                       border border-brand-500/30
                       sm:h-[290px] sm:w-[290px]
                       lg:left-auto lg:right-[9%]
                       lg:h-[300px] lg:w-[300px]
                       lg:translate-x-0">
            </div>

            <div
                class="absolute left-1/2 top-1/2 z-0 h-[275px] w-[275px]
                       -translate-x-1/2 -translate-y-1/2 rounded-full
                       border border-brand-500/15
                       sm:h-[350px] sm:w-[350px]
                       lg:left-auto lg:right-[5%]
                       lg:h-[350px] lg:w-[350px]
                       lg:translate-x-0">
            </div>

            <div
                class="absolute left-1/2 top-1/2 z-0 h-[320px] w-[320px]
                       -translate-x-1/2 -translate-y-1/2 rounded-full
                       border border-brand-500/10
                       sm:h-[410px] sm:w-[410px]
                       lg:left-auto lg:right-[1%]
                       lg:h-[400px] lg:w-[400px]
                       lg:translate-x-0">
            </div>


            {{-- Decorative orbit --}}
            <div
                class="absolute left-1/2 top-1/2 z-0 h-[300px] w-[170px]
                       -translate-x-1/2 -translate-y-1/2 rotate-[28deg]
                       rounded-[50%] border border-brand-400/10
                       sm:h-[350px] sm:w-[200px]
                       lg:left-auto lg:right-[7%]
                       lg:h-[370px] lg:w-[210px]
                       lg:translate-x-0">
            </div>

            <div
                class="absolute left-1/2 top-1/2 z-0 h-[300px] w-[170px]
                       -translate-x-1/2 -translate-y-1/2 -rotate-[28deg]
                       rounded-[50%] border border-brand-400/10
                       sm:h-[350px] sm:w-[200px]
                       lg:left-auto lg:right-[7%]
                       lg:h-[370px] lg:w-[210px]
                       lg:translate-x-0">
            </div>


            {{-- CEO Image --}}
            <img
                src="{{ asset('frontend-img/ceo.png') }}"
                alt="Abu Shahdat Sarkar - CEO of HBD Services"
                class="absolute bottom-0 left-1/2 z-10
                       h-[340px] w-auto max-w-[90%]
                       -translate-x-1/2 object-contain object-bottom
                       sm:h-[410px]
                       lg:left-auto lg:right-0
                       lg:h-[96%]
                       lg:max-w-none
                       lg:translate-x-0"
            />


            {{-- Left image blending --}}
            <div
                class="absolute inset-x-0 bottom-0 z-20 h-24
                       bg-gradient-to-t from-[#050b12] to-transparent
                       lg:inset-y-0 lg:left-0 lg:right-auto lg:h-auto lg:w-[42%]
                       lg:bg-gradient-to-r lg:from-[#050b12]
                       lg:via-[#050b12]/90 lg:to-transparent">
            </div>


            {{-- Bottom blending --}}
            <div
                class="absolute bottom-0 left-0 right-0 z-20 h-16
                       bg-gradient-to-t from-[#050b12] to-transparent
                       lg:h-24">
            </div>

        </div>

    </div>


    {{-- Bottom border --}}
    <div
        class="absolute bottom-0 left-0 right-0 h-px
               bg-gradient-to-r from-transparent
               via-brand-700/40 to-transparent">
    </div>

</section>