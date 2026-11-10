@extends('backend.layouts.app')

@php
    $editingScope = $editingScope ?? null;

    $editingCampusIds = $editingScope ? $editingScope->pluck('campus_id')->values()->all() : [];

    $role = request()->route('role');

@endphp

@section('content')
    <div x-data="{
        showSuccess: true,
        showDeleteModal: false,
    
        editingScope: null,
    
        openEditScope(scope) {
            this.editingScope = scope;
    
            window.dispatchEvent(
                new CustomEvent('course-scope:edit', {
                    detail: scope
                })
            );
    
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        },
    
        cancelEditScope() {
            this.editingScope = null;
    
            window.dispatchEvent(
                new CustomEvent('course-scope:create')
            );
        },
    
        openDeleteModal(scope) {
            this.selectedScope = scope;
            this.showDeleteModal = true;
        },
    
        closeDeleteModal() {
            this.showDeleteModal = false;
            this.selectedScope = null;
        },
    
        selectedScope: null,
    }" @keydown.escape.window="closeDeleteModal()">

        {{-- Success Message --}}
        @if (session('success'))
            <div x-show="showSuccess" x-transition x-init="setTimeout(() => showSuccess = false, 4000)"
                class="fixed right-5 top-5 z-[99999] w-full max-w-sm">
                <div class="relative">
                    <button type="button" @click="showSuccess = false"
                        class="absolute right-3 top-3 z-10 text-neutral-400 transition hover:text-neutral-600">
                        <iconify-icon icon="lucide:x" class="text-sm"></iconify-icon>
                    </button>

                    <x-ui.alert variant="success" title="" message="{{ session('success') }}" />
                </div>
            </div>
        @endif


        <main class="mx-auto w-full max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

            {{--  PROVIDER HEADER --}}
            <div class="rounded-xl border border-neutral-200 bg-white dark:border-neutral-800 dark:bg-neutral-900">

                <div class="flex flex-col gap-5 p-5 sm:p-6 lg:flex-row lg:items-center lg:justify-between">

                    {{-- Provider Information --}}
                    <div class="flex min-w-0 items-center gap-4">

                        {{-- Avatar --}}
                        <div
                            class="flex size-14 shrink-0 items-center justify-center rounded-xl bg-neutral-900 text-base font-semibold text-white dark:bg-white dark:text-neutral-900">
                            {{ $provider->user->avatar ?? 'N/A' }}
                        </div>

                        <div class="min-w-0">

                            <div class="flex flex-wrap items-center gap-2">

                                <h1 class="truncate text-lg font-semibold text-neutral-900 dark:text-white">
                                    {{ $provider->short_name ?? 'Provider' }}
                                </h1>

                                <span
                                    class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-2 py-1 text-[11px] font-medium text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400">
                                    <span class="size-1.5 rounded-full bg-emerald-500"></span>
                                    Active
                                </span>

                            </div>


                            {{-- Contact --}}
                            <div
                                class="mt-1.5 flex flex-wrap items-center gap-x-4 gap-y-1.5 text-xs text-neutral-500 dark:text-neutral-400">

                                <span class="inline-flex items-center gap-1.5">
                                    <iconify-icon icon="lucide:user" class="text-[13px] text-neutral-400"></iconify-icon>
                                    {{ $provider->user->name ?? 'N/A' }}
                                </span>

                                <a href="mailto:rahul@rahulagency.com"
                                    class="inline-flex items-center gap-1.5 transition hover:text-neutral-900 dark:hover:text-white">
                                    <iconify-icon icon="lucide:mail" class="text-[13px] text-neutral-400"></iconify-icon>
                                    {{ $provider->user->email ?? 'N/A' }}
                                </a>

                                <a href="tel:+919876543210"
                                    class="inline-flex items-center gap-1.5 transition hover:text-neutral-900 dark:hover:text-white">
                                    <iconify-icon icon="lucide:phone" class="text-[13px] text-neutral-400"></iconify-icon>
                                    {{ $provider->phone ?? 'N/A' }}
                                </a>

                            </div>

                        </div>

                    </div>


                    {{-- Add Scope --}}
                    <button type="button" @click="$refs.scopeForm.scrollIntoView({behavior: 'smooth'})"
                        class="inline-flex shrink-0 items-center justify-center gap-2 rounded-lg bg-neutral-900 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-neutral-800 dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100">
                        <iconify-icon icon="lucide:plus" class="text-sm"></iconify-icon>

                        Add New Course
                    </button>

                </div>

            </div>

            <div x-ref="scopeForm"
                class="mt-5 rounded-xl border border-neutral-200 bg-white dark:border-neutral-800 dark:bg-neutral-900 p-5 sm:p-6">
                <div class="mb-8">
                    <h3 class="text-base md:text-lg font-bold text-slate-900">Add Course/Program Scope</h3>
                    <p class="text-sm text-slate-500">Define access boundaries for this agency.</p>
                </div>
                <form method="POST"
                    :action="editingScope
                        ?
                        '{{ url()->current() }}/scopes/' + editingScope.id :
                        '{{ url()->current() }}/scopes'">
                    @csrf

                    <template x-if="editingScope">
                        <input type="hidden" name="_method" value="PUT">
                    </template>

                    @include('backend.pages.providers.scope-form')

                    <div class="mt-8 flex justify-end gap-2">

                        <button type="button" x-show="editingScope" @click="cancelEditScope()"
                            class="inline-flex items-center gap-2 rounded-lg border
                                border-neutral-200 px-5 py-2.5 text-sm font-medium
                                text-neutral-700 transition hover:bg-neutral-50
                                dark:border-neutral-700 dark:text-neutral-300
                                dark:hover:bg-neutral-800">
                            <iconify-icon icon="lucide:x" class="text-sm"></iconify-icon>

                            Cancel
                        </button>

                        <button type="submit"
                            class="inline-flex min-w-40 items-center justify-center gap-2
                                rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium
                                text-white transition hover:bg-brand-800">
                            <iconify-icon icon="lucide:save" class="text-sm"></iconify-icon>

                            <span x-text="editingScope ? 'Update Scope' : 'Save Scope'"></span>
                        </button>

                    </div>
                </form>
            </div>


            {{-- SCOPE TABLE --}}
            <div
                class="mt-5 overflow-hidden rounded-xl border border-neutral-200 bg-white dark:border-neutral-800 dark:bg-neutral-900">

                {{-- Table Header --}}
                <div
                    class="flex flex-col gap-3 border-b border-neutral-200 px-5 py-4 sm:flex-row sm:items-center sm:justify-between dark:border-neutral-800">

                    <div>

                        <h2 class="text-sm font-semibold text-neutral-900 dark:text-white">
                            University Scope
                        </h2>

                        <p class="mt-0.5 text-xs text-neutral-500 dark:text-neutral-400">
                            University access permissions for this provider.
                        </p>

                    </div>


                    <div
                        class="inline-flex w-fit items-center gap-1.5 rounded-md bg-neutral-100 px-2.5 py-1.5 text-xs font-medium text-neutral-600 dark:bg-neutral-800 dark:text-neutral-400">
                        <iconify-icon icon="lucide:layers-2" class="text-[13px]"></iconify-icon>

                        {{ $courseScopes->count() }} {{ \Illuminate\Support\Str::plural('Scope', $courseScopes->count()) }}
                    </div>

                </div>


                {{-- Table --}}
                <div class="overflow-x-auto">

                    <table class="w-full min-w-[800px] text-left">

                        <thead>

                            <tr
                                class="border-b border-neutral-200 bg-neutral-50/70 dark:border-neutral-800 dark:bg-neutral-800/30">

                                <th class="px-5 py-3 text-[10px] font-semibold uppercase tracking-wider text-neutral-500">
                                    University
                                </th>

                                <th class="px-5 py-3 text-[10px] font-semibold uppercase tracking-wider text-neutral-500">
                                    Access Level
                                </th>

                                <th class="px-5 py-3 text-[10px] font-semibold uppercase tracking-wider text-neutral-500">
                                    Campus
                                </th>

                                <th class="px-5 py-3 text-[10px] font-semibold uppercase tracking-wider text-neutral-500">
                                    Course / Program
                                </th>

                                <th
                                    class="px-5 py-3 text-right text-[10px] font-semibold uppercase tracking-wider text-neutral-500">
                                    Actions
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-neutral-100 dark:divide-neutral-800">

                            @forelse($courseScopes as $scopeGroup)
                                @php
                                    $firstScope = $scopeGroup->first();

                                    $scopeData = [
                                        'id' => $firstScope->id,

                                        'university_id' => $firstScope->university_id,
                                        'university' => $firstScope->university->name,

                                        'course_id' => $firstScope->course_id,
                                        'course' => $firstScope->course->title,
                                        'campus' => $scopeGroup->pluck('campus.name')->filter()->implode(', '),

                                        'campus_ids' => $scopeGroup->pluck('campus_id')->values()->all(),

                                        'campuses' => $scopeGroup
                                            ->map(function ($scope) {
                                                return [
                                                    'id' => $scope->campus_id,
                                                    'name' => $scope->campus->name,
                                                ];
                                            })
                                            ->values()
                                            ->all(),
                                    ];
                                @endphp

                                <tr class="transition-colors hover:bg-neutral-50/60 dark:hover:bg-white/[0.02]">

                                    {{-- University --}}
                                    <td class="px-5 py-4">

                                        <div class="flex items-center gap-3">

                                            <div
                                                class="flex size-9 shrink-0 items-center justify-center
                               rounded-lg bg-neutral-100 text-neutral-500
                               dark:bg-neutral-800 dark:text-neutral-400">
                                                <iconify-icon icon="lucide:building-2" class="text-sm"></iconify-icon>
                                            </div>

                                            <div>
                                                <div class="text-sm font-medium text-neutral-800 dark:text-neutral-200">
                                                    {{ $firstScope->university->name }}
                                                </div>

                                                <div class="mt-0.5 text-[11px] text-neutral-400">
                                                    University
                                                </div>
                                            </div>

                                        </div>

                                    </td>


                                    {{-- Access --}}
                                    <td class="px-5 py-4">

                                        <span
                                            class="inline-flex items-center gap-1.5 rounded-md border
                           border-neutral-200 bg-neutral-50 px-2.5 py-1.5
                           text-xs font-medium text-neutral-700
                           dark:border-neutral-700 dark:bg-neutral-800
                           dark:text-neutral-300">
                                            <iconify-icon icon="lucide:shield-check"
                                                class="text-[13px] text-neutral-400"></iconify-icon>

                                            Course Access
                                        </span>

                                    </td>


                                    {{-- Campus --}}
                                    <td class="px-5 py-4">

                                        <div class="flex items-center gap-2 text-sm text-neutral-700 dark:text-neutral-300">

                                            <iconify-icon icon="lucide:map-pin"
                                                class="text-[14px] text-neutral-400"></iconify-icon>

                                            {{ $scopeGroup->pluck('campus.name')->filter()->implode(', ') ?: '—' }}

                                        </div>

                                    </td>


                                    {{-- Course --}}
                                    <td class="px-5 py-4">

                                        <div class="text-sm text-neutral-700 dark:text-neutral-300">
                                            {{ $firstScope->course->title }}
                                        </div>

                                    </td>


                                    {{-- Actions --}}
                                    <td class="px-5 py-4">

                                        <div class="flex justify-end gap-1">

                                            {{-- Edit --}}
                                            <button type="button" title="Edit"
                                                @click='openEditScope(@json($scopeData))'
                                                class="inline-flex size-8 items-center justify-center
                               rounded-md text-neutral-400 transition
                               hover:bg-neutral-100 hover:text-neutral-700
                               dark:hover:bg-neutral-800
                               dark:hover:text-neutral-200">
                                                <iconify-icon icon="lucide:edit" class="text-[14px]"></iconify-icon>
                                            </button>


                                            {{-- Delete --}}
                                            <button type="button" title="Delete"
                                                @click='openDeleteModal(@json($scopeData))'
                                                class="inline-flex size-8 items-center justify-center
                               rounded-md text-neutral-400 transition
                               hover:bg-red-50 hover:text-red-600
                               dark:hover:bg-red-500/10
                               dark:hover:text-red-400">
                                                <iconify-icon icon="lucide:trash-2" class="text-[14px]"></iconify-icon>
                                            </button>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="5" class="px-5 py-14 text-center">

                                        <div
                                            class="mx-auto flex size-10 items-center justify-center
                           rounded-lg bg-neutral-100 text-neutral-400
                           dark:bg-neutral-800">
                                            <iconify-icon icon="lucide:folder-open" class="text-lg"></iconify-icon>
                                        </div>

                                        <h3 class="mt-3 text-sm font-medium text-neutral-800 dark:text-neutral-200">
                                            No course scopes
                                        </h3>

                                        <p class="mt-1 text-xs text-neutral-500 dark:text-neutral-400">
                                            No course access scope has been configured.
                                        </p>

                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>


                {{-- Footer --}}
                <div
                    class="flex flex-col gap-2 border-t border-neutral-200 px-5 py-3 sm:flex-row sm:items-center sm:justify-between dark:border-neutral-800">

                    <span class="text-xs text-neutral-500 dark:text-neutral-400">
                        Showing
                        <span class="font-medium text-neutral-700 dark:text-neutral-300">
                            {{ $courseScopes->count() }}
                        </span>
                        {{ \Illuminate\Support\Str::plural('scope permission', $courseScopes->count()) }}
                    </span>

                    <span class="inline-flex items-center gap-1.5 text-[11px] text-neutral-400">

                        <iconify-icon icon="lucide:info" class="text-[12px]"></iconify-icon>

                        Changes apply immediately

                    </span>

                </div>

            </div>

        </main>


        {{-- DELETE MODAL --}}
        <div x-show="showDeleteModal" x-cloak x-transition.opacity class="fixed inset-0 z-[99999]">

            {{-- Overlay --}}
            <div class="absolute inset-0 bg-neutral-950/40 backdrop-blur-[2px]" @click="closeDeleteModal()"></div>


            {{-- Modal --}}
            <div class="relative flex min-h-full items-center justify-center p-4">

                <div x-show="showDeleteModal" x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="scale-95 opacity-0" x-transition:enter-end="scale-100 opacity-100"
                    class="w-full max-w-md rounded-xl border border-neutral-200 bg-white shadow-xl dark:border-neutral-800 dark:bg-neutral-900">

                    <div class="p-5">

                        <div class="flex items-start gap-3">

                            <div
                                class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-red-50 text-red-600 dark:bg-red-500/10 dark:text-red-400">
                                <iconify-icon icon="lucide:trash-2" class="text-sm"></iconify-icon>
                            </div>

                            <div>

                                <h3 class="text-sm font-semibold text-neutral-900 dark:text-white">
                                    Delete Scope?
                                </h3>

                                <p class="mt-1 text-xs leading-5 text-neutral-500 dark:text-neutral-400">
                                    This university scope permission will be permanently removed.
                                </p>

                            </div>

                        </div>


                        {{-- Selected scope --}}
                        <div
                            class="mt-4 rounded-lg border border-neutral-200 bg-neutral-50 px-4 py-3 dark:border-neutral-800 dark:bg-neutral-800/50">

                            <div class="text-sm font-medium text-neutral-800 dark:text-neutral-200"
                                x-text="selectedScope?.university"></div>

                            <div class="mt-1 text-xs text-neutral-500 dark:text-neutral-400">

                                <span x-text="selectedScope?.campus"></span>

                                <span class="mx-1">•</span>

                                <span x-text="selectedScope?.course"></span>

                            </div>

                        </div>


                        <div class="mt-5 flex justify-end gap-2">

                            <form method="POST"
                                :action="selectedScope
                                    ?
                                    '{{ route('role.providers.scopes.delete', [$role, $provider, '__SCOPE__']) }}'
                                    .replace('__SCOPE__', selectedScope.id) :
                                    '#'">
                                @csrf
                                @method('DELETE')

                                <button type="button" @click="closeDeleteModal()"
                                    class="rounded-lg border border-neutral-200 px-4 py-2
                                        text-xs font-medium text-neutral-700 transition
                                        hover:bg-neutral-50
                                        dark:border-neutral-700 dark:text-neutral-300
                                        dark:hover:bg-neutral-800">
                                    Cancel
                                </button>

                                <button type="submit"
                                    class="inline-flex items-center gap-1.5 rounded-lg bg-red-600
                                            px-4 py-2 text-xs font-medium text-white transition
                                            hover:bg-red-700">
                                    <iconify-icon icon="lucide:trash-2" class="text-[13px]"></iconify-icon>

                                    Delete
                                </button>
                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
