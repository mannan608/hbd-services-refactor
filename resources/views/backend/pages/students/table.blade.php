@php
    $collection =
        $students instanceof \Illuminate\Pagination\AbstractPaginator ? $students->getCollection() : collect($students);

    $tableRowData = $collection
        ->map(function ($student) {
            return [
                'id' => $student->id,
                'name' => $student->user?->name ?? 'N/A',
                'email' => $student->user?->email ?? 'N/A',
                'phone' => $student->user?->phone ?? 'N/A',
                'avatar' => $student->user?->avatar ? asset($student->user->avatar) : null,
                'status' => $student->user?->status ?? 'N/A',
            ];
        })
        ->values();

    $role = request()->route('role');
@endphp

<div x-data="{
    tableRowData: {{ \Illuminate\Support\Js::from($tableRowData) }},
    baseUrl: {{ \Illuminate\Support\Js::from(url('/' . $role . '/students')) }}}">

    <div class="overflow-hidden rounded-xl border border-neutral-100 dark:border-white/[0.05] bg-white p-4">
        <div class="max-w-full overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-neutral-50 dark:bg-white/[0.02] border-b border-neutral-100 dark:border-white/[0.05]">
                    <tr>
                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">SL</th>
                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">Name</th>
                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">Phone No
                        </th>
                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">English Proficiency</th>
                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">Source and Initiative</th>
                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">Follow Up  Date</th>
                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">Status</th>
                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider text-right">
                            Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-neutral-100 dark:divide-white/[0.05]">
                    <template x-if="tableRowData.length === 0">
                        <tr>
                            <td colspan="7"
                                class="px-5 py-10 text-center text-sm text-neutral-500 dark:text-neutral-400">
                                No student records found.
                            </td>
                        </tr>
                    </template>
                    <template x-for="row in tableRowData" :key="row.id">
                        <tr class="hover:bg-neutral-50/50 dark:hover:bg-white/[0.01] transition-colors">
                            <td class="px-5 py-4">
                                <span
                                    class="px-2 py-1 bg-neutral-100 dark:bg-neutral-800 text-neutral-600 dark:text-neutral-400 rounded text-xs font-mono"
                                    x-text="row.id"></span>
                            </td>
                            <td class="px-5 py-4 text-sm text-neutral-700 dark:text-neutral-300">
                                <div class="min-w-0">
                                    <div class="truncate text-sm font-semibold text-neutral-800 dark:text-neutral-100"
                                        x-text="row.name"></div>
                                    <div class="mt-0.5 max-w-45 truncate text-xs text-neutral-400 dark:text-neutral-500"
                                        x-text="row.email"></div>
                                </div>
                            </td>
                            <td class="px-5 py-4 text-sm text-neutral-500 dark:text-neutral-400">
                                <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300"
                                    x-text="row.phone"></span>
                                <div class="text-xs text-neutral-400 dark:text-neutral-500">
                                    01315565037
                                </div>
                            </td>

                            <td class="px-5 py-4 text-sm text-neutral-500 dark:text-neutral-400">
                                 <div class="space-y-1.5">

                                    <div class="flex items-center gap-2">
                                        <span class="w-24 text-[13px] text-neutral-400">
                                            Exam Name
                                        </span>

                                        <span
                                            class="rounded-md bg-blue-50 px-2 py-0.5
                                                   text-xs font-medium text-blue-700
                                                   dark:bg-blue-500/10
                                                   dark:text-blue-400"
                                        >
                                            IELTS
                                        </span>
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <span class="w-24 text-[13px] text-neutral-400">
                                            Passing Year
                                        </span>

                                        <span class="text-xs font-medium text-neutral-600 dark:text-neutral-300">
                                           2021
                                        </span>
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <span class="w-24 text-[13px] text-neutral-400">
                                            Overall Score
                                        </span>

                                        <span class="text-xs font-semibold text-neutral-700 dark:text-neutral-200">
                                           50
                                        </span>
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <span class="w-24 text-[13px] text-neutral-400">
                                            Score
                                        </span>

                                        <span class="text-xs text-neutral-600 dark:text-neutral-400">
                                            <span class="font-medium">40</span>
                                            
                                        </span>
                                    </div>

                                </div>
                            </td>
                            <td class="px-5 py-4 text-sm text-neutral-500 dark:text-neutral-400">
                                <div class="space-y-2">

                                    <div class="flex items-center gap-2">                                    

                                        <div>
                                            <div class="text-[10px] uppercase tracking-wide text-neutral-400">
                                                Source
                                            </div>

                                            <div class="text-[13px] font-medium text-neutral-700 dark:text-neutral-300">
                                                Facebook Form
                                            </div>
                                        </div>

                                    </div>

                                    <div class="flex items-center gap-2">

                                        <div>
                                            <div class="text-[10px] uppercase tracking-wide text-neutral-400">
                                                Initiative
                                            </div>

                                            <div class="text-[13px] font-medium text-neutral-600 dark:text-neutral-400">
                                                Westing Visa Program
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </td>
                            <td class="px-5 py-4 text-sm text-neutral-500 dark:text-neutral-400">
                               10/9/2026
                            </td>
                            <td class="px-5 py-4 text-sm">
                                <span :class="row.status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'"
                                    class="px-2 py-0.5 rounded text-xs font-medium capitalize"
                                    x-text="row.status ? 'Active' : 'Inactive'"></span>
                            </td>
                            <td class="px-5 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                   <button class="bg-brand-500 text-white px-3 py-2">Quick View</button>

                                    <a :href="baseUrl + '/' + row.id"
                                        class="bg-brand-50 p-2 text-neutral-500 hover:text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-500/10 rounded-lg transition-all">
                                        <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />

                                            <circle cx="12" cy="12" r="3" stroke-width="2" />

                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>

        @if ($students instanceof \Illuminate\Pagination\AbstractPaginator)
            <div class="px-5 py-4 border-t border-neutral-100 dark:border-white/[0.05]">
                {{ $students->links() }}
            </div>
        @endif
    </div>
</div>
