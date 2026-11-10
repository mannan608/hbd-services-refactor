<div x-data="{
    rows: [
        { id: 1, counsellor: 'Anisur Rahman Pinku', fileOpen: 37, ongoing: 0, discontinued: 2, appPending: 1, tApplication: 35, appDiscont: 5, gteCleared: 0, applyCoe: 0, coeReceived: 0, applyVisa: 0, visaGranted: 24, visaRefused: 4 },
        { id: 2, counsellor: 'Tushar Abdullah', fileOpen: 38, ongoing: 0, discontinued: 6, appPending: 2, tApplication: 36, appDiscont: 10, gteCleared: 0, applyCoe: 0, coeReceived: 0, applyVisa: 0, visaGranted: 17, visaRefused: 8 },
        { id: 3, counsellor: 'Mahmudul Hasan Zuzon', fileOpen: 26, ongoing: 0, discontinued: 12, appPending: 1, tApplication: 35, appDiscont: 21, gteCleared: 0, applyCoe: 0, coeReceived: 0, applyVisa: 0, visaGranted: 6, visaRefused: 6 },
        { id: 4, counsellor: 'Tanjila Akter Zilani', fileOpen: 12, ongoing: 2, discontinued: 4, appPending: 2, tApplication: 9, appDiscont: 6, gteCleared: 0, applyCoe: 0, coeReceived: 0, applyVisa: 0, visaGranted: 1, visaRefused: 0 },
        { id: 5, counsellor: 'Tausif Jaman', fileOpen: 5, ongoing: 1, discontinued: 4, appPending: 1, tApplication: 11, appDiscont: 5, gteCleared: 0, applyCoe: 0, coeReceived: 0, applyVisa: 0, visaGranted: 1, visaRefused: 0 },
        { id: 6, counsellor: 'Kazi Zubair Ahmed', fileOpen: 2, ongoing: 2, discontinued: 0, appPending: 0, tApplication: 3, appDiscont: 1, gteCleared: 0, applyCoe: 0, coeReceived: 0, applyVisa: 0, visaGranted: 0, visaRefused: 1 }
    ],
    getTotal(key) {
        return this.rows.reduce((sum, item) => sum + item[key], 0);
    }
}">
    <div class="overflow-x-auto rounded-lg border border-gray-100 bg-white p-2 shadow-sm">
        <table class="w-full text-left text-xs text-gray-600 border-collapse">
            <!-- Table Header -->
            <thead class="bg-slate-50 text-[11px] font-semibold tracking-wider uppercase border-b border-gray-100">
                <tr>
                    <th class="py-3 px-3 text-slate-400">#</th>
                    <th class="py-3 px-3 text-slate-500">Counsellor</th>
                    <th class="py-3 px-3 text-blue-500">File Open</th>
                    <th class="py-3 px-3 text-blue-500">Ongoing</th>
                    <th class="py-3 px-3 text-blue-500">Discontinued</th>
                    <th class="py-3 px-3 text-purple-600">App Pending</th>
                    <th class="py-3 px-3 text-purple-600">T.Application</th>
                    <th class="py-3 px-3 text-purple-600">App Discont.</th>
                    <th class="py-3 px-3 text-purple-600">GTE Cleared</th>
                    <th class="py-3 px-3 text-purple-600">Apply COE</th>
                    <th class="py-3 px-3 text-purple-600">COE Received</th>
                    <th class="py-3 px-3 text-purple-600">Apply Visa</th>
                    <th class="py-3 px-3 text-emerald-500 font-bold">Visa Granted</th>
                    <th class="py-3 px-3 text-red-500 font-bold">Visa Refused</th>
                </tr>
            </thead>

            <!-- Table Body -->
            <tbody class="divide-y divide-dashed divide-gray-200 font-medium">
                <template x-for="row in rows" :key="row.id">
                    <tr class="hover:bg-slate-50/60 transition-colors">
                        <td class="py-3 px-3 text-slate-500" x-text="row.id"></td>
                        <td class="py-3 px-3 font-semibold text-slate-700" x-text="row.counsellor"></td>
                        <td class="py-3 px-3 text-blue-500" x-text="row.fileOpen"></td>
                        <td class="py-3 px-3 text-blue-500" x-text="row.ongoing"></td>
                        <td class="py-3 px-3 text-blue-500" x-text="row.discontinued"></td>
                        <td class="py-3 px-3 text-purple-600" x-text="row.appPending"></td>
                        <td class="py-3 px-3 text-purple-600" x-text="row.tApplication"></td>
                        <td class="py-3 px-3 text-purple-600" x-text="row.appDiscont"></td>
                        <td class="py-3 px-3 text-purple-600" x-text="row.gteCleared"></td>
                        <td class="py-3 px-3 text-purple-600" x-text="row.applyCoe"></td>
                        <td class="py-3 px-3 text-purple-600" x-text="row.coeReceived"></td>
                        <td class="py-3 px-3 text-purple-600" x-text="row.applyVisa"></td>
                        <td class="py-3 px-3 text-emerald-500 font-bold" x-text="row.visaGranted"></td>
                        <td class="py-3 px-3 text-red-500 font-bold" x-text="row.visaRefused"></td>
                    </tr>
                </template>
            </tbody>

            <!-- Table Footer / Totals -->
            <tfoot>
                <tr class="bg-emerald-50/50 font-bold text-emerald-800 border-t border-emerald-100">
                    <td colspan="2" class="py-3 px-3">Total</td>
                    <td class="py-3 px-3" x-text="getTotal('fileOpen')"></td>
                    <td class="py-3 px-3" x-text="getTotal('ongoing')"></td>
                    <td class="py-3 px-3" x-text="getTotal('discontinued')"></td>
                    <td class="py-3 px-3" x-text="getTotal('appPending')"></td>
                    <td class="py-3 px-3" x-text="getTotal('tApplication')"></td>
                    <td class="py-3 px-3" x-text="getTotal('appDiscont')"></td>
                    <td class="py-3 px-3" x-text="getTotal('gteCleared')"></td>
                    <td class="py-3 px-3" x-text="getTotal('applyCoe')"></td>
                    <td class="py-3 px-3" x-text="getTotal('coeReceived')"></td>
                    <td class="py-3 px-3" x-text="getTotal('applyVisa')"></td>
                    <td class="py-3 px-3" x-text="getTotal('visaGranted')"></td>
                    <td class="py-3 px-3" x-text="getTotal('visaRefused')"></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>