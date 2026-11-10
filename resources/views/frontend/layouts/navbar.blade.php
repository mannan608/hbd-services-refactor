@php
    $destinationData = json_decode(
        file_get_contents(resource_path('data/destinations.json')),
        true
    );

    $destinations = $destinationData['destinations'] ?? [];
@endphp

     <header
         class="fixed top-0 left-0 w-full z-50 border-0 md:border-b bg-white backdrop-blur-md dark:bg-neutral-900/95">
         @include('frontend.layouts.top-bar')
         <nav class="max-w-7xl mx-auto px-5 lg:px-8">

             <div class="flex justify-between items-center h-18 md:h-20">
                 <!-- Mobile Menu Button -->
                 <button id="menuBtn" class="md:hidden">

                     <!-- Hamburger -->
                     <svg id="menuOpenIcon" class="w-7 h-7 text-neutral-600" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M4 6h16M4 12h16M4 18h16">
                         </path>
                     </svg>

                     <!-- Close -->
                     <svg id="menuCloseIcon" class="hidden w-7 h-7 text-neutral-600" fill="none"
                         stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                         </path>
                     </svg>

                 </button>
                 <!-- Logo -->
                 <div class="w-28 py-1.5">
                     <a href="/">
                         <img src="{{ asset('logo.webp') }}" alt="logo" class="w-auto h-auto">
                     </a>
                 </div>

                 <!-- Desktop Menu -->
                 <div class="hidden md:flex items-center gap-4 md:gap-6 lg:gap-8 text-sm font-medium uppercase">
                     {{-- Services --}}
                     <div class="relative group">

                         {{-- Dropdown Trigger --}}
                         <a href="{{ route('services') }}" id="servicesHoverButton"
                             class="relative inline-flex items-center gap-1.5 py-2 font-medium transition-colors duration-300
                            {{ request()->routeIs('services*') || request()->is('digital-solutions')
                                ? 'text-brand-600'
                                : 'text-neutral-700 hover:text-brand-600' }}"
                             aria-haspopup="true">

                             Services

                             <svg class="h-4 w-4 transition-transform duration-300 group-hover:rotate-180"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="1.8">
                                 <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7" />
                             </svg>

                         </a>

                         {{-- Dropdown Panel --}}
                         <div id="servicesHover"
                             class="invisible absolute left-0 top-full z-50 w-80 translate-y-3 pt-4 opacity-0 transition-all duration-300 ease-out group-hover:visible group-hover:translate-y-0 group-hover:opacity-100">

                             <div
                                 class="overflow-hidden rounded-2xl border border-slate-100 bg-white p-2 shadow-[0_20px_50px_-15px_rgba(15,23,42,0.18)]">

                                 {{-- Dropdown Header --}}
                                 <div class="mb-2 rounded-xl bg-brand-50/70 px-4 py-3">
                                     <p class="text-sm font-bold text-slate-800">
                                         Explore Our Services
                                     </p>
                                 </div>

                                 {{-- Menu Items --}}
                                 <ul class="space-y-0" aria-labelledby="servicesHoverButton">

                                     {{-- Study Abroad --}}
                                     <li>
                                         <a href="{{ route('services') }}#study-abroad"
                                             class="group/item flex items-center gap-3 rounded-xl px-3 py-3 transition-all duration-200 hover:bg-brand-50">

                                             <span
                                                 class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 transition-colors group-hover/item:bg-brand-100">
                                                 <iconify-icon icon="lucide:plane" class="text-xl"></iconify-icon>
                                             </span>

                                             <span class="min-w-0 flex-1">
                                                 <span
                                                     class="block text-sm font-semibold text-slate-700 transition-colors group-hover/item:text-brand-600">
                                                     Study Abroad
                                                 </span>
                                             </span>

                                             <iconify-icon icon="lucide:chevron-right"
                                                 class="text-base text-slate-300 transition-all group-hover/item:translate-x-1 group-hover/item:text-brand-600">
                                             </iconify-icon>

                                         </a>
                                     </li>

                                     {{-- HBD Language Academy --}}
                                     <li>
                                         <a href="https://hbdlanguageacademy.com/" target="_blank"
                                             rel="noopener noreferrer"
                                             class="group/item flex items-center gap-3 rounded-xl px-3 py-3 transition-all duration-200 hover:bg-brand-50">

                                             <span
                                                 class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 transition-colors group-hover/item:bg-brand-100">
                                                 <iconify-icon icon="lucide:languages" class="text-xl"></iconify-icon>
                                             </span>

                                             <span class="min-w-0 flex-1">
                                                 <span
                                                     class="block text-sm font-semibold text-slate-700 transition-colors group-hover/item:text-brand-600">
                                                     Language Academy
                                                 </span>
                                             </span>

                                             <iconify-icon icon="lucide:external-link" class="text-base text-slate-300">
                                             </iconify-icon>

                                         </a>
                                     </li>

                                     {{-- Digital Solutions --}}
                                     <li>
                                         <a href="{{ url('/digital-solutions') }}"
                                             class="group/item flex items-center gap-3 rounded-xl px-3 py-3 transition-all duration-200 hover:bg-brand-50">

                                             <span
                                                 class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 transition-colors group-hover/item:bg-brand-100">
                                                 <iconify-icon icon="lucide:monitor-smartphone"
                                                     class="text-xl"></iconify-icon>
                                             </span>

                                             <span class="min-w-0 flex-1">
                                                 <span
                                                     class="block text-sm font-semibold text-slate-700 transition-colors group-hover/item:text-brand-600">
                                                     Digital Solutions
                                                 </span>
                                             </span>

                                             <iconify-icon icon="lucide:chevron-right"
                                                 class="text-base text-slate-300 transition-all group-hover/item:translate-x-1 group-hover/item:text-brand-600">
                                             </iconify-icon>

                                         </a>
                                     </li>

                                 </ul>

                                 {{-- Dropdown Footer --}}
                                 <div class="mt-2 border-t border-slate-100 px-3 pt-3">
                                     <a href="{{ route('services') }}"
                                         class="flex items-center justify-between rounded-lg px-2 py-2 text-xs font-bold text-brand-600 transition-colors hover:text-brand-700">

                                         Explore All Services

                                         <iconify-icon icon="lucide:arrow-up-right" class="text-base"></iconify-icon>

                                     </a>
                                 </div>

                             </div>
                         </div>
                     </div>


                     {{-- Destinations Dropdown --}}

                     <div class="relative group">

                         {{-- Dropdown Trigger --}}
                         <a href="{{ route('destinations') }}" id="destinationsHoverButton"
                             class="relative inline-flex items-center gap-1.5 py-2 font-medium transition-colors duration-300
                            {{ request()->routeIs('destinations*') ? 'text-brand-600' : 'text-neutral-700 hover:text-brand-600' }}"
                             aria-haspopup="true">

                             Destinations

                             <svg class="h-4 w-4 transition-transform duration-300 group-hover:rotate-180"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="1.8">
                                 <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7" />
                             </svg>

                         </a>

                         {{-- Dropdown Panel --}}
                         <div id="destinationsHover"
                             class="invisible absolute left-0 top-full z-50 w-80 translate-y-3 pt-4 opacity-0 transition-all duration-300 ease-out group-hover:visible group-hover:translate-y-0 group-hover:opacity-100">

                             <div
                                 class="overflow-hidden rounded-2xl border border-slate-100 bg-white p-2 shadow-[0_20px_50px_-15px_rgba(15,23,42,0.18)]">

                                 {{-- Dropdown Header --}}
                                 <div class="mb-2 rounded-xl bg-brand-50/70 px-4 py-3">

                                     <p class="text-sm font-bold text-slate-800">
                                         Explore Top Destinations
                                     </p>

                                 </div>

                                 {{-- Menu Items --}}
                                 <ul class="space-y-0" aria-labelledby="destinationsHoverButton">

                                     @foreach ($destinations as $destination)
                                         <li>
                                             <a href="{{ route('destination.details', ['slug' => $destination['slug']]) }}"
                                                 class="group/item flex items-center gap-3 rounded-xl px-3 py-2 transition-all duration-200 hover:bg-brand-50">

                                                 <span
                                                     class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 transition-colors group-hover/item:bg-brand-100">

                                                     <img src="https://flagcdn.com/w40/{{ strtolower($destination['flagCode'] ?? $destination['code']) }}.png"
                                                         alt="{{ $destination['name'] }} flag" width="40"
                                                         height="30"
                                                         class="h-5 w-7 shrink-0 rounded-sm object-cover"
                                                         loading="lazy">

                                                 </span>

                                                 <span class="min-w-0 flex-1">

                                                     <span
                                                         class="block text-sm font-semibold text-slate-700 transition-colors group-hover/item:text-brand-600">
                                                         {{ $destination['name'] }}
                                                     </span>

                                                 </span>

                                                 <iconify-icon icon="lucide:chevron-right"
                                                     class="text-base text-slate-300 transition-all group-hover/item:translate-x-1 group-hover/item:text-brand-600"></iconify-icon>

                                             </a>
                                         </li>
                                     @endforeach

                                 </ul>

                                 {{-- Dropdown Footer --}}
                                 <div class="mt-2 border-t border-slate-100 px-3 pt-3">

                                     <a href="{{ route('destinations') }}"
                                         class="flex items-center justify-between rounded-lg px-2 py-2 text-xs font-bold text-brand-600 transition-colors hover:text-brand-700">

                                         Explore All Destinations

                                         <iconify-icon icon="lucide:arrow-up-right" class="text-base"></iconify-icon>

                                     </a>

                                 </div>

                             </div>

                         </div>

                     </div>


                     {{-- Universities --}}
                     <a href="{{ route('universities') }}"
                         class="relative font-medium transition-all duration-300
                        {{ request()->routeIs('universities') ? 'text-brand-600 font-medium after:w-full' : 'text-neutral-600 hover:text-brand-600 after:w-0 hover:after:w-full' }}
                        after:absolute after:left-0 after:-bottom-1.5
                        after:h-0.5 after:bg-brand-600 after:transition-all after:duration-300">
                         Universities
                     </a>
                     {{-- Events --}}
                     <a href="{{ route('events') }}"
                         class="relative font-medium transition-all duration-300
                        {{ request()->routeIs('events') ? 'text-brand-600 font-medium after:w-full' : 'text-neutral-600 hover:text-brand-600 after:w-0 hover:after:w-full' }}
                        after:absolute after:left-0 after:-bottom-1.5
                        after:h-0.5 after:bg-brand-600 after:transition-all after:duration-300">
                         Events
                     </a>

                     <a href="{{ route('blogs') }}"
                         class="relative font-medium transition-all duration-300
                        {{ request()->routeIs('blogs') ? 'text-brand-600 font-medium after:w-full' : 'text-neutral-600 hover:text-brand-600 after:w-0 hover:after:w-full' }}
                        after:absolute after:left-0 after:-bottom-1.5
                        after:h-0.5 after:bg-brand-600 after:transition-all after:duration-300">
                         News
                     </a>


                 </div>

                 <div class="flex items-center gap-4 lg:gap-6">

                     @auth
                         <a href="{{ auth()->user()->rolePrefix() === 'student'
                             ? route('student.dashboard')
                             : route('role.dashboard', ['role' => auth()->user()->rolePrefix()]) }}"
                             class="overflow-hidden rounded-full h-11 w-11 block">

                             <img src="{{ asset('images/user/owner.png') }}" alt="User"
                                 class="w-full h-full object-cover" />
                         </a>
                     @endauth

                     @guest
                         <!-- Right Side -->
                         <a href="{{ route('register') }}"
                             class="hidden sm:flex text-sm uppercase bg-success-600 text-white px-4 py-2 lg:px-6 lg:py-2.5 rounded-lg font-medium hover:bg-brand-600 transition">
                             Sign Up Free
                         </a>
                         <a href="{{ route('login') }}"
                             class="text-[13px] sm:text-sm font-medium uppercase text-neutral-600 hover:text-brand-600
                                max-[539px]:rounded-lg max-[539px]:bg-success-600
                                max-[539px]:px-4 max-[539px]:py-1.5 max-[539px]:text-white
                                lg:px-6 lg:py-2.5">
                             Login
                         </a>
                     @endguest
                 </div>
             </div>

         </nav>

         <!-- Mobile Menu -->
         <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-slate-200 shadow-lg">

             <div class="flex flex-col px-6 py-5 space-y-3 text-base font-medium">
                 <a href="{{ route('services') }}"
                     class="{{ request()->routeIs('services') ? 'text-neutral-600 font-medium' : 'text-neutral-600' }}">Services</a>
                 <a href="{{ route('destinations') }}"
                     class="{{ request()->routeIs('destinations') ? 'text-neutral-600 font-medium' : 'text-neutral-600' }}">Destinations</a>
                 {{-- <a href="{{ route('courses') }}" class="{{ request()->routeIs('courses') ? 'text-neutral-600 font-medium' : 'text-neutral-600' }}">Courses</a> --}}
                 <a href=""
                     class="{{ request()->routeIs('universities') ? 'text-neutral-600 font-medium' : 'text-neutral-600' }}">Universities</a>
                 <a href="{{ route('events') }}"
                     class="{{ request()->routeIs('events') ? 'text-neutral-600 font-medium' : 'text-neutral-600' }}">Events</a>

                 <a href="{{ route('blogs') }}"
                     class="{{ request()->routeIs('blogs') ? 'text-neutral-600 font-medium' : 'text-neutral-600' }}">News</a>

                 <div class="flex items-center justify-between mt-6">
                     @guest
                         <a href="{{ route('register') }}"
                             class="text-sm uppercase bg-success-600 text-white px-4 py-2 lg:px-6 lg:py-2.5 rounded-lg font-medium hover:bg-success-600 transition">
                             Sign Up Free
                         </a>
                     @endguest
                 </div>
             </div>
         </div>
     </header>
     <script>
         const menuBtn = document.getElementById('menuBtn');
         const mobileMenu = document.getElementById('mobileMenu');

         const openIcon = document.getElementById('menuOpenIcon');
         const closeIcon = document.getElementById('menuCloseIcon');

         menuBtn.addEventListener('click', () => {

             mobileMenu.classList.toggle('hidden');

             if (mobileMenu.classList.contains('hidden')) {
                 openIcon.classList.remove('hidden');
                 closeIcon.classList.add('hidden');
             } else {
                 openIcon.classList.add('hidden');
                 closeIcon.classList.remove('hidden');
             }

         });
     </script>
