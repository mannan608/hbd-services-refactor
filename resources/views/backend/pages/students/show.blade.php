@extends('backend.layouts.app')

@section('content')
    <div class="relative w-full">

        <main class="flex-1 space-y-6">
            <div class="grid grid-cols-1 items-start gap-6 lg:grid-cols-12">

                {{-- LEFT COLUMN --}}
                <div class="min-w-0 space-y-6 lg:col-span-8">

                    {{-- PROFILE HEADER --}}
                    <section class="overflow-hidden rounded-2xl border border-brand-100 bg-white shadow-sm">

                        {{-- Header Background --}}
                        <div class="relative h-20 bg-gradient-to-r from-brand-700 via-brand-600 to-brand-500 sm:h-24">
                            <div
                                class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(255,255,255,0.16),transparent_45%)]">
                            </div>
                        </div>


                        <div class="px-5 pb-6 sm:px-8">

                            <div class="-mt-14 relative flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">

                                {{-- Profile Photo + Basic Info --}}
                                <div class="flex flex-col items-start gap-4 sm:flex-row sm:items-end">

                                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Aisha Rahman"
                                        class="h-28 w-28 rounded-2xl border-4 border-white object-cover shadow-lg">


                                    <div class="pb-1">

                                        <div class="mb-3 flex flex-wrap items-center gap-2">

                                            <h1 class="text-2xl font-bold tracking-tight text-white">
                                                Aisha Rahman
                                            </h1>

                                            <span
                                                class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700 ring-1 ring-inset ring-emerald-200">
                                                <iconify-icon icon="lucide:circle-check" class="text-sm"></iconify-icon>

                                                Contract
                                            </span>

                                        </div>


                                        <p class="flex flex-wrap items-center gap-x-4 gap-y-1 text-sm text-slate-600">

                                            <span class="flex items-center gap-1.5">
                                                <iconify-icon icon="lucide:phone" class="text-brand-500"></iconify-icon>

                                                +880 1315 565037
                                            </span>


                                            <span class="flex items-center gap-1.5">
                                                <iconify-icon icon="lucide:mail" class="text-brand-500"></iconify-icon>

                                                aisha.rahman@email.com
                                            </span>

                                        </p>


                                        <p class="mt-1.5 flex items-center gap-1.5 text-sm text-slate-500">

                                            <iconify-icon icon="lucide:map-pin" class="text-brand-500"></iconify-icon>

                                            Dhaka, Bangladesh · Seeking study abroad

                                        </p>

                                    </div>

                                </div>


                                {{-- Key Stats --}}
                                <div class="flex gap-6 border-t border-brand-100 pt-4 sm:border-0 sm:pt-0">

                                    <div class="text-center">
                                        <p class="text-xl font-bold text-brand-950">
                                            3.82
                                        </p>

                                        <p class="mt-0.5 text-xs text-slate-500">
                                            GPA
                                        </p>
                                    </div>


                                    <div class="text-center">
                                        <p class="text-xl font-bold text-brand-950">
                                            7.5
                                        </p>

                                        <p class="mt-0.5 text-xs text-slate-500">
                                            IELTS
                                        </p>
                                    </div>
                                    <div class="text-center">
                                        <p class="text-xl font-bold text-brand-950">
                                            322
                                        </p>

                                        <p class="mt-0.5 text-xs text-slate-500">
                                            GRE General
                                        </p>
                                    </div>

                                </div>

                                {{-- lead/student status --}}
                                <div class="absolute -top-4 -right-2">
                                    <button type="button"
                                        class="rounded-lg bg-white px-4 py-2 text-sm font-semibold text-brand-600 shadow-sm transition hover:bg-brand-700 hover:text-white border border-brand-600">
                                        Lead Stage
                                    </button>
                                </div>

                            </div>


                            {{-- Tags + Action Buttons --}}
                            <div class="mt-4 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                                <div class="flex flex-wrap gap-2">

                                    <span
                                        class="rounded-full border border-brand-100 bg-brand-25 px-3 py-1.5 text-xs font-medium text-brand-700">
                                        VIP
                                    </span>


                                    <span
                                        class="rounded-full border border-brand-100 bg-brand-25 px-3 py-1.5 text-xs font-medium text-brand-700">
                                        Intake · September 2026
                                    </span>


                                    <span
                                        class="rounded-full border border-brand-100 bg-brand-25 px-3 py-1.5 text-xs font-medium text-brand-700">
                                        Scholarships
                                    </span>

                                </div>
                                <div class="flex flex-wrap gap-3">
                                    {{-- <button class="bg-white text-brand-600 border border-brand-600 px-4 py-2 rounded-lg text-sm hover:bg-brand-500 hover:text-white">Lead Status</button> --}}

                                    <button
                                        class="bg-brand-500  rounded-lg text-white px-4 py-2 text-sm hover:bg-brand-600 ">View
                                        History</button>


                                </div>
                            </div>

                        </div>

                    </section>

                    @include('backend.pages.students.assesment')

                    <div x-data="sectionNavigation({
                        offset: 125,
                        activationOffset: 180,
                        tabs: [{
                                id: 'personal-information',
                                label: 'Personal',
                                icon: 'lucide:user-round'
                            },
                            {
                                id: 'academic-background',
                                label: 'Academic',
                                icon: 'lucide:graduation-cap'
                            },
                            {
                                id: 'study-plan',
                                label: 'Study Plan',
                                icon: 'lucide:book-open'
                            },
                            {
                                id: 'financial-family',
                                label: 'Financial & Family',
                                icon: 'lucide:wallet'
                            },
                            {
                                id: 'experience',
                                label: 'Experience',
                                icon: 'lucide:briefcase-business'
                            },
                                {
                                id: 'immigration-history',
                                label: 'Immigration',
                                icon: 'lucide:shield-alert'
                            }
                        ]
                    })" class="space-y-6">
                        <nav aria-label="Profile sections"
                            class="sticky top-19 z-5 overflow-hidden rounded-2xl border border-slate-200 bg-white/95 shadow-sm backdrop-blur-md p-1.5">
                            <div x-ref="tabContainer"
                                class="flex min-w-0 items-center gap-2 overflow-x-auto whitespace-nowrap overscroll-x-contain">
                                <template x-for="tab in tabs" :key="tab.id">
                                    <button type="button" :data-tab="tab.id" @click="scrollToSection(tab.id)"
                                        :aria-current="activeTab === tab.id ? 'location' : null"
                                        :class="activeTab === tab.id ?
                                            'bg-brand-600 text-white shadow-sm' :
                                            'bg-slate-50 text-slate-600 hover:bg-slate-100'"
                                        class="inline-flex shrink-0 items-center gap-2 rounded-xl
                                                px-4 py-2.5 text-xs font-semibold transition-colors
                                                duration-200 focus:outline-none focus-visible:ring-2
                                                focus-visible:ring-brand-500 focus-visible:ring-offset-2">
                                        <iconify-icon :icon="tab.icon" class="text-base"></iconify-icon>
                                        <span x-text="tab.label"></span>
                                    </button>
                                </template>
                            </div>
                        </nav>

                        <div class="space-y-6">
                            {{-- 1. PERSONAL INFORMATION --}}
                            <section id="personal-information"
                                class="scroll-mt-28 rounded-2xl border border-slate-200 bg-white p-5 shadow-xs sm:p-6 space-y-6">
                                @include('backend.pages.students.partial.basic')
                            </section>

                            {{--  2. ACADEMIC BACKGROUND --}}
                            <section id="academic-background"
                                class="scroll-mt-28 rounded-2xl border border-slate-200 bg-white p-5 shadow-xs sm:p-6 space-y-6">
                                @include('backend.pages.students.partial.academic')
                            </section>

                            {{--  3. STUDY PLAN --}}
                            <section id="study-plan"
                                class="scroll-mt-28 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6 space-y-6">
                                @include('backend.pages.students.partial.study-plan')
                            </section>

                            {{--  4. FINANCIAL & FAMILY --}}
                            <section id="financial-family"
                                class="scroll-mt-28 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6 space-y-6">
                                @include('backend.pages.students.partial.financial')
                            </section>

                            {{--  5. EXPERIENCE --}}
                            <section id="experience"
                                class="scroll-mt-28 rounded-2xl border border-brand-100 bg-white p-5 shadow-sm sm:p-6">
                                @include('backend.pages.students.partial.experience')
                            </section>

                            {{--  6. IMMIGRATION HISTORY --}}
                            <section id="immigration-history"
                                class="scroll-mt-28 rounded-2xl border border-amber-100 bg-white p-5 shadow-sm sm:p-6 space-y-5">
                                @include('backend.pages.students.partial.immigration')
                            </section>

                            {{--  7. VISA DOCUMENTS --}}
                            <section id="visa-documents"
                                class="scroll-mt-28 rounded-2xl border border-brand-100 bg-white p-5 shadow-sm sm:p-6">
                                @include('backend.pages.students.partial.documents')
                            </section>

                            {{-- 8. APPLICATIONS HISTORY --}}
                            <section id="applications-history"
                                class="scroll-mt-28 rounded-2xl border border-brand-100 bg-white p-5 shadow-sm sm:p-6 space-y-5">
                                @include('backend.pages.students.partial.applications-history')
                            </section>

                            {{--  9. AFTER VISA --}}
                            <section id="after-visa"
                                class="scroll-mt-28 rounded-2xl border border-emerald-100 bg-white p-5 shadow-sm sm:p-6 space-y-5">
                                @include('backend.pages.students.partial.after-visa')
                            </section>

                        </div>
                    </div>
                </div>

                {{--  RIGHT COLUMN STICKY --}}
                <aside class="min-w-0 self-start lg:sticky lg:top-22 lg:col-span-4 z-999991">
                    @include('backend.pages.students.partial.lead-activity')
                </aside>
            </div>
        </main>
    </div>


    {{-- Activity History --}}
    <section id="activity-history" class="mt-12">
        @include('backend.pages.students.partial.activity-history')
    </section>
@endsection
