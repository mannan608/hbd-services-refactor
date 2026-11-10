@props([
    'destination' => [],
])


<section id="overview" data-section class="relative overflow-hidden bg-white py-16 sm:py-20 lg:py-24">
    {{-- Soft background ambient glow --}}
    <div class="pointer-events-none absolute -right-32 -top-32 h-80 w-80 rounded-full bg-brand-50/80 blur-3xl"></div>
    <div class="pointer-events-none absolute -bottom-32 -left-32 h-80 w-80 rounded-full bg-sky-light/60 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        {{-- Top grid: Overview Left & Highlights Right --}}
        <div class="grid items-center gap-12 lg:grid-cols-12 lg:gap-16">
            {{-- Left column --}}
            <div class="lg:col-span-7" data-reveal>
                <div
                    class="mb-4 inline-flex items-center gap-2 rounded-full border border-brand-100 bg-brand-50 px-4 py-1.5 text-[12px] font-semibold uppercase tracking-[0.16em] text-brand-600">
                    <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
                    Destination Overview
                </div>

                <h2
                    class="text-[28px] font-semibold leading-[1.2] tracking-[-0.02em] text-black sm:text-[30px] lg:text-[32px]">
                    {{ $destination['overview']['title'] }} <span class="text-red-500">{{ $destination['code'] }}</span>
                </h2>

                <p class="mt-5 text-sm leading-7 text-black/70 sm:text-base sm:leading-8">
                    <span class="text-red-500">{{ $destination['name'] }}</span>
                    {{ $destination['overview']['description_1'] }}
                </p>

                <p class="mt-4 text-sm leading-7 text-black/60">
                    {{ $destination['overview']['description_2'] }}
                </p>

                {{-- Action buttons --}}
                <div class="mt-8 flex flex-wrap items-center gap-4">
                    <a href="#courses"
                        class="inline-flex w-full sm:w-fit justify-center py-2.5 sm:py-3.5 text-[13px] sm:text-sm items-center gap-2 rounded-xl bg-brand-500 px-6 font-semibold text-white shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:bg-brand-600">
                        <span>Explore Study Options</span>
                        <iconify-icon icon="lucide:arrow-right" class="text-base"></iconify-icon>
                    </a>
                    <a href="#contact"
                        class="inline-flex w-full sm:w-fit justify-center py-2.5 sm:py-3.5 text-[13px] sm:text-sm items-center gap-2 rounded-xl border border-brand-200 bg-brand-50 px-6 font-semibold text-brand-700 transition-all duration-300 hover:bg-brand-100 hover:border-brand-300">
                        <span>Talk to a Counsellor</span>
                        <iconify-icon icon="lucide:headset" class="text-base"></iconify-icon>
                    </a>
                </div>
            </div>

            {{-- Right column: 4 Equal-height Highlight cards --}}
            <div class="lg:col-span-5" data-reveal style="--reveal-delay: 150ms">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    {{-- Card 1 --}}
                    <div
                        class="group rounded-2xl border border-brand-100 bg-white p-6 shadow-[0_1px_2px_rgba(16,24,40,0.04)] transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-theme-md">
                        <div
                            class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl border border-brand-100 bg-brand-50 text-brand-600 transition-all duration-300 group-hover:bg-brand-500 group-hover:text-white">
                            <iconify-icon icon="lucide:award" class="text-2xl"></iconify-icon>
                        </div>
                        <h3 class="text-base font-bold text-black group-hover:text-brand-600 transition-colors">
                            World-Class Degrees</h3>
                        <p class="mt-1.5 text-sm leading-6 text-black/60">Internationally accredited qualifications
                            recognized by employers worldwide.</p>
                    </div>

                    {{-- Card 2 --}}
                    <div
                        class="group rounded-2xl border border-brand-100 bg-white p-6 shadow-[0_1px_2px_rgba(16,24,40,0.04)] transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-theme-md sm:translate-y-5">
                        <div
                            class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl border border-brand-100 bg-brand-50 text-brand-600 transition-all duration-300 group-hover:bg-brand-500 group-hover:text-white">
                            <iconify-icon icon="lucide:layers" class="text-2xl"></iconify-icon>
                        </div>
                        <h3 class="text-base font-bold text-black group-hover:text-brand-600 transition-colors">Flexible
                            Pathways</h3>
                        <p class="mt-1.5 text-sm leading-6 text-black/60">From foundation years to Master's degrees and
                            research doctorates.</p>
                    </div>

                    {{-- Card 3 --}}
                    <div
                        class="group rounded-2xl border border-brand-100 bg-white p-6 shadow-[0_1px_2px_rgba(16,24,40,0.04)] transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-theme-md">
                        <div
                            class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl border border-brand-100 bg-brand-50 text-brand-600 transition-all duration-300 group-hover:bg-brand-500 group-hover:text-white">
                            <iconify-icon icon="lucide:briefcase" class="text-2xl"></iconify-icon>
                        </div>
                        <h3 class="text-base font-bold text-black group-hover:text-brand-600 transition-colors">
                            Practical Training</h3>
                        <p class="mt-1.5 text-sm leading-6 text-black/60">Career-aligned coursework with industrial
                            internships and placements.</p>
                    </div>

                    {{-- Card 4 --}}
                    <div
                        class="group rounded-2xl border border-brand-100 bg-white p-6 shadow-[0_1px_2px_rgba(16,24,40,0.04)] transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-theme-md sm:translate-y-5">
                        <div
                            class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl border border-brand-100 bg-accent-one-500-light text-accent-one-500 transition-all duration-300 group-hover:bg-accent-one-500 group-hover:text-white">
                            <iconify-icon icon="lucide:globe" class="text-2xl"></iconify-icon>
                        </div>
                        <h3 class="text-base font-bold text-black group-hover:text-accent-one-500 transition-colors">
                            Global Community</h3>
                        <p class="mt-1.5 text-sm leading-6 text-black/60">Welcoming, multicultural campuses with strong
                            international support.</p>
                    </div>
                </div>

                {{-- Trust Banner --}}
                <div
                    class="mt-8 flex items-center gap-4 rounded-2xl border border-brand-100 bg-brand-50/70 p-4 sm:mt-10">
                    <div
                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-white text-brand-600 shadow-sm border border-brand-100">
                        <iconify-icon icon="lucide:sparkles" class="text-xl"></iconify-icon>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-black">Learn. Grow. Succeed.</p>
                        <p class="text-xs text-black/60">Comprehensive support from visa counseling to post-landing
                            arrival.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Popular Student Cities --}}
        <div class="mt-20 lg:mt-24">
            <div class="flex flex-col justify-between gap-6 sm:flex-row sm:items-end">
                @php
                    $destName = $destination['code'];
                @endphp
                <x-destination-section-heading eyebrow="STUDENT CITIES" :title="'Popular Student Cities in <span class=\'text-brand-500\'>' . $destName . '</span>'"
                    description="Explore thriving urban centers offering exceptional academic institutions, rich cultural heritage, and varied living lifestyles." />

                {{-- <a href="#contact"
                    class="inline-flex shrink-0 items-center gap-2 text-sm font-semibold text-brand-600 hover:text-brand-700 transition">
                    <span>Find Your Ideal City</span>
                    <iconify-icon icon="lucide:arrow-right" class="text-base"></iconify-icon>
                </a> --}}
            </div>

            <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($destination['cities'] ?? [] as $city)
                    <article
                        class="group overflow-hidden rounded-2xl border border-brand-100 bg-white shadow-[0_1px_2px_rgba(16,24,40,0.04)] transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-theme-md"
                        data-reveal style="--reveal-delay: {{ $loop->index * 80 }}ms">
                        <div class="relative h-52 overflow-hidden bg-brand-100">
                            <img src="{{ $city['image'] }}" alt="{{ $city['name'] }}, {{ $destName }}"
                                loading="lazy"
                                class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105">

                            <div
                                class="absolute inset-0 bg-gradient-to-t from-brand-950/85 via-brand-950/20 to-transparent">
                            </div>

                            <div class="absolute bottom-4 left-4 right-4">
                                <span class="text-xs font-semibold uppercase tracking-wider text-brand-200">
                                    {{ $city['location'] }}
                                </span>

                                <h3 class="mt-0.5 text-xl font-bold text-white">
                                    {{ $city['name'] }}
                                </h3>
                            </div>
                        </div>

                        <div class="p-5">
                            <p class="line-clamp-3 text-sm leading-6 text-black/60">
                                {{ $city['description'] }}
                            </p>

                            {{-- <a href="#contact"
                                class="mt-4 inline-flex items-center gap-1.5 text-xs font-semibold text-brand-600 transition hover:text-brand-700">
                                <span>Learn More</span>
                                <iconify-icon icon="lucide:arrow-up-right" class="text-sm"></iconify-icon>
                            </a> --}}
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
