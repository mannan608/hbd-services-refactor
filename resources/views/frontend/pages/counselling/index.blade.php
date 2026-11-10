@extends('frontend.layouts.app')

@section('content')
  <section class="relative py-8 md:py-0 min-h-60 md:min-h-70 lg:min-h-80 flex items-center overflow-hidden">

        <div class="absolute inset-0 z-0">
            <img src="{{ asset('frontend-img/course-page-header.jpg') }}" alt="Training" class="w-full h-full object-cover">

            <div class="absolute inset-0 bg-linear-to-r  bg-black/70 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">

            <div class="max-w-2xl mx-auto">

                <h1 class="text-2xl font-bold tracking-tight text-white sm:text-3xl lg:text-4xl uppercase text-center">
                    Book your counselling session
                </h1>

            </div>
        </div>

    </section>
    <section class="mt-12 sm:mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-8 md:mb-10">
                    <span
                        class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-brand-50 text-brand-700 text-sm font-medium mb-4">
                        <span class="w-2 h-2 rounded-full bg-brand-600 animate-pulse"></span>
                        Better futures
                    </span>
                    <h1 class="text-3xl md:text-5xl font-bold text-slate-900 tracking-tight">
                       Speak with an Expert – It's Free
                    </h1>
                    <p class="mt-4 text-slate-500 text-sm md:text-base max-w-2xl mx-auto">
                        Fill in your details below and we'll reserve your time. It only takes a minute.
                    </p>
                </div>

                <div class="max-w-4xl mx-auto border p-6 rounded-2xl bg-white" data-reveal style="--reveal-delay: 150ms">
                @include('frontend.pages.destinations.details-section._form')

                </div>


            </div>
    </section>
@endsection
@push('scripts')
    <noscript>
        <style>
            [data-reveal] {
                opacity: 1 !important;
                transform: none !important;
            }
        </style>
    </noscript>

    <script>
        (function () {
            var nodes = document.querySelectorAll('[data-reveal]');

            if (!nodes.length) {
                return;
            }

            if (!('IntersectionObserver' in window)) {
                nodes.forEach(function (node) {
                    node.classList.add('is-revealed');
                });
                return;
            }

            var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-revealed');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.12,
                rootMargin: '0px 0px -60px 0px'
            });

            nodes.forEach(function (node) {
                observer.observe(node);
            });
        })();
    </script>
@endpush