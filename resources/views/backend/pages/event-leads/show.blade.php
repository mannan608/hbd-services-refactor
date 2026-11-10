@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h3 class="text-lg font-semibold text-neutral-800 dark:text-white/90">{{ $eventLead->full_name }}</h3>
                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    Event lead details
                </p>
            </div>

            <a href="{{ role_route('role.event-leads.index') }}"
                class="inline-flex items-center rounded-lg border border-neutral-300 bg-white px-4 py-2 text-sm font-medium text-neutral-700 hover:bg-neutral-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-200 dark:hover:bg-neutral-800">
                Back to Event Leads
            </a>
        </div>

        <div class="rounded-xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-800 dark:bg-neutral-900">
            <dl class="grid gap-4 sm:grid-cols-2">
                <div>
                    <dt class="text-sm text-neutral-500">Event</dt>
                    <dd class="text-sm font-medium text-neutral-900 dark:text-white">
                        {{ $eventLead->event?->title ?? 'N/A' }}
                    </dd>
                </div>

                <div>
                    <dt class="text-sm text-neutral-500">Full Name</dt>
                    <dd class="text-sm font-medium text-neutral-900 dark:text-white">{{ $eventLead->full_name }}</dd>
                </div>

                <div>
                    <dt class="text-sm text-neutral-500">Email</dt>
                    <dd class="text-sm font-medium text-neutral-900 dark:text-white">{{ $eventLead->email }}</dd>
                </div>

                <div>
                    <dt class="text-sm text-neutral-500">Phone</dt>
                    <dd class="text-sm font-medium text-neutral-900 dark:text-white">{{ $eventLead->phone ?? '-' }}</dd>
                </div>

                <div>
                    <dt class="text-sm text-neutral-500">WhatsApp</dt>
                    <dd class="text-sm font-medium text-neutral-900 dark:text-white">{{ $eventLead->whatsapp ?? '-' }}</dd>
                </div>

                <div>
                    <dt class="text-sm text-neutral-500">Interested Course</dt>
                    <dd class="text-sm font-medium text-neutral-900 dark:text-white">
                        {{ $eventLead->interested_course ?? '-' }}
                    </dd>
                </div>

                <div>
                    <dt class="text-sm text-neutral-500">Status</dt>
                    <dd class="text-sm font-medium text-neutral-900 dark:text-white">{{ $eventLead->status }}</dd>
                </div>

                <div>
                    <dt class="text-sm text-neutral-500">Source</dt>
                    <dd class="text-sm font-medium text-neutral-900 dark:text-white">{{ $eventLead->source }}</dd>
                </div>
            </dl>
        </div>
    </div>
@endsection
