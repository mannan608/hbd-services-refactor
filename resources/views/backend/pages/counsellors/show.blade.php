@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="rounded-2xl border border-neutral-200 bg-white p-6 dark:border-neutral-800 dark:bg-neutral-900">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-semibold text-neutral-800 dark:text-white">
                        {{ $counsellor->user?->name ?? 'Counsellor Details' }}
                    </h1>
                    <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                        {{ $counsellor->designation ?? 'No designation set' }}
                    </p>
                </div>

                @if ($counsellor->photo_url)
                    <img
                        src="{{ asset('storage/' . $counsellor->photo_url) }}"
                        alt="{{ $counsellor->user?->name ?? 'Counsellor' }}"
                        class="h-20 w-20 rounded-xl border border-neutral-200 object-cover dark:border-neutral-700"
                    >
                @endif
            </div>

            <dl class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <div>
                    <dt class="text-xs font-medium uppercase tracking-wide text-neutral-500">Email</dt>
                    <dd class="mt-1 text-sm text-neutral-800 dark:text-neutral-200">{{ $counsellor->user?->email ?? 'N/A' }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-medium uppercase tracking-wide text-neutral-500">Country</dt>
                    <dd class="mt-1 text-sm text-neutral-800 dark:text-neutral-200">{{ $counsellor->country?->name ?? 'N/A' }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-medium uppercase tracking-wide text-neutral-500">City</dt>
                    <dd class="mt-1 text-sm text-neutral-800 dark:text-neutral-200">{{ $counsellor->city?->name ?? 'N/A' }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-medium uppercase tracking-wide text-neutral-500">Languages</dt>
                    <dd class="mt-1 text-sm text-neutral-800 dark:text-neutral-200">
                        {{ is_array($counsellor->languages) ? implode(', ', $counsellor->languages) : 'N/A' }}
                    </dd>
                </div>
                <div>
                    <dt class="text-xs font-medium uppercase tracking-wide text-neutral-500">Expertise</dt>
                    <dd class="mt-1 text-sm text-neutral-800 dark:text-neutral-200">
                        {{ is_array($counsellor->expertise) ? implode(', ', $counsellor->expertise) : 'N/A' }}
                    </dd>
                </div>
                <div>
                    <dt class="text-xs font-medium uppercase tracking-wide text-neutral-500">Status</dt>
                    <dd class="mt-1 text-sm text-neutral-800 dark:text-neutral-200">
                        {{ $counsellor->is_active ? 'Active' : 'Inactive' }}
                    </dd>
                </div>
            </dl>
        </div>
    </div>
@endsection
