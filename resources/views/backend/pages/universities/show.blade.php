@extends('backend.layouts.app')

@section('title', $university->name)
@section('content')
    <div>
        {{-- SUCCESS MESSAGE --}}
        @if (session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
                class="fixed right-5 top-3 z-99999 w-full max-w-sm">
                <div class="relative">
                    <button @click="show = false" type="button"
                        class="absolute right-3 top-3 z-10 text-neutral-500 transition hover:text-neutral-700">
                        <iconify-icon icon="lucide:x"></iconify-icon>

                    </button>

                    <x-ui.alert variant="success" title="" message="{{ session('success') }}" />
                </div>
            </div>
        @endif

        <div class="sticky top-19 z-99999 w-full -mt-6.5 ">
            <div class="flex justify-center px-4 sm:px-6 lg:px-8">
                <nav
                    class="inline-flex max-w-full items-center gap-1 overflow-x-auto rounded-full
                        border border-neutral-200/80 bg-white p-1.5
                        shadow-lg shadow-neutral-900/5 backdrop-blur-xl
                        transition-all duration-300 no-scrollbar">

                    {{-- Intake --}}
                    <a href="{{ role_route('role.university-intakes.create', ['university' => $university->id]) }}"
                        class="group inline-flex shrink-0 items-center gap-2 rounded-full
                        px-4 py-2 text-xs font-semibold text-neutral-600
                        transition-all duration-200
                        hover:bg-brand-50/80 hover:text-brand-600">

                        <iconify-icon icon="lucide:calendar-days"
                            class="text-[16px] text-neutral-400 transition-colors
                            group-hover:text-brand-600">
                        </iconify-icon>

                        <span>Intakes</span>
                    </a>


                    {{-- Campus --}}
                    <a href="{{ role_route('role.campuses.create') }}"
                        class="group inline-flex shrink-0 items-center gap-2 rounded-full
                            px-4 py-2 text-xs font-semibold text-neutral-600
                            transition-all duration-200
                            hover:bg-brand-50/80 hover:text-brand-600">
                        <iconify-icon icon="lucide:building-2"
                            class="text-[16px] text-neutral-400 transition-colors
                            group-hover:text-brand-600"></iconify-icon>

                        <span>Campuses</span>
                    </a>


                    {{-- Program --}}
                    <a href="{{ role_route('role.courses.create') }}"
                        class="group inline-flex shrink-0 items-center gap-2 rounded-full
                            px-4 py-2 text-xs font-semibold text-neutral-600
                            transition-all duration-200
                            hover:bg-brand-50/80 hover:text-brand-600">
                        <iconify-icon icon="lucide:graduation-cap"
                            class="text-[16px] text-neutral-400 transition-colors
                            group-hover:text-brand-600"></iconify-icon>

                        <span>Programs</span>
                    </a>


                    {{-- Scholarship --}}
                    <a href="{{ role_route('role.scholarships.create') }}"
                        class="group inline-flex shrink-0 items-center gap-2 rounded-full
                        px-4 py-2 text-xs font-semibold text-neutral-600
                        transition-all duration-200
                        hover:bg-brand-50/80 hover:text-brand-600">
                        <iconify-icon icon="lucide:badge-dollar-sign"
                            class="text-[16px] text-neutral-400 transition-colors
                          group-hover:text-brand-600"></iconify-icon>

                        <span>Scholarships</span>

                        <span
                            class="inline-flex items-center rounded-full border border-amber-200/60
                           bg-amber-100 px-2 py-0.5 text-[10px] font-bold text-amber-800">
                            100%
                        </span>
                    </a>


                    {{-- Agent --}}
                    <a href="{{ role_route('role.providers.create') }}"
                        class="group inline-flex shrink-0 items-center gap-2 rounded-full
                        px-4 py-2 text-xs font-semibold text-neutral-600
                        transition-all duration-200
                        hover:bg-brand-50/80 hover:text-brand-600">
                        <iconify-icon icon="lucide:users"
                            class="text-[16px] text-neutral-400 transition-colors
                            group-hover:text-brand-600"></iconify-icon>

                        <span>Add Provider</span>
                    </a>

                </nav>
            </div>
        </div>


        <div class="mx-auto max-w-7xl space-y-6 px-4 py-6 sm:px-6 lg:px-8">

            {{-- PAGE HEADER --}}
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                <div>
                    <div class="flex items-center gap-2 text-xs font-medium text-neutral-400">
                        <a href="#" class="transition hover:text-brand-600">
                            Universities
                        </a>
                        <iconify-icon icon="lucide:chevron-right"></iconify-icon>
                        <span class="text-neutral-600">
                            University Details
                        </span>
                    </div>

                    <h1 class="mt-2 text-2xl font-extrabold tracking-tight text-neutral-950">
                        University Details
                    </h1>

                    <p class="mt-1 text-sm text-neutral-500">
                        View university information, campuses, programs, intakes and scholarship opportunities.
                    </p>
                </div>


                {{-- Actions --}}
                {{-- <div class="flex flex-wrap items-center gap-2">

                    <button type="button"
                        class="inline-flex items-center border border-brand-600 gap-2 rounded-lg bg-white
                               px-4 py-2 text-sm font-semibold text-brand-600 shadow-sm
                               transition hover:bg-brand-700 hover:shadow-md hover:text-white">
                        <iconify-icon icon="lucide:edit"></iconify-icon>
                        Edit
                    </button>
                </div> --}}

            </div>


            {{-- UNIVERSITY HERO --}}
            <section
                class="relative overflow-hidden rounded-3xl bg-brand-600
                       shadow-xl shadow-brand-600/10">

                {{-- Background Decoration --}}
                <div
                    class="absolute -right-24 -top-24 h-72 w-72 rounded-full
                           bg-white/10 blur-3xl">
                </div>

                <div
                    class="absolute -bottom-32 left-1/3 h-72 w-72 rounded-full
                           bg-brand-400/20 blur-3xl">
                </div>


                <div class="relative p-6 sm:p-8 lg:p-10">

                    <div class="flex flex-col gap-8 lg:flex-row lg:items-center lg:justify-between">

                        {{-- University Identity --}}
                        <div class="flex items-start gap-5">

                            {{-- Logo --}}
                            <div
                                class="flex h-20 w-20 shrink-0 items-center justify-center
                                       rounded-2xl bg-white shadow-lg
                                       ring-4 ring-white/10 sm:h-24 sm:w-24">
                                <img src="{{ asset($university->logo) }}" alt="{{ $university->name }} Logo"
                                    class="h-16 w-16 rounded-lg object-cover sm:h-20 sm:w-20">

                            </div>
                            <div class="min-w-0">

                                <h2
                                    class="text-2xl font-extrabold tracking-tight text-white
                                           sm:text-3xl lg:text-4xl">
                                    {{ $university->name }}
                                </h2>

                                <p class="mt-2 max-w-2xl text-sm leading-6 text-white/75 sm:text-base">
                                    A world-renowned university offering high-quality education,
                                    research and professional opportunities for international students.
                                </p>


                                {{-- Meta --}}
                                <div class="mt-5 flex flex-wrap gap-x-5 gap-y-2 text-sm text-white/80">

                                    <span class="inline-flex items-center gap-2">
                                        <iconify-icon icon="lucide:map-pin" class="h-4 w-4"></iconify-icon>
                                        {{ $university->address }}
                                    </span>

                                    <span class="inline-flex items-center gap-2">
                                        <iconify-icon icon="lucide:globe-2" class="h-4 w-4"></iconify-icon>
                                        {{ $university->country->name }}
                                    </span>

                                </div>

                            </div>

                        </div>


                        {{-- Ranking --}}
                        <div class="w-full sm:w-auto sm:min-w-[220px]">

                            <div
                                class="flex items-center justify-between gap-4 rounded-2xl border border-white/10
                                   bg-white/10 p-5 backdrop-blur-md">

                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-widest text-white/60">
                                        Global Ranking
                                    </p>

                                    <p class="mt-1 text-3xl font-black tracking-tight text-white">
                                        #{{ $university->global_ranking }}
                                    </p>

                                    <p class="mt-1 text-xs text-white/60">
                                        QS World University Rankings
                                    </p>
                                </div>

                                <div
                                    class="flex h-12 w-12 items-center justify-center
                                           rounded-xl bg-white/10 text-white">
                                    <iconify-icon icon="lucide:trophy" class="h-6 w-6"></iconify-icon>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </section>


            {{-- ============================================================
                QUICK STATS
            ============================================================= --}}
            {{-- <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <div
                    class="group rounded-2xl border border-neutral-200 bg-white p-5
                           shadow-sm transition-all duration-300
                           hover:-translate-y-0.5 hover:border-brand-200 hover:shadow-md">
                    <div class="flex items-center gap-4">

                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center
                                   rounded-xl bg-brand-50 text-brand-600
                                   transition group-hover:bg-brand-600 group-hover:text-white">
                            <iconify-icon icon="lucide:map-pin" class="h-5 w-5"></iconify-icon>
                        </div>

                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-wider text-neutral-400">
                                Location
                            </p>

                            <p class="mt-1 text-base font-bold text-neutral-950">
                                Melbourne
                            </p>

                            <p class="text-xs text-neutral-500">
                                Victoria, Australia
                            </p>
                        </div>

                    </div>
                </div>
                <div
                    class="group rounded-2xl border border-neutral-200 bg-white p-5
                           shadow-sm transition-all duration-300
                           hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-md">
                    <div class="flex items-center gap-4">

                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center
                                   rounded-xl bg-blue-50 text-blue-600
                                   transition group-hover:bg-blue-600 group-hover:text-white">
                            <iconify-icon icon="lucide:graduation-cap" class="h-5 w-5"></iconify-icon>
                        </div>

                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-wider text-neutral-400">
                                Programs
                            </p>

                            <p class="mt-1 text-base font-bold text-neutral-950">
                                180+
                            </p>

                            <p class="text-xs text-neutral-500">
                                Available programs
                            </p>
                        </div>

                    </div>
                </div>
                <div
                    class="group rounded-2xl border border-neutral-200 bg-white p-5
                           shadow-sm transition-all duration-300
                           hover:-translate-y-0.5 hover:border-purple-200 hover:shadow-md">
                    <div class="flex items-center gap-4">

                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center
                                   rounded-xl bg-purple-50 text-purple-600
                                   transition group-hover:bg-purple-600 group-hover:text-white">
                            <iconify-icon icon="lucide:building-2" class="h-5 w-5"></iconify-icon>
                        </div>

                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-wider text-neutral-400">
                                Campuses
                            </p>

                            <p class="mt-1 text-base font-bold text-neutral-950">
                                7
                            </p>

                            <p class="text-xs text-neutral-500">
                                Across Melbourne
                            </p>
                        </div>

                    </div>
                </div>
                <div
                    class="group rounded-2xl border border-neutral-200 bg-white p-5
                           shadow-sm transition-all duration-300
                           hover:-translate-y-0.5 hover:border-amber-200 hover:shadow-md">
                    <div class="flex items-center gap-4">

                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center
                                   rounded-xl bg-amber-50 text-amber-600
                                   transition group-hover:bg-amber-500 group-hover:text-white">
                            <iconify-icon icon="lucide:users" class="h-5 w-5"></iconify-icon>
                        </div>

                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-wider text-neutral-400">
                                International
                            </p>

                            <p class="mt-1 text-base font-bold text-neutral-950">
                                40,000+
                            </p>

                            <p class="text-xs text-neutral-500">
                                Students worldwide
                            </p>
                        </div>

                    </div>
                </div>

            </div> --}}


            {{-- ============================================================
                MAIN CONTENT
            ============================================================= --}}
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">

                {{-- ========================================================
                    LEFT COLUMN
                ========================================================= --}}
                <div class="space-y-6 lg:col-span-8">

                    {{-- Campuses --}}

                    @if ($university->campuses()->exists())
                        <section
                            class="rounded-2xl border border-neutral-200 bg-white
                               shadow-sm">

                            <div class="flex items-center justify-between border-b border-neutral-100 px-6 py-5">

                                <div class="flex items-center gap-3">

                                    <div
                                        class="flex h-10 w-10 items-center justify-center
                                           rounded-xl bg-blue-50 text-blue-600">
                                        <iconify-icon icon="lucide:map" class="h-5 w-5"></iconify-icon>
                                    </div>

                                    <div>
                                        <h3 class="text-base font-bold text-neutral-950">
                                            Campuses
                                        </h3>

                                        <p class="mt-0.5 text-xs text-neutral-500">
                                            University locations
                                        </p>
                                    </div>

                                </div>

                                <span
                                    class="rounded-full bg-blue-50 px-3 py-1
                                       text-xs font-bold text-blue-700">
                                    {{ $university->campuses()->count() }} Campuses
                                </span>

                            </div>

                            <div class="grid grid-cols-1 gap-3 p-6 sm:grid-cols-2">

                                @foreach ($university->campuses as $campus)
                                    <div
                                        class="group rounded-xl border border-neutral-200
                                           bg-white p-4 transition-all duration-300
                                           hover:border-brand-200 hover:bg-brand-50/30">

                                        <div class="flex items-center gap-3">

                                            <div
                                                class="flex h-10 w-10 shrink-0 items-center
                                                   justify-center rounded-xl bg-neutral-100
                                                   text-neutral-600 transition
                                                   group-hover:bg-brand-100 group-hover:text-brand-600">
                                                <iconify-icon icon="lucide:school" class="h-5 w-5"></iconify-icon>
                                            </div>

                                            <div class="min-w-0">
                                                <h4 class="text-sm font-bold text-neutral-900">
                                                    {{ $campus->name }}
                                                </h4>

                                                <p class="mt-0.5 flex items-center gap-1 text-xs text-neutral-500">
                                                    <iconify-icon icon="lucide:map-pin" class="h-3 w-3"></iconify-icon>
                                                    {{ $campus->address }}
                                                </p>
                                            </div>

                                        </div>

                                    </div>
                                @endforeach

                            </div>

                        </section>
                    @else
                        <div
                            class="rounded-lg border border-dashed border-neutral-300 bg-neutral-50 px-6 py-10 text-center">
                            <p class="text-sm font-medium text-neutral-700">
                                No campuses found
                            </p>
                            <p class="mt-1 text-sm text-neutral-500">
                                This university doesn't have any campuses yet.
                            </p>
                        </div>
                    @endif

                    {{-- Popular Programs --}}

                    @if ($university->courses()->exists())
                        <section
                            class="rounded-2xl border border-neutral-200 bg-white
                               shadow-sm">

                            <div class="flex items-center justify-between border-b border-neutral-100 px-6 py-5">

                                <div class="flex items-center gap-3">

                                    <div
                                        class="flex h-10 w-10 items-center justify-center
                                           rounded-xl bg-purple-50 text-purple-600">
                                        <iconify-icon icon="lucide:graduation-cap" class="h-5 w-5"></iconify-icon>
                                    </div>

                                    <div>
                                        <h3 class="text-base font-bold text-neutral-950">
                                            Popular Programs
                                        </h3>

                                        <p class="mt-0.5 text-xs text-neutral-500">
                                            Featured study options
                                        </p>
                                    </div>

                                </div>

                                <button type="button" class="text-xs font-bold text-brand-600 hover:text-brand-700">
                                    View All
                                </button>

                            </div>


                            <div class="divide-y divide-neutral-100">

                                @foreach ($university->courses as $program)
                                    <div
                                        class="group flex flex-col gap-3 px-6 py-4
                                           transition hover:bg-neutral-50 sm:flex-row
                                           sm:items-center sm:justify-between">

                                        <div class="flex items-center gap-3">

                                            <div
                                                class="flex h-9 w-9 shrink-0 items-center
                                                   justify-center rounded-lg bg-neutral-100
                                                   text-neutral-500
                                                   group-hover:bg-brand-50 group-hover:text-brand-600">
                                                <iconify-icon icon="lucide:book-open" class="h-4 w-4"></iconify-icon>
                                            </div>

                                            <div>
                                                <h4 class="text-sm font-semibold text-neutral-900">
                                                    {{ $program->title }}
                                                </h4>

                                                <p class="mt-0.5 text-xs text-neutral-500">
                                                    {{ $program->degree }}
                                                </p>
                                            </div>

                                        </div>


                                        <div class="flex items-center gap-4 pl-12 sm:pl-0">

                                            <span
                                                class="rounded-lg bg-neutral-100 px-2.5 py-1
                                                   text-xs font-semibold text-neutral-600">
                                                {{ $program->duration_months }} Months
                                            </span>
                                            <iconify-icon icon="lucide:chevron-right"
                                                class="h-4 w-4 text-neutral-300 transition
                                                   group-hover:translate-x-1 group-hover:text-brand-600"></iconify-icon>


                                        </div>

                                    </div>
                                @endforeach

                            </div>

                        </section>
                    @else
                        <div
                            class="rounded-lg border border-dashed border-neutral-300 bg-neutral-50 px-6 py-10 text-center">
                            <p class="text-sm font-medium text-neutral-700">
                                No programs found
                            </p>
                            <p class="mt-1 text-sm text-neutral-500">
                                This university doesn't have any programs yet.
                            </p>
                        </div>
                    @endif
                </div>


                {{-- RIGHT COLUMN --}}
                <aside class="space-y-6 lg:col-span-4">
                    {{-- Upcoming Intakes --}}
                    @if ($university->intakes()->exists())
                        <section
                            class="rounded-2xl border border-neutral-200 bg-white
                               shadow-sm">

                            <div class="flex items-center justify-between border-b border-neutral-100 px-6 py-5">

                                <div class="flex items-center gap-3">

                                    <div
                                        class="flex h-10 w-10 items-center justify-center
                                           rounded-xl bg-emerald-50 text-emerald-600">
                                        <iconify-icon icon="lucide:calendar-days" class="h-5 w-5"></iconify-icon>
                                    </div>

                                    <div>
                                        <h3 class="text-base font-bold text-neutral-950">
                                            Upcoming Intakes
                                        </h3>

                                        <p class="mt-0.5 text-xs text-neutral-500">
                                            Application periods
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-3 p-6">

                                @foreach ($university->intakes as $intake)
                                    <div
                                        class="rounded-xl border border-neutral-200
                                           p-4">

                                        <div class="flex items-center justify-between gap-3">

                                            <div>
                                                <h4 class="text-sm font-bold text-neutral-900">
                                                    {{ $intake->name }} {{ $intake->year }}
                                                </h4>

                                                <p class="mt-1 text-xs text-neutral-500">
                                                    {{ $intake->application_open_date?->format('d M Y') ?? 'N/A' }} To
                                                    {{ $intake->application_deadline?->format('d M Y') ?? 'N/A' }}
                                                </p>
                                            </div>

                                            <span
                                                class="{{ $intake->status === 'Open' ? 'bg-emerald-50 text-emerald-700' : 'bg-blue-50 text-blue-700' }}
                                                rounded-full px-2.5 py-1 text-[10px] font-bold uppercase">
                                                {{ $intake->status }}
                                            </span>

                                        </div>

                                    </div>
                                @endforeach

                            </div>

                        </section>
                    @else
                        <div
                            class="rounded-lg border border-dashed border-neutral-300 bg-neutral-50 px-6 py-10 text-center">
                            <p class="text-sm font-medium text-neutral-700">
                                No upcoming intakes found
                            </p>
                            <p class="mt-1 text-sm text-neutral-500">
                                This university doesn't have any upcoming intakes yet.
                            </p>
                        </div>
                    @endif
                    {{-- Scholarships --}}
                    <section
                        class="rounded-2xl border border-neutral-200 bg-white
                               shadow-sm">

                        <div class="border-b border-neutral-100 px-6 py-5">

                            <div class="flex items-center gap-3">

                                <div
                                    class="flex h-10 w-10 items-center justify-center
                                           rounded-xl bg-amber-50 text-amber-600">
                                    <iconify-icon icon="lucide:badge-dollar-sign" class="h-5 w-5"></iconify-icon>
                                </div>

                                <div>
                                    <h3 class="text-base font-bold text-neutral-950">
                                        Scholarships
                                    </h3>

                                    <p class="mt-0.5 text-xs text-neutral-500">
                                        Funding opportunities
                                    </p>
                                </div>

                            </div>

                        </div>


                        <div class="space-y-3 p-6">

                            <div class="rounded-xl bg-amber-50/70 p-4">

                                <div class="flex items-start justify-between gap-3">

                                    <div>
                                        <h4 class="text-sm font-bold text-neutral-900">
                                            Melbourne International Scholarship
                                        </h4>

                                        <p class="mt-1 text-xs leading-5 text-neutral-600">
                                            Tuition support for high-achieving international students.
                                        </p>
                                    </div>

                                    <span class="shrink-0 text-sm font-black text-amber-700">
                                        25%
                                    </span>

                                </div>

                            </div>


                            <div class="rounded-xl bg-emerald-50/70 p-4">

                                <div class="flex items-start justify-between gap-3">

                                    <div>
                                        <h4 class="text-sm font-bold text-neutral-900">
                                            Graduate Research Scholarship
                                        </h4>

                                        <p class="mt-1 text-xs leading-5 text-neutral-600">
                                            Financial support for eligible research students.
                                        </p>
                                    </div>

                                    <span class="shrink-0 text-sm font-black text-emerald-700">
                                        Full
                                    </span>

                                </div>

                            </div>

                        </div>

                    </section>

                    {{-- Contact Card --}}
                    <section
                        class="rounded-2xl border border-neutral-200 bg-white
                               shadow-sm">

                        <div class="border-b border-neutral-100 px-6 py-5">

                            <div class="flex items-center gap-3">

                                <div
                                    class="flex h-10 w-10 items-center justify-center
                                           rounded-xl bg-brand-50 text-brand-600">
                                    <iconify-icon icon="lucide:contact" class="h-5 w-5"></iconify-icon>

                                </div>

                                <div>
                                    <h3 class="text-base font-bold text-neutral-950">
                                        University Contact
                                    </h3>

                                    <p class="mt-0.5 text-xs text-neutral-500">
                                        Official contact information
                                    </p>
                                </div>

                            </div>

                        </div>


                        <div class="space-y-4 p-6">

                            <div class="flex items-start gap-3">

                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-neutral-50">
                                    <iconify-icon icon="lucide:globe-2" class="h-4 w-4 text-neutral-500"></iconify-icon>
                                </div>

                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-wider text-neutral-400">
                                        Website
                                    </p>

                                    <a href="#"
                                        class="mt-1 block text-sm font-semibold text-brand-600 hover:text-brand-700">
                                        {{ $university->website }}
                                    </a>
                                </div>

                            </div>


                            <div class="flex items-start gap-3">

                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-neutral-50">
                                    <iconify-icon icon="lucide:mail" class="h-4 w-4 text-neutral-500"></iconify-icon>
                                </div>

                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-wider text-neutral-400">
                                        Email
                                    </p>

                                    <p class="mt-1 text-sm font-semibold text-neutral-700">
                                        {{ $university->email }}
                                    </p>
                                </div>

                            </div>


                            <div class="flex items-start gap-3">

                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-neutral-50">
                                    <iconify-icon icon="lucide:phone" class="h-4 w-4 text-neutral-500"></iconify-icon>
                                </div>

                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-wider text-neutral-400">
                                        Phone
                                    </p>

                                    <p class="mt-1 text-sm font-semibold text-neutral-700">
                                        {{ $university->phone }}
                                    </p>
                                </div>

                            </div>


                            <div class="flex items-start gap-3">

                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-neutral-50">
                                    <iconify-icon icon="lucide:map-pin" class="h-4 w-4 text-neutral-500"></iconify-icon>
                                </div>

                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-wider text-neutral-400">
                                        Address
                                    </p>

                                    <p class="mt-1 text-xs font-semibold leading-5 text-neutral-700">
                                        {{ $university->address }} {{ $university->city->name?? '' }},
                                        {{ $university->state }}, {{ $university->country->name }}
                                    </p>
                                </div>

                            </div>

                        </div>

                    </section>
                </aside>
            </div>
        </div>
    </div>
@endsection
