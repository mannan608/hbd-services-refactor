@php
    $academyData = [
        'sectionHeader' => [
            'badge' => 'HBD Language Academy',
            'title' => 'Pass your english proficiency exams with confidence',
            'description' => 'Structured classes, timed mock tests, and personal feedback from trainers who know exactly what examiners look for.',
        ],

        'courses' => [
            [
                'id' => 'ielts',
                'title' => 'IELTS Preparation',
                'description' => 'Academic and General Training. Build skills across all four modules with exam-style practice.',
                'icon' => 'fa-solid fa-headphones',
                'tags' => ['Listening', 'Reading', 'Writing', 'Speaking'],
                'features' => [
                    'Band score strategy for university and visa needs',
                    'Writing task 1 and 2 correction with feedback',
                    'Speaking practice with mock interviews',
                ],
            ],
            [
                'id' => 'pte',
                'title' => 'PTE Academic Preparation',
                'description' => 'Train on a computer-based format so test day feels familiar, with a focus on integrated skills.',
                'icon' => 'fa-solid fa-laptop',
                'tags' => ['Speaking & Writing', 'Reading', 'Listening'],
                'features' => [
                    'Templates and techniques for each question type',
                    'Computer-based mock tests with score reports',
                    'Pronunciation and fluency coaching',
                ],
            ],
            [
                'id' => 'naati',
                'title' => 'NAATI CCL Preparation',
                'description' => 'Earn credentialed community language points for your Australian migration pathway.',
                'icon' => 'fa-solid fa-comments',
                'tags' => ['Dialogues', 'Interpreting', 'Vocabulary'],
                'features' => [
                    'Practice with real exam-style dialogues',
                    'Note-taking and memory techniques',
                    'Domain vocabulary for health, legal, education & more',
                ],
            ],
        ],

        'formats' => [
            ['title' => 'Group Batches', 'description' => 'Small classes with peers on the same goal'],
            ['title' => 'One-to-One', 'description' => 'Private sessions focused on your weak areas'],
            ['title' => 'Mock Test Days', 'description' => 'Full timed tests with detailed review'],
        ],

        'studentBenefits' => [
            'Free level assessment before you enrol',
            'Official-style practice material',
            'Weekly progress reports',
            'Online and in-person class options',
        ],

        'cta' => [
            'text' => 'Book a free level check',
            'url' => 'https://hbdservices.com/contacts',
        ],
    ];
@endphp

<section class="relative overflow-hidden bg-brand-25 py-16 sm:py-20 lg:py-24">
    <div class="pointer-events-none absolute -right-24 top-16 h-80 w-80 rounded-full bg-brand-100/60 blur-[120px]"></div>

    <div class="relative mx-auto w-full max-w-7xl px-6 lg:px-8">

        {{-- Section header --}}
        <div class="mx-auto max-w-3xl text-center" data-reveal>
            <span class="inline-flex items-center gap-2 rounded-full border border-brand-100 bg-white px-4 py-1.5 text-[12px] font-semibold uppercase tracking-[0.16em] text-brand-600">
                <i class="fa-solid fa-sparkles"></i>
                HBD Language Academy
            </span>
            <h2 class="mt-5 text-[28px] font-semibold leading-[1.2] tracking-[-0.02em] text-black sm:text-[30px] lg:text-[32px]">
               Pass your <span class="text-red-500">english proficiency</span> exams with confidence
            </h2>
            <p class="mx-auto mt-4 max-w-xl text-base leading-7 text-black/60">
                Structured classes, timed mock tests, and personal feedback from trainers who know exactly what examiners look for.
            </p>
        </div>

        {{-- Courses --}}
        <div class="mt-12 grid grid-cols-1 gap-6 lg:mt-14 lg:grid-cols-3">
            @foreach ($academyData['courses'] as $course)
            <div class="" data-reveal style="--reveal-delay: {{ $loop->index * 100 }}ms">
                <div class="group flex flex-col rounded-2xl border border-brand-100 bg-white p-7 shadow-[0_1px_2px_rgba(16,24,40,0.04)] transition-all duration-300 hover:-translate-y-1.5 hover:border-brand-200 hover:shadow-theme-md">

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl border border-brand-100 bg-brand-50 text-brand-600 transition-all duration-300 group-hover:bg-brand-500 group-hover:text-white">
                        <i class="{{ $course['icon'] }} text-lg"></i>
                    </div>

                    <h3 class="mt-6 text-lg font-bold tracking-tight text-black transition-colors duration-200 group-hover:text-brand-600">
                        {{ $course['title'] }}
                    </h3>
                    <p class="mt-2.5 text-sm leading-6 text-black/60">{{ $course['description'] }}</p>

                    <div class="mt-5 flex flex-wrap gap-1.5">
                        @foreach ($course['tags'] as $tag)
                            <span class="rounded-lg bg-brand-50 px-2.5 py-1 text-[11px] font-semibold text-brand-700">{{ $tag }}</span>
                        @endforeach
                    </div>

                    <ul class="mt-6 space-y-2.5 border-t border-brand-100 pt-6">
                        @foreach ($course['features'] as $feature)
                            <li class="flex items-start gap-2.5 text-sm leading-6 text-black/65">
                                <i class="fa-solid fa-circle-check mt-0.5 shrink-0 text-sm text-success-500"></i>
                                <span>{{ $feature }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Formats + benefits --}}
        <div class="mt-6 grid grid-cols-1 items-stretch gap-6 lg:grid-cols-12">

            {{-- Formats --}}
            <div class="flex flex-col justify-center rounded-2xl border border-brand-100 bg-white p-8 lg:col-span-7" data-reveal>
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-50 text-brand-600">
                    <i class="fa-solid fa-calendar-days text-lg"></i>
                </span>
                <h3 class="mt-5 text-xl font-bold tracking-tight text-black sm:text-2xl">
                    Learn the way that fits your schedule
                </h3>
                <p class="mt-2 max-w-lg text-sm leading-6 text-black/60">
                    Pick a format, start with a free level check, and get a study plan built around your test date and target score.
                </p>

                <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-3">
                    @foreach ($academyData['formats'] as $format)
                        <div class="rounded-xl border border-brand-100 bg-brand-25 p-4 transition-colors duration-300 hover:border-brand-200">
                            <p class="text-sm font-bold text-black">{{ $format['title'] }}</p>
                            <p class="mt-1 text-xs leading-5 text-black/55">{{ $format['description'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Benefits + CTA --}}
            <div class="flex flex-col justify-between rounded-2xl bg-gradient-to-br from-brand-900 to-brand-950 p-8 text-white lg:col-span-5" data-reveal style="--reveal-delay: 120ms">
                <div>
                    <h3 class="text-xl font-bold tracking-tight">What every student gets</h3>
                    <ul class="mt-6 space-y-3.5">
                        @foreach ($academyData['studentBenefits'] as $benefit)
                            <li class="flex items-center gap-3 text-sm text-brand-100">
                                <span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-success-50 text-[10px] text-success-500">
                                    <i class="fa-solid fa-check"></i>
                                </span>
                                <span>{{ $benefit }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="mt-8 border-t border-white/10 pt-6">
                    <a href="{{ $academyData['cta']['url'] }}" target="_blank" rel="noopener noreferrer"
                        class="group flex w-full items-center justify-center gap-2 rounded-xl bg-red-500 px-6 py-3.5 text-sm font-semibold text-white shadow-lg shadow-red-500/30 transition-all duration-300 hover:-translate-y-0.5 hover:bg-red-500/90">
                        <span>{{ $academyData['cta']['text'] }}</span>
                        <i class="fa-solid fa-arrow-right text-sm transition-transform duration-300 group-hover:translate-x-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
