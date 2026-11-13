{{-- resources/views/frontend/pages/common-section/service-section.blade.php --}}

@props([
    'badge' => 'Global Opportunities',
    'title' => 'Explore our study abroad services',
    'description' => 'Make your international education journey seamless and successful.',
    'services' => [],
])

@php
    $defaultServices = [
        [
            'title' => 'Admission Counselling & Course Selection',
            'description' => 'Navigate the complex admissions process with expert guidance and select the perfect course to match your aspirations.',
            'icon' => 'compass',
        ],
        [
            'title' => 'Preparation (IELTS/PTE) & NAATI CCL',
            'description' => 'Excel in English proficiency exams such as IELTS, PTE, and NAATI CCL with our tailored preparation programs.',
            'icon' => 'languages',
        ],
        [
            'title' => 'Scholarship & Financial Assistance',
            'description' => 'Unlock opportunities for scholarships and financial aid to support your academic ambitions without stress.',
            'icon' => 'award',
        ],
        [
            'title' => 'Arranging Health Cover OSHC/OVHC',
            'description' => 'Ensure your well-being with hassle-free arrangements for Overseas Student Health Cover (OSHC) or Visitor Cover (OVHC).',
            'icon' => 'shield-check',
        ],
        [
            'title' => 'Course Provider Changing',
            'description' => 'Explore options for changing course providers seamlessly to optimize your educational experience and growth.',
            'icon' => 'refresh-cw',
        ],
        [
            'title' => 'Professional Year Admission',
            'description' => 'Secure admission into professional year programs to kickstart your career journey in your chosen field.',
            'icon' => 'briefcase',
        ],
    ];

    $services = !empty($services) ? $services : $defaultServices;
@endphp

<section class="relative overflow-hidden bg-white py-16 sm:py-20 lg:py-24">
    <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">

        {{-- Section header --}}
        <header class="mx-auto max-w-4xl text-center" data-reveal>
            <span class="inline-flex items-center gap-2 rounded-full border border-brand-100 bg-brand-50 px-4 py-1.5 text-[12px] font-semibold uppercase tracking-[0.16em] text-brand-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10" />
                    <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20" />
                    <path d="M2 12h20" />
                </svg>
                {{ $badge }}
            </span>
            <h2 class="mt-5 text-3xl font-semibold leading-[1.2] tracking-[-0.02em] text-black sm:text-4xl md:text-5xl lg:text-6xl">
               Explore our study <span class="text-red-500">abroad services</span>
            </h2>
            <p class="mx-auto mt-4 max-w-xl text-base leading-7 text-black/60">
                {{ $description }}
            </p>
        </header>

        {{-- Services --}}
        <div class="mt-12 grid grid-cols-1 gap-6 md:grid-cols-2 lg:mt-14 lg:grid-cols-3">
            @foreach ($services as $service)
            <div class="" data-reveal style="--reveal-delay: {{ ($loop->index % 3) * 90 }}ms">
                <article
                    class="group relative flex flex-col rounded-2xl border border-brand-100 bg-white p-7 shadow-[0_1px_2px_rgba(16,24,40,0.04)] transition-all duration-300 hover:-translate-y-1.5 hover:border-brand-200 hover:shadow-theme-md"
                >
                    <span class="flex h-12 w-12 items-center justify-center rounded-xl border border-brand-100 bg-brand-50 text-brand-600 transition-all duration-300 group-hover:bg-brand-500 group-hover:text-white">
                        <iconify-icon icon="lucide:{{ $service['icon'] }}" class="text-[22px]"></iconify-icon>
                    </span>

                    <h3 class="mt-5 text-lg font-bold leading-7 tracking-tight text-black transition-colors duration-200 group-hover:text-brand-600">
                        {{ $service['title'] }}
                    </h3>
                    <p class="mt-2.5 text-sm leading-6 text-black/60 line-clamp-2">
                        {{ $service['description'] }}
                    </p>

                    <span class="mt-6 inline-flex items-center gap-1.5 text-sm font-semibold text-brand-600  transition-all duration-300 ">
                        Learn more
                        <iconify-icon icon="lucide:arrow-right" class="text-[16px] transition-transform duration-300 group-hover:translate-x-1"></iconify-icon>
                    </span>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>
