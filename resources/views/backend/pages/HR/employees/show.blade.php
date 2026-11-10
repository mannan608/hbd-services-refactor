@extends('backend.layouts.app')

@section('content')
    <div class="mx-auto max-w-6xl space-y-6 pb-12">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-semibold text-neutral-800 dark:text-white">{{ $employee->full_name }}</h1>
                <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">Employee details</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ role_route('role.employees.index') }}" class="rounded-lg border border-neutral-300 px-4 py-2 text-sm">Back</a>
                <a href="{{ role_route('role.employees.edit', ['employee' => $employee->id]) }}" class="rounded-lg bg-brand-600 px-4 py-2 text-sm text-white">Edit</a>
            </div>
        </div>

        <div class="rounded-2xl border border-neutral-200 bg-white p-6 dark:border-neutral-800 dark:bg-neutral-900">
            <dl class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                <div><dt class="text-xs uppercase text-neutral-500">Email</dt><dd class="mt-1">{{ $employee->user?->email ?? 'No account' }}</dd></div>
                <div><dt class="text-xs uppercase text-neutral-500">Phone</dt><dd class="mt-1">{{ $employee->user?->phone ?? '—' }}</dd></div>
                <div><dt class="text-xs uppercase text-neutral-500">Designation</dt><dd class="mt-1">{{ $employee->designation?->name ?? '—' }}</dd></div>
                <div><dt class="text-xs uppercase text-neutral-500">Date of birth</dt><dd class="mt-1">{{ $employee->date_of_birth?->format('Y-m-d') ?? '—' }}</dd></div>
                <div><dt class="text-xs uppercase text-neutral-500">Gender</dt><dd class="mt-1">{{ $employee->gender ?? '—' }}</dd></div>
                <div><dt class="text-xs uppercase text-neutral-500">Country / City</dt><dd class="mt-1">{{ $employee->country?->name ?? '—' }}{{ $employee->city ? ', '.$employee->city->name : '' }}</dd></div>
                <div><dt class="text-xs uppercase text-neutral-500">Experience</dt><dd class="mt-1">{{ $employee->experience_years }} years</dd></div>
                <div><dt class="text-xs uppercase text-neutral-500">Verification</dt><dd class="mt-1">{{ $employee->is_verified ? 'Verified' : 'Pending' }}</dd></div>
                <div><dt class="text-xs uppercase text-neutral-500">Languages</dt><dd class="mt-1">{{ implode(', ', $employee->languages ?? []) ?: '—' }}</dd></div>
                <div><dt class="text-xs uppercase text-neutral-500">Expertise</dt><dd class="mt-1">{{ implode(', ', $employee->expertise ?? []) ?: '—' }}</dd></div>
                <div class="sm:col-span-2 lg:col-span-3"><dt class="text-xs uppercase text-neutral-500">Address</dt><dd class="mt-1">{{ $employee->address ?? '—' }}</dd></div>
                <div class="sm:col-span-2 lg:col-span-3"><dt class="text-xs uppercase text-neutral-500">Bio</dt><dd class="mt-1 whitespace-pre-line">{{ $employee->bio ?? '—' }}</dd></div>
            </dl>
        </div>
    </div>
@endsection
