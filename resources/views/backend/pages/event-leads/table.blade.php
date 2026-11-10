@php
    $collection =
        $eventLeads instanceof \Illuminate\Pagination\AbstractPaginator
            ? $eventLeads->getCollection()
            : collect($eventLeads);

    $tableRowData = $collection
        ->map(function ($lead) {
            return [
                'id' => $lead->id,
                'event_id' => $lead->event_id,
                'event_title' => $lead->event?->title ?? 'N/A',
                'full_name' => $lead->full_name,
                'email' => $lead->email,
                'phone' => $lead->phone,
                'whatsapp' => $lead->whatsapp,
                'interested_course' => $lead->interested_course,
                'source' => $lead->source,
            ];
        })
        ->values();

    $role = request()->route('role');
@endphp

<div x-data="{
    tableRowData: {{ \Illuminate\Support\Js::from($tableRowData) }},
    leadBaseUrl: {{ \Illuminate\Support\Js::from(url('/' . $role . '/event-leads')) }},

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

        this.$refs.deleteForm.action =
            this.leadBaseUrl + '/' + this.rowToDelete.id;

        this.$refs.deleteForm.submit();
    }
}" @keydown.escape.window="closeDeleteModal()">

    {{-- Delete Form --}}
    <form x-ref="deleteForm" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>


    {{-- Delete Modal --}}
    <div x-show="showDeleteModal" x-cloak class="fixed inset-0 z-[99999]">

        <div class="absolute inset-0 bg-neutral-900/50" @click="closeDeleteModal()"></div>

        <div class="absolute inset-0 flex items-center justify-center p-4">

            <div
                class="w-full max-w-md
                    rounded-xl
                    bg-white dark:bg-neutral-900
                    border border-neutral-200 dark:border-neutral-800
                    shadow-xl">

                <div class="p-5">

                    <div class="text-base font-semibold
                            text-neutral-800 dark:text-white/90">
                        Delete Lead?
                    </div>

                    <div class="mt-1 text-sm
                            text-neutral-600 dark:text-neutral-400">
                        This will permanently delete lead:

                        <span class="font-mono" x-text="rowToDelete ? rowToDelete.full_name : ''"></span>
                    </div>

                    <div class="mt-5 flex justify-end gap-3">

                        <button type="button" @click="closeDeleteModal()"
                            class="inline-flex items-center justify-center
                                rounded-lg
                                border border-neutral-300 dark:border-neutral-700
                                px-4 py-2
                                text-sm font-medium
                                text-neutral-700 dark:text-neutral-200
                                hover:bg-neutral-50 dark:hover:bg-neutral-800">
                            Cancel
                        </button>

                        <button type="button" @click="confirmDelete()"
                            class="inline-flex items-center justify-center
                                rounded-lg
                                bg-red-600
                                px-4 py-2
                                text-sm font-medium
                                text-white
                                hover:bg-red-700">
                            Delete
                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Lead Table --}}
    <div
        class="overflow-hidden
            rounded-xl
            border border-neutral-100 dark:border-white/[0.05]
            bg-white">

        <div class="max-w-full overflow-x-auto">

            <table class="w-full text-left border-collapse">

                <thead
                    class="bg-neutral-50 dark:bg-white/[0.02]
                        border-b border-neutral-100 dark:border-white/[0.05]">

                    <tr>

                        <th
                            class="px-5 py-4
                                text-xs font-medium
                                text-neutral-500
                                uppercase tracking-wider">
                            Id
                        </th>

                        <th
                            class="px-5 py-4
                                text-xs font-medium
                                text-neutral-500
                                uppercase tracking-wider">
                            Event
                        </th>

                        <th
                            class="px-5 py-4
                                text-xs font-medium
                                text-neutral-500
                                uppercase tracking-wider">
                            Name
                        </th>

                        <th
                            class="px-5 py-4
                                text-xs font-medium
                                text-neutral-500
                                uppercase tracking-wider">
                            Phone
                        </th>

                        <th
                            class="px-5 py-4
                                text-xs font-medium
                                text-neutral-500
                                uppercase tracking-wider">
                            Mail
                        </th>

                        <th
                            class="px-5 py-4
                                text-xs font-medium
                                text-neutral-500
                                uppercase tracking-wider">
                            Course
                        </th>

                        <th
                            class="px-5 py-4
                                text-xs font-medium
                                text-neutral-500
                                uppercase tracking-wider">
                            Source
                        </th>

                        <th
                            class="px-5 py-4
                                text-xs font-medium
                                text-neutral-500
                                uppercase tracking-wider
                                text-right">
                            Action
                        </th>

                    </tr>

                </thead>


                <tbody
                    class="divide-y
                        divide-neutral-100
                        dark:divide-white/[0.05]">

                    {{-- Empty State --}}
                    <template x-if="tableRowData.length === 0">

                        <tr>

                            <td colspan="9"
                                class="px-5 py-10
                                    text-center
                                    text-sm
                                    text-neutral-500
                                    dark:text-neutral-400">
                                No event lead records found.
                            </td>

                        </tr>

                    </template>


                    {{-- Lead Rows --}}
                    <template x-for="( row, index) in tableRowData" :key="row.id">

                        <tr
                            class="hover:bg-neutral-50/50
                                dark:hover:bg-white/[0.01]
                                transition-colors">

                            {{-- ID --}}
                            <td class="px-5 py-4">

                                <span
                                    class="px-2 py-1
                                        bg-neutral-100
                                        dark:bg-neutral-800
                                        text-neutral-600
                                        dark:text-neutral-400
                                        rounded
                                        text-xs
                                        font-mono"
                                    x-text="index + 1"></span>

                            </td>


                            {{-- Event --}}
                            <td class="px-5 py-4">

                                <div class="text-sm
                                        font-medium
                                        text-neutral-700
                                        dark:text-neutral-300"
                                    x-text="row.event_title"></div>

                                <div
                                    class="text-xs
                                        text-neutral-400
                                        mt-1">
                                    ID:
                                    <span x-text="row.event_id"></span>
                                </div>

                            </td>


                            {{-- Name --}}
                            <td
                                class="px-5 py-4
                                    text-sm
                                    text-neutral-700
                                    dark:text-neutral-300">
                                <div class="font-medium" x-text="row.full_name"></div>
                                <div class="text-xs
                                        text-neutral-400
                                        mt-1"
                                    x-show="row.email">
                                    <span x-text="row.email"></span>
                                </div>

                            </td>


                            {{-- Phone --}}
                            <td
                                class="px-5 py-4
                                    text-sm
                                    text-neutral-500
                                    dark:text-neutral-400">
                                <div x-text="row.phone || 'N/A'"></div>

                                <div class="text-xs
                                        text-neutral-400
                                        mt-1"
                                    x-show="row.whatsapp">
                                    WhatsApp:
                                    <span x-text="row.whatsapp"></span>
                                </div>

                            </td>


                            {{-- Email --}}
                            <td
                                class="px-5 py-4
                                    text-sm
                                    text-neutral-500
                                    dark:text-neutral-400">
                                <span x-text="row.email"></span>
                            </td>


                            {{-- Interested Course --}}
                            <td
                                class="px-5 py-4
                                    text-sm
                                    text-neutral-500
                                    dark:text-neutral-400">
                                <span x-text="row.interested_course || 'N/A'"></span>
                            </td>                        

                            {{-- Source --}}
                            <td class="px-5 py-4 text-sm">

                                <span
                                    class="px-2 py-0.5
                                        bg-neutral-100
                                        text-neutral-700
                                        rounded
                                        text-xs
                                        font-medium
                                        capitalize"
                                    x-text="row.source"></span>

                            </td>


                            {{-- Actions --}}
                            <td class="px-5 py-4 text-right">

                                <div class="flex justify-end gap-2">

                                    {{-- View --}}
                                    <a :href="leadBaseUrl + '/' + row.id" title="View Lead"
                                        class="p-2
                                            text-neutral-500
                                            hover:text-blue-600
                                            hover:bg-blue-50
                                            dark:hover:bg-blue-500/10
                                            rounded-lg
                                            transition-all">

                                        <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />

                                            <circle cx="12" cy="12" r="3" stroke-width="2" />

                                        </svg>

                                    </a>


                                    {{-- Delete --}}
                                    <button type="button" title="Delete Lead" @click="openDeleteModal(row)"
                                        class="p-2
                                            text-neutral-500
                                            hover:text-red-600
                                            hover:bg-red-50
                                            dark:hover:bg-red-500/10
                                            rounded-lg
                                            transition-all">

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


        {{-- Pagination --}}
        @if ($eventLeads instanceof \Illuminate\Pagination\AbstractPaginator)
            <div
                class="px-5 py-4
                    border-t
                    border-neutral-100
                    dark:border-white/[0.05]">
                {{ $eventLeads->links() }}
            </div>
        @endif

    </div>

</div>