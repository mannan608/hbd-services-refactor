@extends('backend.layouts.app')

@section('content')
    <div class="">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 dark:border-neutral-800 mb-6">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">Bulk Lead Import</h1>
                <p class="text-sm text-neutral-500 dark:text-neutral-400 mt-1">Upload multiple leads using a standard CSV or
                    Excel template.</p>
            </div>
            <a href="#"
                class="mt-4 inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-neutral-100 dark:bg-neutral-800 hover:bg-neutral-200 dark:hover:bg-neutral-700 text-neutral-800 dark:text-neutral-200 rounded-xl text-xs font-semibold transition border border-neutral-200 dark:border-neutral-700">
                <svg class="w-4 h-4 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                Download Sample (.CSV)
            </a>
        </div>

        <!-- Step 1 & 2 Instructions & Sample Download -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 md:gap-10">
            <!-- Step 2: Drag & Drop File Upload Form -->
            <div class="lg:col-span-2">
                <form action="#" method="POST" enctype="multipart/form-data"
                    class="bg-white dark:bg-neutral-900 rounded-2xl border border-neutral-200 dark:border-neutral-800 p-6 sm:p-8 shadow-sm space-y-6">
                    @csrf
                    <div>
                        <label class="block text-sm font-semibold text-neutral-800 dark:text-neutral-200 mb-2">Upload
                            Spreadsheet</label>
                        <div
                            class="relative border-2 border-dashed border-neutral-300 dark:border-neutral-700 hover:border-brand-500 dark:hover:border-brand-500 rounded-2xl p-8 text-center bg-neutral-50/50 dark:bg-neutral-800/30 transition group cursor-pointer">
                            <input type="file" name="file" required
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                            <div class="flex flex-col items-center justify-center space-y-3">
                                <div
                                    class="w-12 h-12 rounded-full bg-brand-50 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 flex items-center justify-center group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-neutral-800 dark:text-neutral-200">
                                        <span class="text-brand-600 hover:underline">Click to upload</span> or drag and drop
                                    </p>
                                    <p class="text-xs text-neutral-400 mt-1">CSV, XLSX, XLS (Max 10MB)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3">
                        <button type="submit"
                            class="px-6 py-2.5 bg-brand-600 hover:bg-brand-700 text-white font-medium text-sm rounded-xl shadow-md transition flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                            Upload and Validate
                        </button>
                    </div>
                </form>
            </div>
            <!-- Instructions Panel -->
            <div class="flex flex-col gap-6">
                <div class="bg-blue-50/60 dark:bg-blue-950/20 border border-blue-200/80 dark:border-blue-800/50 rounded-2xl p-6 h-fit">
                <div class="flex items-center gap-3 mb-3 text-blue-900 dark:text-blue-200 font-semibold">
                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Import Guidelines</span>
                </div>
                <ul class="space-y-2 text-xs text-blue-800 dark:text-blue-300 list-disc list-inside leading-relaxed">
                    <li>File extension must be <strong>.csv, .xlsx, or .xls</strong> (Max file size: 10MB).</li>
                    <li>Required columns: <span class="font-mono font-bold">first_name, last_name, email</span>.</li>
                    <li>Email addresses must be unique and valid format.</li>
                    <li>Dates should follow the format <span class="font-mono">YYYY-MM-DD</span>.</li>
                </ul>
            </div>
            <div class="bg-blue-50/60 dark:bg-blue-950/20 border border-blue-200/80 dark:border-blue-800/50 rounded-2xl p-6 h-fit">
                <div class="flex items-center gap-3 mb-3 text-blue-900 dark:text-blue-200 font-semibold">
                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Important Note : </span>
                </div>
              
            </div>
            </div>
        </div>


    </div>

    <!-- Bulk Import Viewer -->
    <div class="mt-8" x-data="bulkImportViewer()" x-init="initData()">
        <!-- Main Container -->
        <div
            class="bg-slate-50 dark:bg-neutral-900 border border-slate-200 dark:border-neutral-800 rounded-2xl shadow-sm overflow-hidden space-y-0">

            <!-- Top Toolbar & Tabs -->
            <div
                class="p-4 sm:p-5 bg-white dark:bg-neutral-900 border-b border-slate-200 dark:border-neutral-800 flex flex-wrap items-center justify-between gap-4">

                <!-- Filter Tabs -->
                <div class="flex items-center gap-2 overflow-x-auto pb-1 sm:pb-0">
                    <button @click="activeTab = 'all'"
                        :class="activeTab === 'all' ?
                            'bg-slate-900 text-white dark:bg-white dark:text-neutral-900 font-semibold' :
                            'bg-slate-100 text-slate-600 hover:bg-slate-200 dark:bg-neutral-800 dark:text-neutral-300'"
                        class="px-3.5 py-1.5 rounded-lg text-xs transition flex items-center gap-1.5">
                        <span>All Rows</span>
                        <span
                            class="px-1.5 py-0.5 rounded-full text-[10px] bg-slate-200 dark:bg-neutral-700 text-slate-800 dark:text-neutral-200"
                            x-text="rows.length"></span>
                    </button>

                    <button @click="activeTab = 'error'"
                        :class="activeTab === 'error' ? 'bg-rose-600 text-white font-semibold' :
                            'bg-rose-50 text-rose-600 hover:bg-rose-100 dark:bg-rose-950/40 dark:text-rose-400'"
                        class="px-3.5 py-1.5 rounded-lg text-xs transition flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Errors Only</span>
                        <span
                            class="px-1.5 py-0.5 rounded-full text-[10px] bg-rose-200 dark:bg-rose-900/60 text-rose-800 dark:text-rose-200"
                            x-text="countByStatus('error')"></span>
                    </button>

                    <button @click="activeTab = 'warning'"
                        :class="activeTab === 'warning' ? 'bg-amber-500 text-white font-semibold' :
                            'bg-amber-50 text-amber-600 hover:bg-amber-100 dark:bg-amber-950/40 dark:text-amber-400'"
                        class="px-3.5 py-1.5 rounded-lg text-xs transition flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <span>Warnings</span>
                        <span
                            class="px-1.5 py-0.5 rounded-full text-[10px] bg-amber-200 dark:bg-amber-900/60 text-amber-800 dark:text-amber-200"
                            x-text="countByStatus('warning')"></span>
                    </button>

                    <button @click="activeTab = 'valid'"
                        :class="activeTab === 'valid' ? 'bg-emerald-600 text-white font-semibold' :
                            'bg-emerald-50 text-emerald-600 hover:bg-emerald-100 dark:bg-emerald-950/40 dark:text-emerald-400'"
                        class="px-3.5 py-1.5 rounded-lg text-xs transition flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Valid Only</span>
                        <span
                            class="px-1.5 py-0.5 rounded-full text-[10px] bg-emerald-200 dark:bg-emerald-900/60 text-emerald-800 dark:text-emerald-200"
                            x-text="countByStatus('valid')"></span>
                    </button>
                </div>

                <!-- Controls (Search, Skip Switch, Actions) -->
                <div class="flex flex-wrap items-center gap-3 w-full lg:w-auto">

                    <!-- Checkbox Option -->
                    <label
                        class="inline-flex items-center gap-2 cursor-pointer text-xs text-slate-600 dark:text-neutral-300 select-none">
                        <input type="checkbox" x-model="skipInvalid"
                            class="rounded text-slate-800 dark:bg-neutral-800 border-slate-300 focus:ring-0">
                        <span>Skip invalid rows automatically</span>
                    </label>

                    <!-- Export Errors Button -->
                    <button @click="downloadErrors()"
                        :disabled="countByStatus('error') === 0 && countByStatus('warning') === 0"
                        class="px-3.5 py-1.5 bg-white dark:bg-neutral-800 border border-slate-300 dark:border-neutral-700 hover:bg-slate-50 dark:hover:bg-neutral-700 text-slate-700 dark:text-neutral-200 text-xs rounded-lg font-medium shadow-sm flex items-center gap-1.5 disabled:opacity-40 disabled:cursor-not-allowed">
                        <svg class="w-4 h-4 text-slate-600 dark:text-neutral-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Export Errors (.csv)
                    </button>
                </div>
            </div>

            <!-- Table Container -->
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr
                            class="bg-slate-100/70 dark:bg-neutral-800/80 text-slate-500 dark:text-neutral-400 font-bold uppercase tracking-wider border-b border-slate-200 dark:border-neutral-800">
                            <th class="py-3 px-4 w-16">ROW #</th>
                            <th class="py-3 px-4 w-28">STATUS</th>
                            <th class="py-3 px-4">FIRST NAME</th>
                            <th class="py-3 px-4">LAST NAME</th>
                            <th class="py-3 px-4">EMAIL ADDRESS</th>
                            <th class="py-3 px-4">PHONE</th>
                            <th class="py-3 px-4">COMPANY</th>
                            <th class="py-3 px-4">LEAD SOURCE</th>
                            <th class="py-3 px-4 min-w-[240px]">DIAGNOSTIC REPORT</th>
                            <th class="py-3 px-4 text-right w-20">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-neutral-800 font-medium">
                        <template x-for="(row, index) in filteredRows" :key="row.id">
                            <tr :class="{
                                'bg-rose-50/40 dark:bg-rose-950/10 hover:bg-rose-50/80': row.status === 'error',
                                'bg-amber-50/30 dark:bg-amber-950/10 hover:bg-amber-50/60': row.status === 'warning',
                                'bg-white dark:bg-neutral-900 hover:bg-slate-50 dark:hover:bg-neutral-800/50': row
                                    .status === 'valid'
                            }"
                                class="transition duration-150">

                                <!-- Row Number -->
                                <td class="py-3.5 px-4 font-bold"
                                    :class="row.status === 'error' ? 'text-rose-600' :
                                        'text-slate-500 dark:text-neutral-400'"
                                    x-text="'#' + row.row_num"></td>

                                <!-- Status Badge -->
                                <td class="py-3.5 px-4">
                                    <template x-if="row.status === 'error'">
                                        <span
                                            class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-rose-600 text-white">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Error
                                        </span>
                                    </template>
                                    <template x-if="row.status === 'warning'">
                                        <span
                                            class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-sky-100 text-sky-700 dark:bg-sky-950/60 dark:text-sky-300">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                            </svg>
                                            Warning
                                        </span>
                                    </template>
                                    <template x-if="row.status === 'valid'">
                                        <span
                                            class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-emerald-700 text-white">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            Valid
                                        </span>
                                    </template>
                                </td>

                                <!-- First Name Column -->
                                <td class="py-3.5 px-4 text-slate-800 dark:text-neutral-200">
                                    <template x-if="row.errors.first_name">
                                        <span
                                            class="inline-flex items-center gap-1 px-2 py-1 rounded bg-rose-100 dark:bg-rose-950/60 text-rose-700 dark:text-rose-300 font-bold text-[11px]">
                                            <button @click="clearFieldError(row, 'first_name')"
                                                class="text-rose-500 hover:text-rose-800">&times;</button>
                                            Missing Required
                                        </span>
                                    </template>
                                    <template x-if="!row.errors.first_name">
                                        <span x-text="row.first_name || '—'"></span>
                                    </template>
                                </td>

                                <!-- Last Name Column -->
                                <td class="py-3.5 px-4 text-slate-800 dark:text-neutral-200"
                                    x-text="row.last_name || '—'"></td>

                                <!-- Email Address Column -->
                                <td class="py-3.5 px-4">
                                    <template x-if="row.errors.email">
                                        <div class="space-y-0.5">
                                            <span
                                                class="text-rose-600 font-bold underline decoration-wavy decoration-rose-400"
                                                x-text="row.email"></span>
                                            <div class="text-[10px] text-rose-600 font-extrabold uppercase tracking-tight"
                                                x-text="row.errors.email"></div>
                                        </div>
                                    </template>
                                    <template x-if="!row.errors.email">
                                        <span class="text-slate-700 dark:text-neutral-300"
                                            x-text="row.email || '—'"></span>
                                    </template>
                                </td>

                                <!-- Phone Column -->
                                <td class="py-3.5 px-4">
                                    <template x-if="row.errors.phone">
                                        <span
                                            class="bg-rose-100 text-rose-700 dark:bg-rose-950/60 dark:text-rose-300 font-mono font-bold px-1.5 py-0.5 rounded"
                                            x-text="row.phone"></span>
                                    </template>
                                    <template x-if="!row.errors.phone">
                                        <span class="text-slate-600 dark:text-neutral-400 font-mono"
                                            x-text="row.phone || '—'"></span>
                                    </template>
                                </td>

                                <!-- Company Column -->
                                <td class="py-3.5 px-4 text-slate-800 dark:text-neutral-200" x-text="row.company || '—'">
                                </td>

                                <!-- Lead Source Column -->
                                <td class="py-3.5 px-4">
                                    <template x-if="row.errors.lead_source">
                                        <span
                                            class="text-rose-600 dark:text-rose-400 font-bold bg-rose-100 dark:bg-rose-950/40 px-1.5 py-0.5 rounded"
                                            x-text="row.lead_source"></span>
                                    </template>
                                    <template x-if="!row.errors.lead_source">
                                        <span class="text-slate-600 dark:text-neutral-300"
                                            x-text="row.lead_source || '—'"></span>
                                    </template>
                                </td>

                                <!-- Diagnostic Report Column -->
                                <td class="py-3.5 px-4">
                                    <template x-if="row.diagnostic">
                                        <div class="flex items-start gap-1.5"
                                            :class="{
                                                'text-rose-600 dark:text-rose-400 font-semibold': row
                                                    .status === 'error',
                                                'text-slate-500 dark:text-neutral-400': row.status === 'warning',
                                                'text-emerald-600 font-semibold': row.status === 'valid'
                                            }">
                                            <svg class="w-4 h-4 shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                            </svg>
                                            <span x-text="row.diagnostic"></span>
                                        </div>
                                    </template>
                                </td>

                                <!-- Actions Column -->
                                <td class="py-3.5 px-4 text-right">
                                    <button @click="deleteRow(row.id)" title="Delete Row"
                                        class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition dark:hover:bg-rose-950/50">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        </template>

                        <!-- Empty State -->
                        <template x-if="filteredRows.length === 0">
                            <tr>
                                <td colspan="10" class="py-12 text-center text-slate-400 dark:text-neutral-500">
                                    No records match the selected filter.
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>

            <!-- Footer Bar & Final Action Button -->
            <div
                class="p-4 bg-white dark:bg-neutral-900 border-t border-slate-200 dark:border-neutral-800 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="text-xs text-slate-500 dark:text-neutral-400">
                    Showing <strong class="text-slate-800 dark:text-neutral-200" x-text="countByStatus('error')"></strong>
                    errors and
                    <strong class="text-slate-800 dark:text-neutral-200" x-text="countByStatus('warning')"></strong>
                    warnings of
                    <strong class="text-slate-800 dark:text-neutral-200" x-text="rows.length"></strong> rows
                </div>

                <!-- Upload Clean Data Form Submitter -->
                <form action="#" method="POST">
                    @csrf
                    <input type="hidden" name="valid_data" :value="JSON.stringify(getValidDataToSubmit())">
                    <button type="submit" :disabled="getValidDataToSubmit().length === 0"
                        class="px-5 py-2.5 bg-brand-600 hover:bg-brand-700 text-white font-semibold text-xs rounded-xl shadow-md hover:shadow-brand-500/20 transition flex items-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Upload Valid Data (<span x-text="getValidDataToSubmit().length"></span> Rows)</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function bulkImportViewer() {
            return {
                activeTab: 'error',
                searchQuery: '',
                skipInvalid: false,
                rows: [],

                initData() {
                    // Demo data populated exactly from image details
                    this.rows = [{
                            id: 1,
                            row_num: 14,
                            status: 'error',
                            first_name: 'Robert',
                            last_name: 'Vance',
                            email: 'robert.vance@invalid_domain',
                            phone: '+1 555-0192',
                            company: 'Vance Refrigeration',
                            lead_source: 'Referral',
                            diagnostic: "Field 'Email' domain format is invalid: missing standard extension.",
                            errors: {
                                email: 'INVALID DOMAIN FORMAT'
                            }
                        },
                        {
                            id: 2,
                            row_num: 47,
                            status: 'error',
                            first_name: '',
                            last_name: 'Chen',
                            email: 'chen.michael@apextech.io',
                            phone: '+1 (800) 555-0144',
                            company: 'Apex Tech',
                            lead_source: 'Inbound Web',
                            diagnostic: "'First Name' is missing. Required attribute for CRM Validation.",
                            errors: {
                                first_name: 'Missing Required'
                            }
                        },
                        {
                            id: 3,
                            row_num: 102,
                            status: 'error',
                            first_name: 'Elena',
                            last_name: 'Rostova',
                            email: 'elena.rostova@globalfin.com',
                            phone: '12345',
                            company: 'GlobalFin Inc',
                            lead_source: 'Cold Outreach',
                            diagnostic: "Phone length does not adhere to E.164 standard international dialing prefix.",
                            errors: {
                                phone: 'Invalid Phone Format'
                            }
                        },
                        {
                            id: 4,
                            row_num: 215,
                            status: 'error',
                            first_name: 'Marcus',
                            last_name: 'Brody',
                            email: 'marcus@archeology.org',
                            phone: '+44 20 7946 0912',
                            company: 'National Museum',
                            lead_source: 'Unknown_Source',
                            diagnostic: "Value not recognized. Please map to standard options like 'Direct'.",
                            errors: {
                                lead_source: 'Unknown Value'
                            }
                        },
                        {
                            id: 5,
                            row_num: 350,
                            status: 'warning',
                            first_name: 'David',
                            last_name: 'Miller',
                            email: 'd.miller@stratus.co',
                            phone: '+1 415-555-0188',
                            company: 'Stratus Cloud',
                            lead_source: 'Webinar',
                            diagnostic: "Identical record found (#9482). Will cause duplicate unless isolated.",
                            errors: {}
                        },
                        {
                            id: 6,
                            row_num: 412,
                            status: 'valid',
                            first_name: 'Sophia',
                            last_name: 'Taylor',
                            email: 'staylor@innovate.ai',
                            phone: '+1 206-555-0177',
                            company: 'Innovate AI',
                            lead_source: 'Organic Search',
                            diagnostic: "Passed all system schema rules.",
                            errors: {}
                        }
                    ];
                },

                get filteredRows() {
                    return this.rows.filter(row => {
                        // Tab filter
                        if (this.activeTab !== 'all' && row.status !== this.activeTab) {
                            return false;
                        }
                        // Search query filter
                        if (this.searchQuery.trim() !== '') {
                            const q = this.searchQuery.toLowerCase();
                            const textContent =
                                `${row.row_num} ${row.first_name} ${row.last_name} ${row.email} ${row.company} ${row.lead_source} ${row.diagnostic}`
                                .toLowerCase();
                            return textContent.includes(q);
                        }
                        return true;
                    });
                },

                countByStatus(status) {
                    return this.rows.filter(r => r.status === status).length;
                },

                deleteRow(id) {
                    this.rows = this.rows.filter(r => r.id !== id);
                },

                clearFieldError(row, fieldName) {
                    delete row.errors[fieldName];
                    // Re-evaluate if row is clean
                    if (Object.keys(row.errors).length === 0) {
                        row.status = 'valid';
                        row.diagnostic = 'Passed all system schema rules.';
                    }
                },

                getValidDataToSubmit() {
                    if (this.skipInvalid) {
                        return this.rows.filter(r => r.status === 'valid');
                    }
                    return this.rows;
                },

                downloadErrors() {
                    const errorRows = this.rows.filter(r => r.status === 'error' || r.status === 'warning');
                    if (errorRows.length === 0) return;

                    let csvContent =
                        "data:text/csv;charset=utf-8,Row,Status,First Name,Last Name,Email,Phone,Company,Lead Source,Diagnostic\n";
                    errorRows.forEach(r => {
                        csvContent +=
                            `"${r.row_num}","${r.status}","${r.first_name}","${r.last_name}","${r.email}","${r.phone}","${r.company}","${r.lead_source}","${r.diagnostic}"\n`;
                    });

                    const encodedUri = encodeURI(csvContent);
                    const link = document.createElement("a");
                    link.setAttribute("href", encodedUri);
                    link.setAttribute("download", "import_error_log.csv");
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                }
            }
        }
    </script>
@endsection
