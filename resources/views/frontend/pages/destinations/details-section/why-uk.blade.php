@props([
    'destination' => [],
])

@php
    $destName = $destination['code'];

    $benefits = $destination['whyChoose']['benefits'] ?? [];

    $careerPoints = $destination['whyChoose']['careerPoints'] ?? [];
@endphp

<section id="why-choose" data-section class="relative overflow-hidden bg-brand-25 py-16 sm:py-20 lg:py-24">
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        {{-- Section Introduction --}}
        <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
            <div data-reveal>
                <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-brand-100 bg-white px-4 py-1.5 text-[12px] font-semibold uppercase tracking-[0.16em] text-brand-600">
                    <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
                    THE GLOBAL ADVANTAGE
                </div>

                <h2 class="text-[28px] font-semibold leading-[1.2] tracking-[-0.02em] text-black sm:text-[30px] lg:text-[32px]">
                    Why Study in <span class="text-red-500">{{ $destName }}</span>? A World of Opportunities.
                </h2>

                <p class="mt-5 text-sm leading-7 text-black/70 sm:text-base sm:leading-8">
               {{$destination['whyChoose']['description']}}
                </p>

                <div class="mt-8 flex flex-wrap items-center gap-4">
                    <a href="#uk-benefits"
                       class="inline-flex w-full sm:w-fit items-center justify-center py-2.5 sm:py-3.5 text-[13px] sm:text-sm gap-2 rounded-xl bg-brand-500 px-6 font-semibold text-white shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:bg-brand-600">
                        <span>Discover Key Benefits</span>
                        <iconify-icon icon="lucide:arrow-down" class="text-base"></iconify-icon>
                    </a>
                    <a href="#contact"
                       class="inline-flex w-full sm:w-fit items-center justify-center py-2.5 sm:py-3.5 text-[13px] sm:text-sm gap-2 rounded-xl border border-brand-200 bg-white px-6 font-semibold text-brand-700 transition-all duration-300 hover:bg-brand-50 hover:border-brand-300">
                        <span>Get Expert Guidance</span>
                        <iconify-icon icon="lucide:arrow-up-right" class="text-base"></iconify-icon>
                    </a>
                </div>

                {{-- Trust badges --}}
                <div class="mt-10 flex flex-wrap items-center gap-2 sm:gap-6 border-t border-brand-200/60 pt-6">
                    <div class="flex items-center gap-2 text-sm font-medium text-black/70">
                        <span class="flex h-5 w-5 items-center justify-center rounded-full bg-success-50 text-success-500">
                            <iconify-icon icon="lucide:check" class="text-xs"></iconify-icon>
                        </span>
                        <span>World-Class Ranking</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm font-medium text-black/70">
                        <span class="flex h-5 w-5 items-center justify-center rounded-full bg-success-50 text-success-500">
                            <iconify-icon icon="lucide:check" class="text-xs"></iconify-icon>
                        </span>
                        <span>High Visa Success</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm font-medium text-black/70">
                        <span class="flex h-5 w-5 items-center justify-center rounded-full bg-success-50 text-success-500">
                            <iconify-icon icon="lucide:check" class="text-xs"></iconify-icon>
                        </span>
                        <span>Post-Study Work Permit</span>
                    </div>
                </div>
            </div>

            {{-- Right side: Image preview --}}
            <div class="relative" data-reveal style="--reveal-delay: 150ms">
                <div class="relative overflow-hidden rounded-2xl border border-brand-100 bg-white p-2 shadow-theme-md">
                    <img src="https://images.unsplash.com/photo-1562774053-701939374585?w=1000&q=85"
                         alt="Historic university campus in {{ $destName }}"
                         class="h-[360px] w-full rounded-xl object-cover sm:h-[420px]">

                    <div class="absolute bottom-6 left-6 right-6 rounded-xl border border-brand-100 bg-white/95 p-4 shadow-lg backdrop-blur-md">
                        <div class="flex items-center gap-3.5">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 border border-brand-100">
                                <iconify-icon icon="lucide:sparkles" class="text-xl"></iconify-icon>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-black">Learn Without Limits</h4>
                                <p class="text-xs text-black/60">Unlock premier academic institutions and global connections.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Benefits Grid --}}
        <div id="uk-benefits" class="scroll-mt-24 mt-20 lg:mt-24">
            <x-destination-section-heading
                align="center"
                eyebrow="STUDENT ADVANTAGES"
                :title="'Key Advantages for International Students in <span class=\'text-brand-500\'>' . $destName . '</span>'"
                description="Explore the top factors that make this destination one of the premier study choices for ambitious international students."
            />

            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($benefits as $benefit)
                    <article class="group relative flex h-full flex-col rounded-2xl border border-brand-100 bg-white p-6 shadow-[0_1px_2px_rgba(16,24,40,0.04)] transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-theme-md sm:p-7"
                             data-reveal style="--reveal-delay: {{ ($loop->index % 3) * 80 }}ms">
                        <div class="flex items-center justify-between">
                            <div class="flex h-12 w-12 items-center justify-center rounded-xl border border-brand-100 bg-brand-50 text-brand-600 transition-all duration-300 group-hover:bg-brand-500 group-hover:text-white">
                                <iconify-icon icon="{{ $benefit['icon'] }}" class="text-2xl"></iconify-icon>
                            </div>
                            <span class="text-3xl font-extrabold text-brand-100 transition-colors group-hover:text-brand-200">
                                {{ $benefit['number'] }}
                            </span>
                        </div>

                        <h3 class="mt-6 text-lg font-bold text-black transition-colors group-hover:text-brand-600">
                            {{ $benefit['title'] }}
                        </h3>

                        <p class="mt-2.5 flex-1 text-sm leading-6 text-black/60">
                            {{ $benefit['description'] }}
                        </p>

                        <div class="mt-6 flex items-center gap-2 border-t border-brand-100 pt-4">
                            <span class="flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-success-50 text-success-500">
                                <iconify-icon icon="lucide:check" class="text-[10px]"></iconify-icon>
                            </span>
                            <span class="text-xs font-semibold text-black">
                                {{ $benefit['details'] }}
                            </span>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>

        {{-- Career Opportunities Banner --}}
        <div class="relative mt-10 sm:mt-12 md:mt-16 lg:mt-20 overflow-hidden rounded-2xl bg-brand-900 p-6 sm:p-10 lg:p-12 text-white" data-reveal>
            <div class="pointer-events-none absolute -right-20 -top-24 h-72 w-72 rounded-full bg-brand-800/50 blur-3xl"></div>

            <div class="relative grid items-center gap-10 lg:grid-cols-12 lg:gap-12">
                <div class="lg:col-span-7">
                    <span class="inline-flex items-center gap-2 rounded-full border border-brand-400/30 bg-brand-500/20 px-3.5 py-1 text-[10px] font-semibold uppercase tracking-[0.16em] text-brand-200">
                        BUILD YOUR FUTURE
                    </span>

                    <h3 class="mt-4 text-xl font-bold leading-[1.2] tracking-tight sm:text-2xl lg:text-3xl">
                        Turn Your Education into Lifelong Global Career Success.
                    </h3>

                    <p class="mt-4 text-sm sm:text-base leading-6 sm:leading-7 text-brand-100/80">
                        Gain internationally respected qualifications, build a multinational professional network, and maximize your employment prospects in leading global organizations.
                    </p>

                    <a href="#contact"
                       class="mt-8 inline-flex items-center gap-2 rounded-xl bg-brand-500 px-6 py-3.5 text-sm font-semibold text-white shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:bg-brand-600">
                        <span>Start Your Application Journey</span>
                        <iconify-icon icon="lucide:arrow-right" class="text-base"></iconify-icon>
                    </a>
                </div>

                <div class="lg:col-span-5 grid grid-cols-2 gap-4">
                    @foreach($careerPoints as $point)
                        <div class="rounded-xl border border-white/10 bg-white/5 p-3 sm:p-4 md:p-5  backdrop-blur-sm transition-colors hover:bg-white/10">
                            <iconify-icon icon="{{ $point['icon'] }}" class="text-xl sm:text-2xl text-brand-300"></iconify-icon>
                            <h4 class="mt-3 text-xs sm:text-sm font-bold text-white">
                                {{ $point['title'] }}
                            </h4>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
