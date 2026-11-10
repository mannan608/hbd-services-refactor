{{-- resources/views/frontend/pages/home/sections/certification-awards.blade.php --}}

@props([
    'badge' => 'Accreditation & Excellence',
    'title' => 'Our certifications',
    'titleHighlight' => '& Awards',
    'description' => 'Recognized by leading global authorities for premium quality education and standards.',
    'certifications' => [],
])

@php
    $defaultCertifications = [
        [
            'id' => 1,
            'logoText' => 'ICEF',
            'subtitle' => 'Accredited with ICEF Agency Status',
            'description' => 'The global network of trusted international education agencies',
            'verifyUrl' => 'https://www.icef.com/ias',
            'badgeNumber' => 'ICEF-123456',
            'status' => 'Verified active credential',
        ],
    ];

    $certifications = !empty($certifications) ? $certifications : $defaultCertifications;
@endphp

<section id="certifications" class="relative overflow-hidden bg-brand-25 py-14 sm:py-16 lg:py-24">
    <div class="pointer-events-none absolute left-4 sm:left-10 top-1/3 h-64 w-64 sm:h-96 sm:w-96 rounded-full bg-sky-light/70 blur-[100px] sm:blur-[120px]"></div>
    <div class="pointer-events-none absolute -right-16 sm:-right-20 bottom-10 h-64 w-64 sm:h-96 sm:w-96 rounded-full bg-brand-100/60 blur-[100px] sm:blur-[120px]"></div>

    <div class="relative mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="mx-auto max-w-2xl text-center" data-reveal>
            <span class="inline-flex items-center gap-2 rounded-full border border-brand-100 bg-white px-3.5 py-1.5 text-[11px] sm:text-[12px] font-semibold uppercase tracking-[0.16em] text-brand-600">
                <iconify-icon icon="lucide:sparkles" class="text-[14px] sm:text-[15px]"></iconify-icon>
                {{ $badge }}
            </span>
            <h2 class="mt-4 sm:mt-5 text-[24px] sm:text-[28px] lg:text-[32px] font-semibold leading-[1.2] tracking-[-0.02em] text-black">
                {{ $title }} <span class="text-brand-500">{{ $titleHighlight }}</span>
            </h2>
            <p class="mx-auto mt-3 sm:mt-4 max-w-xl text-sm sm:text-base leading-6 sm:leading-7 text-black/60">
                {{ $description }}
            </p>
        </div>

        {{-- Content --}}
        <div class="mx-auto mt-10 sm:mt-12 max-w-5xl lg:mt-14">
            @forelse ($certifications as $cert)
                <article wire:key="certification-{{ $cert['id'] ?? $loop->index }}"
                    class="group relative overflow-hidden rounded-2xl sm:rounded-3xl bg-gradient-to-br from-brand-900 via-brand-950 to-brand-950 p-5 sm:p-8 lg:p-12 shadow-2xl transition-all duration-500 hover:-translate-y-1"
                    data-reveal>
                    <div class="pointer-events-none absolute -right-16 -top-16 sm:-right-24 sm:-top-24 h-64 w-64 sm:h-96 sm:w-96 rounded-full bg-brand-500/10 blur-3xl transition-all duration-700 group-hover:bg-brand-500/20"></div>

                    <div class="relative grid grid-cols-1 items-center gap-8 sm:gap-10 lg:grid-cols-12">
                        {{-- Details --}}
                        <div class="flex flex-col justify-between lg:col-span-7 order-2 lg:order-1">
                            <div>
                                <div class="flex items-center gap-3">
                                    <span class="flex h-10 w-10 sm:h-11 sm:w-11 shrink-0 items-center justify-center overflow-hidden rounded-xl border border-brand-500/30 bg-white/95 p-1.5">
                                        <img src="{{ asset('icef.png') }}" alt="ICEF" class="h-full w-full object-contain">
                                    </span>
                                    <span class="text-lg sm:text-xl lg:text-2xl font-extrabold uppercase tracking-widest text-brand-300">
                                        {{ $cert['logoText'] ?? 'Certification' }}
                                    </span>
                                </div>

                                <h3 class="mt-5 sm:mt-6 text-lg sm:text-xl lg:text-2xl font-bold tracking-tight text-white">
                                    {{ $cert['subtitle'] ?? '' }}
                                </h3>
                                <p class="mt-3 max-w-lg text-sm sm:text-base leading-6 sm:leading-7 text-brand-100/80">
                                    {{ $cert['description'] ?? '' }}
                                </p>
                            </div>

                            <div class="mt-6 sm:mt-8 flex flex-col items-start gap-3 sm:gap-4 sm:flex-row sm:flex-wrap sm:items-center">
                                @if (!empty($cert['verifyUrl']))
                                    <a href="{{ $cert['verifyUrl'] }}" target="_blank" rel="noopener noreferrer"
                                        class="group/link inline-flex w-full sm:w-auto max-w-full items-center justify-center gap-2 rounded-xl bg-brand-500 px-5 py-3.5 text-sm font-semibold text-white shadow-lg shadow-brand-500/25 transition-all duration-300 hover:-translate-y-0.5 hover:bg-brand-600">
                                        <span class="truncate">Verify credential</span>
                                        <iconify-icon icon="lucide:external-link" class="shrink-0 text-lg transition-transform duration-300 group-hover/link:translate-x-0.5"></iconify-icon>
                                    </a>
                                @endif

                                <div class="flex items-center gap-2 text-sm font-medium text-brand-100/70">
                                    <iconify-icon icon="lucide:check-circle" class="shrink-0 text-lg text-accent-one-500"></iconify-icon>
                                    <span>{{ $cert['status'] ?? 'Verified credential' }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Seal --}}
                        <div class="flex justify-center lg:col-span-5 lg:justify-end order-1 lg:order-2">
                            <div class="w-full max-w-[200px] sm:max-w-[220px] lg:max-w-[240px] rounded-2xl border border-white/10 bg-white/95 p-4 sm:p-5 lg:p-6 shadow-lg transition-transform duration-500 group-hover:scale-105">
                                <img src="{{ asset('frontend-img/icef-qr.png') }}" alt="ICEF accreditation QR code" class="h-auto w-full object-contain">
                            </div>
                        </div>
                    </div>
                </article>
            @empty
                <div class="rounded-2xl border border-dashed border-brand-200 bg-white p-8 sm:p-10 text-center">
                    <iconify-icon icon="lucide:award" class="text-3xl sm:text-4xl text-brand-300"></iconify-icon>
                    <p class="mt-3 text-sm text-black/50">No certifications available at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
