@extends('frontend.layouts.app')

@section('content')
    @include('frontend.pages.home.sections.hero')

    @include('frontend.pages.home.sections.journing')

    @include('frontend.pages.common-section.destination', ['destinations' => $destinations])

    @include('frontend.pages.common-section.service-section')

    @include('frontend.pages.home.sections.language-academy')

    @include('frontend.pages.home.sections.digital-platform')

    @include('frontend.pages.home.sections.achievers')

    @include('frontend.pages.home.sections.certification-awards')

    @include('frontend.pages.home.sections.google-reviews')

    @include('frontend.pages.common-section.university-partners')

    @include('frontend.pages.common-section.cta-section')
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
