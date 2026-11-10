@extends('frontend.layouts.app')

@section('content')
    <section class="py-10 md:py-16 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-5 md:px-8">

            {{-- Header --}}
            <div class="text-center mb-10 md:mb-14">
                <span
                    class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-brand-50 text-brand-700 text-sm font-medium mb-4">
                    <span class="w-2 h-2 rounded-full bg-brand-600 animate-pulse"></span>
                    Limited Seats Available
                </span>
                <h1 class="text-3xl md:text-5xl font-bold text-slate-900 tracking-tight">
                    Register for the Event
                </h1>
                <p class="mt-4 text-slate-500 text-base md:text-lg max-w-2xl mx-auto">
                    Fill in your details below and we'll reserve your seat. It only takes a minute.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8 items-start">

                {{-- Left: Event Summary Card --}}
                {{-- Left: Event Summary --}}
                <div
                    class="overflow-hidden rounded-3xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900">

                    {{-- Banner --}}
                    <div class="relative aspect-[16/8] overflow-hidden">
                        <img src="{{ $event->banner ? asset($event->banner) : asset('frontend-img/event-placeholder.jpg') }}"
                            alt="{{ $event->title }}" class="h-full w-full object-cover">

                        {{-- Gradient --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/20 to-transparent"></div>

                        {{-- Event Type --}}
                        <div class="absolute left-5 top-5 sm:left-6 sm:top-6">
                            <span
                                class="inline-flex items-center rounded-full bg-white/95 px-3 py-1.5 text-xs font-semibold uppercase tracking-wide text-brand-700 shadow-sm backdrop-blur">
                                {{ ucfirst($event->event_type ?? 'Event') }}
                            </span>
                        </div>
                    </div>


                    {{-- Event Details --}}
                    <div class="p-5 sm:p-6 lg:p-7">

                        {{-- Main Event Meta --}}
                        <div
                            class="grid grid-cols-1 divide-y divide-neutral-200 sm:grid-cols-2 sm:divide-x sm:divide-y-0 dark:divide-neutral-800">

                            {{-- Date --}}
                            <div class="flex items-center gap-4 pb-5 sm:pb-0 sm:pr-6">
                                <div
                                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 dark:bg-brand-900/20 dark:text-brand-400">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>

                                <div class="min-w-0">
                                    <p class="text-xs font-medium uppercase tracking-wider text-neutral-400">
                                        Date
                                    </p>

                                    <p class="mt-1 text-sm font-semibold text-neutral-800 dark:text-white">
                                        {{ $event->start_datetime
                                            ? \Illuminate\Support\Carbon::parse($event->start_datetime)->format('D, M j, Y')
                                            : 'To be announced' }}
                                    </p>
                                </div>
                            </div>


                            {{-- Time --}}
                            <div class="flex items-center gap-4 pt-5 sm:pt-0 sm:pl-6">
                                <div
                                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 dark:bg-brand-900/20 dark:text-brand-400">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>

                                <div class="min-w-0">
                                    <p class="text-xs font-medium uppercase tracking-wider text-neutral-400">
                                        Time
                                    </p>

                                    <p class="mt-1 text-sm font-semibold text-neutral-800 dark:text-white">
                                        {{ $event->start_datetime ? \Illuminate\Support\Carbon::parse($event->start_datetime)->format('g:i A') : 'TBA' }}
                                    </p>
                                </div>
                            </div>

                        </div>


                        {{-- Location --}}
                        <div class="mt-6 flex items-start gap-4 border-t border-neutral-200 pt-6 dark:border-neutral-800">

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-neutral-100 text-neutral-600 dark:bg-neutral-800 dark:text-neutral-300">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>

                            <div class="min-w-0">
                                <p class="text-xs font-medium uppercase tracking-wider text-neutral-400">
                                    Location
                                </p>

                                @if ($event->is_online)
                                    <p class="mt-1 text-sm font-semibold text-neutral-800 dark:text-white">
                                        Online Event
                                    </p>
                                @else
                                    <p class="mt-1 text-sm font-semibold text-neutral-800 dark:text-white">
                                        {{ $event->location_name ?? 'Venue TBA' }}
                                    </p>

                                    @if ($event->address && $event->address !== $event->location_name)
                                        <p class="mt-0.5 text-sm text-neutral-500 dark:text-neutral-400">
                                            {{ $event->address }}
                                        </p>
                                    @endif
                                @endif
                            </div>

                        </div>


                        {{-- Online Meeting --}}
                        @if ($event->is_online && $event->meeting_link)
                            <div
                                class="mt-5 flex items-center justify-between gap-4 rounded-xl border border-brand-100 bg-brand-50 p-4 dark:border-brand-900/30 dark:bg-brand-900/10">

                                <div class="flex min-w-0 items-center gap-3">
                                    <div
                                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-white text-brand-600 shadow-sm dark:bg-neutral-900 dark:text-brand-400">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 19h8a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>

                                    <div class="min-w-0">
                                        <p class="text-xs font-medium text-brand-600 dark:text-brand-400">
                                            Online Event
                                        </p>

                                        <p class="truncate text-sm font-medium text-neutral-700 dark:text-neutral-300">
                                            Meeting link available
                                        </p>
                                    </div>
                                </div>

                                <a href="{{ $event->meeting_link }}" target="_blank" rel="noopener noreferrer"
                                    class="shrink-0 rounded-lg bg-brand-600 px-3.5 py-2 text-xs font-semibold text-white transition hover:bg-brand-700">
                                    Join Meeting
                                </a>

                            </div>
                        @endif

                        {{-- Registration Deadline --}}
                        @if ($event->registration_deadline)
                            <div
                                class="mt-5 flex items-center gap-3 rounded-2xl border border-amber-200 bg-amber-50 px-4 py-3 dark:border-amber-900/50 dark:bg-amber-900/10">

                                <svg class="h-5 w-5 shrink-0 text-amber-500" fill="none" stroke="currentColor"
                                    stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v2m0 4h.01M5.07 19h13.86a2 2 0 001.73-3L13.73 4a2 2 0 00-3.46 0L3.34 16a2 2 0 001.73 3z" />
                                </svg>

                                <div>
                                    <p class="text-xs font-medium text-amber-600 dark:text-amber-400">
                                        Registration Deadline
                                    </p>

                                    <p class="text-sm font-semibold text-amber-800 dark:text-amber-300">
                                        {{ \Illuminate\Support\Carbon::parse($event->registration_deadline)->format('F j, Y · g:i A') }}
                                    </p>
                                </div>
                            </div>
                        @endif


                        {{-- Trust Badges --}}
                        <div
                            class="mt-6 flex flex-wrap items-center gap-x-5 gap-y-3 border-t border-neutral-100 pt-5 text-xs text-neutral-500 dark:border-neutral-800 dark:text-neutral-400">

                            <div class="flex items-center gap-2">
                                <svg class="h-4 w-4 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                Free Entry
                            </div>

                            <div class="flex items-center gap-2">
                                <svg class="h-4 w-4 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Secure Registration
                            </div>

                        </div>

                    </div>
                </div>

                {{-- Right: Registration Form --}}
                <div class="">
                    <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/60 border border-slate-100 p-6 md:p-10">

                        {{-- Flash success --}}
                        @if (session('success'))
                            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 -translate-y-2"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 -translate-y-2"
                                class="mb-6 flex items-start gap-3 rounded-2xl border border-green-200 bg-green-50 p-4">
                                <svg class="mt-0.5 h-5 w-5 flex-shrink-0 text-green-600" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>

                                <p class="text-sm text-green-800">
                                    {{ session('success') }}
                                </p>
                            </div>
                        @endif

                        {{-- Validation error summary --}}
                        @if ($errors->any())
                            <div class="mb-6 rounded-2xl bg-red-50 border border-red-200 p-4">
                                <p class="text-sm font-semibold text-red-800 mb-1">Please fix the following:</p>
                                <ul class="list-disc list-inside text-sm text-red-700 space-y-0.5">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('events.register.store', $event) }}" method="POST" class="space-y-4">
                            @csrf

                            {{-- Full Name --}}
                            <div>
                                <label for="full_name" class="block text-sm font-semibold text-slate-700 mb-2">
                                    Full Name <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="full_name" name="full_name"
                                        value="{{ old('full_name') }}" placeholder="e.g. John Doe" required
                                        class="w-full pl-12 pr-4 py-2.5 rounded-xl border @error('full_name') border-red-400 bg-red-50/50 @else border-slate-200 @enderror text-slate-900 placeholder-slate-400 placeholder:text-sm focus:outline-none focus:ring-4 focus:ring-brand-500/10 focus:border-brand-500 transition-all duration-200">
                                </div>
                                @error('full_name')
                                    <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div>
                                <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">
                                    Email Address <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                                        placeholder="you@example.com" required
                                        class="w-full pl-12 pr-4 py-2.5 rounded-xl border @error('email') border-red-400 bg-red-50/50 @else border-slate-200 @enderror text-slate-900 placeholder-slate-400 placeholder:text-sm focus:outline-none focus:ring-4 focus:ring-brand-500/10 focus:border-brand-500 transition-all duration-200">
                                </div>
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Phone & WhatsApp side by side --}}
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                     <label for="phone" class="block text-sm font-semibold text-slate-700 mb-2">
                                    Phone Number <span class="text-red-500">*</span>
                                </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor"
                                                stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                        </div>
                                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                            placeholder="+880 1XXX-XXXXXX"
                                            class="w-full pl-12 pr-4 py-2.5 rounded-xl border @error('phone') border-red-400 bg-red-50/50 @else border-slate-200 @enderror text-slate-900 placeholder-slate-400 placeholder:text-sm focus:outline-none focus:ring-4 focus:ring-brand-500/10 focus:border-brand-500 transition-all duration-200">
                                    </div>
                                    @error('phone')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="whatsapp" class="block text-sm font-semibold text-slate-700 mb-2">
                                        WhatsApp
                                        <span class="font-normal text-slate-400 text-xs">(optional)</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                            </svg>
                                        </div>
                                        <input type="tel" id="whatsapp" name="whatsapp"
                                            value="{{ old('whatsapp') }}" placeholder="+880 1XXX-XXXXXX"
                                            class="w-full pl-12 pr-4 py-2.5 rounded-xl border @error('whatsapp') border-red-400 bg-red-50/50 @else border-slate-200 @enderror text-slate-900 placeholder-slate-400 placeholder:text-sm focus:outline-none focus:ring-4 focus:ring-brand-500/10 focus:border-brand-500 transition-all duration-200">
                                    </div>
                                    @error('whatsapp')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>                          

                            <div>
                                <x-form.multi-select name="destination[]" label="Interested Destination" :options="[
                                    'Australia' => 'Australia',
                                    'United Kingdom' => 'United Kingdom',
                                    'Canada' => 'Canada',
                                    'United States' => 'United States',
                                    'New Zealand' => 'New Zealand',
                                    'Malaysia' => 'Malaysia',
                                    
                                ]"
                                    :selected="old('destination', [])" />
                            </div>

                            {{-- Message --}}
                            <div>
                                <label for="message" class="block text-sm font-semibold text-slate-700 mb-2">
                                    Message
                                    <span class="font-normal text-slate-400 text-xs">(optional)</span>
                                </label>
                                <textarea id="message" name="message" rows="4"
                                    placeholder="Anything you'd like us to know before the event..."
                                    class="w-full px-4 py-2.5 rounded-xl border @error('message') border-red-400 bg-red-50/50 @else border-slate-200 @enderror text-slate-900 placeholder-slate-400 placeholder:text-sm focus:outline-none focus:ring-4 focus:ring-brand-500/10 focus:border-brand-500 transition-all duration-200 resize-none">{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Submit --}}
                            <div class="pt-2">
                                <button type="submit"
                                    class="group relative w-full flex items-center justify-center gap-2 overflow-hidden rounded-xl bg-gradient-to-r from-brand-600 to-brand-600 px-6 py-4 text-white font-semibold shadow-lg shadow-brand-600/25 hover:shadow-xl hover:shadow-brand-600/30 hover:-translate-y-0.5 active:translate-y-0 focus:outline-none focus:ring-4 focus:ring-brand-500/30 transition-all duration-200">
                                    <span
                                        class="absolute inset-0 bg-gradient-to-r from-brand-600 to-brand-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                                    <svg class="relative w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                    </svg>
                                    <span class="relative">Reserve Your Seat — It's Free</span>
                                </button>

                                <p
                                    class="mt-4 text-center text-xs text-slate-400 flex items-center justify-center gap-1.5">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Your information is safe and will never be shared.
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
