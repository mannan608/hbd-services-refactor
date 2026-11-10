
@php
    $refusals = [
        [
            'country' => 'Canada',
            'visa_type' => 'Study Permit',
            'year' => '2023',
            'reason' =>
                'Section 216(1)(b) — Officer not satisfied applicant would leave Canada at the end of period authorized for stay.',
            'doc_name' => 'Refusal_Letter_Canada_2023.pdf',
            'doc_size' => '1.2 MB',
            'doc_url' => '#',
        ],
    ];
@endphp


<div class="flex flex-wrap items-center justify-between gap-4 border-b border-amber-50 pb-4">

    <div class="flex items-center gap-3">

        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
            <iconify-icon icon="lucide:shield-alert" class="text-xl"></iconify-icon>
        </div>

        <div>

            <h2 class="text-base font-bold text-brand-950">
                Immigration History
            </h2>

            <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-brand-600">
                Visa Refusal & Travel Records
            </p>

        </div>

    </div>


    {{-- Refusal Count --}}
    @if (count($refusals) > 0)
        <span
            class="inline-flex items-center gap-1.5 rounded-full border border-amber-200 bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-700">

            <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>

            {{ count($refusals) }}
            {{ count($refusals) === 1 ? 'Previous Refusal' : 'Previous Refusals' }}
            Recorded

        </span>
    @else
        <span
            class="inline-flex items-center gap-1.5 rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">

            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

            No Previous Refusals

        </span>
    @endif

</div>


{{-- Refusal History --}}
@if (count($refusals) > 0)

    <div class="space-y-4">

        @foreach ($refusals as $item)

            <div
                class="space-y-3 rounded-xl border border-amber-100 bg-amber-50/30 p-4 transition-all hover:bg-amber-50/60">

                {{-- Refusal Header --}}
                <div class="flex flex-wrap items-center justify-between gap-2 border-b border-amber-100/60 pb-3">

                    <div class="flex items-center gap-2.5">

                        <div
                            class="flex h-7 w-7 items-center justify-center rounded-lg bg-amber-100 text-amber-700">

                            <iconify-icon icon="lucide:file-warning" class="text-base"></iconify-icon>

                        </div>

                        <div>

                            <h3 class="text-xs font-bold text-slate-900">
                                {{ $item['country'] }} — {{ $item['visa_type'] }}
                            </h3>

                            <p class="text-[11px] text-slate-500">
                                Application Year: {{ $item['year'] }}
                            </p>

                        </div>

                    </div>


                    <span
                        class="rounded-md bg-amber-100/80 px-2 py-0.5 text-[11px] font-semibold text-amber-800">
                        Refused
                    </span>

                </div>


                {{-- Refusal Reason Summary --}}
                <div class="space-y-1">

                    <span class="block text-[11px] font-medium text-slate-500">
                        Grounds for Refusal
                    </span>

                    <p
                        class="rounded-lg border border-amber-100 bg-white/80 p-3 text-xs leading-relaxed text-slate-700">

                        {{ $item['reason'] }}

                    </p>

                </div>


                {{-- Attached Refusal Document --}}
                <div
                    class="flex items-center justify-between rounded-lg border border-slate-200 bg-white p-2.5">

                    <div class="flex min-w-0 items-center gap-2.5">

                        <iconify-icon
                            icon="lucide:file-text"
                            class="shrink-0 text-base text-slate-400">
                        </iconify-icon>

                        <div class="truncate">

                            <p class="truncate text-xs font-semibold text-slate-800">
                                {{ $item['doc_name'] }}
                            </p>

                            <span class="text-[10px] text-slate-400">
                                {{ $item['doc_size'] }}
                            </span>

                        </div>

                    </div>


                    <a
                        href="{{ $item['doc_url'] }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        title="View Document"
                        class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg border border-slate-200 bg-slate-50 text-slate-600 transition-all hover:border-brand-300 hover:bg-brand-50 hover:text-brand-600">

                        <iconify-icon icon="lucide:eye" class="text-sm"></iconify-icon>

                    </a>

                </div>

            </div>

        @endforeach

    </div>

@else

    {{-- Empty State --}}
    <div
        class="flex items-center gap-3 rounded-xl border border-emerald-100 bg-emerald-50/40 p-4">

        <div
            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600">

            <iconify-icon
                icon="lucide:check-circle-2"
                class="text-lg">
            </iconify-icon>

        </div>

        <div>

            <h3 class="text-xs font-bold text-slate-900">
                No Prior Visa Refusals
            </h3>

            <p class="mt-0.5 text-xs text-slate-500">
                Applicant has a clean immigration history with zero prior visa
                rejections.
            </p>

        </div>

    </div>

@endif
