@php
    $isEdit = isset($counsellor) && $counsellor;

    $selectedCountryId = old('country_id', $counsellor?->country_id);
    $selectedCityId = old('city_id', $counsellor?->city_id);

    $normalizeArrayInput = function ($value) {
        if (is_string($value)) {
            $value = explode(',', $value);
        }

        if (! is_array($value)) {
            return [''];
        }

        $value = array_values(array_filter(array_map(
            static fn ($item) => is_string($item) ? trim($item) : $item,
            $value
        ), static fn ($item) => filled($item)));

        return $value ?: [''];
    };

    $languages = $normalizeArrayInput(old('languages', $counsellor?->languages ?? []));
    $expertise = $normalizeArrayInput(old('expertise', $counsellor?->expertise ?? []));
@endphp

<div class="grid grid-cols-1 gap-6 lg:grid-cols-12" x-data="{
    countryId: @js($selectedCountryId),
    cityId: @js($selectedCityId),

    cities: @js(
    $cities
        ->map(function ($city) {
            return [
                'id' => $city->id,
                'name' => $city->name,
                'country_id' => $city->country_id,
            ];
        })
        ->values(),
),

    get filteredCities() {
        if (!this.countryId) {
            return [];
        }

        return this.cities.filter(
            city => String(city.country_id) === String(this.countryId)
        );
    },

    countryChanged() {
        const cityExists = this.filteredCities.some(
            city => String(city.id) === String(this.cityId)
        );

        if (!cityExists) {
            this.cityId = '';
        }
    }
}" x-init="countryChanged()">

    <div class="space-y-6 lg:col-span-8">

        {{-- Counsellor Information --}}
        <div class="rounded-2xl border border-neutral-200 bg-white dark:border-neutral-800 dark:bg-neutral-900">

            <div class="border-b border-neutral-100 p-5 dark:border-neutral-800">
                <h2 class="text-lg font-semibold text-neutral-800 dark:text-white">
                    Counsellor Information
                </h2>
            </div>

            <div class="space-y-5 p-5">

                {{-- Name / Email --}}
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                    <x-form.input-text name="name" label="Full Name" value="{{ old('name', $counsellor?->user?->name) }}"
                        placeholder="Enter Your Name..." />

                    <x-form.input-text name="email" label="Email Address"
                        value="{{ old('email', $counsellor?->user?->email) }}" placeholder="Enter Your Email..." />

                    <x-form.input-text name="phone" label="Phone" value="{{ old('phone', $counsellor?->user?->phone) }}"
                        placeholder="Enter Your Phone..." />

                    <x-form.input-text name="password" label="Password" type="password"
                        placeholder="{{ $isEdit ? 'Leave blank to keep current password' : 'Enter Your Password...' }}" />
                        

                </div>


                {{-- Designation / Experience --}}
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                    <x-form.input-text name="designation" label="Designation"
                        value="{{ old('designation', $counsellor?->designation) }}"
                        placeholder="e.g. Senior Counsellor" />

                    <x-form.input-text name="experience_years" label="Experience (Years)" type="number" min="0"
                        value="{{ old('experience_years', $counsellor?->experience_years ?? 0) }}" placeholder="0" />

                </div>


                {{-- Bio --}}
                <x-form.textarea-input name="bio" label="Bio" rows="5"
                    placeholder="Write counsellor bio..." value="{{ old('bio', $counsellor?->bio) }}" />


                {{-- Languages / Expertise --}}
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                    <div x-data="{
                        items: @js($languages),
                        add() {
                            this.items.push('');
                        },
                        remove(index) {
                            if (this.items.length === 1) {
                                this.items = [''];
                                return;
                            }

                            this.items.splice(index, 1);
                        }
                    }">
                        <div class="mb-2 flex items-center justify-between gap-3">
                            <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300">
                                Languages
                            </label>

                            <button type="button" @click="add()"
                                class="text-xs font-medium text-brand-600 hover:text-brand-700">
                                + Add Language
                            </button>
                        </div>

                        <div class="space-y-3">
                            <template x-for="(item, index) in items" :key="index">
                                <div class="flex items-center gap-3">
                                    <input
                                        type="text"
                                        name="languages[]"
                                        x-model="items[index]"
                                        placeholder="English"
                                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-neutral-300 bg-transparent px-4 py-2.5 text-sm text-neutral-800 placeholder:text-neutral-400 focus:ring-3 focus:outline-hidden dark:border-neutral-700 dark:bg-neutral-900 dark:text-white/90 dark:placeholder:text-white/30"
                                    >

                                    <button
                                        type="button"
                                        @click="remove(index)"
                                        class="inline-flex h-11 items-center justify-center rounded-lg border border-neutral-300 px-3 text-sm text-neutral-600 hover:bg-neutral-50 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800"
                                        title="Remove language"
                                    >
                                        Remove
                                    </button>
                                </div>
                            </template>
                        </div>

                        @error('languages')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                        @error('languages.*')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div x-data="{
                        items: @js($expertise),
                        add() {
                            this.items.push('');
                        },
                        remove(index) {
                            if (this.items.length === 1) {
                                this.items = [''];
                                return;
                            }

                            this.items.splice(index, 1);
                        }
                    }">
                        <div class="mb-2 flex items-center justify-between gap-3">
                            <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300">
                                Expertise
                            </label>

                            <button type="button" @click="add()"
                                class="text-xs font-medium text-brand-600 hover:text-brand-700">
                                + Add Expertise
                            </button>
                        </div>

                        <div class="space-y-3">
                            <template x-for="(item, index) in items" :key="index">
                                <div class="flex items-center gap-3">
                                    <input
                                        type="text"
                                        name="expertise[]"
                                        x-model="items[index]"
                                        placeholder="SOP Writing"
                                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-neutral-300 bg-transparent px-4 py-2.5 text-sm text-neutral-800 placeholder:text-neutral-400 focus:ring-3 focus:outline-hidden dark:border-neutral-700 dark:bg-neutral-900 dark:text-white/90 dark:placeholder:text-white/30"
                                    >

                                    <button
                                        type="button"
                                        @click="remove(index)"
                                        class="inline-flex h-11 items-center justify-center rounded-lg border border-neutral-300 px-3 text-sm text-neutral-600 hover:bg-neutral-50 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800"
                                        title="Remove expertise"
                                    >
                                        Remove
                                    </button>
                                </div>
                            </template>
                        </div>

                        @error('expertise')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                        @error('expertise.*')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                </div>


                {{-- Country / City --}}
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                    {{-- Country --}}
                    <div>
                        <label for="country_id" class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">
                            Country
                        </label>

                        <select id="country_id" name="country_id" x-model="countryId" @change="countryChanged()"
                            class="w-full rounded-lg border border-neutral-300 bg-white px-4 py-2.5 text-sm
                                   focus:border-brand-500 focus:ring-brand-500
                                   dark:border-neutral-700 dark:bg-neutral-800 dark:text-white">
                            <option value="">
                                Select Country
                            </option>

                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('country_id')
                            <p class="mt-1 text-sm text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    {{-- City --}}
                    <div>
                        <label for="city_id" class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">
                            City
                        </label>

                        <select id="city_id" name="city_id" x-model="cityId" :disabled="!countryId"
                            class="w-full rounded-lg border border-neutral-300 bg-white px-4 py-2.5 text-sm
                                   focus:border-brand-500 focus:ring-brand-500
                                   disabled:cursor-not-allowed disabled:bg-neutral-100
                                   focus:border-brand-500 focus:ring-brand-500
                                   dark:border-neutral-700 dark:bg-neutral-800 dark:text-white
                                   dark:disabled:bg-neutral-800">
                            <option value="">
                                Select City
                            </option>

                            <template x-for="city in filteredCities" :key="city.id">
                                <option :value="city.id" x-text="city.name"></option>
                            </template>
                        </select>

                        @error('city_id')
                            <p class="mt-1 text-sm text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>
                

            </div>
        </div>


        {{-- Counsellor Settings --}}
        <div class="rounded-2xl border border-neutral-200 bg-white dark:border-neutral-800 dark:bg-neutral-900">

            <div class="border-b border-neutral-100 p-5 dark:border-neutral-800">
                <h2 class="text-lg font-semibold text-neutral-800 dark:text-white">
                    Counsellor Settings
                </h2>
            </div>

            <div class="space-y-5 p-5">

                {{-- Active --}}
                <div class="flex items-center gap-3">

                    <input type="hidden" name="is_active" value="0">

                    <input type="checkbox" id="is_active" name="is_active" value="1" @checked(old('is_active', $counsellor?->is_active ?? true))
                        class="h-4 w-4 rounded border-neutral-300 text-brand-600 focus:ring-brand-500">

                    <label for="is_active" class="text-sm font-medium text-neutral-700 dark:text-neutral-300">
                        Active
                    </label>

                </div>


                {{-- Verified --}}
                <div class="flex items-center gap-3">

                    <input type="hidden" name="is_verified" value="0">

                    <input type="checkbox" id="is_verified" name="is_verified" value="1"
                        @checked(old('is_verified', $counsellor?->is_verified ?? false))
                        class="h-4 w-4 rounded border-neutral-300 text-brand-600 focus:ring-brand-500">

                    <label for="is_verified" class="text-sm font-medium text-neutral-700 dark:text-neutral-300">
                        Verified
                    </label>

                </div>


                {{-- Featured --}}
                <div class="flex items-center gap-3">

                    <input type="hidden" name="is_featured" value="0">

                    <input type="checkbox" id="is_featured" name="is_featured" value="1"
                        @checked(old('is_featured', $counsellor?->is_featured ?? false))
                        class="h-4 w-4 rounded border-neutral-300 text-brand-600 focus:ring-brand-500">

                    <label for="is_featured" class="text-sm font-medium text-neutral-700 dark:text-neutral-300">
                        Featured
                    </label>

                </div>

            </div>
        </div>

    </div>

</div>
