@extends('frontend.layouts.app')

@section('content') 

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
        
         <header class="mx-auto max-w-4xl pb-8 text-center lg:pb-10">

            <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-brand-200 bg-brand-50 px-3.5 py-1.5 text-xs font-semibold text-brand-700 shadow-sm">
                <span class="relative flex h-2 w-2">
                    <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-brand-400 opacity-60"></span>
                    <span class="relative inline-flex h-2 w-2 rounded-full bg-brand-500"></span>
                </span>
                Legal Governance & Transparency
            </div>

            <h1 class="text-2xl sm:text-3xl font-bold tracking-[-0.035em] text-neutral-950 md:text-4xl lg:text-5xl uppercase">
                Privacy Policy
            </h1>

            <p class="mx-auto mt-5 max-w-2xl text-sm text-neutral-500 sm:text-base">
                This document outlines how HBD Services collects, uses, and safeguards
                your personal data when utilizing our educational consultancy and
                recruitment services.
            </p>

            <div class="mt-2 flex flex-wrap items-center justify-center gap-x-5 gap-y-2 text-xs font-medium text-neutral-500">
                <span class="inline-flex items-center gap-1.5">
                    <svg class="h-4 w-4 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M12 15v2m-6 4h12a2 2 0 002-2V9a2 2 0 00-2-2H6a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M8 7V5a4 4 0 118 0v2"/>
                    </svg>
                    Privacy & Data Protection
                </span>

                <span class="hidden h-1 w-1 rounded-full bg-neutral-300 sm:block"></span>

                <span>HBD Services</span>
            </div>

        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">
            
            <aside class="lg:col-span-4 space-y-6">
                <div class=" space-y-5 sticky top-34">
                     {{-- Company Card --}}
                    <div class="overflow-hidden rounded-2xl border border-neutral-200 bg-white shadow-[0_8px_30px_rgb(16,24,40,0.04)]">

                        {{-- Card Header --}}
                        <div class="border-b border-neutral-100 bg-gradient-to-br from-brand-50 to-white p-6">

                            <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-xl bg-brand-500 text-white shadow-sm shadow-brand-500/20">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                          d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h6m-6 4h6m-6 4h4"/>
                                </svg>
                            </div>

                            <h2 class="text-lg font-bold tracking-tight text-neutral-950">
                                Entity Details
                            </h2>

                            <p class="mt-1 text-sm leading-5 text-neutral-500">
                                Official information about HBD Services.
                            </p>

                        </div>


                        {{-- Details --}}
                        <div class="divide-y divide-neutral-100">

                            <div class="p-5">
                                <span class="mb-1.5 block text-[11px] font-semibold uppercase tracking-wider text-neutral-400">
                                    Company Name
                                </span>

                                <span class="text-sm font-semibold text-neutral-800">
                                    HBD Services
                                </span>
                            </div>


                            <div class="p-5">
                                <span class="mb-1.5 block text-[11px] font-semibold uppercase tracking-wider text-neutral-400">
                                    ABN
                                </span>

                                <span class="inline-flex rounded-lg border border-neutral-200 bg-neutral-50 px-2.5 py-1 font-mono text-xs font-medium text-neutral-700">
                                    65 967 066 288
                                </span>
                            </div>


                            <div class="p-5">
                                <span class="mb-1.5 block text-[11px] font-semibold uppercase tracking-wider text-neutral-400">
                                    Registered Office
                                </span>

                                <address class="not-italic text-sm leading-6 text-neutral-600">
                                    Suite 127, Level 8,
                                    267–277 Castlereagh Street,
                                    Sydney NSW 2000, Australia
                                </address>
                            </div>


                            <div class="p-5">

                                <span class="mb-1.5 block text-[11px] font-semibold uppercase tracking-wider text-neutral-400">
                                    Official Website
                                </span>

                                <a
                                    href="https://www.hbdservices.com"
                                    target="_blank"
                                    rel="noopener"
                                    class="group inline-flex max-w-full items-center gap-1.5 break-all text-sm font-medium text-brand-600 transition-colors hover:text-brand-800"
                                >
                                    <span>www.hbdservices.com</span>

                                    <svg class="h-3.5 w-3.5 shrink-0 transition-transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="1.8"
                                              d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                    </svg>
                                </a>

                            </div>

                        </div>


                        {{-- Contact --}}
                        <div class="border-t border-neutral-100 bg-neutral-25 p-5">

                            <a
                                href="mailto:info@hbdservices.com"
                                class="group flex w-full items-center justify-center gap-2 rounded-xl bg-brand-500 px-4 py-3 text-sm font-semibold text-white shadow-sm shadow-brand-500/20 transition-all duration-200 hover:bg-brand-600 hover:shadow-md hover:shadow-brand-500/20 active:scale-[0.99]"
                            >
                                <svg class="h-4 w-4"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="1.8"
                                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>

                                Privacy Desk Support
                            </a>

                        </div>

                    </div>


                    {{-- Trust Card --}}
                    <div class="rounded-2xl border border-brand-100 bg-brand-50/60 p-5">

                        <div class="flex gap-3">

                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-brand-100 text-brand-600">
                                <svg class="h-4.5 w-4.5"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="1.8"
                                          d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622C17.176 19.29 21 14.591 21 9c0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>

                            <div>
                                <h3 class="text-sm font-semibold text-neutral-800">
                                    Your privacy matters
                                </h3>

                                <p class="mt-1 text-xs leading-5 text-neutral-500">
                                    We are committed to handling personal information responsibly and transparently.
                                </p>
                            </div>

                        </div>

                    </div>
                </div>
            </aside>

           <article class="lg:col-span-8">

                <div class="rounded-2xl border border-neutral-200 bg-white px-5 py-8 shadow-[0_8px_30px_rgb(16,24,40,0.03)] sm:px-8 sm:py-10 lg:px-10">

                    {{-- =================================================
                         SECTION COMPONENT STYLE
                    ================================================== --}}


                    {{-- 01 --}}
                    <section id="section-1" class="scroll-mt-28 space-y-5">

                        <div class="flex items-start gap-4">

                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 font-mono text-[11px] font-bold text-brand-600">
                                01
                            </span>

                            <h2 class="pt-1 text-xl font-bold tracking-tight text-neutral-950">
                                Introduction
                            </h2>

                        </div>

                        <div class="ml-12 space-y-4 text-[15px] leading-7 text-neutral-600">

                            <p>
                                HBD Services (“HBD”, “we”, “us”, or “our”) respects your privacy and is committed to protecting your personal information in accordance with the
                                <strong class="font-semibold text-neutral-800">Privacy Act 1988 (Cth)</strong>
                                and the
                                <strong class="font-semibold text-neutral-800">Australian Privacy Principles (APPs)</strong>.
                            </p>

                            <p>
                                This Privacy Policy explains how we collect, use, and protect your personal information when you visit our website or use our services.
                            </p>

                            <div class="rounded-xl border border-amber-200 bg-amber-50 p-4 text-sm leading-6 text-amber-800">
                                <strong class="font-semibold text-amber-900">Consent Notice:</strong>
                                By using our website, you agree to this Policy. If you do not agree, please discontinue use of the website and services.
                            </div>

                        </div>

                    </section>


                    {{-- Divider --}}
                    <div class="my-10 border-t border-neutral-100"></div>


                    {{-- 02 --}}
                    <section id="section-2" class="scroll-mt-28 space-y-5">

                        <div class="flex items-start gap-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 font-mono text-[11px] font-bold text-brand-600">02</span>

                            <h2 class="pt-1 text-xl font-bold tracking-tight text-neutral-950">
                                About HBD Services
                            </h2>
                        </div>

                        <div class="ml-12 space-y-4 text-[15px] leading-7 text-neutral-600">

                            <p>
                                HBD Services is an Australian-registered educational consultancy specialising in international student recruitment, admission guidance, and visa assistance for students seeking to study in Australia or Canada.
                            </p>

                            <p>
                                We may collect personal information through our website, forms, email communications, or in person, to provide these services effectively.
                            </p>

                        </div>

                    </section>


                    <div class="my-10 border-t border-neutral-100"></div>


                    {{-- 03 --}}
                    <section id="section-3" class="scroll-mt-28 space-y-5">

                        <div class="flex items-start gap-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 font-mono text-[11px] font-bold text-brand-600">03</span>

                            <h2 class="pt-1 text-xl font-bold tracking-tight text-neutral-950">
                                Information We Collect
                            </h2>
                        </div>

                        <div class="ml-12 space-y-5 text-[15px] leading-7 text-neutral-600">

                            <p>We may collect the following types of information:</p>

                            <div class="grid grid-cols-1 gap-3">

                                @php
                                    $informationTypes = [
                                        [
                                            'title' => 'Personal Information',
                                            'description' => 'Name, email address, phone number, address, date of birth, and nationality.'
                                        ],
                                        [
                                            'title' => 'Academic and Professional Information',
                                            'description' => 'Educational background, qualifications, employment history, and course preferences.'
                                        ],
                                        [
                                            'title' => 'Identification Documents',
                                            'description' => 'Passport, visa, or other proof of identity (where required).'
                                        ],
                                        [
                                            'title' => 'Technical Information',
                                            'description' => 'Device details, IP address, browser type, operating system, and pages visited on our website.'
                                        ],
                                        [
                                            'title' => 'Cookies and Analytics Data',
                                            'description' => 'Used to improve your online experience and understand how you use our website.'
                                        ],
                                        [
                                            'title' => 'Social Media Information',
                                            'description' => 'If you interact with us via Facebook, Instagram, or Google, we may collect limited data consistent with your privacy settings on those platforms.'
                                        ],
                                    ];
                                @endphp

                                @foreach($informationTypes as $item)

                                    <div class="group rounded-xl border border-neutral-200 bg-white p-4 transition-all duration-200 hover:-translate-y-0.5 hover:border-brand-200 hover:bg-brand-25 hover:shadow-sm">

                                        <div class="flex items-start gap-3">

                                            <div class="mt-0.5 flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-brand-50 text-brand-500">
                                                <svg class="h-3.5 w-3.5"
                                                     fill="none"
                                                     stroke="currentColor"
                                                     viewBox="0 0 24 24">
                                                    <path stroke-linecap="round"
                                                          stroke-linejoin="round"
                                                          stroke-width="1.8"
                                                          d="M5 13l4 4L19 7"/>
                                                </svg>
                                            </div>

                                            <div>
                                                <strong class="block text-sm font-semibold text-neutral-800">
                                                    {{ $item['title'] }}
                                                </strong>

                                                <span class="mt-1 block text-sm leading-6 text-neutral-500">
                                                    {{ $item['description'] }}
                                                </span>
                                            </div>

                                        </div>

                                    </div>

                                @endforeach

                            </div>


                            <div class="flex gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm leading-6 text-emerald-800">

                                <svg class="mt-0.5 h-5 w-5 shrink-0 text-emerald-600"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="1.8"
                                          d="M12 15v2m-6 4h12a2 2 0 002-2V9a2 2 0 00-2-2H6a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="1.8"
                                          d="M8 7V5a4 4 0 118 0v2"/>
                                </svg>

                                <div>
                                    <strong class="font-semibold text-emerald-900">
                                        Financial Security Guarantee:
                                    </strong>

                                    We do <span class="font-semibold underline underline-offset-2">not</span>
                                    collect or store your credit card or banking details via our website.
                                </div>

                            </div>

                        </div>

                    </section>


                    <div class="my-10 border-t border-neutral-100"></div>


                    {{-- 04 --}}
                    <section id="section-4" class="scroll-mt-28 space-y-5">

                        <div class="flex items-start gap-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 font-mono text-[11px] font-bold text-brand-600">04</span>

                            <h2 class="pt-1 text-xl font-bold tracking-tight text-neutral-950">
                                How We Collect Information
                            </h2>
                        </div>

                        <div class="ml-12 space-y-4 text-[15px] leading-7 text-neutral-600">

                            <p>We may collect information in the following ways:</p>

                            <ol class="space-y-3">

                                <li class="flex gap-3">
                                    <span class="font-mono text-xs font-bold text-brand-500">01</span>
                                    <span>
                                        <strong class="font-semibold text-neutral-800">Directly from you</strong>
                                        – when you complete an enquiry form, email us, or attend a consultation.
                                    </span>
                                </li>

                                <li class="flex gap-3">
                                    <span class="font-mono text-xs font-bold text-brand-500">02</span>
                                    <span>
                                        <strong class="font-semibold text-neutral-800">Automatically</strong>
                                        – when you browse our website (e.g., through cookies, tracking tools, and analytics).
                                    </span>
                                </li>

                                <li class="flex gap-3">
                                    <span class="font-mono text-xs font-bold text-brand-500">03</span>
                                    <span>
                                        <strong class="font-semibold text-neutral-800">From third parties</strong>
                                        – such as universities, colleges, or education partners assisting with your application (with your consent).
                                    </span>
                                </li>

                            </ol>

                        </div>

                    </section>


                    <div class="my-10 border-t border-neutral-100"></div>


                    {{-- 05 --}}
                    <section id="section-5" class="scroll-mt-28 space-y-5">

                        <div class="flex items-start gap-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 font-mono text-[11px] font-bold text-brand-600">05</span>

                            <h2 class="pt-1 text-xl font-bold tracking-tight text-neutral-950">
                                How We Use Your Information
                            </h2>
                        </div>

                        <div class="ml-12 space-y-4 text-[15px] leading-7 text-neutral-600">

                            <p>We use your personal information to:</p>

                            <ul class="space-y-2.5">

                                @foreach([
                                    'Provide and manage our consultancy services.',
                                    'Process educational applications and visa assistance.',
                                    'Communicate updates, course information, and relevant opportunities.',
                                    'Improve website functionality and service quality.',
                                    'Comply with legal and regulatory requirements.',
                                    'Send marketing or promotional materials (if you have opted in).'
                                ] as $item)

                                    <li class="flex gap-3">
                                        <svg class="mt-1 h-4 w-4 shrink-0 text-brand-500"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="1.8"
                                                  d="M5 13l4 4L19 7"/>
                                        </svg>

                                        <span>{{ $item }}</span>
                                    </li>

                                @endforeach

                            </ul>

                            <p class="text-sm italic text-neutral-500">
                                You can withdraw your consent for marketing communications at any time.
                            </p>

                        </div>

                    </section>


                    <div class="my-10 border-t border-neutral-100"></div>


                    {{-- 06 --}}
                    <section id="section-6" class="scroll-mt-28 space-y-5">

                        <div class="flex items-start gap-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 font-mono text-[11px] font-bold text-brand-600">06</span>

                            <h2 class="pt-1 text-xl font-bold tracking-tight text-neutral-950">
                                Disclosure of Information
                            </h2>
                        </div>

                        <div class="ml-12 space-y-4 text-[15px] leading-7 text-neutral-600">

                            <p>We may disclose your personal information to:</p>

                            <ul class="space-y-3">

                                <li>Partner <strong class="font-semibold text-neutral-800">universities, colleges, and training providers</strong> for admission processing.</li>

                                <li><strong class="font-semibold text-neutral-800">Visa and government authorities</strong> where required by law.</li>

                                <li><strong class="font-semibold text-neutral-800">Service providers</strong> such as IT support, marketing, accountants, or legal advisors who must keep data confidential.</li>

                                <li><strong class="font-semibold text-neutral-800">Social media platforms</strong> such as Meta (Facebook/Instagram) or Google, only for advertising and analytics purposes — in accordance with their respective privacy and data policies.</li>

                                <li><strong class="font-semibold text-neutral-800">Law enforcement or regulatory bodies</strong>, where required or authorised by law.</li>

                            </ul>

                            <div class="rounded-xl border border-brand-100 bg-brand-25 px-4 py-3 text-sm font-semibold text-neutral-800">
                                We do <span class="underline underline-offset-2">not</span> sell, rent, or trade your personal information.
                            </div>

                        </div>

                    </section>


                    <div class="my-10 border-t border-neutral-100"></div>


                    {{-- 07 --}}
                    <section id="section-7" class="scroll-mt-28 space-y-5">

                        <div class="flex items-start gap-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 font-mono text-[11px] font-bold text-brand-600">07</span>

                            <h2 class="pt-1 text-xl font-bold tracking-tight text-neutral-950">
                                International Data Transfers
                            </h2>
                        </div>

                        <div class="ml-12 space-y-4 text-[15px] leading-7 text-neutral-600">

                            <p>
                                Your information may be shared with education providers and authorities located outside Australia (such as in Canada).
                            </p>

                            <p>
                                We ensure all reasonable steps are taken to protect your personal data and that overseas recipients handle it in accordance with privacy standards similar to those in Australia.
                            </p>

                        </div>

                    </section>


                    <div class="my-10 border-t border-neutral-100"></div>


                    {{-- 08 --}}
                    <section id="section-8" class="scroll-mt-28 space-y-5">

                        <div class="flex items-start gap-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 font-mono text-[11px] font-bold text-brand-600">08</span>

                            <h2 class="pt-1 text-xl font-bold tracking-tight text-neutral-950">
                                Cookies and Tracking Technologies
                            </h2>
                        </div>

                        <div class="ml-12 space-y-5 text-[15px] leading-7 text-neutral-600">

                            <p>
                                Our website uses cookies and third-party analytics tools to improve your browsing experience and measure traffic. These may include tools such as
                                <strong class="font-semibold text-neutral-800">Google Analytics</strong>,
                                <strong class="font-semibold text-neutral-800">Google Ads</strong>,
                                and <strong class="font-semibold text-neutral-800">Meta Pixel</strong> (Facebook Pixel).
                            </p>

                            <div>
                                <p class="mb-3 text-sm font-semibold text-neutral-800">
                                    These technologies may:
                                </p>

                                <ul class="space-y-2 text-sm">

                                    <li class="flex gap-2.5">
                                        <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-brand-500"></span>
                                        Track how you interact with our site (pages viewed, time spent, clicks).
                                    </li>

                                    <li class="flex gap-2.5">
                                        <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-brand-500"></span>
                                        Help us measure advertising effectiveness.
                                    </li>

                                    <li class="flex gap-2.5">
                                        <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-brand-500"></span>
                                        Deliver relevant ads on Google, Facebook, Instagram, and other partner platforms.
                                    </li>

                                </ul>

                            </div>


                            <div class="rounded-xl border border-neutral-200 bg-neutral-50 p-4">

                                <p class="text-sm text-neutral-600">
                                    You can control or disable cookies through your browser settings.
                                </p>

                                <div class="mt-3 flex flex-col gap-2.5 sm:flex-row sm:items-center sm:gap-4">

                                    <a
                                        href="https://tools.google.com/dlpage/gaoptout"
                                        target="_blank"
                                        rel="noopener"
                                        class="inline-flex items-center gap-1.5 text-sm font-medium text-brand-600 transition-colors hover:text-brand-800"
                                    >
                                        Google Analytics Opt-Out Add-on

                                        <svg class="h-3.5 w-3.5"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="1.8"
                                                  d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                        </svg>
                                    </a>

                                    <span class="hidden text-neutral-300 sm:block">•</span>

                                    <a
                                        href="https://www.facebook.com/adpreferences/ad_settings"
                                        target="_blank"
                                        rel="noopener"
                                        class="inline-flex items-center gap-1.5 text-sm font-medium text-brand-600 transition-colors hover:text-brand-800"
                                    >
                                        Facebook Ad Preferences

                                        <svg class="h-3.5 w-3.5"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="1.8"
                                                  d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                        </svg>
                                    </a>

                                </div>

                            </div>

                            <p class="text-xs leading-5 text-neutral-500">
                                We adhere to Google’s and Meta’s advertising policies, including
                                <strong class="font-semibold text-neutral-700">personalised ad consent</strong>
                                and <strong class="font-semibold text-neutral-700">data retention limits</strong>.
                            </p>

                        </div>

                    </section>


                    <div class="my-10 border-t border-neutral-100"></div>


                    {{-- 09 --}}
                    <section id="section-9" class="scroll-mt-28 space-y-5">

                        <div class="flex items-start gap-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 font-mono text-[11px] font-bold text-brand-600">09</span>

                            <h2 class="pt-1 text-xl font-bold tracking-tight text-neutral-950">
                                Data Storage and Security
                            </h2>
                        </div>

                        <div class="ml-12 space-y-4 text-[15px] leading-7 text-neutral-600">

                            <p>
                                We take reasonable steps to protect your personal information against misuse, loss, unauthorised access, or disclosure.
                            </p>

                            <p class="text-sm font-semibold text-neutral-800">
                                Measures include:
                            </p>

                            <div class="grid grid-cols-1 gap-2 sm:grid-cols-2">

                                @foreach([
                                    'Secure servers and firewalls',
                                    'SSL encryption for transmission',
                                    'Access controls and staff confidentiality agreements'
                                ] as $item)

                                    <div class="flex items-center gap-2.5 rounded-xl border border-neutral-200 bg-neutral-50 p-3 text-sm text-neutral-600 {{ $loop->last ? 'sm:col-span-2' : '' }}">

                                        <svg class="h-4 w-4 shrink-0 text-brand-500"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="1.8"
                                                  d="M5 13l4 4L19 7"/>
                                        </svg>

                                        {{ $item }}

                                    </div>

                                @endforeach

                            </div>

                            <p class="text-xs leading-5 text-neutral-500">
                                While we strive for maximum security, no system is completely risk-free. You are responsible for maintaining the confidentiality of your login credentials.
                            </p>

                        </div>

                    </section>


                    <div class="my-10 border-t border-neutral-100"></div>


                    {{-- 10 --}}
                    <section id="section-10" class="scroll-mt-28 space-y-5">

                        <div class="flex items-start gap-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 font-mono text-[11px] font-bold text-brand-600">10</span>

                            <h2 class="pt-1 text-xl font-bold tracking-tight text-neutral-950">
                                Retention of Information
                            </h2>
                        </div>

                        <div class="ml-12 text-[15px] leading-7 text-neutral-600">
                            <p>
                                We retain your personal information only for as long as necessary to provide services to you and comply with legal obligations. When no longer required, your data is securely deleted or anonymised.
                            </p>
                        </div>

                    </section>


                    <div class="my-10 border-t border-neutral-100"></div>


                    {{-- 11 --}}
                    <section id="section-11" class="scroll-mt-28 space-y-5">

                        <div class="flex items-start gap-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 font-mono text-[11px] font-bold text-brand-600">11</span>

                            <h2 class="pt-1 text-xl font-bold tracking-tight text-neutral-950">
                                Marketing and Communication
                            </h2>
                        </div>

                        <div class="ml-12 space-y-4 text-[15px] leading-7 text-neutral-600">

                            <p>With your consent, we may send you information about:</p>

                            <ul class="space-y-2">
                                <li class="flex gap-3">
                                    <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-brand-500"></span>
                                    Study opportunities
                                </li>
                                <li class="flex gap-3">
                                    <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-brand-500"></span>
                                    Visa and scholarship updates
                                </li>
                                <li class="flex gap-3">
                                    <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-brand-500"></span>
                                    Educational events or promotions
                                </li>
                            </ul>

                            <p>
                                You can unsubscribe at any time by clicking the “unsubscribe” link in our emails or contacting us directly at
                                <a href="mailto:info@hbdservices.com"
                                   class="font-semibold text-brand-600 hover:text-brand-800 hover:underline">
                                    info@hbdservices.com
                                </a>.
                            </p>

                            <p class="text-xs leading-5 text-neutral-500">
                                We will never send marketing materials without your prior consent, in compliance with the
                                <strong class="font-semibold text-neutral-700">Spam Act 2003 (Cth)</strong>.
                            </p>

                        </div>

                    </section>


                    <div class="my-10 border-t border-neutral-100"></div>


                    {{-- 12 --}}
                    <section id="section-12" class="scroll-mt-28 space-y-5">

                        <div class="flex items-start gap-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 font-mono text-[11px] font-bold text-brand-600">12</span>

                            <h2 class="pt-1 text-xl font-bold tracking-tight text-neutral-950">
                                Accessing and Correcting Your Information
                            </h2>
                        </div>

                        <div class="ml-12 space-y-4 text-[15px] leading-7 text-neutral-600">

                            <p>
                                You can request access to, or correction of, your personal information at any time by emailing
                                <a href="mailto:info@hbdservices.com"
                                   class="font-semibold text-brand-600 hover:text-brand-800 hover:underline">
                                    info@hbdservices.com
                                </a>.
                            </p>

                            <p>
                                We will respond within a reasonable period, usually within 30 days, unless legal or administrative constraints apply.
                            </p>

                        </div>

                    </section>


                    <div class="my-10 border-t border-neutral-100"></div>


                    {{-- 13 --}}
                    <section id="section-13" class="scroll-mt-28 space-y-5">

                        <div class="flex items-start gap-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 font-mono text-[11px] font-bold text-brand-600">13</span>

                            <h2 class="pt-1 text-xl font-bold tracking-tight text-neutral-950">
                                Links to Third-Party Websites
                            </h2>
                        </div>

                        <div class="ml-12 text-[15px] leading-7 text-neutral-600">

                            <p>
                                Our website may contain links to external or co-branded websites. HBD is not responsible for the content or privacy practices of these sites. We encourage you to review their privacy policies before providing any personal information.
                            </p>

                        </div>

                    </section>


                    <div class="my-10 border-t border-neutral-100"></div>


                    {{-- 14 --}}
                    <section id="section-14" class="scroll-mt-28 space-y-5">

                        <div class="flex items-start gap-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 font-mono text-[11px] font-bold text-brand-600">14</span>

                            <h2 class="pt-1 text-xl font-bold tracking-tight text-neutral-950">
                                Advertising and Analytics Policy
                            </h2>
                        </div>

                        <div class="ml-12 space-y-4 text-[15px] leading-7 text-neutral-600">

                            <p>
                                HBD complies fully with
                                <strong class="font-semibold text-neutral-800">Google’s Advertising Policies</strong>
                                and
                                <strong class="font-semibold text-neutral-800">Meta’s Data Terms</strong>,
                                which prohibit:
                            </p>

                            <ul class="space-y-2.5">

                                <li class="flex gap-3">
                                    <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-brand-500"></span>
                                    Uploading personally identifiable information for ad targeting without consent.
                                </li>

                                <li class="flex gap-3">
                                    <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-brand-500"></span>
                                    Combining data from cookies or pixels with personal data from other sources without user consent.
                                </li>

                                <li class="flex gap-3">
                                    <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-brand-500"></span>
                                    Misleading users about data usage or retargeting.
                                </li>

                            </ul>

                            <p class="text-sm">
                                Any tracking or advertising data we collect is anonymised and used only in aggregate form.
                            </p>

                            <p class="text-sm text-neutral-500">
                                We do <strong class="font-semibold text-neutral-700">not</strong> engage in practices that violate Google’s User Data Policy, Facebook Business Tools Terms, or GDPR-equivalent standards for transparency and consent.
                            </p>

                        </div>

                    </section>


                    <div class="my-10 border-t border-neutral-100"></div>


                    {{-- 15 --}}
                    <section id="section-15" class="scroll-mt-28 space-y-5">

                        <div class="flex items-start gap-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 font-mono text-[11px] font-bold text-brand-600">15</span>

                            <h2 class="pt-1 text-xl font-bold tracking-tight text-neutral-950">
                                Changes to This Policy
                            </h2>
                        </div>

                        <div class="ml-12 text-[15px] leading-7 text-neutral-600">

                            <p>
                                We may update this Privacy Policy from time to time to reflect legal, regulatory, or operational changes. Updates will be posted on this page, and the revised date will appear at the top. Continued use of the website constitutes acceptance of any amendments.
                            </p>

                        </div>

                    </section>


                    <div class="my-10 border-t border-neutral-100"></div>


                    {{-- 16 --}}
                    <section id="section-16" class="scroll-mt-28 space-y-5">

                        <div class="flex items-start gap-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 font-mono text-[11px] font-bold text-brand-600">16</span>

                            <h2 class="pt-1 text-xl font-bold tracking-tight text-neutral-950">
                                Contact Us
                            </h2>
                        </div>

                        <div class="ml-12 space-y-6 text-[15px] leading-7 text-neutral-600">

                            <p>
                                If you have any questions, concerns, or complaints about our privacy practices, please contact:
                            </p>


                            {{-- Contact card --}}
                            <div class="overflow-hidden rounded-2xl border border-brand-100 bg-gradient-to-br from-brand-50 to-white">

                                <div class="p-6">

                                    <div class="flex items-start gap-4">

                                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-brand-500 text-white shadow-sm shadow-brand-500/20">

                                            <svg class="h-5 w-5"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">
                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="1.8"
                                                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>

                                        </div>

                                        <div>

                                            <h3 class="text-lg font-bold tracking-tight text-neutral-950">
                                                HBD Services
                                            </h3>

                                            <p class="mt-2 text-sm leading-6 text-neutral-600">
                                                Suite 127, Level 8, 267–277 Castlereagh Street, Sydney NSW 2000
                                            </p>

                                            <p class="mt-3 text-sm">

                                                <strong class="font-semibold text-neutral-800">
                                                    Email:
                                                </strong>

                                                <a
                                                    href="mailto:info@hbdservices.com"
                                                    class="ml-1 font-semibold text-brand-600 transition-colors hover:text-brand-800 hover:underline"
                                                >
                                                    info@hbdservices.com
                                                </a>

                                            </p>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            <div class="rounded-xl border border-neutral-200 bg-neutral-50 p-4 text-sm leading-6 text-neutral-500">

                                We aim to respond promptly to all privacy-related queries. If you are not satisfied with our response, you may contact the
                                <strong class="font-semibold text-neutral-700">
                                    Office of the Australian Information Commissioner (OAIC)
                                </strong>
                                at

                                <a
                                    href="https://www.oaic.gov.au"
                                    target="_blank"
                                    rel="noopener"
                                    class="ml-1 inline-flex items-center gap-1 font-medium text-brand-600 transition-colors hover:text-brand-800"
                                >
                                    oaic.gov.au

                                    <svg class="h-3.5 w-3.5"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="1.8"
                                              d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                    </svg>
                                </a>

                            </div>

                        </div>

                    </section>


                </div>

            </article>
        </div>
    </main>

@endsection