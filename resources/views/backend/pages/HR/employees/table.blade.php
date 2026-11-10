
@php
    $collection = $items instanceof \Illuminate\Pagination\AbstractPaginator
        ? $items->getCollection()
        : collect($items);

    $tableRowData = $collection->map(function ($employee) {
        return [
            'id' => $employee->id,
            'name' => $employee->full_name ?: 'N/A',
            'email' => $employee->user?->email ?? 'No account',
            'phone' => $employee->user?->phone ?? '—',
            'country' => $employee->country?->name ?? '—',
            'verified' => (bool) $employee->is_verified,
        ];
    })->values();

    $role = request()->route('role');
@endphp

<div x-data="{
    rows: {{ \Illuminate\Support\Js::from($tableRowData) }},
    baseUrl: {{ \Illuminate\Support\Js::from(url('/' . $role . '/employees')) }},
    showDeleteModal: false,
    selected: null,

    openDeleteModal(row) {
        this.selected = row;
        this.showDeleteModal = true;
    },

    closeDeleteModal() {
        this.showDeleteModal = false;
        this.selected = null;
    },

    confirmDelete() {
        if (this.selected) this.$refs.deleteForm.submit();
    }
}" @keydown.escape.window="closeDeleteModal()">

    <form x-ref="deleteForm"
        :action="selected ? baseUrl + '/' + selected.id : '#'"
        method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>

    {{-- Delete confirmation --}}
    <div x-cloak x-show="showDeleteModal" class="fixed inset-0 z-[99999]">
        <div class="absolute inset-0 bg-neutral-900/50"
            @click="closeDeleteModal()"></div>

        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div class="w-full max-w-md rounded-xl border border-neutral-200 bg-white shadow-xl dark:border-neutral-800 dark:bg-neutral-900">
                <div class="p-5">
                    <h3 class="text-base font-semibold text-neutral-800 dark:text-white">
                        Delete Employee?
                    </h3>

                    <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400">
                        Are you sure you want to delete
                        <span class="font-semibold" x-text="selected?.name"></span>?
                    </p>

                    <p class="mt-1 text-xs text-neutral-500">
                        This action deletes the employee record.
                    </p>

                    <div class="mt-6 flex justify-end gap-3">
                        <button type="button" @click="closeDeleteModal()"
                            class="rounded-lg border border-neutral-300 px-4 py-2 text-sm dark:border-neutral-700">
                            Cancel
                        </button>

                        <button type="button" @click="confirmDelete()"
                            class="rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="overflow-hidden rounded-xl border border-neutral-100 bg-white dark:border-white/[0.05] dark:bg-neutral-900">
        <div class="max-w-full overflow-x-auto">
            <table class="w-full border-collapse text-left">
                <thead class="border-b border-neutral-100 bg-neutral-50 dark:border-white/[0.05] dark:bg-white/[0.02]">
                    <tr>
                        <th class="px-5 py-4 text-xs font-medium uppercase tracking-wider text-neutral-500">#</th>
                        <th class="px-5 py-4 text-xs font-medium uppercase tracking-wider text-neutral-500">Employee</th>
                        <th class="px-5 py-4 text-xs font-medium uppercase tracking-wider text-neutral-500">Email</th>
                        <th class="px-5 py-4 text-xs font-medium uppercase tracking-wider text-neutral-500">Phone</th>
                        <th class="px-5 py-4 text-xs font-medium uppercase tracking-wider text-neutral-500">Country</th>
                        <th class="px-5 py-4 text-xs font-medium uppercase tracking-wider text-neutral-500">Verification</th>
                        <th class="px-5 py-4 text-right text-xs font-medium uppercase tracking-wider text-neutral-500">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-neutral-100 dark:divide-white/[0.05]">
                    <template x-if="rows.length === 0">
                        <tr>
                            <td colspan="7"
                                class="px-5 py-10 text-center text-sm text-neutral-500">
                                No employees found.
                            </td>
                        </tr>
                    </template>

                    <template x-for="(row, index) in rows" :key="row.id">
                        <tr class="transition-colors hover:bg-neutral-50/70 dark:hover:bg-white/[0.02]">
                            <td class="px-5 py-4 text-sm text-neutral-500"
                                x-text="{{ $items instanceof \Illuminate\Pagination\AbstractPaginator ? $items->firstItem() - 1 : 0 }} + index + 1">
                            </td>

                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-50 font-semibold text-brand-700 dark:bg-brand-500/10 dark:text-brand-300">
                                        <span x-text="row.name.charAt(0).toUpperCase()"></span>
                                    </div>
                                    <span class="text-sm font-medium text-neutral-800 dark:text-white/90"
                                        x-text="row.name"></span>
                                </div>
                            </td>

                            <td class="px-5 py-4 text-sm text-neutral-500 dark:text-neutral-400"
                                x-text="row.email"></td>

                            <td class="px-5 py-4 text-sm text-neutral-500 dark:text-neutral-400"
                                x-text="row.phone"></td>

                            <td class="px-5 py-4 text-sm text-neutral-500 dark:text-neutral-400"
                                x-text="row.country"></td>

                            <td class="px-5 py-4">
                                <span
                                    :class="row.verified ? 'bg-green-100 text-green-700' : 'bg-amber-100 text-amber-700'"
                                    class="rounded-full px-2.5 py-1 text-xs font-medium"
                                    x-text="row.verified ? 'Verified' : 'Pending'">
                                </span>
                            </td>

                            <td class="px-5 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a :href="baseUrl + '/' + row.id + '/edit'"
                                        title="Edit Employee"
                                        class="rounded-lg p-2 text-neutral-500 transition hover:bg-blue-50 hover:text-blue-600 dark:hover:bg-blue-500/10">
                                        <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>

                                    <button type="button"
                                        @click="openDeleteModal(row)"
                                        title="Delete Employee"
                                        class="rounded-lg p-2 text-neutral-500 transition hover:bg-red-50 hover:text-red-600 dark:hover:bg-red-500/10">
                                        <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>

        @if ($items instanceof \Illuminate\Pagination\AbstractPaginator)
            <div class="border-t border-neutral-100 px-5 py-4 dark:border-white/[0.05]">
                {{ $items->links() }}
            </div>
        @endif
    </div>
</div>
