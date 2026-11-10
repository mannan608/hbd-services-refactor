
@php
    $collection = $items instanceof \Illuminate\Pagination\AbstractPaginator
        ? $items->getCollection()
        : collect($items);

    $tableRowData = $collection->map(function ($branch) {
        return [
            'id' => $branch->id,
            'name' => $branch->name,
            'code' => $branch->code ?? '—',
            'status' => $branch->is_active ? 'active' : 'inactive',
        ];
    })->values();

    $role = request()->route('role');
@endphp

<div
    x-data="{
        tableRowData: {{ \Illuminate\Support\Js::from($tableRowData) }},
        branchBaseUrl: {{ \Illuminate\Support\Js::from(url('/' . $role . '/branches')) }},
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
        }
    }"
    @keydown.escape.window="closeDeleteModal()"
>

    {{-- Delete Form --}}
    <form
        x-ref="deleteForm"
        :action="rowToDelete ? (branchBaseUrl + '/' + rowToDelete.id) : '#'"
        method="POST"
        class="hidden"
    >
        @csrf
        @method('DELETE')
    </form>

    {{-- Delete Confirmation Modal --}}
    <div
        x-show="showDeleteModal"
        x-cloak
        class="fixed inset-0 z-[99999]"
        role="dialog"
        aria-modal="true"
        aria-labelledby="deleteBranchTitle"
    >
        <div
            class="absolute inset-0 bg-neutral-900/50"
            @click="closeDeleteModal()"
        ></div>

        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div class="w-full max-w-md rounded-xl border border-neutral-200 bg-white shadow-xl dark:border-neutral-800 dark:bg-neutral-900">

                <div class="p-5">
                    <div
                        id="deleteBranchTitle"
                        class="text-base font-semibold text-neutral-800 dark:text-white/90"
                    >
                        Delete Branch?
                    </div>

                    <div class="mt-2 text-sm text-neutral-600 dark:text-neutral-400">
                        Are you sure you want to delete this branch?

                        <span
                            class="font-mono font-semibold text-neutral-800 dark:text-white"
                            x-text="rowToDelete ? rowToDelete.name : ''"
                        ></span>

                        <p class="mt-2 text-xs text-red-500">
                            This action cannot be undone.
                        </p>
                    </div>

                    <div class="mt-5 flex justify-end gap-3">
                        <button
                            type="button"
                            @click="closeDeleteModal()"
                            class="inline-flex items-center justify-center rounded-lg border border-neutral-300 px-4 py-2 text-sm font-medium text-neutral-700 hover:bg-neutral-50 dark:border-neutral-700 dark:text-neutral-200 dark:hover:bg-neutral-800"
                        >
                            Cancel
                        </button>

                        <button
                            type="button"
                            @click="confirmDelete()"
                            class="inline-flex items-center justify-center rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700"
                        >
                            Delete Branch
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Branch Table --}}
    <div class="overflow-hidden rounded-xl border border-neutral-100 bg-white dark:border-white/[0.05] dark:bg-neutral-900">

        <div class="max-w-full overflow-x-auto">
            <table class="w-full border-collapse text-left">

                <thead class="border-b border-neutral-100 bg-neutral-50 dark:border-white/[0.05] dark:bg-white/[0.02]">
                    <tr>
                        <th class="px-5 py-4 text-xs font-medium uppercase tracking-wider text-neutral-500">
                            ID
                        </th>

                        <th class="px-5 py-4 text-xs font-medium uppercase tracking-wider text-neutral-500">
                            Branch Name
                        </th>

                        <th class="px-5 py-4 text-xs font-medium uppercase tracking-wider text-neutral-500">
                            Branch Code
                        </th>

                        <th class="px-5 py-4 text-xs font-medium uppercase tracking-wider text-neutral-500">
                            Status
                        </th>

                        <th class="px-5 py-4 text-right text-xs font-medium uppercase tracking-wider text-neutral-500">
                            Action
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-neutral-100 dark:divide-white/[0.05]">

                    {{-- Empty State --}}
                    <template x-if="tableRowData.length === 0">
                        <tr>
                            <td
                                colspan="5"
                                class="px-5 py-10 text-center text-sm text-neutral-500 dark:text-neutral-400"
                            >
                                No branch records found.
                            </td>
                        </tr>
                    </template>

                    {{-- Branch Rows --}}
                    <template x-for="(row, index) in tableRowData" :key="row.id">
                        <tr class="transition-colors hover:bg-neutral-50/50 dark:hover:bg-white/[0.01]">

                            <td class="px-5 py-4">
                                <span
                                    class="rounded bg-neutral-100 px-2 py-1 font-mono text-xs text-neutral-600 dark:bg-neutral-800 dark:text-neutral-400"
                                    x-text="row.id"
                                ></span>
                            </td>

                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-sm font-bold uppercase text-brand-600 dark:bg-brand-500/10 dark:text-brand-400"
                                        x-text="row.name ? row.name.charAt(0) : 'B'"
                                    ></div>

                                    <span
                                        class="text-sm font-medium text-neutral-800 dark:text-neutral-200"
                                        x-text="row.name"
                                    ></span>
                                </div>
                            </td>

                            <td class="px-5 py-4 text-sm text-neutral-500 dark:text-neutral-400">
                                <span
                                    class="rounded bg-neutral-100 px-2 py-1 font-mono text-xs dark:bg-neutral-800"
                                    x-text="row.code"
                                ></span>
                            </td>

                            <td class="px-5 py-4 text-sm">
                                <span
                                    :class="row.status === 'active'
                                        ? 'bg-green-100 text-green-700 dark:bg-green-500/10 dark:text-green-400'
                                        : 'bg-red-100 text-red-700 dark:bg-red-500/10 dark:text-red-400'"
                                    class="rounded px-2 py-0.5 text-xs font-medium capitalize"
                                    x-text="row.status"
                                ></span>
                            </td>

                            <td class="px-5 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                        <a :href="branchBaseUrl + '/' + row.id + '/edit'" class="p-2 text-neutral-500 hover:text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-500/10 rounded-lg transition-all">
                                            <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <button type="button" @click="openDeleteModal(row)" class="p-2 text-neutral-500 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-500/10 rounded-lg transition-all">
                                            <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
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
