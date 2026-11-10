<div x-data="{
        query: '',
        results: [],
        loading: false,
        open: false,
        fetchResults() {
            if (this.query.trim().length < 2) {
                this.results = [];
                this.open = false;
                return;
            }
            this.loading = true;
            this.open = true;

            fetch(`/search/live?q=${encodeURIComponent(this.query)}`)
                .then(res => res.json())
                .then(data => {
                    this.results = data;
                    this.loading = false;
                })
                .catch(() => {
                    this.loading = false;
                });
        }
    }" 
    @click.away="open = false" 
    @keydown.escape.window="open = false"
    class="relative z-9999 mx-auto mt-8 w-full max-w-2xl transition-all duration-700 delay-300"
    :class="loaded ? 'translate-y-0 opacity-100' : 'translate-y-6 '">

    <!-- Search Box Pill -->
    <div class="relative flex items-center gap-2 rounded-2xl bg-white/95 p-2 shadow-2xl backdrop-blur-xl border border-white/40 transition-all duration-300 hover:bg-white hover:shadow-[0_20px_50px_rgba(0,0,0,0.3)] focus-within:bg-white focus-within:ring-4 focus-within:ring-brand-500/20 focus-within:border-brand-500">
        
        <!-- Search Input & Status Icon -->
        <div class="relative flex-1 flex items-center">
            <div class="absolute left-3.5 text-neutral-400 flex items-center justify-center pointer-events-none">
                <template x-if="!loading">
                    <svg class="size-5 text-neutral-400 transition-colors group-focus-within:text-brand-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-4.34-4.34"></path>
                    </svg>
                </template>
                <template x-if="loading">
                    <svg class="size-5 animate-spin text-brand-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </template>
            </div>

            <input 
                type="text" 
                x-model="query" 
                @input.debounce.300ms="fetchResults()"
                @focus="if(query.length >= 2) open = true"
                :placeholder="activeDestination.search_placeholder" 
                class="h-12 w-full border-0 bg-transparent pl-11 pr-10 text-base text-neutral-900 placeholder:text-neutral-400 focus:outline-none focus:ring-0 font-medium"
            />

            <!-- Clear Query Button -->
            <button 
                x-show="query.length > 0" 
                x-cloak
                @click="query = ''; results = []; open = false" 
                type="button" 
                class="absolute right-3 text-neutral-400 hover:text-neutral-700 transition-colors p-1 rounded-full hover:bg-neutral-100">
                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- AI Assist Button -->
        <button 
            type="button"
            class="group relative inline-flex h-12 cursor-pointer items-center justify-center gap-2 whitespace-nowrap rounded-xl bg-gradient-to-r from-brand-500/15 to-brand-500/25 px-5 text-sm font-bold text-brand-600 border border-brand-500/20 shadow-sm transition-all duration-300 hover:scale-[1.02] hover:bg-brand-500 hover:text-white hover:shadow-lg hover:shadow-brand-500/30 active:scale-95">
            
            <svg class="size-4 text-brand-600 transition-transform duration-500 group-hover:rotate-12 group-hover:text-white" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.3338 1.33407V4.00063M14.6672 2.66735H12.0004M7.34461 1.87701C7.37318 1.72408 7.45434 1.58596 7.57403 1.48657C7.69372 1.38717 7.84441 1.33276 8 1.33276C8.15559 1.33276 8.30628 1.38717 8.42597 1.48657C8.54566 1.58596 8.62682 1.72408 9.35611 5.58219C9.40588 5.84561 9.53391 6.08792 9.72349 6.27748C9.91308 6.46704 10.1554 6.59506 10.4189 6.64482L14.1245 7.34546C14.2774 7.37402 14.4156 7.45517 14.515 7.57485C14.6144 7.69452 14.6688 7.84519 14.6688 8.00076C14.6688 8.15633 14.6144 8.307 14.515 8.42668C14.4156 8.54636 14.2774 8.62751 14.1245 8.65607L10.4189 9.35671C10.1554 9.40647 9.91308 9.53449 9.72349 9.72405C9.53391 9.91361 9.40588 9.35671 9.35611 10.4193L8.65539 14.1245C8.62682 14.2774 8.54566 14.4156 8.42597 14.515C8.30628 14.6144 8.15559 14.6688 8 14.6688C7.84441 14.6688 7.69372 14.6144 7.57403 14.515C7.45434 14.4156 7.37318 14.2774 7.34461 14.1245L6.64389 10.4193C6.59412 10.1559 6.46692 9.91361 6.27651 9.72405C6.08692 9.53449 5.84459 9.40647 5.58114 9.35671L1.87551 8.65607C1.72256 8.62751 1.58443 8.54636 1.48502 8.42668C1.38561 8.307 1.3312 8.15633 1.3312 8.00076C1.3312 7.84519 1.38561 7.69452 1.48502 7.57485Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
            </svg>
            <span>AI Assist</span>
        </button>
    </div>

    <!-- Floating Live Search Results Dropdown -->
    <div 
        x-show="open" 
        x-cloak
        x-transition:enter="transition ease-out duration-250" 
        x-transition:enter-start="opacity-0 translate-y-3 scale-95" 
        x-transition:enter-end="opacity-100 translate-y-0 scale-100" 
        x-transition:leave="transition ease-in duration-150" 
        x-transition:leave-start="opacity-100 translate-y-0 scale-100" 
        x-transition:leave-end="opacity-0 translate-y-2 scale-95"
        class="absolute left-0 right-0 z-9999 mt-3 rounded-2xl bg-white p-3 text-left shadow-[0_25px_60px_-15px_rgba(0,0,0,0.3)] backdrop-blur-2xl border border-white/60 max-h-[420px] overflow-y-auto divide-y divide-neutral-100">
        
        <!-- Results Wrapper -->
        <template x-if="results.length > 0">
            <div class="space-y-1.5 pb-2">
                <div class="px-3 py-1 flex items-center justify-between">
                    <span class="text-[11px] font-bold uppercase tracking-wider text-neutral-400">Top Matches</span>
                    <span class="text-[11px] font-medium text-neutral-400" x-text="results.length + ' results found'"></span>
                </div>
                
                <template x-for="item in results" :key="item.id">
                    <a :href="item.url" class="group flex items-start gap-3.5 rounded-xl p-3 transition-all hover:bg-brand-50/60 hover:shadow-sm">
                        
                        <!-- Dynamic Type Icon Pill -->
                        <div class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-neutral-100 text-neutral-600 group-hover:bg-brand-500 group-hover:text-white transition-all duration-300">
                            <template x-if="item.type === 'university'">
                                <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 14l9-5-9-5-9 5 9 5z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                                </svg>
                            </template>
                            <template x-if="item.type === 'course'">
                                <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </template>
                            <template x-if="item.type !== 'university' && item.type !== 'course'">
                                <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </template>
                        </div>
                        
                        <!-- Content Details -->
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between gap-2">
                                <h4 class="truncate text-sm font-bold text-neutral-800 group-hover:text-brand-600 transition-colors" x-html="item.title"></h4>
                                <span class="shrink-0 rounded-md bg-neutral-100 px-2 py-0.5 text-[10px] font-bold tracking-wider text-neutral-500 uppercase group-hover:bg-brand-100 group-hover:text-brand-700" x-text="item.type"></span>
                            </div>
                            <p class="truncate text-xs text-neutral-500 mt-0.5" x-html="item.subtitle || item.description"></p>
                        </div>
                    </a>
                </template>
            </div>
        </template>

        <!-- Footer Action -->
        <template x-if="results.length > 0">
            <div class="pt-2">
                <a :href="'/search?q=' + encodeURIComponent(query)" class="flex items-center justify-center gap-2 rounded-xl bg-neutral-50 py-2.5 text-center text-xs font-bold text-brand-600 hover:bg-brand-500 hover:text-white transition-all duration-300">
                    <span>View all matching results</span>
                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>
        </template>

        <!-- No Results Fallback -->
        <template x-if="!loading && results.length === 0 && query.trim().length >= 2">
            <div class="py-8 px-4 text-center">
                <div class="mx-auto flex size-12 items-center justify-center rounded-2xl bg-brand-50 text-brand-500 mb-3">
                    <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 9.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <p class="text-sm font-semibold text-neutral-800">No matching information found</p>
                <p class="mt-1 text-xs text-neutral-500 max-w-md mx-auto leading-relaxed">
                        Sorry, we couldn't find any relevant information related to your search. Please try different keywords.
                    Sorry, we couldn't find any relevant information related to your search. Please try different keywords.Sorry,
                    Sorry, we couldn't find any relevant information related to your search. Please try different keywords.
                    Sorry, we couldn't find any relevant information related to your search. Please try different keywords.Sorry, we couldn't find any relevant information related to your search. Please try different keywords.
                </p>
            </div>
        </template>
    </div>
</div>