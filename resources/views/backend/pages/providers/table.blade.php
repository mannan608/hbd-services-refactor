@php
    $collection =
        $items instanceof \Illuminate\Pagination\AbstractPaginator ? $items->getCollection() : collect($items);

    $tableRowData = $collection
        ->map(function ($item) {
            return [
                'id' => $item->id,
                'user_id' => $item->user_id,
                'short_name' => $item->short_name,
                'phone' => $item->phone,
                'country' => $item->country,
                'state' => $item->state,
                'city' => $item->city,
                'address' => $item->address,

                // Nested user data
                'user_name' => $item->user?->name,
                'email' => $item->user?->email,
                'user_phone' => $item->user?->phone,
                'status' => $item->user?->status ?? 'inactive',

                'created_at' => $item->created_at?->format('d M Y'),
            ];
        })
        ->values();

    $role = request()->route('role');
@endphp

<div x-data="{
    tableRowData: {{ \Illuminate\Support\Js::from($tableRowData) }},

    baseUrl: {{ \Illuminate\Support\Js::from(url('/' . $role . '/providers')) }},

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
}" @keydown.escape.window="closeDeleteModal()">

    {{-- Delete Form --}}
    <form x-ref="deleteForm" :action="rowToDelete ? (baseUrl + '/' + rowToDelete.id) : '#'" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>


    {{-- Delete Modal --}}
    <div x-show="showDeleteModal" x-cloak class="fixed inset-0 z-[99999]">

        <div class="absolute inset-0 bg-neutral-900/50" @click="closeDeleteModal()"></div>

        <div class="absolute inset-0 flex items-center justify-center p-4">

            <div
                class="w-full max-w-md rounded-xl
                       bg-white dark:bg-neutral-900
                       border border-neutral-200 dark:border-neutral-800
                       shadow-xl">

                <div class="p-5">

                    <div class="text-base font-semibold text-neutral-800 dark:text-white/90">
                        Delete Address?
                    </div>

                    <div class="mt-1 text-sm text-neutral-600 dark:text-neutral-400">
                        This will permanently delete:

                        <span class="font-semibold" x-text="rowToDelete ? rowToDelete.short_name : ''"></span>
                    </div>

                    <div class="mt-5 flex justify-end gap-3">

                        <button type="button" @click="closeDeleteModal()"
                            class="inline-flex items-center justify-center
                                   rounded-lg border border-neutral-300
                                   dark:border-neutral-700
                                   px-4 py-2 text-sm font-medium
                                   text-neutral-700 dark:text-neutral-200
                                   hover:bg-neutral-50 dark:hover:bg-neutral-800">
                            Cancel
                        </button>

                        <button type="button" @click="confirmDelete()"
                            class="inline-flex items-center justify-center
                                   rounded-lg bg-red-600
                                   px-4 py-2 text-sm font-medium text-white
                                   hover:bg-red-700">
                            Delete
                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Table --}}
    <div
        class="overflow-hidden rounded-xl
               border border-neutral-100
               dark:border-white/[0.05]
               bg-white dark:bg-neutral-900">

        <div class="max-w-full overflow-x-auto">

            <table class="w-full text-left border-collapse">

                {{-- Header --}}
                <thead
                    class="bg-neutral-50
                           dark:bg-white/[0.02]
                           border-b border-neutral-100
                           dark:border-white/[0.05]">

                    <tr>

                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">
                            ID
                        </th>

                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">
                           Name
                        </th>

                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">
                            Contact
                        </th>

                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">
                            University
                        </th>

                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">
                            Campus
                        </th>
                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">
                            Subject
                        </th>

                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">
                            Status
                        </th>

                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">
                           Contract Date
                        </th>

                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider text-right">
                            Action
                        </th>

                    </tr>

                </thead>


                {{-- Body --}}
                <tbody class="divide-y divide-neutral-100
                           dark:divide-white/[0.05]">

                    {{-- Empty --}}
                    <template x-if="tableRowData.length === 0">

                        <tr>

                            <td colspan="8"
                                class="px-5 py-10 text-center
                                       text-sm text-neutral-500
                                       dark:text-neutral-400">
                                No records found.
                            </td>

                        </tr>

                    </template>


                    {{-- Rows --}}
                    <template x-for="row in tableRowData" :key="row.id">

                        <tr
                            class="hover:bg-neutral-50/50
                                   dark:hover:bg-white/[0.01]
                                   transition-colors">

                            {{-- ID --}}
                            <td class="px-5 py-4">

                                <span
                                    class="inline-flex items-center
                                           px-2 py-1
                                           bg-neutral-100
                                           dark:bg-neutral-800
                                           text-neutral-600
                                           dark:text-neutral-400
                                           rounded text-xs font-mono"
                                    x-text="'#' + row.id"></span>

                            </td>


                            {{-- User --}}
                            <td class="px-5 py-4">

                                <div class="flex items-center gap-3">

                                    {{-- Avatar --}}
                                    <div class="flex items-center justify-center
                                               w-10 h-10 rounded-full
                                               bg-blue-100
                                               text-blue-700
                                               font-semibold
                                               text-sm
                                               dark:bg-blue-500/10
                                               dark:text-blue-400"
                                        x-text="
                                            row.user_name
                                                ? row.user_name
                                                    .split(' ')
                                                    .map(n => n[0])
                                                    .slice(0, 2)
                                                    .join('')
                                                    .toUpperCase()
                                                : '?'
                                        ">
                                    </div>

                                    <div>

                                        <div class="text-sm font-medium
                                                   text-neutral-800
                                                   dark:text-white"
                                            x-text="row.user_name || row.short_name || 'N/A'"></div>

                                        <div class="text-xs text-neutral-500
                                                   dark:text-neutral-400"
                                            x-text="row.user_name"></div>

                                    </div>

                                </div>

                            </td>


                            {{-- Contact --}}
                            <td class="px-5 py-4">

                                <div class="space-y-1">

                                    <div class="text-sm text-neutral-700
                                               dark:text-neutral-300"
                                        x-text="row.email || 'No email'"></div>

                                    <div class="text-xs text-neutral-500
                                               dark:text-neutral-400"
                                        x-text="row.phone || row.user_phone || 'No phone'"></div>

                                </div>

                            </td>


                            {{-- Location --}}
                            <td class="px-5 py-4">

                                <div class="flex items-start gap-2">

                                    <svg class="w-4 h-4 mt-0.5 text-neutral-400 shrink-0" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 21s8-7.2 8-12a8 8 0 10-16 0c0 4.8 8 12 8 12z" />

                                        <circle cx="12" cy="9" r="2.5" stroke-width="2" />
                                    </svg>

                                    <div>

                                        <div
                                            class="text-sm text-neutral-700
                                                   dark:text-neutral-300">
                                            <span x-text="row.city || 'N/A'"></span>
                                            <span x-show="row.city && row.state">, </span>
                                            <span x-text="row.state || ''"></span>
                                        </div>

                                        <div class="text-xs text-neutral-500
                                                   dark:text-neutral-400"
                                            x-text="row.country || 'N/A'"></div>

                                    </div>

                                </div>

                            </td>


                            {{-- Address --}}
                            <td class="px-5 py-4">

                                <div class="max-w-[220px]
                                           text-sm text-neutral-600
                                           dark:text-neutral-400
                                           truncate"
                                    :title="row.address" x-text="row.address || 'No address'"></div>

                            </td>
                            <td class="px-5 py-4">

                                <div class="max-w-[220px]
                                           text-sm text-neutral-600
                                           dark:text-neutral-400
                                           truncate"
                                    :title="row.address" x-text="row.address || 'No address'"></div>

                            </td>


                            {{-- Status --}}
                            <td class="px-5 py-4">

                                <span
                                    :class="row.status === 'active' ?
                                        'bg-green-100 text-green-700 dark:bg-green-500/10 dark:text-green-400' :
                                        'bg-red-100 text-red-700 dark:bg-red-500/10 dark:text-red-400'"
                                    class="inline-flex items-center
                                           gap-1.5
                                           px-2.5 py-1
                                           rounded-full
                                           text-xs font-medium
                                           capitalize">

                                    <span
                                        :class="row.status === 'active' ?
                                            'bg-green-500' :
                                            'bg-red-500'"
                                        class="w-1.5 h-1.5 rounded-full"></span>

                                    <span x-text="row.status"></span>

                                </span>

                            </td>


                            {{-- Created --}}
                            <td class="px-5 py-4">

                                <span
                                    class="text-sm text-neutral-500
                                           dark:text-neutral-400 whitespace-nowrap"
                                    x-text="row.created_at || 'N/A'"></span>

                            </td>


                            {{-- Actions --}}
                            <td class="px-5 py-4 text-right">

                                <div class="flex justify-end gap-2">

                                    {{-- view --}}
                                 <a :href="baseUrl + '/' + row.id"
                                        class="p-2 text-neutral-500 hover:text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-500/10 rounded-lg transition-all">
                                        <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />

                                            <circle cx="12" cy="12" r="3" stroke-width="2" />

                                        </svg>
                                    </a>

                                    {{-- Edit --}}
                                    <a :href="baseUrl + '/' + row.id + '/edit'"
                                        class="p-2 text-neutral-500
                                               hover:text-blue-600
                                               hover:bg-blue-50
                                               dark:hover:bg-blue-500/10
                                               rounded-lg
                                               transition-all"
                                        title="Edit">

                                        <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>

                                    </a>


                                    {{-- Delete --}}
                                    <button type="button" @click="openDeleteModal(row)"
                                        class="p-2 text-neutral-500
                                               hover:text-red-600
                                               hover:bg-red-50
                                               dark:hover:bg-red-500/10
                                               rounded-lg
                                               transition-all"
                                        title="Delete">

                                        <svg class="size-5" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
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


        {{-- Pagination --}}
        @if ($items instanceof \Illuminate\Pagination\AbstractPaginator)
            <div
                class="px-5 py-4
                       border-t border-neutral-100
                       dark:border-white/[0.05]">
                {{ $items->links() }}
            </div>
        @endif

    </div>

</div>