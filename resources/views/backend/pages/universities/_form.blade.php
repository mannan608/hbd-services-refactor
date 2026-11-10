@php
    $isEdit = $formMode === 'edit' && $university;

    /*
    |--------------------------------------------------------------------------
    | Old input takes priority after validation error.
    | Otherwise use existing university data for edit.
    |--------------------------------------------------------------------------
    */

    $name = old('name', $university?->name);
    $shortName = old('short_name', $university?->short_name);

    $email = old('email', $university?->email);
    $phone = old('phone', $university?->phone);
    $website = old('website', $university?->website);
    $tag = old('tag', $university?->tag);

    $accreditation = old('accreditation', $university?->accreditation);

    $overview = old('overview', $university?->overview);

    $description = old('description', $university?->description);

    $countryId = old('country_id', $university?->country_id);

    $cityId = old('city_id', $university?->city_id);

    $state = old('state', $university?->state);

    $address = old('address', $university?->address);

    $globalRanking = old('global_ranking', $university?->global_ranking);

    $nationalRanking = old('national_ranking', $university?->national_ranking);
    $google_map_link = old('google_map_link', $university?->google_map_link);

    $isFeatured = old('is_featured', $university?->is_featured ?? false);

    $isActive = old('is_active', $university?->is_active ?? true);

    $sortOrder = old('sort_order', $university?->sort_order ?? 0);

    /*
    |--------------------------------------------------------------------------
    | Campus facilities
    |--------------------------------------------------------------------------
    */

    $oldFacilities = old('campus_facilities');

    if ($oldFacilities !== null) {
        $facilities = $oldFacilities;
    } elseif ($university?->campus_facilities) {
        $facilities = $university->campus_facilities;
    } else {
        $facilities = [''];
    }

    $citiesForJs = $cities
        ->map(
            fn($city) => [
                'id' => (string) $city->id,
                'name' => $city->name,
                'country_id' => (string) $city->country_id,
            ],
        )
        ->values();
@endphp


<div x-data="universityForm({
    countryId: @js($countryId),
    cityId: @js($cityId),
    cities: @js($citiesForJs),
    facilities: @js($facilities),
    isFeatured: @js((bool) $isFeatured),
    isActive: @js((bool) $isActive),
    formMode: @js($formMode),
})" class="w-full">

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">


        {{-- =========================================================
            LEFT SIDE
        ========================================================== --}}
        <div class="space-y-6 lg:col-span-8">


            {{-- =====================================================
                UNIVERSITY INFORMATION
            ====================================================== --}}
            <div class="rounded-2xl border border-neutral-200 bg-white dark:border-neutral-800 dark:bg-neutral-900">

                <div class="border-b border-neutral-100 p-5 dark:border-neutral-800">

                    <h2 class="text-lg font-semibold text-neutral-800 dark:text-white">
                        University Information
                    </h2>

                    <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                        Enter the basic information of the university.
                    </p>

                </div>


                <div class="space-y-5 p-5">


                    {{-- Name / Short Name --}}
                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                        <x-form.input-text name="name" label="University Name" value="{{ $name }}"
                            placeholder="Enter university name..." />

                        <x-form.input-text name="short_name" label="Short Name" value="{{ $shortName }}"
                            placeholder="e.g. MIT, Harvard..." />

                    </div>


                    {{-- Email / Phone --}}
                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                        <x-form.input-text name="email" label="Email Address" type="email"
                            value="{{ $email }}" placeholder="Enter contact email..." />                        

                        <x-form.input-text name="phone" label="Phone Number" value="{{ $phone }}"
                            placeholder="Enter contact phone..." />

                        {{-- Website --}}
                        <x-form.input-text name="website" label="Website URL" type="url" value="{{ $website }}"
                            placeholder="https://..." />


                        {{-- Accreditation --}}
                        <x-form.input-text name="accreditation" label="Accreditation" value="{{ $accreditation }}"
                            placeholder="e.g. UGC, ABET, AACSB..." />

                    </div>
                    {{-- Overview --}}
                    <x-form.textarea-input name="overview" label="Overview" rows="5"
                        placeholder="Enter university overview..." :value="$overview" />


                    {{-- Description --}}
                    <x-form.textarea-input name="description" label="Description" rows="5"
                        placeholder="Enter university description..." :value="$description" />

                </div>

            </div>



            {{-- =====================================================
                LOCATION
            ====================================================== --}}
            <div class="rounded-2xl border border-neutral-200 bg-white dark:border-neutral-800 dark:bg-neutral-900">

                <div class="border-b border-neutral-100 p-5 dark:border-neutral-800">

                    <h2 class="text-lg font-semibold text-neutral-800 dark:text-white">
                        Location
                    </h2>

                    <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                        Select the university location.
                    </p>

                </div>


                <div class="space-y-5 p-5">


                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">


                        {{-- Country --}}
                        <div>

                            <label for="country_id"
                                class="mb-1.5 block text-sm font-medium text-neutral-700 dark:text-neutral-300">
                                Country
                            </label>

                            <select name="country_id" id="country_id" x-model="countryId"
                                class="h-11 w-full rounded-lg border border-neutral-300 bg-white px-4 text-sm text-neutral-800 outline-none transition focus:border-brand-500 focus:ring-2 focus:ring-brand-500/10 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white">

                                <option value="">
                                    Select Country
                                </option>

                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" @selected((string) $countryId === (string) $country->id)>
                                        {{ $country->name }}
                                    </option>
                                @endforeach

                            </select>

                            @error('country_id')
                                <p class="mt-1 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- City --}}
                        <div>

                            <label for="city_id"
                                class="mb-1.5 block text-sm font-medium text-neutral-700 dark:text-neutral-300">
                                City
                            </label>

                            <select name="city_id" id="city_id" x-model="cityId" :disabled="!countryId"
                                class="h-11 w-full rounded-lg border border-neutral-300 bg-white px-4 text-sm text-neutral-800 outline-none transition focus:border-brand-500 focus:ring-2 focus:ring-brand-500/10 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white">

                                <option value="" x-text="countryId ? 'Select City' : 'Select Country First'">
                                </option>

                                <template x-for="city in filteredCities" :key="city.id">
                                    <option :value="city.id" x-text="city.name"></option>
                                </template>

                            </select>

                            @error('city_id')
                                <p class="mt-1 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        {{-- State --}}
                        <x-form.input-text name="state" label="State / Province" value="{{ $state }}"
                            placeholder="Enter state or province..." />

                        <x-form.input-text name="google_map_link" label="Google Map Link"
                            placeholder="https://maps.google.com/..." value="{{ $google_map_link }}" />

                    </div>





                    {{-- Address --}}
                    <x-form.textarea-input name="address" label="Full Address" rows="2"
                        placeholder="Enter full address..." :value="$address" />

                </div>

            </div>



            {{-- =====================================================
                RANKING
            ====================================================== --}}
            <div class="rounded-2xl border border-neutral-200 bg-white dark:border-neutral-800 dark:bg-neutral-900">

                <div class="border-b border-neutral-100 p-5 dark:border-neutral-800">

                    <h2 class="text-lg font-semibold text-neutral-800 dark:text-white">
                        University Ranking
                    </h2>

                    <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                        Enter the university rankings.
                    </p>

                </div>


                <div class="grid grid-cols-1 gap-5 p-5 md:grid-cols-3">

                    <x-form.input-text name="global_ranking" label="Global Ranking" type="number"
                        value="{{ $globalRanking }}" placeholder="e.g. 3" />

                    <x-form.input-text name="national_ranking" label="National Ranking" type="number"
                        value="{{ $nationalRanking }}" placeholder="e.g. 3" />

                    <x-form.select-input name="tag" label="University Type" :options="[
                        'public' => 'Public',
                        'private' => 'Private',
                    ]" :value="old('tag', $university?->tag ?? '')" />


                </div>

            </div>



            {{-- =====================================================
                CAMPUS FACILITIES
            ====================================================== --}}
            <div class="rounded-2xl border border-neutral-200 bg-white dark:border-neutral-800 dark:bg-neutral-900">

                <div class="border-b border-neutral-100 p-5 dark:border-neutral-800">

                    <div class="flex items-center justify-between">

                        <div>

                            <h2 class="text-lg font-semibold text-neutral-800 dark:text-white">
                                Campus Facilities
                            </h2>

                            <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                                Add facilities available at the university.
                            </p>

                        </div>

                        <span
                            class="rounded-full bg-brand-50 px-3 py-1 text-xs font-medium text-brand-600 dark:bg-brand-900/20 dark:text-brand-400"
                            x-text="facilities.length + ' item' + (facilities.length > 1 ? 's' : '')"></span>

                    </div>

                </div>


                <div class="p-5">

                    <div class="space-y-3">

                        <template x-for="(facility, index) in facilities" :key="index">

                            <div class="flex items-center gap-3">

                                <input type="text" name="campus_facilities[]" x-model="facilities[index]"
                                    :placeholder="'Facility ' + (index + 1) + ' e.g. Central Library'"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-neutral-300 bg-transparent px-4 py-2.5 text-sm text-neutral-800 placeholder:text-neutral-400 focus:ring-3 focus:outline-hidden dark:border-neutral-700 dark:bg-neutral-900 dark:text-white/90 dark:placeholde">


                                <button type="button" x-show="facilities.length > 1" @click="removeFacility(index)"
                                    class="inline-flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-lg border border-red-200 text-red-500 transition hover:bg-red-50 dark:border-red-900 dark:hover:bg-red-900/20"
                                    title="Remove facility">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 01-1 1v3m-4 0h14" />
                                    </svg>

                                </button>

                            </div>

                        </template>

                    </div>


                    <button type="button" @click="addFacility()"
                        class="mt-4 inline-flex items-center gap-2 rounded-lg border border-brand-200 px-4 py-2.5 text-sm font-medium text-brand-600 transition hover:bg-brand-50 dark:border-brand-900 dark:hover:bg-brand-900/20">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4v16m8-8H4" />
                        </svg>

                        Add Facility

                    </button>


                    @error('campus_facilities')
                        <p class="mt-2 text-xs text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                    @error('campus_facilities.*')
                        <p class="mt-2 text-xs text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

            </div>

        </div>



        {{-- =========================================================
            RIGHT SIDE
        ========================================================== --}}
        <div class="lg:col-span-4">

            <div class="space-y-6">


                {{-- =================================================
                    LOGO
                ================================================== --}}
                <div
                    class="rounded-2xl border border-neutral-200 bg-white dark:border-neutral-800 dark:bg-neutral-900">

                    <div class="border-b border-neutral-100 p-5 dark:border-neutral-800">

                        <h2 class="text-lg font-semibold text-neutral-800 dark:text-white">
                            University Logo
                        </h2>

                        <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                            {{ $isEdit ? 'Upload a new logo to replace the current logo.' : 'Upload university logo.' }}
                        </p>

                    </div>


                    <div class="p-5">
                        {{-- KEEP YOUR EXISTING DROPZONE COMPONENT --}}
                        <x-form.dropzone name="logo" label="{{ $isEdit ? 'Upload New Logo' : 'Upload Logo' }}" />

                        @if ($isEdit && $university->logo)
                            <div class="mb-4">

                                <p class="mb-2 text-xs font-medium text-neutral-500 dark:text-neutral-400">
                                    Current Logo
                                </p>

                                <img src="{{ asset($university->logo) }}" alt="{{ $university->name }}"
                                    class="h-24 w-24 rounded-xl border border-neutral-200 object-contain dark:border-neutral-700">

                            </div>
                        @endif
                        @error('logo')
                            <p class="mt-2 text-xs text-red-500">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>



                {{-- =================================================
                    BANNER
                ================================================== --}}
                <div
                    class="rounded-2xl border border-neutral-200 bg-white dark:border-neutral-800 dark:bg-neutral-900">

                    <div class="border-b border-neutral-100 p-5 dark:border-neutral-800">

                        <h2 class="text-lg font-semibold text-neutral-800 dark:text-white">
                            University Banner
                        </h2>

                        <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                            {{ $isEdit ? 'Upload a new banner to replace the current banner.' : 'Upload university banner.' }}
                        </p>

                    </div>


                    <div class="p-5">
                        {{-- KEEP YOUR EXISTING DROPZONE COMPONENT --}}
                        <x-form.dropzone name="banner"
                            label="{{ $isEdit ? 'Upload New Banner' : 'Upload Banner' }}" />
                        @if ($isEdit && $university->banner)
                            <div class="mb-4">

                                <p class="mb-2 text-xs font-medium text-neutral-500 dark:text-neutral-400">
                                    Current Banner
                                </p>

                                <img src="{{ asset($university->banner) }}" alt="{{ $university->name }}"
                                    class="h-32 w-full rounded-xl border border-neutral-200 object-cover dark:border-neutral-700">

                            </div>
                        @endif
                        @error('banner')
                            <p class="mt-2 text-xs text-red-500">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>



                {{-- =================================================
                    STATUS
                ================================================== --}}
                <div
                    class="rounded-2xl border border-neutral-200 bg-white dark:border-neutral-800 dark:bg-neutral-900">

                    <div class="border-b border-neutral-100 p-5 dark:border-neutral-800">

                        <h2 class="text-lg font-semibold text-neutral-800 dark:text-white">
                            Status & Ordering
                        </h2>

                    </div>


                    <div class="space-y-5 p-5">


                        {{-- Featured --}}
                        <div class="flex items-center justify-between">

                            <div>

                                <label for="is_featured" class="text-sm font-medium text-neutral-800 dark:text-white">
                                    Featured University
                                </label>

                                <p class="mt-0.5 text-xs text-neutral-500 dark:text-neutral-400">
                                    Show this university as featured.
                                </p>

                            </div>


                            <label class="relative inline-flex cursor-pointer items-center">

                                <input type="hidden" name="is_featured" value="0">

                                <input type="checkbox" name="is_featured" id="is_featured" value="1"
                                    x-model="isFeatured" class="peer sr-only">

                                <div
                                    class="h-6 w-11 rounded-full bg-neutral-200
                                    after:absolute after:left-[2px] after:top-[2px]
                                    after:h-5 after:w-5 after:rounded-full
                                    after:border after:border-neutral-300 after:bg-white
                                    after:transition-all
                                    peer-checked:bg-brand-600
                                    peer-checked:after:translate-x-full
                                    peer-checked:after:border-white
                                    dark:bg-neutral-700">
                                </div>

                            </label>

                        </div>



                        {{-- Active --}}
                        <div class="flex items-center justify-between">

                            <div>

                                <label for="is_active" class="text-sm font-medium text-neutral-800 dark:text-white">
                                    Active
                                </label>

                                <p class="mt-0.5 text-xs text-neutral-500 dark:text-neutral-400">
                                    Enable this university.
                                </p>

                            </div>


                            <label class="relative inline-flex cursor-pointer items-center">

                                <input type="hidden" name="is_active" value="0">

                                <input type="checkbox" name="is_active" id="is_active" value="1"
                                    x-model="isActive" class="peer sr-only">

                                <div
                                    class="h-6 w-11 rounded-full bg-neutral-200
                                    after:absolute after:left-[2px] after:top-[2px]
                                    after:h-5 after:w-5 after:rounded-full
                                    after:border after:border-neutral-300 after:bg-white
                                    after:transition-all
                                    peer-checked:bg-brand-600
                                    peer-checked:after:translate-x-full
                                    peer-checked:after:border-white
                                    dark:bg-neutral-700">
                                </div>

                            </label>

                        </div>



                        {{-- Sort Order --}}
                        <x-form.input-text name="sort_order" label="Sort Order" type="number"
                            value="{{ $sortOrder }}" placeholder="0" />

                    </div>

                </div>



                {{-- =================================================
                    SUBMIT
                ================================================== --}}
                <div>

                    <button type="submit" :disabled="submitting"
                        class="flex w-full items-center justify-center gap-2 rounded-lg bg-brand-600 px-4 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-brand-500 disabled:cursor-not-allowed disabled:opacity-70">

                        <span
                            x-text="submitting
                                ? (formMode === 'edit'
                                    ? 'Updating University...'
                                    : 'Creating University...')
                                : (formMode === 'edit'
                                    ? 'Update University'
                                    : 'Create University')"></span>

                    </button>

                </div>

            </div>

        </div>


    </div>


    {{-- ================================================================
        ALPINE.JS
    ================================================================= --}}
    <script>
        function universityForm(config) {

            return {

                /*
                |--------------------------------------------------------------------------
                | Form state
                |--------------------------------------------------------------------------
                */

                countryId: config.countryId ?? '',

                cityId: config.cityId ?? '',

                cities: Array.isArray(config.cities) ? config.cities : [],

                facilities: Array.isArray(config.facilities) &&
                    config.facilities.length ?
                    config.facilities : [''],

                isFeatured: Boolean(config.isFeatured),

                isActive: Boolean(config.isActive),

                formMode: config.formMode ?? 'create',

                submitting: false,


                /*
                |----------------------------------------------------------------------
                | City filtering
                |----------------------------------------------------------------------
                */

                get filteredCities() {
                    if (!this.countryId) {
                        return [];
                    }

                    return this.cities.filter((city) => {
                        return String(city.country_id) === String(this.countryId);
                    });
                },

                init() {
                    this.syncCitySelection();

                    this.$watch('countryId', () => {
                        this.syncCitySelection();
                    });
                },

                syncCitySelection() {
                    if (!this.cityId) {
                        return;
                    }

                    const matched = this.filteredCities.some((city) => {
                        return String(city.id) === String(this.cityId);
                    });

                    if (!matched) {
                        this.cityId = '';
                    }
                },


                /*
                |--------------------------------------------------------------------------
                | Add facility
                |--------------------------------------------------------------------------
                */

                addFacility() {

                    this.facilities.push('');

                    this.$nextTick(() => {

                        const inputs = this.$el.querySelectorAll(
                            'input[name="campus_facilities[]"]'
                        );

                        if (inputs.length) {
                            inputs[inputs.length - 1].focus();
                        }

                    });

                },


                /*
                |--------------------------------------------------------------------------
                | Remove facility
                |--------------------------------------------------------------------------
                */

                removeFacility(index) {

                    if (this.facilities.length <= 1) {
                        return;
                    }

                    this.facilities.splice(index, 1);

                }

            };

        }
    </script>

</div>
