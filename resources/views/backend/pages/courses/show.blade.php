@extends('backend.layouts.app')

@section('content')
    <div class="">

        @if (session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
                class="fixed top-3 right-5 z-99999 w-full max-w-sm">
                <div class="relative">
                    <button @click="show = false" class="absolute top-3 right-3 z-10 text-neutral-500 hover:text-neutral-700">
                        ✕
                    </button>

                    <x-ui.alert variant="success" title="" message="{{ session('success') }}" />
                </div>
            </div>
        @endif

        <div class="mx-auto max-w-6xl space-y-6 text-neutral-800 dark:text-neutral-100">

    {{-- Top Action Header --}}
    <div class="flex flex-wrap items-center justify-between gap-4">
        <div>
            <h1 class="text-xl font-bold tracking-tight text-neutral-900 dark:text-white">Course Details</h1>
            <p class="text-sm text-neutral-500 dark:text-neutral-400">Manage course information, intakes, and scholarship details.</p>
        </div>
        <div class="flex flex-wrap items-center gap-2">
            <button type="button" class="inline-flex items-center gap-2 rounded-xl border border-neutral-200 bg-white px-4 py-2 text-sm font-semibold text-neutral-700 shadow-sm hover:bg-neutral-50 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-200 dark:hover:bg-neutral-700">
                <svg class="h-4 w-4 text-brand-600 dark:text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Intake
            </button>
            <button type="button" class="inline-flex items-center gap-2 rounded-xl bg-brand-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-brand-700 focus:outline-none dark:bg-brand-500 dark:hover:bg-brand-600">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Scholarship
            </button>
        </div>
    </div>

    {{-- Banner Section --}}
    <div class="relative overflow-hidden rounded-3xl bg-brand-500  p-8 text-white shadow-lg">
        <div class="relative z-10 space-y-4">
            <div class="flex flex-wrap items-center gap-2">
                <span class="rounded-full bg-white/10 px-3 py-1 text-xs font-semibold uppercase tracking-wider text-white backdrop-blur-md">
                    {{ $course->degree_level }}
                </span>
                <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-500/20 px-3 py-1 text-xs font-semibold text-emerald-200 backdrop-blur-md">
                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                    {{ $course->is_active ? 'Open for Applications' : 'Closed' }}
                </span>
            </div>

            <h1 class="text-3xl font-extrabold tracking-tight md:text-4xl">
                {{ $course->title }}
            </h1>

            <div class="flex flex-wrap items-center gap-4 text-sm font-medium text-white/80">
                @if ($course->university)
                    <span class="flex items-center gap-1.5">
                        <svg class="h-4 w-4 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m0 0h4m-4 0V11m0 0h4m-4 0H9m4 0v10M9 11V5" />
                        </svg>
                        {{ $course->university->name }}
                    </span>
                @endif

                @if ($course->campuses->isNotEmpty())
                    <div class="flex flex-wrap gap-2">
                        @foreach ($course->campuses as $campus)
                            <span class="inline-flex items-center gap-1 rounded-lg bg-white/20 px-2.5 py-1 text-xs text-white backdrop-blur-md">
                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $campus->name }}
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Key Stats Grid --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <div class="flex items-center gap-4 rounded-2xl border border-neutral-100 bg-white p-5 shadow-sm dark:border-neutral-800 dark:bg-neutral-900">
            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 dark:bg-brand-950 dark:text-brand-400">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-neutral-400">Duration</p>
                <p class="text-lg font-bold text-neutral-900 dark:text-white">{{ $course->duration_months }} Months</p>
            </div>
        </div>

        <div class="flex items-center gap-4 rounded-2xl border border-neutral-100 bg-white p-5 shadow-sm dark:border-neutral-800 dark:bg-neutral-900">
            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 dark:bg-emerald-950 dark:text-emerald-400">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-neutral-400">Tuition Fee</p>
                <p class="text-lg font-bold text-neutral-900 dark:text-white">{{ $course->currency }} {{ number_format($course->tuition_fee, 2) }}</p>
            </div>
        </div>

        <div class="flex items-center gap-4 rounded-2xl border border-neutral-100 bg-white p-5 shadow-sm dark:border-neutral-800 dark:bg-neutral-900">
            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-purple-50 text-purple-600 dark:bg-purple-950 dark:text-purple-400">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-neutral-400">Application Fee</p>
                <p class="text-lg font-bold text-neutral-900 dark:text-white">{{ $course->application_fee > 0 ? $course->currency . ' ' . number_format($course->application_fee, 2) : 'Free' }}</p>
            </div>
        </div>

        <div class="flex items-center gap-4 rounded-2xl border border-neutral-100 bg-white p-5 shadow-sm dark:border-neutral-800 dark:bg-neutral-900">
            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-amber-50 text-amber-600 dark:bg-amber-950 dark:text-amber-400">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-neutral-400">Category</p>
                <p class="text-lg font-bold text-neutral-900 dark:text-white">{{ $course->category?->name ?? 'N/A' }}</p>
            </div>
        </div>
    </div>

    {{-- Single Clean Layout Body --}}
    <div class="space-y-8 rounded-2xl border border-neutral-100 bg-white p-6 shadow-sm dark:border-neutral-800 dark:bg-neutral-900 md:p-8">


        {{-- Intakes List --}}
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <h2 class="text-base font-bold text-neutral-900 dark:text-white">Course Intakes</h2>
                <span class="text-xs font-medium text-neutral-400">Showing all available sessions</span>
            </div>

            @if(!empty($course->intakes) && $course->intakes->isNotEmpty())
                <div class="divide-y divide-neutral-100 dark:divide-neutral-800 rounded-xl bg-neutral-50 dark:bg-neutral-800/50">
                    @foreach($course->intakes as $intake)
                        <div class="flex flex-wrap items-center justify-between p-4 gap-2">
                            <div class="space-y-1">
                                <span class="text-sm font-semibold text-neutral-900 dark:text-white">{{ $intake->month }} {{ $intake->year }}</span>
                                <p class="text-xs text-neutral-500 dark:text-neutral-400">Deadline: {{ $intake->deadline ?? 'N/A' }}</p>
                            </div>
                            <span class="rounded-lg bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700 dark:bg-emerald-950 dark:text-emerald-400">
                                {{ $intake->status ?? 'Open' }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="rounded-xl bg-neutral-50 p-4 text-center text-xs text-neutral-500 dark:bg-neutral-800/50 dark:text-neutral-400">
                    No intakes added yet. Click "Add Intake" above to set up course availability.
                </div>
            @endif
        </div>

        <hr class="border-neutral-100 dark:border-neutral-800" />

        {{-- Scholarships List --}}
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <h2 class="text-base font-bold text-neutral-900 dark:text-white">Scholarships & Grants</h2>
                <span class="text-xs font-medium text-neutral-400">Available funding options</span>
            </div>

            @if(!empty($course->scholarships) && $course->scholarships->isNotEmpty())
                <div class="divide-y divide-neutral-100 dark:divide-neutral-800 rounded-xl bg-neutral-50 dark:bg-neutral-800/50">
                    @foreach($course->scholarships as $scholarship)
                        <div class="flex flex-wrap items-center justify-between p-4 gap-2">
                            <div class="space-y-1">
                                <span class="text-sm font-semibold text-neutral-900 dark:text-white">{{ $scholarship->title }}</span>
                                <p class="text-xs text-neutral-500 dark:text-neutral-400">{{ $scholarship->description }}</p>
                            </div>
                            <span class="text-xs font-bold text-emerald-600 dark:text-emerald-400">
                                {{ $scholarship->amount_coverage }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="rounded-xl bg-neutral-50 p-4 text-center text-xs text-neutral-500 dark:bg-neutral-800/50 dark:text-neutral-400">
                    No scholarships attached to this course yet.
                </div>
            @endif
        </div>

    </div>
</div>

    </div>
@endsection
