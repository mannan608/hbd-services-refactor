@extends('frontend.layouts.app')

@section('content')
    <!-- Main Container -->
@section('title', 'About Us')

<!-- About Us Section -->
@include('frontend.pages.common-section.about-section')

<!-- 2. Statistics Highlight Bar -->
<section class="">
    <div
        class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-gradient-to-r from-brand-900 via-brand-600 to-brand-900 rounded-3xl text-white shadow-xl">
        <div
            class="grid grid-cols-1 sm:grid-cols-3 gap-8 text-center divide-y sm:divide-y-0 sm:divide-x divide-white/10">
            <div class="pt-4 sm:pt-0">
                <h2 class="text-4xl sm:text-5xl font-black tracking-tight text-white mb-1">10+</h2>
                <p class="text-sm uppercase tracking-widest font-semibold text-brand-100">Global Offices</p>
            </div>
            <div class="pt-6 sm:pt-0">
                <h2 class="text-4xl sm:text-5xl font-black tracking-tight text-white mb-1">250+</h2>
                <p class="text-sm uppercase tracking-widest font-semibold text-brand-100">Education Experts</p>
            </div>
            <div class="pt-6 sm:pt-0">
                <h2 class="text-4xl sm:text-5xl font-black tracking-tight text-white mb-1">30,000+</h2>
                <p class="text-sm uppercase tracking-widest font-semibold text-brand-100">Students Assisted</p>
            </div>
        </div>
    </div>
</section>

<!-- 3. Why Partner With HBD ServicesSection -->
<section class="">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <header class="mx-auto max-w-2xl px-4 py-12 text-center  translate-y-10 transition-all duration-1000 ease-out">
            <div
                class="inline-flex items-center gap-2 px-4 py-2 bg-brand-500/10 rounded-full mb-6 transition-all duration-700 delay-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-zap w-4 h-4 text-brand-500 transition-transform duration-500 group-hover:scale-110">
                    <path
                        d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z">
                    </path>
                </svg>
                <span class="text-sm font-semibold text-brand-500 uppercase">Why Choose Us</span>
            </div>

            <!-- Main Heading -->
            <h1
                class="text-2xl sm:text-3xl font-extrabold tracking-tight text-slate-900 md:text-4xl lg:text-5xl uppercase transition-all duration-700 delay-200">
                WHY PARTNER WITH HBD Services?
            </h1>

            <!-- Subheading Description -->
            <p
                class="mx-auto mt-4 max-w-2xl text-base text-neutral-600 sm:text-lg transition-all duration-700 delay-300">
                We combine cutting-edge tech with deep educational expertise to deliver high-quality guidance for
                international students.
            </p>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch my-8">
            <!-- Feature Cards Column -->
            <div class="lg:col-span-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="bg-white p-6 rounded-2xl border border-slate-100  hover:shadow-md transition">
                    <div
                        class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center font-bold mb-4">
                        01</div>
                    <h3 class="font-bold text-slate-900 text-lg mb-2">Focused on Quality</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">We deliver top-tier guidance ensuring every
                        application meets high institutional standards.</p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-100  hover:shadow-md transition">
                    <div
                        class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center font-bold mb-4">
                        02</div>
                    <h3 class="font-bold text-slate-900 text-lg mb-2">Boost Your Success</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">Our streamlined process significantly
                        improves
                        student approval and acceptance rates.</p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-100  hover:shadow-md transition">
                    <div
                        class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center font-bold mb-4">
                        03</div>
                    <h3 class="font-bold text-slate-900 text-lg mb-2">Seamless Process</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">Fast, digital-first support designed to take
                        the
                        complexity out of studying abroad.</p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-100  hover:shadow-md transition">
                    <div
                        class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center font-bold mb-4">
                        04</div>
                    <h3 class="font-bold text-slate-900 text-lg mb-2">Tailored Guidance</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">Personalized counselling aligned with each
                        student’s career aspirations.</p>
                </div>
            </div>

            <!-- Visual Image Column -->
            <div class="lg:col-span-6 rounded-2xl overflow-hidden shadow-md relative min-h-[300px]">
                <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=1000&q=80"
                    alt="Office Team" class="w-full h-full object-cover" />
            </div>
        </div>
</section>

<!-- 4. Vision, Purpose, & Mission Section -->

<section class="relative py-12 sm:py-16 md:py-20 lg:py-24 overflow-hidden bg-brand-25">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative overflow-hidden rounded-2xl sm:rounded-3xl bg-brand-950 shadow-2xl">

            {{-- Background Decorations --}}
            <div class="absolute inset-0 pointer-events-none overflow-hidden">
                <div
                    class="absolute -top-32 -right-24 sm:-top-40 sm:-right-32 w-72 h-72 sm:w-96 sm:h-96 rounded-full bg-brand-500/15 blur-3xl">
                </div>
                <div
                    class="absolute -bottom-40 -left-24 sm:-bottom-48 sm:-left-32 w-72 h-72 sm:w-96 sm:h-96 rounded-full bg-accent-two-500/10 blur-3xl">
                </div>
                <div class="absolute inset-0 opacity-[0.04]"
                    style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 24px 24px;">
                </div>
            </div>

            <div class="relative z-10 p-6 sm:p-8 md:p-10 lg:p-14">

                {{-- Section Heading --}}
                <div class="max-w-4xl mb-10 sm:mb-12 lg:mb-16">
                    <div
                        class="inline-flex items-center gap-2 px-3.5 py-1.5 sm:px-4 sm:py-2 rounded-full border border-brand-400/30 bg-brand-500/10 mb-5 sm:mb-6">
                        <span class="w-2 h-2 rounded-full bg-brand-400"></span>
                        <span class="text-[11px] sm:text-xs font-bold tracking-[0.2em] uppercase text-brand-200">
                            Driven By Values
                        </span>
                    </div>

                    <h2
                        class="text-xl sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-bold text-white leading-tight tracking-tight">
                        Empowering Global Education Through
                        <span class="text-brand-300">Innovation & Trust.</span>
                    </h2>

                    <p class="mt-4 sm:mt-6 max-w-3xl text-sm sm:text-base lg:text-lg text-brand-100/80 leading-relaxed">
                        HBD Services is an Australian technology-based education and migration consultancy,
                        guiding students through every step of their international education journey with
                        confidence, clarity, and care.
                    </p>
                </div>

                {{-- Vision / Purpose / Mission --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-5 lg:gap-6">

                    {{-- Vision --}}
                    <div
                        class="group relative p-5 sm:p-6 lg:p-8 rounded-xl sm:rounded-2xl border border-white/10 bg-white/[0.05] backdrop-blur-sm transition-all duration-300 hover:-translate-y-1.5 sm:hover:-translate-y-2 hover:bg-white/[0.09] hover:border-brand-400/40">
                        <div class="flex items-center justify-between mb-6 sm:mb-8">
                            <span class="text-3xl sm:text-4xl font-extrabold text-brand-500/40 tracking-tight">
                                01
                            </span>
                            <div
                                class="w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center rounded-lg sm:rounded-xl bg-brand-500/15 text-brand-300 group-hover:bg-brand-500 group-hover:text-white transition-all duration-300">
                                <iconify-icon icon="lucide:eye" class="text-xl sm:text-2xl"></iconify-icon>
                            </div>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold text-white tracking-wide mb-3 sm:mb-4">
                            Our Vision
                        </h3>
                        <div class="w-8 sm:w-10 h-1 rounded-full bg-brand-500 mb-4 sm:mb-5"></div>
                        <p class="text-sm sm:text-base text-brand-100/75 leading-6 sm:leading-7">
                            To empower international students globally through innovative,
                            technology-driven education and migration services.
                        </p>
                    </div>

                    {{-- Purpose --}}
                    <div
                        class="group relative p-5 sm:p-6 lg:p-8 rounded-xl sm:rounded-2xl border border-white/10 bg-white/[0.05] backdrop-blur-sm transition-all duration-300 hover:-translate-y-1.5 sm:hover:-translate-y-2 hover:bg-white/[0.09] hover:border-brand-400/40">
                        <div class="flex items-center justify-between mb-6 sm:mb-8">
                            <span class="text-3xl sm:text-4xl font-extrabold text-brand-500/40 tracking-tight">
                                02
                            </span>
                            <div
                                class="w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center rounded-lg sm:rounded-xl bg-brand-500/15 text-brand-300 group-hover:bg-brand-500 group-hover:text-white transition-all duration-300">
                                <iconify-icon icon="lucide:target" class="text-xl sm:text-2xl"></iconify-icon>
                            </div>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold text-white tracking-wide mb-3 sm:mb-4">
                            Our Purpose
                        </h3>
                        <div class="w-8 sm:w-10 h-1 rounded-full bg-brand-500 mb-4 sm:mb-5"></div>
                        <p class="text-sm sm:text-base text-brand-100/75 leading-6 sm:leading-7">
                            To simplify the complex journey of studying abroad, connecting
                            students with top institutions worldwide seamlessly.
                        </p>
                    </div>

                    {{-- Mission --}}
                    <div
                        class="group relative p-5 sm:p-6 lg:p-8 rounded-xl sm:rounded-2xl border border-white/10 bg-white/[0.05] backdrop-blur-sm transition-all duration-300 hover:-translate-y-1.5 sm:hover:-translate-y-2 hover:bg-white/[0.09] hover:border-brand-400/40">
                        <div class="flex items-center justify-between mb-6 sm:mb-8">
                            <span class="text-3xl sm:text-4xl font-extrabold text-brand-500/40 tracking-tight">
                                03
                            </span>
                            <div
                                class="w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center rounded-lg sm:rounded-xl bg-brand-500/15 text-brand-300 group-hover:bg-brand-500 group-hover:text-white transition-all duration-300">
                                <iconify-icon icon="lucide:flag" class="text-xl sm:text-2xl"></iconify-icon>
                            </div>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold text-white tracking-wide mb-3 sm:mb-4">
                            Our Mission
                        </h3>
                        <div class="w-8 sm:w-10 h-1 rounded-full bg-brand-500 mb-4 sm:mb-5"></div>
                        <p class="text-sm sm:text-base text-brand-100/75 leading-6 sm:leading-7">
                            To provide ethical, reliable, and end-to-end counselling that
                            shapes successful global academic careers.
                        </p>
                    </div>
                </div>

                {{-- Bottom Accent --}}
                <div
                    class="mt-8 sm:mt-10 lg:mt-12 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 sm:gap-4 border-t border-white/10 pt-6 sm:pt-7">
                    <p class="text-xs sm:text-sm text-brand-200/70">
                        Building brighter futures through global education.
                    </p>
                    <div class="flex items-center gap-2 text-brand-300">
                        <span class="w-6 sm:w-8 h-px bg-brand-500"></span>
                        <span class="text-[11px] sm:text-xs font-bold uppercase tracking-[0.18em]">
                            HBD Services
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<section class="py-12 sm:py-16 md:py-20 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <header class="mx-auto max-w-2xl mb-10 sm:mb-12 text-center">
            <div
                class="inline-flex items-center gap-2 px-3.5 py-1.5 sm:px-4 sm:py-2 bg-brand-500/10 rounded-full mb-5 sm:mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="lucide lucide-zap w-4 h-4 text-brand-500">
                    <path
                        d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z">
                    </path>
                </svg>
                <span class="text-xs sm:text-sm font-semibold text-brand-500 uppercase">Our commitment</span>
            </div>

            <h2
                class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-extrabold tracking-tight text-slate-900 uppercase">
                Our promises to you
            </h2>

            <p class="mx-auto mt-3 sm:mt-4 max-w-2xl text-sm sm:text-base text-neutral-600 leading-relaxed">
                We are committed to making your journey simpler, clearer, and more rewarding from the first
                consultation to your future abroad.
            </p>
        </header>

        <!-- Content Grid -->
        <div class="grid grid-cols-1 items-center gap-8 sm:gap-10 lg:grid-cols-12 lg:gap-12">

            {{-- Image --}}
            <div class="lg:col-span-6 order-1">
                <div class="group relative overflow-hidden rounded-2xl sm:rounded-[1.5rem]">
                    <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&w=1000&q=80"
                        alt="Consultation Meeting"
                        class="h-[260px] w-full object-cover transition duration-700 group-hover:scale-105 sm:h-[320px] md:h-[380px]" />

                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/50 via-transparent to-transparent">
                    </div>

                    <!-- Caption -->
                    <div class="absolute bottom-4 left-4 right-4 sm:bottom-5 sm:left-5 sm:right-5">
                        <div
                            class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3.5 py-1.5 sm:px-4 sm:py-2 text-xs sm:text-sm font-medium text-white backdrop-blur-md">
                            <span class="h-2 w-2 rounded-full bg-brand-400"></span>
                            Your journey, our commitment
                        </div>
                    </div>
                </div>
            </div>

            {{-- Promises List --}}
            <div class="lg:col-span-6 order-2">
                <ul class="space-y-4 sm:space-y-5 md:space-y-6">

                    <li
                        class="group flex items-center gap-3 sm:gap-4 transition-all duration-300 hover:-translate-y-0.5">
                        <span
                            class="flex h-8 w-8 sm:h-9 sm:w-9 shrink-0 items-center justify-center rounded-lg sm:rounded-xl bg-brand-500 text-[11px] sm:text-xs font-bold text-white transition-transform duration-300 group-hover:scale-105">
                            01
                        </span>
                        <span class="text-sm sm:text-base font-semibold text-slate-700 uppercase">
                            We put you first.
                        </span>
                    </li>

                    <li
                        class="group flex items-center gap-3 sm:gap-4 transition-all duration-300 hover:-translate-y-0.5">
                        <span
                            class="flex h-8 w-8 sm:h-9 sm:w-9 shrink-0 items-center justify-center rounded-lg sm:rounded-xl bg-brand-500 text-[11px] sm:text-xs font-bold text-white transition-transform duration-300 group-hover:scale-105">
                            02
                        </span>
                        <span class="text-sm sm:text-base font-semibold text-slate-700 uppercase">
                            We believe in honesty every step of the way.
                        </span>
                    </li>

                    <li
                        class="group flex items-center gap-3 sm:gap-4 transition-all duration-300 hover:-translate-y-0.5">
                        <span
                            class="flex h-8 w-8 sm:h-9 sm:w-9 shrink-0 items-center justify-center rounded-lg sm:rounded-xl bg-brand-500 text-[11px] sm:text-xs font-bold text-white transition-transform duration-300 group-hover:scale-105">
                            03
                        </span>
                        <span class="text-sm sm:text-base font-semibold text-slate-700 uppercase">
                            We grow together.
                        </span>
                    </li>

                    <li
                        class="group flex items-center gap-3 sm:gap-4 transition-all duration-300 hover:-translate-y-0.5">
                        <span
                            class="flex h-8 w-8 sm:h-9 sm:w-9 shrink-0 items-center justify-center rounded-lg sm:rounded-xl bg-brand-500 text-[11px] sm:text-xs font-bold text-white transition-transform duration-300 group-hover:scale-105">
                            04
                        </span>
                        <span class="text-sm sm:text-base font-semibold text-slate-700 uppercase">
                            You can always trust us.
                        </span>
                    </li>

                    <li
                        class="group flex items-center gap-3 sm:gap-4 transition-all duration-300 hover:-translate-y-0.5">
                        <span
                            class="flex h-8 w-8 sm:h-9 sm:w-9 shrink-0 items-center justify-center rounded-lg sm:rounded-xl bg-brand-500 text-[11px] sm:text-xs font-bold text-white transition-transform duration-300 group-hover:scale-105">
                            05
                        </span>
                        <span class="text-sm sm:text-base font-semibold text-slate-700 uppercase">
                            We celebrate your future with you.
                        </span>
                    </li>

                    <li
                        class="group flex items-center gap-3 sm:gap-4 transition-all duration-300 hover:-translate-y-0.5">
                        <span
                            class="flex h-8 w-8 sm:h-9 sm:w-9 shrink-0 items-center justify-center rounded-lg sm:rounded-xl bg-brand-500 text-[11px] sm:text-xs font-bold text-white transition-transform duration-300 group-hover:scale-105">
                            06
                        </span>
                        <span class="text-sm sm:text-base font-semibold text-slate-700 uppercase">
                            Dream bigger with us.
                        </span>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</section>


@include('frontend.pages.common-section.ceo')


<!-- 6. Awards & Recognitions Timeline -->
<section class="my-12 sm:my-16 md:my-20 lg:my-24">
    <div class="max-w-7xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <div
            class="bg-white p-6 sm:p-8 lg:p-12 rounded-2xl sm:rounded-3xl border border-slate-100 space-y-8 sm:space-y-10">

            <!-- Header -->
            <header class="mx-auto max-w-2xl mb-8 sm:mb-12 text-center">
                <div
                    class="inline-flex items-center gap-2 px-3.5 py-1.5 sm:px-4 sm:py-2 bg-brand-500/10 rounded-full mb-5 sm:mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-zap w-4 h-4 text-brand-500">
                        <path
                            d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z">
                        </path>
                    </svg>
                    <span class="text-xs sm:text-sm font-semibold text-brand-500 uppercase">Excellence &
                        Milestones</span>
                </div>

                <h2
                    class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-extrabold tracking-tight text-slate-900 uppercase">
                    Awards & Recognitions
                </h2>

                <p class="mx-auto mt-3 sm:mt-4 max-w-2xl text-sm sm:text-base text-neutral-600 leading-relaxed">
                    We are committed to making your journey simpler, clearer, and more rewarding from the first
                    consultation to your future abroad.
                </p>
            </header>

            <!-- Timeline -->
            <div
                class="relative border-l-2 border-slate-200 ml-3 sm:ml-4 md:ml-28 lg:ml-32 space-y-8 sm:space-y-10 md:space-y-12 text-left">

                <!-- 2023 -->
                <div class="relative pl-6 sm:pl-8 group">
                    <div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-brand-500 ring-4 ring-white"></div>
                    <span
                        class="block mb-2 md:mb-0 md:absolute md:-left-24 lg:-left-28 md:top-0 font-black text-xl sm:text-2xl text-brand-500">
                        2023
                    </span>
                    <div
                        class="bg-slate-50 p-4 sm:p-5 rounded-xl sm:rounded-2xl border border-slate-100 group-hover:border-brand-500/30 transition">
                        <ul class="space-y-2 text-slate-700 text-sm font-medium">
                            <li class="flex items-start gap-2">
                                <span class="mt-1.5 w-1.5 h-1.5 shrink-0 rounded-full bg-brand-500"></span>
                                <span>2023 Finalist — Educational Services</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="mt-1.5 w-1.5 h-1.5 shrink-0 rounded-full bg-brand-500"></span>
                                <span>2023 Business of the Year Award (General Champion) — University of Canberra</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="mt-1.5 w-1.5 h-1.5 shrink-0 rounded-full bg-brand-500"></span>
                                <span>2023 Finalist — Australian Business Awards</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="mt-1.5 w-1.5 h-1.5 shrink-0 rounded-full bg-brand-500"></span>
                                <span>2023 Finalist — Digital Innovation Award</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- 2022 -->
                <div class="relative pl-6 sm:pl-8 group">
                    <div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-brand-500 ring-4 ring-white"></div>
                    <span
                        class="block mb-2 md:mb-0 md:absolute md:-left-24 lg:-left-28 md:top-0 font-black text-xl sm:text-2xl text-slate-400 group-hover:text-brand-500 transition">
                        2022
                    </span>
                    <div
                        class="bg-slate-50 p-4 sm:p-5 rounded-xl sm:rounded-2xl border border-slate-100 group-hover:border-brand-500/30 transition">
                        <ul class="space-y-2 text-slate-700 text-sm font-medium">
                            <li class="flex items-start gap-2">
                                <span class="mt-1.5 w-1.5 h-1.5 shrink-0 rounded-full bg-brand-500"></span>
                                <span>2022 Finalist — Educational Services</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="mt-1.5 w-1.5 h-1.5 shrink-0 rounded-full bg-brand-500"></span>
                                <span>2022 Finalist — Local Business Champion Education Services</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- 2020 -->
                <div class="relative pl-6 sm:pl-8 group">
                    <div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-brand-500 ring-4 ring-white"></div>
                    <span
                        class="block mb-2 md:mb-0 md:absolute md:-left-24 lg:-left-28 md:top-0 font-black text-xl sm:text-2xl text-slate-400 group-hover:text-brand-500 transition">
                        2020
                    </span>
                    <div
                        class="bg-slate-50 p-4 sm:p-5 rounded-xl sm:rounded-2xl border border-slate-100 group-hover:border-brand-500/30 transition">
                        <ul class="space-y-2 text-slate-700 text-sm font-medium">
                            <li class="flex items-start gap-2">
                                <span class="mt-1.5 w-1.5 h-1.5 shrink-0 rounded-full bg-brand-500"></span>
                                <span>2020 Finalist — Educational Services</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="mt-1.5 w-1.5 h-1.5 shrink-0 rounded-full bg-brand-500"></span>
                                <span>2020 Outstanding Academic Placement — Top Consultancy Award</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- 2019 -->
                <div class="relative pl-6 sm:pl-8 group">
                    <div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-brand-500 ring-4 ring-white"></div>
                    <span
                        class="block mb-2 md:mb-0 md:absolute md:-left-24 lg:-left-28 md:top-0 font-black text-xl sm:text-2xl text-slate-400 group-hover:text-brand-500 transition">
                        2019
                    </span>
                    <div
                        class="bg-slate-50 p-4 sm:p-5 rounded-xl sm:rounded-2xl border border-slate-100 group-hover:border-brand-500/30 transition">
                        <ul class="space-y-2 text-slate-700 text-sm font-medium">
                            <li class="flex items-start gap-2">
                                <span class="mt-1.5 w-1.5 h-1.5 shrink-0 rounded-full bg-brand-500"></span>
                                <span>2019 Winner — Excellence in Education & Technology</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- 2018 -->
                <div class="relative pl-6 sm:pl-8 group">
                    <div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-brand-500 ring-4 ring-white"></div>
                    <span
                        class="block mb-2 md:mb-0 md:absolute md:-left-24 lg:-left-28 md:top-0 font-black text-xl sm:text-2xl text-slate-400 group-hover:text-brand-500 transition">
                        2018
                    </span>
                    <div
                        class="bg-slate-50 p-4 sm:p-5 rounded-xl sm:rounded-2xl border border-slate-100 group-hover:border-brand-500/30 transition">
                        <ul class="space-y-2 text-slate-700 text-sm font-medium">
                            <li class="flex items-start gap-2">
                                <span class="mt-1.5 w-1.5 h-1.5 shrink-0 rounded-full bg-brand-500"></span>
                                <span>2018 Finalist — Educational Services</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="mt-1.5 w-1.5 h-1.5 shrink-0 rounded-full bg-brand-500"></span>
                                <span>2018 Top Migration Agent — CQUniversity Sydney, Australia</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- 2017 -->
                <div class="relative pl-6 sm:pl-8 group">
                    <div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-brand-500 ring-4 ring-white"></div>
                    <span
                        class="block mb-2 md:mb-0 md:absolute md:-left-24 lg:-left-28 md:top-0 font-black text-xl sm:text-2xl text-slate-400 group-hover:text-brand-500 transition">
                        2017
                    </span>
                    <div
                        class="bg-slate-50 p-4 sm:p-5 rounded-xl sm:rounded-2xl border border-slate-100 group-hover:border-brand-500/30 transition">
                        <ul class="space-y-2 text-slate-700 text-sm font-medium">
                            <li class="flex items-start gap-2">
                                <span class="mt-1.5 w-1.5 h-1.5 shrink-0 rounded-full bg-brand-500"></span>
                                <span>2017 Finalist — Educational Services</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="mt-1.5 w-1.5 h-1.5 shrink-0 rounded-full bg-brand-500"></span>
                                <span>2017 Rising Star Consultancy Excellence — Awarded by Torrens University</span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@include('frontend.pages.home.sections.google-reviews')
@include('frontend.pages.common-section.university-partners')
@include('frontend.pages.common-section.cta-section')


@endsection
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
    (function() {
        var nodes = document.querySelectorAll('[data-reveal]');

        if (!nodes.length) {
            return;
        }

        if (!('IntersectionObserver' in window)) {
            nodes.forEach(function(node) {
                node.classList.add('is-revealed');
            });
            return;
        }

        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-revealed');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.12,
            rootMargin: '0px 0px -60px 0px'
        });

        nodes.forEach(function(node) {
            observer.observe(node);
        });
    })();
</script>
@endpush
