@extends('frontend.layouts.app')

@section('content')

@php
    use Illuminate\Support\Str;
    use Carbon\Carbon;

    $eventCategories = [
        ['value' => '', 'label' => 'All Events'],
        ['value' => 'application_day', 'label' => 'Application Day'],
        ['value' => 'education_expo', 'label' => 'Education Expo'],
        ['value' => 'delegate_session', 'label' => 'Delegate Session'],
        ['value' => 'open_day', 'label' => 'Open Day'],
    ];

    // Get actual event records from Laravel paginator.
    $eventFilterData = $events->getCollection()->map(function ($event) {
        $start = $event->start_datetime
            ? Carbon::parse($event->start_datetime)
            : null;

        $end = $event->end_datetime
            ? Carbon::parse($event->end_datetime)
            : null;

        $now = now();

        if ($start && $now->lt($start)) {
            $status = 'upcoming';
        } elseif ($start && $end && $now->betweenIncluded($start, $end)) {
            $status = 'ongoing';
        } elseif ($start && $now->gt($start)) {
            $status = 'completed';
        } else {
            $status = 'upcoming';
        }

        return [
            'id' => $event->id,
            'title' => $event->title,
            'description' => $event->short_description ?: $event->description,
            'event_type' => Str::slug(
                str_replace('_', '-', $event->event_type ?? ''),
                '_'
            ),
            'status' => $status,
            'start' => $start?->toIso8601String(),
            'search' => Str::lower(implode(' ', [
                $event->title ?? '',
                $event->event_type ?? '',
                $event->location_name ?? '',
                $event->short_description ?? '',
                $event->description ?? '',
            ])),
        ];
    })->values();
@endphp


<div
    x-data="eventExplorer(@js($eventFilterData))"
    x-init="init()"
    class="min-h-screen bg-brand-25"
>
    {{-- HERO --}}
    <section class="relative isolate overflow-hidden bg-brand-950">
        <div class="absolute inset-0 -z-20 bg-cover bg-center opacity-20"
             style="background-image: url('https://images.unsplash.com/photo-1511578314322-37917d8a7d3?auto=format&fit=crop&w=2000&q=85')"></div>
        <div class="absolute inset-0 -z-10 bg-gradient-to-br from-brand-950 via-brand-900/95 to-brand-800/90"></div>
        <div class="absolute -right-32 -top-28 -z-10 h-96 w-96 rounded-full bg-brand-500/20 blur-3xl"></div>
        <div class="absolute -bottom-40 -left-32 -z-10 h-96 w-96 rounded-full bg-accent-two-500/10 blur-3xl"></div>

        <div class="mx-auto max-w-7xl px-4 pb-28 pt-16 sm:px-6 sm:pb-36 sm:pt-20 lg:px-8 lg:pb-40 lg:pt-24">
            <div class="mx-auto max-w-4xl text-center">
                <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-4 py-2 backdrop-blur">
                    <iconify-icon icon="lucide:calendar-days" class="text-base text-accent-two-500"></iconify-icon>
                    <span class="text-xs font-semibold tracking-[0.14em] text-brand-100">CONNECT • LEARN • EXPLORE</span>
                </div>

                <h1 class="text-3xl font-semibold leading-tight tracking-tight text-white sm:text-4xl lg:text-5xl">
                    Discover Events.
                    <span class="text-brand-300">Create Opportunities.</span>
                </h1>
                <p class="mx-auto mt-5 max-w-2xl text-base leading-7 text-brand-100 sm:text-lg sm:leading-8">
                    Join application days, education expos, delegate sessions and open days. Find the right event for your next step.
                </p>

                {{-- Search --}}
                <div class="mx-auto mt-9 max-w-3xl rounded-2xl border border-white/20 bg-white p-2 shadow-2xl sm:flex sm:items-center sm:rounded-full sm:p-2.5">
                    <div class="flex min-w-0 flex-1 items-center gap-3 px-4">
                        <iconify-icon icon="lucide:search" class="shrink-0 text-xl text-brand-500"></iconify-icon>
                        <input
                            type="search"
                            x-model.debounce.250ms="search"
                            @input="resetLimit()"
                            placeholder="Search events, categories or locations..."
                            aria-label="Search events"
                            class="h-11 w-full border-0 bg-transparent px-1 text-base text-brand-950 placeholder:text-neutral-400 focus:outline-none focus:ring-0"
                        >
                    </div>
                    <button type="button" @click="scrollToResults()"
                            class="mt-2 flex h-12 w-full items-center justify-center gap-2 rounded-xl bg-brand-500 px-7 text-sm font-semibold text-white transition hover:bg-brand-600 sm:mt-0 sm:w-auto sm:rounded-full">
                        Explore Events
                        <iconify-icon icon="lucide:arrow-right"></iconify-icon>
                    </button>
                </div>

                <div class="mt-7 flex flex-wrap items-center justify-center gap-x-7 gap-y-3 text-sm font-medium text-brand-100">
                    <span class="inline-flex items-center gap-2"><iconify-icon icon="lucide:users" class="text-accent-two-500"></iconify-icon>Meet universities</span>
                    <span class="inline-flex items-center gap-2"><iconify-icon icon="lucide:graduation-cap" class="text-accent-two-500"></iconify-icon>Explore opportunities</span>
                    <span class="inline-flex items-center gap-2"><iconify-icon icon="lucide:calendar-check" class="text-accent-two-500"></iconify-icon>Plan your visit</span>
                </div>
            </div>
        </div>
    </section>

    {{-- EVENT EXPLORER --}}
    <section id="events-list" class="relative mx-auto -mt-20 max-w-7xl scroll-mt-8 px-4 pb-20 sm:px-6 lg:px-8">
        {{-- FILTER PANEL --}}
        <div class="rounded-2xl border border-brand-100 bg-white p-5 shadow-[0_12px_40px_rgba(6,29,52,0.07)] sm:p-6">
            <div class="flex flex-col gap-5">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-50 text-brand-600">
                                <iconify-icon icon="lucide:sliders-horizontal" class="text-lg"></iconify-icon>
                            </span>
                            <div>
                                <h2 class="text-lg font-semibold text-brand-950">Find Your Event</h2>
                                <p class="mt-0.5 text-sm text-brand-700">Browse events by type and current status.</p>
                            </div>
                        </div>
                    </div>
                    <button type="button" @click="resetFilters()"
                            class="inline-flex items-center gap-2 self-start rounded-xl border border-brand-200 bg-white px-4 py-2.5 text-sm font-semibold text-brand-600 transition hover:bg-brand-50 sm:self-auto">
                        <iconify-icon icon="lucide:rotate-ccw"></iconify-icon>
                        Reset filters
                    </button>
                </div>

                {{-- CATEGORY FILTER --}}
                <div class="border-t border-brand-100 pt-5">
                    <p class="mb-3 text-xs font-semibold uppercase tracking-[0.12em] text-brand-700">Event category</p>
                    <div class="flex gap-2 overflow-x-auto pb-1">
                        @foreach ($eventCategories as $category)
                            <button
                                type="button"
                                @click="category = @js($category['value']); resetLimit()"
                                :aria-pressed="category === @js($category['value'])"
                                :class="category === @js($category['value'])
                                    ? 'border-brand-500 bg-brand-500 text-white shadow-sm'
                                    : 'border-brand-100 bg-white text-brand-700 hover:border-brand-200 hover:bg-brand-25'"
                                class="shrink-0 rounded-xl border px-4 py-2.5 text-sm font-semibold transition"
                            >
                                {{ $category['label'] }}
                            </button>
                        @endforeach
                    </div>
                </div>

                {{-- STATUS FILTER --}}
                <div class="flex flex-col gap-3 border-t border-brand-100 pt-5 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.12em] text-brand-700">Event status</p>
                        <p class="mt-1 text-sm text-brand-700">Choose events based on their schedule.</p>
                    </div>
                    <div class="inline-flex w-full rounded-xl bg-brand-25 p-1 sm:w-auto">
                        
                        <button type="button" @click="status = ''; resetLimit()"
                                :class="status === '' ? 'bg-white text-brand-700 shadow-sm' : 'text-brand-700 hover:text-brand-950'"
                                class="flex-1 rounded-lg px-4 py-2.5 text-sm font-semibold transition sm:flex-none">
                           Ongoing
                        </button>
                        <button type="button" @click="status = 'upcoming'; resetLimit()"
                                :class="status === 'upcoming' ? 'bg-white text-brand-600 shadow-sm' : 'text-brand-700 hover:text-brand-950'"
                                class="flex-1 rounded-lg px-4 py-2.5 text-sm font-semibold transition sm:flex-none">
                            Upcoming
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- RESULTS HEADER --}}
        <div class="mb-6 mt-10 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.15em] text-brand-600">What's happening</p>
                <h2 class="mt-2 text-3xl font-semibold tracking-tight text-brand-950">Explore Our Events</h2>
                <p class="mt-2 text-base leading-7 text-brand-700">Find an event, meet our team and take your next step.</p>
            </div>
            <p class="text-xs font-medium text-neutral-400" aria-live="polite">
                Showing <span class="font-semibold text-brand-950" x-text="visibleEvents.length"></span>
                of <span class="font-semibold text-brand-950" x-text="filteredEvents.length"></span> events
            </p>
        </div>

        {{-- EVENTS GRID --}}
        <div x-ref="cards" class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:gap-6">
            @forelse ($events as $event)
                @php
                    $start = $event->start_datetime ? Carbon::parse($event->start_datetime) : null;
                    $end = !empty($event->end_datetime) ? Carbon::parse($event->end_datetime) : null;
                    $eventStatus = $start && $start->isFuture()
                        ? 'upcoming'
                        : (($start && $end && now()->betweenIncluded($start, $end)) ? 'ongoing' : (($start && $start->isPast()) ? 'completed' : 'upcoming'));
                    $normalType = Str::slug(str_replace('_', '-', $event->event_type ?? ''), '_');
                    $searchText = Str::lower(implode(' ', [
                        $event->title, $event->event_type, $event->location_name,
                        $event->short_description, $event->description,
                    ]));
                @endphp

                <div
                    data-event-card
                    data-id="{{ $event->id }}"
                    data-type="{{ $normalType }}"
                    data-status="{{ $eventStatus }}"
                    data-search="{{ $searchText }}"
                    x-show="isVisible($el.dataset)"
                    x-transition.opacity.duration.200ms
                >
                    @include('frontend.pages.events.event-card', ['event' => $event, 'eventStatus' => $eventStatus])
                </div>
            @empty
                <div class="col-span-full rounded-2xl border border-dashed border-brand-200 bg-white px-5 py-16 text-center">
                    <span class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-brand-50 text-brand-500">
                        <iconify-icon icon="lucide:calendar-x" class="text-3xl"></iconify-icon>
                    </span>
                    <h3 class="mt-5 text-lg font-semibold text-brand-950">No Events Available</h3>
                    <p class="mx-auto mt-2 max-w-sm text-sm leading-6 text-brand-700">There are currently no events published. Please check back later.</p>
                </div>
            @endforelse
        </div>

        {{-- FILTER EMPTY STATE --}}
        <div x-show="filteredEvents.length === 0" x-cloak
             class="rounded-2xl border border-dashed border-brand-200 bg-white px-5 py-16 text-center">
            <span class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-brand-50 text-brand-500">
                <iconify-icon icon="lucide:calendar-search" class="text-3xl"></iconify-icon>
            </span>
            <h3 class="mt-5 text-lg font-semibold text-brand-950">No Events Found</h3>
            <p class="mx-auto mt-2 max-w-sm text-sm leading-6 text-brand-700">
                We couldn't find events matching your search and filters. Try another category or clear your filters.
            </p>
            <button type="button" @click="resetFilters()"
                    class="mt-6 inline-flex items-center gap-2 rounded-xl bg-brand-500 px-5 py-3 text-sm font-semibold text-white transition hover:bg-brand-600">
                <iconify-icon icon="lucide:rotate-ccw"></iconify-icon>
                Reset filters
            </button>
        </div>

        {{-- LOAD MORE --}}
        <div x-show="visibleEvents.length < filteredEvents.length" x-cloak class="mt-10 text-center">
            <button type="button" @click="loadMore()"
                    class="inline-flex items-center gap-2 rounded-xl border border-brand-200 bg-white px-7 py-3.5 text-sm font-semibold text-brand-600 shadow-sm transition hover:border-brand-500 hover:bg-brand-50">
                Load more events <iconify-icon icon="lucide:chevron-down"></iconify-icon>
            </button>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('eventExplorer', (events) => ({
            events: events || [],
            search: '',
            category: '',
            status: '',
            limit: 6,

            init() {
                this.$nextTick(() => this.updateVisibleCards());
            },

            get filteredEvents() {
                return this.events.filter(event => {
                    const matchesCategory = !this.category || event.event_type === this.category;
                    const matchesStatus = !this.status || event.status === this.status;
                    const keyword = this.search.trim().toLowerCase();
                    const matchesSearch = !keyword || (event.search || '').includes(keyword);

                    return matchesCategory && matchesStatus && matchesSearch;
                });
            },

            get visibleEvents() {
                return this.filteredEvents.slice(0, this.limit);
            },

            isVisible(dataset) {
                const event = this.events.find(item => String(item.id) === String(dataset.id));
                if (!event) return false;

                const index = this.filteredEvents.findIndex(item => String(item.id) === String(dataset.id));
                return index !== -1 && index < this.limit;
            },

            resetLimit() {
                this.limit = 6;
            },

            loadMore() {
                this.limit += 6;
            },

            updateVisibleCards() {
                // Alpine evaluates each card's x-show expression when filters change.
            },

            resetFilters() {
                this.search = '';
                this.category = '';
                this.status = '';
                this.limit = 6;
            },

            scrollToResults() {
                document.getElementById('events-list')?.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }));
    });
</script>
@endpush
