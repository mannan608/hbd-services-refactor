@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">

        {{-- Success Notification --}}
        @if (session('success'))
            <x-ui.alert variant="success" title="" message="{{ session('success') }}" />
        @endif

        {{-- Page Header --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-xl font-bold tracking-tight text-neutral-900 dark:text-white">
                    Users Directory
                </h1>
                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    Manage user accounts, security roles, and profile statuses.
                </p>
            </div>

            @can('user.create')
                <a href="{{ role_route('role.users.create') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-brand-500/20">
                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add User
                </a>
            @endcan
        </div>

        {{-- Automatic Search and Filters --}}
        <div x-data="{
            timer: null,
        
            submitForm() {
                clearTimeout(this.timer);
        
                this.timer = setTimeout(() => {
                    this.$refs.filterForm.requestSubmit();
                }, 400);
            },
        
            resetFilters() {
                clearTimeout(this.timer);
        
                this.$refs.search.value = '';
                this.$refs.role.value = '';
                this.$refs.status.value = '';
        
                this.$refs.filterForm.requestSubmit();
            }
        }"
            class="rounded-2xl border border-neutral-200/80 bg-white p-4 shadow-sm dark:border-neutral-800 dark:bg-neutral-900">
            <form x-ref="filterForm" method="GET" action="{{ url()->current() }}"
                class="grid grid-cols-1 gap-4 md:grid-cols-4">
                {{-- Search --}}
                <div class="relative md:col-span-2">
                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400">
                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>

                    <input x-ref="search" type="text" name="search" value="{{ request('search') }}"
                        placeholder="Search by name, email, or phone..." autocomplete="off" @input="submitForm()"
                        class="w-full rounded-xl border border-neutral-300 bg-neutral-50/50 py-2.5 pl-10 pr-4 text-sm text-neutral-800 placeholder-neutral-400 transition focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500/10 dark:border-neutral-700 dark:bg-neutral-800/50 dark:text-white dark:placeholder-neutral-500">
                </div>

                {{-- Role Filter --}}
                <div>
                    <select x-ref="role" name="role" @change="submitForm()"
                        class="w-full rounded-xl border border-neutral-300 bg-neutral-50/50 px-4 py-2.5 text-sm text-neutral-800 transition focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500/10 dark:border-neutral-700 dark:bg-neutral-800/50 dark:text-white">
                        <option value="">All Roles</option>

                        @foreach ($roles ?? [] as $roleKey => $roleName)
                            <option value="{{ $roleKey }}" @selected((string) request('role') === (string) $roleKey)>
                                {{ $roleName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Status Filter and Reset --}}
                <div class="flex items-center gap-2">
                    <select x-ref="status" name="status" @change="submitForm()"
                        class="w-full rounded-xl border border-neutral-300 bg-neutral-50/50 px-4 py-2.5 text-sm text-neutral-800 transition focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500/10 dark:border-neutral-700 dark:bg-neutral-800/50 dark:text-white">
                        <option value="">All Statuses</option>

                        <option value="active" @selected(request('status') === 'active')>
                            Active
                        </option>

                        <option value="inactive" @selected(request('status') === 'inactive')>
                            Inactive
                        </option>

                        <option value="suspended" @selected(request('status') === 'suspended')>
                            Suspended
                        </option>
                    </select>

                    @if (request()->filled('search') || request()->filled('role') || request()->filled('status'))
                        <button type="button" @click="resetFilters()" title="Reset Filters"
                            class="inline-flex shrink-0 items-center justify-center rounded-xl border border-neutral-300 p-2.5 text-neutral-500 transition hover:bg-neutral-100 dark:border-neutral-700 dark:hover:bg-neutral-800">
                            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    @endif
                </div>
            </form>
        </div>

        {{-- Users Table --}}
        <div
            class="overflow-hidden rounded-2xl border border-neutral-200/80 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-neutral-200 dark:divide-neutral-800">

                    <thead class="bg-neutral-50/75 dark:bg-neutral-800/50">
                        <tr>
                            <th
                                class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-neutral-500 dark:text-neutral-400">
                                User
                            </th>

                            <th
                                class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-neutral-500 dark:text-neutral-400">
                                Contact Info
                            </th>

                            <th
                                class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-neutral-500 dark:text-neutral-400">
                                Status
                            </th>

                            <th
                                class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-neutral-500 dark:text-neutral-400">
                                Assigned Role
                            </th>

                            <th
                                class="px-6 py-3.5 text-right text-xs font-semibold uppercase tracking-wider text-neutral-500 dark:text-neutral-400">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-neutral-100 dark:divide-neutral-800/60">

                        @forelse ($users as $user)
                            <tr class="transition hover:bg-neutral-50/50 dark:hover:bg-neutral-800/30">

                                {{-- User --}}
                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-50 text-xs font-bold text-brand-700 dark:bg-brand-500/10 dark:text-brand-300">
                                            {{ strtoupper(substr($user->name ?? '', 0, 2)) }}
                                        </div>

                                        <div>
                                            <div class="text-sm font-semibold text-neutral-900 dark:text-white">
                                                {{ $user->name }}
                                            </div>

                                            <div class="text-xs text-neutral-400">
                                                ID: #{{ $user->id }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                {{-- Contact Info --}}
                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="text-sm text-neutral-700 dark:text-neutral-300">
                                        {{ $user->email }}
                                    </div>

                                    @if ($user->phone ?? false)
                                        <div class="text-xs text-neutral-400">
                                            {{ $user->phone }}
                                        </div>
                                    @endif
                                </td>

                                {{-- Status --}}
                                <td class="whitespace-nowrap px-6 py-4">
                                    @php
                                        $statusColors = [
                                            'active' =>
                                                'bg-emerald-50 text-emerald-700 border-emerald-200 dark:bg-emerald-500/10 dark:text-emerald-400 dark:border-emerald-900/50',
                                            'inactive' =>
                                                'bg-neutral-100 text-neutral-600 border-neutral-200 dark:bg-neutral-800 dark:text-neutral-400 dark:border-neutral-700',
                                            'suspended' =>
                                                'bg-red-50 text-red-700 border-red-200 dark:bg-red-500/10 dark:text-red-400 dark:border-red-900/50',
                                        ];

                                        $currentStatus = strtolower($user->status ?? 'inactive');
                                    @endphp

                                    <span
                                        class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-medium {{ $statusColors[$currentStatus] ?? $statusColors['inactive'] }}">
                                        {{ ucfirst($currentStatus) }}
                                    </span>
                                </td>

                                {{-- Primary Role --}}
                                <td class="whitespace-nowrap px-6 py-4">
                                    <span
                                        class="inline-flex items-center rounded-lg bg-neutral-100 px-2.5 py-1 text-xs font-medium text-neutral-700 dark:bg-neutral-800 dark:text-neutral-300">
                                        {{ $user->primaryRole?->name ?? ($user->roles->first()?->name ?? 'Standard User') }}
                                    </span>
                                </td>

                                {{-- Actions --}}
                                <td class="whitespace-nowrap px-6 py-4 text-right text-sm">
                                    <div class="inline-flex items-center justify-end gap-3">
                                        @can('user.view')
                                            <a href="{{ role_route('role.users.show', ['user' => $user]) }}"
                                                class="font-medium text-neutral-600 transition hover:text-neutral-900 dark:text-neutral-400 dark:hover:text-white">
                                                View
                                            </a>
                                        @endcan

                                        @can('user.edit')
                                            <a href="{{ role_route('role.users.edit', ['user' => $user]) }}"
                                                class="font-medium text-brand-600 transition hover:text-brand-700 dark:text-brand-400 dark:hover:text-brand-300">
                                                Edit
                                            </a>
                                        @endcan

                                        @can('user.delete')
                                            @if (!auth()->user()->is($user))
                                                <form method="POST"
                                                    action="{{ role_route('role.users.destroy', ['user' => $user]) }}"
                                                    onsubmit="return confirm('Are you sure you want to delete this user?')"
                                                    class="inline">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                        class="font-medium text-red-600 transition hover:text-red-700 dark:text-red-400 dark:hover:text-red-300">
                                                        Delete
                                                    </button>
                                                </form>
                                            @endif
                                        @endcan
                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="5"
                                    class="px-6 py-12 text-center text-sm text-neutral-500 dark:text-neutral-400">
                                    No users found matching your criteria.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($users->hasPages())
                <div class="border-t border-neutral-200 p-4 dark:border-neutral-800">
                    {{ $users->withQueryString()->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
