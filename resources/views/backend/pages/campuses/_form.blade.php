@php
    $isEdit = isset($campus) && $campus;
@endphp

<div class="grid grid-cols-1 gap-6 lg:grid-cols-12">

    <div class="space-y-6 lg:col-span-8">

        {{-- Campus Information --}}
        <div class="rounded-2xl border border-neutral-200 bg-white dark:border-neutral-800 dark:bg-neutral-900">

            <div class="border-b border-neutral-100 p-5 dark:border-neutral-800">
                <h2 class="text-lg font-semibold text-neutral-800 dark:text-white">
                    Campus Information
                </h2>
            </div>

            <div class="space-y-5 p-5">

                <div x-data="campusLocation({
                    initialUniversityId: @js(old('university_id', $campus?->university_id)),
                    initialCityId: @js(old('city_id', $campus?->city_id)),
                    citiesUrl: @js(role_route('role.campuses.cities'))
                })" x-init="init()" class="space-y-5">

                    {{-- University --}}
                    <div>
                        <label for="university_id"
                            class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">
                            University
                        </label>

                        <select id="university_id" name="university_id" x-model="universityId" @change="loadCities()"
                            class="w-full rounded-lg border border-neutral-300 bg-white px-4 py-2.5 text-sm focus:border-brand-500 focus:ring-brand-500 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white">
                            <option value="">
                                Select University
                            </option>

                            @foreach ($universities as $university)
                                <option value="{{ $university->id }}">
                                    {{ $university->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('university_id')
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

                        <select id="city_id" name="city_id" x-model="cityId" :disabled="!universityId || loading"
                            class="w-full rounded-lg border border-neutral-300 bg-white px-4 py-2.5 text-sm focus:border-brand-500 focus:ring-brand-500 disabled:cursor-not-allowed disabled:bg-neutral-100 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white">
                            <option value="">
                                Select City
                            </option>

                            <template x-for="city in cities" :key="city.id">
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

                {{-- Name --}}
                <x-form.input-text name="name" label="Campus Name" value="{{ old('name', $campus?->name) }}"
                    placeholder="Enter campus name..." />

                {{-- Email / Phone --}}
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                    <x-form.input-text name="email" label="Email" type="email"
                        value="{{ old('email', $campus?->email) }}" placeholder="campus@example.com" />

                    <x-form.input-text name="phone" label="Phone" value="{{ old('phone', $campus?->phone) }}"
                        placeholder="+880..." />

                </div>



                {{-- Address --}}
                <x-form.textarea-input name="address" label="Address" rows="3" placeholder="Campus address..."
                    value="{{ old('address', $campus?->address) }}" />

                {{-- Description --}}
                <x-form.textarea-input name="description" label="Description" rows="5"
                    placeholder="Campus description..." value="{{ old('description', $campus?->description) }}" />

            </div>
        </div>

        {{-- Campus Settings --}}
        <div class="rounded-2xl border border-neutral-200 bg-white dark:border-neutral-800 dark:bg-neutral-900">

            <div class="border-b border-neutral-100 p-5 dark:border-neutral-800">
                <h2 class="text-lg font-semibold text-neutral-800 dark:text-white">
                    Campus Settings
                </h2>
            </div>

            <div class="space-y-5 p-5">

                {{-- Sort Order --}}
                <x-form.input-text name="sort_order" label="Sort Order" type="number"
                    value="{{ old('sort_order', $campus?->sort_order ?? 0) }}" placeholder="0" />

                {{-- Main Campus --}}
                <div class="flex items-center gap-3">

                    <input type="hidden" name="is_main_campus" value="0">

                    <input type="checkbox" id="is_main_campus" name="is_main_campus" value="1"
                        @checked(old('is_main_campus', $campus?->is_main_campus ?? false))
                        class="h-4 w-4 rounded border-neutral-300 text-brand-600 focus:ring-brand-500">

                    <label for="is_main_campus" class="text-sm font-medium text-neutral-700 dark:text-neutral-300">
                        Main Campus
                    </label>

                </div>

                {{-- Active --}}
                <div class="flex items-center gap-3">

                    <input type="hidden" name="is_active" value="0">

                    <input type="checkbox" id="is_active" name="is_active" value="1" @checked(old('is_active', $campus?->is_active ?? true))
                        class="h-4 w-4 rounded border-neutral-300 text-brand-600 focus:ring-brand-500">

                    <label for="is_active" class="text-sm font-medium text-neutral-700 dark:text-neutral-300">
                        Active
                    </label>

                </div>

            </div>
        </div>

    </div>

</div>

<script>
    function campusLocation(config) {
        return {
            universityId: config.initialUniversityId ?? '',
            cityId: config.initialCityId ?? '',
            cities: [],
            loading: false,

            async init() {
                if (this.universityId) {
                    await this.loadCities(false);
                }
            },

            async loadCities(resetCity = true) {
                this.cities = [];

                if (resetCity) {
                    this.cityId = '';
                }

                if (!this.universityId) {
                    return;
                }

                this.loading = true;

                try {
                    const url = new URL(
                        config.citiesUrl,
                        window.location.origin
                    );

                    url.searchParams.set(
                        'university_id',
                        this.universityId
                    );

                    const response = await fetch(url, {
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                    });

                    if (!response.ok) {
                        throw new Error(
                            'Failed to load cities.'
                        );
                    }

                    this.cities = await response.json();

                } catch (error) {
                    console.error(error);

                    this.cities = [];
                    this.cityId = '';

                } finally {
                    this.loading = false;
                }
            },
        };
    }
</script>
