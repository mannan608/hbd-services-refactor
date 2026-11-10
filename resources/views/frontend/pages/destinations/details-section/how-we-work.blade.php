
@props([
    'destination' => [],
])

@php
    $process = $destination['admissionProcess'] ?? [];

    $steps = $process['steps'] ?? [];
    $cta = $process['cta'] ?? [];
    $buttons = $cta['buttons'] ?? [];

    $destName = $destination['name'] ?? 'your destination';
@endphp

@if (!empty($process) && !empty($steps))

<section
    id="process"
    data-section
    class="relative overflow-hidden bg-brand-25 py-16 sm:py-20 lg:py-24"
>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- Section Header --}}
        <x-destination-section-heading
            align="center"
            :eyebrow="$process['eyebrow'] ?? 'ADMISSION PROCESS'"
            :title="'How We Guide You to <span class=\'text-brand-500\'>Success</span>'"
            :description="$process['description'] ?? ''"
        />

        {{-- Dynamic Step Cards --}}
        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

            @foreach ($steps as $step)

                <article
                    class="group relative flex h-full flex-col rounded-2xl border border-brand-100 bg-white p-6 shadow-[0_1px_2px_rgba(16,24,40,0.04)] transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-theme-md sm:p-7"
                    data-reveal
                    style="--reveal-delay: {{ ($loop->index % 3) * 80 }}ms"
                >

                    {{-- Icon & Step Number --}}
                    <div class="flex items-center justify-between">

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl border border-brand-100 bg-brand-50 text-brand-600 transition-colors group-hover:bg-brand-500 group-hover:text-white">

                            <iconify-icon
                                icon="{{ $step['icon'] ?? 'lucide:check-circle' }}"
                                class="text-2xl"
                            ></iconify-icon>

                        </div>

                        <span class="text-3xl font-extrabold text-brand-100 transition-colors group-hover:text-brand-200">
                            {{ $step['step'] ?? str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                        </span>

                    </div>

                    {{-- Step Content --}}
                    <h3 class="mt-6 text-lg font-bold text-black transition-colors group-hover:text-brand-600">
                        {{ $step['title'] ?? '' }}
                    </h3>

                    @if (!empty($step['description']))
                        <p class="mt-2.5 flex-1 text-sm leading-6 text-black/60">
                            {{ $step['description'] }}
                        </p>
                    @endif

                    {{-- Dynamic Checklist --}}
                    @if (!empty($step['checklist']))
                        <ul class="mt-6 space-y-2 border-t border-brand-100 pt-4">

                            @foreach ($step['checklist'] as $item)

                                <li class="flex items-center gap-2 text-xs font-medium text-black/70">

                                    <span class="flex h-3.5 w-3.5 shrink-0 items-center justify-center rounded-full bg-success-50 text-success-500">

                                        <iconify-icon
                                            icon="lucide:check"
                                            class="text-[9px]"
                                        ></iconify-icon>

                                    </span>

                                    <span>
                                        {{ $item['value'] ?? '' }}
                                    </span>

                                </li>

                            @endforeach

                        </ul>
                    @endif

                </article>

            @endforeach

        </div>


        {{-- Dynamic Consultation CTA --}}
        @if (!empty($cta))

            <div
                class="mt-14 rounded-2xl border border-brand-100 bg-white p-8 text-center shadow-sm"
                data-reveal
            >

                <div class="mx-auto max-w-2xl">

                    @if (!empty($cta['title']))
                        <h4 class="text-xl font-bold text-black sm:text-2xl">
                            {{ $cta['title'] }}
                        </h4>
                    @endif

                    @if (!empty($cta['description']))
                        <p class="mt-2 text-sm leading-6 text-black/60">
                            {{ $cta['description'] }}
                        </p>
                    @endif

                    {{-- Dynamic CTA Buttons --}}
                    @if (!empty($buttons))

                        <div class="mt-6 flex flex-wrap justify-center gap-4">

                            @foreach ($buttons as $button)

                                <a
                                    href="{{ $button['url'] ?? '#contact' }}"
                                    class="inline-flex w-full justify-center gap-2 rounded-xl px-6 py-2.5 text-[13px] font-semibold transition-all duration-300 hover:-translate-y-0.5 sm:w-fit sm:py-3.5 sm:text-sm
                                    {{ ($button['type'] ?? 'primary') === 'primary'
                                        ? 'bg-brand-500 text-white shadow-sm hover:bg-brand-600'
                                        : 'border border-brand-200 bg-brand-50 text-brand-700 hover:bg-brand-100' }}"
                                >

                                    @if (($button['type'] ?? '') === 'secondary' && !empty($button['icon']))
                                        <iconify-icon
                                            icon="{{ $button['icon'] }}"
                                            class="text-base"
                                        ></iconify-icon>
                                    @endif

                                    <span>
                                        {{ $button['label'] ?? '' }}
                                    </span>

                                    @if (($button['type'] ?? 'primary') === 'primary' && !empty($button['icon']))
                                        <iconify-icon
                                            icon="{{ $button['icon'] }}"
                                            class="text-base"
                                        ></iconify-icon>
                                    @endif

                                </a>

                            @endforeach

                        </div>

                    @endif

                </div>

            </div>

        @endif

    </div>
</section>

@endif