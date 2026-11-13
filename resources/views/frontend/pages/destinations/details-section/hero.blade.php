{{-- HERO SECTION --}}
@php
    $heroTitle = $destination['hero']['title'] ?? 'Study, Work & Thrive in';
    $heroDesc = $destination['hero']['description'] ?? '';
    $heroFeatures = $destination['hero']['features'] ?? [];
    $destName = $destination['name'] ?? '';
    $destCode = $destination['code'] ?? '';
    $destImage = $destination['image'] ?? 'frontend-img/destinations/destination-default.jfif';
@endphp

<header x-data="{ consultationModal: {{ $errors->any() ? 'true' : 'false' }} }"
    @keydown.escape.window="consultationModal = false"
    class="relative isolate overflow-hidden bg-brand-950 text-white pt-10 pb-16 lg:pt-14 lg:pb-24">

    {{-- Background Ambient Layers & Glows --}}
    <div class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">
        <img src="{{ asset($destImage) }}" alt="{{ $destName }}"
            class="h-full w-full object-cover opacity-10 scale-105 blur-[2px]"
            onerror="this.style.display='none'">
        <div class="absolute inset-0 bg-gradient-to-br from-brand-950 via-secondary-500/95 to-brand-900/90"></div>
        <div class="absolute -right-28 -top-28 h-[420px] w-[420px] rounded-full bg-accent-two-500/15 blur-[120px]"></div>
        <div class="absolute -bottom-32 -left-24 h-[420px] w-[420px] rounded-full bg-brand-500/20 blur-[120px]"></div>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-12 lg:gap-10 xl:gap-14">

            {{-- Left Column: Highlighted Content, Features & CTAs --}}
            <div class="lg:col-span-7 space-y-6" data-reveal>

                {{-- Top Eyebrow Badge --}}
                <div class="inline-flex items-center gap-2.5 rounded-full border border-accent-two-400/30 bg-secondary-500/80 px-4 py-1.5 text-xs font-semibold uppercase tracking-widest text-accent-two-200 shadow-sm backdrop-blur-md">
                    <span class="h-2 w-2 rounded-full bg-accent-one-400 animate-pulse"></span>
                    <iconify-icon icon="lucide:graduation-cap" class="text-base text-accent-two-300"></iconify-icon>
                    <span>Study &amp; Live in {{ $destCode }}</span>
                </div>

                {{-- Main Heading with High-Contrast Highlight --}}
                <h1 class="text-3xl font-extrabold leading-[1.15] tracking-tight text-white sm:text-4xl lg:text-5xl xl:text-[3.25rem]">
                    {{ $heroTitle }}
                    @if($destName)
                        <span class="relative inline-block text-red-500">
                            {{ $destName }}
                            <span class="absolute -bottom-1.5 left-0 h-1 w-full rounded-full bg-gradient-to-r from-red-400 to-brand-400"></span>
                        </span>
                    @endif
                </h1>

                {{-- Highlighted Description Callout --}}
                @if($heroDesc)
                    <p class="max-w-2xl  text-sm font-normal leading-relaxed text-brand-50/95 sm:text-base">
                        {{ $heroDesc }}
                    </p>
                @endif

                {{-- Highlighted Feature Cards Grid --}}
                {{-- @if(!empty($heroFeatures))
                    <div class="grid grid-cols-1 gap-3 pt-1 sm:grid-cols-2">
                        @foreach($heroFeatures as $feature)
                            <div class="group flex items-center gap-3.5 rounded-xl border border-brand-400/25 bg-secondary-500/75 px-4 py-3 shadow-md backdrop-blur-md transition-all duration-300 hover:border-accent-two-400/60 hover:bg-brand-900/90">
                                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-accent-one-500/20 text-accent-one-400 ring-1 ring-inset ring-accent-one-400/30 transition-transform duration-300 group-hover:scale-105">
                                    <iconify-icon icon="lucide:check" class="text-base"></iconify-icon>
                                </div>
                                <span class="text-xs font-semibold leading-snug text-white sm:text-sm">
                                    {{ $feature['value'] ?? $feature }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                @endif --}}

                {{-- Action Buttons --}}
                <div class="flex flex-col gap-3.5 pt-3 sm:flex-row sm:items-center sm:gap-4">
                    {{-- Primary CTA --}}
                    <button type="button" @click="consultationModal = true"
                        class="inline-flex w-full cursor-pointer items-center justify-center gap-2.5 rounded-xl bg-brand-500 px-7 py-3.5 text-sm font-semibold text-white shadow-lg shadow-brand-500/30 ring-1 ring-inset ring-brand-400/40 transition-all duration-300 hover:-translate-y-0.5 hover:bg-brand-600 hover:shadow-brand-500/45 active:scale-95 sm:w-auto">
                        <span>Get Free Consultation</span>
                        <iconify-icon icon="lucide:arrow-right" class="text-lg"></iconify-icon>
                    </button>

                    {{-- Secondary CTA --}}
                    <a href="#universities"
                        class="inline-flex w-full items-center justify-center gap-2.5 rounded-xl border border-brand-300/30 bg-secondary-500/70 px-7 py-3.5 text-sm font-semibold text-brand-50 backdrop-blur-md transition-all duration-300 hover:border-accent-two-300/60 hover:bg-brand-800/80 hover:text-white active:scale-95 sm:w-auto">
                        <span>Explore Universities</span>
                        <iconify-icon icon="lucide:graduation-cap" class="text-lg text-accent-two-300"></iconify-icon>
                    </a>
                </div>
            </div>

            {{-- Right Column: Visual Card Stack --}}
            <div class="relative lg:col-span-5" data-reveal style="--reveal-delay: 150ms">
                <div class="relative mx-auto max-w-md lg:max-w-none">

                    {{-- Backdrop Glow --}}
                    <div class="pointer-events-none absolute -inset-2.5 rounded-3xl bg-gradient-to-tr from-brand-500/35 via-accent-two-500/20 to-accent-one-500/15 blur-2xl"></div>

                    {{-- Main Image Frame --}}
                    <div class="group relative overflow-hidden rounded-3xl border border-brand-300/25 bg-secondary-500/60 p-2.5 shadow-2xl backdrop-blur-md transition-all duration-500 hover:border-accent-two-400/50">
                        <div class="relative aspect-square overflow-hidden rounded-2xl">
                            <img src="{{ asset($destImage) }}" alt="{{ $destName }}"
                                class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105">

                            {{-- Bottom Gradient Overlay --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-brand-950/95 via-brand-950/25 to-transparent"></div>

                            {{-- Floating Bottom Glass Pill --}}
                            <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between gap-3 rounded-xl border border-brand-300/25 bg-brand-950/85 p-3.5 shadow-xl backdrop-blur-md">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-brand-500 text-white shadow-md">
                                        <iconify-icon icon="lucide:globe-2" class="text-xl"></iconify-icon>
                                    </div>
                                    <div>
                                        <p class="text-xs font-bold uppercase tracking-wider text-white">Top Study Destination</p>
                                        <p class="text-[11px] text-brand-200">World-class education framework</p>
                                    </div>
                                </div>
                                <span class="shrink-0 rounded-full border border-accent-one-400/40 bg-accent-one-500/20 px-2.5 py-1 text-[10px] font-bold uppercase tracking-widest text-accent-one-300">
                                    Verified
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Floating Top-Right Badge --}}
                    <div class="animate-bounce-subtle absolute -right-3 -top-3 z-20 hidden items-center gap-3 rounded-2xl border border-brand-300/30 bg-secondary-500/95 px-4 py-3 shadow-2xl backdrop-blur-xl sm:flex">
                        <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-accent-one-500 text-white shadow-md">
                            <iconify-icon icon="lucide:award" class="text-lg"></iconify-icon>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-white">Global Recognition</p>
                            <p class="text-[10px] text-accent-two-200">100% Accredited Pathways</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</header>