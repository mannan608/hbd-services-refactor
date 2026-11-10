@extends('frontend.layouts.app')

@section('content')
    {{-- HBD Services Referral Program | Responsive, accessible, conversion-focused Blade UI --}}

    <main class="bg-white text-slate-900 antialiased dark:bg-slate-950 dark:text-slate-100">
        <section
            class="relative overflow-hidden bg-gradient-to-br from-secondary-500 via-brand-900 to-brand-950 py-16 text-white sm:py-24 lg:py-28">
            <!-- Background Accent Grid -->
            <div
                class="absolute inset-0 bg-[linear-gradient(to_right,#ffffff0a_1px,transparent_1px),linear-gradient(to_bottom,#ffffff0a_1px,transparent_1px)] bg-[size:24px_24px]">
            </div>

            <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid items-center gap-12 lg:grid-cols-12">

                    <!-- Left Column -->
                    <div class="space-y-6 lg:col-span-7">
                        <span
                            class="inline-flex items-center gap-2 rounded-full bg-brand-400/10 px-3.5 py-1 text-xs font-semibold text-brand-300 ring-1 ring-inset ring-brand-300/30">
                            <span class="h-1.5 w-1.5 rounded-full bg-brand-400"></span>
                            Australia's #1 Education Referral Platform
                        </span>

                        <h1 class="text-3xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl leading-tight">
                            Refer your friend and get <span
                                class="bg-gradient-to-r from-brand-300 to-brand-100 bg-clip-text text-transparent">rewarded!</span>
                        </h1>

                        <p class="max-w-xl text-sm leading-relaxed text-brand-100/90 sm:text-base">
                            Empower international students on their study abroad journey. Expand your network, gain industry
                            recognition, and earn cash rewards for every successful referral.
                        </p>

                        <div class="flex flex-wrap items-center gap-4 pt-2">
                            <a href="#register"
                                class="inline-flex items-center justify-center rounded-xl bg-brand-500 px-6 py-3 text-sm font-semibold text-white shadow-lg transition hover:bg-brand-600 active:scale-95">
                                Join Our Referral Program
                            </a>
                            <a href="#how-it-works"
                                class="inline-flex items-center justify-center rounded-xl border border-brand-300/30 bg-white/5 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/10 backdrop-blur-sm">
                                Learn How It Works
                            </a>
                        </div>

                        <!-- Key Stats Bar -->
                        <div class="grid grid-cols-3 gap-4 border-t border-brand-800/80 pt-8">
                            <div>
                                <div class="text-xl font-bold sm:text-2xl text-white">1,100+</div>
                                <p class="text-xs text-brand-200">Trusted Institutions</p>
                            </div>
                            <div>
                                <div class="text-xl font-bold sm:text-2xl text-white">24,000+</div>
                                <p class="text-xs text-brand-200">Visa Grants</p>
                            </div>
                            <div>
                                <div class="text-xl font-bold sm:text-2xl text-white">End-to-End</div>
                                <p class="text-xs text-brand-200">Consultancy Services</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Glassmorphic Visual Card -->
                    <div class="relative lg:col-span-5">
                        <div
                            class="relative mx-auto w-full max-w-md rounded-3xl border border-brand-300/20 bg-brand-900/40 p-3 backdrop-blur-xl shadow-2xl">
                            <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=800&q=80"
                                alt="Students celebrating" class="h-80 w-full rounded-2xl object-cover" />

                            <!-- Floating Glass Badge -->
                            <div
                                class="absolute -bottom-6 -left-6 rounded-2xl border border-white/10 bg-secondary-500/90 p-4 shadow-xl backdrop-blur-md">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-500 text-white">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-xs text-brand-200">Instant Earnings</div>
                                        <div class="text-sm font-bold text-white">Guaranteed Payouts</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{-- Benefits --}}
        <section class="py-16 sm:py-20 lg:py-24">
            <div class="mx-auto grid max-w-7xl items-center gap-12 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
                <div class="order-2 lg:order-1">
                    <div class="overflow-hidden rounded-3xl bg-slate-100 dark:bg-slate-900">
                        <img src="{{ asset('referral-image.jpg') }}" alt="People discussing an opportunity"
                            class="h-72 w-full object-cover sm:h-[440px]" loading="lazy">
                    </div>
                </div>
                <div class="order-1 lg:order-2">
                    <p class="text-sm font-semibold uppercase tracking-widest text-blue-600 dark:text-blue-400">Why become a
                        referral partner?</p>
                    <h2 class="mt-3 text-3xl font-bold tracking-tight sm:text-4xl">More than a referral. A chance to make an
                        impact.</h2>
                    <p class="mt-4 max-w-2xl text-base leading-7 text-slate-600 dark:text-slate-300">
                        Share opportunities with people in your network and build your own professional connections along
                        the way.
                    </p>

                    <div class="mt-8 space-y-4">
                        @php
                            $benefits = [
                                [
                                    'title' => 'Rewards with clear terms',
                                    'description' =>
                                        'Understand referral eligibility and payout conditions before you get started.',
                                ],
                                [
                                    'title' => 'Grow your network',
                                    'description' =>
                                        'Connect with education professionals and people who share your interests.',
                                ],
                                [
                                    'title' => 'Build your reputation',
                                    'description' =>
                                        'Help students discover relevant study opportunities through trusted recommendations.',
                                ],
                                [
                                    'title' => 'Develop useful experience',
                                    'description' =>
                                        'Strengthen your communication, relationship-building, and referral skills.',
                                ],
                                [
                                    'title' => 'Learn about international education',
                                    'description' =>
                                        'Explore the services and pathways that can support students’ ambitions.',
                                ],
                            ];
                        @endphp
                        @foreach ($benefits as $benefit)
                            <div
                                class="flex gap-4 rounded-2xl border border-slate-200 p-4 transition hover:border-blue-200 hover:bg-blue-50/50 dark:border-slate-800 dark:hover:border-blue-900 dark:hover:bg-blue-950/20">
                                <span
                                    class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700 dark:bg-emerald-400/10 dark:text-emerald-300">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="m5 12 4 4L19 6" />
                                    </svg>
                                </span>
                                <div>
                                    <h3 class="text-sm font-semibold sm:text-base">{{ $benefit['title'] }}</h3>
                                    <p class="mt-1 text-sm leading-6 text-slate-600 dark:text-slate-400">
                                        {{ $benefit['description'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- How it works --}}
        <section id="how-it-works"
            class="scroll-mt-20 border-y border-slate-200 bg-slate-50 py-16 dark:border-slate-800 dark:bg-slate-900/50 sm:py-20 lg:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center">
                    <p class="text-sm font-semibold uppercase tracking-widest text-blue-600 dark:text-blue-400">Simple by
                        design</p>
                    <h2 class="mt-3 text-3xl font-bold tracking-tight sm:text-4xl">How it works</h2>
                    <p class="mt-4 text-base leading-7 text-slate-600 dark:text-slate-300">Three straightforward steps to
                        get started.</p>
                </div>

                <div class="mt-12 grid gap-5 md:grid-cols-3">
                    @php
                        $steps = [
                            [
                                'number' => '01',
                                'title' => 'Create your account',
                                'description' =>
                                    'Register with your details and choose the referral partner type that best describes you.',
                            ],
                            [
                                'number' => '02',
                                'title' => 'Share relevant services',
                                'description' =>
                                    'Introduce  HBD Services to people who may benefit from international education guidance.',
                            ],
                            [
                                'number' => '03',
                                'title' => 'Track eligible referrals',
                                'description' =>
                                    'Follow the program’s referral process and payout terms for eligible successful referrals.',
                            ],
                        ];
                    @endphp
                    @foreach ($steps as $step)
                        <article
                            class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-950 sm:p-8">
                            <div
                                class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-600 text-sm font-bold text-white shadow-lg shadow-blue-600/20">
                                {{ $step['number'] }}</div>
                            <h3 class="mt-5 text-lg font-semibold">{{ $step['title'] }}</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-600 dark:text-slate-400">{{ $step['description'] }}
                            </p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Types of Referral Program Section -->
        <section class="bg-secondary-500 py-16 text-white sm:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center">
                    <h2 class="text-2xl font-bold tracking-tight sm:text-3xl">Types of referral programs</h2>
                    <p class="mt-2 text-sm text-brand-200">Tailored categories designed to fit individual advocates,
                        professionals, and organizations.</p>
                </div>

                <div class="mt-12 grid grid-cols-1 gap-6 lg:grid-cols-3">

                    <!-- Individual -->
                    <div class="rounded-2xl border border-brand-700/50 bg-secondary-600/60 p-6 backdrop-blur-sm">
                        <span class="rounded-lg bg-brand-500/20 px-3 py-1 text-xs font-semibold text-brand-300">01.
                            Individual</span>
                        <h3 class="mt-4 text-lg font-bold text-white">Students & Alumni</h3>
                        <p class="mt-1 text-xs text-brand-200">Students referring their friends or peers to our programs.
                        </p>

                        <ul class="mt-6 space-y-2.5 text-xs text-brand-100">
                            <li class="flex items-center gap-2"><svg class="h-4 w-4 text-brand-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg> Become more trusted with shared experiences</li>
                            <li class="flex items-center gap-2"><svg class="h-4 w-4 text-brand-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg> Receive cash benefits to supplement your income</li>
                            <li class="flex items-center gap-2"><svg class="h-4 w-4 text-brand-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg> Build a network effect within student communities</li>
                        </ul>
                    </div>

                    <!-- Professional -->
                    <div class="rounded-2xl border border-brand-700/50 bg-secondary-600/60 p-6 backdrop-blur-sm">
                        <span class="rounded-lg bg-brand-500/20 px-3 py-1 text-xs font-semibold text-brand-300">02.
                            Professional</span>
                        <h3 class="mt-4 text-lg font-bold text-white">Academic Advisors</h3>
                        <p class="mt-1 text-xs text-brand-200">Professors, advisors, and mentors helping students excel.
                        </p>

                        <ul class="mt-6 space-y-2.5 text-xs text-brand-100">
                            <li class="flex items-center gap-2"><svg class="h-4 w-4 text-brand-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg> Use your authoritative expertise to guide seekers</li>
                            <li class="flex items-center gap-2"><svg class="h-4 w-4 text-brand-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg> Provide viable advice ensuring proper consultancy</li>
                            <li class="flex items-center gap-2"><svg class="h-4 w-4 text-brand-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg> Leverage your professional network for earnings</li>
                        </ul>
                    </div>

                    <!-- Business -->
                    <div class="rounded-2xl border border-brand-700/50 bg-secondary-600/60 p-6 backdrop-blur-sm">
                        <span class="rounded-lg bg-brand-500/20 px-3 py-1 text-xs font-semibold text-brand-300">03.
                            Business</span>
                        <h3 class="mt-4 text-lg font-bold text-white">Institutions & Agents</h3>
                        <p class="mt-1 text-xs text-brand-200">Migration firms, language schools, and corporations.</p>

                        <ul class="mt-6 space-y-2.5 text-xs text-brand-100">
                            <li class="flex items-center gap-2"><svg class="h-4 w-4 text-brand-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg> Tailor programs to fit business referral pipelines</li>
                            <li class="flex items-center gap-2"><svg class="h-4 w-4 text-brand-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg> Stay updated with dedicated account management</li>
                            <li class="flex items-center gap-2"><svg class="h-4 w-4 text-brand-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg> Turn existing customer bases into secondary revenue</li>
                        </ul>
                    </div>

                </div>
            </div>
        </section>

        {{-- Registration --}}
        <section class="mx-auto w-full max-w-7xl px-4 py-12 sm:px-6 md:py-14 lg:px-8 lg:py-18">
            <div
                class="grid grid-cols-1 overflow-hidden rounded-2xl border border-neutral-200 bg-neutral-25 shadow-theme-lg lg:grid-cols-12 reveal">
                {{--  LEFT CONTENT --}}
                <div class="bg-brand-50 p-6 md:p-10 lg:col-span-7">

                    <form class="flex flex-col gap-5">


                        {{-- Form heading --}}
                        <div class="border-b border-neutral-200 pb-4">

                            <span class="font-display text-lg font-bold uppercase tracking-tight text-brand-500">
                                Instant Access
                            </span>

                            <p class="mt-1  text-[9px] font-bold uppercase tracking-wide text-neutral-500">
                                Direct dispatch to your primary inbox
                            </p>

                        </div>


                        {{-- Full Name --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="flex flex-col gap-2">

                                <label for="first-name"
                                    class=" text-[10px] font-bold uppercase tracking-wide text-neutral-800">
                                    First Name *
                                </label>

                                <input id="first-name" type="text" required placeholder="e.g. Alex"
                                    class="h-11 w-full rounded-lg border border-neutral-300 bg-neutral-25 px-4 py-2.5  text-sm text-neutral-900 placeholder:text-neutral-400 transition-all duration-200 focus:border-brand-400 focus:bg-neutral-25 focus:outline-none focus:ring-4 focus:ring-brand-500/10" />

                            </div>
                            <div class="flex flex-col gap-2">

                                <label for="last-name"
                                    class=" text-[10px] font-bold uppercase tracking-wide text-neutral-800">
                                    Last Name *
                                </label>

                                <input id="last-name" type="text" required placeholder="e.g. Henderson"
                                    class="h-11 w-full rounded-lg border border-neutral-300 bg-neutral-25 px-4 py-2.5  text-sm text-neutral-900 placeholder:text-neutral-400 transition-all duration-200 focus:border-brand-400 focus:bg-neutral-25 focus:outline-none focus:ring-4 focus:ring-brand-500/10" />

                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            {{-- Phone --}}
                            <div class="flex flex-col gap-2">

                                <label for="phone"
                                    class=" text-[10px] font-bold uppercase tracking-wide text-neutral-800">
                                    Phone Number *
                                </label>

                                <input id="phone" type="text" required placeholder="e.g. 0412 345 678"
                                    class="h-11 w-full rounded-lg border border-neutral-300 bg-neutral-25 px-4 py-2.5  text-sm text-neutral-900 placeholder:text-neutral-400 transition-all duration-200 focus:border-brand-400 focus:bg-neutral-25 focus:outline-none focus:ring-4 focus:ring-brand-500/10" />

                            </div>

                            {{-- Email --}}
                            <div class="flex flex-col gap-2">

                                <label for="email"
                                    class=" text-[10px] font-bold uppercase tracking-wide text-neutral-800">
                                    Email Address *
                                </label>

                                <input id="email" type="email" required placeholder="name@example.com"
                                    class="h-11 w-full rounded-lg border border-neutral-300 bg-neutral-25 px-4 py-2.5  text-sm text-neutral-900 placeholder:text-neutral-400 transition-all duration-200 focus:border-brand-400 focus:bg-neutral-25 focus:outline-none focus:ring-4 focus:ring-brand-500/10" />

                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            {{-- origin --}}
                            <div class="flex flex-col gap-2">

                                <label for="area-interest"
                                    class=" text-[10px] font-bold uppercase tracking-wide text-neutral-800">
                                    Country of origin *
                                </label>

                                <select id="area-interest" required
                                    class="h-11 w-full rounded-lg border border-neutral-300 bg-neutral-25 px-4 py-2.5  text-sm text-neutral-900 transition-all duration-200 focus:border-brand-400 focus:bg-neutral-25 focus:outline-none focus:ring-4 focus:ring-brand-500/10">

                                    <option value="">
                                        Select Country...
                                    </option>

                                    <option value="trade">
                                        Bangladesh
                                    </option>

                                    <option value="health">
                                        India
                                    </option>

                                    <option value="business">
                                        Nepal
                                    </option>

                                </select>

                            </div>
                            {{-- living --}}
                            <div class="flex flex-col gap-2">

                                <label for="area-interest"
                                    class=" text-[10px] font-bold uppercase tracking-wide text-neutral-800">
                                    Currently living in *
                                </label>

                                <select id="area-interest" required
                                    class="h-11 w-full rounded-lg border border-neutral-300 bg-neutral-25 px-4 py-2.5  text-sm text-neutral-900 transition-all duration-200 focus:border-brand-400 focus:bg-neutral-25 focus:outline-none focus:ring-4 focus:ring-brand-500/10">

                                    <option value="">
                                        Select Country...
                                    </option>

                                    <option value="trade">
                                        Bangladesh
                                    </option>

                                    <option value="health">
                                        India
                                    </option>

                                    <option value="business">
                                        Nepal
                                    </option>

                                </select>

                            </div>

                        </div>


                        {{-- Visa checkbox --}}
                        <div class="flex items-start gap-2.5 pt-1">

                            <input id="referal" type="checkbox"
                                class="mt-0.5 h-4 w-4 rounded border-neutral-300 accent-brand-500" />

                            <label for="referal" class="cursor-pointer select-none text-xs leading-5 text-neutral-600">

                                Referral eligibility and rewards depend on the published conditions.

                            </label>

                        </div>


                        {{-- Submit --}}
                        <button type="submit"
                            class="mt-1 inline-flex min-h-12 w-full items-center justify-center rounded-lg bg-brand-500 px-4 py-3  text-xs font-bold uppercase tracking-wide text-neutral-25 transition-all duration-300 hover:bg-brand-600 hover:shadow-theme-lg focus:outline-none focus:ring-4 focus:ring-brand-500/20">

                            Create referral account

                            <svg class="ml-2 h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 12h14m-6-6 6 6-6 6" />
                            </svg>

                        </button>

                    </form>

                </div>
                {{-- RIGHT FORM --}}
                <div class="lg:col-span-5">
                    <img src="{{ asset('ref-2.jpg') }}" alt="">
                </div>
            </div>
        </section>
    </main>
@endsection
