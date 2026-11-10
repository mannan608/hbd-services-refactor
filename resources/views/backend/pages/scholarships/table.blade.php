@php
    $collection =
        $items instanceof \Illuminate\Pagination\AbstractPaginator ? $items->getCollection() : collect($items);

    $tableRowData = $collection
        ->map(function ($scholarship) {
            return [
                'id' => $scholarship->id,
                'title' => $scholarship->title,
                'coverage' => $scholarship->coverage_type,
                'university' => $scholarship->university?->name ?? 'N/A',
                'course' => $scholarship->course?->title ?? 'N/A',
                'deadline' => $scholarship->deadline
                    ? \Illuminate\Support\Carbon::parse($scholarship->deadline)->format('Y-m-d')
                    : 'N/A',
                'is_active' => (bool) $scholarship->is_active,
            ];
        })
        ->values();

    $role = request()->route('role');
    $baseUrl = url('/' . $role . '/scholarships');
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
        if (!this.rowToDelete) {
            return;
        }

        this.$refs.deleteForm.submit();
    }
}" @keydown.escape.window="closeDeleteModal()">

    {{-- Delete Form --}}
    <form x-ref="deleteForm" :action="rowToDelete ? (baseUrl + '/' + rowToDelete.id) : '#'" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>


    {{-- Delete Modal --}}
    <div x-show="showDeleteModal" x-cloak class="fixed inset-0 z-[99999]">
        {{-- Overlay --}}
        <div class="absolute inset-0 bg-neutral-900/50" @click="closeDeleteModal()"></div>

        {{-- Modal --}}
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div
                class="w-full max-w-md rounded-xl border border-neutral-200 bg-white shadow-xl dark:border-neutral-800 dark:bg-neutral-900">
                <div class="p-5">

                    <div class="text-base font-semibold text-neutral-800 dark:text-white/90">
                        Delete Scholarship?
                    </div>

                    <div class="mt-1 text-sm text-neutral-600 dark:text-neutral-400">
                        This will permanently delete scholarship:

                        <span class="font-medium text-neutral-800 dark:text-white"
                            x-text="rowToDelete ? rowToDelete.title : ''"></span>
                    </div>

                    <div class="mt-5 flex justify-end gap-3">

                        <button type="button" @click="closeDeleteModal()"
                            class="inline-flex items-center justify-center rounded-lg border border-neutral-300 px-4 py-2 text-sm font-medium text-neutral-700 hover:bg-neutral-50 dark:border-neutral-700 dark:text-neutral-200 dark:hover:bg-neutral-800">
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


    {{-- Table --}}
    <div class="overflow-hidden rounded-xl border border-neutral-100 bg-white dark:border-white/[0.05]">

        <div class="max-w-full overflow-x-auto">

            <table class="w-full border-collapse text-left">

                {{-- Header --}}
                <thead class="border-b border-neutral-100 bg-neutral-50 dark:border-white/[0.05] dark:bg-white/[0.02]">

                    <tr>

                        <th class="px-5 py-4 text-xs font-medium uppercase text-neutral-500">
                            ID
                        </th>

                        <th class="px-5 py-4 text-xs font-medium uppercase text-neutral-500">
                            Scholarship
                        </th>

                        <th class="px-5 py-4 text-xs font-medium uppercase text-neutral-500">
                            Coverage
                        </th>

                        <th class="px-5 py-4 text-xs font-medium uppercase text-neutral-500">
                            Deadline
                        </th>

                        <th class="px-5 py-4 text-xs font-medium uppercase text-neutral-500">
                            University
                        </th>

                        <th class="px-5 py-4 text-xs font-medium uppercase text-neutral-500">
                            Course
                        </th>

                        <th class="px-5 py-4 text-xs font-medium uppercase text-neutral-500">
                            Status
                        </th>

                        <th class="px-5 py-4 text-right text-xs font-medium uppercase text-neutral-500">
                            Action
                        </th>

                    </tr>

                </thead>


                {{-- Body --}}
                <tbody class="divide-y divide-neutral-100 dark:divide-white/[0.05]">

                    {{-- Empty --}}
                    <template x-if="tableRowData.length === 0">

                        <tr>

                            <td colspan="8" class="px-5 py-10 text-center text-sm text-neutral-500 dark:text-neutral-400">
                                No scholarship records found.
                            </td>

                        </tr>

                    </template>


                    {{-- Rows --}}
                    <template x-for="(row,index) in tableRowData" :key="row.id">

                        <tr class="transition-colors hover:bg-neutral-50 dark:hover:bg-white/[0.02]">

                            {{-- ID --}}
                            <td class="px-5 py-4">

                                <span class="rounded bg-neutral-100 px-2 py-1 font-mono text-xs dark:bg-neutral-800"
                                    x-text="index+1"></span>

                            </td>


                            {{-- Scholarship --}}
                            <td class="px-5 py-4">

                                <div class="text-sm font-medium text-neutral-800 dark:text-white" x-text="row.title"></div>

                            </td>


                            {{-- Coverage --}}
                            <td class="px-5 py-4">

                                <span class="text-sm text-neutral-700 dark:text-neutral-300"
                                    x-text="row.coverage ? row.coverage.replaceAll('_', ' ') : 'N/A'"></span>

                            </td>


                            {{-- Deadline --}}
                            <td class="px-5 py-4">

                                <span class="text-sm text-neutral-700 dark:text-neutral-300" x-text="row.deadline"></span>

                            </td>


                            {{-- University --}}
                            <td class="px-5 py-4">

                                <span class="text-sm text-neutral-700 dark:text-neutral-300" x-text="row.university"></span>

                            </td>


                            {{-- Course --}}
                            <td class="px-5 py-4">

                                <span class="text-sm text-neutral-700 dark:text-neutral-300" x-text="row.course"></span>

                            </td>


                            {{-- Status --}}
                            <td class="px-5 py-4">

                                <span class="inline-flex rounded-full px-2.5 py-1 text-xs font-medium"
                                    :class="row.is_active ?
                                        'bg-green-100 text-green-700 dark:bg-green-500/10 dark:text-green-400' :
                                        'bg-neutral-100 text-neutral-600 dark:bg-neutral-500/10 dark:text-neutral-400'"
                                    x-text="row.is_active ? 'Active' : 'Inactive'"></span>

                            </td>


                            {{-- Actions --}}
                            <td class="px-5 py-4">

                                <div class="flex justify-end gap-2">

                                    {{-- Edit --}}
                                    @can('scholarships.edit')
                                        <a :href="baseUrl + '/' + row.id + '/edit'"
                                            class="rounded-lg p-2 text-neutral-500 hover:bg-blue-50 hover:text-blue-600 dark:hover:bg-blue-500/10"
                                            title="Edit">

                                            <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>

                                        </a>
                                    @endcan


                                    {{-- Delete --}}
                                    @can('scholarships.delete')
                                        <button type="button" @click="openDeleteModal(row)"
                                            class="rounded-lg p-2 text-neutral-500 hover:bg-red-50 hover:text-red-600 dark:hover:bg-red-500/10"
                                            title="Delete">

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


        {{-- Pagination --}}
        @if ($items instanceof \Illuminate\Pagination\AbstractPaginator)
            <div class="border-t border-neutral-100 px-5 py-4 dark:border-white/[0.05]">

                {{ $items->links() }}

            </div>
        @endif

    </div>

</div>