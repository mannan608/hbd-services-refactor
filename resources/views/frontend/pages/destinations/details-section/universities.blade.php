@props([
    'destination' => [],
])

@php
    $destName = $destination['code'];
    $universities = $destination['universities'] ?? [];
@endphp


<section id="universities" data-section class="relative overflow-hidden bg-white py-16 sm:py-20 lg:py-24">
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="mb-12 flex flex-col justify-between gap-6 lg:flex-row lg:items-end">
            <x-destination-section-heading eyebrow="PARTNER INSTITUTIONS" :title="'Leading Universities in <span class=\'text-brand-500\'>' . $destName . '</span>'"
                description="Explore premier institutions renowned for academic standards, cutting-edge facilities, and excellent international student support." />

            {{-- <a href="{{ route('universities') }}"
               class="inline-flex shrink-0 items-center gap-2 self-start rounded-xl border border-brand-200 bg-white px-5 py-3 text-sm font-semibold text-brand-700 shadow-sm transition-all duration-300 hover:border-brand-300 hover:bg-brand-50 lg:self-auto">
                <span>View All Universities</span>
                <iconify-icon icon="lucide:arrow-up-right" class="text-base"></iconify-icon>
            </a> --}}
        </div>

        {{-- Universities Grid --}}
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($universities as $university)
                <article
                    class="group flex h-full flex-col overflow-hidden rounded-2xl border border-brand-100 bg-white shadow-[0_1px_2px_rgba(16,24,40,0.04)] transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-theme-md"
                    data-reveal style="--reveal-delay: {{ ($loop->index % 3) * 80 }}ms">
                    {{-- Card Top Area --}}
                    <div class="relative flex items-center justify-between border-b border-brand-100 bg-brand-25 p-6">
                        <div class="flex items-center gap-3">

                            <div
                                class="group flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl border border-brand-100 bg-white p-2.5 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                                <img src="{{ $university['logo'] }}" alt="{{ $university['name'] }} logo"
                                    class="h-full w-full object-contain transition-transform duration-300 group-hover:scale-105"
                                    loading="lazy">
                            </div>
                            <div class="flex flex-wrap gap-2">
                                 @if (!empty($university['ranking']))
                                     <div>
                                    <span
                                        class="rounded-lg border border-brand-100 bg-white px-2.5 py-1 text-[11px] font-semibold text-brand-700">
                                        {{ $university['ranking'] }}
                                    </span>
                                </div>
                                @endif

                               
                                @if (!empty($university['badge']))
                                    <span
                                        class="rounded-full bg-success-50 px-2.5 py-1 text-[10px] font-bold tracking-wider text-success-500">
                                        {{ $university['badge'] }}
                                    </span>
                                @endif
                            </div>

                        </div>


                    </div>

                    {{-- Card Information --}}
                    <div class="flex flex-1 flex-col p-6">
                        <div class="flex items-center gap-2 text-xs font-medium text-black/50">
                            <iconify-icon icon="lucide:map-pin" class="text-sm text-brand-500"></iconify-icon>
                            <span>{{ $university['city'] }}</span>
                        </div>

                        <h3 class="mt-2.5 text-lg font-bold text-black transition-colors group-hover:text-brand-600">
                            {{ $university['name'] }}
                        </h3>

                        <p class="mt-1 text-xs font-medium text-brand-600">
                            {{ $university['type'] }}
                        </p>

                        <p class="mt-3 flex-1 text-sm leading-6 text-black/60">
                            {{ $university['description'] }}
                        </p>

                        {{-- Footer link --}}
                        <div class="mt-6 border-t border-brand-100 pt-4">
                            <a href="#"
                                class="inline-flex w-full items-center justify-between text-xs font-semibold text-brand-600 transition group-hover:text-brand-700">
                                <span>Check Eligibility</span>
                                <span
                                    class="flex h-8 w-8 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 text-brand-600 transition group-hover:bg-brand-500 group-hover:border-brand-500 group-hover:text-white">
                                    <iconify-icon icon="lucide:arrow-right" class="text-sm"></iconify-icon>
                                </span>
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
