@php
    $financial = $destination['financialPlanning'] ?? [];

    $tuitionFees = $financial['tuitionFees'] ?? [];
    $livingCosts = $financial['livingCosts'] ?? [];
    $livingAreas = $livingCosts['areas'] ?? [];

    $scholarshipData = $financial['scholarships'] ?? [];
    $featuredScholarship = $scholarshipData['featured'] ?? null;
    $scholarships = $scholarshipData['items'] ?? [];

    $destName = $destination['name'] ?? 'Destination';
@endphp

@if (!empty($financial))

<section id="costs" data-section
    class="relative overflow-hidden bg-white py-16 sm:py-20 lg:py-24">

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- Section Header --}}
        <x-destination-section-heading
            eyebrow="FINANCIAL PLANNING & EXPENSES"
            :title="'Estimated Cost of Studying in <span class=\'text-brand-500\'>' . e($destName) . '</span>'"
            description="Understand key tuition fee ranges, realistic monthly living expenses, and budgeting factors before making your study decision."
        />

        {{-- Tuition Fee Cards --}}
        @if (!empty($tuitionFees))
            <div class="mt-12 grid gap-6 lg:grid-cols-2">

                @foreach ($tuitionFees as $fee)
                    <article
                        class="group rounded-2xl border border-brand-100 bg-white p-7 shadow-[0_1px_2px_rgba(16,24,40,0.04)] transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-theme-md sm:p-8"
                        data-reveal
                        style="--reveal-delay: {{ $loop->index * 100 }}ms">

                        <div class="flex items-center justify-between">

                            <div class="flex h-12 w-12 items-center justify-center rounded-xl border border-brand-100 bg-brand-50 text-brand-600 transition-colors group-hover:bg-brand-500 group-hover:text-white">

                                <iconify-icon
                                    icon="{{ $fee['icon'] ?? 'lucide:graduation-cap' }}"
                                    class="text-2xl">
                                </iconify-icon>

                            </div>

                            @if (!empty($fee['badge']))
                                <span class="rounded-full border border-brand-100 bg-brand-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-wider text-brand-700">
                                    {{ $fee['badge'] }}
                                </span>
                            @endif

                        </div>

                        <h3 class="mt-6 text-xl font-bold text-black transition-colors group-hover:text-brand-600">
                            {{ $fee['title'] ?? $fee['level'] ?? '' }}
                        </h3>

                        <div class="mt-4">

                            @if (!empty($fee['studentCategory']))
                                <span class="text-xs font-semibold uppercase tracking-wider text-black/50">
                                    {{ $fee['studentCategory'] }}
                                </span>
                            @endif

                            <div class="mt-1 text-3xl font-extrabold tracking-tight text-brand-600 sm:text-4xl">

                                {{ $fee['currency'] ?? '' }} {{ number_format($fee['minimum'] ?? 0) }}

                                –

                                {{ $fee['currency'] ?? '' }} {{ number_format($fee['maximum'] ?? 0) }}

                            </div>

                            @if (!empty($fee['period']))
                                <span class="text-xs text-black/50">
                                    {{ $fee['period'] }}
                                </span>
                            @endif

                        </div>

                        @if (!empty($fee['description']))
                            <p class="mt-4 text-sm leading-6 text-black/60">
                                {{ $fee['description'] }}
                            </p>
                        @endif

                        @if (!empty($fee['duration']))
                            <div class="mt-6 border-t border-brand-100 pt-4">
                                <span class="text-xs font-semibold text-brand-600">
                                    {{ $fee['duration'] }}
                                </span>
                            </div>
                        @endif

                    </article>
                @endforeach

            </div>
        @endif


        {{-- Monthly Living Expenses --}}
        @if (!empty($livingAreas))
            <div class="mt-16">

                <div class="mb-8">

                    <h3 class="text-xl font-bold text-black sm:text-2xl">
                        {{ $livingCosts['title'] ?? 'Monthly Living Costs Breakdown' }}
                    </h3>

                    @if (!empty($livingCosts['description']))
                        <p class="mt-1.5 text-sm text-black/60">
                            {{ $livingCosts['description'] }}
                        </p>
                    @endif

                </div>

                <div class="grid gap-6 md:grid-cols-2">

                    @foreach ($livingAreas as $area)
                        <div
                            class="rounded-2xl border border-brand-100 bg-brand-25 p-4 shadow-sm sm:p-5 md:p-7"
                            data-reveal
                            style="--reveal-delay: {{ $loop->index * 100 }}ms">

                            <div class="flex items-center justify-between gap-4">

                                <div>

                                    @if (!empty($area['category']))
                                        <span class="text-[10px] font-semibold uppercase tracking-wider text-brand-600">
                                            {{ $area['category'] }}
                                        </span>
                                    @endif

                                    <h4 class="mt-0.5 text-lg font-bold text-black sm:text-xl">
                                        {{ $area['name'] ?? '' }}
                                    </h4>

                                </div>

                                <div class="shrink-0 text-right">

                                    {{-- <span class="text-lg font-extrabold text-black sm:text-xl">
                                        {{ $area['currency'] ?? '' }}{{ number_format($area['amount'] ?? 0) }}
                                    </span> --}}

                                    <span class="block text-xs text-black/50">
                                        {{ $livingCosts['period'] ?? 'Per month' }}
                                    </span>

                                </div>

                            </div>

                            @if (!empty($area['description']))
                                <p class="mt-3 text-sm leading-6 text-black/60">
                                    {{ $area['description'] }}
                                </p>
                            @endif

                        </div>
                    @endforeach

                </div>

            </div>
        @endif


        {{-- Scholarships Section --}}
        @if ($featuredScholarship || !empty($scholarships))

            <div id="scholarships" class="mt-20 scroll-mt-24 lg:mt-24">

                {{-- Featured Scholarship --}}
                @if ($featuredScholarship)

                    <div
                        class="relative overflow-hidden rounded-2xl bg-brand-900 p-8 text-white sm:p-12"
                        data-reveal>

                        <div class="pointer-events-none absolute -right-20 -top-24 h-72 w-72 rounded-full bg-brand-800/40 blur-3xl">
                        </div>

                        <div class="relative grid items-center gap-6 sm:gap-8 lg:grid-cols-12 lg:gap-12">

                            {{-- Left Content --}}
                            <div class="lg:col-span-8">

                                @if (!empty($featuredScholarship['badge']))
                                    <span class="inline-flex rounded-full bg-success-50 px-3 py-1.5 text-center text-[10px] font-bold uppercase tracking-wider text-success-500 sm:text-[11px]">
                                        {{ $featuredScholarship['badge'] }}
                                    </span>
                                @endif

                                <div class="mt-4 flex items-start gap-3 sm:mt-5 sm:items-center sm:gap-4">

                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-white/10 bg-white/10 text-brand-300 sm:h-12 sm:w-12">

                                        <iconify-icon
                                            icon="{{ $featuredScholarship['icon'] ?? 'lucide:trophy' }}"
                                            class="text-xl sm:text-2xl">
                                        </iconify-icon>

                                    </div>

                                    <div>

                                        <h3 class="text-xl font-bold leading-snug text-white sm:text-2xl">
                                            {{ $featuredScholarship['name'] ?? '' }}
                                        </h3>

                                        @if (!empty($featuredScholarship['provider']))
                                            <p class="mt-1 text-xs text-brand-200">
                                                {{ $featuredScholarship['provider'] }}
                                                in {{ $destName }}
                                            </p>
                                        @endif

                                    </div>

                                </div>

                                @if (!empty($featuredScholarship['description']))
                                    <p class="mt-4 text-sm leading-6 text-brand-100/80 sm:mt-5 sm:leading-7">
                                        {{ $featuredScholarship['description'] }}
                                    </p>
                                @endif

                                {{-- Dynamic Buttons --}}
                                @if (!empty($featuredScholarship['buttons']))
                                    <div class="mt-6 flex flex-col flex-wrap items-stretch gap-3 sm:mt-8 sm:flex-row sm:items-center sm:gap-4">

                                        @foreach ($featuredScholarship['buttons'] as $button)
                                            <a
                                                href="{{ $button['url'] ?? '#contact' }}"
                                                class="inline-flex items-center justify-center gap-2 rounded-xl px-5 py-3.5 text-sm font-semibold shadow-sm transition-all duration-300 sm:px-6
                                                {{ $loop->first
                                                    ? 'bg-brand-500 text-white hover:-translate-y-0.5 hover:bg-brand-600'
                                                    : 'border border-white/20 bg-white/10 text-white hover:bg-white/15' }}">

                                                <span>
                                                    {{ $button['label'] ?? '' }}
                                                </span>

                                                @if (!empty($button['icon']))
                                                    <iconify-icon
                                                        icon="{{ $button['icon'] }}"
                                                        class="text-base">
                                                    </iconify-icon>
                                                @endif

                                            </a>
                                        @endforeach

                                    </div>
                                @endif

                            </div>


                            {{-- Right Scholarship Value Card --}}
                            <div class="rounded-xl border border-white/10 bg-white/5 p-5 text-center backdrop-blur-sm sm:p-6 lg:col-span-4">

                                @if (!empty($featuredScholarship['valueLabel']))
                                    <span class="text-[11px] uppercase tracking-wider text-brand-200 sm:text-xs">
                                        {{ $featuredScholarship['valueLabel'] }}
                                    </span>
                                @endif

                                <div class="mt-2 text-3xl font-extrabold text-white sm:text-4xl">
                                    {{ $featuredScholarship['value'] ?? '' }}
                                </div>

                                @if (!empty($featuredScholarship['valueDescription']))
                                    <p class="mt-2 text-xs leading-5 text-brand-100/70 sm:mt-3">
                                        {{ $featuredScholarship['valueDescription'] }}
                                    </p>
                                @endif

                            </div>

                        </div>

                    </div>

                @endif


                {{-- Scholarship Cards --}}
                @if (!empty($scholarships))

                    <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">

                        @foreach ($scholarships as $scholarship)

                            <article
                                class="group flex h-full flex-col rounded-2xl border border-brand-100 bg-white p-6 shadow-[0_1px_2px_rgba(16,24,40,0.04)] transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-theme-md sm:p-7"
                                data-reveal
                                style="--reveal-delay: {{ $loop->index * 80 }}ms">

                                <div class="flex items-center justify-between gap-3">

                                    <div class="flex h-12 w-12 items-center justify-center rounded-xl border border-brand-100 bg-brand-50 text-brand-600 transition-colors group-hover:bg-brand-500 group-hover:text-white">

                                        <iconify-icon
                                            icon="{{ $scholarship['icon'] ?? 'lucide:award' }}"
                                            class="text-2xl">
                                        </iconify-icon>

                                    </div>

                                    @if (!empty($scholarship['category']))
                                        <span class="rounded-lg border border-brand-100 bg-brand-50 px-2.5 py-1 text-[11px] font-semibold text-brand-700">
                                            {{ $scholarship['category'] }}
                                        </span>
                                    @endif

                                </div>

                                <h4 class="mt-5 text-lg font-bold text-black transition-colors group-hover:text-brand-600">
                                    {{ $scholarship['name'] ?? '' }}
                                </h4>

                                @if (!empty($scholarship['description']))
                                    <p class="mt-2 flex-1 text-sm leading-6 text-black/60">
                                        {{ $scholarship['description'] }}
                                    </p>
                                @endif

                                <div class="mt-6 border-t border-brand-100 pt-4">

                                    <span class="text-[11px] uppercase tracking-wider text-black/50">
                                        Grant Coverage
                                    </span>

                                    @if (!empty($scholarship['benefits']))
                                        <p class="mt-0.5 text-base font-bold text-accent-one-500">
                                            {{ $scholarship['benefits'] }}
                                        </p>
                                    @endif

                                    @if (!empty($scholarship['level']))
                                        <p class="mt-1 text-xs font-medium text-brand-600">
                                            Level: {{ $scholarship['level'] }}
                                        </p>
                                    @endif

                                    @if (!empty($scholarship['website']))
                                        <a
                                            href="{{ $scholarship['website'] }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="mt-3 inline-flex items-center gap-1 text-xs font-semibold text-brand-600 transition hover:text-brand-700">

                                            Visit Scholarship
                                            <iconify-icon icon="lucide:external-link"></iconify-icon>

                                        </a>
                                    @endif

                                </div>

                            </article>

                        @endforeach

                    </div>

                @endif

            </div>

        @endif

    </div>
</section>

@endif