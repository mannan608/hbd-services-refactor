@props([
    'destination' => [],
])

@php
    $destName = $destination['name'];

    $requirements = $destination['requirements'] ?? [];
@endphp

<section id="requirements" data-section class="relative overflow-hidden bg-brand-25 py-16 sm:py-20 lg:py-24">
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        {{-- Section Introduction --}}
        <x-destination-section-heading
            align="center"
            eyebrow="ADMISSIONS & ELIGIBILITY"
            :title="'Entry Requirements for <span class=\'text-brand-500\'>' . $destName . '</span>'"
            description="Clear criteria, required English test scores, and document checklists to ensure a seamless university application process."
        />

        {{-- 4 Pillars Grid --}}
        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @foreach($requirements as $requirement)
                <article class="group relative flex h-full flex-col rounded-2xl border border-brand-100 bg-white p-6 shadow-[0_1px_2px_rgba(16,24,40,0.04)] transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-theme-md sm:p-7"
                         data-reveal style="--reveal-delay: {{ $loop->index * 80 }}ms">
                    <div class="flex items-center justify-between">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl border border-brand-100 bg-brand-50 text-brand-600 transition-all duration-300 group-hover:bg-brand-500 group-hover:text-white">
                            <iconify-icon icon="{{ $requirement['icon'] }}" class="text-2xl"></iconify-icon>
                        </div>
                        <span class="text-3xl font-extrabold text-brand-100 transition-colors group-hover:text-brand-200">
                            {{ $requirement['number'] }}
                        </span>
                    </div>

                    <h3 class="mt-6 text-lg font-bold text-black transition-colors group-hover:text-brand-600">
                        {{ $requirement['title'] }}
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-black/60">
                        {{ $requirement['description'] }}
                    </p>

                    <ul class="mt-6 space-y-2.5 border-t border-brand-100 pt-5">
                        @foreach($requirement['items'] as $item)
                            <li class="flex items-start gap-2 text-xs font-medium text-black/70">
                                <span class="mt-0.5 flex h-3.5 w-3.5 shrink-0 items-center justify-center rounded-full bg-success-50 text-success-500">
                                    <iconify-icon icon="lucide:check" class="text-[9px]"></iconify-icon>
                                </span>
                                <span>{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                </article>
            @endforeach
        </div>

        {{-- Interactive Education Level Pathway --}}
        <div class="mt-20 lg:mt-24 grid items-center gap-12 lg:grid-cols-12 lg:gap-14">
            <div class="lg:col-span-6" data-reveal>
                <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-brand-100 bg-white px-4 py-1.5 text-[12px] font-semibold uppercase tracking-[0.16em] text-brand-600">
                    <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
                    ACADEMIC PATHWAY COMPARISON
                </div>

                <h3 class="text-[26px] font-bold leading-[1.2] tracking-tight text-black sm:text-[30px]">
                    Find the Right Admission Route Matching Your Current Profile.
                </h3>

                <p class="mt-4 text-base leading-7 text-black/60">
                    Depending on your academic background, English proficiency scores, and future ambition, our advisors map the optimal entry route to prevent study gaps and minimize cost.
                </p>

                <div class="mt-8 space-y-4">
                    <div class="flex items-start gap-4 rounded-xl border border-brand-100 bg-white p-5 shadow-sm">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 border border-brand-100">
                            <iconify-icon icon="lucide:book-open" class="text-xl"></iconify-icon>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-black">Undergraduate Route</h4>
                            <p class="mt-0.5 text-xs leading-5 text-black/60">
                                HSC or A-Levels with direct entry or integrated international foundation year.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 rounded-xl border border-brand-100 bg-white p-5 shadow-sm">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 border border-brand-100">
                            <iconify-icon icon="lucide:graduation-cap" class="text-xl"></iconify-icon>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-black">Postgraduate Route</h4>
                            <p class="mt-0.5 text-xs leading-5 text-black/60">
                                4-year Bachelor’s degree with 1-year fast-track Master's degree options across all disciplines.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Interactive Tab Box on Right --}}
         
@php
    $entryRequirements = $destination['entryRequirements'] ?? [];
    $levels = $entryRequirements['levels'] ?? [];
    $firstLevel = $levels[0]['key'] ?? '';
@endphp

@if (!empty($levels))
<div
    class="lg:col-span-6"
    data-reveal
    style="--reveal-delay: 150ms"
    x-data="{ level: @js($firstLevel) }"
>
    <div class="rounded-2xl border border-brand-100 bg-white p-7 shadow-theme-md sm:p-8">

        {{-- Header --}}
        <div class="flex flex-col gap-4 border-b border-brand-100 pb-5">

            <div>
                <p class="text-[11px] font-semibold uppercase tracking-wider text-brand-600">
                    Explore Entry Route
                </p>
            </div>

            {{-- Dynamic Tabs --}}
            <div class="flex w-full justify-around rounded-xl border border-brand-100 bg-brand-50 p-1 sm:w-fit">

                @foreach ($levels as $item)
                    <button
                        type="button"
                        @click="level = @js($item['key'])"
                        :class="level === @js($item['key'])
                            ? 'bg-brand-500 text-white shadow-sm'
                            : 'text-black/70 hover:text-brand-600'"
                        class="rounded-lg px-4 py-2 text-xs font-semibold transition-all"
                    >
                        {{ $item['label'] }}
                    </button>
                @endforeach

            </div>
        </div>

        {{-- Dynamic Requirements --}}
        @foreach ($levels as $item)
            <div
                x-show="level === @js($item['key'])"
                x-cloak
                class="mt-6 space-y-4"
            >

                <h5 class="text-sm font-bold text-black">
                    {{ $item['heading'] }}
                </h5>

                <ul class="space-y-3">

                    @foreach ($item['requirements'] ?? [] as $requirement)
                        <li class="flex items-start gap-3 text-sm text-black/70">

                            <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-success-50 text-success-500">
                                <iconify-icon
                                    icon="lucide:check"
                                    class="text-xs"
                                ></iconify-icon>
                            </span>

                            <span>
                                {{ $requirement['description'] }}
                            </span>

                        </li>
                    @endforeach

                </ul>
            </div>
        @endforeach

        {{-- CTA --}}
        @if (!empty($entryRequirements['cta']))
            <div class="mt-8 border-t border-brand-100 pt-5">

                <a
                    href="{{ $entryRequirements['cta']['url'] ?? '#contact' }}"
                    class="flex w-full items-center justify-center gap-2 rounded-xl bg-brand-500 px-4 py-3 text-sm font-semibold text-white shadow-sm transition-all duration-300 hover:bg-brand-600"
                >
                    <span>
                        {{ $entryRequirements['cta']['label'] ?? 'Get Free Profile Assessment' }}
                    </span>

                    <iconify-icon
                        icon="lucide:arrow-right"
                        class="text-base"
                    ></iconify-icon>
                </a>

            </div>
        @endif

    </div>
</div>
@endif
        </div>

        {{-- Important Notice Card --}}
        <div class="mt-12 flex items-start gap-4 rounded-2xl border border-brand-200 bg-brand-50/80 p-6 text-black" data-reveal>
            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-brand-500 text-white shadow-sm">
                <iconify-icon icon="lucide:info" class="text-xl"></iconify-icon>
            </div>
            <div>
                <h4 class="text-base font-bold text-black">Official Admission & Visa Notice</h4>
                <p class="mt-1 text-sm leading-6 text-black/70">
                    Exact grade requirements, required English scores, and specific document thresholds vary by institution and program of study. Meeting minimum entry criteria does not automatically guarantee university admission. Student visa compliance requirements are assessed independently by government immigration authorities.
                </p>
            </div>
        </div>
    </div>
</section>
