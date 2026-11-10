@extends('frontend.layouts.app')

@section('title', $event->title)

@section('content')
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 sm:pt-8">
        <!-- Main Grid Content -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">
            <!-- Left Side: Overview & Features -->
            <div class="lg:col-span-2 space-y-6 sm:space-y-8">
                <div>
                    <div class="group relative w-full aspect-video overflow-hidden rounded-xl sm:rounded-2xl">
                        <img src="{{ $event->banner ? asset($event->banner) : asset('images/default-event.jpg') }}"
                            alt="{{ $event->title }}"
                            class="w-full h-full object-cover transition duration-500 group-hover:scale-105">

                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent">
                        </div>
                    </div>

                    <div class="relative mt-4 mb-6 sm:mb-8">
                        <h1
                            class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-extrabold tracking-tight mb-3 leading-tight line-clamp-2">
                            {{ $event->title }}
                        </h1>

                        <div
                            class="flex flex-col sm:flex-row sm:flex-wrap sm:items-center gap-2 sm:gap-x-4 sm:gap-y-2 text-xs sm:text-sm text-neutral-700">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-brand-500 shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span>Organized by <strong
                                        class="text-brand-500 font-medium">{{ $event->organizer }}</strong></span>
                            </div>

                            <div class="flex flex-wrap items-center gap-x-2 gap-y-1">
                                <svg class="w-4 h-4 text-brand-500 shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span
                                    class="truncate max-w-[220px] sm:max-w-xs md:max-w-sm">{{ $event->location_name }}</span>
                                <span class=" text-neutral-300">|</span>
                                <a href="{{ $event->google_map_link }}"
                                    class="text-brand-500 hover:text-brand-900 font-semibold underline">
                                    View on map
                                </a>
                                <span class=" text-neutral-300">|</span>
                                <a href="{{ $event->registration_link }}"
                                    class="text-red-500 hover:text-red-700 font-semibold underline">
                                    Click to Register
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- About Event Section -->
                <div class="bg-white p-5 sm:p-6 md:p-8 rounded-xl sm:rounded-2xl border border-neutral-200/80">
                    <h2 class="text-xs font-bold uppercase tracking-wider text-brand-500 mb-2">Event Details</h2>
                    <h3 class="text-base sm:text-lg md:text-xl font-bold text-neutral-900 mb-3 sm:mb-4">
                        {{ $event->short_description }}
                    </h3>
                    <div class="text-neutral-600 leading-relaxed text-sm prose prose-sm max-w-none">
                        {!! $event->description !!}
                    </div>
                </div>

                <!-- Dynamic Value Highlights Section -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4">
                    <div
                        class="bg-white p-5 sm:p-6 rounded-xl sm:rounded-2xl border border-neutral-200/80 flex flex-col justify-between hover:border-brand-500/50 transition">
                        <div>
                            <div
                                class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center mb-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m0 0h4m-4 0V9a2 2 0 012-2h2a2 2 0 012 2v12">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-neutral-900 text-sm sm:text-base mb-1">Meet Institutions</h4>
                            <p class="text-neutral-500 text-sm leading-relaxed line-clamp-2">
                                Interact directly with Australia’s top universities and colleges.
                            </p>
                        </div>
                    </div>

                    <div
                        class="bg-white p-5 sm:p-6 rounded-xl sm:rounded-2xl border border-neutral-200/80 flex flex-col justify-between hover:border-brand-500/50 transition">
                        <div>
                            <div
                                class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center mb-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-neutral-900 text-sm sm:text-base mb-1">Study Pathways</h4>
                            <p class="text-neutral-500 text-sm leading-relaxed line-clamp-2">
                                Discover undergraduate, postgraduate, & vocational programs tailored to you.
                            </p>
                        </div>
                    </div>

                    <div
                        class="bg-white p-5 sm:p-6 rounded-xl sm:rounded-2xl border border-neutral-200/80 flex flex-col justify-between hover:border-brand-500/50 transition">
                        <div>
                            <div
                                class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center mb-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-neutral-900 text-sm sm:text-base mb-1">1-on-1 Guidance</h4>
                            <p class="text-neutral-500 text-sm leading-relaxed line-clamp-2">
                                Speak with admission experts and receive personalized counselling.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Logistics Sidebar -->
            <div class="space-y-5 sm:space-y-6">
                <!-- Physical & Virtual Session Info Card -->
                <div
                    class="bg-white p-5 sm:p-6 rounded-xl sm:rounded-2xl border border-neutral-200/80 space-y-5 sm:space-y-6">
                    <div>
                        <div class="flex items-center justify-between border-b border-neutral-100 pb-3 mb-4">
                            <span class="text-xs sm:text-sm font-bold uppercase tracking-wider text-brand-500">Physical
                                Session</span>
                            <span
                                class="bg-success-100 text-success-600 text-[11px] sm:text-xs px-2.5 py-1 rounded-md font-medium">
                                Ongoing
                            </span>
                        </div>

                        <div class="space-y-3 text-sm">
                            <div class="flex items-center justify-between text-neutral-600">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-neutral-400 shrink-0" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    Date
                                </span>
                                <span class="font-semibold text-neutral-800">20 Aug 2026</span>
                            </div>
                            <div class="flex items-center justify-between text-neutral-600">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-neutral-400 shrink-0" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Time
                                </span>
                                <span class="font-semibold text-neutral-800 text-right">03:00 PM – 06:00 PM</span>
                            </div>
                        </div>
                    </div>

                    <!-- Registration Link Section -->
                    {{-- <div>
                        <span class="text-xs sm:text-sm font-bold uppercase tracking-wider text-red-500 block mb-3">
                            Registration Link
                        </span>
                        <div class="bg-neutral-50 border border-neutral-200 rounded-lg p-3 mb-3">
                            <p class="text-xs text-neutral-500 truncate">{{ $event->registration_link }}</p>
                        </div>

                        <div class="grid grid-cols-2 gap-2">
                            <button type="button"
                                    class="flex items-center justify-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold py-2.5 rounded-lg transition">
                                <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                                Copy Link
                            </button>
                            <button type="button"
                                    class="flex items-center justify-center gap-2 bg-brand-500 hover:bg-brand-600 text-white text-xs font-semibold py-2.5 rounded-lg shadow-brand-500/20 transition">
                                <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                                </svg>
                                Share
                            </button>
                        </div>
                    </div> --}}

                    <div x-data="{
                        registrationLink: @js($event->registration_link),
                        copied: false,
                    
                        async copyLink() {
                            try {
                                await navigator.clipboard.writeText(this.registrationLink);
                    
                                this.copied = true;
                    
                                setTimeout(() => {
                                    this.copied = false;
                                }, 2000);
                    
                            } catch (error) {
                                console.error('Copy failed:', error);
                                alert('Unable to copy the link. Please copy it manually.');
                            }
                        },
                    
                        async shareLink() {
                            const shareUrl = new URL(
                                this.registrationLink,
                                window.location.origin
                            ).href;
                    
                            const shareData = {
                                title: 'Event Registration',
                                text: 'Register for this event using the link below:',
                                url: shareUrl
                            };
                    
                            try {
                                if (navigator.share) {
                                    await navigator.share(shareData);
                                } else {
                                    const facebookUrl =
                                        `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(shareUrl)}`;
                    
                                    window.open(
                                        facebookUrl,
                                        '_blank',
                                        'width=600,height=500,noopener,noreferrer'
                                    );
                                }
                            } catch (error) {
                                if (error.name !== 'AbortError') {
                                    console.error('Share failed:', error);
                                }
                            }
                        }
                    }">
                        {{-- Registration Link --}}
                        <span class="mb-3 block text-xs font-bold uppercase tracking-wider text-red-500 sm:text-sm">
                            Registration Link
                        </span>

                        <div class="mb-3 rounded-lg border border-neutral-200 bg-neutral-50 p-3">
                            <p class="truncate text-xs text-neutral-500">
                                {{ $event->registration_link }}
                            </p>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="grid grid-cols-2 gap-2">

                            {{-- Copy Button --}}
                            <button type="button" @click="copyLink()"
                                class="flex items-center justify-center gap-2 rounded-lg bg-slate-100 py-2.5 text-xs font-semibold text-slate-700 transition hover:bg-slate-200"
                                :class="{ '!bg-green-100 !text-green-700': copied }">
                                <iconify-icon :icon="copied ? 'lucide:check' : 'lucide:copy'"
                                    class="text-sm"></iconify-icon>

                                <span x-text="copied ? 'Copied!' : 'Copy Link'"></span>
                            </button>

                            {{-- Share Button --}}
                            <button type="button" @click="shareLink()"
                                class="flex items-center justify-center gap-2 rounded-lg bg-brand-500 py-2.5 text-xs font-semibold text-white shadow-sm shadow-brand-500/20 transition hover:bg-brand-600">
                                <iconify-icon icon="lucide:share-2" class="text-sm"></iconify-icon>
                                Share
                            </button>

                        </div>
                    </div>

                </div>

                <!-- Contact Support Card -->
                <div class="bg-white p-5 sm:p-6 rounded-xl sm:rounded-2xl border border-neutral-200/80">
                    <h3 class="text-xs sm:text-sm font-bold uppercase tracking-wider text-brand-500 mb-4">
                        Contact Person Details
                    </h3>

                    <div class="space-y-4 text-sm">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-8 h-8 rounded-full bg-neutral-100 flex items-center justify-center text-neutral-500 shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-xs text-neutral-400">Name</p>
                                <p class="font-semibold text-neutral-800 truncate">{{ $event->organizer }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3">
                            <div
                                class="w-8 h-8 rounded-full bg-neutral-100 flex items-center justify-center text-neutral-500 shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-xs text-neutral-400">Email</p>
                                <a href="mailto:{{ $event->contact_email }}"
                                    class="font-medium text-brand-600 hover:underline break-all">
                                    {{ $event->contact_email }}
                                </a>
                            </div>
                        </div>

                        <div class="flex items-center gap-3">
                            <div
                                class="w-8 h-8 rounded-full bg-neutral-100 flex items-center justify-center text-neutral-500 shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-xs text-neutral-400">Phone</p>
                                <div class="flex items-center gap-1.5">
                                    <span
                                        class="relative inline-block h-3 w-4 overflow-hidden rounded-sm bg-green-600 border border-neutral-200 shrink-0">
                                        <span
                                            class="absolute left-1/2 top-1/2 h-2 w-2 -translate-x-1/2 -translate-y-1/2 rounded-full bg-red-600"></span>
                                    </span>
                                    <a href="tel:{{ $event->contact_phone }}"
                                        class="font-semibold text-neutral-800 hover:text-brand-600">
                                        {{ $event->contact_phone }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Latest Events -->
                <div class="bg-white p-5 sm:p-6 rounded-xl sm:rounded-2xl border border-neutral-200/80">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-neutral-400 mb-4">
                        Latest Events
                    </h3>

                    <div class="flex flex-col gap-3">
                        @forelse ($latestEvents as $latestEvent)
                            <a href="{{ route('event-details', $latestEvent->slug) }}"
                                class="group flex w-full gap-3 rounded-xl p-2 -m-2 transition-all duration-200 hover:bg-neutral-50">
                                {{-- Image --}}
                                <div
                                    class="w-16 h-16 sm:w-20 sm:h-16 shrink-0 overflow-hidden rounded-lg bg-neutral-100 border border-neutral-200">
                                    <img src="{{ $latestEvent->banner ? asset($latestEvent->banner) : asset('frontend/images/default-event.jpg') }}"
                                        alt="{{ $latestEvent->title }}"
                                        class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                                </div>

                                {{-- Content --}}
                                <div class="min-w-0 flex-1 flex flex-col justify-center">
                                    <h4
                                        class="text-sm font-semibold leading-5 text-neutral-800 line-clamp-2 transition-colors duration-200 group-hover:text-[#1068b2]">
                                        {{ $latestEvent->title }}
                                    </h4>
                                    <div class="flex items-center gap-1.5 mt-1.5 text-xs text-neutral-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="1.8" class="w-3.5 h-3.5 shrink-0">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3.75 9h16.5M5.25 5.25h13.5A1.5 1.5 0 0 1 20.25 6.75v12A1.5 1.5 0 0 1 18.75 20.25H5.25a1.5 1.5 0 0 1-1.5-1.5v-12a1.5 1.5 0 0 1 1.5-1.5Z" />
                                        </svg>
                                        <span>{{ \Carbon\Carbon::parse($latestEvent->event_date)->format('d M, Y') }}</span>
                                    </div>
                                </div>

                                {{-- Arrow --}}
                                <div
                                    class="self-center shrink-0 text-neutral-300 transition-all duration-200 group-hover:translate-x-0.5 group-hover:text-[#1068b2]">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.8" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                                    </svg>
                                </div>
                            </a>
                        @empty
                            <p class="text-sm text-neutral-500 py-3">
                                No upcoming events available.
                            </p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tabs Section -->
    <section x-data="{ activeTab: 'facilities' }" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 sm:pt-8 pb-10 sm:pb-12">
        <div
            class="bg-white rounded-2xl sm:rounded-3xl p-5 sm:p-6 md:p-8 border border-neutral-100 space-y-8 sm:space-y-10 mt-8 sm:mt-12">

            <!-- TAB NAVIGATION -->
            <div
                class="flex overflow-x-auto scrollbar-hide border-b border-neutral-100 gap-6 sm:gap-8 text-sm sm:text-base font-semibold">
                <button type="button" @click="activeTab = 'facilities'"
                    :class="activeTab === 'facilities'
                        ?
                        'border-brand-600 text-brand-600' :
                        'border-transparent text-neutral-500 hover:text-neutral-700'"
                    class="shrink-0 pb-3 border-b-2 transition">
                    Facilities
                </button>

                <button type="button" @click="activeTab = 'providers'"
                    :class="activeTab === 'providers'
                        ?
                        'border-brand-600 text-brand-600' :
                        'border-transparent text-neutral-500 hover:text-neutral-700'"
                    class="shrink-0 pb-3 border-b-2 transition">
                    Providers
                </button>

                <button type="button" @click="activeTab = 'gallery'"
                    :class="activeTab === 'gallery'
                        ?
                        'border-brand-600 text-brand-600' :
                        'border-transparent text-neutral-500 hover:text-neutral-700'"
                    class="shrink-0 pb-3 border-b-2 transition">
                    Gallery
                </button>

                <button type="button" @click="activeTab = 'locations'"
                    :class="activeTab === 'locations'
                        ?
                        'border-brand-600 text-brand-600' :
                        'border-transparent text-neutral-500 hover:text-neutral-700'"
                    class="shrink-0 pb-3 border-b-2 transition">
                    Locations
                </button>
            </div>

            <!-- FACILITIES TAB -->
            <div x-show="activeTab === 'facilities'" x-transition.opacity.duration.200ms x-cloak>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 items-start">
                    <!-- Description -->
                    <div class="bg-brand-900 text-white p-6 sm:p-8 rounded-xl sm:rounded-2xl space-y-4">
                        <div
                            class="w-11 h-11 sm:w-12 sm:h-12 rounded-xl bg-white/10 flex items-center justify-center text-brand-300">
                            <i class="fa-solid fa-building-columns text-lg sm:text-xl"></i>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold">Facilities</h3>
                        <p class="text-brand-100 text-sm leading-relaxed">
                            Graduates of this program are prepared for a range of exciting career paths across local
                            government and private sectors.
                            Key roles include creative directors, strategy managers, design & development managers,
                            advisors.
                        </p>
                    </div>

                    <!-- Facilities List -->
                    <div class="space-y-3">
                        <div
                            class="flex items-center p-3.5 sm:p-4 rounded-xl bg-neutral-50 border border-neutral-100 text-sm font-medium hover:bg-brand-50/50 transition">
                            <span class="flex items-center text-neutral-700">
                                <i class="fa-solid fa-check text-brand-500 mr-3 shrink-0"></i>
                                Campus audio and visual requirements studio
                            </span>
                        </div>
                        <div
                            class="flex items-center p-3.5 sm:p-4 rounded-xl bg-neutral-50 border border-neutral-100 text-sm font-medium hover:bg-brand-50/50 transition">
                            <span class="flex items-center text-neutral-700">
                                <i class="fa-solid fa-check text-brand-500 mr-3 shrink-0"></i>
                                Central cafeteria facilities
                            </span>
                        </div>
                        <div
                            class="flex items-center p-3.5 sm:p-4 rounded-xl bg-neutral-50 border border-neutral-100 text-sm font-medium hover:bg-brand-50/50 transition">
                            <span class="flex items-center text-neutral-700">
                                <i class="fa-solid fa-check text-brand-500 mr-3 shrink-0"></i>
                                Advanced mechanics research laboratory units
                            </span>
                        </div>
                        <div
                            class="flex items-center p-3.5 sm:p-4 rounded-xl bg-neutral-50 border border-neutral-100 text-sm font-medium hover:bg-brand-50/50 transition">
                            <span class="flex items-center text-neutral-700">
                                <i class="fa-solid fa-check text-brand-500 mr-3 shrink-0"></i>
                                International standard student study cubicles
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PROVIDERS TAB -->
            <div x-show="activeTab === 'providers'" x-transition.opacity.duration.200ms x-cloak>
                <div class="space-y-5 sm:space-y-6">
                    <div>
                        <h3 class="text-base sm:text-lg font-bold text-neutral-900 mb-2">
                            Providers of Accommodation
                        </h3>
                        <p class="text-sm text-neutral-600 leading-relaxed">
                            Students can book airport pickup and transfer services from international airports, regional
                            areas,
                            or other arrival points to their accommodation through their HBD Services account, with
                            convenient
                            scheduled transfers available to designated accommodation locations.
                        </p>
                    </div>

                    <div class="flex flex-wrap items-center gap-3 sm:gap-4">
                        @php
                            $providers = collect($event->providers ?? [])->filter(
                                fn($provider) => !empty($provider['logo']),
                            );
                        @endphp

                        @forelse ($providers as $provider)
                            <div
                                class="shrink-0 rounded-xl sm:rounded-2xl border border-neutral-300 px-3 py-2.5 sm:px-4 sm:py-3 transition hover:border-brand-300 hover:shadow-sm">
                                <img src="{{ asset($provider['logo']) }}" alt="{{ $provider['name'] ?? 'Provider' }}"
                                    class="h-8 sm:h-10 w-auto object-contain">
                            </div>
                        @empty
                            <div class="w-full">
                                <div
                                    class="mx-auto flex flex-col items-center justify-center rounded-2xl border border-dashed border-slate-200 bg-slate-50 p-6 sm:p-8 text-center">
                                    <div
                                        class="mb-4 flex h-14 w-14 sm:h-16 sm:w-16 items-center justify-center rounded-full bg-blue-50 text-blue-600">
                                        <svg class="h-7 w-7 sm:h-8 sm:w-8" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                        </svg>
                                    </div>
                                    <h3 class="mb-1 text-base font-bold text-slate-900">No Providers Found</h3>
                                    <p class="text-sm text-slate-500">
                                        There are currently no providers available. Please check back later.
                                    </p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- GALLERY TAB -->
            <div x-show="activeTab === 'gallery'" x-transition.opacity.duration.200ms x-cloak>
                <div class="space-y-5 sm:space-y-6">
                    <div>
                        <h3 class="text-base sm:text-lg font-bold text-neutral-900">
                            Event Gallery Images
                        </h3>
                        <p class="text-sm text-neutral-600 mt-1">
                            Adelaide University provides scholarships for both domestic and international students via the
                            Student Accommodation Center.
                        </p>
                    </div>

                    @php
                        $gallery = collect($event->gallery_images ?? [])
                            ->filter()
                            ->values();
                    @endphp

                    @include('frontend.pages.common-section.masonary-grid', [
                        'gallery_images' => $gallery,
                    ])
                </div>
            </div>

            <!-- LOCATIONS TAB -->
            <div x-show="activeTab === 'locations'" x-transition.opacity.duration.200ms x-cloak>
                <div>
                    <div class="mb-5">
                        <h2 class="text-lg sm:text-xl font-bold text-neutral-900">Event Locations</h2>
                        <p class="text-sm text-neutral-600 mt-1">
                            Explore the available event locations and view them on the map.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="w-full">
                            <div
                                class="group relative overflow-hidden rounded-xl sm:rounded-2xl border border-slate-200 bg-white transition-all duration-300 hover:-translate-y-1 hover:border-blue-200 hover:shadow-xl">
                                <div class="p-4 sm:p-5">
                                    <!-- Header -->
                                    <div class="flex items-start justify-between gap-3">
                                        <div class="flex items-center gap-3 min-w-0">
                                            <div
                                                class="flex h-10 w-10 sm:h-11 sm:w-11 shrink-0 items-center justify-center rounded-full bg-blue-50 text-[#1068b2]">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                    stroke-width="1.8" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 21s7-5.2 7-11a7 7 0 10-14 0c0 5.8 7 11 7 11z" />
                                                    <circle cx="12" cy="10" r="2.5" />
                                                </svg>
                                            </div>
                                            <div class="min-w-0">
                                                <h3 class="text-sm sm:text-base font-bold text-slate-900 truncate">
                                                    {{ $event->location_name }}
                                                </h3>
                                                <p class="mt-0.5 text-xs font-medium text-slate-500 line-clamp-1">
                                                    {{ $event->address }}
                                                </p>
                                            </div>
                                        </div>

                                        <span
                                            class="shrink-0 rounded-full bg-emerald-50 px-2.5 py-1 text-[10px] font-semibold text-emerald-700">
                                            Bangladesh
                                        </span>
                                    </div>

                                    <div class="my-4 sm:my-5 border-t border-slate-100"></div>

                                    <div class="flex items-center gap-2 text-xs text-slate-500">
                                        <svg class="h-4 w-4 text-slate-400 shrink-0" fill="none" stroke="currentColor"
                                            stroke-width="1.8" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 2v20M2 12h20" />
                                        </svg>
                                        <span>Explore this location on map</span>
                                    </div>

                                    <a href="{{ $event->google_map_link }}"
                                        class="mt-4 flex w-full items-center justify-center gap-2 rounded-xl bg-[#1068b2] px-4 py-2.5 sm:py-3 text-sm font-semibold text-white shadow-blue-200 transition-all duration-200 hover:bg-[#0d5795] hover:shadow-md">
                                        View on map
                                        <svg class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-1"
                                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M5 12h14m-6-6 6 6-6 6" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
