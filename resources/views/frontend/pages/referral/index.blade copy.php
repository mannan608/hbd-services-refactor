
@extends('frontend.layouts.app')

@section('content')
<!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-secondary-500 via-brand-900 to-brand-950 py-16 text-white sm:py-24 lg:py-28">
        <!-- Background Accent Grid -->
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#ffffff0a_1px,transparent_1px),linear-gradient(to_bottom,#ffffff0a_1px,transparent_1px)] bg-[size:24px_24px]"></div>
        
        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-12">
                
                <!-- Left Column -->
                <div class="space-y-6 lg:col-span-7">
                    <span class="inline-flex items-center gap-2 rounded-full bg-brand-400/10 px-3.5 py-1 text-xs font-semibold text-brand-300 ring-1 ring-inset ring-brand-300/30">
                        <span class="h-1.5 w-1.5 rounded-full bg-brand-400"></span>
                        Australia's #1 Education Referral Platform
                    </span>

                    <h1 class="text-3xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl leading-tight">
                        Refer your friend and get <span class="bg-gradient-to-r from-brand-300 to-brand-100 bg-clip-text text-transparent">rewarded!</span>
                    </h1>

                    <p class="max-w-xl text-sm leading-relaxed text-brand-100/90 sm:text-base">
                        Empower international students on their study abroad journey. Expand your network, gain industry recognition, and earn cash rewards for every successful referral.
                    </p>

                    <div class="flex flex-wrap items-center gap-4 pt-2">
                        <a href="#register" class="inline-flex items-center justify-center rounded-xl bg-brand-500 px-6 py-3 text-sm font-semibold text-white shadow-lg transition hover:bg-brand-600 active:scale-95">
                            Join Our Referral Program
                        </a>
                        <a href="#how-it-works" class="inline-flex items-center justify-center rounded-xl border border-brand-300/30 bg-white/5 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/10 backdrop-blur-sm">
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
                    <div class="relative mx-auto w-full max-w-md rounded-3xl border border-brand-300/20 bg-brand-900/40 p-3 backdrop-blur-xl shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=800&q=80" alt="Students celebrating" class="h-80 w-full rounded-2xl object-cover" />
                        
                        <!-- Floating Glass Badge -->
                        <div class="absolute -bottom-6 -left-6 rounded-2xl border border-white/10 bg-secondary-500/90 p-4 shadow-xl backdrop-blur-md">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-500 text-white">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
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

    <!-- Benefits Section -->
    <section class="py-16 sm:py-24 bg-white dark:bg-brand-950">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-12">
                
                <!-- Image -->
                <div class="order-2 lg:order-1 lg:col-span-5">
                    <div class="relative rounded-3xl border border-brand-100 bg-brand-50 p-2 shadow-sm dark:border-brand-900 dark:bg-brand-900/30">
                        <img src="https://images.unsplash.com/photo-1556742049-0a670f4a4591?auto=format&fit=crop&w=800&q=80" alt="Consultancy Hands" class="h-96 w-full rounded-2xl object-cover" />
                    </div>
                </div>

                <!-- Benefits List -->
                <div class="order-1 space-y-6 lg:order-2 lg:col-span-7">
                    <div>
                        <h2 class="text-2xl font-bold tracking-tight text-secondary-500 sm:text-3xl dark:text-white">Benefits of becoming a referee</h2>
                        <p class="mt-2 text-sm text-slate-600 dark:text-brand-200">Unlock unmatched professional and financial advantages by expanding your network.</p>
                    </div>

                    <div class="space-y-3">
                        <template x-for="(benefit, index) in [
                            'Refer a friend, get rewarded instantly with complete payout transparency.',
                            'Expand your professional network by engaging directly with industry experts.',
                            'Enhance your reputation as a trusted advisor in educational migration.',
                            'Boost your resume and highlight your leadership & network achievements.',
                            'Discover deep insights into Australia\'s 3rd largest export industry.'
                        ]" :key="index">
                            <div class="flex items-start gap-3.5 rounded-2xl border border-brand-100 bg-brand-25/50 p-4 shadow-sm transition hover:border-brand-300 dark:border-brand-900 dark:bg-brand-900/20">
                                <div class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-brand-500 text-white">
                                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                </div>
                                <span class="text-xs sm:text-sm font-medium text-slate-700 dark:text-brand-100" x-text="benefit"></span>
                            </div>
                        </template>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="bg-brand-50/60 py-16 dark:bg-brand-900/30 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-2xl font-bold tracking-tight text-secondary-500 sm:text-3xl dark:text-white">How our referral program works</h2>
                <p class="mt-2 text-sm text-slate-600 dark:text-brand-200">Three simple steps to start earning rewards with StudyNet.</p>
            </div>

            <div class="mt-12 grid grid-cols-1 gap-8 md:grid-cols-3">
                <!-- Step 1 -->
                <div class="relative rounded-2xl border border-brand-100 bg-white p-6 shadow-sm transition hover:shadow-md dark:border-brand-900 dark:bg-brand-900">
                    <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-brand-500 text-lg font-extrabold text-white shadow-sm">01</div>
                    <h3 class="text-base font-bold text-secondary-500 dark:text-white">Sign up for referral program</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600 dark:text-brand-200">Join Australia's #1 referral platform for international education, offering an effortlessly transparent journey from start to finish.</p>
                </div>

                <!-- Step 2 -->
                <div class="relative rounded-2xl border border-brand-100 bg-white p-6 shadow-sm transition hover:shadow-md dark:border-brand-900 dark:bg-brand-900">
                    <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-brand-500 text-lg font-extrabold text-white shadow-sm">02</div>
                    <h3 class="text-base font-bold text-secondary-500 dark:text-white">Promote Our Services</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600 dark:text-brand-200">Stay ahead of the game by staying informed. Discover industry updates and life-changing programs that could redefine your future.</p>
                </div>

                <!-- Step 3 -->
                <div class="relative rounded-2xl border border-brand-100 bg-white p-6 shadow-sm transition hover:shadow-md dark:border-brand-900 dark:bg-brand-900">
                    <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-brand-500 text-lg font-extrabold text-white shadow-sm">03</div>
                    <h3 class="text-base font-bold text-secondary-500 dark:text-white">Get Paid Seamlessly</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600 dark:text-brand-200">Take full charge of your rewards with complete control at your fingertips. Get payouts directly into your preferred account.</p>
                </div>
            </div>

        </div>
    </section>

    <!-- Types of Referral Program Section -->
    <section class="bg-secondary-500 py-16 text-white sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-2xl font-bold tracking-tight sm:text-3xl">Types of referral programs</h2>
                <p class="mt-2 text-sm text-brand-200">Tailored categories designed to fit individual advocates, professionals, and organizations.</p>
            </div>

            <div class="mt-12 grid grid-cols-1 gap-6 lg:grid-cols-3">
                
                <!-- Individual -->
                <div class="rounded-2xl border border-brand-700/50 bg-secondary-600/60 p-6 backdrop-blur-sm">
                    <span class="rounded-lg bg-brand-500/20 px-3 py-1 text-xs font-semibold text-brand-300">01. Individual</span>
                    <h3 class="mt-4 text-lg font-bold text-white">Students & Alumni</h3>
                    <p class="mt-1 text-xs text-brand-200">Students referring their friends or peers to our programs.</p>

                    <ul class="mt-6 space-y-2.5 text-xs text-brand-100">
                        <li class="flex items-center gap-2"><svg class="h-4 w-4 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Become more trusted with shared experiences</li>
                        <li class="flex items-center gap-2"><svg class="h-4 w-4 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Receive cash benefits to supplement your income</li>
                        <li class="flex items-center gap-2"><svg class="h-4 w-4 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Build a network effect within student communities</li>
                    </ul>
                </div>

                <!-- Professional -->
                <div class="rounded-2xl border border-brand-700/50 bg-secondary-600/60 p-6 backdrop-blur-sm">
                    <span class="rounded-lg bg-brand-500/20 px-3 py-1 text-xs font-semibold text-brand-300">02. Professional</span>
                    <h3 class="mt-4 text-lg font-bold text-white">Academic Advisors</h3>
                    <p class="mt-1 text-xs text-brand-200">Professors, advisors, and mentors helping students excel.</p>

                    <ul class="mt-6 space-y-2.5 text-xs text-brand-100">
                        <li class="flex items-center gap-2"><svg class="h-4 w-4 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Use your authoritative expertise to guide seekers</li>
                        <li class="flex items-center gap-2"><svg class="h-4 w-4 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Provide viable advice ensuring proper consultancy</li>
                        <li class="flex items-center gap-2"><svg class="h-4 w-4 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Leverage your professional network for earnings</li>
                    </ul>
                </div>

                <!-- Business -->
                <div class="rounded-2xl border border-brand-700/50 bg-secondary-600/60 p-6 backdrop-blur-sm">
                    <span class="rounded-lg bg-brand-500/20 px-3 py-1 text-xs font-semibold text-brand-300">03. Business</span>
                    <h3 class="mt-4 text-lg font-bold text-white">Institutions & Agents</h3>
                    <p class="mt-1 text-xs text-brand-200">Migration firms, language schools, and corporations.</p>

                    <ul class="mt-6 space-y-2.5 text-xs text-brand-100">
                        <li class="flex items-center gap-2"><svg class="h-4 w-4 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Tailor programs to fit business referral pipelines</li>
                        <li class="flex items-center gap-2"><svg class="h-4 w-4 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Stay updated with dedicated account management</li>
                        <li class="flex items-center gap-2"><svg class="h-4 w-4 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Turn existing customer bases into secondary revenue</li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <!-- Registration Form Section -->
    <section id="register" class="py-16 sm:py-24 bg-white dark:bg-brand-950">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-12">
                
                <!-- Registration Form -->
                <div x-data="{
                    firstName: '',
                    lastName: '',
                    phone: '',
                    countryOrigin: '',
                    livingCountry: '',
                    email: '',
                    password: '',
                    confirmPassword: '',
                    referralType: '',
                    submitForm() {
                        alert('Registration successful! Welcome to StudyNet.');
                    }
                }" class="lg:col-span-7 rounded-3xl border border-brand-100 bg-white p-6 sm:p-8 shadow-sm dark:border-brand-900 dark:bg-brand-900">
                    
                    <div>
                        <h2 class="text-xl font-bold tracking-tight text-secondary-500 sm:text-2xl dark:text-white">Fill-up the form to become a Referee</h2>
                        <p class="mt-1 text-xs text-slate-500 dark:text-brand-200">Enter your details below to create your StudyNet referral dashboard account.</p>
                    </div>

                    <form @submit.prevent="submitForm()" class="mt-6 space-y-4">
                        
                        <!-- Name Row -->
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-wider text-secondary-500 dark:text-brand-200">First Name *</label>
                                <input x-model="firstName" required type="text" placeholder="First name" class="mt-1 w-full rounded-xl border border-brand-200 bg-brand-25/50 px-3.5 py-2 text-xs font-medium text-slate-800 transition focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500/20 dark:border-brand-800 dark:bg-brand-950 dark:text-slate-100" />
                            </div>
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-wider text-secondary-500 dark:text-brand-200">Last Name *</label>
                                <input x-model="lastName" required type="text" placeholder="Last name" class="mt-1 w-full rounded-xl border border-brand-200 bg-brand-25/50 px-3.5 py-2 text-xs font-medium text-slate-800 transition focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500/20 dark:border-brand-800 dark:bg-brand-950 dark:text-slate-100" />
                            </div>
                        </div>

                        <!-- Phone & Country -->
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-wider text-secondary-500 dark:text-brand-200">Phone *</label>
                                <input x-model="phone" required type="tel" placeholder="Enter phone" class="mt-1 w-full rounded-xl border border-brand-200 bg-brand-25/50 px-3.5 py-2 text-xs font-medium text-slate-800 transition focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500/20 dark:border-brand-800 dark:bg-brand-950 dark:text-slate-100" />
                            </div>
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-wider text-secondary-500 dark:text-brand-200">Country of Origin *</label>
                                <select x-model="countryOrigin" required class="mt-1 w-full cursor-pointer rounded-xl border border-brand-200 bg-brand-25/50 px-3.5 py-2 text-xs font-medium text-slate-800 transition focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500/20 dark:border-brand-800 dark:bg-brand-950 dark:text-slate-100">
                                    <option value="">Select a country</option>
                                    <option value="AU">Australia</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="IN">India</option>
                                    <option value="NP">Nepal</option>
                                </select>
                            </div>
                        </div>

                        <!-- Living Location -->
                        <div>
                            <label class="block text-[11px] font-semibold uppercase tracking-wider text-secondary-500 dark:text-brand-200">Currently Living In *</label>
                            <select x-model="livingCountry" required class="mt-1 w-full cursor-pointer rounded-xl border border-brand-200 bg-brand-25/50 px-3.5 py-2 text-xs font-medium text-slate-800 transition focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500/20 dark:border-brand-800 dark:bg-brand-950 dark:text-slate-100">
                                <option value="">Select a country</option>
                                <option value="AU">Australia</option>
                                <option value="BD">Bangladesh</option>
                                <option value="IN">India</option>
                                <option value="NP">Nepal</option>
                            </select>
                        </div>

                        <!-- Email Address -->
                        <div>
                            <label class="block text-[11px] font-semibold uppercase tracking-wider text-secondary-500 dark:text-brand-200">Email Address *</label>
                            <input x-model="email" required type="email" placeholder="Enter email" class="mt-1 w-full rounded-xl border border-brand-200 bg-brand-25/50 px-3.5 py-2 text-xs font-medium text-slate-800 transition focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500/20 dark:border-brand-800 dark:bg-brand-950 dark:text-slate-100" />
                        </div>

                        <!-- Password Row -->
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-wider text-secondary-500 dark:text-brand-200">Password *</label>
                                <input x-model="password" required type="password" placeholder="Password" class="mt-1 w-full rounded-xl border border-brand-200 bg-brand-25/50 px-3.5 py-2 text-xs font-medium text-slate-800 transition focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500/20 dark:border-brand-800 dark:bg-brand-950 dark:text-slate-100" />
                            </div>
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-wider text-secondary-500 dark:text-brand-200">Confirm Password *</label>
                                <input x-model="confirmPassword" required type="password" placeholder="Confirm password" class="mt-1 w-full rounded-xl border border-brand-200 bg-brand-25/50 px-3.5 py-2 text-xs font-medium text-slate-800 transition focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500/20 dark:border-brand-800 dark:bg-brand-950 dark:text-slate-100" />
                            </div>
                        </div>

                        <!-- Referral Type -->
                        <div>
                            <label class="block text-[11px] font-semibold uppercase tracking-wider text-secondary-500 dark:text-brand-200">Referral Type *</label>
                            <select x-model="referralType" required class="mt-1 w-full cursor-pointer rounded-xl border border-brand-200 bg-brand-25/50 px-3.5 py-2 text-xs font-medium text-slate-800 transition focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500/20 dark:border-brand-800 dark:bg-brand-950 dark:text-slate-100">
                                <option value="">Select a type</option>
                                <option value="individual">Individual (Student/Alumni)</option>
                                <option value="professional">Professional (Advisor/Professor)</option>
                                <option value="business">Business (Institution/Agent)</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-2">
                            <button type="submit" class="w-full rounded-xl bg-brand-500 py-3 text-xs font-bold text-white shadow-md transition hover:bg-brand-600 active:scale-95">
                                Register to Start
                            </button>
                        </div>

                    </form>
                </div>

                <!-- Right Side Image -->
                <div class="lg:col-span-5">
                    <div class="relative rounded-3xl border border-brand-100 bg-brand-50 p-2 shadow-sm dark:border-brand-900 dark:bg-brand-900">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=800&q=80" alt="Students together" class="h-[520px] w-full rounded-2xl object-cover" />
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection