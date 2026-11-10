
@php
    $role = request()->route('role');

    $collection = $items instanceof \Illuminate\Pagination\AbstractPaginator
        ? $items->getCollection()
        : collect($items);

    $tableRowData = $collection->map(function ($designation) {
        return [
            'id' => $designation->id,
            'name' => $designation->name,
            'code' => $designation->code ?: '—',
            'level' => $designation->level ?? '—',
            'status' => $designation->is_active ? 'active' : 'inactive',
        ];
    })->values();

    $baseUrl = route('role.designations.index', ['role' => $role]);
@endphp

<div
    x-data="{
        rows: {{ \Illuminate\Support\Js::from($tableRowData) }},
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
        }
    }"
    @keydown.escape.window="closeDeleteModal()"
>
    {{-- Delete Form --}}
    <form
        x-ref="deleteForm"
        :action="rowToDelete ? (baseUrl + '/' + rowToDelete.id) : ''"
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
        aria-labelledby="delete-designation-title"
    >
        <div
            class="absolute inset-0 bg-neutral-950/50"
            @click="closeDeleteModal()"
        ></div>

        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div class="w-full max-w-md rounded-2xl border border-neutral-200 bg-white shadow-2xl dark:border-neutral-800 dark:bg-neutral-900">

                <div class="border-b border-neutral-100 p-5 dark:border-neutral-800">
                    <div class="flex items-center gap-3">
                        <div class="flex size-11 items-center justify-center rounded-xl bg-red-50 text-red-600 dark:bg-red-500/10 dark:text-red-400">
                            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M12 9v4m0 4h.01M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z" />
                            </svg>
                        </div>

                        <div>
                            <h2 id="delete-designation-title"
                                class="text-base font-semibold text-neutral-900 dark:text-white">
                                Delete Designation?
                            </h2>

                            <p class="mt-1 text-xs text-neutral-500 dark:text-neutral-400">
                                Please confirm before continuing.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="p-5">
                    <p class="text-sm text-neutral-600 dark:text-neutral-300">
                        You are about to delete:
                    </p>

                    <p
                        class="mt-2 break-words rounded-lg bg-neutral-50 px-3 py-3 text-sm font-semibold text-neutral-900 dark:bg-neutral-800 dark:text-white"
                        x-text="rowToDelete ? rowToDelete.name : ''"
                    ></p>

                    <p class="mt-3 text-xs leading-5 text-neutral-500 dark:text-neutral-400">
                        Designations linked to existing employment records cannot be deleted.
                    </p>

                    <div class="mt-6 flex justify-end gap-3">
                        <button
                            type="button"
                            @click="closeDeleteModal()"
                            class="rounded-lg border border-neutral-300 px-4 py-2.5 text-sm font-medium text-neutral-700 hover:bg-neutral-50 dark:border-neutral-700 dark:text-neutral-200 dark:hover:bg-neutral-800"
                        >
                            Cancel
                        </button>

                        <button
                            type="button"
                            @click="confirmDelete()"
                            :disabled="!rowToDelete"
                            class="rounded-lg bg-red-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-red-700 disabled:cursor-not-allowed disabled:opacity-50"
                        >
                            Confirm Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="overflow-hidden rounded-xl border border-neutral-200 bg-white dark:border-neutral-800 dark:bg-neutral-900">

        <div class="overflow-x-auto">
            <table class="w-full min-w-[800px] border-collapse text-left">

                <thead class="border-b border-neutral-200 bg-neutral-50 dark:border-neutral-800 dark:bg-white/[0.02]">
                    <tr>
                        <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wider text-neutral-500">
                            ID
                        </th>

                        <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wider text-neutral-500">
                            Designation
                        </th>

                        <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wider text-neutral-500">
                            Code
                        </th>

                        <th class="px-5 py-4 text-center text-xs font-semibold uppercase tracking-wider text-neutral-500">
                            Level
                        </th>

                        <th class="px-5 py-4 text-center text-xs font-semibold uppercase tracking-wider text-neutral-500">
                            Status
                        </th>

                        <th class="px-5 py-4 text-right text-xs font-semibold uppercase tracking-wider text-neutral-500">
                            Actions
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-neutral-100 dark:divide-white/[0.05]">

                    <template x-if="rows.length === 0">
                        <tr>
                            <td colspan="6"
                                class="px-5 py-12 text-center text-sm text-neutral-500">
                                No designation records found.
                            </td>
                        </tr>
                    </template>

                    <template x-for="(row, index) in rows" :key="row.id">
                        <tr class="transition-colors hover:bg-neutral-50/70 dark:hover:bg-white/[0.02]">

                            <td class="px-5 py-4">
                                <span
                                    class="rounded-md bg-neutral-100 px-2 py-1 font-mono text-xs text-neutral-600 dark:bg-neutral-800 dark:text-neutral-300"
                                    x-text="String(row.id)"
                                ></span>
                            </td>

                          <td class="px-5 py-4">
                                <span
                                    class="rounded-md bg-neutral-100 px-2 py-1 font-mono text-xs text-neutral-700 dark:bg-neutral-800 dark:text-neutral-300"
                                    x-text="row.name"
                                ></span>
                            </td>

                            <td class="px-5 py-4">
                                <span
                                    class="rounded-md bg-neutral-100 px-2 py-1 font-mono text-xs text-neutral-700 dark:bg-neutral-800 dark:text-neutral-300"
                                    x-text="row.code"
                                ></span>
                            </td>

                            <td class="px-5 py-4 text-center text-sm text-neutral-600 dark:text-neutral-300"
                                x-text="row.level"></td>

                            <td class="px-5 py-4 text-center">
                                <span
                                    :class="row.status === 'active'
                                        ? 'bg-green-50 text-green-700 ring-green-600/20 dark:bg-green-500/10 dark:text-green-400'
                                        : 'bg-red-50 text-red-700 ring-red-600/20 dark:bg-red-500/10 dark:text-red-400'"
                                    class="inline-flex rounded-full px-2.5 py-1 text-xs font-semibold capitalize ring-1 ring-inset"
                                    x-text="row.status"
                                ></span>
                            </td>

                            <td class="px-5 py-4">
                                <div class="flex justify-end gap-2">
                                        <a :href="baseUrl + '/' + row.id + '/edit'" class="p-2 text-neutral-500 hover:text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-500/10 rounded-lg transition-all">
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
            <div class="border-t border-neutral-200 px-5 py-4 dark:border-neutral-800">
                {{ $items->links() }}
            </div>
        @endif
    </div>
</div>
