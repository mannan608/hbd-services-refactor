@php

    $isEdit = isset($course) && $course;

    /*
    |--------------------------------------------------------------------------
    | Entry Requirements
    |--------------------------------------------------------------------------
    */

    $entryRequirements = old('entry_requirements', $course?->entry_requirements ?? []);

    if (is_string($entryRequirements)) {
        $decodedRequirements = json_decode($entryRequirements, true);

        if (json_last_error() === JSON_ERROR_NONE && is_array($decodedRequirements)) {
            $entryRequirements = $decodedRequirements;
        } else {
            $entryRequirements = preg_split('/\r\n|\r|\n/', $entryRequirements) ?: [];
        }
    }

    if (!is_array($entryRequirements)) {
        $entryRequirements = [];
    }

    $entryRequirements = array_values(
        array_filter(
            array_map(static fn($requirement) => is_string($requirement) ? trim($requirement) : '', $entryRequirements),
            static fn($requirement) => $requirement !== '',
        ),
    );

    /*
    |--------------------------------------------------------------------------
    | Career Outcomes
    |--------------------------------------------------------------------------
    */

    $careerOutcomes = old('outcomes', $course?->outcomes ?? []);

    if (is_string($careerOutcomes)) {
        $decodedOutcomes = json_decode($careerOutcomes, true);

        if (json_last_error() === JSON_ERROR_NONE && is_array($decodedOutcomes)) {
            $careerOutcomes = $decodedOutcomes;
        } else {
            $careerOutcomes = preg_split('/\r\n|\r|\n/', $careerOutcomes) ?: [];
        }
    }

    if (!is_array($careerOutcomes)) {
        $careerOutcomes = [];
    }

    $careerOutcomes = array_values(
        array_filter(
            array_map(static fn($outcome) => is_string($outcome) ? trim($outcome) : '', $careerOutcomes),
            static fn($outcome) => $outcome !== '',
        ),
    );

    /*
    |--------------------------------------------------------------------------
    | Selected Campuses
    |--------------------------------------------------------------------------
    */

    $selectedCampusIds = old('campus_ids', $course?->campuses?->pluck('id')->toArray() ?? []);

    $selectedCampusIds = array_values(
        array_filter((array) $selectedCampusIds, static fn($id) => $id !== null && $id !== ''),
    );
@endphp


<div x-data="{
    universityId: @js(old('university_id', $course?->university_id)),

    campusIds: @js($selectedCampusIds),

    campuses: @js($campuses),

    entryRequirements: @js($entryRequirements),

    careerOutcomes: @js($careerOutcomes),


    /*
    |--------------------------------------------------------------------------
    | Get campuses for selected university
    |--------------------------------------------------------------------------
    */

    get filteredCampuses() {

        if (!this.universityId) {
            return [];
        }

        return this.campuses.filter(campus =>
            String(campus.university_id) ===
            String(this.universityId)
        );
    },


    /*
    |--------------------------------------------------------------------------
    | Convert campuses to multiselect options
    |--------------------------------------------------------------------------
    */

    get filteredCampusOptions() {

        return this.filteredCampuses.map(campus => ({
            id: campus.id,
            name: campus.name
        }));

    },


    /*
    |--------------------------------------------------------------------------
    | Update campus multiselect
    |--------------------------------------------------------------------------
    */

    updateCampusMultiSelect() {

        window.dispatchEvent(
            new CustomEvent('multi-select:update', {
                detail: {
                    id: 'course-campuses',
                    name: 'campus_ids',

                    options: this.filteredCampusOptions,

                    selected: this.campusIds
                }
            })
        );
    },


    /*
    |--------------------------------------------------------------------------
    | University Changed
    |--------------------------------------------------------------------------
    */

    universityChanged() {

        /*
         * Keep only campuses belonging
         * to the selected university.
         */
        const allowedCampusIds =
            this.filteredCampuses.map(campus =>
                String(campus.id)
            );


        this.campusIds =
            this.campusIds.filter(id =>
                allowedCampusIds.includes(String(id))
            );


        /*
         * Update existing multiselect component.
         */
        this.updateCampusMultiSelect();
    },


    /*
    |--------------------------------------------------------------------------
    | Initial Load
    |--------------------------------------------------------------------------
    */

    init() {

        /*
         * Convert IDs to strings so comparison
         * works consistently.
         */
        this.campusIds =
            this.campusIds.map(id => String(id));


        /*
         * Wait until the child multiselect
         * component is initialized.
         */
        this.$nextTick(() => {

            this.updateCampusMultiSelect();

        });


        /*
         * Listen for changes made inside
         * the multiselect component.
         */
        window.addEventListener(
            'multi-select:change',
            event => {

                const payload =
                    event.detail || {};


                if (
                    payload.id &&
                    payload.id !== 'course-campuses'
                ) {
                    return;
                }


                if (Array.isArray(payload.selected)) {

                    this.campusIds =
                        payload.selected.map(id =>
                            String(id)
                        );
                }

            }
        );

    }
}">


    <div class="grid grid-cols-1 gap-8 lg:grid-cols-12">


        {{-- =========================================================
             MAIN CONTENT
        ========================================================== --}}

        <div class="space-y-8 lg:col-span-8">


            {{-- =====================================================
                 COURSE INFORMATION
            ====================================================== --}}

            <div
                class="overflow-hidden rounded-2xl border border-neutral-200/80 bg-white shadow-xs dark:border-neutral-800 dark:bg-neutral-900">

                <div
                    class="border-b border-neutral-100 bg-neutral-50/50 px-6 py-4.5 dark:border-neutral-800 dark:bg-neutral-900/50">

                    <div class="flex items-center gap-3">

                        <div
                            class="flex h-9 w-9 items-center justify-center rounded-xl bg-brand-500/10 text-brand-600 dark:bg-brand-500/20 dark:text-brand-400">

                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l9-5-9-5-9 5 9 5z" />

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                            </svg>

                        </div>


                        <div>

                            <h2 class="text-base font-semibold text-neutral-900 dark:text-white">
                                Primary Course Details
                            </h2>

                            <p class="text-xs text-neutral-500 dark:text-neutral-400">
                                Specify institutional affiliation and basic course credentials.
                            </p>

                        </div>

                    </div>

                </div>


                <div class="space-y-6 p-6">


                    {{-- =================================================
                         UNIVERSITY + CAMPUS
                    ================================================== --}}

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">


                        {{-- University --}}
                        <div class="space-y-1.5">

                            <label
                                class="block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400">
                                University

                                <span class="text-red-500">*</span>
                            </label>


                            <div class="relative">

                                <select name="university_id" x-model="universityId" @change="universityChanged()"
                                    class="h-11 w-full appearance-none rounded-xl border border-neutral-200 bg-neutral-50/50 px-4 pr-10 text-sm font-medium text-neutral-800 transition-all focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-brand-500/10 dark:border-neutral-700/80 dark:bg-neutral-800/40 dark:text-neutral-100 dark:focus:border-brand-500 dark:focus:bg-neutral-900">

                                    <option value="">
                                        Select University
                                    </option>

                                    @foreach ($universities as $university)
                                        <option value="{{ $university->id }}">
                                            {{ $university->name }}
                                        </option>
                                    @endforeach

                                </select>

                            </div>


                            @error('university_id')
                                <p class="text-xs font-medium text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- =================================================
                             Campus
                        ================================================== --}}

                        <div>

                            {{-- KEEP YOUR ORIGINAL MULTI SELECT --}}
                            <x-form.multi-select name="campus_ids[]" label="Campuses" :options="$campusOptions"
                                :selected="$selectedCampusIds" placeholder="Select campuses..." id="course-campuses" />


                            @error('campus_ids')
                                <p class="mt-1 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror


                            @error('campus_ids.*')
                                <p class="mt-1 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>


                    {{-- =================================================
                         CATEGORY + DEGREE
                    ================================================== --}}

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">


                        {{-- Category --}}

                        <div class="space-y-1.5">

                            <label
                                class="block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400">
                                Course Category
                            </label>


                            <div class="relative">

                                <select name="category_id"
                                    class="h-11 w-full appearance-none rounded-xl border border-neutral-200 bg-neutral-50/50 px-4 pr-10 text-sm font-medium text-neutral-800 transition-all focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-brand-500/10 dark:border-neutral-700/80 dark:bg-neutral-800/40 dark:text-neutral-100 dark:focus:border-brand-500 dark:focus:bg-neutral-900">

                                    <option value="">
                                        Select Category
                                    </option>

                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @selected(old('category_id', $course?->category_id) == $category->id)>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach

                                </select>

                            </div>


                            @error('category_id')
                                <p class="text-xs font-medium text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Degree --}}

                        <div class="space-y-1.5">

                            <label
                                class="block text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-400">
                                Degree Level
                            </label>


                            <div class="relative">

                                <select name="degree_level"
                                    class="h-11 w-full appearance-none rounded-xl border border-neutral-200 bg-neutral-50/50 px-4 pr-10 text-sm font-medium text-neutral-800 transition-all focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-brand-500/10 dark:border-neutral-700/80 dark:bg-neutral-800/40 dark:text-neutral-100 dark:focus:border-brand-500 dark:focus:bg-neutral-900">

                                    <option value="">
                                        Select Degree Level
                                    </option>

                                    @foreach (['Diploma', 'Certificate', 'Bachelor', 'Master', 'PhD', 'Doctorate'] as $level)
                                        <option value="{{ $level }}" @selected(old('degree_level', $course?->degree_level) === $level)>
                                            {{ $level }}
                                        </option>
                                    @endforeach

                                </select>

                            </div>


                            @error('degree_level')
                                <p class="text-xs font-medium text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>


                    {{-- =================================================
                         TITLE + CODE
                    ================================================== --}}

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                        <x-form.input-text name="title" label="Course Title"
                            value="{{ old('title', $course?->title) }}"
                            placeholder="e.g. Master of Computer Science" />


                        <x-form.input-text name="code" label="Course Code" value="{{ old('code', $course?->code) }}"
                            placeholder="e.g. CS-501" />

                    </div>


                    {{-- =================================================
                         DURATION / TUITION / CURRENCY
                    ================================================== --}}

                    <div
                        class="rounded-xl border border-neutral-100 bg-neutral-50/40 p-4.5 dark:border-neutral-800/80 dark:bg-neutral-800/20">

                        <div class="grid grid-cols-1 gap-5 md:grid-cols-3">

                            <x-form.input-text name="duration_months" label="Duration (Months)"
                                value="{{ old('duration_months', $course?->duration_months) }}"
                                placeholder="e.g. 36" />


                            <x-form.input-text name="tuition_fee" label="Tuition Fee"
                                value="{{ old('tuition_fee', $course?->tuition_fee) }}" placeholder="e.g. 25000" />


                            <x-form.input-text name="currency" label="Currency"
                                value="{{ old('currency', $course?->currency ?? 'USD') }}" placeholder="USD" />

                        </div>

                    </div>


                    {{-- Overview --}}

                    <div>

                        <x-form.textarea-input name="overview" label="Course Overview" rows="5"
                            placeholder="Provide a detailed summary of the course curriculum and objectives..."
                            :value="old('overview', $course?->overview)" />

                    </div>

                </div>

            </div>


            {{-- =========================================================
                 ADMISSION REQUIREMENTS
            ========================================================== --}}

            <div
                class="overflow-hidden rounded-2xl border border-neutral-200/80 bg-white shadow-xs dark:border-neutral-800 dark:bg-neutral-900">

                <div
                    class="border-b border-neutral-100 bg-neutral-50/50 px-6 py-4.5 dark:border-neutral-800 dark:bg-neutral-900/50">

                    <div class="flex items-center gap-3">

                        <div
                            class="flex h-9 w-9 items-center justify-center rounded-xl bg-blue-500/10 text-blue-600 dark:bg-blue-500/20 dark:text-blue-400">

                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>

                        </div>


                        <div>

                            <h2 class="text-base font-semibold text-neutral-900 dark:text-white">
                                Admission & Proficiency Criteria
                            </h2>

                            <p class="text-xs text-neutral-500 dark:text-neutral-400">
                                Set academic and test prerequisites for applicants.
                            </p>

                        </div>

                    </div>

                </div>


                <div class="space-y-6 p-6">


                    {{-- English Requirements --}}

                    <div>

                        <h3
                            class="mb-3 text-xs font-semibold uppercase tracking-wider text-neutral-500 dark:text-neutral-400">
                            English Language Proficiency
                        </h3>


                        <div class="grid grid-cols-1 gap-5 md:grid-cols-3">

                            <x-form.input-text name="ielts_overall" label="IELTS Overall"
                                value="{{ old('ielts_overall', $course?->ielts_overall) }}" placeholder="e.g. 6.5" />


                            <x-form.input-text name="toefl_overall" label="TOEFL Overall"
                                value="{{ old('toefl_overall', $course?->toefl_overall) }}" placeholder="e.g. 80" />


                            <x-form.input-text name="pte_overall" label="PTE Overall"
                                value="{{ old('pte_overall', $course?->pte_overall) }}" placeholder="e.g. 58" />

                        </div>

                    </div>


                    <div class="border-t border-neutral-100 dark:border-neutral-800"></div>


                    {{-- GPA --}}

                    <div>

                        <x-form.input-text name="gpa_requirement" label="Minimum GPA Requirement"
                            value="{{ old('gpa_requirement', $course?->gpa_requirement) }}"
                            placeholder="e.g. 3.00" />

                    </div>


                    <div class="border-t border-neutral-100 dark:border-neutral-800"></div>


                    {{-- Entry Requirements --}}

                    <div>

                        <div class="mb-4 flex items-center justify-between gap-4">

                            <div>

                                <h3 class="text-sm font-semibold text-neutral-800 dark:text-white">
                                    Detailed Entry Requirements
                                </h3>

                                <p class="text-xs text-neutral-500 dark:text-neutral-400">
                                    Itemized list of general requirements for prospective students.
                                </p>

                            </div>


                            <button type="button"
                                class="inline-flex items-center gap-1.5 rounded-xl border border-brand-200 bg-brand-50/50 px-3.5 py-2 text-xs font-semibold text-brand-600 transition-colors hover:bg-brand-100 dark:border-brand-500/20 dark:bg-brand-500/10 dark:text-brand-300 dark:hover:bg-brand-500/20"
                                @click="entryRequirements.push('')">

                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>

                                Add Requirement

                            </button>

                        </div>


                        <div class="space-y-3">

                            <template x-for="(requirement, index) in entryRequirements" :key="index">

                                <div class="group flex items-center gap-3">

                                    <span
                                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-neutral-100 text-xs font-bold text-neutral-500 dark:bg-neutral-800 dark:text-neutral-400"
                                        x-text="index + 1"></span>


                                    <input type="text" name="entry_requirements[]"
                                        x-model="entryRequirements[index]"
                                        placeholder="e.g. Minimum 60% in previous qualification"
                                        class="h-11 w-full rounded-xl border border-neutral-200 bg-transparent px-4 text-sm text-neutral-800 placeholder:text-neutral-400 focus:border-brand-500 focus:outline-none focus:ring-4 focus:ring-brand-500/10 dark:border-neutral-700/80 dark:text-neutral-100 dark:placeholder:text-neutral-500" />


                                    <button type="button" @click="entryRequirements.splice(index, 1)"
                                        x-show="
                                            entryRequirements.length > 1 ||
                                            entryRequirements[index]
                                        "
                                        class="inline-flex h-11 shrink-0 items-center justify-center rounded-xl border border-neutral-200 px-3 text-neutral-400 transition-colors hover:border-red-200 hover:bg-red-50 hover:text-red-600 dark:border-neutral-700 dark:text-neutral-400 dark:hover:border-red-900/50 dark:hover:bg-red-900/20 dark:hover:text-red-400">

                                        <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>

                                    </button>

                                </div>

                            </template>

                        </div>


                        <template x-if="entryRequirements.length === 0">

                            <div
                                class="rounded-xl border border-dashed border-neutral-200 p-6 text-center text-xs text-neutral-400 dark:border-neutral-800">
                                No entry requirements added yet. Click "Add Requirement" to create one.
                            </div>

                        </template>

                    </div>

                </div>

            </div>


            {{-- =========================================================
                 CAREER OUTCOMES
            ========================================================== --}}

            <div
                class="overflow-hidden rounded-2xl border border-neutral-200/80 bg-white shadow-xs dark:border-neutral-800 dark:bg-neutral-900">

                <div
                    class="border-b border-neutral-100 bg-neutral-50/50 px-6 py-4.5 dark:border-neutral-800 dark:bg-neutral-900/50">

                    <div class="flex items-center gap-3">

                        <div
                            class="flex h-9 w-9 items-center justify-center rounded-xl bg-emerald-500/10 text-emerald-600 dark:bg-emerald-500/20 dark:text-emerald-400">

                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>

                        </div>


                        <div>

                            <h2 class="text-base font-semibold text-neutral-900 dark:text-white">
                                Career Opportunities
                            </h2>

                            <p class="text-xs text-neutral-500 dark:text-neutral-400">
                                List expected roles and professional pathways for graduates.
                            </p>

                        </div>

                    </div>

                </div>


                <div class="p-6">

                    <div class="mb-4 flex items-center justify-between gap-4">

                        <div>

                            <h3 class="text-sm font-semibold text-neutral-800 dark:text-white">
                                Key Outcomes
                            </h3>

                            <p class="text-xs text-neutral-500 dark:text-neutral-400">
                                Target career roles and industries post-completion.
                            </p>

                        </div>


                        <button type="button" @click="careerOutcomes.push('')"
                            class="inline-flex items-center gap-1.5 rounded-xl border border-brand-200 bg-brand-50/50 px-3.5 py-2 text-xs font-semibold text-brand-600 transition-colors hover:bg-brand-100 dark:border-brand-500/20 dark:bg-brand-500/10 dark:text-brand-300 dark:hover:bg-brand-500/20">

                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>

                            Add Outcome

                        </button>

                    </div>


                    <div class="space-y-3">

                        <template x-for="(outcome, index) in careerOutcomes" :key="index">

                            <div class="group flex items-center gap-3">

                                <span
                                    class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-neutral-100 text-xs font-bold text-neutral-500 dark:bg-neutral-800 dark:text-neutral-400"
                                    x-text="index + 1"></span>


                                <input type="text" name="outcomes[]" x-model="careerOutcomes[index]"
                                    placeholder="e.g. Senior Software Engineer"
                                    class="h-11 w-full rounded-xl border border-neutral-200 bg-transparent px-4 text-sm text-neutral-800 placeholder:text-neutral-400 focus:border-brand-500 focus:outline-none focus:ring-4 focus:ring-brand-500/10 dark:border-neutral-700/80 dark:text-neutral-100 dark:placeholder:text-neutral-500" />


                                <button type="button" @click="careerOutcomes.splice(index, 1)"
                                    x-show="
                                        careerOutcomes.length > 1 ||
                                        careerOutcomes[index]
                                    "
                                    class="inline-flex h-11 shrink-0 items-center justify-center rounded-xl border border-neutral-200 px-3 text-neutral-400 transition-colors hover:border-red-200 hover:bg-red-50 hover:text-red-600 dark:border-neutral-700 dark:text-neutral-400 dark:hover:border-red-900/50 dark:hover:bg-red-900/20 dark:hover:text-red-400">

                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 01-1 1v3M4 7h16" />
                                    </svg>

                                </button>

                            </div>

                        </template>

                    </div>


                    <template x-if="careerOutcomes.length === 0">

                        <div
                            class="rounded-xl border border-dashed border-neutral-200 p-6 text-center text-xs text-neutral-400 dark:border-neutral-800">
                            No career outcomes added yet. Click "Add Outcome" to create one.
                        </div>

                    </template>

                </div>

            </div>

        </div>



        {{-- =========================================================
             RIGHT SIDEBAR
        ========================================================== --}}

        <div class="space-y-6 lg:col-span-4">


            {{-- Visibility --}}

            <div
                class="overflow-hidden rounded-2xl border border-neutral-200/80 bg-white shadow-xs dark:border-neutral-800 dark:bg-neutral-900">

                <div
                    class="border-b border-neutral-100 bg-neutral-50/50 px-6 py-4 dark:border-neutral-800 dark:bg-neutral-900/50">

                    <h2 class="text-sm font-semibold text-neutral-900 dark:text-white">
                        Visibility & Flags
                    </h2>

                </div>


                <div class="space-y-3 p-6">


                    {{-- Active --}}

                    <label
                        class="flex cursor-pointer items-start justify-between gap-3 rounded-xl border border-neutral-200/80 p-3.5 transition-colors hover:bg-neutral-50 dark:border-neutral-800 dark:hover:bg-neutral-800/40">

                        <div class="space-y-0.5">

                            <span class="text-sm font-medium text-neutral-800 dark:text-neutral-200">
                                Active Status
                            </span>

                            <p class="text-xs text-neutral-500 dark:text-neutral-400">
                                Publish course on portal
                            </p>

                        </div>


                        <input type="hidden" name="is_active" value="0">


                        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $course?->is_active ?? true))
                            class="h-4 w-4 rounded border-neutral-300 text-brand-600 transition focus:ring-brand-500/20 dark:border-neutral-700 dark:bg-neutral-800">

                    </label>


                    {{-- Featured --}}

                    <label
                        class="flex cursor-pointer items-start justify-between gap-3 rounded-xl border border-neutral-200/80 p-3.5 transition-colors hover:bg-neutral-50 dark:border-neutral-800 dark:hover:bg-neutral-800/40">

                        <div class="space-y-0.5">

                            <span class="text-sm font-medium text-neutral-800 dark:text-neutral-200">
                                Featured Course
                            </span>

                            <p class="text-xs text-neutral-500 dark:text-neutral-400">
                                Promote on home page
                            </p>

                        </div>


                        <input type="hidden" name="is_featured" value="0">


                        <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $course?->is_featured ?? false))
                            class="h-4 w-4 rounded border-neutral-300 text-brand-600 transition focus:ring-brand-500/20 dark:border-neutral-700 dark:bg-neutral-800">

                    </label>


                    {{-- Scholarship --}}

                    <label
                        class="flex cursor-pointer items-start justify-between gap-3 rounded-xl border border-neutral-200/80 p-3.5 transition-colors hover:bg-neutral-50 dark:border-neutral-800 dark:hover:bg-neutral-800/40">

                        <div class="space-y-0.5">

                            <span class="text-sm font-medium text-neutral-800 dark:text-neutral-200">
                                Scholarship Available
                            </span>

                            <p class="text-xs text-neutral-500 dark:text-neutral-400">
                                Show financial aid tag
                            </p>

                        </div>


                        <input type="hidden" name="is_scholarship_available" value="0">


                        <input type="checkbox" name="is_scholarship_available" value="1"
                            @checked(old('is_scholarship_available', $course?->is_scholarship_available ?? false))
                            class="h-4 w-4 rounded border-neutral-300 text-brand-600 transition focus:ring-brand-500/20 dark:border-neutral-700 dark:bg-neutral-800">

                    </label>

                </div>

            </div>


            {{-- Save --}}

            <div
                class="sticky top-6 overflow-hidden rounded-2xl border border-neutral-200/80 bg-white p-6 shadow-xs dark:border-neutral-800 dark:bg-neutral-900">

                <button type="submit"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-brand-600 px-5 py-3 text-sm font-semibold text-white shadow-xs transition-all hover:bg-brand-700 focus:outline-none focus:ring-4 focus:ring-brand-500/20 dark:bg-brand-600 dark:hover:bg-brand-500">

                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>

                    {{ $isEdit ? 'Update Course' : 'Create Course' }}

                </button>

            </div>

        </div>

    </div>

</div>