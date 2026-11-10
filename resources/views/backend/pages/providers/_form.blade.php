

    @php

        /*
        |--------------------------------------------------------------------------
        | Form Mode
        |--------------------------------------------------------------------------
        */

        $isEdit = $formMode === 'edit' && $provider;


        /*
        |--------------------------------------------------------------------------
        | Existing / Old Values
        |--------------------------------------------------------------------------
        */

        $name = old('name', $provider?->user?->name);

        $shortName = old('short_name', $provider?->short_name);

        $email = old('email', $provider?->user?->email);

        $phone = old('phone', $provider?->phone);

        $countryId = old('country_id', $provider?->country_id);

        $cityId = old('city_id', $provider?->city_id);

        $state = old('state', $provider?->state);

        $address = old('address', $provider?->address);


        /*
        |--------------------------------------------------------------------------
        | Cities For Alpine
        |--------------------------------------------------------------------------
        */

        $citiesForJs = $cities
            ->map(fn($city) => [
                'id' => (string) $city->id,
                'name' => $city->name,
                'country_id' => (string) $city->country_id,
            ])
            ->values();

    @endphp


    <div
        x-data="providerForm({
            countryId: @js($countryId),
            cityId: @js($cityId),
            cities: @js($citiesForJs),
            formMode: @js($formMode),
        })"
        class="w-full"
    >

        <form
            action="{{ $isEdit
                ? role_route('role.providers.update', ['provider' => $provider->id])
                : role_route('role.providers.store') }}"
            method="POST"
            @submit="submitting = true"
        >

            @csrf

            @if ($isEdit)
                @method('PUT')
            @endif


            <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">

                <div class="space-y-6 lg:col-span-8">


                    {{-- =========================================================
                        PROVIDER INFORMATION
                    ========================================================== --}}

                    <div
                        class="rounded-2xl border border-neutral-200 bg-white dark:border-neutral-800 dark:bg-neutral-900">

                        <div class="border-b border-neutral-100 p-5 dark:border-neutral-800">

                            <h2 class="text-lg font-semibold text-neutral-800 dark:text-white">
                                Provider Information
                            </h2>

                            <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                                Enter the basic provider information.
                            </p>

                        </div>


                        <div class="space-y-5 p-5">

                            {{-- Name / Short Name --}}
                            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                                <x-form.input-text
                                    name="name"
                                    label="Provider Name"
                                    value="{{ $name }}"
                                    placeholder="Enter provider name..."
                                    required
                                />

                                <x-form.input-text
                                    name="short_name"
                                    label="Agency Name"
                                    value="{{ $shortName }}"
                                    placeholder="e.g. ABC Education..."
                                />

                            </div>


                            {{-- Email / Phone --}}
                            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                                <x-form.input-text
                                    name="email"
                                    label="Email Address"
                                    type="email"
                                    value="{{ $email }}"
                                    placeholder="Enter contact email..."
                                    required
                                />

                                <x-form.input-text
                                    name="phone"
                                    label="Phone Number"
                                    value="{{ $phone }}"
                                    placeholder="Enter contact phone..."
                                />

                            </div>

                        </div>

                    </div>


                    {{-- =========================================================
                        LOCATION
                    ========================================================== --}}

                    <div
                        class="rounded-2xl border border-neutral-200 bg-white dark:border-neutral-800 dark:bg-neutral-900">

                        <div class="border-b border-neutral-100 p-5 dark:border-neutral-800">

                            <h2 class="text-lg font-semibold text-neutral-800 dark:text-white">
                                Location
                            </h2>

                            <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                                Select the provider location.
                            </p>

                        </div>


                        <div class="space-y-5 p-5">

                            <div class="grid grid-cols-1 gap-5 md:grid-cols-3">


                                {{-- Country --}}
                                <div>

                                    <label
                                        for="country_id"
                                        class="mb-1.5 block text-sm font-medium text-neutral-700 dark:text-neutral-300"
                                    >
                                        Country
                                    </label>


                                    <select
                                        name="country_id"
                                        id="country_id"
                                        x-model="countryId"
                                        class="h-11 w-full rounded-lg border border-neutral-300 bg-white px-4 text-sm text-neutral-800 outline-none transition focus:border-brand-500 focus:ring-2 focus:ring-brand-500/10 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white"
                                    >

                                        <option value="">
                                            Select Country
                                        </option>


                                        @foreach ($countries as $country)

                                            <option
                                                value="{{ $country->id }}"
                                                @selected((string) $countryId === (string) $country->id)
                                            >
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

                                    <label
                                        for="city_id"
                                        class="mb-1.5 block text-sm font-medium text-neutral-700 dark:text-neutral-300"
                                    >
                                        City
                                    </label>


                                    <select
                                        name="city_id"
                                        id="city_id"
                                        x-model="cityId"
                                        :disabled="!countryId"
                                        class="h-11 w-full rounded-lg border border-neutral-300 bg-white px-4 text-sm text-neutral-800 outline-none transition focus:border-brand-500 focus:ring-2 focus:ring-brand-500/10 disabled:cursor-not-allowed disabled:bg-neutral-100 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white"
                                    >

                                        <option
                                            value=""
                                            x-text="countryId ? 'Select City' : 'Select Country First'"
                                        ></option>


                                        <template
                                            x-for="city in filteredCities"
                                            :key="city.id"
                                        >

                                            <option
                                                :value="city.id"
                                                x-text="city.name"
                                            ></option>

                                        </template>

                                    </select>


                                    @error('city_id')

                                        <p class="mt-1 text-xs text-red-500">
                                            {{ $message }}
                                        </p>

                                    @enderror

                                </div>


                                {{-- State --}}
                                <x-form.input-text
                                    name="state"
                                    label="State / Province"
                                    value="{{ $state }}"
                                    placeholder="Enter state or province..."
                                />

                            </div>


                            {{-- Address --}}
                            <x-form.textarea-input
                                name="address"
                                label="Full Address"
                                rows="3"
                                placeholder="Enter full address..."
                                :value="$address"
                            />

                        </div>

                    </div>


                    {{-- =========================================================
                        PASSWORD & SECURITY
                    ========================================================== --}}

                    <div
                        class="rounded-2xl border border-neutral-200 bg-white dark:border-neutral-800 dark:bg-neutral-900">

                        <div class="border-b border-neutral-100 p-5 dark:border-neutral-800">

                            <h2 class="text-lg font-semibold text-neutral-800 dark:text-white">
                                Password & Security
                            </h2>

                        </div>


                        <div class="space-y-5 p-5">

                            @if ($isEdit)

                                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                                    Leave the password fields empty if you do not want to change the current password.
                                </p>

                            @endif


                            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                                <x-form.input-text
                                    name="password"
                                    label="{{ $isEdit ? 'New Password' : 'Password' }}"
                                    type="password"
                                    placeholder="{{ $isEdit ? 'Enter new password...' : 'Enter password...' }}"
                                    :required="!$isEdit"
                                />


                                <x-form.input-text
                                    name="password_confirmation"
                                    label="{{ $isEdit ? 'Confirm New Password' : 'Confirm Password' }}"
                                    type="password"
                                    placeholder="{{ $isEdit ? 'Confirm new password...' : 'Confirm password...' }}"
                                    :required="!$isEdit"
                                />

                            </div>

                        </div>

                    </div>


                    {{-- =========================================================
                        SUBMIT
                    ========================================================== --}}

                    <div>

                        <button
                            type="submit"
                            :disabled="submitting"
                            class="flex w-full items-center justify-center gap-2 rounded-lg bg-brand-600 px-4 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-brand-500 disabled:cursor-not-allowed disabled:opacity-70"
                        >

                            <span
                                x-text="submitting
                                    ? (formMode === 'edit'
                                        ? 'Updating Provider...'
                                        : 'Creating Provider...')
                                    : (formMode === 'edit'
                                        ? 'Update Provider'
                                        : 'Create Provider')"
                            ></span>

                        </button>

                    </div>

                </div>

            </div>

        </form>


        {{-- ================================================================
            ALPINE.JS
        ================================================================= --}}

        <script>

            function providerForm(config) {

                return {

                    /*
                    |--------------------------------------------------------------------------
                    | Form State
                    |--------------------------------------------------------------------------
                    */

                    countryId: config.countryId ?? '',

                    cityId: config.cityId ?? '',

                    cities: Array.isArray(config.cities)
                        ? config.cities
                        : [],

                    formMode: config.formMode ?? 'create',

                    submitting: false,


                    /*
                    |--------------------------------------------------------------------------
                    | City Filtering
                    |--------------------------------------------------------------------------
                    */

                    get filteredCities() {

                        if (!this.countryId) {
                            return [];
                        }

                        return this.cities.filter((city) => {

                            return String(city.country_id) === String(this.countryId);

                        });

                    },


                    /*
                    |--------------------------------------------------------------------------
                    | Initialize
                    |--------------------------------------------------------------------------
                    */

                    init() {

                        this.syncCitySelection();

                        this.$watch('countryId', () => {

                            this.syncCitySelection();

                        });

                    },


                    /*
                    |--------------------------------------------------------------------------
                    | Keep City Valid
                    |--------------------------------------------------------------------------
                    */

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

                    }

                };

            }

        </script>

    </div>