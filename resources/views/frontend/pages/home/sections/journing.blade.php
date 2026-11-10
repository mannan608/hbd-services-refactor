@php
    $features = [
        [
            'title' => 'Compare',
            'description' => 'Compare courses, tuition fees and entry requirements across institutions.',
            'icon' => 'fa-solid fa-scale-balanced',
            'step' => '01',
        ],
        [
            'title' => 'Connect',
            'description' => 'Connect directly with verified counsellors who understand your goals.',
            'icon' => 'fa-solid fa-users',
            'step' => '02',
        ],
        [
            'title' => 'Apply',
            'description' => 'Apply with confidence with expert support on every document and deadline.',
            'icon' => 'fa-solid fa-file-circle-check',
            'step' => '03',
        ],
        [
            'title' => 'Succeed',
            'description' => 'Succeed from offer letter to visa approval and a smooth arrival.',
            'icon' => 'fa-solid fa-graduation-cap',
            'step' => '04',
        ],
    ];
@endphp

<section class="relative overflow-hidden bg-white py-16 sm:py-20 lg:py-24">
    <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">

        {{-- Section header --}}
        <div class="mx-auto max-w-2xl text-center" data-reveal>
            <span
                class="inline-flex items-center gap-2 rounded-full border border-brand-100 bg-brand-50 px-4 py-1.5 text-[12px] font-semibold uppercase tracking-[0.16em] text-brand-600">
                <i class="fa-solid fa-wand-magic-sparkles"></i>
                Your journey starts here
            </span>
            <h2
                class="mt-5 text-3xl font-semibold leading-[1.2] tracking-[-0.02em] text-black sm:text-4xl md:text-5xl lg:text-6xl">
                Four steps to <span class="text-red-500">your future</span>
            </h2>
            <p class="mx-auto mt-4 max-w-xl text-base leading-7 text-black/60">
                A clear, guided path from first search to your first day on campus.
            </p>
        </div>

        {{-- Steps --}}
        <div class="relative mt-14 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:mt-16 lg:grid-cols-4">

            {{-- Connector --}}
            <div
                class="pointer-events-none absolute inset-x-16 top-[68px] hidden h-px bg-gradient-to-r from-brand-100 via-brand-200 to-brand-100 lg:block">
            </div>

            @foreach ($features as $index => $feature)
                {{-- Reveal Wrapper --}}
                <div data-reveal style="--reveal-delay: {{ $index * 100 }}ms">

                    {{-- Hover Card --}}
                    <article
                        class="group relative flex h-full flex-col rounded-2xl border border-brand-100 bg-white p-6
            shadow-[0_2px_8px_rgba(16,24,40,0.04)]
            transition-all duration-500 ease-out
            hover:-translate-y-2 hover:border-brand-300
            hover:shadow-[0_20px_40px_rgba(5,39,94,0.12)]">

                        <div class="flex items-center justify-between">

                            <div
                                class="flex h-14 w-14 items-center justify-center rounded-2xl border border-brand-100 bg-brand-50 text-brand-600 transition-all duration-500 ease-out group-hover:scale-110 group-hover:border-brand-500 group-hover:bg-brand-500 group-hover:text-white">
                                <i
                                    class="{{ $feature['icon'] }} text-xl transition-transform duration-500 group-hover:rotate-6"></i>
                            </div>

                            <span
                                class="text-[28px] font-bold leading-none tracking-tight text-brand-100 transition-colors duration-500 group-hover:text-brand-300">
                                {{ $feature['step'] }}
                            </span>

                        </div>

                        <h3
                            class="mt-6 text-lg font-bold tracking-tight text-black transition-colors duration-300 group-hover:text-brand-600">
                            {{ $feature['title'] }}
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-black/60">
                            {{ $feature['description'] }}
                        </p>

                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>
