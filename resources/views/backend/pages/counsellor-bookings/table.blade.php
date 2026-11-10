@php
    $collection =
        $items instanceof \Illuminate\Pagination\AbstractPaginator ? $items->getCollection() : collect($items);

    $tableRowData = $collection
        ->map(function ($booking) {
            return [
                'id' => $booking->id,
                'counsellor_name' => $booking->counsellor?->user?->name ?? 'N/A',
                'client_name' => $booking->name,
                'email' => $booking->email,
                'phone' => $booking->phone,
                'service' => $booking->service,
                'appointment_date' => optional($booking->appointment_date)->format('M d, Y'),
                'appointment_time' => $booking->appointment_time,
                'status' => $booking->status ?? 'pending',
            ];
        })
        ->values();

    $role = request()->route('role');
@endphp

<div x-data="{
    tableRowData: {{ \Illuminate\Support\Js::from($tableRowData) }},
    bookingBaseUrl: {{ \Illuminate\Support\Js::from(url('/' . $role . '/booking-sessions')) }},
    showDeleteModal: false,
    rowToDelete: null,
    formatService(service) {
        if (!service) return 'N/A';

        return service
            .replace(/_/g, ' ')
            .replace(/\b\w/g, char => char.toUpperCase());
    },

    formatTime(time) {
        if (!time) return 'N/A';

        const [hours, minutes] = time.split(':');

        const date = new Date();
        date.setHours(hours, minutes, 0);

        return date.toLocaleTimeString('en-US', {
            hour: 'numeric',
            minute: '2-digit',
            hour12: true
        });
    },

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

        this.$refs.deleteForm.action = this.bookingBaseUrl + '/' + this.rowToDelete.id;
        this.$refs.deleteForm.submit();
    }
}" @keydown.escape.window="closeDeleteModal()">
    <form x-ref="deleteForm" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>

    <div x-show="showDeleteModal" x-cloak class="fixed inset-0 z-[99999]">
        <div class="absolute inset-0 bg-neutral-900/50" @click="closeDeleteModal()"></div>

        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div
                class="w-full max-w-md rounded-xl border border-neutral-200 bg-white shadow-xl dark:border-neutral-800 dark:bg-neutral-900">
                <div class="p-5">
                    <div class="text-base font-semibold text-neutral-800 dark:text-white/90">
                        Delete Booking?
                    </div>

                    <div class="mt-1 text-sm text-neutral-600 dark:text-neutral-400">
                        This will permanently delete booking for
                        <span class="font-mono" x-text="rowToDelete ? rowToDelete.client_name : ''"></span>
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

    <div class="overflow-hidden rounded-xl border border-neutral-100 bg-white dark:border-white/[0.05]">
        <div class="max-w-full overflow-x-auto">
            <table class="w-full border-collapse text-left">
                <thead class="border-b border-neutral-100 bg-neutral-50 dark:border-white/[0.05] dark:bg-white/[0.02]">
                    <tr>
                        <th class="px-5 py-4 text-xs font-medium uppercase tracking-wider text-neutral-500">Id</th>
                        <th class="px-5 py-4 text-xs font-medium uppercase tracking-wider text-neutral-500">Counsellor
                        </th>
                        <th class="px-5 py-4 text-xs font-medium uppercase tracking-wider text-neutral-500">Client</th>
                        <th class="px-5 py-4 text-xs font-medium uppercase tracking-wider text-neutral-500">Phone</th>
                        <th class="px-5 py-4 text-xs font-medium uppercase tracking-wider text-neutral-500">Mail</th>
                        <th class="px-5 py-4 text-xs font-medium uppercase tracking-wider text-neutral-500">Service</th>
                        <th class="px-5 py-4 text-xs font-medium uppercase tracking-wider text-neutral-500">Date</th>
                        <th class="px-5 py-4 text-xs font-medium uppercase tracking-wider text-neutral-500">Time</th>
                        <th class="px-5 py-4 text-xs font-medium uppercase tracking-wider text-neutral-500">Status</th>
                        <th class="px-5 py-4 text-right text-xs font-medium uppercase tracking-wider text-neutral-500">
                            Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-neutral-100 dark:divide-white/[0.05]">
                    <template x-if="tableRowData.length === 0">
                        <tr>
                            <td colspan="10"
                                class="px-5 py-10 text-center text-sm text-neutral-500 dark:text-neutral-400">
                                No booking records found.
                            </td>
                        </tr>
                    </template>

                    <template x-for="(row, index) in tableRowData" :key="row.id">
                        <tr class="transition-colors hover:bg-neutral-50/50 dark:hover:bg-white/[0.01]">
                            <td class="px-5 py-4">
                                <span
                                    class="rounded bg-neutral-100 px-2 py-1 font-mono text-xs text-neutral-600 dark:bg-neutral-800 dark:text-neutral-400"
                                    x-text="index + 1"></span>
                            </td>

                            <td class="px-5 py-4 text-sm text-neutral-700 dark:text-neutral-300"
                                x-text="row.counsellor_name"></td>
                            <td class="px-5 py-4 text-sm text-neutral-700 dark:text-neutral-300">
                                <div class="font-medium" x-text="row.client_name"></div>
                            </td>
                            <td class="px-5 py-4 text-sm text-neutral-500 dark:text-neutral-400"
                                x-text="row.phone || 'N/A'"></td>
                            <td class="px-5 py-4 text-sm text-neutral-500 dark:text-neutral-400"
                                x-text="row.email || 'N/A'"></td>
                            <td class="px-5 py-4 text-sm text-neutral-500 dark:text-neutral-400"
                                x-text="formatService(row.service)"></td>
                            <td class="px-5 py-4 text-sm text-neutral-500 dark:text-neutral-400"
                                x-text="row.appointment_date || 'N/A'"></td>
                            <td class="px-5 py-4 text-sm text-neutral-500 dark:text-neutral-400"
                                x-text="formatTime(row.appointment_time)"></td>
                            <td class="px-5 py-4 text-sm">
                                <form :action="bookingBaseUrl + '/' + row.id" method="POST" class="inline-block">
                                    @csrf
                                    @method('PUT')

                                    <select name="status" onchange="this.form.submit()"
                                        class="inline-flex w-fit min-w-30 rounded-lg border border-neutral-200 bg-white px-3 py-1.5 text-xs font-medium capitalize text-neutral-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                                        <option value="pending" :selected="row.status === 'pending'">
                                            Pending
                                        </option>

                                        <option value="confirmed" :selected="row.status === 'confirmed'">
                                            Confirmed
                                        </option>

                                        <option value="completed" :selected="row.status === 'completed'">
                                            Completed
                                        </option>

                                        <option value="cancelled" :selected="row.status === 'cancelled'">
                                            Cancelled
                                        </option>
                                    </select>
                                </form>
                            </td>

                            <td class="px-5 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a :href="bookingBaseUrl + '/' + row.id" title="View Booking"
                                        class="rounded-lg p-2 text-neutral-500 transition-all hover:bg-blue-50 hover:text-blue-600 dark:hover:bg-blue-500/10">
                                        <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            <circle cx="12" cy="12" r="3" stroke-width="2" />
                                        </svg>
                                    </a>

                                    <button type="button" title="Delete Booking" @click="openDeleteModal(row)"
                                        class="rounded-lg p-2 text-neutral-500 transition-all hover:bg-red-50 hover:text-red-600 dark:hover:bg-red-500/10">
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

        @if ($items instanceof \Illuminate\Pagination\AbstractPaginator)
            <div class="border-t border-neutral-100 px-5 py-4 dark:border-white/[0.05]">
                {{ $items->links() }}
            </div>
        @endif
    </div>
</div>
