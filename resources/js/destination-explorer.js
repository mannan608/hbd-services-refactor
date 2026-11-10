
export default function destinationExplorer(
    destinations = [],
    destinationUrlTemplate = '',
    assetBaseUrl = ''
) {
    return {
        // =========================================
        // DATA
        // =========================================

        destinations: Array.isArray(destinations) ? destinations : [],

        destinationUrlTemplate,
        assetBaseUrl,

        // =========================================
        // FILTER STATE
        // =========================================

        searchTerm: '',
        selectedCountry: 'All',
        selectedRegion: 'All',
        sortBy: 'rating',

        // =========================================
        // SORT OPTIONS
        // =========================================

        sortOptions: [
            {
                value: 'rating',
                label: 'Top Rated',
            },
            {
                value: 'reviews',
                label: 'Most Popular',
            },
        ],

        // =========================================
        // COUNTRY OPTIONS
        // =========================================

        get countryOptions() {
            const countries = this.destinations
                .map(destination => destination.country)
                .filter(Boolean);

            return [
                'All',
                ...new Set(
                    countries.sort((a, b) => a.localeCompare(b))
                ),
            ];
        },

        // =========================================
        // REGION OPTIONS
        // =========================================

        get regionOptions() {
            const regions = this.destinations
                .filter(destination => {
                    return (
                        this.selectedCountry === 'All' ||
                        destination.country === this.selectedCountry
                    );
                })
                .map(destination => destination.region)
                .filter(Boolean);

            return [
                'All',
                ...new Set(
                    regions.sort((a, b) => a.localeCompare(b))
                ),
            ];
        },

        // =========================================
        // FILTERED DESTINATIONS
        // =========================================

        get filteredDestinations() {
            const search = this.searchTerm.trim().toLowerCase();

            let results = this.destinations.filter(destination => {

                // Country filter
                const matchesCountry =
                    this.selectedCountry === 'All' ||
                    destination.country === this.selectedCountry;

                if (!matchesCountry) return false;

                // Region filter
                const matchesRegion =
                    this.selectedRegion === 'All' ||
                    destination.region === this.selectedRegion;

                if (!matchesRegion) return false;

                // Search filter
                if (!search) return true;

                const searchableFields = [
                    destination.name,
                    destination.country,
                    destination.title,
                    destination.region,
                    destination.code,
                    ...(destination.topUniversities || []),
                    ...(destination.popularFor || []),
                ];

                const searchableText = searchableFields
                    .filter(Boolean)
                    .join(' ')
                    .toLowerCase();

                return searchableText.includes(search);
            });

            // Sorting
            results = [...results].sort((a, b) => {

                if (this.sortBy === 'rating') {
                    return (
                        Number(b.rating || 0) -
                        Number(a.rating || 0)
                    );
                }

                if (this.sortBy === 'reviews') {
                    return (
                        Number(b.reviewsCount || 0) -
                        Number(a.reviewsCount || 0)
                    );
                }

                return (a.name || '').localeCompare(b.name || '');
            });

            return results;
        },

        // =========================================
        // FILTER STATUS
        // =========================================

        get hasActiveFilters() {
            return (
                this.searchTerm.trim() !== '' ||
                this.selectedCountry !== 'All' ||
                this.selectedRegion !== 'All' ||
                this.sortBy !== 'rating'
            );
        },

        // =========================================
        // HELPERS
        // =========================================

        destinationUrl(destination) {
            return this.destinationUrlTemplate.replace(
                '__SLUG__',
                encodeURIComponent(destination.slug)
            );
        },

        assetUrl(path) {
            if (!path) return '';

            return (
                this.assetBaseUrl.replace(/\/+$/, '') +
                '/' +
                String(path).replace(/^\/+/, '')
            );
        },

        formatNumber(value) {
            return new Intl.NumberFormat().format(
                Number(value || 0)
            );
        },

        // =========================================
        // COUNTRY CHANGE
        // =========================================

        changeCountry(country) {
            this.selectedCountry = country;

            // Reset region if it is unavailable
            if (
                this.selectedRegion !== 'All' &&
                !this.regionOptions.includes(this.selectedRegion)
            ) {
                this.selectedRegion = 'All';
            }
        },

        // =========================================
        // RESET FILTERS
        // =========================================

        resetFilters() {
            this.searchTerm = '';
            this.selectedCountry = 'All';
            this.selectedRegion = 'All';
            this.sortBy = 'rating';
        },

        // =========================================
        // SMOOTH SCROLL
        // =========================================

        scrollToList() {
            const section = document.getElementById(
                'destinations-list'
            );

            if (!section) return;

            section.scrollIntoView({
                behavior: 'smooth',
                block: 'start',
            });
        },

        // =========================================
        // INTERSECTION OBSERVER
        // =========================================

        observer: null,

        init() {
            this.$nextTick(() => {
                this.initRevealObserver();

                // Observe cards when Alpine renders them
                this.$watch('filteredDestinations', () => {
                    this.$nextTick(() => {
                        this.observeRevealElements();
                    });
                });
            });
        },

        initRevealObserver() {
            const elements = this.$root.querySelectorAll(
                '[data-reveal]'
            );

            if (!('IntersectionObserver' in window)) {
                elements.forEach(element => {
                    element.classList.add('is-visible');
                });

                return;
            }

            if (this.observer) {
                this.observer.disconnect();
            }

            this.observer = new IntersectionObserver(
                (entries, observerInstance) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');

                            observerInstance.unobserve(entry.target);
                        }
                    });
                },
                {
                    threshold: 0.12,
                    rootMargin: '0px 0px -40px 0px',
                }
            );

            this.observeRevealElements();
        },

        observeRevealElements() {
            if (!this.observer) return;

            const elements = this.$root.querySelectorAll(
                '[data-reveal]:not(.is-visible)'
            );

            elements.forEach(element => {
                this.observer.observe(element);
            });
        },

        observeReveal(element) {
            if (!element) return;

            if (!('IntersectionObserver' in window)) {
                element.classList.add('is-visible');
                return;
            }

            if (this.observer) {
                this.observer.observe(element);
            }
        },

        destroy() {
            if (this.observer) {
                this.observer.disconnect();
                this.observer = null;
            }
        },
    };
}
