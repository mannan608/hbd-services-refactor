<aside x-data="{
    // Selected filter state
    qualification: '',
    fee: 60000,
    score: 8.0,
    scholarship: false,

  qualifications: @js($qualifications),

    // Reset all fields back to initial values
    resetFilters() {
        this.qualification = '';
        this.fee = 60000;
        this.score = 8.0;
        this.scholarship = false;

        // Reset custom select components by triggering input/change events on hidden inputs
        const providerInput = this.$el.querySelector('input[name=\'provider\']');
        const countryInput = this.$el.querySelector('input[name=\'country\']');

        if (providerInput) {
            providerInput.value = '';
            providerInput.dispatchEvent(new Event('input', { bubbles: true }));
        }
        if (countryInput) {
            countryInput.value = '';
            countryInput.dispatchEvent(new Event('input', { bubbles: true }));
        }
    }
}" class="w-full lg:w-80 shrink-0 space-y-4">
    <div
        class="rounded-2xl border border-neutral-200/80 bg-white p-5 shadow-xs dark:border-neutral-800 dark:bg-neutral-900">

        <!-- Sidebar Header -->
        <div class="flex items-center justify-between pb-4 border-b border-neutral-100 dark:border-neutral-800">
            <div class="flex items-center gap-2">
                <svg class="h-4 w-4 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                </svg>
                <h2 class="text-sm font-bold tracking-tight text-neutral-900 dark:text-white">Filters</h2>
            </div>
            <button type="button" @click="resetFilters()"
                class="flex items-center gap-1.5 text-xs font-semibold text-neutral-400 hover:text-red-600 transition-colors">
                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
                Reset
            </button>
        </div>

        <div class="mt-5 space-y-6">

            <!-- Qualification Level (Segmented Pills) -->
            <div>
                <div class="mb-2.5 flex items-center justify-between">
                    <label
                        class="block text-xs font-bold tracking-wider text-neutral-400 uppercase">Qualification</label>
                    <a href="#" class="text-sm font-medium text-brand-500 hover:text-brand-600">See All</a>
                </div>

                <div class="grid grid-cols-1 gap-1.5">
                    <template x-for="item in qualifications" :key="item">
                        <label
                            :class="qualification === item ?
                                'border-brand-500 bg-brand-50/20 text-neutral-900 dark:text-white' :
                                'border-neutral-200/60 bg-neutral-50/50 hover:bg-neutral-100/80 text-neutral-700 dark:border-neutral-800 dark:bg-neutral-800/40 dark:text-neutral-300 dark:hover:bg-neutral-800'"
                            class="relative flex items-center justify-between px-3 py-2 rounded-xl border cursor-pointer transition-all group">
                            <span class="text-sm font-medium" x-text="item"></span>
                            <input type="radio" name="qualification" :value="item" x-model="qualification"
                                class="h-4 w-4 text-brand-500 border-neutral-300 focus:ring-brand-500" />
                        </label>
                    </template>
                </div>
            </div>

            <hr class="border-neutral-100 dark:border-neutral-800" />

            <!-- Searchable Provider Select Blade Component -->
            <x-form.searchable-select name="provider" label="Provider / University" :options="$providers
                ->map(
                    fn($provider) => [
                        'key' => $provider->id,
                        'text' => $provider->name,
                    ],
                )
                ->values()
                ->toArray()"
                placeholder="Select University" />

                <x-form.searchable-select name="country" label="Your Country" :options="$countries
                ->map(
                    fn($country) => [
                        'key' => $country->id,
                        'text' => $country->name,
                    ],
                )
                ->values()
                ->toArray()"
                placeholder="Select Country" />

            <hr class="border-neutral-100 dark:border-neutral-800" />

            <!-- Range Sliders -->
            <div class="space-y-6">

                <!-- Max Annual Fee Slider -->
                <div>
                    <div class="flex items-center justify-between mb-2.5">
                        <label class="text-xs font-bold tracking-wider text-neutral-400 uppercase">Max Annual
                            Fee</label>
                        <span
                            class="inline-flex items-center rounded-lg bg-brand-500/10 px-2.5 py-1 text-xs font-bold text-brand-600 border border-brand-500/20 shadow-xs"
                            x-text="'A$' + Number(fee).toLocaleString()"></span>
                    </div>

                    <div class="relative flex items-center">
                        <input type="range" min="5000" max="100000" step="2500" name="max_fee" x-model="fee"
                            class="w-full h-2 rounded-lg appearance-none cursor-pointer bg-neutral-200 accent-brand-500 focus:outline-hidden focus:ring-2 focus:ring-brand-500/30 dark:bg-neutral-800 [&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:w-5 [&::-webkit-slider-thumb]:h-5 [&::-webkit-slider-thumb]:rounded-full [&::-webkit-slider-thumb]:bg-brand-500 [&::-webkit-slider-thumb]:shadow-md [&::-webkit-slider-thumb]:border-2 [&::-webkit-slider-thumb]:border-white [&::-moz-range-thumb]:w-5 [&::-moz-range-thumb]:h-5 [&::-moz-range-thumb]:rounded-full [&::-moz-range-thumb]:bg-brand-500 [&::-moz-range-thumb]:border-2 [&::-moz-range-thumb]:border-white [&::-moz-range-thumb]:shadow-md transition-all" />
                    </div>

                    <div class="flex justify-between text-[10px] font-semibold text-neutral-400 mt-1.5 px-0.5">
                        <span>A$5,000</span>
                        <span>A$100,000</span>
                    </div>
                </div>

                <!-- IELTS Score Slider -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label class="text-xs font-bold tracking-wider text-neutral-400 uppercase">Target IELTS
                            Score</label>
                        <span
                            class="inline-flex items-center rounded-lg bg-brand-500/10 px-2.5 py-1 text-xs font-bold text-brand-600 border border-brand-500/20 shadow-xs"
                            x-text="'Band ' + Number(score).toFixed(1)"></span>
                    </div>

                    <div class="relative flex items-center">
                        <input type="range" min="4.5" max="9.0" step="0.5" name="ielts_score"
                            x-model="score"
                            class="w-full h-2 rounded-lg appearance-none cursor-pointer bg-neutral-200 accent-brand-500 focus:outline-hidden focus:ring-2 focus:ring-brand-500/30 dark:bg-neutral-800 [&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:w-5 [&::-webkit-slider-thumb]:h-5 [&::-webkit-slider-thumb]:rounded-full [&::-webkit-slider-thumb]:bg-brand-500 [&::-webkit-slider-thumb]:shadow-md [&::-webkit-slider-thumb]:border-2 [&::-webkit-slider-thumb]:border-white [&::-moz-range-thumb]:w-5 [&::-moz-range-thumb]:h-5 [&::-moz-range-thumb]:rounded-full [&::-moz-range-thumb]:bg-brand-500 [&::-moz-range-thumb]:border-2 [&::-moz-range-thumb]:border-white [&::-moz-range-thumb]:shadow-md transition-all" />
                    </div>

                    <div class="flex justify-between text-[10px] font-semibold text-neutral-400 mt-1.5 px-0.5">
                        <span>4.5</span>
                        <span>9.0</span>
                    </div>

                    <p class="mt-2 text-xs leading-relaxed text-neutral-400 flex items-start gap-1.5">
                        <svg class="w-3.5 h-3.5 text-neutral-400 shrink-0 translate-y-[2px]" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>PTE and TOEFL equivalencies calculated automatically on cards.</span>
                    </p>
                </div>

            </div>

            <hr class="border-neutral-100 dark:border-neutral-800" />

            <!-- Scholarship Toggle / Checkbox -->
            <div>
                <label
                    class="relative flex items-center justify-between p-3 rounded-xl border border-amber-200/60 bg-amber-50/30 dark:border-amber-900/40 dark:bg-amber-950/20 cursor-pointer select-none">
                    <span class="text-xs font-semibold text-neutral-800 dark:text-neutral-200">Scholarships available
                        only</span>
                    <input type="checkbox" name="scholarship" x-model="scholarship"
                        class="h-4 w-4 rounded border-neutral-300 text-brand-500 focus:ring-brand-500 cursor-pointer" />
                </label>
            </div>

            <!-- Guest CTA Banner -->
            <div
                class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-amber-50 via-orange-50 to-amber-100/60 dark:from-neutral-800 dark:via-neutral-800 dark:to-neutral-850 p-4 border border-amber-200/80 dark:border-neutral-700/60 shadow-xs">
                <div class="flex items-start gap-3">
                    <div class="rounded-lg bg-amber-500/10 p-1.5 text-amber-800 dark:text-amber-400 shrink-0">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <div class="flex flex-col gap-4 w-full">
                        <p class="text-xs font-medium leading-relaxed text-neutral-800 dark:text-neutral-200">
                            Save shortlists and receive personalized profile matches.
                        </p>
                        <a href="{{ route('register') }}"
                            class="flex items-center justify-center w-full rounded-xl bg-brand-500 py-2 px-3 text-xs font-bold text-white shadow-xs transition hover:bg-brand-600 active:scale-[0.99]">
                            Create Free Account
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</aside>
