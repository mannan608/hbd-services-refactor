  <div
        class="overflow-hidden rounded-2xl border border-neutral-200/80 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900">
        <div
            class="border-b border-neutral-100 bg-neutral-50/50 px-6 py-4 dark:border-neutral-800 dark:bg-neutral-800/50">
            <h2 class="text-base font-semibold text-neutral-900 dark:text-white">
                Professional Background
            </h2>
            <p class="text-xs text-neutral-500 dark:text-neutral-400">Experience levels, education, languages, and core
                competencies.</p>
        </div>

        <div class="p-6 space-y-6">
            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                <x-form.input-text name="experience_years" label="Experience (Years)" type="number" min="0"
                    value="{{ old('experience_years', $employee?->experience_years ?? 0) }}" placeholder="0" />

                <x-form.input-text name="institution" label="Institution / University"
                    value="{{ old('institution', $employee?->institution) }}"
                    placeholder="Last attended institution" />
            </div>

            <x-form.textarea-input name="education" label="Education Details" rows="2"
                placeholder="Degrees and certifications summary..."
                value="{{ old('education', $employee?->education) }}" />

            <x-form.textarea-input name="bio" label="Professional Bio" rows="3"
                placeholder="Brief summary about the employee..." value="{{ old('bio', $employee?->bio) }}" />

            {{-- Languages & Expertise dynamic lists --}}
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 pt-2">

                {{-- Languages --}}
                <div x-data="{
                    items: @js($languages),
                    add() { this.items.push(''); },
                    remove(index) {
                        if (this.items.length === 1) { this.items = ['']; return; }
                        this.items.splice(index, 1);
                    }
                }"
                    class="rounded-xl border border-neutral-200 p-4 dark:border-neutral-800 bg-neutral-50/30 dark:bg-neutral-900/50">
                    <div class="mb-3 flex items-center justify-between">
                        <label
                            class="block text-sm font-medium text-neutral-700 dark:text-neutral-300">Languages</label>
                        <button type="button" @click="add()"
                            class="inline-flex items-center gap-1 rounded-lg bg-brand-50 px-2.5 py-1.5 text-xs font-semibold text-brand-700 transition hover:bg-brand-100 dark:bg-brand-500/10 dark:text-brand-300">
                            <span>+ Add Language</span>
                        </button>
                    </div>

                    <div class="space-y-2.5">
                        <template x-for="(item, index) in items" :key="index">
                            <div class="flex items-center gap-2">
                                <input type="text" name="languages[]" x-model="items[index]"
                                    placeholder="e.g. English, Spanish"
                                    class="h-10 w-full placeholder:text-slate-400 rounded-lg border border-neutral-300 bg-white px-3 text-sm text-neutral-800 shadow-sm focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/10 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white">
                                <button type="button" @click="remove(index)" title="Remove"
                                    class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-lg border border-red-200 text-red-500 transition hover:bg-red-50 dark:border-red-900/50 dark:hover:bg-red-500/10">
                                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </template>
                    </div>
                    @error('languages')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                    @error('languages.*')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Expertise --}}
                <div x-data="{
                    items: @js($expertise),
                    add() { this.items.push(''); },
                    remove(index) {
                        if (this.items.length === 1) { this.items = ['']; return; }
                        this.items.splice(index, 1);
                    }
                }"
                    class="rounded-xl border border-neutral-200 p-4 dark:border-neutral-800 bg-neutral-50/30 dark:bg-neutral-900/50">
                    <div class="mb-3 flex items-center justify-between">
                        <label
                            class="block text-sm font-medium text-neutral-700 dark:text-neutral-300">Expertise</label>
                        <button type="button" @click="add()"
                            class="inline-flex items-center gap-1 rounded-lg bg-brand-50 px-2.5 py-1.5 text-xs font-semibold text-brand-700 transition hover:bg-brand-100 dark:bg-brand-500/10 dark:text-brand-300">
                            <span>+ Add Expertise</span>
                        </button>
                    </div>

                    <div class="space-y-2.5">
                        <template x-for="(item, index) in items" :key="index">
                            <div class="flex items-center gap-2">
                                <input type="text" name="expertise[]" x-model="items[index]"
                                    placeholder="e.g. Project Management"
                                    class="h-10 w-full placeholder:text-slate-400 rounded-lg border border-neutral-300 bg-white px-3 text-sm text-neutral-800 shadow-sm focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/10 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white">
                                <button type="button" @click="remove(index)" title="Remove"
                                    class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-lg border border-red-200 text-red-500 transition hover:bg-red-50 dark:border-red-900/50 dark:hover:bg-red-500/10">
                                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </template>
                    </div>
                    @error('expertise')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                    @error('expertise.*')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </div>
    </div>