{{-- resources/views/frontend/pages/home/sections/google-reviews.blade.php --}}

@props([
    'badge' => 'From Dreamers to Achievers',
    'title' => 'Stories that inspire',
    'titleHighlight' => 'success',
    'description' =>
        'Real experiences from students who trusted us with their global education journey. Your next success story starts here.',
    'reviewUrl' => 'https://admin.trustindex.io/api/googleWriteReview?place-id=ChIJqyQYyZC4VTcR-7vrnhjyMIw',
    'averageRating' => '4.9',
    'totalReviews' => '443',
    'reviews' => [],
])

@php
    $defaultReviews = $reviews = [
        [
            'id' => 1,
            'name' => 'Sajia Oshin',
            'date' => '3 weeks ago',
            'rating' => 3,
            'avatar' => '/reviews/sajia.png',
            'text' =>
                'I started my Australia visa process with HBD Services in August. Their team guided me through each step and made the overall process easier to understand. I appreciate their support and assistance throughout my journey.',
        ],
        [
            'id' => 2,
            'name' => 'Aditto Saha',
            'date' => 'A month ago',
            'rating' => 5,
            'avatar' => '/reviews/aditto.png',
            'text' =>
                'A big thanks to HBD Services for their excellent support. My counsellor, Pinku Vai, was incredibly helpful, patient, and supportive throughout the process. I highly recommend their team to anyone planning to study abroad.',
        ],
        [
            'id' => 3,
            'name' => 'Kamrul Islam',
            'date' => 'A month ago',
            'rating' => 4,
            'avatar' => '/reviews/kamrul.png',
            'text' =>
                'I am grateful to the entire HBD Services team for making my journey smooth and stress-free. Everyone was friendly, approachable, and always ready to help whenever I needed assistance.',
        ],
        [
            'id' => 4,
            'name' => 'Tasfia Rahman',
            'date' => '2 months ago',
            'rating' => 5,
            'avatar' => '/reviews/tasfia.png',
            'text' =>
                'I had a wonderful experience with HBD Services. Their guidance on university selection and visa documentation was clear and professional. The team made every step much easier for me.',
        ],
        [
            'id' => 5,
            'name' => 'Farhana Mitu',
            'date' => '2 months ago',
            'rating' => 5,
            'avatar' => '/reviews/farhana.png',
            'text' =>
                'The team at HBD Services was very supportive and responsive. They helped me understand my study options and provided helpful guidance throughout my application journey. Truly appreciate their dedication.',
        ],
        [
            'id' => 6,
            'name' => 'Tamim Hasan',
            'date' => '2 months ago',
            'rating' => 5,
            'avatar' => '/reviews/tamim.png',
            'text' =>
                'Choosing HBD Services was a great decision for my study abroad journey. The counsellors were knowledgeable, friendly, and always willing to answer my questions. Thank you for your continued support.',
        ],
        [
            'id' => 7,
            'name' => 'Dip Bhakta',
            'date' => '2 months ago',
            'rating' => 5,
            'avatar' => '/reviews/dip.png',
            'text' =>
                'I really appreciate the professional service and personal attention I received from HBD Services. Their team provided helpful guidance and made the application process feel much more manageable.',
        ],
        [
            'id' => 8,
            'name' => 'Jihan Islam',
            'date' => '2 months ago',
            'rating' => 5,
            'avatar' => '/reviews/jihan.png',
            'text' =>
                'My experience with HBD Services has been excellent. The team was cooperative, professional, and supportive at every stage. I am thankful for their guidance and would happily recommend their services.',
        ],
    ];

    $reviews = !empty($reviews) ? array_values($reviews) : $defaultReviews;
@endphp

<section id="success-stories" class="relative overflow-hidden bg-white py-16 sm:py-20 lg:py-24" x-data="{
    reviews: @js($reviews),
    currentIndex: 0,
    perPage: 3,

    init() {
        this.updatePerPage();
        window.addEventListener('resize', () => this.updatePerPage());
    },

    updatePerPage() {
        this.perPage = window.innerWidth < 768 ? 1 : window.innerWidth < 1024 ? 2 : 3;
        this.currentIndex = this.currentIndex % Math.max(1, this.reviews.length);
    },

    get visibleReviews() {
        if (!this.reviews.length) return [];
        return Array.from({ length: Math.min(this.perPage, this.reviews.length) },
            (_, index) => this.reviews[(this.currentIndex + index) % this.reviews.length]
        );
    },

    prev() {
        if (!this.reviews.length) return;
        this.currentIndex = (this.currentIndex - 1 + this.reviews.length) % this.reviews.length;
    },

    next() {
        if (!this.reviews.length) return;
        this.currentIndex = (this.currentIndex + 1) % this.reviews.length;
    },

    goTo(index) { this.currentIndex = index; }
}">
    <div class="pointer-events-none absolute -right-40 top-40 h-96 w-96 rounded-full bg-brand-50 blur-[120px]"></div>

    <div class="relative mx-auto w-full max-w-7xl px-6 lg:px-8">

        {{-- Header --}}
        <div class="mx-auto max-w-3xl text-center" data-reveal>
            <span
                class="inline-flex items-center gap-2 rounded-full border border-brand-100 bg-brand-50 px-4 py-1.5 text-[12px] font-semibold uppercase tracking-[0.16em] text-brand-600">
                <iconify-icon icon="lucide:sparkles" class="text-[15px]"></iconify-icon>
                {{ $badge }}
            </span>
            <h2
                class="mt-5 text-[28px] font-semibold leading-[1.2] tracking-[-0.02em] text-black sm:text-[30px] lg:text-[32px]">
                {{ $title }} <span class="text-success-500">success</span>
            </h2>
            <p class="mx-auto mt-4 max-w-2xl text-base leading-7 text-black/60">{{ $description }}</p>
        </div>

        {{-- Rating panel --}}
        <div class="mt-12 overflow-hidden rounded-2xl border border-brand-100 bg-white shadow-[0_12px_40px_-24px_rgba(16,24,40,0.22)] lg:mt-14"
            data-reveal style="--reveal-delay: 80ms">
            <div class="grid grid-cols-1 lg:grid-cols-[1fr_auto] lg:items-center">
                <div class="flex flex-col gap-5 p-6 sm:flex-row sm:items-center sm:gap-7 sm:p-8">
                    <div class="flex items-center gap-3">
                        <span
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl border border-brand-100 bg-brand-25 text-2xl font-bold">
                            <span
                                class="bg-gradient-to-br from-brand-500 via-accent-two-500 to-accent-one-500 bg-clip-text text-transparent">G</span>
                        </span>
                        <div>
                            <p class="text-sm font-semibold text-black/50">Google Reviews</p>
                            <div class="mt-1 flex flex-wrap items-center gap-2">
                                <span class="text-3xl font-bold tracking-tight text-black">{{ $averageRating }}</span>
                                <span class="flex items-center gap-0.5 text-brand-500"
                                    aria-label="Rated {{ $averageRating }} out of 5">
                                    @for ($i = 0; $i < 5; $i++)
                                        <iconify-icon icon="fa-solid:star"
                                            class="text-base text-amber-400"></iconify-icon>
                                    @endfor
                                </span>
                            </div>
                        </div>
                    </div>

                    <span class="hidden h-12 w-px bg-brand-100 sm:block"></span>

                    <div>
                        <p class="text-sm font-semibold text-black">Trusted by students and families</p>
                        <p class="mt-1 text-sm text-black/55">{{ $totalReviews }} reviews · Global education consultancy
                        </p>
                        <div class="mt-2 flex items-center gap-2 text-xs font-medium text-black/60">
                            <span class="h-2 w-2 rounded-full bg-accent-one-500"></span>
                            <span>Building brighter futures together</span>
                        </div>
                    </div>
                </div>

                <div
                    class="flex flex-wrap items-center gap-3 border-t border-brand-100 bg-brand-25 p-5 sm:p-6 lg:border-l lg:border-t-0">
                    <a href="{{ $reviewUrl }}" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-brand-500 px-5 py-2.5 sm:py-3.5 text-[13px] sm:text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:bg-brand-600 focus:outline-none focus:ring-4 focus:ring-brand-100">
                        Write a review
                        <iconify-icon icon="lucide:external-link" class="text-base"></iconify-icon>
                    </a>
                    <span
                        class="inline-flex items-center gap-2 rounded-xl border border-brand-100 bg-white px-4 py-2.5 sm:py-3.5 text-[13px] sm:text-sm font-medium text-black/60">
                        <iconify-icon icon="lucide:shield-check" class="text-base text-brand-600"></iconify-icon>
                        <span>Trustindex</span>
                    </span>
                </div>
            </div>
        </div>

        {{-- Reviews --}}
        <div class="mt-10 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            <template x-for="review in visibleReviews" :key="review.id">
                <article
                    class="group relative flex min-h-[280px] flex-col overflow-hidden rounded-2xl border border-brand-100 bg-white p-6 shadow-[0_1px_2px_rgba(16,24,40,0.04)] transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-theme-md sm:p-7"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="translate-y-3 opacity-0"
                    x-transition:enter-end="translate-y-0 opacity-100">
                    <span
                        class="absolute left-0 top-0 h-1 w-16 rounded-br-full bg-brand-500 transition-all duration-300 group-hover:w-28"></span>

                    <div class="flex items-start justify-between gap-3">
                        <div class="flex min-w-0 items-center gap-3">
                            <span
                                class="relative flex h-12 w-12 shrink-0 items-center justify-center overflow-hidden rounded-full border-2 border-brand-100 bg-brand-50">
                                {{-- Avatar Image --}}
                                <template x-if="review.avatar">
                                    <img :src="review.avatar" :alt="review.name"
                                        class="h-full w-full object-cover" loading="lazy">
                                </template>

                                {{-- First Letter Fallback --}}
                                <template x-if="!review.avatar">
                                    <span class="text-lg font-bold uppercase text-brand-600"
                                        x-text="review.name ? review.name.trim().charAt(0) : '?'"></span>
                                </template>
                            </span>

                            <div class="min-w-0">
                                <h3 class="truncate text-sm font-bold text-black sm:text-base" x-text="review.name">
                                </h3>

                                <p class="mt-1 text-xs text-black/50" x-text="review.date"></p>
                            </div>
                        </div>
                        <iconify-icon icon="lucide:quote" class="shrink-0 text-3xl text-brand-200"></iconify-icon>
                    </div>

                    <div class="mt-5 flex items-center justify-between gap-3">
                        <span class="flex items-center gap-0.5 text-brand-500" aria-label="Review rating">
                            <template x-for="star in Math.min(5, Math.max(0, Number(review.rating) || 0))"
                                :key="star">
                                <iconify-icon icon="fa-solid:star" class="text-base text-amber-400"></iconify-icon>
                            </template>
                        </span>
                        <span
                            class="inline-flex items-center gap-1 rounded-full bg-brand-50 px-2.5 py-1 text-[10px] font-semibold text-brand-700 sm:text-xs">
                            <iconify-icon icon="lucide:shield-check" class="text-sm"></iconify-icon>
                            Google Review
                        </span>
                    </div>

                    <p class="mt-5 line-clamp-4 flex-1 text-sm leading-7 text-black/65"
                        x-text="'“' + review.text + '”'"></p>
                </article>
            </template>
        </div>

        <div x-show="reviews.length === 0" class="rounded-2xl border border-dashed border-brand-200 p-10 text-center">
            <iconify-icon icon="lucide:message-square" class="text-4xl text-brand-300"></iconify-icon>
            <p class="mt-3 text-sm text-black/50">No reviews available at the moment.</p>
        </div>

        {{-- Controls --}}
        <div x-show="reviews.length > 1" class="mt-6 sm:mt-8 flex items-center justify-center gap-3 sm:gap-5">
            <!-- Previous -->
            <button type="button" @click="prev()" aria-label="Previous review"
                class="group flex h-10 w-10 sm:h-11 sm:w-11 items-center justify-center rounded-full border border-brand-200 bg-white text-brand-700 transition-all duration-200 hover:border-brand-500 hover:bg-brand-500 hover:text-white focus:outline-none focus:ring-4 focus:ring-brand-100">
                <iconify-icon icon="lucide:chevron-left"
                    class="text-lg sm:text-xl transition-transform group-hover:-translate-x-0.5"></iconify-icon>
            </button>

            <!-- Dots -->
            <div class="flex items-center gap-2 sm:gap-2.5">
                <template x-for="index in Math.min(3, reviews.length)" :key="index">
                    <button type="button" @click="goTo(index - 1)" :aria-label="`Show review ${index}`"
                        :aria-current="index - 1 === currentIndex ? 'true' : 'false'"
                        class="h-2 rounded-full transition-all duration-300"
                        :class="index - 1 === currentIndex ?
                            'w-6 sm:w-8 bg-brand-500' :
                            'w-2 bg-brand-200 hover:bg-brand-300'"></button>
                </template>
            </div>

            <!-- Next -->
            <button type="button" @click="next()" aria-label="Next review"
                class="group flex h-10 w-10 sm:h-11 sm:w-11 items-center justify-center rounded-full border border-brand-200 bg-white text-brand-700 transition-all duration-200 hover:border-brand-500 hover:bg-brand-500 hover:text-white focus:outline-none focus:ring-4 focus:ring-brand-100">
                <iconify-icon icon="lucide:chevron-right"
                    class="text-lg sm:text-xl transition-transform group-hover:translate-x-0.5"></iconify-icon>
            </button>
        </div>
    </div>
</section>
