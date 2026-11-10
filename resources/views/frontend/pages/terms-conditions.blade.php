@extends('frontend.layouts.app')

@section('content')
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">

        <header class="mx-auto max-w-4xl pb-8 text-center lg:pb-10">

            {{-- Badge --}}
            <div
                class="mb-6 inline-flex items-center gap-2 rounded-full border border-brand-200 bg-brand-50 px-3.5 py-1.5 text-xs font-semibold text-brand-700 shadow-sm">

                <span class="relative flex h-2 w-2">
                    <span
                        class="absolute inline-flex h-full w-full animate-ping rounded-full bg-brand-400 opacity-50"></span>
                    <span class="relative inline-flex h-2 w-2 rounded-full bg-brand-500"></span>
                </span>

                Legal Terms & Policies

            </div>


            {{-- Heading --}}
            <h1 class="text-2xl sm:text-3xl font-bold tracking-[-0.035em] text-neutral-950 md:text-4xl lg:text-5xl uppercase">

                Terms and Conditions

            </h1>


            {{-- Description --}}
            <p class="mx-auto mt-5 max-w-2xl text-sm text-neutral-500 sm:text-base">

                Please review these Terms carefully before utilizing the services and operations offered by HBD
                Services.

            </p>


            {{-- Meta --}}
            <div
                class="mt-2 flex flex-wrap items-center justify-center gap-x-4 gap-y-2 text-xs font-medium text-neutral-500">

                <span class="inline-flex items-center gap-1.5">

                    <svg class="h-4 w-4 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M12 15v2m-6 4h12a2 2 0 002-2V9a2 2 0 00-2-2H6a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V5a4 4 0 118 0v2" />
                    </svg>

                    Official Legal Document

                </span>

                <span class="hidden h-1 w-1 rounded-full bg-neutral-300 sm:block"></span>

                <span>HBD Services</span>

            </div>

        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">

            <aside class="lg:col-span-4 space-y-6">
                <div class=" space-y-5 sticky top-34">
                    {{-- Main Overview Card --}}
                    <div
                        class="overflow-hidden rounded-2xl border border-neutral-200 bg-white shadow-[0_8px_30px_rgb(16,24,40,0.04)]">


                        {{-- Card Header --}}
                        <div class="border-b border-neutral-100 bg-gradient-to-br from-brand-50/80 to-white p-6">

                            <div class="flex items-start justify-between gap-4">

                                <div>

                                    <div
                                        class="mb-3 flex h-10 w-10 items-center justify-center rounded-xl bg-brand-500 text-white shadow-sm shadow-brand-500/20">

                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                                d="M7 3h8l4 4v14H7a2 2 0 01-2-2V5a2 2 0 012-2z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                                d="M15 3v5h5M9 13h6M9 17h6M9 9h2" />
                                        </svg>

                                    </div>

                                    <h2 class="text-lg font-bold tracking-tight text-neutral-950">
                                        Document Overview
                                    </h2>

                                    <p class="mt-1 text-sm leading-5 text-neutral-500">
                                        Key information about these terms.
                                    </p>

                                </div>


                                {{-- Status --}}
                                <span
                                    class="inline-flex items-center gap-1.5 rounded-full border border-emerald-200 bg-emerald-50 px-2.5 py-1 text-[10px] font-semibold text-emerald-700">

                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

                                    Active

                                </span>

                            </div>

                        </div>


                        {{-- Details --}}
                        <div class="divide-y divide-neutral-100">


                            {{-- Provider --}}
                            <div class="p-5">

                                <span
                                    class="mb-1.5 block text-[11px] font-semibold uppercase tracking-wider text-neutral-400">
                                    Provider
                                </span>

                                <span class="text-sm font-semibold text-neutral-900">
                                    HBD Services
                                </span>

                            </div>


                            {{-- ABN --}}
                            <div class="p-5">

                                <span
                                    class="mb-1.5 block text-[11px] font-semibold uppercase tracking-wider text-neutral-400">
                                    ABN
                                </span>

                                <span
                                    class="inline-flex rounded-lg border border-neutral-200 bg-neutral-50 px-2.5 py-1 font-mono text-xs font-medium text-neutral-700">
                                    65 967 066 288
                                </span>

                            </div>


                            {{-- Website --}}
                            <div class="p-5">

                                <span
                                    class="mb-1.5 block text-[11px] font-semibold uppercase tracking-wider text-neutral-400">
                                    Website
                                </span>

                                <a href="https://hbdservices.com" target="_blank" rel="noopener noreferrer"
                                    class="group inline-flex max-w-full items-center gap-1.5 break-all text-sm font-medium text-brand-600 transition-colors hover:text-brand-800">

                                    https://hbdservices.com

                                    <svg class="h-3.5 w-3.5 shrink-0 transition-transform group-hover:-translate-y-0.5 group-hover:translate-x-0.5"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>

                                </a>

                            </div>

                        </div>


                        {{-- Contact --}}
                        <div class="border-t border-neutral-100 bg-neutral-25 p-5">

                            <span class="mb-2 block text-[11px] font-semibold uppercase tracking-wider text-neutral-400">
                                Key Contact
                            </span>

                            <a href="mailto:info@hbdservices.com"
                                class="group flex w-full items-center justify-center gap-2 rounded-xl bg-brand-500 px-4 py-3 text-xs font-semibold text-white shadow-sm shadow-brand-500/20 transition-all duration-200 hover:bg-brand-600 hover:shadow-md hover:shadow-brand-500/20 active:scale-[0.99]">

                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>

                                info@hbdservices.com

                            </a>

                        </div>

                    </div>


                    {{-- Security Note --}}
                    <div class="rounded-2xl border border-brand-100 bg-brand-50/60 p-5">

                        <div class="flex gap-3">

                            <div
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-brand-100 text-brand-600">

                                <svg class="h-4.5 w-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622C17.176 19.29 21 14.591 21 9c0-1.042-.133-2.052-.382-3.016z" />
                                </svg>

                            </div>

                            <div>

                                <h3 class="text-sm font-semibold text-neutral-800">
                                    Read before continuing
                                </h3>

                                <p class="mt-1 text-xs leading-5 text-neutral-500">
                                    These terms govern your use of the HBD Services website and associated services.
                                </p>

                            </div>

                        </div>

                    </div>
                </div>
            </aside>

            {{-- ========================================================
            ARTICLE
        ========================================================= --}}
            <article class="min-w-0 lg:col-span-8">


                {{-- Article Surface --}}
                <div
                    class="rounded-2xl border border-neutral-200 bg-white px-5 py-8 shadow-[0_8px_30px_rgb(16,24,40,0.03)] sm:px-8 sm:py-10 lg:px-10 lg:py-12">


                    {{-- =================================================
                    SECTION 01
                ================================================== --}}
                    <section id="section-1" class="scroll-mt-28">


                        <div class="flex items-start gap-4">

                            <span
                                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 font-mono text-[11px] font-bold text-brand-600">
                                01
                            </span>

                            <div>

                                <p class="mb-1 text-[11px] font-semibold uppercase tracking-wider text-brand-500">
                                    Section 01
                                </p>

                                <h2 class="text-xl font-bold tracking-tight text-neutral-950 sm:text-2xl">
                                    1. The Website & Definitions
                                </h2>

                            </div>

                        </div>


                        <div class="mt-6 ml-0 space-y-5 sm:ml-12">


                            {{-- Definition Cards --}}
                            <div class="grid grid-cols-1 gap-3">


                                <div
                                    class="rounded-xl border border-neutral-200 bg-neutral-50/70 p-5 transition-all duration-200 hover:border-brand-200 hover:bg-brand-25">

                                    <span
                                        class="mb-2 block text-[11px] font-semibold uppercase tracking-wider text-brand-600">
                                        The Website
                                    </span>

                                    <span class="text-sm font-semibold text-neutral-800">
                                        https://hbdservices.com
                                    </span>

                                </div>


                                <div
                                    class="rounded-xl border border-neutral-200 bg-neutral-50/70 p-5 transition-all duration-200 hover:border-brand-200 hover:bg-brand-25">

                                    <span
                                        class="mb-2 block text-[11px] font-semibold uppercase tracking-wider text-brand-600">
                                        The Client
                                    </span>

                                    <span class="text-sm leading-6 text-neutral-700">
                                        People/students learning about education abroad, particularly (but not limited
                                        to) in Australia and Canada.
                                    </span>

                                </div>


                                <div
                                    class="rounded-xl border border-neutral-200 bg-neutral-50/70 p-5 transition-all duration-200 hover:border-brand-200 hover:bg-brand-25">

                                    <span
                                        class="mb-2 block text-[11px] font-semibold uppercase tracking-wider text-brand-600">
                                        The Provider
                                    </span>

                                    <span class="text-sm font-medium text-neutral-800">
                                        HBD Services (ABN 65 967 066 288)
                                    </span>

                                </div>


                            </div>


                            {{-- Services --}}
                            <div class="rounded-2xl border border-brand-100 bg-brand-25 p-5 sm:p-6">

                                <div class="flex items-center gap-2">

                                    <div
                                        class="flex h-8 w-8 items-center justify-center rounded-lg bg-brand-100 text-brand-600">

                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="M5 13l4 4L19 7" />
                                        </svg>

                                    </div>

                                    <h3 class="text-sm font-semibold text-neutral-900">
                                        The Services Included
                                    </h3>

                                </div>


                                <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-3 text-sm sm:grid-cols-2">

                                    @foreach (['Admission Counselling & Course Selection', 'English Language Preparation', 'Scholarships & Financial Assistance', 'Visa Assistance', 'Course Provider Changing', 'Professional Year Admission', 'NAATI', 'Health Cover Overseas (OSHC)', 'Accommodation Assistance', 'Student Banking / Money Transfer', 'Travel Ticket Arrangement', 'Airport Pickup', 'Job & Internship Opportunities'] as $service)
                                        <div class="flex items-start gap-2.5 text-neutral-600">

                                            <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-brand-500"></span>

                                            <span>{{ $service }}</span>

                                        </div>
                                    @endforeach

                                </div>

                            </div>


                            <div class="space-y-4 text-[15px] leading-7 text-neutral-600">

                                <p>
                                    <strong class="font-semibold text-neutral-900">1.2.</strong>
                                    The Website is operated by HBD Services (ABN 65 967 066 288). Access to and use of
                                    the Website, or any of its associated Services, is provided by HBD. Please read
                                    these terms and conditions (the ‘<strong
                                        class="font-semibold text-neutral-900">Terms</strong>‘) carefully. By using,
                                    browsing and/or reading the Website, this signifies that you have read, understood
                                    and agree to be bound by the Terms.
                                </p>

                                <p class="text-neutral-500">
                                    If you do not agree with the Terms, you must cease usage of the Website or any of
                                    its products or Services.
                                </p>

                                <p>
                                    <strong class="font-semibold text-neutral-900">1.3.</strong>
                                    HBD reserves the right to review and change any of the Terms by updating this page
                                    at its sole discretion. When HBD updates the Terms, it will use reasonable
                                    endeavours to provide you with notice of updates of the Terms. Any changes to the
                                    Terms take immediate effect from the date of their publication. Before you continue,
                                    we recommend you keep a copy of the Terms for your records.
                                </p>

                            </div>

                        </div>

                    </section>



                    {{-- =================================================
                    SECTION 02
                ================================================== --}}
                    <div class="my-10 border-t border-neutral-100"></div>

                    <section id="section-2" class="scroll-mt-28">

                        <div class="flex items-start gap-4">

                            <span
                                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 font-mono text-[11px] font-bold text-brand-600">
                                02
                            </span>

                            <div>

                                <p class="mb-1 text-[11px] font-semibold uppercase tracking-wider text-brand-500">
                                    Section 02
                                </p>

                                <h2 class="text-xl font-bold tracking-tight text-neutral-950 sm:text-2xl">
                                    2. Acceptance of the Terms
                                </h2>

                            </div>

                        </div>

                        <div class="mt-6 ml-0 sm:ml-12">

                            <p class="text-[15px] leading-7 text-neutral-600">
                                You accept the Terms by registering for the Services as required under the Terms for use
                                of the Services. You may also accept the Terms by clicking to accept or agree to the
                                Terms where and if this option is made available to you by HBD in the user interface.
                            </p>

                        </div>

                    </section>



                    {{-- =================================================
                    SECTION 03
                ================================================== --}}
                    <div class="my-10 border-t border-neutral-100"></div>

                    <section id="section-3" class="scroll-mt-28">

                        <div class="flex items-start gap-4">

                            <span
                                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 font-mono text-[11px] font-bold text-brand-600">
                                03
                            </span>

                            <div>

                                <p class="mb-1 text-[11px] font-semibold uppercase tracking-wider text-brand-500">
                                    Section 03
                                </p>

                                <h2 class="text-xl font-bold tracking-tight text-neutral-950 sm:text-2xl">
                                    3. The Services
                                </h2>

                            </div>

                        </div>


                        <div class="mt-6 ml-0 space-y-4 text-[15px] leading-7 text-neutral-600 sm:ml-12">

                            <p>
                                <strong class="font-semibold text-neutral-900">3.1.</strong>
                                As listed in 1.3 the Services include information about the processes of education
                                abroad. As a part of your continued use of the Services, you may be required to provide
                                personal information about yourself (such as identification or contact details),
                                including:
                            </p>

                            <ul class="space-y-2 rounded-xl border border-neutral-200 bg-neutral-50 p-5 text-sm">

                                @foreach (['Name', 'Email address', 'Contact Details', 'Academic and employment status', 'Others'] as $item)
                                    <li class="flex items-center gap-2.5">

                                        <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>

                                        {{ $item }}

                                    </li>
                                @endforeach

                            </ul>


                            <div
                                class="rounded-xl border border-brand-200 bg-brand-50 p-5 text-sm leading-6 text-brand-800">

                                <strong class="font-semibold text-brand-900">
                                    3.2. Payment Clarification:
                                </strong>

                                The website does not have a payment mechanism. All payments for Services are made
                                separately to HBD Business Account via EFT or other means as agreed between You and HBD
                                outside the website.

                            </div>


                            <p>
                                <strong class="font-semibold text-neutral-900">3.3.</strong>
                                You warrant that any information you give to HBD will always be accurate, correct and up
                                to date.
                            </p>

                            <p>
                                <strong class="font-semibold text-neutral-900">3.4.</strong>
                                You may not use the Services and may not accept the Terms if:
                            </p>


                            <ul class="space-y-2 text-sm">

                                <li class="flex gap-3">

                                    <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-brand-500"></span>

                                    you are not of legal age to form a binding contract with HBD; or

                                </li>

                                <li class="flex gap-3">

                                    <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-brand-500"></span>

                                    you are a person barred from receiving the Services under the laws of Australia,
                                    Bangladesh, or other countries including the country in which you are resident or
                                    from which you use the Services.

                                </li>

                            </ul>

                        </div>

                    </section>



                    {{-- =================================================
                    SECTION 04
                ================================================== --}}
                    <div class="my-10 border-t border-neutral-100"></div>

                    <section id="section-4" class="scroll-mt-28">

                        <div class="flex items-start gap-4">

                            <span
                                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 font-mono text-[11px] font-bold text-brand-600">
                                04
                            </span>

                            <div>

                                <p class="mb-1 text-[11px] font-semibold uppercase tracking-wider text-brand-500">
                                    Section 04
                                </p>

                                <h2 class="text-xl font-bold tracking-tight text-neutral-950 sm:text-2xl">
                                    4. Your Obligations
                                </h2>

                            </div>

                        </div>


                        <div class="mt-6 ml-0 space-y-4 text-[15px] leading-7 text-neutral-600 sm:ml-12">

                            <p>
                                <strong class="font-semibold text-neutral-900">4.1.</strong>
                                As a Client, you agree to comply with the following:
                            </p>


                            <ul class="space-y-3 text-sm">

                                <li class="flex gap-3">

                                    <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-brand-500"></span>

                                    <div>
                                        you will use the Services only for purposes that are permitted by:

                                        <ol class="mt-2 space-y-1.5 pl-5 text-neutral-500">

                                            <li class="list-decimal">
                                                the Terms; and
                                            </li>

                                            <li class="list-decimal">
                                                any applicable law, regulation or generally accepted practices or
                                                guidelines in the relevant jurisdictions;
                                            </li>

                                        </ol>

                                    </div>

                                </li>


                                @foreach (['you must not expressly or impliedly impersonate another member at any time;', 'you will not use the Services or the Website in connection with any commercial endeavours except those that are specifically endorsed or approved by the management of HBD;', 'you will not use the Services or Website for any illegal and/or unauthorised use which includes collecting email addresses of Members by electronic or other means for the purpose of sending unsolicited email or unauthorised framing of or linking to the Website;', 'you agree that appropriate legal action will be taken by HBD for any illegal or unauthorised use of the Website; and', 'you acknowledge and agree that any automated use of the Website or its Services is prohibited.'] as $item)
                                    <li class="flex gap-3">

                                        <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-brand-500"></span>

                                        <span>{{ $item }}</span>

                                    </li>
                                @endforeach

                            </ul>

                        </div>

                    </section>



                    {{-- =================================================
                    SECTION 05
                ================================================== --}}
                    <div class="my-10 border-t border-neutral-100"></div>

                    <section id="section-5" class="scroll-mt-28">

                        <div class="flex items-start gap-4">

                            <span
                                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 font-mono text-[11px] font-bold text-brand-600">
                                05
                            </span>

                            <div>

                                <p class="mb-1 text-[11px] font-semibold uppercase tracking-wider text-brand-500">
                                    Section 05
                                </p>

                                <h2 class="text-xl font-bold tracking-tight text-neutral-950 sm:text-2xl">
                                    5. Copyright and Intellectual Property
                                </h2>

                            </div>

                        </div>


                        <div class="mt-6 ml-0 space-y-4 text-[15px] leading-7 text-neutral-600 sm:ml-12">

                            <p>
                                <strong class="font-semibold text-neutral-900">5.1.</strong>
                                The Website, and the Services of HBD are subject to copyright. The material on the
                                Website is protected by copyright under the laws of Australia and through international
                                treaties. Unless otherwise indicated, all rights (including copyright) in the Services
                                and compilation of the Website (including but not limited to text, graphics, logos,
                                button icons, video images, audio clips, Website, code, scripts, design elements and
                                interactive features) or the Services are owned or controlled for these purposes and are
                                reserved by HBD.
                            </p>

                            <p>
                                <strong class="font-semibold text-neutral-900">5.2.</strong>
                                All trademarks, service marks and trade names are owned, registered and/or licensed by
                                HBD. Whilst you are using the Services:
                            </p>

                            <div class="rounded-xl border border-neutral-200 bg-neutral-50 p-5 text-sm">

                                <p>(a) use the Website pursuant to the Terms;</p>

                                <p class="mt-2">
                                    (b) copy and store the Website and the material contained in the Website in your
                                    device’s cache memory; and
                                </p>

                                <p class="mt-2">
                                    (c) print pages from the Website for your own personal and non-commercial use.
                                </p>

                            </div>

                            <p>
                                <strong class="font-semibold text-neutral-900">5.3.</strong>
                                HBD does not grant you any other rights whatsoever in relation to the Website or the
                                Services. All other rights are expressly reserved by HBD.
                            </p>

                            <p>
                                <strong class="font-semibold text-neutral-900">5.4.</strong>
                                Nothing you do on or in relation to the Website will transfer any:
                            </p>

                            <div class="space-y-2 pl-4 text-sm text-neutral-500">

                                <p>(a) business name, trading name, domain name, trademark, industrial design, patent,
                                    registered design or copyright, or</p>

                                <p>(b) a right to use or exploit a business name, trading name, domain name, trade mark
                                    or industrial design, or</p>

                                <p>(c) a thing, system or process that is the subject of a patent, registered design or
                                    copyright (or an adaptation or modification of such a thing, system or process),</p>

                            </div>

                            <p>
                                <strong class="font-semibold text-neutral-900">5.5.</strong>
                                You may not, without the prior written permission of HBD broadcast, republish, up-load
                                to a third party, transmit, post, distribute, show or play in public, adapt or change in
                                any way the Services for any purpose, unless otherwise provided by these Terms. This
                                prohibition does not extend to materials on the Website, which are freely available for
                                re-use or are in the public domain.
                            </p>

                        </div>

                    </section>



                    {{-- =================================================
                    SECTION 06
                ================================================== --}}
                    <div class="my-10 border-t border-neutral-100"></div>

                    <section id="section-6" class="scroll-mt-28">

                        <div class="flex items-start gap-4">

                            <span
                                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 font-mono text-[11px] font-bold text-brand-600">
                                06
                            </span>

                            <div>

                                <p class="mb-1 text-[11px] font-semibold uppercase tracking-wider text-brand-500">
                                    Section 06
                                </p>

                                <h2 class="text-xl font-bold tracking-tight text-neutral-950 sm:text-2xl">
                                    6. Availability of this Website
                                </h2>

                            </div>

                        </div>


                        <div class="mt-6 ml-0 sm:ml-12">

                            <p class="text-[15px] leading-7 text-neutral-600">
                                HBD will try to make this website available but cannot guarantee that this website will
                                operate continuously or without interruptions or is error free and can accept no
                                liability for its unavailability. The Client must not attempt to interfere with the
                                proper working of this website and, in particular, must not attempt to circumvent
                                security, tamper with, hack into, or otherwise disrupt any computer system, server,
                                website, router or any other Internet-connected device.
                            </p>

                        </div>

                    </section>



                    {{-- =================================================
                    SECTION 07
                ================================================== --}}
                    <div class="my-10 border-t border-neutral-100"></div>

                    <section id="section-7" class="scroll-mt-28">

                        <div class="flex items-start gap-4">

                            <span
                                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 font-mono text-[11px] font-bold text-brand-600">
                                07
                            </span>

                            <div>

                                <p class="mb-1 text-[11px] font-semibold uppercase tracking-wider text-brand-500">
                                    Section 07
                                </p>

                                <h2 class="text-xl font-bold tracking-tight text-neutral-950 sm:text-2xl">
                                    7. Liability
                                </h2>

                            </div>

                        </div>


                        <div class="mt-6 ml-0 space-y-4 text-[15px] leading-7 text-neutral-600 sm:ml-12">

                            <p>
                                <strong class="font-semibold text-neutral-900">7.1.</strong>
                                HBD will do its best to ensure that all materials and information published on this
                                website are accurate, but please note that all content materials and information on this
                                website are provided on an ‘as is’ basis and the Client assumes total responsibility and
                                risk for use of this website and use of all information contained within it.
                            </p>

                            <p>
                                <strong class="font-semibold text-neutral-900">7.2.</strong>
                                HBD accepts no liability for any loss or damage whether due to inaccuracy, error,
                                omission or any other cause.
                            </p>

                            <p>
                                <strong class="font-semibold text-neutral-900">7.3.</strong>
                                The Client is responsible for ensuring that his/her computer system meets all relevant
                                technical specifications necessary to use this website and is compatible with this
                                website. The Client also understands that HBD cannot and does not guarantee or warrant
                                that any material available for downloading from this website will be free from
                                infection, viruses and/or other code that has contaminating or destructive properties.
                                The Client is responsible for implementing sufficient procedures and virus checks
                                (including anti-virus and other security checks) to satisfy his/her particular
                                requirements for the accuracy of data input and output.
                            </p>

                        </div>

                    </section>



                    {{-- =================================================
                    SECTION 08
                ================================================== --}}
                    <div class="my-10 border-t border-neutral-100"></div>

                    <section id="section-8" class="scroll-mt-28">

                        <div class="rounded-2xl border border-brand-200 bg-brand-25 p-6 sm:p-8">


                            <div class="flex items-start gap-4 border-b border-brand-100 pb-5">

                                <span
                                    class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-brand-500 font-mono text-[11px] font-bold text-white shadow-sm">
                                    08
                                </span>

                                <div>

                                    <p class="mb-1 text-[11px] font-semibold uppercase tracking-wider text-brand-600">
                                        Data Privacy
                                    </p>

                                    <h2 class="text-xl font-bold tracking-tight text-neutral-950 sm:text-2xl">
                                        8. Data Privacy Policy
                                    </h2>

                                </div>

                            </div>


                            <div class="mt-6 space-y-4 text-[15px] leading-7 text-neutral-600">


                                <p>
                                    <strong class="font-semibold text-neutral-900">8.1.</strong>
                                    This Policy sets out the minimum requirements for the confidentiality, security,
                                    integrity, and protection of the Client’s Personal Information. We may collect
                                    Personal Information about you and we are committed to protecting this Personal
                                    Information and your privacy. We will take steps that are reasonable in the
                                    circumstances to protect your personal information from loss, misuse, interference,
                                    unauthorised access, modification, or disclosure.
                                </p>


                                <p>
                                    <strong class="font-semibold text-neutral-900">8.2.</strong>
                                    As part of your use of our websites, your correspondence with us, from social media
                                    platforms, or from third-party, we may collect your personal information which may
                                    include:
                                </p>


                                <ul class="space-y-2 rounded-xl border border-brand-100 bg-white p-5 text-sm">

                                    @foreach (['your name;', 'your contact details (email address, telephone and mobile numbers, address, etc.);', 'your educational qualifications;', 'employment status and previous work experience;', 'identity documents;', 'information about your required services, etc.'] as $item)
                                        <li class="flex items-start gap-2.5">

                                            <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-brand-500"></span>

                                            {{ $item }}

                                        </li>
                                    @endforeach

                                </ul>


                                <div class="rounded-xl border border-amber-200 bg-amber-50 p-4 text-sm text-amber-800">

                                    <strong class="font-semibold text-amber-900">
                                        Important:
                                    </strong>

                                    Please note that we do not collect credit card or financial information via the
                                    website.

                                </div>


                                <p>
                                    <strong class="font-semibold text-neutral-900">8.3.</strong>
                                    We collect the above information in order to provide services to you or to inform
                                    you of services we may provide to you.
                                </p>


                                <p>
                                    <strong class="font-semibold text-neutral-900">8.4.</strong>
                                    The processing of Personal Information is necessary for us to meet our legal and
                                    regulatory obligations where a regulator requires us to maintain certain records of
                                    any dealings with you.
                                </p>


                                <p>
                                    <strong class="font-semibold text-neutral-900">8.5.</strong>
                                    We may be unable to provide certain services to you if you do not provide the
                                    Personal Information requested.
                                </p>


                                <p>
                                    <strong class="font-semibold text-neutral-900">8.6.</strong>
                                    We will only disclose your Personal Information in accordance with applicable laws
                                    and regulations. In some instances, this will include sharing your Personal
                                    Information with third parties. This may include:
                                </p>


                                <ul class="space-y-2 rounded-xl border border-brand-100 bg-white p-5 text-sm">

                                    <li class="flex gap-2.5">
                                        <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-brand-500"></span>
                                        sharing with our employees, Universities, Colleges, and/or other educational
                                        institutions, contractors, mailing and distribution providers
                                    </li>

                                    <li class="flex gap-2.5">
                                        <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-brand-500"></span>
                                        our professional advisers (including our accountants, lawyers and auditors), our
                                        bank and insurers;
                                    </li>

                                    <li class="flex gap-2.5">
                                        <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-brand-500"></span>
                                        In case of transfer of our business, to the new owner of the business;
                                    </li>

                                    <li class="flex gap-2.5">
                                        <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-brand-500"></span>
                                        your authorised third party,
                                    </li>

                                    <li class="flex gap-2.5">
                                        <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-brand-500"></span>
                                        government agencies including local government councils, courts, regulatory
                                        bodies, and law enforcement agencies, or as required, authorised, or permitted
                                        by law.
                                    </li>

                                </ul>


                                <p>
                                    <strong class="font-semibold text-neutral-900">8.7.</strong>
                                    We generally hold your Personal Information on our systems for as long as is
                                    necessary to provide our services to you. The length of time for which we keep your
                                    Personal Information will depend on the services we provide to you and their
                                    relevant regulatory requirements.
                                </p>


                                {{-- Cookie --}}
                                <div class="rounded-xl border border-neutral-200 bg-white p-5">

                                    <p>
                                        <strong class="font-semibold text-neutral-900">8.8. Use of Cookies:</strong>
                                        To improve the quality of our websites and services, we or some of our partners
                                        may from time to time send a “cookie” to your computer. Cookies are text files
                                        that identify your computer to our server and are stored on your device. Cookies
                                        in themselves do not identify the individual user, just the computer used. We
                                        use cookies to improve your user experience by avoiding the need for you to
                                        enter the same information more than once. They also allow us to analyse user
                                        behaviour to improve the functionality and performance of our websites.
                                    </p>

                                </div>


                                <p>
                                    <strong class="font-semibold text-neutral-900">8.9. Right to lodge a
                                        complaint:</strong>
                                    You have a right to lodge a complaint to us at any time if you object to the way in
                                    which we have used or managed your Personal Information. Where you are dissatisfied
                                    with our response, you also have the right to escalate your complaint to the
                                    relevant regulator.
                                </p>


                                <div class="border-t border-brand-100 pt-4 text-xs leading-5 text-neutral-500">

                                    To learn more about Australian Privacy Principles in the Privacy Act 1988, please
                                    visit

                                    <a href="https://www.oaic.gov.au/privacy/australian-privacy-principles"
                                        target="_blank" rel="noopener noreferrer"
                                        class="ml-1 inline-flex items-center gap-1 font-medium text-brand-600 transition-colors hover:text-brand-800 hover:underline">

                                        https://www.oaic.gov.au/privacy/australian-privacy-principles

                                        <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                        </svg>

                                    </a>

                                </div>

                            </div>

                        </div>

                    </section>



                    {{-- =================================================
                    SECTION 09
                ================================================== --}}
                    <div class="my-10 border-t border-neutral-100"></div>

                    <section id="section-9" class="scroll-mt-28">

                        <div class="flex items-start gap-4">

                            <span
                                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 font-mono text-[11px] font-bold text-brand-600">
                                09
                            </span>

                            <div>

                                <p class="mb-1 text-[11px] font-semibold uppercase tracking-wider text-brand-500">
                                    Section 09
                                </p>

                                <h2 class="text-xl font-bold tracking-tight text-neutral-950 sm:text-2xl">
                                    9. General Terms
                                </h2>

                            </div>

                        </div>


                        <div class="mt-6 ml-0 space-y-4 text-[15px] leading-7 text-neutral-600 sm:ml-12">

                            <p>
                                <strong class="font-semibold text-neutral-900">9.1.</strong>
                                These terms and conditions together with the Privacy Policy are the whole agreement
                                between HBD and the Client. The Client acknowledges that it has not entered into this
                                agreement in reliance upon any statement, warranty or representation made by HBD or any
                                other person and irrevocably and unconditionally waives any rights to claim damages
                                and/or to rescind these terms and conditions by reason of any misrepresentation (other
                                than a fraudulent misrepresentation) that is not contained in the terms and conditions
                                and the Privacy Policy.
                            </p>

                            <p>
                                <strong class="font-semibold text-neutral-900">9.2.</strong>
                                If any provision or term of these terms and conditions shall become or be declared
                                illegal, invalid or unenforceable for any reason whatsoever, such term or provision
                                shall be divisible from the other terms and conditions and shall be deemed to be deleted
                                from them.
                            </p>

                        </div>

                    </section>



                    {{-- =================================================
                    SECTION 10
                ================================================== --}}
                    <div class="my-10 border-t border-neutral-100"></div>

                    <section id="section-10" class="scroll-mt-28">

                        <div class="flex items-start gap-4">

                            <span
                                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 font-mono text-[11px] font-bold text-brand-600">
                                10
                            </span>

                            <div>

                                <p class="mb-1 text-[11px] font-semibold uppercase tracking-wider text-brand-500">
                                    Section 10
                                </p>

                                <h2 class="text-xl font-bold tracking-tight text-neutral-950 sm:text-2xl">
                                    10. Notices
                                </h2>

                            </div>

                        </div>


                        <div class="mt-6 ml-0 space-y-5 sm:ml-12">

                            <p class="text-[15px] leading-7 text-neutral-600">
                                All notices shall be given in written format:
                            </p>


                            <div class="overflow-hidden rounded-2xl border border-neutral-200 bg-neutral-50">

                                <div class="border-b border-neutral-200 bg-white px-6 py-5">

                                    <div class="flex items-center gap-3">

                                        <div
                                            class="flex h-9 w-9 items-center justify-center rounded-lg bg-brand-50 text-brand-600">

                                            <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2h14" />
                                            </svg>

                                        </div>

                                        <p class="font-semibold text-neutral-900">
                                            HBD Services
                                        </p>

                                    </div>

                                </div>


                                <div class="space-y-4 px-6 py-5 text-sm text-neutral-600">

                                    <p class="leading-6">

                                        Suite 127 Level 8,
                                        267-277 Castlereagh Street,
                                        Sydney NSW 2000

                                    </p>


                                    <div class="border-t border-neutral-200 pt-4">

                                        <span class="text-xs font-semibold uppercase tracking-wider text-neutral-400">
                                            Email
                                        </span>

                                        <div class="mt-1">

                                            <a href="mailto:info@hbdservices.com"
                                                class="font-semibold text-brand-600 transition-colors hover:text-brand-800 hover:underline">
                                                info@hbdservices.com
                                            </a>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </section>



                    {{-- =================================================
                    FINAL NOTICE
                ================================================== --}}
                    <div class="mt-12 border-t border-neutral-100 pt-8">

                        <div
                            class="flex flex-col gap-4 rounded-2xl border border-brand-100 bg-brand-25 p-5 sm:flex-row sm:items-center sm:justify-between">

                            <div class="flex items-start gap-3">

                                <div
                                    class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-brand-100 text-brand-600">

                                    <svg class="h-4.5 w-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>

                                </div>

                                <div>

                                    <p class="text-sm font-semibold text-neutral-900">
                                        Questions about these Terms?
                                    </p>

                                    <p class="mt-0.5 text-xs leading-5 text-neutral-500">
                                        Contact the HBD Services team for clarification.
                                    </p>

                                </div>

                            </div>


                            <a href="mailto:info@hbdservices.com"
                                class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl border border-brand-200 bg-white px-4 py-2.5 text-xs font-semibold text-brand-700 shadow-sm transition-all duration-200 hover:border-brand-300 hover:bg-brand-50 hover:shadow-md">

                                Contact us

                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M5 12h14M13 6l6 6-6 6" />
                                </svg>

                            </a>

                        </div>

                    </div>


                </div>

            </article>
        </div>
    </main>
@endsection
