<div x-data="{
    startDate: '2026-10-04',
    endDate: '2026-10-09',
    selectedTelemarketer: '',
    searchQuery: '',
    telemarketers: [
        { name: 'Maliha Tanmi Khan', ext: '112', attempts: 169, connected: 93, notConnected: 76, connectedTime: '5h 19m 10s', notConnectedTime: '1h 7m 0s', totalSpentTime: '6h 26m 10s', whatsappCalls: 27 },
        { name: 'Md Abu Saif', ext: '111', attempts: 422, connected: 197, notConnected: 225, connectedTime: '5h 47m 45s', notConnectedTime: '2h 55m 30s', totalSpentTime: '8h 43m 15s', whatsappCalls: 21 },
        { name: 'Kazi Hamidul Huq', ext: '113', attempts: 326, connected: 157, notConnected: 169, connectedTime: '8h 40m 41s', notConnectedTime: '1h 25m 48s', totalSpentTime: '10h 6m 29s', whatsappCalls: 18 },
        { name: 'Md Adnan Hossain', ext: '116', attempts: 339, connected: 169, notConnected: 170, connectedTime: '6h 52m 17s', notConnectedTime: '2h 41m 11s', totalSpentTime: '9h 33m 28s', whatsappCalls: 18 },
        { name: 'Musfica Akter Mim', ext: '114', attempts: 429, connected: 212, notConnected: 217, connectedTime: '7h 39m 55s', notConnectedTime: '3h 18m 48s', totalSpentTime: '10h 58m 43s', whatsappCalls: 5 },
        { name: 'Mozammal Haque', ext: '117', attempts: 236, connected: 133, notConnected: 103, connectedTime: '5h 18m 29s', notConnectedTime: '4h 44m 21s', totalSpentTime: '10h 2m 50s', whatsappCalls: 5 }
    ],
    get filteredRows() {
        return this.telemarketers.filter(item => {
            const matchesSelect = this.selectedTelemarketer === '' || item.name === this.selectedTelemarketer;
            const matchesSearch = item.name.toLowerCase().includes(this.searchQuery.toLowerCase()) || item.ext.includes(this.searchQuery);
            return matchesSelect && matchesSearch;
        });
    },
    resetFilters() {
        this.selectedTelemarketer = '';
        this.searchQuery = '';
        this.startDate = '2026-10-04';
        this.endDate = '2026-10-09';
    }
}" class="">

    <div class="mb-6 space-y-5">

        <!-- Header -->
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

            <div class="min-w-0">
                <div class="flex flex-wrap items-center gap-2">
                    <h2 class="text-lg font-bold text-neutral-900 dark:text-white">
                        Telemarketer Call Stats
                    </h2>

                    <span
                        class="inline-flex items-center rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-semibold text-emerald-700 dark:bg-emerald-950/50 dark:text-emerald-400">
                        <span class="mr-1.5 h-1.5 w-1.5 rounded-full bg-emerald-500">
                        </span>
                        6 Telemarketers
                    </span>
                </div>

                <p class="mt-1 text-xs leading-5 text-neutral-500 dark:text-neutral-400">
                    Performance analytics from
                    <span class="font-semibold text-neutral-700 dark:text-neutral-300" x-text="startDate">
                    </span>
                    to
                    <span class="font-semibold text-neutral-700 dark:text-neutral-300" x-text="endDate">
                    </span>
                </p>
            </div>

        </div>

        <!-- Filter Panel -->
        <div
            class="rounded-xl border border-neutral-200 bg-white p-5  dark:border-neutral-800 dark:bg-neutral-900 sm:p-5">

            <div class="mb-4 flex items-center gap-2">
                <svg class="h-4 w-4 text-neutral-500 dark:text-neutral-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="M3 4h18l-7 8v6l-4 2v-8L3 4z">
                    </path>
                </svg>

                <h3 class="text-sm font-semibold text-neutral-800 dark:text-neutral-200">
                    Filter Call Statistics
                </h3>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-12 lg:items-end">

                <!-- Telemarketer -->
                <div class="min-w-0 sm:col-span-2 lg:col-span-5">
                    <label for="telemarketer"
                        class="mb-1.5 block text-xs font-semibold text-neutral-600 dark:text-neutral-400">
                        Select Telemarketer
                    </label>

                    <div class="relative">
                        <select id="telemarketer" x-model="selectedTelemarketer"
                            class="w-full appearance-none rounded-lg border border-neutral-200 bg-white px-3 py-2.5 pr-9 text-sm text-neutral-800 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-200">

                            <option value="">All Telemarketers</option>

                            <template x-for="t in telemarketers" :key="t.name">
                                <option :value="t.name" x-text="t.name + ' (Ext: ' + t.ext + ')'">
                                </option>
                            </template>
                        </select>
                    </div>
                </div>

                <!-- Start Date -->
                <div class="min-w-0 lg:col-span-3">
                    <label for="start-date"
                        class="mb-1.5 block text-xs font-semibold text-neutral-600 dark:text-neutral-400">
                        Start Date
                    </label>

                    <input id="start-date" x-model="startDate" type="date"
                        class="w-full min-w-0 rounded-lg border border-neutral-200 bg-white px-3 py-2.5 text-sm text-neutral-800 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-200">
                </div>

                <!-- End Date -->
                <div class="min-w-0 lg:col-span-3">
                    <label for="end-date"
                        class="mb-1.5 block text-xs font-semibold text-neutral-600 dark:text-neutral-400">
                        End Date
                    </label>

                    <input id="end-date" x-model="endDate" type="date" :min="startDate"
                        class="w-full min-w-0 rounded-lg border border-neutral-200 bg-white px-3 py-2.5 text-sm text-neutral-800 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-200">
                </div>

                <!-- Actions -->
                <div
                    class="flex flex-col gap-2 sm:col-span-2 sm:flex-row sm:justify-end lg:col-span-1 lg:justify-start">
                    <button type="button"
                        @click="if (startDate && endDate && startDate > endDate) { endDate = startDate }"
                        class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-emerald-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-700 active:scale-[0.98] focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 dark:focus:ring-offset-neutral-900 sm:w-auto lg:w-full">

                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14m-7-7 7 7-7 7">
                            </path>
                        </svg>

                        Apply
                    </button>
                </div>

            </div>
        </div>

    </div>

    <!-- Table View -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-xs">
            <thead>
                <tr
                    class="border-b border-neutral-200/80 dark:border-neutral-800 bg-neutral-50/80 dark:bg-neutral-800/40 text-neutral-500 dark:text-neutral-400 font-semibold uppercase tracking-wider text-[11px]">
                    <th class="py-3.5 px-4 min-w-[170px]">Telemarketer</th>
                    <th class="py-3.5 px-3 text-center">Ext</th>
                    <th class="py-3.5 px-3 text-center">Attempts</th>
                    <th class="py-3.5 px-3 text-center text-emerald-600 dark:text-emerald-400">Connected</th>
                    <th class="py-3.5 px-3 text-center text-rose-600 dark:text-rose-400">Not Connected</th>
                    <th class="py-3.5 px-3 text-center text-sky-600 dark:text-sky-400 bg-sky-50/30 dark:bg-sky-950/10">
                        Connected Call Time</th>
                    <th
                        class="py-3.5 px-3 text-center text-neutral-500 dark:text-neutral-400 bg-neutral-100/30 dark:bg-neutral-800/20">
                        Not Connected Time</th>
                    <th
                        class="py-3.5 px-3 text-center text-indigo-600 dark:text-indigo-400 bg-indigo-50/30 dark:bg-indigo-950/10">
                        Total Spent Time</th>
                    <th
                        class="py-3.5 px-3 text-center text-emerald-700 dark:text-emerald-400 bg-emerald-50/30 dark:bg-emerald-950/10">
                        WhatsApp Calls</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-neutral-100 dark:divide-neutral-800">
                <template x-for="(row, index) in filteredRows" :key="row.name">
                    <tr class="hover:bg-neutral-50/80 dark:hover:bg-neutral-800/50 transition-colors font-medium">
                        <!-- Telemarketer Name -->
                        <td class="py-3 px-4 font-semibold text-neutral-900 dark:text-neutral-100 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <div class="w-7 h-7 rounded-full bg-emerald-100 dark:bg-emerald-900/40 text-emerald-700 dark:text-emerald-300 flex items-center justify-center font-bold text-xs uppercase"
                                    x-text="row.name.charAt(0)"></div>
                                <span x-text="row.name"></span>
                            </div>
                        </td>

                        <!-- Extension -->
                        <td class="py-3 px-3 text-center font-mono text-neutral-500 dark:text-neutral-400">
                            <span
                                class="px-2 py-0.5 rounded bg-neutral-100 dark:bg-neutral-800 text-neutral-600 dark:text-neutral-300 text-[11px]"
                                x-text="row.ext"></span>
                        </td>

                        <!-- Attempts -->
                        <td class="py-3 px-3 text-center font-semibold text-neutral-700 dark:text-neutral-300"
                            x-text="row.attempts"></td>

                        <!-- Connected Badge -->
                        <td class="py-3 px-3 text-center">
                            <span
                                class="px-2 py-0.5 rounded-md bg-emerald-50 dark:bg-emerald-950/50 text-emerald-700 dark:text-emerald-300 font-bold"
                                x-text="row.connected"></span>
                        </td>

                        <!-- Not Connected -->
                        <td class="py-3 px-3 text-center text-rose-600 dark:text-rose-400 font-medium"
                            x-text="row.notConnected"></td>

                        <!-- Connected Call Time -->
                        <td class="py-3 px-3 text-center font-mono text-sky-700 dark:text-sky-300 bg-sky-50/20 dark:bg-sky-950/5"
                            x-text="row.connectedTime"></td>

                        <!-- Not Connected Time -->
                        <td class="py-3 px-3 text-center font-mono text-neutral-500 dark:text-neutral-400 bg-neutral-100/20 dark:bg-neutral-800/10"
                            x-text="row.notConnectedTime"></td>

                        <!-- Total Spent Time -->
                        <td class="py-3 px-3 text-center font-mono font-semibold text-indigo-700 dark:text-indigo-300 bg-indigo-50/20 dark:bg-indigo-950/5"
                            x-text="row.totalSpentTime"></td>

                        <!-- WhatsApp Calls Badge -->
                        <td class="py-3 px-3 text-center bg-emerald-50/20 dark:bg-emerald-950/5">
                            <span
                                class="px-2.5 py-0.5 rounded-full bg-emerald-100 dark:bg-emerald-900/40 text-emerald-800 dark:text-emerald-300 font-bold text-[11px]"
                                x-text="row.whatsappCalls"></span>
                        </td>
                    </tr>
                </template>

                <!-- Empty State -->
                <template x-if="filteredRows.length === 0">
                    <tr>
                        <td colspan="9" class="py-12 text-center text-neutral-400 dark:text-neutral-500">
                            <svg class="w-10 h-10 mx-auto text-neutral-300 dark:text-neutral-600 mb-2" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            No telemarketers match your filter criteria.
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</div>