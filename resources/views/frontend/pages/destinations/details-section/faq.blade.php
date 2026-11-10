
@props([
    'destination' => [],
])

@php
    $destName = $destination['name'] ?? 'your destination';

    $faqSection = $destination['faqSection'] ?? [];

    $faqs = $faqSection['faqs'] ?? [];

    $support = $faqSection['support'] ?? [];

    $emailCard = $support['emailCard'] ?? [];

    $consultationCard = $support['consultationCard'] ?? [];

    $consultationButton = $consultationCard['button'] ?? [];
@endphp

@if (!empty($faqSection))

<section
    id="faq"
    data-section
    class="relative overflow-hidden bg-white py-16 sm:py-20 lg:py-24"
>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- Section Header --}}
        <x-destination-section-heading
            :eyebrow="$faqSection['eyebrow'] ?? 'FREQUENTLY ASKED QUESTIONS'"
            :title="$faqSection['title'] ?? 'Frequently Asked Questions'"
            :description="$faqSection['description'] ?? ''"
        />

        <div class="mt-12 grid grid-cols-1 items-start gap-8 lg:grid-cols-12 lg:gap-10">

            {{-- Left Column: Dynamic FAQ Accordion --}}
            <div class="space-y-4 lg:col-span-8">

                @forelse ($faqs as $index => $faq)

                    <article
                        class="overflow-hidden rounded-2xl border border-brand-100 bg-white shadow-[0_1px_2px_rgba(16,24,40,0.04)] transition-all duration-200 hover:border-brand-200"
                        x-data="{ open: {{ $loop->first ? 'true' : 'false' }} }"
                        data-reveal
                        style="--reveal-delay: {{ $index * 60 }}ms"
                    >

                        {{-- Question --}}
                        <button
                            type="button"
                            @click="open = !open"
                            :aria-expanded="open"
                            class="flex w-full items-center justify-between gap-5 p-5 text-left transition hover:bg-brand-25/50 sm:p-6"
                        >

                            <span
                                class="text-base font-bold"
                                :class="open ? 'text-brand-600' : 'text-black'"
                            >
                                {{ $faq['question'] ?? '' }}
                            </span>

                            <span
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl border border-brand-100 transition-colors"
                                :class="open
                                    ? 'border-brand-500 bg-brand-500 text-white'
                                    : 'bg-brand-50 text-brand-600'"
                            >
                                <iconify-icon
                                    :icon="open ? 'lucide:minus' : 'lucide:plus'"
                                    class="text-lg"
                                ></iconify-icon>
                            </span>

                        </button>

                        {{-- Answer --}}
                        <div x-show="open" x-collapse x-cloak>

                            <div class="border-t border-brand-100/70 bg-brand-25/30 px-5 pb-6 pt-4 text-sm leading-7 text-black/70 sm:px-6">

                                {{ $faq['answer'] ?? '' }}

                            </div>

                        </div>

                    </article>

                @empty

                    <div class="rounded-2xl border border-brand-100 bg-brand-25 p-8 text-center">

                        <iconify-icon
                            icon="lucide:message-circle-question"
                            class="text-4xl text-brand-400"
                        ></iconify-icon>

                        <p class="mt-3 text-sm text-black/60">
                            No frequently asked questions are available at the moment.
                        </p>

                    </div>

                @endforelse

            </div>


            {{-- Right Column: Support Sidebar --}}
            @if (!empty($support))

                <div class="lg:col-span-4" id="contact">

                    <div class="space-y-5 lg:sticky lg:top-36">

                        {{-- Email Support Card --}}
                        @if (!empty($emailCard))

                            <div
                                class="rounded-2xl border border-brand-100 bg-white p-6 shadow-theme-md sm:p-7"
                                data-reveal
                            >

                                <div class="flex h-12 w-12 items-center justify-center rounded-xl border border-brand-100 bg-brand-50 text-brand-600">

                                    <iconify-icon
                                        icon="{{ $emailCard['icon'] ?? 'lucide:messages-square' }}"
                                        class="text-2xl"
                                    ></iconify-icon>

                                </div>

                                <h3 class="mt-5 text-xl font-bold text-black">
                                    {{ $emailCard['title'] ?? '' }}
                                </h3>

                                @if (!empty($emailCard['description']))
                                    <p class="mt-2 text-sm leading-6 text-black/60">
                                        {{ $emailCard['description'] }}
                                    </p>
                                @endif

                                @if (!empty($emailCard['email']))

                                    <a
                                        href="mailto:{{ $emailCard['email'] }}"
                                        class="group mt-6 flex items-center justify-between rounded-xl border border-brand-100 bg-brand-50 p-3.5 transition-all duration-300 hover:border-brand-200 hover:bg-brand-100"
                                    >

                                        <div class="flex items-center gap-3">

                                            <span class="flex h-10 w-10 items-center justify-center rounded-lg border border-brand-100 bg-white text-brand-600 shadow-sm">

                                                <iconify-icon
                                                    icon="lucide:mail"
                                                    class="text-lg"
                                                ></iconify-icon>

                                            </span>

                                            <div>

                                                <span class="block text-[10px] font-bold uppercase tracking-wider text-black/50">
                                                    {{ $emailCard['label'] ?? 'Email Admissions' }}
                                                </span>

                                                <span class="block break-all text-sm font-semibold text-black">
                                                    {{ $emailCard['email'] }}
                                                </span>

                                            </div>

                                        </div>

                                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-white text-brand-600 shadow-sm transition group-hover:translate-x-0.5">

                                            <iconify-icon
                                                icon="lucide:arrow-up-right"
                                                class="text-sm"
                                            ></iconify-icon>

                                        </span>

                                    </a>

                                @endif

                            </div>

                        @endif


                        {{-- Consultation Card --}}
                        @if (!empty($consultationCard))

                            <div
                                class="rounded-2xl bg-brand-900 p-6 text-white shadow-theme-md"
                                data-reveal
                                style="--reveal-delay: 100ms"
                            >

                                <div class="flex items-center gap-3">

                                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl border border-white/10 bg-white/10 text-brand-300">

                                        <iconify-icon
                                            icon="{{ $consultationCard['icon'] ?? 'lucide:headset' }}"
                                            class="text-xl"
                                        ></iconify-icon>

                                    </div>

                                    <div>

                                        <h4 class="text-base font-bold text-white">
                                            {{ $consultationCard['title'] ?? '' }}
                                        </h4>

                                        @if (!empty($consultationCard['subtitle']))
                                            <p class="text-xs text-brand-200">
                                                {{ $consultationCard['subtitle'] }}
                                            </p>
                                        @endif

                                    </div>

                                </div>

                                @if (!empty($consultationCard['description']))
                                    <p class="mt-4 text-xs leading-5 text-brand-100/75">
                                        {{ $consultationCard['description'] }}
                                    </p>
                                @endif

                                @if (!empty($consultationButton))

                                    <a
                                        href="{{ $consultationButton['url'] ?? '#contact' }}"
                                        class="mt-5 flex w-full items-center justify-center gap-2 rounded-xl bg-brand-500 px-4 py-3 text-sm font-semibold text-white shadow-sm transition-all duration-300 hover:bg-brand-600"
                                    >

                                        <span>
                                            {{ $consultationButton['label'] ?? 'Book Consultation' }}
                                        </span>

                                        @if (!empty($consultationButton['icon']))
                                            <iconify-icon
                                                icon="{{ $consultationButton['icon'] }}"
                                                class="text-sm"
                                            ></iconify-icon>
                                        @endif

                                    </a>

                                @endif

                            </div>

                        @endif

                    </div>

                </div>

            @endif

        </div>

    </div>
</section>

@endif