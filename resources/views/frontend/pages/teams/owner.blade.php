@extends('frontend.layouts.app')

@section('content')
    <section class="">

        <div class="mx-auto max-w-7xl overflow-hidden px-5 lg:px-8 ">
            <div class="bg-white">
               
                <div class="relative overflow-hidden bg-white">
                    <div class="absolute inset-x-0 top-0 h-[380px] bg-[#D4E2F3]
               sm:h-[400px] lg:h-[395px]">
                    </div>
                    <div class="relative mx-auto flex max-w-7xl flex-col
               lg:min-h-[500px] lg:flex-row">
                        <div
                            class="relative z-10 flex w-full justify-center
                   px-6 pt-10
                   sm:px-10 sm:pt-12
                   lg:absolute lg:left-[7%] lg:top-0
                   lg:block lg:h-[500px] lg:w-[34%]
                   lg:px-0 lg:pt-0">
                            <div
                                class="absolute bottom-0 left-1/2 h-90 w-[82%]
                       -translate-x-1/2 rounded-b-0  sm:rounded-b-[90px]
                       bg-white
                       sm:h-[350px] sm:w-[72%]
                       lg:left-0 lg:top-0 lg:h-[395px]
                       lg:w-full lg:translate-x-0
                       lg:rounded-none">
                            </div>


                            <!-- Image -->
                            <div
                                class="relative z-10 w-[230px]
                       overflow-hidden rounded-b-[65px]
                       sm:w-[280px] sm:rounded-b-[75px]
                       md:w-[310px]
                       lg:absolute lg:left-0 lg:top-[65px]
                       lg:w-full lg:rounded-b-[90px]">

                                <img src="{{ asset('frontend-img/ceo.png') }}" alt="Md Abu Shahdat Sarkar"
                                    class="block h-auto w-full object-contain">

                            </div>


                            <!-- Bottom curved white area -->
                            <div
                                class="absolute bottom-[-1px] left-1/2 z-20 h-[100px]
                       w-full -translate-x-1/2
                       rounded-tl-[100%]
                       bg-white
                       sm:w-[72%]
                       lg:left-0 lg:bottom-0 lg:h-[110px]
                       lg:w-full lg:translate-x-0">
                            </div>

                        </div>
                        <div
                            class="relative z-30 mt-0 sm:mt-8 w-full px-6 pb-12 text-center
                   sm:px-10
                   lg:absolute lg:left-[45%] lg:top-0
                   lg:mt-0 lg:flex lg:h-[395px]
                   lg:w-[50%] lg:flex-col lg:justify-center
                   lg:px-0 lg:pb-0 lg:text-left">

                            <!-- Name -->
                            <h1
                                class="text-2xl font-extrabold tracking-tight text-[#2F65AB]
                       sm:text-3xl
                       md:text-[32px]
                       lg:text-[32px]
                       xl:text-[35px]">
                                Md Abu Shahdat Sarkar
                            </h1>


                            <!-- Designations -->
                            <div
                                class="mt-4 space-y-1.5 text-[11px] font-bold
                       leading-5 text-slate-800
                       sm:text-xs
                       md:text-[13px]">

                                <p>
                                    Vice Chairperson of Australia Bangladesh Business Council (ABBC)
                                </p>

                                <p>
                                    Chairman &amp; Founder of HBD Group Pty Ltd.
                                </p>

                                <p>
                                    Chief Executive Officer of HBD Services
                                </p>

                            </div>
                            <div
                                class="mt-6 flex items-center justify-center gap-2
                       lg:justify-start">

                                <!-- Facebook -->
                                <a href="#" aria-label="Facebook"
                                    class="group/social flex h-9 w-9 items-center justify-center
                           rounded-xl border border-brand-500
                           bg-brand-500 text-white
                           shadow-sm
                           transition-all duration-300 ease-out
                           hover:-translate-y-1
                           hover:border-white
                           hover:bg-white
                           hover:text-[#1877F2]
                           hover:shadow-lg hover:shadow-slate-900/10
                           focus:outline-none focus:ring-2
                           focus:ring-brand-500/40 focus:ring-offset-2
                           sm:h-10 sm:w-10">
                                    <i
                                        class="fa-brands fa-facebook-f text-sm
                               transition-transform duration-300
                               group-hover/social:scale-110"></i>
                                </a>


                                <!-- Twitter -->
                                <a href="#" aria-label="Twitter"
                                    class="group/social flex h-9 w-9 items-center justify-center
                           rounded-xl border border-brand-500
                           bg-brand-500 text-white
                           shadow-sm
                           transition-all duration-300 ease-out
                           hover:-translate-y-1
                           hover:border-white
                           hover:bg-white
                           hover:text-black
                           hover:shadow-lg hover:shadow-slate-900/10
                           focus:outline-none focus:ring-2
                           focus:ring-brand-500/40 focus:ring-offset-2
                           sm:h-10 sm:w-10">
                                    <i
                                        class="fa-brands fa-twitter text-sm
                               transition-transform duration-300
                               group-hover/social:scale-110"></i>
                                </a>


                                <!-- Instagram -->
                                <a href="#" aria-label="Instagram"
                                    class="group/social flex h-9 w-9 items-center justify-center
                           rounded-xl border border-brand-500
                           bg-brand-500 text-white
                           shadow-sm
                           transition-all duration-300 ease-out
                           hover:-translate-y-1
                           hover:border-white
                           hover:bg-white
                           hover:text-[#E4405F]
                           hover:shadow-lg hover:shadow-slate-900/10
                           focus:outline-none focus:ring-2
                           focus:ring-brand-500/40 focus:ring-offset-2
                           sm:h-10 sm:w-10">
                                    <i
                                        class="fa-brands fa-instagram text-sm
                               transition-transform duration-300
                               group-hover/social:scale-110"></i>
                                </a>


                                <!-- LinkedIn -->
                                <a href="#" aria-label="LinkedIn"
                                    class="group/social flex h-9 w-9 items-center justify-center
                           rounded-xl border border-brand-500
                           bg-brand-500 text-white
                           shadow-sm
                           transition-all duration-300 ease-out
                           hover:-translate-y-1
                           hover:border-white
                           hover:bg-white
                           hover:text-[#0A66C2]
                           hover:shadow-lg hover:shadow-slate-900/10
                           focus:outline-none focus:ring-2
                           focus:ring-brand-500/40 focus:ring-offset-2
                           sm:h-10 sm:w-10">
                                    <i
                                        class="fa-brands fa-linkedin-in text-sm
                               transition-transform duration-300
                               group-hover/social:scale-110"></i>
                                </a>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- CEO MESSAGE -->

                <div class="mx-auto max-w-5xl pb-5 px-4">

                    <div class="text-sm leading-5 text-slate-600 sm:text-[15px] sm:leading-8">

                        <p class="mb-4 font-semibold text-slate-900">
                            Dear prospective students and respected parents,
                        </p>

                        <p class="mb-5 leading-6.5">
                            Studying abroad is more than earning a degree; it is an opportunity
                            to build confidence, develop global skills, and create a successful
                            future. Countries such as Australia, New Zealand, the United Kingdom,
                            Canada, and Malaysia offer internationally recognized education,
                            scholarships, work opportunities, and valuable career pathways.
                        </p>

                    </div>

                </div>

                <div class="bg-white">

                    <!-- Divider -->
                    <div class="h-px bg-slate-200"></div>

                    <!-- Message Block -->
                    <div class="divide-y divide-slate-200">
                        <!-- BLOCK 01 -->
                        <div class="group border-b border-slate-200/80 px-4 py-7 sm:px-6 sm:py-8 lg:px-8 lg:py-9">

                            <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:gap-6 lg:gap-10">

                                <!-- Category -->
                                <div class="flex shrink-0 items-center gap-3 sm:w-36 lg:w-44 sm:items-start">

                                    <!-- Icon -->
                                    <div
                                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl
                                        bg-brand-50 text-brand-600  ring-1 ring-inset ring-brand-100 transition-all duration-300 ease-out
                                        group-hover:-translate-y-0.5 group-hover:bg-brand-500 group-hover:text-white
                                        group-hover:shadow-lg group-hover:shadow-brand-500/20">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8"
                                            viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M2 10l10-5 10 5-10 5L2 10z" />
                                            <path d="M6 12v5c3 2 9 2 12 0v-5" />
                                            <path d="M20 11v6" />
                                        </svg>

                                    </div>


                                    <!-- Label -->
                                    <div class="flex flex-col justify-center sm:pt-1">

                                        <span class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                            Company
                                        </span>

                                        <span class="mt-0.5 text-xs text-slate-400">
                                            Study Abroad
                                        </span>

                                    </div>

                                </div>


                                <!-- Content -->
                                <div class="min-w-0 flex-1">

                                    <p class="max-w-4xl text-sm leading-6.5 text-slate-600 sm:text-[15px]  lg:text-[15px] ">
                                        Since founding HBD Services in 2003, my mission has been to help
                                        Bangladeshi students make informed and achievable study-abroad
                                        decisions. Our experienced team supports students throughout the
                                        entire process—from selecting the right country, university, and
                                        academic program to preparing applications and successfully
                                        transitioning overseas.
                                    </p>

                                </div>

                            </div>

                        </div>
                        <!-- =========================================================
                                                    BLOCK 02 — INTERNATIONAL EDUCATION
                                                ========================================================== -->
                        <div class="group border-b border-slate-200/80 px-4 py-7 sm:px-6 sm:py-8 lg:px-8 lg:py-9">

                            <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:gap-6 lg:gap-10">

                                <!-- Category -->
                                <div class="flex shrink-0 items-center gap-3 sm:w-36 lg:w-44 sm:items-start">

                                    <!-- Icon -->
                                    <div
                                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl
                                        bg-brand-50 text-brand-600
                                        ring-1 ring-inset ring-brand-100
                                        transition-all duration-300 ease-out
                                        group-hover:-translate-y-0.5
                                        group-hover:bg-brand-500
                                        group-hover:text-white
                                        group-hover:shadow-lg
                                        group-hover:shadow-brand-500/20">

                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8"
                                            viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="9" />
                                            <path d="M3 12h18" />
                                            <path d="M12 3c3 3 4 6 4 9s-1 6-4 9" />
                                            <path d="M12 3c-3 3-4 6-4 9s1 6 4 9" />
                                        </svg>

                                    </div>

                                    <!-- Label -->
                                    <div class="flex flex-col justify-center sm:pt-1">

                                        <span class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                            Education
                                        </span>

                                        <span class="mt-0.5 text-xs text-slate-400">
                                            International
                                        </span>

                                    </div>

                                </div>


                                <!-- Content -->
                                <div class="min-w-0 flex-1">

                                    <p class="max-w-4xl text-sm leading-6.5 text-slate-600 sm:text-[15px] lg:text-[15px]">
                                        As a graduate of Central Queensland University and an education
                                        entrepreneur, I understand both the challenges and rewards of
                                        studying abroad. With proper planning, honest guidance, and strong
                                        determination, your international education dream can become a
                                        reality.
                                    </p>

                                    <p
                                        class="mt-4 max-w-4xl text-sm font-semibold leading-6.5 text-slate-800 sm:text-[15px]">
                                        At HBD Services, we are committed to guiding you toward a secure,
                                        rewarding, and globally successful future.
                                    </p>

                                </div>

                            </div>

                        </div>


                        <!-- =========================================================
                                                    BLOCK 03 — LEADERSHIP
                                                ========================================================== -->
                        <div class="group border-b border-slate-200/80 px-4 py-7 sm:px-6 sm:py-8 lg:px-8 lg:py-9">

                            <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:gap-6 lg:gap-10">

                                <!-- Category -->
                                <div class="flex shrink-0 items-center gap-3 sm:w-36 lg:w-44 sm:items-start">

                                    <!-- Icon -->
                                    <div
                                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl
                                        bg-brand-50 text-brand-600
                                        ring-1 ring-inset ring-brand-100
                                        transition-all duration-300 ease-out
                                        group-hover:-translate-y-0.5
                                        group-hover:bg-brand-500
                                        group-hover:text-white
                                        group-hover:shadow-lg
                                        group-hover:shadow-brand-500/20">

                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8"
                                            viewBox="0 0 24 24">
                                            <path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2" />
                                            <circle cx="9" cy="7" r="4" />
                                            <path d="M17 11l2 2 4-4" />
                                        </svg>

                                    </div>

                                    <!-- Label -->
                                    <div class="flex flex-col justify-center sm:pt-1">

                                        <span class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                            Leadership
                                        </span>

                                        <span class="mt-0.5 text-xs text-slate-400">
                                            HBD Services
                                        </span>

                                    </div>

                                </div>


                                <!-- Content -->
                                <div class="min-w-0 flex-1">

                                    <p class="max-w-4xl text-sm leading-6.5 text-slate-600 sm:text-[15px] lg:text-[15px]">
                                        Md. Abu Shahdat Sarkar is the visionary Founder and Managing Director
                                        of HBD Services, a premier educational consulting and training firm
                                        committed to helping Bangladeshi students gain access to higher
                                        educational and professional opportunities across Australia,
                                        New Zealand, the United Kingdom, and beyond. With vast experience in
                                        education, real estate, and investment, he has significantly impacted
                                        the lives of numerous individuals, contributing to the growth of the
                                        Bangladeshi community globally.
                                    </p>

                                </div>

                            </div>

                        </div>


                        <!-- =========================================================
                                                    BLOCK 04 — ACADEMIC & ENTREPRENEURSHIP
                                                ========================================================== -->
                        <div class="group border-b border-slate-200/80 px-4 py-7 sm:px-6 sm:py-8 lg:px-8 lg:py-9">

                            <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:gap-6 lg:gap-10">

                                <!-- Category -->
                                <div class="flex shrink-0 items-center gap-3 sm:w-36 lg:w-44 sm:items-start">

                                    <!-- Icon -->
                                    <div
                                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl
                                            bg-brand-50 text-brand-600
                                            ring-1 ring-inset ring-brand-100
                                            transition-all duration-300 ease-out
                                            group-hover:-translate-y-0.5
                                            group-hover:bg-brand-500
                                            group-hover:text-white
                                            group-hover:shadow-lg
                                            group-hover:shadow-brand-500/20">

                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8"
                                            viewBox="0 0 24 24">
                                            <path d="M4 19.5A2.5 2.5 0 016.5 17H20" />
                                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z" />
                                            <path d="M8 7h8" />
                                            <path d="M8 11h6" />
                                        </svg>

                                    </div>

                                    <!-- Label -->
                                    <div class="flex flex-col justify-center sm:pt-1">

                                        <span class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                            Academic
                                        </span>

                                        <span class="mt-0.5 text-xs text-slate-400">
                                            Foundation
                                        </span>

                                    </div>

                                </div>


                                <!-- Content -->
                                <div class="min-w-0 flex-1">

                                    <p class="max-w-4xl text-sm leading-6.5 text-slate-600 sm:text-[15px] lg:text-[15px]">
                                        A graduate of Central Queensland University, Australia, with an MBA
                                        in Management Information Systems, Md. Sarkar's entrepreneurial
                                        journey began with a strong academic foundation and diverse real-world
                                        experiences. In 2003, he founded HBD Services, revolutionizing
                                        educational consulting by helping students secure admissions to
                                        prestigious universities in Australia, New Zealand, and the UK. His
                                        firm offers comprehensive guidance to students, ensuring they find the
                                        best-fit programs and facilitating successful transitions to these
                                        international destinations.
                                    </p>

                                </div>

                            </div>

                        </div>


                        <!-- =========================================================
                                                    BLOCK 05 — VOCATIONAL EDUCATION
                                                ========================================================== -->
                        <div class="group border-b border-slate-200/80 px-4 py-7 sm:px-6 sm:py-8 lg:px-8 lg:py-9">

                            <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:gap-6 lg:gap-10">

                                <!-- Category -->
                                <div class="flex shrink-0 items-center gap-3 sm:w-36 lg:w-44 sm:items-start">

                                    <!-- Icon -->
                                    <div
                                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl
                                            bg-brand-50 text-brand-600
                                            ring-1 ring-inset ring-brand-100
                                            transition-all duration-300 ease-out
                                            group-hover:-translate-y-0.5
                                            group-hover:bg-brand-500
                                            group-hover:text-white
                                            group-hover:shadow-lg
                                            group-hover:shadow-brand-500/20">

                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8"
                                            viewBox="0 0 24 24">
                                            <path d="M3 21h18" />
                                            <path d="M5 21V7l7-4 7 4v14" />
                                            <path d="M9 21v-5h6v5" />
                                            <path d="M9 10h1" />
                                            <path d="M14 10h1" />
                                            <path d="M9 13h1" />
                                            <path d="M14 13h1" />
                                        </svg>

                                    </div>

                                    <!-- Label -->
                                    <div class="flex flex-col justify-center sm:pt-1">

                                        <span class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                            Training
                                        </span>

                                        <span class="mt-0.5 text-xs text-slate-400">
                                            Vocational
                                        </span>

                                    </div>

                                </div>


                                <!-- Content -->
                                <div class="min-w-0 flex-1">

                                    <p class="max-w-4xl text-sm leading-6.5 text-slate-600 sm:text-[15px] lg:text-[15px]">
                                        In 2014, Md. Sarkar further expanded his influence by establishing
                                        registered training organizations in Sydney, providing essential
                                        vocational education and creating pathways for skill migration—an
                                        initiative that remains pioneering in the field. His holistic approach
                                        ensures that students not only receive quality education but also
                                        benefit from practical work opportunities that contribute to their
                                        long-term success.
                                    </p>

                                </div>

                            </div>

                        </div>


                        <!-- =========================================================
                                                    BLOCK 06 — REAL ESTATE
                                                ========================================================== -->
                        <div class="group border-b border-slate-200/80 px-4 py-7 sm:px-6 sm:py-8 lg:px-8 lg:py-9">

                            <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:gap-6 lg:gap-10">

                                <!-- Category -->
                                <div class="flex shrink-0 items-center gap-3 sm:w-36 lg:w-44 sm:items-start">

                                    <!-- Icon -->
                                    <div
                                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl
                                        bg-brand-50 text-brand-600
                                        ring-1 ring-inset ring-brand-100
                                        transition-all duration-300 ease-out
                                        group-hover:-translate-y-0.5
                                        group-hover:bg-brand-500
                                        group-hover:text-white
                                        group-hover:shadow-lg
                                        group-hover:shadow-brand-500/20">

                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8"
                                            viewBox="0 0 24 24">
                                            <path d="M3 17l6-6 4 4 8-8" />
                                            <path d="M14 7h7v7" />
                                        </svg>

                                    </div>

                                    <!-- Label -->
                                    <div class="flex flex-col justify-center sm:pt-1">

                                        <span class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                            Real Estate
                                        </span>

                                        <span class="mt-0.5 text-xs text-slate-400">
                                            HBD Group
                                        </span>

                                    </div>

                                </div>


                                <!-- Content -->
                                <div class="min-w-0 flex-1">

                                    <p class="max-w-4xl text-sm leading-6.5 text-slate-600 sm:text-[15px] lg:text-[15px]">
                                        In addition to his work in education, Md. Sarkar's entrepreneurial
                                        vision extended to the real estate market, founding HBD Group Pty Ltd
                                        in 2015. The company offers real estate services in both Sydney and
                                        Dubai, helping the Bangladeshi community access quality housing and
                                        investment opportunities in key global markets. His successful ventures
                                        across these diverse regions underscore his ability to adapt and
                                        deliver outstanding services across various sectors.
                                    </p>

                                </div>

                            </div>

                        </div>


                        <!-- =========================================================
                                                    BLOCK 07 — INVESTMENT
                                                ========================================================== -->
                        <div class="group border-b border-slate-200/80 px-4 py-7 sm:px-6 sm:py-8 lg:px-8 lg:py-9">

                            <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:gap-6 lg:gap-10">

                                <!-- Category -->
                                <div class="flex shrink-0 items-center gap-3 sm:w-36 lg:w-44 sm:items-start">

                                    <!-- Icon -->
                                    <div
                                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl
                                        bg-brand-50 text-brand-600
                                        ring-1 ring-inset ring-brand-100
                                        transition-all duration-300 ease-out
                                        group-hover:-translate-y-0.5
                                        group-hover:bg-brand-500
                                        group-hover:text-white
                                        group-hover:shadow-lg
                                        group-hover:shadow-brand-500/20">

                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8"
                                            viewBox="0 0 24 24">
                                            <ellipse cx="12" cy="5" rx="7" ry="3" />
                                            <path d="M5 5v6c0 1.7 3.1 3 7 3s7-1.3 7-3V5" />
                                            <path d="M5 11v6c0 1.7 3.1 3 7 3s7-1.3 7-3v-6" />
                                        </svg>

                                    </div>

                                    <!-- Label -->
                                    <div class="flex flex-col justify-center sm:pt-1">

                                        <span class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                            Investment
                                        </span>

                                        <span class="mt-0.5 text-xs text-slate-400">
                                            Global Markets
                                        </span>

                                    </div>

                                </div>


                                <!-- Content -->
                                <div class="min-w-0 flex-1">

                                    <p class="max-w-4xl text-sm leading-6.5 text-slate-600 sm:text-[15px] lg:text-[15px]">
                                        Md. Sarkar is also a strategic investor, participating in the
                                        Australian Stock Exchange and embracing emerging financial technologies,
                                        including cryptocurrency. His financial acumen further reflects his
                                        adaptability and insight into global market trends.
                                    </p>

                                </div>

                            </div>

                        </div>


                        <!-- =========================================================
                                                    BLOCK 08 — BUSINESS LEADERSHIP
                                                ========================================================== -->
                        <div class="group border-b border-slate-200/80 px-4 py-7 sm:px-6 sm:py-8 lg:px-8 lg:py-9">

                            <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:gap-6 lg:gap-10">

                                <!-- Category -->
                                <div class="flex shrink-0 items-center gap-3 sm:w-36 lg:w-44 sm:items-start">

                                    <!-- Icon -->
                                    <div
                                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl
                                            bg-brand-50 text-brand-600
                                            ring-1 ring-inset ring-brand-100
                                            transition-all duration-300 ease-out
                                            group-hover:-translate-y-0.5
                                            group-hover:bg-brand-500
                                            group-hover:text-white
                                            group-hover:shadow-lg
                                            group-hover:shadow-brand-500/20">

                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8"
                                            viewBox="0 0 24 24">
                                            <path d="M8 12h8" />
                                            <path d="M7 7h4" />
                                            <path d="M13 17h4" />
                                            <path d="M8 12a4 4 0 010-8h4" />
                                            <path d="M16 12a4 4 0 010 8h-4" />
                                        </svg>

                                    </div>

                                    <!-- Label -->
                                    <div class="flex flex-col justify-center sm:pt-1">

                                        <span class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                            Business
                                        </span>

                                        <span class="mt-0.5 text-xs text-slate-400">
                                            ABBC
                                        </span>

                                    </div>

                                </div>


                                <!-- Content -->
                                <div class="min-w-0 flex-1">

                                    <p class="max-w-4xl text-sm leading-6.5 text-slate-600 sm:text-[15px] lg:text-[15px]">
                                        As the acting Chairperson of the Australia Bangladesh Business Council
                                        (ABBC), Md. Sarkar advocates for the interests of Bangladeshi
                                        expatriates, promoting business collaborations and fostering economic
                                        opportunities across borders.
                                    </p>

                                </div>

                            </div>

                        </div>


                        <!-- =========================================================
                                                BLOCK 09 — COMMUNITY IMPACT
                                            ========================================================== -->
                        <div class="group px-4 py-7 sm:px-6 sm:py-8 lg:px-8 lg:py-9">

                            <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:gap-6 lg:gap-10">

                                <!-- Category -->
                                <div class="flex shrink-0 items-center gap-3 sm:w-36 lg:w-44 sm:items-start">

                                    <!-- Icon -->
                                    <div
                                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl
                                            bg-brand-50 text-brand-600
                                            ring-1 ring-inset ring-brand-100
                                            transition-all duration-300 ease-out
                                            group-hover:-translate-y-0.5
                                            group-hover:bg-brand-500
                                            group-hover:text-white
                                            group-hover:shadow-lg
                                            group-hover:shadow-brand-500/20">

                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M20.8 8.7c0 5.5-8.8 10.3-8.8 10.3S3.2 14.2 3.2 8.7A4.7 4.7 0 0112 6.2a4.7 4.7 0 018.8 2.5z" />
                                        </svg>

                                    </div>

                                    <!-- Label -->
                                    <div class="flex flex-col justify-center sm:pt-1">

                                        <span class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                            Community
                                        </span>

                                        <span class="mt-0.5 text-xs text-slate-400">
                                            Global Impact
                                        </span>

                                    </div>

                                </div>


                                <!-- Content -->
                                <div class="min-w-0 flex-1">

                                    <p class="max-w-4xl text-sm leading-6.5 text-slate-600 sm:text-[15px] lg:text-[15px]">
                                        Through his diverse ventures and unwavering commitment to the
                                        empowerment of his community, Md. Abu Shahdat Sarkar has solidified
                                        his reputation as a dynamic leader and entrepreneur. His work continues
                                        to inspire and create meaningful change for students, professionals,
                                        and business communities in Australia, New Zealand, the UK, the UAE,
                                        and his home country, Bangladesh.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>

    </section>
@endsection
