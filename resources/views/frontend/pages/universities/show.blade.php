   @php
$university = [
    'name'        => 'University of Melbourne',
    'logo'        => '/patner_1.png',
    'cover'       => 'https://images.unsplash.com/photo-1562774053-701939374585?w=1600&q=80',
    'city'        => 'Melbourne, Victoria',
    'established' => '1853',
    'tuition'     => 'A$45,000 – A$52,000',
    'ranking'     => '#1 in Australia',
    'students'    => '52,000+',
    'programs'    => '400+',
];

// Sticky navigation
$navigation = [
    ['id' => 'overview',      'label' => 'Overview'],
    ['id' => 'programs',      'label' => 'Programs'],
    ['id' => 'requirements',  'label' => 'Requirements'],
    ['id' => 'fees',          'label' => 'Fees & Scholarships'],
    ['id' => 'campus',        'label' => 'Campus Life'],
    ['id' => 'campus-list',   'label' => 'Locations'],
];

// Popular study programs
$programs = [
    [
        'name'     => 'Bachelor of Science',
        'level'    => 'Undergraduate',
        'duration' => '3 Years',
        'fee'      => 'A$48,000 / year',
        'icon'     => 'flask-conical',
    ],
    [
        'name'     => 'Master of Business Administration',
        'level'    => 'Postgraduate',
        'duration' => '2 Years',
        'fee'      => 'A$62,000 / year',
        'icon'     => 'briefcase',
    ],
    [
        'name'     => 'Bachelor of Arts',
        'level'    => 'Undergraduate',
        'duration' => '3 Years',
        'fee'      => 'A$42,000 / year',
        'icon'     => 'palette',
    ],
    [
        'name'     => 'Master of Engineering',
        'level'    => 'Postgraduate',
        'duration' => '2 Years',
        'fee'      => 'A$55,000 / year',
        'icon'     => 'cpu',
    ],
 
   
];

// Entry requirements checklist
$requirements = [
    'Academic transcripts from previous education',
    'Proof of English language proficiency (IELTS / TOEFL / PTE)',
    'Passport copy (valid for at least 6 months)',
    'Statement of Purpose / Personal Statement',
    'Letters of Recommendation (2–3)',
    'Curriculum Vitae / Resume',
    'Portfolio (for design / creative courses)',
    'Evidence of financial capacity',
    'Overseas Student Health Cover (OSHC)',
    'Genuine Temporary Entrant (GTE) statement',
];

// Campus facilities
$facilities = [
    ['name' => 'Modern Libraries & Study Spaces',     'icon' => 'library'],
    ['name' => 'State-of-the-art Research Labs',      'icon' => 'microscope'],
    ['name' => 'Student Accommodation',               'icon' => 'home'],
    ['name' => 'Sports & Recreation Centres',         'icon' => 'dumbbell'],
    ['name' => 'Career Services & Counselling',       'icon' => 'briefcase'],
    ['name' => 'Health & Wellbeing Clinics',          'icon' => 'heart-pulse'],
    ['name' => 'Cafés & Dining Options',              'icon' => 'coffee'],
    ['name' => 'Student Clubs & Societies',           'icon' => 'users'],
    ['name' => 'Innovation & Entrepreneurship Hub',   'icon' => 'lightbulb'],
];

// Campus locations
$campuses = [
    [
        'name'    => 'Parkville Campus',
        'country' => 'Australia',
        'state'   => 'Victoria',
        'address' => 'Grattan Street, Parkville, VIC 3010',
        'image'   => 'https://images.unsplash.com/photo-1562774053-701939374585?w=800&q=80',
    ],
    [
        'name'    => 'Southbank Campus',
        'country' => 'Australia',
        'state'   => 'Victoria',
        'address' => '234 St Kilda Road, Southbank, VIC 3006',
        'image'   => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&q=80',
    ],
    [
        'name'    => 'Burnley Campus',
        'country' => 'Australia',
        'state'   => 'Victoria',
        'address' => '500 Yarra Boulevard, Richmond, VIC 3121',
        'image'   => 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=800&q=80',
    ],
    [
        'name'    => 'Werribee Campus',
        'country' => 'Australia',
        'state'   => 'Victoria',
        'address' => '250 Princes Highway, Werribee, VIC 3030',
        'image'   => 'https://images.unsplash.com/photo-1562774053-701939374585?w=800&q=80',
    ],
];
    @endphp
@extends('frontend.layouts.app')

@section('content')
@php
    $sectionLinks = $navigation ?? [
        ['id' => 'overview', 'label' => 'Overview'],
        ['id' => 'programs', 'label' => 'Programs'],
        ['id' => 'requirements', 'label' => 'Requirements'],
        ['id' => 'fees', 'label' => 'Tuition & Scholarships'],
        ['id' => 'campus', 'label' => 'Campus Life'],
        ['id' => 'campus-list', 'label' => 'Campuses'],
    ];
@endphp

<div x-data="{
    activeSection: 'overview',
    init() {
        const sections = document.querySelectorAll('main section[id]');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) this.activeSection = entry.target.id;
            });
        }, { rootMargin: '-25% 0px -60% 0px', threshold: 0 });
        sections.forEach((section) => observer.observe(section));
    }
}">
 {{-- HERO --}}
<section class="relative isolate min-h-[320px] overflow-hidden bg-brand-950 sm:min-h-[360px]">
    <img src="{{ $university['cover'] }}"
         alt="{{ $university['name'] }}"
         class="absolute inset-0 -z-20 h-full w-full object-cover opacity-25">
    <div class="absolute inset-0 -z-10 bg-gradient-to-r from-brand-950 via-brand-950/95 to-brand-900/75"></div>
    <div class="absolute -right-16 -top-24 -z-10 h-72 w-72 rounded-full bg-brand-500/20 blur-3xl sm:-right-24 sm:-top-32 sm:h-96 sm:w-96"></div>

    <div class="mx-auto flex min-h-[320px] max-w-7xl items-end px-4 py-8 sm:min-h-[360px] sm:px-6 sm:py-10 lg:px-8 lg:py-14">
        <div class="grid w-full grid-cols-1 items-end gap-6 lg:grid-cols-12 lg:gap-8">
            {{-- Left: Logo + Title --}}
            <div class="lg:col-span-8">
                <div class="flex items-start gap-3 sm:items-center sm:gap-4">
                    <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl border border-brand-100 bg-white p-1.5 shadow-lg sm:h-16 sm:w-16 md:h-20 md:w-20">
                        <img src="{{ $university['logo'] }}"
                             alt="{{ $university['name'] }} logo"
                             class="h-full w-full rounded-xl object-contain">
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="mb-1.5 text-[11px] font-semibold uppercase tracking-[0.16em] text-brand-200 sm:mb-2 sm:text-xs">
                            University profile
                        </p>
                        <h1 class="text-2xl font-semibold leading-tight tracking-tight text-white sm:text-3xl md:text-4xl lg:text-[42px]">
                            {{ $university['name'] }}
                        </h1>
                    </div>
                </div>

                <div class="mt-5 flex flex-wrap items-center gap-x-5 gap-y-2.5 text-sm text-brand-100 sm:mt-6 sm:gap-x-6 sm:gap-y-3">
                    <span class="inline-flex items-center gap-2">
                        <iconify-icon icon="lucide:map-pin" class="text-accent-two-500"></iconify-icon>
                        {{ $university['city'] }}
                    </span>
                    <span class="inline-flex items-center gap-2">
                        <iconify-icon icon="lucide:calendar-days" class="text-accent-two-500"></iconify-icon>
                        Established {{ $university['established'] }}
                    </span>
                    <span class="inline-flex items-center gap-2">
                        <iconify-icon icon="lucide:book-open" class="text-accent-two-500"></iconify-icon>
                        Public Research University
                    </span>
                </div>
            </div>

            {{-- Right: Key Info Card --}}
            <div class="lg:col-span-4">
                <div class="rounded-2xl border border-brand-100/20 bg-white/10 p-4 shadow-xl backdrop-blur-md sm:p-5">
                    <div class="flex items-center justify-between gap-3">
                        <span class="text-[11px] font-semibold uppercase tracking-wider text-brand-100 sm:text-xs">
                            Key information
                        </span>
                        <span class="rounded-full bg-accent-one-500-light px-2.5 py-1 text-[11px] font-semibold text-brand-800 sm:px-3 sm:text-xs">
                            Admission Open
                        </span>
                    </div>
                    <div class="my-4 border-t border-white/15 sm:my-5"></div>
                    <p class="text-center text-sm text-brand-100">Estimated annual tuition</p>
                    <p class="mt-1 text-center text-xl font-semibold text-white sm:text-2xl">
                        {{ $university['tuition'] }}
                        <span class="text-sm font-medium text-brand-200">AUD</span>
                    </p>
                    <a href="#enquiry"
                       class="mt-4 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-red-500 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-red-600 focus:outline-none focus:ring-0 focus:ring-red-200 focus:ring-offset-0 focus:ring-offset-red-950 sm:mt-5 sm:px-5 sm:py-3">
                        Enquire about admission
                        <iconify-icon icon="lucide:arrow-up-right"></iconify-icon>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- STICKY SECTION NAVIGATION --}}
<div class="sticky top-29 z-40 border-b border-brand-100 bg-white/95  backdrop-blur-sm">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <nav aria-label="University sections" class="-mb-px flex gap-5 overflow-x-auto scrollbar-hide sm:gap-7">
            @foreach ($sectionLinks as $item)
                <a href="#{{ $item['id'] }}"
                   @click="activeSection = '{{ $item['id'] }}'"
                   :class="activeSection === '{{ $item['id'] }}'
                       ? 'border-brand-500 text-brand-600'
                       : 'border-transparent text-brand-700 hover:border-brand-200 hover:text-brand-600'"
                   class="shrink-0 border-b-2 py-3.5 text-sm font-semibold transition sm:py-4">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>
    </div>
</div>

<main class="mx-auto max-w-7xl space-y-14 px-4 py-10 sm:space-y-16 sm:px-6 sm:py-14 lg:space-y-24 lg:px-8 lg:py-20">

    {{-- OVERVIEW --}}
    <section id="overview" class="scroll-mt-28 sm:scroll-mt-32 lg:scroll-mt-40">
        <div class="mb-6 max-w-2xl sm:mb-8">
            <p class="text-xs font-semibold uppercase tracking-[0.16em] text-brand-600">About the institution</p>
            <h2 class="mt-2 text-xl font-semibold leading-tight tracking-tight text-brand-950 sm:mt-3 sm:text-2xl lg:text-3xl">
                Discover {{ $university['name'] }}
            </h2>
            <p class="mt-2 text-sm leading-6 text-brand-700 sm:mt-3 sm:text-base ">
                Get to know the university, its academic environment and the opportunities available to students.
            </p>
        </div>

        <div class="grid grid-cols-1 items-center gap-8 lg:grid-cols-2 lg:gap-14">
            {{-- Image --}}
            <div class="relative order-1">
                <div class="overflow-hidden rounded-2xl border border-brand-100 bg-brand-50">
                    <img src="{{ asset('australia.webp') }}"
                         alt="{{ $university['name'] }} campus"
                         class="aspect-[4/3] h-full w-full object-cover"
                         loading="lazy">
                </div>
                <div class="absolute bottom-3 left-3 rounded-lg border border-white/30 bg-brand-950/80 px-2.5 py-1.5 text-xs font-medium text-white backdrop-blur sm:bottom-4 sm:left-4 sm:px-3 sm:py-2 sm:text-sm">
                    <iconify-icon icon="lucide:map-pin" class="mr-1 text-accent-two-500"></iconify-icon>
                    Parkville, Melbourne, Australia
                </div>
                <div class="absolute -bottom-4 -right-3 hidden min-w-[7.5rem] rounded-xl border border-brand-100 bg-white p-3 shadow-lg sm:-bottom-5 sm:-right-4 sm:block sm:min-w-32 sm:p-4">
                    <p class="text-xs font-medium text-red-700 flex items-center gap-1"><iconify-icon icon="lucide:globe" class="text-base sm:text-lg"></iconify-icon> Ranking</p>
                    <p class="mt-0.5 text-2xl font-semibold text-red-600 sm:mt-1 sm:text-3xl">90</p>
                </div>
            </div>

            {{-- Content --}}
            <div class="order-2">
                <div class="space-y-3 text-sm leading-6 text-brand-700 sm:space-y-4 sm:text-base ">
                    <p>
                        Established in 1853, the University of Melbourne is one of Australia's leading institutions for education and research. Known for its academic excellence, innovative learning environment and global outlook, the university offers students opportunities to develop knowledge, skills and professional experience.
                    </p>
                    <p>
                        Located in Melbourne, Victoria, the university brings together a diverse academic community, internationally recognised research and a vibrant campus experience. Its main Parkville campus combines historic architecture with modern learning and research facilities.
                    </p>
                </div>

                <div class="mt-6 grid grid-cols-1 gap-3 sm:mt-8 sm:grid-cols-2">
                    @php
                        $facts = [
                            ['icon' => 'trophy', 'label' => 'National ranking', 'value' => $university['ranking']],
                            ['icon' => 'users', 'label' => 'Total students', 'value' => $university['students']],
                            ['icon' => 'book-open', 'label' => 'Study programs', 'value' => $university['programs']],
                            ['icon' => 'school', 'label' => 'Campuses', 'value' => '7 Campuses'],
                        ];
                    @endphp
                    @foreach ($facts as $fact)
                        <div class="flex items-center gap-3 rounded-xl border border-brand-100 bg-white p-3.5 transition hover:border-brand-200 hover:shadow-sm sm:p-4">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 sm:h-11 sm:w-11">
                                <iconify-icon icon="lucide:{{ $fact['icon'] }}" class="text-lg sm:text-xl"></iconify-icon>
                            </span>
                            <span class="min-w-0">
                                <span class="block text-xs font-medium text-brand-700">{{ $fact['label'] }}</span>
                                <span class="mt-0.5 block text-sm font-semibold text-brand-950">{{ $fact['value'] }}</span>
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- STUDY PROGRAMS --}}
    <section id="programs" class="scroll-mt-28 sm:scroll-mt-32 lg:scroll-mt-40">
        <div class="mb-6 flex flex-col gap-3 sm:mb-8 sm:flex-row sm:items-end sm:justify-between sm:gap-4">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.16em] text-brand-600">Find your course</p>
                <h2 class="mt-2 text-xl font-semibold leading-tight text-brand-950 sm:mt-3 sm:text-2xl lg:text-3xl">
                    Popular Study Programs
                </h2>
                <p class="mt-1.5 text-sm leading-6 text-brand-700 sm:mt-2 sm:text-base ">
                    Explore some of the available academic opportunities.
                </p>
            </div>
            <a href="#enquiry"
               class="inline-flex shrink-0 items-center gap-2 text-sm font-semibold text-brand-600 transition hover:text-brand-800">
                View all programs
                <iconify-icon icon="lucide:arrow-up-right"></iconify-icon>
            </a>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($programs as $program)
                <article class="flex h-full flex-col rounded-2xl border border-brand-100 bg-white p-4 transition duration-200 hover:-translate-y-1 hover:border-brand-200 hover:shadow-lg sm:p-5">
                    <div class="flex items-center justify-between gap-3">
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-50 text-brand-600 sm:h-11 sm:w-11">
                            <iconify-icon icon="lucide:{{ $program['icon'] }}" class="text-lg sm:text-xl"></iconify-icon>
                        </span>
                        <span class="rounded-full bg-brand-50 px-2.5 py-1 text-xs font-semibold text-brand-700 sm:px-3 sm:py-1.5">
                            {{ $program['level'] }}
                        </span>
                    </div>
                    <h3 class="mt-4 min-h-[2.75rem] text-sm font-semibold leading-5 text-brand-950 sm:mt-5 sm:min-h-12 sm:text-base sm:leading-6">
                        {{ $program['name'] }}
                    </h3>
                    <div class="mt-4 space-y-2.5 border-t border-brand-100 pt-3.5 sm:mt-5 sm:space-y-3 sm:pt-4">
                        <div class="flex items-center justify-between gap-3 text-sm">
                            <span class="inline-flex items-center gap-2 text-brand-700">
                                <iconify-icon icon="lucide:clock"></iconify-icon>
                                Duration
                            </span>
                            <span class="font-medium text-brand-950">{{ $program['duration'] }}</span>
                        </div>
                        <div class="flex items-center justify-between gap-3 text-sm">
                            <span class="inline-flex items-center gap-2 text-brand-700">
                                <iconify-icon icon="lucide:wallet"></iconify-icon>
                                Tuition fee
                            </span>
                            <span class="text-right font-semibold text-brand-600">{{ $program['fee'] }}</span>
                        </div>
                    </div>
                    <a href="#enquiry"
                       class="mt-4 flex items-center justify-between border-t border-brand-100 pt-3.5 text-sm font-semibold text-brand-600 hover:text-brand-800 sm:mt-5 sm:pt-4">
                        Enquire about program
                        <iconify-icon icon="lucide:arrow-right"></iconify-icon>
                    </a>
                </article>
            @endforeach
        </div>
    </section>

    {{-- ENTRY REQUIREMENTS --}}
    <section id="requirements" class="scroll-mt-28 sm:scroll-mt-32 lg:scroll-mt-40">
        <div class="mb-6 sm:mb-8">
            <p class="text-xs font-semibold uppercase tracking-[0.16em] text-brand-600">Before you apply</p>
            <h2 class="mt-2 text-xl font-semibold leading-tight text-brand-950 sm:mt-3 sm:text-2xl lg:text-3xl">
                Entry Requirements
            </h2>
            <p class="mt-1.5 text-sm leading-6 text-brand-700 sm:mt-2 sm:text-base ">
                Prepare the general documents needed for your application process.
            </p>
        </div>

        <div class="overflow-hidden rounded-2xl border border-brand-100 bg-white">
            <div class="flex items-center gap-3 border-b border-brand-100 bg-brand-25 px-4 py-4 sm:gap-4 sm:px-5 sm:py-5 md:px-7">
                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-brand-100 text-brand-600 sm:h-12 sm:w-12">
                    <iconify-icon icon="lucide:file-check-2" class="text-xl sm:text-2xl"></iconify-icon>
                </span>
                <div>
                    <h3 class="text-base font-semibold text-brand-950 sm:text-lg">Application Documents</h3>
                    <p class="mt-0.5 text-xs text-brand-700 sm:mt-1 sm:text-sm">General admission checklist</p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-3 p-4 sm:grid-cols-2 sm:p-5 md:p-7">
                @foreach ($requirements as $requirement)
                    <div class="flex items-center gap-3 rounded-xl border border-brand-100 bg-white p-3.5 sm:p-4">
                        <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg bg-accent-one-500-light text-brand-700 sm:h-7 sm:w-7">
                            <iconify-icon icon="lucide:check" class="text-sm sm:text-base"></iconify-icon>
                        </span>
                        <span class="text-sm font-medium leading-5 text-brand-800 sm:leading-6">{{ $requirement }}</span>
                    </div>
                @endforeach
            </div>

            <div class="flex items-start gap-3 border-t border-brand-100 bg-brand-25 px-4 py-3.5 sm:px-5 sm:py-4 md:px-7">
                <iconify-icon icon="lucide:info" class="mt-0.5 shrink-0 text-base text-brand-500 sm:text-lg"></iconify-icon>
                <p class="text-xs leading-5 text-brand-700 sm:text-sm sm:leading-6">
                    Admission requirements vary by course and applicant background. Always verify the latest specific requirements directly on the official university portal before submitting.
                </p>
            </div>
        </div>
    </section>

    {{-- TUITION & SCHOLARSHIPS --}}
    <section id="fees" class="scroll-mt-28 sm:scroll-mt-32 lg:scroll-mt-40">
        <div class="mb-6 sm:mb-8">
            <p class="text-xs font-semibold uppercase tracking-[0.16em] text-brand-600">Plan your budget</p>
            <h2 class="mt-2 text-xl font-semibold leading-tight text-brand-950 sm:mt-3 sm:text-2xl lg:text-3xl">
                Tuition Fees & Scholarships
            </h2>
            <p class="mt-1.5 text-sm leading-6 text-brand-700 sm:mt-2 sm:text-base ">
                Get an overview of estimated study costs and financial support options.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-5">
            <article class="flex min-h-[240px] flex-col justify-between rounded-2xl bg-brand-950 p-5 text-white sm:min-h-[270px] sm:p-6 md:p-8">
                <div>
                    <div class="flex items-center justify-between gap-3">
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/10 text-brand-200 sm:h-12 sm:w-12">
                            <iconify-icon icon="lucide:wallet" class="text-xl sm:text-2xl"></iconify-icon>
                        </span>
                        <span class="rounded-full border border-white/20 bg-white/10 px-2.5 py-1 text-[11px] font-semibold text-brand-100 sm:px-3 sm:py-1.5 sm:text-xs">
                            AUD / Year
                        </span>
                    </div>
                    <p class="mt-5 text-sm font-medium text-brand-200 sm:mt-7">Estimated annual tuition</p>
                    <h3 class="mt-1.5 text-2xl font-semibold tracking-tight sm:mt-2 sm:text-3xl md:text-4xl">
                        {{ $university['tuition'] }}
                    </h3>
                </div>
                <p class="mt-5 border-t border-white/15 pt-3.5 text-sm leading-6 text-brand-100 sm:mt-7 sm:pt-4">
                    Tuition varies depending on your selected degree program, study load, and academic intake.
                </p>
            </article>

            <article class="flex min-h-[240px] flex-col justify-between rounded-2xl border border-brand-100 bg-white p-5 sm:min-h-[270px] sm:p-6 md:p-8">
                <div>
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-50 text-brand-600 sm:h-12 sm:w-12">
                        <iconify-icon icon="lucide:award" class="text-xl sm:text-2xl"></iconify-icon>
                    </span>
                    <h3 class="mt-5 text-lg font-semibold text-brand-950 sm:mt-6 sm:text-xl">Scholarship Opportunities</h3>
                    <p class="mt-2.5 text-sm leading-6 text-brand-700 sm:mt-3 sm:text-base ">
                        Explore available merit-based scholarships, financial grants, and partial fee waiver options available for eligible international students.
                    </p>
                </div>
                <div class="mt-5 sm:mt-7">
                    <a href="#counsellor"
                       class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-brand-500 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-brand-600 sm:w-auto sm:px-5 sm:py-3">
                        Find a counsellor
                        <iconify-icon icon="lucide:arrow-right"></iconify-icon>
                    </a>
                </div>
            </article>
        </div>
    </section>

    {{-- CAMPUS LIFE --}}
    <section id="campus" class="scroll-mt-28 sm:scroll-mt-32 lg:scroll-mt-40">
        <div class="mb-6 sm:mb-8">
            <p class="text-xs font-semibold uppercase tracking-[0.16em] text-brand-600">Student experience</p>
            <h2 class="mt-2 text-xl font-semibold leading-tight text-brand-950 sm:mt-3 sm:text-2xl lg:text-3xl">
                Campus Life & Facilities
            </h2>
            <p class="mt-1.5 text-sm leading-6 text-brand-700 sm:mt-2 sm:text-base ">
                Explore the key amenities and facilities that create a supportive student environment.
            </p>
        </div>

        <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-4">
            @foreach ($facilities as $facility)
                <article class="rounded-2xl border border-brand-100 bg-white p-3.5 transition hover:border-brand-200 hover:shadow-md sm:p-4 md:p-5">
                    <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-brand-50 text-brand-600 sm:h-11 sm:w-11">
                        <iconify-icon icon="lucide:{{ $facility['icon'] }}" class="text-lg sm:text-xl"></iconify-icon>
                    </span>
                    <h3 class="mt-3 text-sm font-semibold leading-5 text-brand-950 sm:mt-4 sm:text-base sm:leading-6">
                        {{ $facility['name'] }}
                    </h3>
                </article>
            @endforeach
        </div>
    </section>

    {{-- CAMPUS LOCATIONS --}}
    <section id="campus-list" class="scroll-mt-28 sm:scroll-mt-32 lg:scroll-mt-40">
        <div class="mb-6 sm:mb-8">
            <p class="text-xs font-semibold uppercase tracking-[0.16em] text-brand-600">Global presence</p>
            <h2 class="mt-2 text-xl font-semibold leading-tight text-brand-950 sm:mt-3 sm:text-2xl lg:text-3xl">
                Available Campus Locations
            </h2>
            <p class="mt-1.5 text-sm leading-6 text-brand-700 sm:mt-2 sm:text-base ">
                Explore the university's campus locations and their surrounding regions.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-4">
            @foreach ($campuses as $campus)
                <article class="overflow-hidden rounded-2xl border border-brand-100 bg-white transition hover:-translate-y-1 hover:border-brand-200 hover:shadow-lg">
                    <div class="relative h-40 overflow-hidden bg-brand-50 sm:h-44">
                        <img src="{{ $campus['image'] }}"
                             alt="{{ $campus['name'] }}"
                             class="h-full w-full object-cover"
                             loading="lazy">
                        <div class="absolute inset-0 bg-gradient-to-t from-brand-950/70 to-transparent"></div>
                        <span class="absolute bottom-2.5 left-2.5 rounded-full bg-white px-2.5 py-1 text-[11px] font-semibold text-brand-800 sm:bottom-3 sm:left-3 sm:px-3 sm:text-xs">
                            {{ $campus['country'] }}
                        </span>
                    </div>
                    <div class="p-4 sm:p-5">
                        <h3 class="text-base font-semibold text-brand-950 sm:text-lg">{{ $campus['name'] }}</h3>
                        <p class="mt-2.5 flex items-start gap-2 text-sm leading-5 text-brand-700 sm:mt-3 sm:leading-6">
                            <iconify-icon icon="lucide:map-pin" class="mt-0.5 shrink-0 text-brand-500"></iconify-icon>
                            <span>{{ $campus['address'] }}</span>
                        </p>
                        <div class="mt-4 flex items-center justify-between gap-3 border-t border-brand-100 pt-3.5 sm:mt-5 sm:pt-4">
                            <span class="rounded-lg bg-brand-50 px-2 py-1 text-[11px] font-medium text-brand-700 sm:px-2.5 sm:text-xs">
                                {{ $campus['state'] }}
                            </span>
                            <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($campus['address'] . ', ' . $campus['country']) }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="inline-flex items-center gap-1.5 text-xs font-semibold text-brand-600 transition hover:text-brand-800">
                                View on map
                                <iconify-icon icon="lucide:external-link"></iconify-icon>
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
</main>
</div>
@endsection

