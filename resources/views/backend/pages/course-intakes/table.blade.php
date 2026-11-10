@php
    $collection =
        $items instanceof \Illuminate\Pagination\AbstractPaginator ? $items->getCollection() : collect($items);

    $tableRowData = $collection
        ->map(function ($intake) {
            return [
                'id' => $intake->id,
                'course_title' => $intake->course?->title ?? 'N/A',
                'intake_month' => $intake->intake_month,
                'intake_year' => $intake->intake_year,
                'application_deadline' => optional($intake->application_deadline)->format('Y-m-d'),
                'start_date' => optional($intake->start_date)->format('Y-m-d'),
                 

            ];
        })
        ->values();

    $role = request()->route('role');
    $baseUrl = url('/' . $role . '/course-intakes');
@endphp

<div x-data="{
    tableRowData: {{ \Illuminate\Support\Js::from($tableRowData) }},
    baseUrl: {{ \Illuminate\Support\Js::from($baseUrl) }},
    showDeleteModal: false,
    rowToDelete: null,

    openDeleteModal(row) {
        this.rowToDelete = row;
        this.showDeleteModal = true;
    },

    closeDeleteModal() {
        this.showDeleteModal = false;
        this.rowToDelete = null;
    },

    confirmDelete() {
        if (!this.rowToDelete) return;
        this.$refs.deleteForm.submit();
    },

}" @keydown.escape.window="closeDeleteModal()">
    <form x-ref="deleteForm" :action="rowToDelete ? (baseUrl + '/' + rowToDelete.id) : '#'" method="POST"
        class="hidden">
        @csrf
        @method('DELETE')
    </form>

    <div x-show="showDeleteModal" x-cloak class="fixed inset-0 z-[99999]">
        <div class="absolute inset-0 bg-neutral-900/50" @click="closeDeleteModal()"></div>
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div
                class="w-full max-w-md rounded-xl bg-white dark:bg-neutral-900 border border-neutral-200 dark:border-neutral-800 shadow-xl">
                <div class="p-5">
                    <div class="text-base font-semibold text-neutral-800 dark:text-white/90">Delete Course Intake?</div>
                    <div class="mt-1 text-sm text-neutral-600 dark:text-neutral-400">
                        This will permanently delete course intake:
                        <span class="font-mono"
                            x-text="rowToDelete ? `${rowToDelete.course_title} ${rowToDelete.intake_month} ${rowToDelete.intake_year}` : ''"></span>
                    </div>
                    <div class="mt-5 flex justify-end gap-3">
                        <button type="button" @click="closeDeleteModal()"
                            class="inline-flex items-center justify-center rounded-lg border border-neutral-300 dark:border-neutral-700 px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-200 hover:bg-neutral-50 dark:hover:bg-neutral-800">
                            Cancel
                        </button>
                        <button type="button" @click="confirmDelete()"
                            class="inline-flex items-center justify-center rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="overflow-hidden rounded-xl border border-neutral-100 dark:border-white/[0.05] bg-white">
        <div class="max-w-full overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-neutral-50 dark:bg-white/[0.02] border-b border-neutral-100 dark:border-white/[0.05]">
                    <tr>
                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase">ID</th>
                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase">Course</th>
                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase">Intake</th>
                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase">Deadline</th>
                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase">Start Date</th>
                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-neutral-100 dark:divide-white/[0.05]">
                    <template x-if="tableRowData.length === 0">
                        <tr>
                            <td colspan="7" class="px-5 py-10 text-center text-sm text-neutral-500 dark:text-neutral-400">
                                No course intake records found.
                            </td>
                        </tr>
                    </template>
                    <template x-for="row in tableRowData" :key="row.id">
                        <tr class="hover:bg-neutral-50 transition-colors">
                            <td class="px-5 py-4">
                                <span class="px-2 py-1 bg-neutral-100 rounded text-xs font-mono" x-text="row.id"></span>
                            </td>
                            <td class="px-5 py-4 text-sm text-neutral-700" x-text="row.course_title"></td>
                            <td class="px-5 py-4 text-sm text-neutral-700"
                                x-text="`${row.intake_month} ${row.intake_year}`"></td>
                            <td class="px-5 py-4 text-sm text-neutral-700" x-text="row.application_deadline"></td>
                            <td class="px-5 py-4 text-sm text-neutral-700" x-text="row.start_date || 'N/A'"></td>
                            
                            <td class="px-5 py-4">
                                <div class="flex justify-end gap-2">
                                    @can('course-intakes.edit')
                                        <a :href="baseUrl + '/' + row.id + '/edit'"
                                            class="p-2 text-neutral-500 hover:text-blue-600 hover:bg-blue-50 rounded-lg">
                                            <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                    @endcan

                                    @can('course-intakes.delete')
                                        <button type="button" @click="openDeleteModal(row)"
                                            class="p-2 text-neutral-500 hover:text-red-600 hover:bg-red-50 rounded-lg">
                                            <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>

        @if ($items instanceof \Illuminate\Pagination\AbstractPaginator)
            <div class="px-5 py-4 border-t border-neutral-100 dark:border-white/[0.05]">
                {{ $items->links() }}
            </div>
        @endif
    </div>
</div>
