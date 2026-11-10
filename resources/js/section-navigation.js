
document.addEventListener('alpine:init', () => {
    Alpine.data('sectionNavigation', (config = {}) => ({
        tabs: config.tabs || [],
        sections: (config.tabs || []).map(tab => tab.id),

        offset: config.offset ?? 125,
        activationOffset: config.activationOffset ?? 180,

        activeTab: config.tabs?.[0]?.id || '',

        _scrollFrame: null,
        _onScroll: null,
        _onResize: null,

        init() {
            this.$nextTick(() => {
                this.setupScrollSpy();
                this.updateActiveSection();
            });
        },

        getSectionElements() {
            return this.sections
                .map(id => document.getElementById(id))
                .filter(Boolean);
        },

        getTab(id) {
            return Array.from(
                this.$root.querySelectorAll('[data-tab]')
            ).find(tab => tab.dataset.tab === id);
        },

        scrollToSection(id) {
            const section = document.getElementById(id);

            if (!section || !this.sections.includes(id)) return;

            this.setActive(id);

            const top =
                section.getBoundingClientRect().top +
                window.scrollY -
                this.offset;

            window.scrollTo({
                top: Math.max(0, top),
                behavior: 'smooth'
            });
        },

        setActive(id) {
            if (!this.sections.includes(id)) return;

            this.activeTab = id;

            this.$nextTick(() => {
                const tab = this.getTab(id);
                const container = this.$refs.tabContainer;

                if (!tab || !container) return;

                const left = tab.offsetLeft;
                const right = left + tab.offsetWidth;
                const visibleLeft = container.scrollLeft;
                const visibleRight =
                    visibleLeft + container.clientWidth;

                if (left < visibleLeft) {
                    container.scrollTo({
                        left: Math.max(0, left - 16),
                        behavior: 'smooth'
                    });
                } else if (right > visibleRight) {
                    container.scrollTo({
                        left: right - container.clientWidth + 16,
                        behavior: 'smooth'
                    });
                }
            });
        },

        updateActiveSection() {
            const sections = this.getSectionElements();

            if (!sections.length) return;

            const last = sections[sections.length - 1];

            const atBottom =
                window.innerHeight + window.scrollY >=
                document.documentElement.scrollHeight - 4;

            if (
                atBottom &&
                last.getBoundingClientRect().top < window.innerHeight
            ) {
                this.setActive(last.id);
                return;
            }

            let current = sections[0];

            for (const section of sections) {
                if (
                    section.getBoundingClientRect().top <=
                    this.activationOffset
                ) {
                    current = section;
                } else {
                    break;
                }
            }

            this.setActive(current.id);
        },

        setupScrollSpy() {
            this._onScroll = () => {
                if (this._scrollFrame !== null) return;

                this._scrollFrame = requestAnimationFrame(() => {
                    this._scrollFrame = null;
                    this.updateActiveSection();
                });
            };

            this._onResize = () => this.updateActiveSection();

            window.addEventListener('scroll', this._onScroll, {
                passive: true
            });

            window.addEventListener('resize', this._onResize, {
                passive: true
            });
        },

        destroy() {
            if (this._onScroll) {
                window.removeEventListener('scroll', this._onScroll);
            }

            if (this._onResize) {
                window.removeEventListener('resize', this._onResize);
            }

            if (this._scrollFrame !== null) {
                cancelAnimationFrame(this._scrollFrame);
            }
        }
    }));
});
