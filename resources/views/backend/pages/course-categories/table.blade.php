@php
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Storage;

    $collection =
        $items instanceof \Illuminate\Pagination\AbstractPaginator ? $items->getCollection() : collect($items);

    $tableRowData = $collection
        ->map(function ($category) {
            return [
                'id' => $category->id,
                'name' => $category->name,
                'description' => $category->description,
                'status' => $category->is_active ? 'active' : 'inactive',
            ];
        })
        ->values();

    $role = request()->route('role');
@endphp

<div x-data="{
    tableRowData: {{ \Illuminate\Support\Js::from($tableRowData) }},
    categoryBaseUrl: {{ Js::from(url('/' . $role . '/course-categories')) }},
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
    <form x-ref="deleteForm" :action="rowToDelete ? (categoryBaseUrl + '/' + rowToDelete.id) : '#'" method="POST"
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
                    <div class="text-base font-semibold text-neutral-800 dark:text-white/90">Delete Training Center?
                    </div>
                    <div class="mt-1 text-sm text-neutral-600 dark:text-neutral-400">
                        This will permanently delete training center:
                        <span class="font-mono" x-text="rowToDelete ? rowToDelete.name : ''"></span>
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
                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase">
                            ID
                        </th>
                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase">
                            Name
                        </th>
                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase">
                            Description
                        </th>
                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase">
                            Status
                        </th>

                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase text-right">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-neutral-100 dark:divide-white/[0.05]">
                    <template x-if="tableRowData.length === 0">
                        <tr>
                            <td colspan="3"
                                class="px-5 py-10 text-center text-sm text-neutral-500 dark:text-neutral-400">
                                No category records found.
                            </td>
                        </tr>
                    </template>
                    <template x-for="row in tableRowData" :key="row.id">
                        <tr class="hover:bg-neutral-50 transition-colors">
                            <td class="px-5 py-4">
                                <span class="px-2 py-1 bg-neutral-100 rounded text-xs font-mono" x-text="row.id">
                                </span>
                            </td>
                            <td class="px-5 py-4 text-sm text-neutral-700" x-text="row.name"></td>
                            <td class="px-5 py-4 text-sm text-neutral-700" x-text="row.description"></td>
                            <td class="px-5 py-4 text-sm">
                                <span x-text="row.status"
                                    class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold capitalize tracking-wide transition-colors"
                                    :class="{
                                        'bg-emerald-50 text-emerald-700 ring-1 ring-inset ring-emerald-600/20 dark:bg-emerald-500/10 dark:text-emerald-400 dark:ring-emerald-500/20': [
                                            'active', 'open', 'published'
                                        ].includes(row.status?.toLowerCase()),
                                        'bg-amber-50 text-amber-700 ring-1 ring-inset ring-amber-600/20 dark:bg-amber-500/10 dark:text-amber-400 dark:ring-amber-500/20': [
                                            'pending', 'upcoming', 'draft'
                                        ].includes(row.status?.toLowerCase()),
                                        'bg-rose-50 text-rose-700 ring-1 ring-inset ring-rose-600/20 dark:bg-rose-500/10 dark:text-rose-400 dark:ring-rose-500/20': [
                                            'inactive', 'closed', 'archived'
                                        ].includes(row.status?.toLowerCase()),
                                        'bg-neutral-100 text-neutral-600 ring-1 ring-inset ring-neutral-500/10 dark:bg-neutral-800 dark:text-neutral-400 dark:ring-neutral-700':
                                            !['active', 'open', 'published', 'pending', 'upcoming', 'draft', 'inactive',
                                                'closed', 'archived'
                                            ].includes(row.status?.toLowerCase())
                                    }"></span>
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex justify-end gap-2">

                                    @can('course-categories.edit')
                                        <a :href="categoryBaseUrl + '/' + row.id + '/edit'"
                                            class="p-2 text-neutral-500 hover:text-blue-600 hover:bg-blue-50 rounded-lg">

                                            <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                    @endcan
                                    @can('course-categories.delete')
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
