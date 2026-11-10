@php
    $collection =
        $destinations instanceof \Illuminate\Pagination\AbstractPaginator
            ? $destinations->getCollection()
            : collect($destinations);

    $tableRowData = $collection
        ->map(function ($destination) {
            return [
                'id' => $destination->id,
                'name' => $destination->name,
                'university' => $destination->universities_count ?? 0,
            ];
        })
        ->values();

    $role = request()->route('role');
@endphp

<div x-data="{
    tableRowData: {{ \Illuminate\Support\Js::from($tableRowData) }}
}">

    <div class="overflow-hidden rounded-xl border border-neutral-100 dark:border-white/[0.05] bg-white">

        <div class="max-w-full overflow-x-auto">

            <table class="w-full text-left border-collapse">

                <thead class="bg-neutral-50 dark:bg-white/[0.02] border-b border-neutral-100 dark:border-white/[0.05]">
                    <tr>
                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">
                            Id
                        </th>

                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">
                            Name
                        </th>

                        <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">
                            University
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-neutral-100 dark:divide-white/[0.05]">

                    <template x-if="tableRowData.length === 0">
                        <tr>
                            <td colspan="3"
                                class="px-5 py-10 text-center text-sm text-neutral-500 dark:text-neutral-400">
                                No destination records found.
                            </td>
                        </tr>
                    </template>

                    <template x-for="(row, index) in tableRowData" :key="row.id">
                        <tr class="hover:bg-neutral-50/50 dark:hover:bg-white/[0.01] transition-colors">

                            <td class="px-5 py-4">
                                <span
                                    class="px-2 py-1 bg-neutral-100 dark:bg-neutral-800 text-neutral-600 dark:text-neutral-400 rounded text-xs font-mono"
                                    x-text="index + 1"></span>
                            </td>

                            <td class="px-5 py-4 text-sm text-neutral-700 dark:text-neutral-300" x-text="row.name"></td>

                            <td class="px-5 py-4 text-sm text-neutral-500 dark:text-neutral-400">

                                <a :href="'{{ role_route('role.destination.universities', ['country' => '__COUNTRY__']) }}'
                                .replace('__COUNTRY__', row.id)"
                                    class="group inline-flex items-center gap-2 rounded-lg px-2.5 py-1.5 text-sm font-semibold text-neutral-800 transition-all duration-200 hover:bg-neutral-100 hover:text-brand-600 dark:text-neutral-200 dark:hover:bg-neutral-800/80 dark:hover:text-brand-400">
                                    <span x-text="row.university"></span>
                                    <svg class="h-4 w-4 text-neutral-400 transition-transform duration-200 group-hover:translate-x-0.5 group-hover:text-brand-600 dark:text-neutral-500 dark:group-hover:text-brand-400"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>

                            </td>

                        </tr>
                    </template>

                </tbody>

            </table>

        </div>

        @if ($destinations instanceof \Illuminate\Pagination\AbstractPaginator)
            <div class="px-5 py-4 border-t border-neutral-100 dark:border-white/[0.05]">
                {{ $destinations->links() }}
            </div>
        @endif

    </div>

</div>
