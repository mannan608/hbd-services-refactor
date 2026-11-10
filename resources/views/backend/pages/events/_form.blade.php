@php
    /** @var \App\Models\Event|null $event */
    $event = $event ?? null;
    $isEdit = $event && $event->exists;

    $formAction = $isEdit ? role_route('role.events.update', ['event' => $event]) : role_route('role.events.store');

    $fmtDate = fn($v) => $v ? \Carbon\Carbon::parse($v)->format('Y-m-d\TH:i') : '';
    $asString = fn($v) => is_null($v) ? '' : (string) $v;

    $normalizeTags = function ($value) {
        if (is_string($value)) {
            $value = preg_split('/\s*,\s*/', trim($value), -1, PREG_SPLIT_NO_EMPTY) ?: [];
        }

        if (!is_array($value)) {
            return [''];
        }

        $value = array_values(array_filter(array_map(static fn($tag) => is_string($tag) ? trim($tag) : '', $value)));

        return $value ?: [''];
    };

    // Repeater data normalized for Alpine: old() on error -> model data -> one blank row
    $schedules = collect(old('schedules', $event->schedules ?? []))
        ->map(
            fn($s) => [
                'location' => $s['location'] ?? '',
                'start_date' => $fmtDate($s['start_date'] ?? null),
                'end_date' => $fmtDate($s['end_date'] ?? null),
            ],
        )
        ->values()
        ->all() ?: [['location' => '', 'start_date' => '', 'end_date' => '']];

    $providers = collect(old('providers', $event->providers ?? []))
        ->map(function ($p) {
            $logo = is_string($p['logo'] ?? null) ? $p['logo'] : $p['existing_logo'] ?? '';
            return [
                'name' => $p['name'] ?? '',
                'logo' => $logo,
                'logo_url' => $logo ? asset($logo) : null,
            ];
        })
        ->values()
        ->all() ?: [['name' => '', 'logo' => '', 'logo_url' => null]];

    $faqs = collect(old('faqs', $event->faqs ?? []))
        ->map(fn($f) => ['question' => $f['question'] ?? '', 'answer' => $f['answer'] ?? ''])
        ->values()
        ->all() ?: [['question' => '', 'answer' => '']];

    $benefits = collect(old('benefits', $event->benefits ?? []))
        ->values()
        ->all() ?: [''];
    $services = collect(old('services_offered', $event->services_offered ?? []))
        ->values()
        ->all() ?: [''];
    $tags = $normalizeTags(old('tags', $event->tags ?? []));

    // ---------- Shared design tokens ----------
    $inputCls =
        'w-full rounded-xl border border-neutral-300 bg-white px-4 py-2.5 text-sm text-neutral-900 placeholder-neutral-400 transition duration-150 focus:border-brand-500 focus:outline-none focus:ring-4 focus:ring-brand-500/10 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:placeholder-neutral-500 dark:focus:border-brand-500';
    $labelCls = 'mb-1.5 block text-sm font-medium text-neutral-700 dark:text-neutral-300';
    $iconBtnDanger =
        'inline-flex h-9 w-9 items-center justify-center rounded-lg text-neutral-400 transition hover:bg-red-50 hover:text-red-600 focus:outline-none focus:ring-2 focus:ring-red-500/30 dark:hover:bg-red-500/10 dark:hover:text-red-400';
    $addBtnCls =
        'flex w-full items-center justify-center gap-2 rounded-xl border-2 border-dashed border-neutral-300 px-4 py-3 text-sm font-medium text-neutral-500 transition duration-150 hover:border-brand-400 hover:bg-brand-50/50 hover:text-brand-600 focus:outline-none focus:ring-4 focus:ring-brand-500/10 dark:border-neutral-700 dark:text-neutral-400 dark:hover:border-brand-500/50 dark:hover:bg-brand-500/5 dark:hover:text-brand-400';
@endphp

<div class="grid grid-cols-1 gap-6 lg:grid-cols-12">

    {{-- ================= LEFT COLUMN ================= --}}
    <div class="space-y-6 lg:col-span-8">

        {{-- Basic Information --}}
        <section
            class="overflow-hidden rounded-2xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900">
            <div class="flex items-start gap-4 border-b border-neutral-100 px-6 py-5 dark:border-neutral-800">
                <div
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 dark:bg-brand-500/10 dark:text-brand-400">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-neutral-900 dark:text-white">Basic Information</h3>
                    <p class="mt-0.5 text-sm text-neutral-500 dark:text-neutral-400">Core details that define your event
                        and
                        how it appears to visitors.</p>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
                    <x-form.input-text name="title" label="Event Title" placeholder="Enter event title"
                        :value="$asString(old('title', $event->title ?? ''))" />

                    {{-- <x-form.input-text class="hidden" name="slug" label="Slug" placeholder="auto-generated-if-empty"
                        :value="$asString(old('slug', $event->slug ?? ''))" /> --}}

                    <x-form.select-input name="event_type" label="Event Type" :value="old('event_type', $event->event_type ?? 'webinar')" :options="[
                        'webinar' => 'Webinar',
                        'seminar' => 'Seminar',
                        'workshop' => 'Workshop',
                        'conference' => 'Conference',
                    ]" />
                        <x-form.select-input name="event_category" label="Event Category" :value="old('event_category', $event->event_category ?? 'application_day')" :options="[
                        'application_day' => 'Application Day',
                        'education_expo' => 'Education Expo',
                        'delegate_session' => 'Delegate Session',
                        'open_day' => 'Open Day',
                    ]" />
                    @if ($event?->exists)
                        <div x-data="{ copied: false }" class="space-y-2">
                            <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300">
                                Registration URL
                            </label>

                            <div class="flex items-center gap-2">
                                <input type="text" value="{{ $event->registration_url }}" readonly
                                    class="h-11 min-w-0 flex-1 rounded-lg border border-neutral-300 bg-neutral-50 px-3 text-sm text-neutral-600 outline-none dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-300">

                                <button type="button"
                                    @click="
                    navigator.clipboard.writeText(@js($event->registration_url));
                    copied = true;
                    setTimeout(() => copied = false, 1500);
                "
                                    class="inline-flex h-11 shrink-0 items-center rounded-lg bg-brand-600 px-4 text-sm font-medium text-white transition hover:bg-brand-700">
                                    <span x-show="!copied">Copy</span>
                                    <span x-show="copied" x-cloak>Copied!</span>
                                </button>
                            </div>
                        </div>
                    @endif

                </div>


                <div class="mt-5">
                    <x-form.textarea-input name="short_description" label="Short Description" rows="3"
                        placeholder="A brief summary shown in listings and previews" :value="old('short_description', $event->short_description ?? '')" />
                </div>

                <div class="mt-5">
                    <x-form.textarea-input name="description" label="Full Description" rows="5"
                        placeholder="Detailed description shown on the event page" :value="old('description', $event->description ?? '')" />
                </div>

                <div class="mt-6 border-t border-neutral-100 pt-6 dark:border-neutral-800">
                    <label class="{{ $labelCls }}">Banner Image</label>

                    @if ($isEdit && $event->banner)
                        <div class="mb-4 inline-block">
                            <div class="overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                                <img src="{{ asset($event->banner) }}" alt="Current banner" class="h-32 object-cover">
                            </div>
                            <p class="mt-1.5 flex items-center gap-1.5 text-xs text-neutral-500 dark:text-neutral-400">
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Current banner — upload a new file to replace it
                            </p>
                        </div>
                    @endif

                    <x-form.dropzone name="banner" label="Banner" />
                </div>
            </div>
        </section>

        {{-- Date & Location --}}
        <section
            class="overflow-hidden rounded-2xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900"
            x-data="{ isOnline: {{ old('is_online', $event->is_online ?? false) ? 'true' : 'false' }} }">
            <div class="flex items-start gap-4 border-b border-neutral-100 px-6 py-5 dark:border-neutral-800">
                <div
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 dark:bg-brand-500/10 dark:text-brand-400">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-neutral-900 dark:text-white">Date & Location</h3>
                    <p class="mt-0.5 text-sm text-neutral-500 dark:text-neutral-400">When and where the event takes
                        place.</p>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                    <x-form.input-text name="start_datetime" label="Start Date & Time" type="datetime-local"
                        :value="$asString(old('start_datetime', $fmtDate($event->start_datetime ?? null)))" />

                    <x-form.input-text name="end_datetime" label="End Date & Time" type="datetime-local"
                        :value="$asString(old('end_datetime', $fmtDate($event->end_datetime ?? null)))" />

                    <x-form.input-text name="location_name" label="Location Name" placeholder="Convention Center"
                        :value="$asString(old('location_name', $event->location_name ?? ''))" />

                    <x-form.input-text name="address" label="Address" placeholder="Full address" :value="$asString(old('address', $event->address ?? ''))" />

                    <x-form.input-text name="max_seats" label="Max Seats" type="number" placeholder="100"
                        :value="$asString(old('max_seats', $event->max_seats ?? ''))" />

                    <x-form.input-text name="registration_deadline" label="Registration Deadline" type="datetime-local"
                        :value="$asString(
                            old('registration_deadline', $fmtDate($event->registration_deadline ?? null)),
                        )" />
                </div>

                <div
                    class="mt-6 flex items-center justify-between rounded-xl border border-neutral-200 bg-neutral-50/60 px-4 py-3.5 dark:border-neutral-700 dark:bg-white/[0.02]">
                    <div class="flex items-center gap-3">
                        <svg class="h-5 w-5 text-neutral-400" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m-8.716 6.747A9.004 9.004 0 0112 3m0 18a9.004 9.004 0 01-8.716-6.747M3.284 14.253A8.967 8.967 0 003 12m18 0a8.967 8.967 0 00-.284 2.253M3.284 9.747A8.967 8.967 0 013 12" />
                        </svg>
                        <div>
                            <p class="text-sm font-medium text-neutral-700 dark:text-neutral-200">Online event</p>
                            <p class="text-xs text-neutral-500 dark:text-neutral-400">Enable if this event happens
                                virtually
                            </p>
                        </div>
                    </div>
                    <input type="hidden" name="is_online" value="0">
                    <label class="relative inline-flex cursor-pointer items-center">
                        <input type="checkbox" name="is_online" value="1" x-model="isOnline"
                            class="peer sr-only">
                        <span
                            class="h-6 w-11 rounded-full bg-neutral-300 transition-colors duration-200 after:absolute after:left-0.5 after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition-transform after:duration-200 peer-checked:bg-brand-600 peer-checked:after:translate-x-5 peer-focus-visible:ring-4 peer-focus-visible:ring-brand-500/20 dark:bg-neutral-600"></span>
                    </label>
                </div>

                <div x-show="isOnline" x-cloak x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 -translate-y-1"
                    x-transition:enter-end="opacity-100 translate-y-0" class="mt-5">
                    <x-form.input-text name="meeting_link" label="Meeting Link" placeholder="https://zoom.us/j/..."
                        :value="$asString(old('meeting_link', $event->meeting_link ?? ''))" />
                </div>
            </div>
        </section>

        {{-- Event Schedules --}}
        {{-- <section
            class="overflow-hidden rounded-2xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900"
            x-data="{
                items: {{ Illuminate\Support\Js::from($schedules) }},
                add() { this.items.push({ location: '', start_date: '', end_date: '' }) },
                remove(i) { if (this.items.length > 1) this.items.splice(i, 1) }
            }">
            <div class="flex items-start gap-4 border-b border-neutral-100 px-6 py-5 dark:border-neutral-800">
                <div
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 dark:bg-brand-500/10 dark:text-brand-400">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-base font-semibold text-neutral-900 dark:text-white">Event Schedules</h3>
                    <p class="mt-0.5 text-sm text-neutral-500 dark:text-neutral-400">Add one or more sessions with
                        their own
                        dates and venues.</p>
                </div>
                <span
                    class="rounded-full bg-neutral-100 px-2.5 py-1 text-xs font-medium text-neutral-600 dark:bg-neutral-800 dark:text-neutral-300"
                    x-text="items.length + (items.length === 1 ? ' session' : ' sessions')"></span>
            </div>

            <div class="space-y-4 p-6">
                <template x-for="(item, index) in items" :key="index">
                    <div
                        class="rounded-xl border border-neutral-200 bg-neutral-50/50 p-5 transition dark:border-neutral-700 dark:bg-white/[0.02]">
                        <div class="mb-4 flex items-center justify-between">
                            <span
                                class="inline-flex items-center gap-2 text-sm font-semibold text-neutral-700 dark:text-neutral-200">
                                <span
                                    class="flex h-6 w-6 items-center justify-center rounded-md bg-brand-600 text-xs font-bold text-white"
                                    x-text="index + 1"></span>
                                Session
                            </span>
                            <button type="button" x-show="items.length > 1" @click="remove(index)"
                                class="{{ $iconBtnDanger }}" title="Remove session">
                                <svg class="h-4.5 w-4.5 h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>
                        </div>
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                            <div>
                                <label class="{{ $labelCls }}">Location</label>
                                <input type="text" :name="`schedules[${index}][location]`" x-model="item.location"
                                    placeholder="Dhaka" class="{{ $inputCls }}">
                            </div>
                            <div>
                                <label class="{{ $labelCls }}">Start Date</label>
                                <input type="datetime-local" :name="`schedules[${index}][start_date]`"
                                    x-model="item.start_date" class="{{ $inputCls }}">
                            </div>
                            <div>
                                <label class="{{ $labelCls }}">End Date</label>
                                <input type="datetime-local" :name="`schedules[${index}][end_date]`"
                                    x-model="item.end_date" class="{{ $inputCls }}">
                            </div>
                        </div>
                    </div>
                </template>

                <button type="button" @click="add()" class="{{ $addBtnCls }}">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Add another session
                </button>
            </div>
        </section> --}}

        {{-- Providers / Sponsors --}}
        <section
            class="overflow-hidden rounded-2xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900"
            x-data="{
                items: {{ Illuminate\Support\Js::from($providers) }},
                add() { this.items.push({ name: '', logo: '', logo_url: null }) },
                remove(i) { if (this.items.length > 1) this.items.splice(i, 1) }
            }">
            <div class="flex items-start gap-4 border-b border-neutral-100 px-6 py-5 dark:border-neutral-800">
                <div
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 dark:bg-brand-500/10 dark:text-brand-400">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-neutral-900 dark:text-white">Providers / Sponsors</h3>
                    <p class="mt-0.5 text-sm text-neutral-500 dark:text-neutral-400">Organizations supporting or
                        running this
                        event.</p>
                </div>
            </div>

            <div class="space-y-4 p-6">
                <template x-for="(item, index) in items" :key="index">
                    <div
                        class="rounded-xl border border-neutral-200 bg-neutral-50/50 p-5 transition dark:border-neutral-700 dark:bg-white/[0.02]">
                        <div class="mb-4 flex items-center justify-between">
                            <span
                                class="inline-flex items-center gap-2 text-sm font-semibold text-neutral-700 dark:text-neutral-200">
                                <span
                                    class="flex h-6 w-6 items-center justify-center rounded-md bg-brand-600 text-xs font-bold text-white"
                                    x-text="index + 1"></span>
                                Provider
                            </span>
                            <button type="button" x-show="items.length > 1" @click="remove(index)"
                                class="{{ $iconBtnDanger }}" title="Remove provider">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>
                        </div>
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label class="{{ $labelCls }}">Provider Name</label>
                                <input type="text" :name="`providers[${index}][name]`" x-model="item.name"
                                    placeholder="Provider name" class="{{ $inputCls }}">
                            </div>
                            <div>
                                <label class="{{ $labelCls }}">Provider Logo</label>

                                <template x-if="item.logo_url">
                                    <div
                                        class="mb-2 flex items-center gap-3 rounded-lg border border-neutral-200 bg-white px-3 py-2 dark:border-neutral-700 dark:bg-neutral-900">
                                        <img :src="item.logo_url" alt="Logo" class="h-9 rounded object-contain">
                                        <span class="text-xs text-neutral-500 dark:text-neutral-400">Current logo —
                                            choose a
                                            file to replace</span>
                                        <input type="hidden" :name="`providers[${index}][existing_logo]`"
                                            :value="item.logo">
                                    </div>
                                </template>

                                <input type="file" :name="`providers[${index}][logo_file]`" accept="image/jpeg,image/png,image/webp"
                                    class="h-11 w-full pl-4 overflow-hidden rounded-xl border border-neutral-300 bg-transparent text-sm text-neutral-500 transition file:mr-4 file:cursor-pointer file:border-0 file:border-r file:border-neutral-200 file:bg-neutral-50 file:py-3 file:pl-4 file:pr-4 file:text-sm file:font-medium file:text-neutral-700 hover:border-brand-400 focus:outline-none focus:ring-4 focus:ring-brand-500/10 dark:border-neutral-700 dark:bg-neutral-900 dark:file:border-neutral-700 dark:file:bg-white/[0.03] dark:file:text-neutral-300" />
                            </div>
                        </div>
                    </div>
                </template>

                <button type="button" @click="add()" class="{{ $addBtnCls }}">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Add another provider
                </button>
            </div>
        </section>

        {{-- Gallery --}}
        <section
            class="overflow-hidden rounded-2xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900">
            <div class="flex items-start gap-4 border-b border-neutral-100 px-6 py-5 dark:border-neutral-800">
                <div
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 dark:bg-brand-500/10 dark:text-brand-400">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-neutral-900 dark:text-white">Gallery Images</h3>
                    <p class="mt-0.5 text-sm text-neutral-500 dark:text-neutral-400">Photos that showcase the event
                        atmosphere.</p>
                </div>
            </div>

            <div class="p-6">
                @if ($isEdit && !empty($event->gallery_images))
                    <div class="mb-5 grid grid-cols-2 gap-3 sm:grid-cols-3 md:grid-cols-4">
                        @foreach ($event->gallery_images as $image)
                            <div
                                class="group relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                                <img src="{{ asset($image) }}"
                                    class="h-24 w-full object-cover transition duration-200 group-hover:scale-105">
                                <label
                                    class="absolute inset-x-0 bottom-0 flex cursor-pointer items-center justify-center gap-1.5 bg-black/60 py-1.5 text-xs font-medium text-white backdrop-blur-sm transition hover:bg-red-600/80">
                                    <input type="checkbox" name="remove_gallery_images[]"
                                        value="{{ $image }}"
                                        class="h-3.5 w-3.5 rounded border-white/40 bg-transparent text-red-500 focus:ring-0">
                                    Remove
                                </label>
                            </div>
                        @endforeach
                    </div>
                @endif

                <x-form.dropzone name="gallery_images[]" multiple label="Gallery Images" value=""
                    placeholder="Upload gallery images..." />
            </div>
        </section>

        {{-- Extra Info --}}
        <section
            class="overflow-hidden rounded-2xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900">
            <div class="flex items-start gap-4 border-b border-neutral-100 px-6 py-5 dark:border-neutral-800">
                <div
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 dark:bg-brand-500/10 dark:text-brand-400">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3zM6 6h.008v.008H6V6z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-neutral-900 dark:text-white">Additional Details</h3>
                    <p class="mt-0.5 text-sm text-neutral-500 dark:text-neutral-400">Contact info, map link, and tags
                        for
                        discoverability.</p>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                    <x-form.input-text name="organizer" label="Organizer" placeholder="Organizer name"
                        :value="$asString(old('organizer', $event->organizer ?? ''))" />
                    <x-form.input-text name="contact_email" label="Contact Email" placeholder="contact@gmail.com"
                        :value="$asString(old('contact_email', $event->contact_email ?? ''))" />
                    <x-form.input-text name="contact_phone" label="Contact Phone" placeholder="Contact number"
                        :value="$asString(old('contact_phone', $event->contact_phone ?? ''))" />
                    <x-form.input-text name="google_map_link" label="Google Map Link"
                        placeholder="https://maps.google.com/..." :value="$asString(old('google_map_link', $event->google_map_link ?? ''))" />
                </div>

                <div class="mt-6 rounded-xl border border-neutral-200 bg-neutral-50/50 p-5 dark:border-neutral-700 dark:bg-white/[0.02]"
                    x-data="{
                        items: {{ Illuminate\Support\Js::from($tags) }},
                        add() { this.items.push('') },
                        remove(i) { if (this.items.length > 1) this.items.splice(i, 1) }
                    }">
                    <div class="mb-4 flex items-center justify-between">
                        <h4 class="text-sm font-semibold text-neutral-700 dark:text-neutral-200">Tags</h4>
                        <span class="text-xs text-neutral-400">Help people find this event</span>
                    </div>

                    <div class="space-y-3">
                        <template x-for="(item, index) in items" :key="index">
                            <div class="flex items-center gap-2">
                                <div class="relative flex-1">
                                    <span
                                        class="pointer-events-none absolute left-3.5 top-1/2 -translate-y-1/2 text-neutral-400">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5" />
                                        </svg>
                                    </span>
                                    <input type="text" :name="`tags[${index}]`" x-model="items[index]"
                                        placeholder="Event tag" class="{{ $inputCls }} pl-10">
                                </div>
                                <button type="button" x-show="items.length > 1" @click="remove(index)"
                                    class="{{ $iconBtnDanger }}" title="Remove tag">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </template>
                    </div>

                    <button type="button" @click="add()" class="{{ $addBtnCls }} mt-4">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Add tag
                    </button>
                </div>
            </div>
        </section>

        {{-- Benefits --}}
        <section
            class="overflow-hidden rounded-2xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900"
            x-data="{
                items: {{ Illuminate\Support\Js::from($benefits) }},
                add() { this.items.push('') },
                remove(i) { if (this.items.length > 1) this.items.splice(i, 1) }
            }">
            <div class="flex items-start gap-4 border-b border-neutral-100 px-6 py-5 dark:border-neutral-800">
                <div
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 dark:bg-brand-500/10 dark:text-brand-400">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-neutral-900 dark:text-white">Benefits</h3>
                    <p class="mt-0.5 text-sm text-neutral-500 dark:text-neutral-400">What attendees will gain from this
                        event.</p>
                </div>
            </div>

            <div class="p-6">
                <div class="space-y-3">
                    <template x-for="(item, index) in items" :key="index">
                        <div class="flex items-center gap-2">
                            <div class="relative flex-1">
                                <span
                                    class="pointer-events-none absolute left-3.5 top-1/2 -translate-y-1/2 text-emerald-500">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                </span>
                                <input type="text" :name="`benefits[${index}]`" x-model="items[index]"
                                    placeholder="e.g. Certificate of participation"
                                    class="{{ $inputCls }} pl-10">
                            </div>
                            <button type="button" x-show="items.length > 1" @click="remove(index)"
                                class="{{ $iconBtnDanger }}" title="Remove benefit">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </template>
                </div>

                <button type="button" @click="add()" class="{{ $addBtnCls }} mt-4">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Add benefit
                </button>
            </div>
        </section>

        {{-- Services Offered --}}
        <section
            class="overflow-hidden rounded-2xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900"
            x-data="{
                items: {{ Illuminate\Support\Js::from($services) }},
                add() { this.items.push('') },
                remove(i) { if (this.items.length > 1) this.items.splice(i, 1) }
            }">
            <div class="flex items-start gap-4 border-b border-neutral-100 px-6 py-5 dark:border-neutral-800">
                <div
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 dark:bg-brand-500/10 dark:text-brand-400">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-neutral-900 dark:text-white">Services Offered</h3>
                    <p class="mt-0.5 text-sm text-neutral-500 dark:text-neutral-400">Services provided during or after
                        the
                        event.</p>
                </div>
            </div>

            <div class="p-6">
                <div class="space-y-3">
                    <template x-for="(item, index) in items" :key="index">
                        <div class="flex items-center gap-2">
                            <input type="text" :name="`services_offered[${index}]`" x-model="items[index]"
                                placeholder="e.g. Free consultation" class="{{ $inputCls }} flex-1">
                            <button type="button" x-show="items.length > 1" @click="remove(index)"
                                class="{{ $iconBtnDanger }}" title="Remove service">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </template>
                </div>

                <button type="button" @click="add()" class="{{ $addBtnCls }} mt-4">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Add service
                </button>
            </div>
        </section>

        {{-- FAQs --}}
        <section
            class="overflow-hidden rounded-2xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900"
            x-data="{
                items: {{ Illuminate\Support\Js::from($faqs) }},
                add() { this.items.push({ question: '', answer: '' }) },
                remove(i) { if (this.items.length > 1) this.items.splice(i, 1) }
            }">
            <div class="flex items-start gap-4 border-b border-neutral-100 px-6 py-5 dark:border-neutral-800">
                <div
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 dark:bg-brand-500/10 dark:text-brand-400">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-neutral-900 dark:text-white">FAQs</h3>
                    <p class="mt-0.5 text-sm text-neutral-500 dark:text-neutral-400">Answer common questions to reduce
                        attendee friction.</p>
                </div>
            </div>

            <div class="space-y-4 p-6">
                <template x-for="(item, index) in items" :key="index">
                    <div
                        class="rounded-xl border border-neutral-200 bg-neutral-50/50 p-5 transition dark:border-neutral-700 dark:bg-white/[0.02]">
                        <div class="mb-4 flex items-center justify-between">
                            <span
                                class="inline-flex items-center gap-2 text-sm font-semibold text-neutral-700 dark:text-neutral-200">
                                <span
                                    class="flex h-6 w-6 items-center justify-center rounded-md bg-brand-600 text-xs font-bold text-white"
                                    x-text="index + 1"></span>
                                Question
                            </span>
                            <button type="button" x-show="items.length > 1" @click="remove(index)"
                                class="{{ $iconBtnDanger }}" title="Remove FAQ">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>
                        </div>
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label class="{{ $labelCls }}">Question</label>
                                <input type="text" :name="`faqs[${index}][question]`" x-model="item.question"
                                    placeholder="What attendees often ask" class="{{ $inputCls }}">
                            </div>
                            <div>
                                <label class="{{ $labelCls }}">Answer</label>
                                <input type="text" :name="`faqs[${index}][answer]`" x-model="item.answer"
                                    placeholder="A clear, helpful answer" class="{{ $inputCls }}">
                            </div>
                        </div>
                    </div>
                </template>

                <button type="button" @click="add()" class="{{ $addBtnCls }}">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Add another FAQ
                </button>
            </div>
        </section>

    </div>

    {{-- ================= RIGHT COLUMN ================= --}}
    <aside class="lg:col-span-4">
        <div class="sticky top-24 space-y-6">

            {{-- Publishing --}}
            <section
                class="overflow-hidden rounded-2xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900">
                <div class="flex items-start gap-4 border-b border-neutral-100 px-6 py-5 dark:border-neutral-800">
                    <div
                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 dark:bg-brand-500/10 dark:text-brand-400">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-semibold text-neutral-900 dark:text-white">Publishing</h3>
                        <p class="mt-0.5 text-sm text-neutral-500 dark:text-neutral-400">Control visibility and status.
                        </p>
                    </div>
                </div>

                <div class="space-y-5 p-6">
                    <x-form.select-input name="status" label="Status" :value="old('status', $event->status ?? 'upcoming')" :options="[
                        'upcoming' => 'Upcoming',
                        'ongoing' => 'Ongoing',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ]" />

                    <div class="h-px bg-neutral-100 dark:bg-neutral-800"></div>

                    {{-- Featured toggle --}}
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="text-sm font-medium text-neutral-700 dark:text-neutral-200">Featured event</p>
                            <p class="mt-0.5 text-xs text-neutral-500 dark:text-neutral-400">Highlight on homepage &
                                listings
                            </p>
                        </div>
                        <input type="hidden" name="is_featured" value="0">
                        <label class="relative inline-flex shrink-0 cursor-pointer items-center">
                            <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $event->is_featured ?? false))
                                class="peer sr-only">
                            <span
                                class="h-6 w-11 rounded-full bg-neutral-300 transition-colors duration-200 after:absolute after:left-0.5 after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition-transform after:duration-200 peer-checked:bg-brand-600 peer-checked:after:translate-x-5 peer-focus-visible:ring-4 peer-focus-visible:ring-brand-500/20 dark:bg-neutral-600"></span>
                        </label>
                    </div>

                    {{-- Active toggle --}}
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="text-sm font-medium text-neutral-700 dark:text-neutral-200">Active</p>
                            <p class="mt-0.5 text-xs text-neutral-500 dark:text-neutral-400">Visible on the public site
                            </p>
                        </div>
                        <input type="hidden" name="is_active" value="0">
                        <label class="relative inline-flex shrink-0 cursor-pointer items-center">
                            <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $event->is_active ?? true))
                                class="peer sr-only">
                            <span
                                class="h-6 w-11 rounded-full bg-neutral-300 transition-colors duration-200 after:absolute after:left-0.5 after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition-transform after:duration-200 peer-checked:bg-brand-600 peer-checked:after:translate-x-5 peer-focus-visible:ring-4 peer-focus-visible:ring-brand-500/20 dark:bg-neutral-600"></span>
                        </label>
                    </div>


                    <div class="mt-8">
                    @if ($isEdit)
                        <button type="submit" class="w-full rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-brand-500">Update Event</button>
                    @else
                        <button type="submit" class="w-full rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-brand-500">Create Event</button>
                    @endif
                    </div>

                </div>
            </section>

        </div>
    </aside>
</div>
