@php
    use Illuminate\Support\Facades\Storage;

    $collection = $items instanceof \Illuminate\Pagination\AbstractPaginator
        ? $items->getCollection()
        : collect($items);

    $tableRowData = $collection->map(function ($event) {
        return [
            'id' => $event->id,
            'title' => $event->title,
            'registration_link' => $event->registration_link,
            'slug' => $event->slug,
            'status' => $event->status,
            'is_featured' => (bool) $event->is_featured,
            'views' => (int) ($event->views ?? 0),
            'banner' => $event->banner ? asset($event->banner) : null,
        ];
    })->values();
@endphp

<div x-data="{
copied: null,
    tableRowData: {{ \Illuminate\Support\Js::from($tableRowData) }},
    eventBaseUrl: {{ \Illuminate\Support\Js::from(url('/admin/events')) }},
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

    statusBadgeClass(status) {
        if (status === 'upcoming') return 'bg-blue-50 text-blue-700 dark:bg-blue-500/15 dark:text-blue-400';
        if (status === 'ongoing') return 'bg-green-50 text-green-700 dark:bg-green-500/15 dark:text-green-500';
        if (status === 'completed') return 'bg-neutral-100 text-neutral-700 dark:bg-neutral-800 dark:text-neutral-300';
        if (status === 'cancelled') return 'bg-red-50 text-red-700 dark:bg-red-500/15 dark:text-red-500';
        return 'bg-neutral-100 text-neutral-700 dark:bg-neutral-800 dark:text-neutral-300';
    }
}" @keydown.escape.window="closeDeleteModal()">
    <form x-ref="deleteForm" :action="rowToDelete ? (eventBaseUrl + '/' + rowToDelete.slug) : '#'" method="POST"
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
                    <div class="text-base font-semibold text-neutral-800 dark:text-white/90">Delete Event?</div>
                    <div class="mt-1 text-sm text-neutral-600 dark:text-neutral-400">
                        This will permanently delete event:
                        <span class="font-mono" x-text="rowToDelete ? rowToDelete.title : ''"></span>
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
                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">Id</th>
                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">Title</th>
                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">Registration Link</th>
                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">Status</th>
                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">Featured</th>
                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">Banner</th>
                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">Views</th>
                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider text-right">Action
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-neutral-100 dark:divide-white/[0.05]">
                    <template x-if="tableRowData.length === 0">
                        <tr>
                            <td colspan="7" class="px-5 py-10 text-center text-sm text-neutral-500 dark:text-neutral-400">
                                No event records found.
                            </td>
                        </tr>
                    </template>
                    <template x-for="row in tableRowData" :key="row.id">
                        <tr class="hover:bg-neutral-50/50 dark:hover:bg-white/[0.01] transition-colors">
                            <td class="px-5 py-4">
                                <span class="px-2 py-1 bg-neutral-100 dark:bg-neutral-800 text-neutral-600 dark:text-neutral-400 rounded text-xs font-mono"
                                    x-text="row.id"></span>
                            </td>
                            <td class="px-5 py-4 text-sm text-neutral-700 dark:text-neutral-300" x-text="row.title"></td>
                            {{-- <td class="px-5 py-4 text-sm text-neutral-700 dark:text-neutral-300" x-text="row.registration_link"></td> --}}
                            <td class="px-5 py-4 text-sm text-neutral-700 dark:text-neutral-300">
    <div class="flex items-center gap-2">
        <span
            class="max-w-[200px] truncate"
            x-text="row.registration_link"
        ></span>

        <button
            type="button"
            @click="
                navigator.clipboard.writeText(row.registration_link);
                copied = row.id;
                setTimeout(() => copied = null, 1500);
            "
            class="inline-flex shrink-0 items-center gap-1.5 rounded-md px-2 py-1 text-xs font-medium transition"
            :class="copied === row.id
                ? 'bg-emerald-50 text-emerald-600'
                : 'bg-neutral-100 text-neutral-600 hover:bg-brand-50 hover:text-brand-600'"
        >
            <template x-if="copied !== row.id">
                <span class="inline-flex items-center gap-1.5">
                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2"
                        />
                        <rect
                            width="10"
                            height="10"
                            x="10"
                            y="10"
                            rx="2"
                            stroke="currentColor"
                            stroke-width="2"
                        />
                    </svg>

                    Copy
                </span>
            </template>

            <template x-if="copied === row.id">
                <span class="inline-flex items-center gap-1.5 text-emerald-600">
                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 13l4 4L19 7"
                        />
                    </svg>

                    Copied!
                </span>
            </template>
        </button>
    </div>
</td>
                            
                            <td class="px-5 py-4">
                                <span :class="statusBadgeClass(row.status)"
                                    class="px-2.5 py-0.5 rounded-full text-xs font-medium" x-text="row.status"></span>
                            </td>
                            <td class="px-5 py-4 text-sm text-neutral-700 dark:text-neutral-300">
                                <span x-text="row.is_featured ? 'Yes' : 'No'"></span>
                            </td>
                            <td class="px-5 py-4">
                                <template x-if="row.banner">
                                    <img :src="row.banner" class="w-10 h-10 rounded border border-neutral-200 object-cover"
                                        loading="lazy" alt="bannar image">
                                </template>
                                <template x-if="!row.banner">
                                    <span class="text-xs text-neutral-400 italic">None</span>
                                </template>
                            </td>
                            <td class="px-5 py-4 text-sm text-neutral-700 dark:text-neutral-300" x-text="row.views"></td>
                            <td class="px-5 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a :href="eventBaseUrl + '/' + row.slug + '/edit'"
                                        class="p-2 text-neutral-500 hover:text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-500/10 rounded-lg transition-all">
                                        <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <button type="button" @click="openDeleteModal(row)"
                                        class="p-2 text-neutral-500 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-500/10 rounded-lg transition-all">
                                        <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>
</div>
