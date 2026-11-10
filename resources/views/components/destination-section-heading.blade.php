@props([
    'eyebrow' => null,
    'title',
    'description' => null,
    'align' => 'left',
])

@php
    $isCenter = $align === 'center';
@endphp

<header class="{{ $isCenter ? 'mx-auto max-w-2xl text-center' : 'max-w-3xl' }}" data-reveal>
    @if ($eyebrow)
        <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-brand-100 bg-brand-50 px-4 py-1.5 text-[12px] font-semibold uppercase tracking-[0.16em] text-brand-600">
            <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
            {{ $eyebrow }}
        </div>
    @endif

    <h2 class="text-xl font-semibold leading-[1.2] tracking-[-0.02em] text-black sm:text-2xl lg:text-3xl">
        {!! $title !!}
    </h2>

    @if ($description)
        <p class="mt-4 text-sm sm:text-base leading-7 text-black/60 {{ $isCenter ? 'mx-auto max-w-xl' : 'max-w-2xl' }}">
            {{ $description }}
        </p>
    @endif
</header>