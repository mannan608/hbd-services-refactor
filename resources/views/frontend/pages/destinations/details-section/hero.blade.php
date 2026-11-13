    {{-- HERO SECTION --}}
      @php
    // Fallback data mapping to match your JSON structure cleanly
    $heroTitle = $destination['hero']['title'] ?? 'Study, Work & Thrive in';
    $heroDesc = $destination['hero']['description'] ?? '';
    $heroFeatures = $destination['hero']['features'] ?? [];
    $destName = $destination['name'] ?? '';
    $destCode = $destination['code'] ?? '';
    $destImage = $destination['image'] ?? 'frontend-img/destinations/default.webp';
@endphp

<header  class="relative isolate overflow-hidden bg-brand-950 text-white pt-8 pb-16 lg:pt-12 lg:pb-24">

    {{-- Background Ambient Layers & Glows --}}
    <div class="absolute inset-0 -z-10 overflow-hidden pointer-events-none">
        <img src="{{ asset($destImage) }}" alt="{{ $destName }}" 
             class="h-full w-full object-cover opacity-15 scale-105 blur-[2px] transition-transform duration-1000"
             onerror="this.style.display='none'">
        <div class="absolute inset-0 bg-gradient-to-r from-brand-950 via-brand-950/95 to-brand-900/85"></div>
        <div class="absolute -right-32 -top-32 h-[450px] w-[450px] rounded-full bg-brand-500/15 blur-[120px]"></div>
        <div class="absolute -bottom-32 -left-32 h-[450px] w-[450px] rounded-full bg-secondary-500/10 blur-[120px]"></div>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-12 lg:gap-8 xl:gap-12">

            {{-- Left Column: Headline, Summary, Features & CTAs --}}
            <div class="lg:col-span-7 space-y-6" data-reveal>
                
                {{-- Status Badge --}}
                <div class="inline-flex items-center gap-2.5 rounded-full border border-brand-400/30 bg-brand-500/15 px-4 py-1.5 text-xs font-semibold uppercase tracking-wider text-brand-200 backdrop-blur-md shadow-inner">
                    <span class="flex h-2 w-2 rounded-full bg-brand-400 animate-pulse"></span>
                    <iconify-icon icon="lucide:graduation-cap" class="text-base text-brand-300"></iconify-icon>
                    <span>Study &amp; Live in {{ $destCode }}</span>
                </div>

                {{-- Main Heading --}}
                <h1 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl lg:text-5xl xl:text-[3.25rem] leading-[1.15]">
                    {{ $heroTitle }}
                    <span class="bg-gradient-to-r from-secondary-400 via-brand-300 to-white bg-clip-text text-transparent">
                        {{ $destName }}
                    </span>
                </h1>

                {{-- Description --}}
                <p class="max-w-2xl text-base font-normal leading-relaxed text-brand-100/80 sm:text-lg">
                    {{ $heroDesc }}
                </p>

                {{-- Dynamic Feature Pills Grid --}}
                {{-- @if(!empty($heroFeatures))
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                        @foreach($heroFeatures as $feature)
                            <div class="flex items-center gap-3 rounded-xl border border-white/10 bg-white/5 px-3.5 py-2.5 backdrop-blur-sm transition-all duration-300 hover:border-brand-400/40 hover:bg-white/10">
                                <div class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-secondary-500/20 text-secondary-400">
                                    <iconify-icon icon="lucide:check" class="text-sm"></iconify-icon>
                                </div>
                                <span class="text-xs sm:text-sm font-medium text-slate-200">
                                    {{ $feature['value'] ?? $feature }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                @endif --}}

                {{-- Action Buttons --}}
                <div class="flex flex-col gap-3 pt-4 sm:flex-row sm:items-center sm:gap-4">
                    {{-- Primary CTA - Triggers Modal --}}
                    <button type="button" @click="consultationModal = true"
                        class="inline-flex w-full sm:w-auto items-center justify-center gap-2.5 rounded-xl bg-brand-500 px-7 py-3.5 text-sm font-semibold text-white shadow-xl shadow-brand-500/25 transition-all duration-300 hover:-translate-y-0.5 hover:bg-brand-600 hover:shadow-brand-500/40 active:scale-95">
                        <span>Get Free Consultation</span>
                        <iconify-icon icon="lucide:arrow-right" class="text-lg"></iconify-icon>
                    </button>

                    {{-- Secondary CTA --}}
                    <a href="#universities"
                        class="inline-flex w-full sm:w-auto items-center justify-center gap-2.5 rounded-xl border border-white/20 bg-white/10 px-7 py-3.5 text-sm font-semibold text-white backdrop-blur-md transition-all duration-300 hover:border-white/40 hover:bg-white/15 active:scale-95">
                        <span>Explore Universities</span>
                        <iconify-icon icon="lucide:graduation-cap" class="text-lg text-brand-300"></iconify-icon>
                    </a>
                </div>

            </div>

            {{-- Right Column: Premium Bento Visual Stack --}}
            <div class="lg:col-span-5 relative" data-reveal style="--reveal-delay: 150ms">
                <div class="relative mx-auto max-w-md lg:max-w-none">
                    
                    {{-- Decorative Backdrop Glow --}}
                    <div class="absolute -inset-2 rounded-3xl bg-gradient-to-tr from-brand-500/30 via-secondary-500/20 to-transparent blur-2xl opacity-75 pointer-events-none"></div>

                    {{-- Main Image Card --}}
                    <div class="group relative overflow-hidden rounded-3xl border border-white/20 bg-brand-900/50 p-2.5 shadow-2xl backdrop-blur-md transition-all duration-500 hover:border-brand-400/50">
                        <div class="relative overflow-hidden rounded-2xl aspect-square">
                            <img src="{{ asset($destImage) }}" alt="{{ $destName }}"
                                class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105">
                            
                            {{-- Gradient Overlay --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-brand-950/90 via-brand-950/30 to-transparent"></div>

                            {{-- Floating Glass Feature Pill inside image --}}
                            <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between rounded-xl border border-white/20 bg-brand-950/80 p-3.5 shadow-xl backdrop-blur-md">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-brand-500 text-white shadow-md">
                                        <iconify-icon icon="lucide:globe-2" class="text-xl"></iconify-icon>
                                    </div>
                                    <div>
                                        <p class="text-xs font-bold text-white uppercase tracking-wider">Top Study Destination</p>
                                        <p class="text-[11px] text-brand-200">World-class education framework</p>
                                    </div>
                                </div>
                                <span class="rounded-full bg-secondary-500/20 px-2.5 py-1 text-[10px] font-bold text-secondary-300 uppercase tracking-widest border border-secondary-500/30">
                                    Verified
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Floating Mini Badge (Top Right) --}}
                    <div class="absolute -right-4 -top-4 hidden sm:flex items-center gap-3 rounded-2xl border border-white/20 bg-brand-900/90 px-4 py-3 shadow-2xl backdrop-blur-xl animate-bounce-subtle z-20">
                        <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-white text-brand-950 font-extrabold shadow-md">
                            <iconify-icon icon="lucide:award" class="text-lg"></iconify-icon>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-white">Global Recognition</p>
                            <p class="text-[10px] text-brand-200">100% Accredited Pathways</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</header>