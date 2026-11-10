@props([
    'destination' => [],
])

@php
    $destName = $destination['name'];

    $levels = $destination['studyLevels'] ?? [];
@endphp

<section id="study-levels" data-section class="relative overflow-hidden bg-brand-25 py-16 sm:py-20 lg:py-24">
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <x-destination-section-heading
            eyebrow="ACADEMIC LEVELS & PATHWAYS"
            :title="'Study Levels in <span class=\'text-brand-500\'>' . $destName . '</span>'"
            description="Explore flexible degree structures, standard course durations, and recognized academic qualifications matching your stage of education."
        />

        {{-- Academic Pathway Timeline --}}
        <div class="relative mt-12">
            {{-- Connecting line for md+ screens --}}
            <div class="absolute bottom-10 left-6 top-10 hidden w-px bg-brand-200 md:block"></div>

            <div class="space-y-6">
                @foreach ($levels as $level)
                    <article class="group relative grid gap-5 md:grid-cols-[48px_1fr] md:gap-7"
                             data-reveal style="--reveal-delay: {{ $loop->index * 80 }}ms">
                        {{-- Timeline indicator --}}
                        <div class="relative z-10 hidden md:flex md:justify-center">
                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-500 text-sm font-bold text-white shadow-sm transition-transform duration-300 group-hover:scale-105">
                                {{ $level['number'] }}
                            </div>
                        </div>

                        {{-- Card container --}}
                        <div class="overflow-hidden rounded-2xl border border-brand-100 bg-white shadow-[0_1px_2px_rgba(16,24,40,0.04)] transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-theme-md">
                            <div class="grid md:grid-cols-[1fr_260px]">
                                {{-- Left: details --}}
                                <div class="p-6 sm:p-8">
                                    <div class="flex items-start gap-4">
                                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl border border-brand-100 bg-brand-50 text-brand-600">
                                            <iconify-icon icon="{{ $level['icon'] }}" class="text-2xl"></iconify-icon>
                                        </div>

                                        <div class="min-w-0 flex-1">
                                            <span class="text-xs font-bold tracking-widest text-brand-600 md:hidden">
                                                LEVEL {{ $level['number'] }}
                                            </span>
                                            <h3 class="mt-1 text-xl font-bold text-black sm:text-2xl">
                                                {{ $level['title'] }}
                                            </h3>
                                            <p class="mt-0.5 text-sm font-semibold text-brand-600">
                                                {{ $level['subtitle'] }}
                                            </p>
                                        </div>
                                    </div>

                                    <p class="mt-5 text-sm sm:text-base leading-7 text-black/60">
                                        {{ $level['description'] }}
                                    </p>

                                    {{-- Qualifications badges --}}
                                    <div class="mt-6 border-t border-brand-100 pt-5">
                                        <p class="mb-3 text-[11px] font-semibold uppercase tracking-wider text-black/50">
                                            Available Qualifications
                                        </p>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach ($level['qualifications'] as $qualification)
                                                <span class="rounded-lg border border-brand-100 bg-brand-50 px-3 py-1.5 text-xs font-medium text-brand-700">
                                                    {{ $qualification }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                {{-- Right: duration panel --}}
                                <div class="flex flex-col justify-center border-t border-brand-100 bg-brand-50/70 p-6 md:border-l md:border-t-0 md:p-8">
                                    <span class="text-[11px] font-semibold uppercase tracking-wider text-black/50">
                                        TYPICAL DURATION
                                    </span>
                                    <p class="mt-2 text-lg md:text-xl font-bold text-black">
                                        {{ $level['duration'] }}
                                    </p>
                                    <div class="mt-4 h-1 w-10 rounded-full bg-brand-500"></div>
                                    <p class="mt-3 text-xs leading-5 text-black/60">
                                        Durations vary by university, academic stream, and optional placement year.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
