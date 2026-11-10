@extends('frontend.layouts.app')
@section('title', "Achieve")

@section('content')
<!-- Main Container -->
  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-20">

    <!-- HERO SECTION: Explore, Compare, Apply -->
    <section class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
      <div class="lg:col-span-6 space-y-6">
        <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-brand-50 text-brand-600 text-xs font-semibold tracking-wide uppercase">
          <i data-lucide="sparkles" class="w-4 h-4"></i> Get Started Today
        </span>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight uppercase">
          Explore, Compare <span class="text-brand-500">& Apply</span>
        </h1>
        <p class="text-lg text-slate-600 max-w-xl leading-relaxed">
          Explore thousands of study options from world-leading education providers. Compare courses, discover, compare, and accept offers from top universities all in one place.
        </p>
        <div class="pt-2">
          <a href="#" class="inline-flex items-center justify-center px-8 py-4 bg-brand-500 hover:bg-brand-600 text-white font-medium rounded-xl shadow-lg shadow-brand-500/25 transition-all duration-200 transform hover:-translate-y-0.5">
            Create Free Profile
            <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i>
          </a>
        </div>
      </div>
      <div class="lg:col-span-6">
        <div class="relative rounded-3xl overflow-hidden shadow-2xl group">
          <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1200&q=80" alt="Students walking on campus" class="w-full h-[420px] object-cover object-center transform group-hover:scale-105 transition-transform duration-500" />
          <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent"></div>
        </div>
      </div>
    </section>

    <!-- SECTION 2: Study Smarter + Feature Grid -->
    <section class="grid grid-cols-1 lg:grid-cols-12 gap-8">
      <!-- Left Banner -->
      <div class="lg:col-span-5 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 rounded-3xl p-8 sm:p-10 text-white flex flex-col justify-between shadow-xl relative overflow-hidden">
        <div class="absolute -right-12 -bottom-12 w-64 h-64 bg-brand-500/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="space-y-4 relative z-10">
          <span class="text-brand-400 text-xs font-bold uppercase tracking-wider">Smarter Choice</span>
          <h2 class="text-3xl font-bold leading-tight">Study Smarter, Not Harder.</h2>
          <p class="text-slate-300 text-sm leading-relaxed">
            We simplify your degree search with intelligence and precision. Find degree and study options tailored to your needs and requirements seamlessly.
          </p>
        </div>
        <div class="pt-8 relative z-10">
          <a href="#" class="inline-flex items-center px-6 py-3 bg-brand-500 hover:bg-brand-600 text-white text-sm font-semibold rounded-xl transition">
            Find Your Match Now
          </a>
        </div>
      </div>

      <!-- Right Feature Cards -->
      <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-4">
        <!-- Card 1 -->
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition group">
          <div class="w-10 h-10 rounded-xl bg-neutral-100 text-neutral-500 flex items-center justify-center mb-3 group-hover:bg-brand-500 group-hover:text-white transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
          </div>
          <h3 class="font-bold text-slate-900 text-base mb-1">Tailored Search</h3>
          <p class="text-xs text-slate-500 leading-relaxed">Discover study choices customized based on your preferences, grades, and goals.</p>
        </div>
        <!-- Card 2 -->
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition group">
          <div class="w-10 h-10 rounded-xl bg-neutral-100 text-neutral-500 flex items-center justify-center mb-3 group-hover:bg-brand-500 group-hover:text-white transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
          </div>
          <h3 class="font-bold text-slate-900 text-base mb-1">Transparent Insights</h3>
          <p class="text-xs text-slate-500 leading-relaxed">Get complete, upfront details on requirements, tuition fees, and admission paths.</p>
        </div>
        <!-- Card 3 -->
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition group">
          <div class="w-10 h-10 rounded-xl bg-neutral-100 text-neutral-500 flex items-center justify-center mb-3 group-hover:bg-brand-500 group-hover:text-white transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 010 4m-6 8a2 2 0 100-4m0 4a2 2 0 010-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 010-4m0 4v2m0-6V4"/></svg>
          </div>
          <h3 class="font-bold text-slate-900 text-base mb-1">Smart Filters</h3>
          <p class="text-xs text-slate-500 leading-relaxed">Narrow down course options effortlessly with interactive location and course filters.</p>
        </div>
        <!-- Card 4 -->
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition group">
          <div class="w-10 h-10 rounded-xl bg-neutral-100 text-neutral-500 flex items-center justify-center mb-3 group-hover:bg-brand-500 group-hover:text-white transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
          </div>
          <h3 class="font-bold text-slate-900 text-base mb-1">One Click To Connect</h3>
          <p class="text-xs text-slate-500 leading-relaxed">Reach out directly to university advisors and application experts with ease.</p>
        </div>
      </div>
    </section>

    <!-- SECTION 3: Banner - Course Matching Made Easy -->
    <section class="relative rounded-3xl overflow-hidden shadow-xl bg-slate-900">
      <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=1600&q=80" alt="Student looking outward" class="absolute inset-0 w-full h-full object-cover opacity-30 Mix-blend-overlay" />
      <div class="relative z-10 p-8 sm:p-12 lg:p-16 max-w-2xl space-y-6">
        <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
          Course Matching Made Easy
        </h2>
        <ul class="space-y-3 text-slate-200">
          <li class="flex items-center gap-3">
             <div class="w-7 h-7 rounded-full bg-brand-500 text-white flex items-center justify-center flex-shrink-0">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
            </div>
            <span class="text-sm sm:text-base">Find the best courses tailored to your score</span>
          </li>
          <li class="flex items-center gap-3">
            <div class="w-7 h-7 rounded-full bg-brand-500 text-white flex items-center justify-center flex-shrink-0">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
            </div>
            <span class="text-sm sm:text-base">Discover the dream institution that fits your budget</span>
          </li>
          <li class="flex items-center gap-3">
           <div class="w-7 h-7 rounded-full bg-brand-500 text-white flex items-center justify-center flex-shrink-0">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
            </div>
            <span class="text-sm sm:text-base">Compare options side-by-side with confidence</span>
          </li>
        </ul>
      </div>
    </section>

    <!-- SECTION 4: Why Study In Australia + Benefits Grid -->
    <section class="grid grid-cols-1 lg:grid-cols-12 gap-8">
      <!-- Left Content -->
      <div class="lg:col-span-5 bg-white p-8 sm:p-10 rounded-3xl border border-slate-100 shadow-sm flex flex-col justify-between">
        <div class="space-y-4">
          <span class="text-brand-500 text-xs font-bold uppercase tracking-wider">Destination Guide</span>
          <h2 class="text-3xl font-extrabold text-slate-900">Why Study in Australia?</h2>
          <p class="text-slate-600 text-sm leading-relaxed">
            Australia is home to premier academic institutions, vibrant culturally diverse cities, and exceptional career opportunities that attract hundreds of thousands of international students every year.
          </p>
        </div>
        <div class="pt-8">
          <a href="#" class="inline-flex items-center px-6 py-3 bg-slate-900 hover:bg-slate-800 text-white text-sm font-semibold rounded-xl transition">
            Find Your Course Now
          </a>
        </div>
      </div>

      <!-- Right Grid -->
      <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-4">
        <!-- Benefit 1 -->
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition group">
           <div class="w-10 h-10 rounded-xl bg-neutral-100 text-neutral-500 flex items-center justify-center mb-3 group-hover:bg-brand-500 group-hover:text-white transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
          </div>
          <h3 class="font-bold text-slate-900 text-sm mb-1">World-Class Education</h3>
          <p class="text-xs text-slate-500 leading-relaxed">Home to top-ranked global universities and world-renowned academic excellence.</p>
        </div>
        <!-- Benefit 2 -->
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition group">
          <div class="w-10 h-10 rounded-xl bg-neutral-100 text-neutral-500 flex items-center justify-center mb-3 group-hover:bg-brand-500 group-hover:text-white transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
          </div>
          <h3 class="font-bold text-slate-900 text-sm mb-1">Globally Recognized Degrees</h3>
          <p class="text-xs text-slate-500 leading-relaxed">Qualifications valued by employers and institutions worldwide.</p>
        </div>
        <!-- Benefit 3 -->
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition group">
          <div class="w-10 h-10 rounded-xl bg-neutral-100 text-neutral-500 flex items-center justify-center mb-3 group-hover:bg-brand-500 group-hover:text-white transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
          </div>
          <h3 class="font-bold text-slate-900 text-sm mb-1">Government Scholarships</h3>
          <p class="text-xs text-slate-500 leading-relaxed">Generous funding and scholarship support available for eligible international students.</p>
        </div>
        <!-- Benefit 4 -->
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition group">
          <div class="w-10 h-10 rounded-xl bg-neutral-100 text-neutral-500 flex items-center justify-center mb-3 group-hover:bg-brand-500 group-hover:text-white transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
          </div>
          <h3 class="font-bold text-slate-900 text-sm mb-1">High Employability</h3>
          <p class="text-xs text-slate-500 leading-relaxed">Gain post-study work rights and practical, real-world career experience.</p>
        </div>
      </div>
    </section>

    <!-- SECTION 5: Process / How It Works (Dark Background Container) -->
    <section class="bg-slate-900 rounded-3xl p-8 sm:p-12 text-white shadow-2xl relative overflow-hidden">
      <!-- Background Glow -->
      <div class="absolute top-0 right-0 w-96 h-96 bg-brand-500/10 rounded-full blur-3xl pointer-events-none"></div>

      <!-- Top Row -->
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center mb-12">
        <div class="lg:col-span-5 rounded-2xl overflow-hidden shadow-lg">
          <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=800&q=80" alt="Student matching process" class="w-full h-64 object-cover" />
        </div>
        <div class="lg:col-span-7 space-y-4">
          <span class="text-brand-400 text-xs font-bold uppercase tracking-wider">How It Works</span>
          <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Your Matching Made Simple</h2>
          <p class="text-slate-300 text-sm leading-relaxed max-w-xl">
            Explore thousands of study options across Australia. Step by step, discover courses and connect with education experts to start your global journey.
          </p>
          <div>
            <a href="#" class="inline-flex items-center px-6 py-3 bg-brand-500 hover:bg-brand-600 text-white text-sm font-semibold rounded-xl transition">
              Create Free Profile
            </a>
          </div>
        </div>
      </div>

      <!-- 4 Steps Process Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Step 1 -->
        <div class="bg-slate-800/80 border border-slate-700/50 p-6 rounded-2xl hover:border-brand-500/50 transition">
          <span class="text-3xl font-black text-brand-400 mb-2 block">1</span>
          <h3 class="font-bold text-white text-base mb-2">Build Your Profile</h3>
          <p class="text-xs text-slate-400 leading-relaxed">Tell us your academic background and preferences. We’ll match you with the best choices.</p>
        </div>
        <!-- Step 2 -->
        <div class="bg-slate-800/80 border border-slate-700/50 p-6 rounded-2xl hover:border-brand-500/50 transition">
          <span class="text-3xl font-black text-brand-400 mb-2 block">2</span>
          <h3 class="font-bold text-white text-base mb-2">Explore Your Matches</h3>
          <p class="text-xs text-slate-400 leading-relaxed">Get personalized course recommendations. Compare tuition, entry criteria, and campus locations.</p>
        </div>
        <!-- Step 3 -->
        <div class="bg-slate-800/80 border border-slate-700/50 p-6 rounded-2xl hover:border-brand-500/50 transition">
          <span class="text-3xl font-black text-brand-400 mb-2 block">3</span>
          <h3 class="font-bold text-white text-base mb-2">Talk to an Expert</h3>
          <p class="text-xs text-slate-400 leading-relaxed">Receive free 1-on-1 guidance from our experienced counselors for personalized help.</p>
        </div>
        <!-- Step 4 -->
        <div class="bg-slate-800/80 border border-slate-700/50 p-6 rounded-2xl hover:border-brand-500/50 transition">
          <span class="text-3xl font-black text-brand-400 mb-2 block">4</span>
          <h3 class="font-bold text-white text-base mb-2">Apply & Prepare</h3>
          <p class="text-xs text-slate-400 leading-relaxed">Fast-track document verification, submit applications, and get visa support step-by-step.</p>
        </div>
      </div>
    </section>

    <!-- SECTION 6: Bottom Trust Bar / Footer Features -->
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
      <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-start space-x-4">
         <div class="w-10 h-10 rounded-xl bg-brand-500/10 text-brand-400 flex items-center justify-center flex-shrink-0 border border-brand-500/20">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
        </div>
        <div>
          <h4 class="font-bold text-slate-900 text-sm">Personalised Matches</h4>
          <p class="text-xs text-slate-500 mt-1">Recommendations tailored to your goals.</p>
        </div>
      </div>

      <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-start space-x-4">
        <div class="w-10 h-10 rounded-xl bg-brand-500/10 text-brand-400 flex items-center justify-center flex-shrink-0 border border-brand-500/20">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
        </div>
        <div>
          <h4 class="font-bold text-slate-900 text-sm">Verified Institutions</h4>
          <p class="text-xs text-slate-500 mt-1">100% accredited study programs.</p>
        </div>
      </div>

      <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-start space-x-4">
        <div class="w-10 h-10 rounded-xl bg-brand-500/10 text-brand-400 flex items-center justify-center flex-shrink-0 border border-brand-500/20">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <div>
          <h4 class="font-bold text-slate-900 text-sm">Real-Time Support</h4>
          <p class="text-xs text-slate-500 mt-1">Fast answers at every step of your application.</p>
        </div>
      </div>

      <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-start space-x-4">
        <div class="w-10 h-10 rounded-xl bg-brand-500/10 text-brand-400 flex items-center justify-center flex-shrink-0 border border-brand-500/20">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
        </div>
        <div>
          <h4 class="font-bold text-slate-900 text-sm">Visa & Pre-Departure</h4>
          <p class="text-xs text-slate-500 mt-1">End-to-end guidance for a smooth journey.</p>
        </div>
      </div>
    </section>
  </main>
  @include('frontend.pages.common-section.help-center')
  @include('frontend.pages.common-section.testimonial')
      @include('frontend.pages.common-section.university-partners')
     @include('frontend.pages.common-section.cta-section')
@endsection
