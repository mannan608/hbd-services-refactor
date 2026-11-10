@extends('backend.layouts.app')

@section('content')
    @php
        $tableRowData = collect([
            [
                'id' => 1001,
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'phone' => '+1 (555) 234-5678',
                'owner' => 'Md Abdul Mannan',
                'owner_initials' => 'MM',

                'counselling' => [
                    'total' => 3,
                    'people' => [['name' => 'Mannan', 'count' => 2], ['name' => 'Noman', 'count' => 1]],
                ],

                'exam' => [
                    'name' => 'IELTS',
                    'passing_year' => '2021',
                    'overall' => '50',
                    'score' => '40',
                ],

                'status' => 'Contacted',
                'status_class' => 'bg-emerald-50 text-emerald-700 border-emerald-200',

                'priority' => 'High',
                'priority_class' => 'bg-rose-50 text-rose-700 border-rose-200',

                'outcome' => [
                    'type' => 'File Open',
                    'date' => '12/20/2023',
                    'by' => 'mannan',
                ],

                'created' => [
                    'date' => '12/20/2023',
                    'by' => 'mannan',
                ],
            ],
        ])->values();
        $role = request()->route('role');

    @endphp

    <div x-data="{
        tableRowData: {{ \Illuminate\Support\Js::from($tableRowData) }},
        baseUrl: {{ \Illuminate\Support\Js::from(url('/' . $role . '/students')) }},
        filterOpen: false,
        assignOpen: false,
        serviceOpen: false,
    
        selectedLeads: [],
    
        copyMessage: '',
    
        toggleAll(event) {
            if (event.target.checked) {
                this.selectedLeads = this.tableRowData.map(row => row.id);
            } else {
                this.selectedLeads = [];
            }
        },
    
        async copyPhone(phone) {
    
            try {
    
                await navigator.clipboard.writeText(phone);
    
                this.copyMessage = 'Phone number copied';
    
                setTimeout(() => {
                    this.copyMessage = '';
                }, 1800);
    
            } catch (error) {
    
                this.copyMessage = 'Unable to copy number';
    
                setTimeout(() => {
                    this.copyMessage = '';
                }, 1800);
    
            }
        }
    }" class="flex flex-col gap-4 md:gap-6">

        <!-- Page Header -->
        @if (session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
                class="fixed top-3 right-5 z-[99999] w-full max-w-sm">
                <div class="relative">
                    <button @click="show = false" class="absolute top-3 right-3 z-10 text-neutral-500 hover:text-neutral-700">
                        ✕
                    </button>

                    <x-ui.alert variant="success" title="" message="{{ session('success') }}" />
                </div>
            </div>
        @endif

        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h3 class="text-lg font-semibold text-neutral-800 dark:text-white/90">Leads Management</h3>
                <p class="text-sm text-neutral-500 dark:text-neutral-400">Manage all leads.
                </p>
            </div>
            <div class="">
                <a href="{{ role_route('role.students.create') }}"
                    class="px-4 py-2 bg-brand-600 text-white rounded-lg text-sm font-medium hover:bg-brand-600 transition-colors">
                    + Add New Lead
                </a>
            </div>
        </div>



        <!-- SEARCH & FILTER BAR -->

        <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm">

            <div class="flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">

                <!-- Search UI -->
                <div class="relative w-full lg:flex-1">

                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">

                        <iconify-icon icon="lucide:search" class="text-base">
                        </iconify-icon>

                    </div>

                    <input type="text" placeholder="Search by lead name, email address, or phone number..."
                        class="w-full pl-10 pr-10 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 focus:bg-white transition">

                </div>


                <!-- Controls -->
                <div class="flex w-full lg:w-auto items-center gap-2">

                    <button type="button" @click="filterOpen = !filterOpen"
                        :class="filterOpen
                            ?
                            'bg-brand-50 border-brand-200 text-brand-700' :
                            'bg-slate-100 hover:bg-slate-200 text-slate-700 border-slate-200'"
                        class="flex-1 sm:flex-none px-4 py-2.5 text-sm font-semibold rounded-xl transition flex items-center justify-center gap-2 border">

                        <iconify-icon icon="lucide:sliders-horizontal" class="text-base text-brand-600">
                        </iconify-icon>

                        <span>
                            Advanced Filters
                        </span>

                    </button>


                    <!-- Rows -->
                    <div
                        class="flex items-center gap-2 text-xs text-slate-500 border-l border-slate-200 pl-3 whitespace-nowrap">

                        <span class="hidden sm:inline">
                            Rows:
                        </span>

                        <select
                            class="w-20 bg-slate-50 border border-slate-200 rounded-lg text-xs font-semibold text-slate-700 py-1.5 px-2 focus:outline-none focus:ring-2 focus:ring-brand-500/20">
                            <option>5</option>
                            <option selected>10</option>
                            <option>25</option>
                        </select>

                    </div>

                </div>

            </div>


            <!-- Quick Presets -->
            <div class="flex items-center border-t border-slate-100 pt-3 mt-4 overflow-x-auto">

                <div class="flex items-center gap-2 min-w-max">

                    <button type="button"
                        class="px-3.5 py-1.5 rounded-lg text-sm font-medium bg-brand-600 text-white border border-brand-600 shadow-sm">
                        All Leads
                    </button>

                    <button type="button"
                        class="px-3.5 py-1.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 border border-transparent transition">
                        Assigned to Me
                    </button>

                    <button type="button"
                        class="px-3.5 py-1.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 border border-transparent transition">
                        New Today
                    </button>

                    <button type="button"
                        class="px-3.5 py-1.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 border border-transparent transition">
                        High Priority
                    </button>

                    <button type="button"
                        class="px-3.5 py-1.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 border border-transparent transition">
                        Uncontacted
                    </button>

                </div>

            </div>

        </div>


        <!--  ADVANCED FILTER -->

        <div x-show="filterOpen" x-cloak x-transition
            class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

            <!-- Header -->
            <div class="px-5 py-3.5 bg-slate-50 border-b border-slate-200 flex items-center justify-between">

                <div class="flex items-center gap-2">

                    <iconify-icon icon="lucide:filter" class="text-brand-600 text-sm">
                    </iconify-icon>

                    <h2 class="text-xs font-bold text-slate-900 uppercase tracking-wider">
                        Advanced Filters
                    </h2>

                </div>


                <button type="button" @click="filterOpen = false"
                    class="text-slate-400 hover:text-slate-600 p-1.5 w-8 h-8 rounded-lg hover:bg-slate-200 transition">

                    <iconify-icon icon="lucide:x" class="text-base">
                    </iconify-icon>

                </button>

            </div>


            <!-- Filter Grid -->
            <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-5">

                <!-- Date -->
                <div class="space-y-4">

                    <div class="flex items-center gap-2 border-b border-slate-100 pb-2">

                        <iconify-icon icon="lucide:calendar" class="text-brand-500 text-xs">
                        </iconify-icon>

                        <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider">
                            Date Filters
                        </h3>

                    </div>


                    <div>

                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">
                            Created Date Range
                        </label>

                        <select class="filter-select">

                            <option>
                                All Time
                            </option>

                            <option>
                                Created Today
                            </option>

                            <option>
                                This Week
                            </option>

                            <option>
                                This Month
                            </option>

                        </select>

                    </div>


                    <div>

                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">
                            Task Due Status
                        </label>

                        <select class="filter-select">

                            <option>
                                Any Due Status
                            </option>

                            <option>
                                Overdue
                            </option>

                            <option>
                                Due Today
                            </option>

                            <option>
                                Upcoming
                            </option>

                        </select>

                    </div>

                </div>


                <!-- Assignment -->
                <div class="space-y-4">

                    <div class="flex items-center gap-2 border-b border-slate-100 pb-2">

                        <iconify-icon icon="lucide:user-check" class="text-brand-500 text-xs">
                        </iconify-icon>

                        <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider">
                            Assignment & Status
                        </h3>

                    </div>


                    <div>

                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">
                            Assigned Counselor
                        </label>

                        <select class="filter-select">

                            <option>
                                All Counselors
                            </option>

                            <option>
                                Sarah Jenkins
                            </option>

                            <option>
                                Michael Chen
                            </option>

                            <option>
                                Alex Rivera
                            </option>

                        </select>

                    </div>


                    <div class="grid grid-cols-2 gap-2">

                        <div>

                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">
                                Pipeline Status
                            </label>

                            <select class="filter-select">

                                <option>
                                    All Statuses
                                </option>

                                <option>
                                    New Lead
                                </option>

                                <option>
                                    Contacted
                                </option>

                                <option>
                                    Counselled
                                </option>

                                <option>
                                    Qualified
                                </option>

                            </select>

                        </div>


                        <div>

                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">
                                Priority
                            </label>

                            <select class="filter-select">

                                <option>
                                    All Priorities
                                </option>

                                <option>
                                    High Priority
                                </option>

                                <option>
                                    Medium Priority
                                </option>

                                <option>
                                    Low Priority
                                </option>

                            </select>

                        </div>

                    </div>

                </div>


                <!-- Academic -->
                <div class="space-y-4">

                    <div class="flex items-center gap-2 border-b border-slate-100 pb-2">

                        <iconify-icon icon="lucide:graduation-cap" class="text-brand-500 text-xs">
                        </iconify-icon>

                        <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider">
                            Academic & Country
                        </h3>

                    </div>


                    <div class="grid grid-cols-2 gap-2">

                        <div>

                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">
                                Target Intake
                            </label>

                            <select class="filter-select">

                                <option>
                                    All Intakes
                                </option>

                                <option>
                                    Fall 2026
                                </option>

                                <option>
                                    Spring 2027
                                </option>

                                <option>
                                    Fall 2027
                                </option>

                            </select>

                        </div>


                        <div>

                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">
                                Destination
                            </label>

                            <select class="filter-select">

                                <option>
                                    All Destinations
                                </option>

                                <option>
                                    United Kingdom
                                </option>

                                <option>
                                    United States
                                </option>

                                <option>
                                    Canada
                                </option>

                                <option>
                                    Australia
                                </option>

                            </select>

                        </div>

                    </div>


                    <div>

                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">
                            English Proficiency Exam
                        </label>

                        <select class="filter-select">

                            <option>
                                Any Exam Status
                            </option>

                            <option>
                                IELTS Passed
                            </option>

                            <option>
                                TOEFL Passed
                            </option>

                            <option>
                                PTE Passed
                            </option>

                        </select>

                    </div>

                </div>

            </div>


            <!-- Footer -->
            <div class="px-5 py-3.5 bg-slate-50 border-t border-slate-200 flex items-center justify-between">

                <button type="button" class="text-xs font-semibold text-slate-600 hover:text-slate-900">
                    Reset All Filters
                </button>


                <div class="flex items-center gap-2">

                    <button type="button" @click="filterOpen = false"
                        class="px-4 py-2 text-xs font-semibold text-slate-700 bg-white border border-slate-300 rounded-xl hover:bg-slate-50">
                        Close
                    </button>

                    <button type="button" @click="filterOpen = false"
                        class="px-5 py-2 text-xs font-semibold text-white bg-brand-600 rounded-xl hover:bg-brand-700">
                        Apply & Show
                    </button>

                </div>

            </div>

        </div>


        <!-- BULK ACTION TOOLBAR -->

        <div x-show="selectedLeads.length > 0" x-cloak x-transition
            class="p-3 bg-white rounded-2xl border border-slate-200 shadow-sm flex flex-wrap items-center justify-between gap-3">

            <!-- Selected Info -->
            <div class="flex items-center gap-3 pl-1">

                <span
                    class="inline-flex w-7 h-7 items-center justify-center rounded-lg bg-brand-50 text-sm font-bold text-brand-600 border border-brand-100"
                    x-text="selectedLeads.length">
                </span>

                <span class="text-xs font-medium text-slate-600">

                    <span x-text="selectedLeads.length === 1 ? 'lead' : 'leads'">
                    </span>

                    selected

                </span>


                <button type="button" @click="selectedLeads = []"
                    class="text-sm font-medium text-slate-500 hover:text-slate-800 underline underline-offset-2">
                    Deselect all
                </button>

            </div>


            <!-- Bulk Actions -->
            <div class="flex items-center gap-2">

                <!-- Assign Lead -->
                <div class="relative">

                    <button type="button" @click="assignOpen = !assignOpen; serviceOpen = false"
                        class="inline-flex items-center gap-1.5 rounded-xl bg-white px-3 py-2 text-sm font-semibold text-slate-700 border border-slate-200 hover:bg-slate-50 transition">

                        <iconify-icon icon="lucide:user-plus" class="text-base text-slate-500">
                        </iconify-icon>

                        <span>
                            Assign Lead
                        </span>

                        <iconify-icon icon="lucide:chevron-down" class="text-sm transition-transform"
                            :class="{ 'rotate-180': assignOpen }">
                        </iconify-icon>

                    </button>


                    <div x-show="assignOpen" x-cloak @click.outside="assignOpen = false" x-transition
                        class="absolute right-0 top-full mt-1.5 w-52 rounded-xl border border-slate-200 bg-white p-1.5 shadow-xl z-50">

                        <div class="px-2.5 py-2 text-[10px] font-semibold tracking-wider text-slate-400 uppercase">
                            Select Assignee
                        </div>


                        <button type="button" @click="assignOpen = false"
                            class="flex w-full items-center gap-2 rounded-lg px-2.5 py-2 text-xs text-slate-700 hover:bg-slate-50">

                            <span
                                class="w-6 h-6 rounded-full bg-brand-50 text-brand-600 font-bold flex items-center justify-center text-[9px]">
                                MM
                            </span>

                            <span>
                                Md Abdul Mannan
                            </span>

                        </button>


                        <button type="button" @click="assignOpen = false"
                            class="flex w-full items-center gap-2 rounded-lg px-2.5 py-2 text-xs text-slate-700 hover:bg-slate-50">

                            <span
                                class="w-6 h-6 rounded-full bg-purple-50 text-purple-600 font-bold flex items-center justify-center text-[9px]">
                                NO
                            </span>

                            <span>
                                Noman
                            </span>

                        </button>

                    </div>

                </div>


                <!-- Service Type -->
                <div class="relative">

                    <button type="button" @click="serviceOpen = !serviceOpen; assignOpen = false"
                        class="inline-flex items-center gap-1.5 rounded-xl bg-white px-3 py-2 text-sm font-semibold text-slate-700 border border-slate-200 hover:bg-slate-50 transition">

                        <iconify-icon icon="lucide:briefcase-business" class="text-base text-slate-500">
                        </iconify-icon>

                        <span>
                            Service Type
                        </span>

                        <iconify-icon icon="lucide:chevron-down" class="text-xs transition-transform"
                            :class="{ 'rotate-180': serviceOpen }">
                        </iconify-icon>

                    </button>


                    <div x-show="serviceOpen" x-cloak @click.outside="serviceOpen = false" x-transition
                        class="absolute right-0 top-full mt-1.5 w-56 rounded-xl border border-slate-200 bg-white p-1.5 shadow-xl z-50">

                        <div class="px-2.5 py-2 text-[10px] font-semibold tracking-wider text-slate-400 uppercase">
                            Change Type
                        </div>


                        <button type="button" @click="serviceOpen = false"
                            class="flex w-full items-center justify-between rounded-lg px-2.5 py-2 text-xs text-slate-700 hover:bg-slate-50">

                            <span class="font-medium">
                                Hbd Service
                            </span>

                            <span
                                class="rounded-md bg-emerald-50 px-1.5 py-0.5 text-[10px] text-emerald-600 font-semibold border border-emerald-100">
                                HBD
                            </span>

                        </button>


                        <button type="button" @click="serviceOpen = false"
                            class="flex w-full items-center justify-between rounded-lg px-2.5 py-2 text-xs text-slate-700 hover:bg-slate-50">

                            <span class="font-medium">
                                Language Academy
                            </span>

                            <span
                                class="rounded-md bg-blue-50 px-1.5 py-0.5 text-[10px] text-blue-600 font-semibold border border-blue-100">
                                EDU
                            </span>

                        </button>

                    </div>

                </div>

            </div>

        </div>


        <!-- TABLE -->

        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full text-left border-collapse">

                    <!-- Table Header -->
                    <thead>

                        <tr
                            class="bg-slate-50/80 border-b border-slate-200 text-xs font-bold text-slate-500 uppercase tracking-wider">

                            <th class="py-3.5 px-4 w-12">

                                <input type="checkbox" @change="toggleAll($event)"
                                    class="size-4 rounded border-slate-300 text-brand-600 focus:ring-brand-500/20 cursor-pointer">

                            </th>


                            <th class="py-3.5 px-4">
                                Lead Profile
                            </th>


                            <th class="py-3.5 px-4">
                                Contact Info
                            </th>


                            <th class="py-3.5 px-4">
                                Lead Owner
                            </th>


                            <th class="py-3.5 px-4">
                                Counselling
                            </th>


                            <th class="py-3.5 px-4">
                                English Proficiency
                            </th>


                            <th class="py-3.5 px-4">
                                Status & Priority
                            </th>


                            <th class="py-3.5 px-4">
                                Outcome
                            </th>


                            <th class="py-3.5 px-4">
                                Created By
                            </th>


                            <th class="py-3.5 px-4 text-right">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <!-- Table Body -->
                    <tbody class="divide-y divide-slate-100 text-[13px]">


                        <!-- Empty State -->
                        <template x-if="tableRowData.length === 0">

                            <tr>

                                <td colspan="10" class="py-16 text-center">

                                    <div class="max-w-xs mx-auto flex flex-col items-center">

                                        <div
                                            class="size-12 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center mb-3">

                                            <iconify-icon icon="lucide:folder-open" class="text-2xl">
                                            </iconify-icon>

                                        </div>


                                        <h3 class="text-sm font-semibold text-slate-800">
                                            No leads found
                                        </h3>


                                        <p class="text-xs text-slate-400 mt-1">
                                            There are no lead records available.
                                        </p>

                                    </div>

                                </td>

                            </tr>

                        </template>


                        <!-- Dynamic Dummy Rows -->
                        <template x-for="row in tableRowData" :key="row.id">

                            <tr class="hover:bg-slate-50/70 transition-colors group">


                                <!-- Checkbox -->
                                <td class="py-4 px-4 align-top">

                                    <input type="checkbox" :value="row.id" x-model="selectedLeads"
                                        class="size-4 rounded border-slate-300 text-brand-600 focus:ring-brand-500/20 cursor-pointer">

                                </td>


                                <!-- Lead Profile -->
                                <td class="py-4 px-4 align-top">

                                    <div class="flex flex-col gap-0.5">

                                        <a :href="baseUrl + '/' + row.id"
                                            class="font-semibold text-slate-900 hover:text-brand-600 transition-colors text-sm"
                                            x-text="row.name">
                                        </a>


                                        <span class="font-mono text-slate-400 text-xs" x-text="'#' + row.id">
                                        </span>

                                    </div>

                                </td>


                                <!-- Contact Info -->
                                <td class="py-4 px-4 align-top">

                                    <div class="flex flex-col gap-1">

                                        <!-- Copy Phone -->
                                        <button type="button" @click="copyPhone(row.phone)"
                                            class="group/phone inline-flex items-center text-sm gap-1.5 text-left text-slate-800 font-medium hover:text-brand-600 transition-colors w-fit">

                                            <span x-text="row.phone"></span>

                                            <iconify-icon icon="lucide:copy"
                                                class="text-sm text-slate-300 group-hover/phone:text-brand-500 transition-colors">
                                            </iconify-icon>

                                        </button>


                                        <span class="text-slate-500 text-xs" x-text="row.email">
                                        </span>

                                    </div>

                                </td>


                                <!-- Lead Owner -->
                                <td class="py-4 px-4 align-top whitespace-nowrap">

                                    <span class="text-slate-700 font-medium" x-text="row.owner">
                                    </span>

                                </td>


                                <!-- Counselling -->
                                <td class="py-4 px-4 align-top">

                                    <div class="space-y-1">

                                        <div
                                            class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded bg-slate-100 text-slate-700 font-medium">

                                            <span>
                                                Counselling
                                            </span>

                                            <span
                                                class="size-4 rounded-full bg-slate-200 text-slate-700 flex items-center justify-center text-[10px] font-bold"
                                                x-text="row.counselling.total">
                                            </span>

                                        </div>


                                        <div class="flex flex-col text-slate-500 pl-0.5 space-y-0.5">

                                            <template x-for="person in row.counselling.people" :key="person.name">

                                                <span>

                                                    <span x-text="person.name"></span>

                                                    <strong class="text-slate-700" x-text="'(' + person.count + ')'">
                                                    </strong>

                                                </span>

                                            </template>

                                        </div>

                                    </div>

                                </td>


                                <!-- English Proficiency -->
                                <td class="py-4 px-4 align-top">

                                    <div class="grid grid-cols-[auto_1fr] gap-x-3 gap-y-1 items-center">

                                        <span class="text-slate-400">
                                            Exam
                                        </span>

                                        <span
                                            class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-semibold bg-blue-50 text-blue-700 border border-blue-100 w-fit"
                                            x-text="row.exam.name">
                                        </span>


                                        <span class="text-slate-400">
                                            Passing
                                        </span>

                                        <span class="font-medium text-slate-700" x-text="row.exam.passing_year">
                                        </span>


                                        <span class="text-slate-400">
                                            Overall
                                        </span>

                                        <span class="font-bold text-slate-800" x-text="row.exam.overall">
                                        </span>


                                        <span class="text-slate-400">
                                            Score
                                        </span>

                                        <span class="font-semibold text-slate-700" x-text="row.exam.score">
                                        </span>

                                    </div>

                                </td>


                                <!-- Status & Priority -->
                                <td class="py-4 px-4 align-top">

                                    <div class="flex flex-wrap items-center gap-1.5 text-xs">

                                        <span class="px-2.5 py-0.5 rounded-full font-semibold border"
                                            :class="row.status_class" x-text="row.status">
                                        </span>


                                        <span class="px-2.5 py-0.5 rounded-full font-semibold border"
                                            :class="row.priority_class" x-text="row.priority">
                                        </span>

                                    </div>

                                </td>


                                <!-- Outcome -->
                                <td class="py-4 px-4 align-top">
                                    <div class="flex flex-col space-y-1.5" x-data="{
                                        isOverdue(dateStr) {
                                            if (!dateStr) return false;
                                            const date = new Date(dateStr);
                                            const today = new Date();
                                            today.setHours(0, 0, 0, 0);
                                            return date < today;
                                        }
                                    }">
                                        <!-- Outcome Type Badge -->
                                        <div class="flex items-center">
                                            <span
                                                class="inline-flex items-center gap-1.5 rounded-md px-2 py-0.5 text-xs font-semibold ring-1 ring-inset"
                                                :class="{
                                                    'bg-sky-50 text-sky-700 ring-sky-600/20': row.outcome
                                                        .type === 'Follow-up',
                                                    'bg-emerald-50 text-emerald-700 ring-emerald-600/20': row.outcome
                                                        .type === 'File Open',
                                                    'bg-amber-50 text-amber-700 ring-amber-600/20': row.outcome
                                                        .type === 'Visit Office',
                                                    'bg-purple-50 text-purple-700 ring-purple-600/20': row.outcome
                                                        .type === 'Attend Session',
                                                    'bg-indigo-50 text-indigo-700 ring-indigo-600/20': row.outcome
                                                        .type === 'Attend Expo',
                                                    'bg-rose-50 text-rose-700 ring-rose-600/20': row.outcome
                                                        .type === 'Master Class',
                                                    'bg-slate-100 text-slate-700 ring-slate-600/10': !['Follow-up',
                                                        'File Open', 'Visit Office', 'Attend Session',
                                                        'Attend Expo', 'Master Class'
                                                    ].includes(row.outcome.type)
                                                }">
                                                <span x-text="row.outcome.type"></span>
                                            </span>
                                        </div>

                                        <!-- Outcome Date (Red if overdue) -->
                                        <div class="flex items-center">
                                            <span
                                                class="inline-flex items-center gap-1 rounded px-1.5 py-0.5 text-xs font-mono font-medium"
                                                :class="isOverdue(row.outcome.date) ?
                                                    'bg-red-50 text-red-600 font-semibold ring-1 ring-inset ring-red-500/20' :
                                                    'text-slate-500'">
                                                <span x-text="row.outcome.date"></span>
                                            </span>
                                        </div>

                                        <!-- Outcome By -->
                                        <template x-if="row.outcome.by">
                                            <span class="text-xs text-slate-400" x-text="row.outcome.by"></span>
                                        </template>
                                    </div>
                                </td>


                                <!-- Created By -->
                                <td class="py-4 px-4 align-top">

                                    <div class="flex flex-col space-y-0.5">

                                        <span class="text-slate-600 font-mono" x-text="row.created.date">
                                        </span>

                                        <span class="text-slate-400" x-text="row.created.by">
                                        </span>

                                    </div>

                                </td>


                                <!-- Action -->
                                <td class="py-4 px-4 align-top text-right">

                                    <div class="flex justify-end gap-1">

                                        <a :href="baseUrl + '/' + row.id"
                                            class="inline-flex items-center justify-center p-1.5 text-slate-400 hover:text-brand-600 hover:bg-slate-100 rounded-md transition-all"
                                            title="View details">

                                            <iconify-icon icon="lucide:eye" class="text-base">
                                            </iconify-icon>

                                        </a>

                                    </div>

                                </td>

                            </tr>

                        </template>

                    </tbody>

                </table>

            </div>


            <!-- Pagination UI Only -->
            <div class="pagination">
                <x-ui.pagination />
            </div>

        </div>


        <!-- COPY SUCCESS TOAST -->

        <div x-show="copyMessage" x-cloak x-transition
            class="fixed bottom-5 right-5 z-[100] flex items-center gap-2.5 bg-slate-900 text-white px-4 py-2.5 rounded-xl shadow-xl text-xs font-medium">

            <span class="size-6 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center">

                <iconify-icon icon="lucide:check" class="text-sm">
                </iconify-icon>

            </span>

            <span x-text="copyMessage"></span>

        </div>

    </div>

    <style>
        [x-cloak] {
            display: none !important;
        }

        .filter-select {
            width: 100%;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: .75rem;
            padding: .55rem .75rem;
            font-size: .75rem;
            color: #1e293b;
            outline: none;
            transition: all .15s ease;
        }

        .filter-select:hover {
            border-color: #cbd5e1;
        }

        .filter-select:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, .10);
        }
    </style>
@endsection
