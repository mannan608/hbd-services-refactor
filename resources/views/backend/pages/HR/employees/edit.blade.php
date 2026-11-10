@extends('backend.layouts.app')

@section('content')
    <div class="mx-auto max-w-6xl space-y-8 pb-16">

        {{-- Top Navigation / Back --}}
        <div class="flex items-center justify-between">
            <a href=""
                class="inline-flex items-center text-sm font-medium text-neutral-500 hover:text-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-200">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Employees
            </a>
            <div class="flex items-center space-x-3">
                <span
                    class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400">
                    {{ ucfirst($employee->currentEmployment?->employment_status ?? 'Active') }}
                </span>
            </div>
        </div>

        {{-- Profile Hero Banner / Header Card --}}
        <div
            class="relative overflow-hidden rounded-2xl border border-neutral-200/80 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900">
            {{-- Decorative Gradient Banner --}}
            <div class="h-32 bg-gradient-to-r from-brand-600 via-brand-500 to-indigo-600"></div>

            <div class="px-6 pb-6 pt-0 relative flex flex-col sm:flex-row sm:items-end sm:justify-between -mt-10 gap-4">
                <div class="flex items-end space-x-5">
                    {{-- Avatar --}}
                    <div
                        class="relative h-24 w-24 rounded-2xl ring-4 ring-white dark:ring-neutral-900 bg-neutral-100 dark:bg-neutral-800 flex items-center justify-center text-2xl font-bold text-neutral-700 dark:text-neutral-200 shadow-md overflow-hidden">
                        @if ($employee->avatar ?? false)
                            <img src="{{ Storage::url($employee->avatar) }}" alt="{{ $employee->first_name }}"
                                class="h-full w-full object-cover">
                        @else
                            {{ strtoupper(substr($employee->first_name, 0, 1) . substr($employee->last_name, 0, 1)) }}
                        @endif
                    </div>

                    {{-- Name & Details --}}
                    <div class="mb-1">
                        <h1 class="text-xl font-bold text-neutral-900 dark:text-white">
                            {{ $employee->first_name }} {{ $employee->last_name }}
                        </h1>
                        <p class="text-sm font-medium text-neutral-500 dark:text-neutral-400">
                            {{ $employee->currentEmployment?->designation?->name ?? 'No Designation' }}
                            <span class="mx-1.5">&middot;</span>
                            <span
                                class="font-mono text-xs bg-neutral-100 dark:bg-neutral-800 px-2 py-0.5 rounded text-neutral-600 dark:text-neutral-300">
                                {{ $employee->currentEmployment?->employee_code ?? 'EMP-XXX' }}
                            </span>
                        </p>
                    </div>
                </div>

                {{-- Quick Stats or Actions --}}
                <div class="flex items-center space-x-3 text-xs text-neutral-500 dark:text-neutral-400">
                    <div>
                        <span class="block font-medium text-neutral-900 dark:text-white">Branch</span>
                        <span>{{ $employee->currentEmployment?->branch?->name ?? 'N/A' }}</span>
                    </div>
                    <div class="border-l border-neutral-200 dark:border-neutral-800 pl-3">
                        <span class="block font-medium text-neutral-900 dark:text-white">Department</span>
                        <span>{{ $employee->currentEmployment?->department?->name ?? 'N/A' }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sticky Section Navigation Tabs --}}
        <div
            class="sticky top-19 z-50 backdrop-blur-md bg-white/80 dark:bg-neutral-900/80 p-1.5 rounded-xl border border-neutral-200/80 dark:border-neutral-800 shadow-sm">
            <nav class="flex flex-wrap gap-1.5" x-data="{ activeTab: 'personal' }">
                {{-- Personal --}}
                <a href="#personal" @click="activeTab = 'personal'"
                    :class="activeTab === 'personal' ? 'bg-brand-600 text-white shadow-sm' :
                        'text-neutral-600 hover:text-neutral-900 hover:bg-neutral-100 dark:text-neutral-400 dark:hover:text-white dark:hover:bg-neutral-800'"
                    class="flex items-center space-x-2 px-4 py-2 text-sm font-medium rounded-lg transition-all group">
                    <iconify-icon icon="lucide:user"
                        class="text-[16px] text-neutral-400 transition-colors group-hover:text-brand-600"
                        :class="activeTab === 'personal' ? 'text-white' : ''"></iconify-icon>
                    <span>Personal</span>
                </a>

                {{-- Address --}}
                <a href="#address" @click="activeTab = 'address'"
                    :class="activeTab === 'address' ? 'bg-brand-600 text-white shadow-sm' :
                        'text-neutral-600 hover:text-neutral-900 hover:bg-neutral-100 dark:text-neutral-400 dark:hover:text-white dark:hover:bg-neutral-800'"
                    class="flex items-center space-x-2 px-4 py-2 text-sm font-medium rounded-lg transition-all group">
                    <iconify-icon icon="lucide:map-pin"
                        class="text-[16px] text-neutral-400 transition-colors group-hover:text-brand-600"
                        :class="activeTab === 'address' ? 'text-white' : ''"></iconify-icon>
                    <span>Address</span>
                </a>

                {{-- Employment --}}
                <a href="#employment" @click="activeTab = 'employment'"
                    :class="activeTab === 'employment' ? 'bg-brand-600 text-white shadow-sm' :
                        'text-neutral-600 hover:text-neutral-900 hover:bg-neutral-100 dark:text-neutral-400 dark:hover:text-white dark:hover:bg-neutral-800'"
                    class="flex items-center space-x-2 px-4 py-2 text-sm font-medium rounded-lg transition-all group">
                    <iconify-icon icon="lucide:briefcase"
                        class="text-[16px] text-neutral-400 transition-colors group-hover:text-brand-600"
                        :class="activeTab === 'employment' ? 'text-white' : ''"></iconify-icon>
                    <span>Employment</span>
                </a>

                {{-- Salary --}}
                <a href="#salary" @click="activeTab = 'salary'"
                    :class="activeTab === 'salary' ? 'bg-brand-600 text-white shadow-sm' :
                        'text-neutral-600 hover:text-neutral-900 hover:bg-neutral-100 dark:text-neutral-400 dark:hover:text-white dark:hover:bg-neutral-800'"
                    class="flex items-center space-x-2 px-4 py-2 text-sm font-medium rounded-lg transition-all group">
                    <iconify-icon icon="lucide:wallet"
                        class="text-[16px] text-neutral-400 transition-colors group-hover:text-brand-600"
                        :class="activeTab === 'salary' ? 'text-white' : ''"></iconify-icon>
                    <span>Salary</span>
                </a>

                {{-- Bank Accounts --}}
                <a href="#bank" @click="activeTab = 'bank'"
                    :class="activeTab === 'bank' ? 'bg-brand-600 text-white shadow-sm' :
                        'text-neutral-600 hover:text-neutral-900 hover:bg-neutral-100 dark:text-neutral-400 dark:hover:text-white dark:hover:bg-neutral-800'"
                    class="flex items-center space-x-2 px-4 py-2 text-sm font-medium rounded-lg transition-all group">
                    <iconify-icon icon="lucide:landmark"
                        class="text-[16px] text-neutral-400 transition-colors group-hover:text-brand-600"
                        :class="activeTab === 'bank' ? 'text-white' : ''"></iconify-icon>
                    <span>Bank Accounts</span>
                </a>

                {{-- Documents --}}
                <a href="#documents" @click="activeTab = 'documents'"
                    :class="activeTab === 'documents' ? 'bg-brand-600 text-white shadow-sm' :
                        'text-neutral-600 hover:text-neutral-900 hover:bg-neutral-100 dark:text-neutral-400 dark:hover:text-white dark:hover:bg-neutral-800'"
                    class="flex items-center space-x-2 px-4 py-2 text-sm font-medium rounded-lg transition-all group">
                    <iconify-icon icon="lucide:file-text"
                        class="text-[16px] text-neutral-400 transition-colors group-hover:text-brand-600"
                        :class="activeTab === 'documents' ? 'text-white' : ''"></iconify-icon>
                    <span>Documents</span>
                </a>
            </nav>
        </div>

        {{-- Main Sections --}}
        <div class="space-y-8">
            <section id="personal" class="scroll-mt-31">
                @include('backend.pages.HR.employees.partial.personal')
            </section>
            <section id="address" class="scroll-mt-31">
                @include('backend.pages.HR.employees.partial.address')
            </section>

            <section id="employment" class="scroll-mt-31">
                @include('backend.pages.HR.employees.partial.employeement-edit')
            </section>

            <section id="salary" class="scroll-mt-31">
                @include('backend.pages.HR.employees.partial.salary')
            </section>

            <section id="bank" class="scroll-mt-31">
                @include('backend.pages.HR.employees.partial.bank_accounts')
            </section>

            <section id="documents" class="scroll-mt-31">
                @include('backend.pages.HR.employees.partial.employee_documents')
            </section>
        </div>
    </div>
@endsection
