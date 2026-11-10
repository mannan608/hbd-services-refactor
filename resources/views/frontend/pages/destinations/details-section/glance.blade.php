@props([
    'eyebrow' => 'BENEFITS',
    'title' => 'Why Study in the UK?',
    'description' => 'Discover why the UK is the top choice for international students seeking world-class education and global career opportunities.',
    'cards' => [
        [
            'title' => 'Globally Recognised Degrees',
            'description' => 'UK qualifications are respected by employers and universities worldwide, giving you a competitive edge in the global job market.',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />'
        ],
        [
            'title' => 'Shorter Course Duration',
            'description' => "Bachelor's in 3 years, Master's in 1 year, MBA in 1 year. Save time and reduce tuition and living costs significantly.",
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />'
        ],
        [
            'title' => 'Post-Study Work Opportunity',
            'description' => 'Eligible graduates can apply for the Graduate Route to stay and work in the UK for up to 2 years after completing studies.',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.222-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />'
        ],
        [
            'title' => 'World-Class Universities',
            'description' => "Home to many universities consistently ranked among the world's best with cutting-edge research facilities and innovation.",
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />'
        ],
        [
            'title' => 'Scholarships Available',
            'description' => 'Many universities offer scholarships specifically for international students based on merit and academic excellence.',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />'
        ],
        [
            'title' => 'Multicultural Environment',
            'description' => 'Study alongside students from over 180 countries and build a global professional network that lasts a lifetime.',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />'
        ]
    ]
])

<section class="relative overflow-hidden bg-slate-50/50 py-16 sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mb-4 inline-flex items-center gap-2 rounded-full bg-brand-50 px-3.5 py-1.5 text-xs font-bold uppercase tracking-[0.18em] text-brand-700 ring-1 ring-brand-700/10">
                    <span class="h-1.5 w-1.5 rounded-full bg-brand-600"></span>
                    {{ $eyebrow }}
                </div>

                <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl lg:text-[42px] lg:leading-[1.15]">
                    {{ $title }}
                </h2>

                @if ($description)
                    <p class="mt-5 text-base leading-relaxed text-slate-600 sm:text-lg sm:leading-8">
                        {{ $description }}
                    </p>
                @endif

        {{-- Cards Grid --}}
        <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8">
            @foreach($cards as $card)
                <div class="group relative rounded-3xl border border-slate-100 bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-brand-900/5">
                    
                    {{-- Icon Container --}}
                    <div class="mb-6 inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-brand-600 text-white shadow-md shadow-brand-600/20 transition-transform duration-300 group-hover:scale-110">
                        <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            {!! $card['icon'] !!}
                        </svg>
                    </div>

                    {{-- Card Title --}}
                    <h3 class="text-xl font-bold tracking-tight text-slate-900">
                        {{ $card['title'] }}
                    </h3>

                    {{-- Card Description --}}
                    <p class="mt-3 text-sm leading-relaxed text-slate-600">
                        {{ $card['description'] }}
                    </p>
                </div>
            @endforeach
        </div>

    </div>
</section>


