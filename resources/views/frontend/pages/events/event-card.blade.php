<div
    x-data
    @click="window.location.href = '{{ route('event-details', $event->slug) }}'"
    class="group relative flex h-full cursor-pointer flex-col overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-slate-300 hover:shadow-xl"
>

    <!-- Image Header -->
    <div class="relative aspect-video w-full overflow-hidden bg-slate-900">

        <img
            src="{{ $event->banner ? asset($event->banner) : asset('images/default-event.jpg') }}"
            alt="{{ $event->title }}"
            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
        />

        <!-- Gradient -->
        <div
            class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/20 to-transparent pointer-events-none">
        </div>

        <!-- Date Badge -->
        @if($event->start_datetime)
            <div
                class="absolute right-3.5 top-3.5 flex h-16 w-16 flex-col items-center justify-center rounded-xl border border-white/40 bg-white/90 text-slate-900 shadow-lg backdrop-blur-md pointer-events-none"
            >
                <span class="text-xs font-black uppercase tracking-wider text-brand-600">
                    {{ \Carbon\Carbon::parse($event->start_datetime)->format('M') }}
                </span>

                <span class="text-2xl font-black leading-none text-slate-900">
                    {{ \Carbon\Carbon::parse($event->start_datetime)->format('d') }}
                </span>
            </div>
        @endif

        <!-- Event Type / Featured -->
        <div
            class="absolute bottom-3.5 left-3.5 flex flex-wrap gap-2 pointer-events-none"
        >

            @if($event->is_featured)
                <span
                    class="inline-flex items-center gap-1.5 rounded-full bg-amber-500/90 px-3 py-1 text-[11px] font-bold uppercase tracking-wider text-white shadow-sm backdrop-blur-sm"
                >
                    <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-white"></span>
                    Featured
                </span>
            @endif

            @if($event->event_type)
                <span
                    class="inline-flex items-center rounded-full bg-slate-900/80 px-3 py-1 text-[11px] font-bold uppercase tracking-wider text-white backdrop-blur-sm"
                >
                    {{ str_replace('_', ' ', $event->event_type) }}
                </span>
            @endif

        </div>
    </div>


    <!-- Content Body -->
    <div class="flex flex-1 flex-col justify-between space-y-4 p-5 sm:p-6">

        <div>

            <!-- Event Title -->
            <h3
                class="text-lg font-extrabold leading-snug tracking-tight text-slate-900 transition-colors group-hover:text-brand-600"
            >
                {{ $event->title }}
            </h3>

            <!-- Description -->
            <p class="mt-2 line-clamp-2 text-sm leading-relaxed text-slate-600">
                {{ $event->short_description ?: $event->description }}
            </p>


            <!-- Benefits -->
            @if(!empty($event->benefits))
                <div class="mt-4 flex flex-wrap items-center gap-2">

                    @foreach($event->benefits as $benefit)
                        @if($benefit)
                            <span
                                class="inline-flex items-center rounded-md border border-brand-100 bg-brand-50 px-2.5 py-1 text-xs font-semibold text-brand-700"
                            >
                                {{ $benefit }}
                            </span>
                        @endif
                    @endforeach

                </div>
            @endif

        </div>


        <!-- Card Footer -->
        <div class="flex flex-col gap-4 border-t border-slate-100 pt-4">

            <!-- Date / Time / Venue -->
            <div class="flex flex-wrap items-center gap-2 text-xs font-medium text-slate-600">

                @if($event->start_datetime)
                    <span
                        class="inline-flex items-center gap-1.5 rounded-lg bg-slate-100/80 px-2.5 py-1.5 text-slate-700"
                    >
                        <svg
                            class="h-3.5 w-3.5 text-brand-600"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            stroke-width="2.5"
                        >
                            <circle cx="12" cy="12" r="10" />
                            <path d="M12 6v6l4 2" />
                        </svg>

                        {{ \Carbon\Carbon::parse($event->start_datetime)->format('d M Y, h:i A') }}
                    </span>
                @endif


                @if($event->is_online)

                    <span
                        class="inline-flex items-center gap-1.5 rounded-lg bg-slate-100/80 px-2.5 py-1.5 text-slate-700"
                    >
                        <svg
                            class="h-3.5 w-3.5 text-slate-500"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            stroke-width="2.5"
                        >
                            <rect
                                x="2"
                                y="6"
                                width="14"
                                height="12"
                                rx="2"
                            />

                            <path d="M22 8l-6 4 6 4V8z" />
                        </svg>

                        Online Event
                    </span>

                @elseif($event->location_name)

                    <span
                        class="inline-flex items-center gap-1.5 rounded-lg bg-slate-100/80 px-2.5 py-1.5 text-slate-700"
                    >
                        <svg
                            class="h-3.5 w-3.5 text-slate-500"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            stroke-width="2.5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 21s8-4.5 8-10a8 8 0 1 0-16 0c0 5.5 8 10 8 10z"
                            />

                            <circle
                                cx="12"
                                cy="11"
                                r="2.5"
                            />
                        </svg>

                        {{ $event->location_name }}
                    </span>

                @endif

            </div>


            <!-- Actions -->
            <div class="grid grid-cols-2 gap-2.5 pt-1">

                <!-- Details -->
                <a
                    href="{{ route('event-details', $event->slug) }}"
                    @click.stop
                    class="flex w-full items-center justify-center rounded-xl border border-slate-200 py-2.5 text-sm font-bold text-slate-700 transition hover:border-slate-300 hover:bg-slate-50"
                >
                    Details
                </a>


                <!-- Register / View Event -->
                @if($event->registration_link)

                    <a
                        href="{{ $event->registration_link }}"
                        @click.stop
                        class="flex w-full items-center justify-center rounded-xl bg-[#155b9d] py-2.5 text-sm font-bold text-white shadow-sm transition hover:bg-[#114b82] hover:shadow-md"
                    >
                        Register
                    </a>

                @else

                    <a
                        href="{{ route('event-details', $event->slug) }}"
                        @click.stop
                        class="flex w-full items-center justify-center rounded-xl bg-[#155b9d] py-2.5 text-sm font-bold text-white shadow-sm transition hover:bg-[#114b82] hover:shadow-md"
                    >
                        View Event
                    </a>

                @endif

            </div>

        </div>

    </div>

</div>