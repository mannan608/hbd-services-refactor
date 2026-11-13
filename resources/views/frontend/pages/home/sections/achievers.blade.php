@props([
    'badge' => 'Student Experiences',
    'title' => "Achievers'",
    'titleHighlight' => 'Voices',
    'description' => 'Realize your dreams. Join the successful achievers worldwide!',
    'viewMoreUrl' => '#',
    'testimonials' => [],
])

@php
  
$defaultTestimonials = [
    [
        'id' => '1',
        'name' => 'Niloy Bhattacharjee',
        'course' => 'Master of Information Technology in Cyber Security, Australia',
        'videoId' => 'IAOHC6FcjZw',
        'thumbnail' => '/images/achievers/s-1.jpg',
    ],
    [
        'id' => '2',
        'name' => 'Md Shoayeb Akter',
        'course' => 'Master of International Business and Master of Marketing, Australia',
        'videoId' => 'sz_DA1TkGvk',
        'thumbnail' => '/images/achievers/s-2.jpg',
    ],
    [
        'id' => '3',
        'name' => 'Md Farhan Tanvir & Md Faisal Anjum',
        'course' => 'Master of Data Science, Australia',
        'videoId' => 'KP2PoEkO3jE',
        'thumbnail' => '/images/achievers/s-3.jpg',
    ],
    [
        'id' => '4',
        'name' => 'Dewan Osman Mahdi',
        'course' => 'Master of Information Technology and Systems, Australia',
        'videoId' => 'fwXF0hSY89Q',
        'thumbnail' => '/images/achievers/s-4.jpg',
    ],
    [
        'id' => '5',
        'name' => 'Tanjila Rahman Shanta',
        'course' => 'Bachelor of Information and Communication Technology, Australia',
        'videoId' => 'a_Y7NumY2ic',
        'thumbnail' => '/images/achievers/s-5.jpg',
    ],
    [
        'id' => '6',
        'name' => 'Safayet Siddiqui',
        'course' => 'Bachelor of Nursing, Australia',
        'videoId' => '-6RkLOHDbg8',
        'thumbnail' => '/images/achievers/s-6.jpg',
    ],
    [
        'id' => '7',
        'name' => 'Sheikh Ehsanul Haque',
        'course' => 'Master of Business Administration, Australia',
        'videoId' => 'XbFprBIdzyQ',
        'thumbnail' => '/images/achievers/s-7.jpg',
    ],
    [
        'id' => '8',
        'name' => 'Mohammad Muzahid Chowdhury',
        'course' => 'Bachelor of Business and Enterprise, Australia',
        'videoId' => '',
        'thumbnail' => '/images/achievers/s-8.jpg',
    ],
    [
        'id' => '9',
        'name' => 'Razia Ahmed Chelsea',
        'course' => 'Master of Management and Master of Marketing, Australia',
        'videoId' => 'DIMgG8e0LKQ',
        'thumbnail' => '/images/achievers/s-9.jpg',
    ],
  
];


    $testimonials = !empty($testimonials) ? array_values($testimonials) : $defaultTestimonials;
@endphp

<section id="achievers" class="relative overflow-hidden bg-white py-16 sm:py-20 lg:py-24" x-data="{
    activeIndex: 0,
    activeVideoId: null,
    total: {{ count($testimonials) }},
    perPage: 3,
    isTransitioning: true,

    init() {
        this.updatePerPage();
        window.addEventListener('resize', () => this.updatePerPage());
    },

    updatePerPage() {
        let newPerPage = window.innerWidth < 640 ? 1 : window.innerWidth < 1024 ? 2 : 3;
        if (this.perPage !== newPerPage) {
            this.perPage = newPerPage;
            this.activeIndex = 0;
        }
    },

    next() {
        if (!this.total) return;
        this.activeIndex++;
    },

    prev() {
        if (!this.total) return;
        if (this.activeIndex === 0) {
            this.activeIndex = this.total;
            this.isTransitioning = false;
            this.$nextTick(() => {
                requestAnimationFrame(() => {
                    this.isTransitioning = true;
                    this.activeIndex--;
                });
            });
        } else {
            this.activeIndex--;
        }
    },

    handleTransitionEnd() {
        if (this.activeIndex >= this.total) {
            this.isTransitioning = false;
            this.activeIndex = 0;
            this.$nextTick(() => requestAnimationFrame(() => { this.isTransitioning = true; }));
        }
    },

    open(id) {
        this.activeVideoId = id;
        document.body.style.overflow = 'hidden';
    },

    close() {
        this.activeVideoId = null;
        document.body.style.overflow = '';
    }
}">
    {{-- Decoration --}}
    <div class="pointer-events-none absolute -left-40 top-20 h-80 w-80 rounded-full bg-brand-100/50 blur-[110px]"></div>
    <div
        class="pointer-events-none absolute -right-40 bottom-10 h-80 w-80 rounded-full bg-red-500-light blur-[110px]">
    </div>

    <div class="relative mx-auto w-full max-w-7xl px-6 lg:px-8">

        {{-- Header --}}
        <div class="mx-auto max-w-4xl text-center" data-reveal>
            <span
                class="inline-flex items-center gap-2 rounded-full border border-brand-100 bg-brand-50 px-4 py-1.5 text-[12px] font-semibold uppercase tracking-[0.16em] text-brand-600">
                <iconify-icon icon="lucide:sparkles" class="text-[15px]"></iconify-icon>
                {{ $badge }}
            </span>
            <h2
                class="mt-5 text-3xl font-semibold leading-[1.2] tracking-[-0.02em] text-black sm:text-4xl md:text-5xl lg:text-6xl">
                {{ $title }} <span class="text-red-500">{{ $titleHighlight }}</span>
            </h2>
            <p class="mx-auto mt-4 max-w-xl text-base leading-7 text-black/60">{{ $description }}</p>
        </div>

        {{-- Slider --}}
        <div class="relative mt-12 lg:mt-14" data-reveal style="--reveal-delay: 120ms">
            <div class="overflow-hidden">
                <div class="flex"
                    :class="isTransitioning ? 'transition-transform duration-700 ease-in-out' : 'transition-none'"
                    :style="`transform: translateX(-${activeIndex * (100 / perPage)}%)`"
                    @transitionend="handleTransitionEnd()">

                    @foreach ($testimonials as $item)
                        <div class="shrink-0 px-2" :style="`width: ${100 / perPage}%`">
                            <button type="button" @click="open(@js($item['videoId']))"
                                class="group relative block aspect-video w-full overflow-hidden rounded-2xl border border-brand-100 text-left shadow-[0_1px_2px_rgba(16,24,40,0.04)] transition-all duration-300 hover:-translate-y-1.5 hover:border-brand-200 hover:shadow-theme-lg"
                                aria-label="Play success story by {{ $item['name'] }}">
                                <img src="{{ $item['thumbnail'] }}" alt="{{ $item['name'] }}"
                                    class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-110"
                                    loading="lazy" />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-brand-950/90 via-brand-950/25 to-transparent">
                                </div>

                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span
                                        class="flex h-14 w-14 items-center justify-center rounded-full bg-white/95 text-brand-600 shadow-lg transition-all duration-300 group-hover:scale-110 group-hover:bg-brand-500 group-hover:text-white">
                                        <iconify-icon icon="lucide:play" class="ml-1 text-2xl"></iconify-icon>
                                    </span>
                                </div>

                                <div class="absolute inset-x-0 bottom-0 p-5">
                                    <p class="truncate text-base font-bold text-white">{{ $item['name'] }}</p>
                                    <p class="mt-1 truncate text-sm text-brand-100/85">{{ $item['course'] }}</p>
                                </div>
                            </button>
                        </div>
                    @endforeach

                    {{-- Clones for seamless loop --}}
                    @for ($i = 0; $i < min(3, count($testimonials)); $i++)
                        @php $item = $testimonials[$i]; @endphp
                        <div class="shrink-0 px-2" :style="`width: ${100 / perPage}%`">
                            <button type="button" @click="open(@js($item['videoId']))"
                                class="group relative block aspect-video w-full overflow-hidden rounded-2xl border border-brand-100 text-left shadow-[0_1px_2px_rgba(16,24,40,0.04)] transition-all duration-300 hover:-translate-y-1.5 hover:border-brand-200 hover:shadow-theme-lg">
                                <img src="{{ $item['thumbnail'] }}" alt="{{ $item['name'] }}"
                                    class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-110"
                                    loading="lazy" />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-brand-950/90 via-brand-950/25 to-transparent">
                                </div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span
                                        class="flex h-14 w-14 items-center justify-center rounded-full bg-white/95 text-brand-600 shadow-lg transition-all duration-300 group-hover:scale-110 group-hover:bg-brand-500 group-hover:text-white">
                                        <iconify-icon icon="lucide:play" class="ml-1 text-2xl"></iconify-icon>
                                    </span>
                                </div>
                                <div class="absolute inset-x-0 bottom-0 p-5">
                                    <p class="truncate text-base font-bold text-white">{{ $item['name'] }}</p>
                                    <p class="mt-1 truncate text-sm text-brand-100/85">{{ $item['course'] }}</p>
                                </div>
                            </button>
                        </div>
                    @endfor
                </div>
            </div>

            {{-- Controls --}}
            @if (count($testimonials) > 1)
                <div class="mt-6 sm:mt-8 flex items-center justify-end gap-2.5 sm:gap-3">
                    <button type="button" @click="prev()" aria-label="Previous slide"
                        class="flex h-10 w-10 sm:h-11 sm:w-11 items-center justify-center rounded-xl border border-brand-200 bg-white text-brand-700 transition-all duration-200 hover:border-red-500 hover:bg-red-500 hover:text-white">
                        <iconify-icon icon="lucide:chevron-left" class="text-lg sm:text-xl"></iconify-icon>
                    </button>
                    <button type="button" @click="next()" aria-label="Next slide"
                        class="flex h-10 w-10 sm:h-11 sm:w-11 items-center justify-center rounded-xl border border-brand-200 bg-white text-brand-700 transition-all duration-200 hover:border-red-500 hover:bg-red-500 hover:text-white">
                        <iconify-icon icon="lucide:chevron-right" class="text-lg sm:text-xl"></iconify-icon>
                    </button>
                </div>
            @endif
        </div>
    </div>

    {{-- Video modal --}}
    <div x-show="activeVideoId" x-cloak x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center bg-brand-950/90 p-4 backdrop-blur" role="dialog"
        aria-modal="true" aria-label="Student Video Modal" @click.self="close()">
        <div class="relative w-full max-w-4xl overflow-hidden rounded-2xl border border-white/10 bg-black shadow-2xl"
            @click.stop>
            <button type="button" @click="close()" aria-label="Close video player"
                class="absolute right-3 top-3 z-20 flex h-10 w-10 items-center justify-center rounded-full bg-black/60 text-white backdrop-blur transition-all hover:bg-red-500 sm:right-4 sm:top-4">
                <iconify-icon icon="lucide:x" class="text-xl"></iconify-icon>
            </button>
            <div class="aspect-video w-full">
                <template x-if="activeVideoId">
                    <iframe :src="`https://www.youtube.com/embed/${activeVideoId}?autoplay=1&rel=0`"
                        title="Student Success Story" class="h-full w-full border-0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </template>
            </div>
        </div>
    </div>
</section>
