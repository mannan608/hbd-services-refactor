@php
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Storage;

    $collection = $items instanceof \Illuminate\Pagination\AbstractPaginator
        ? $items->getCollection()
        : collect($items);

    $tableRowData = $collection->map(function ($course) {
        return [
            'id' => $course->id,
            'name' => $course->title,
            'slug' => $course->slug,
            'category' => $course->category->name ?? null,
            'university' => $course->university->name ?? null,
            'campus' => $course->campuses->pluck('name')->implode(', '),
            'degree' => $course->degree_level,
            'duration' => $course->duration_months,
            'tuition' => $course->tuition_fee,
            'status' => $course->is_active ? 'active' : 'inactive',
            
        ];
    })->values();

// dd($tableRowData);
    $role = request()->route('role');
@endphp

<div x-data="{
    tableRowData: {{ \Illuminate\Support\Js::from($tableRowData) }},
    courseBaseUrl: {{ \Illuminate\Support\Js::from(url('/' . $role . '/courses')) }},
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
        <form x-ref="deleteForm" :action="rowToDelete ? (courseBaseUrl + '/' + rowToDelete.id) : '#'" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>

        <div x-show="showDeleteModal" x-cloak class="fixed inset-0 z-99999">
            <div class="absolute inset-0 bg-neutral-900/50" @click="closeDeleteModal()"></div>
            <div class="absolute inset-0 flex items-center justify-center p-4">
                <div class="w-full max-w-md rounded-xl bg-white dark:bg-neutral-900 border border-neutral-200 dark:border-neutral-800 shadow-xl">
                    <div class="p-5">
                        <div class="text-base font-semibold text-neutral-800 dark:text-white/90">Delete course?</div>
                        <div class="mt-1 text-sm text-neutral-600 dark:text-neutral-400">
                            This will permanently delete course:
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
   
        <div class="overflow-hidden rounded-xl border border-neutral-100 dark:border-white/5 bg-white">
            <div class="max-w-full overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-neutral-50 dark:bg-white/2 border-b border-neutral-100 dark:border-white/5">
                        <tr>
                            <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">Id</th>
                            <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">Name</th>
                            <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">Category</th>
                            
                            <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">University</th>
                            <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">Campus</th>
                            <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">Degree</th>
                            <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">Duration</th>
                            <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">Tuition</th>
                            <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">Status</th>
                            <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-100 dark:divide-white/5">
                        <template x-if="tableRowData.length === 0">
                            <tr>
                                <td colspan="7" class="px-5 py-10 text-center text-sm text-neutral-500 dark:text-neutral-400">
                                    No course records found.
                                </td>
                            </tr>
                        </template>
                        <template x-for="(row, index) in tableRowData" :key="row.id">
                            <tr class="hover:bg-neutral-50/50 dark:hover:bg-white/1 transition-colors">
                                <td class="px-5 py-4">
                                    <span class="px-2 py-1 bg-neutral-100 dark:bg-neutral-800 text-neutral-600 dark:text-neutral-400 rounded text-xs font-mono" x-text="index + 1"></span>
                                </td>
                                <td class="px-5 py-4 text-sm text-neutral-700 dark:text-neutral-300" x-text="row.name"></td>
                                <td class="px-5 py-4 text-sm text-neutral-500 dark:text-neutral-400" x-text="row.category"></td>
                                <td class="px-5 py-4 text-sm text-neutral-500 dark:text-neutral-400" x-text="row.university"></td>
                                <td class="px-5 py-4 text-sm text-neutral-500 dark:text-neutral-400" x-text="row.campus"></td>
                                <td class="px-5 py-4 text-sm text-neutral-500 dark:text-neutral-400" x-text="row.degree"></td>
                                <td class="px-5 py-4 text-sm text-neutral-500 dark:text-neutral-400" x-text="row.duration"></td>
                                <td class="px-5 py-4 text-sm text-neutral-500 dark:text-neutral-400" x-text="row.tuition"></td>

                                <td class="px-5 py-4 text-sm">
                                    <span :class="row.status === 'active' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'" class="px-2 py-0.5 rounded text-xs font-medium capitalize" x-text="row.status"></span>
                                </td>
                                <td class="px-5 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a :href="courseBaseUrl + '/' + row.id"
                                        class="p-2 text-neutral-500 hover:text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-500/10 rounded-lg transition-all">
                                        <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />

                                            <circle cx="12" cy="12" r="3" stroke-width="2" />

                                        </svg>
                                    </a>
                                        <a :href="courseBaseUrl + '/' + row.id + '/edit'" class="p-2 text-neutral-500 hover:text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-500/10 rounded-lg transition-all">
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
            
            @if ($items instanceof \Illuminate\Pagination\AbstractPaginator)
                <div class="px-5 py-4 border-t border-neutral-100 dark:border-white/5">
                    {{ $items->links() }}
                </div>
            @endif
        </div>
    
</div>
