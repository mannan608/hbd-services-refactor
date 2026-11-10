<section class="rounded-2xl border border-neutral-200/80 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900"
    x-data="{ isEditing: false }">
    
    {{-- Section Header & Edit Toggle Button --}}
    <div class="border-b border-neutral-100 bg-neutral-50/50 px-6 py-4 dark:border-neutral-800 dark:bg-neutral-800/50 flex items-center justify-between">
        <div>
            <h2 class="text-base font-semibold text-neutral-900 dark:text-white">
                Location & Residential Address
            </h2>
            <p class="text-xs text-neutral-500 dark:text-neutral-400">
                Specify country, corresponding city, and physical address.
            </p>
        </div>

        {{-- Toggle Edit Button --}}
        <button type="button" @click="isEditing = !isEditing"
            x-text="isEditing ? 'Cancel Edit' : 'Edit Location'"
            class="inline-flex items-center px-3.5 py-1.5 text-xs font-medium rounded-lg border border-neutral-300 bg-white text-neutral-700 shadow-sm hover:bg-neutral-50 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-300 dark:hover:bg-neutral-700 transition-all">
        </button>
    </div>

    {{-- Form Container --}}
    <form action="" method="POST" class="p-6 space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
            <div>
                <label for="country_id"
                    class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">
                    Country
                </label>
                <select id="country_id" name="country_id" x-model="countryId" @change="countryChanged()" :disabled="!isEditing"
                    class="w-full rounded-lg h-11 border border-neutral-300 bg-white px-4 py-2.5 text-sm transition focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/10 disabled:bg-neutral-100 disabled:text-neutral-500 disabled:cursor-not-allowed dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:disabled:bg-neutral-800/50 dark:disabled:text-neutral-500">
                    <option value="">Select Country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}" @selected(old('country_id', $employee?->country_id) == $country->id)>
                            {{ $country->name }}
                        </option>
                    @endforeach
                </select>
                @error('country_id')
                    <p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="city_id"
                    class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">
                    City
                </label>
                <select id="city_id" name="city_id" x-model="cityId" :disabled="!isEditing || !countryId"
                    class="w-full rounded-lg h-11 border border-neutral-300 bg-white px-4 py-2.5 text-sm transition focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/10 disabled:cursor-not-allowed disabled:bg-neutral-100 disabled:text-neutral-500 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:disabled:bg-neutral-800/50 dark:disabled:text-neutral-500">
                    <option value="">Select City</option>
                    <template x-for="city in filteredCities" :key="city.id">
                        <option :value="city.id" x-text="city.name" :selected="city.id == @js(old('city_id', $employee?->city_id))"></option>
                    </template>
                </select>
                @error('city_id')
                    <p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <x-form.textarea-input name="address" label="Street Address" rows="2"
            placeholder="Enter complete building or street address..."
            value="{{ old('address', $employee?->address) }}" ::disabled="!isEditing" />

        {{-- Submit Button (Visible only when Editing) --}}
        <div x-show="isEditing" x-cloak x-transition
            class="flex items-center justify-end space-x-3 pt-4 border-t border-neutral-200 dark:border-neutral-800">
            <button type="button" @click="isEditing = false"
                class="px-4 py-2 text-sm font-medium text-neutral-700 bg-white border border-neutral-300 rounded-lg shadow-sm hover:bg-neutral-50 dark:bg-neutral-800 dark:text-neutral-300 dark:border-neutral-700">
                Cancel
            </button>
            <button type="submit"
                class="px-5 py-2 text-sm font-medium text-white bg-brand-600 rounded-lg shadow-sm hover:bg-brand-700 focus:outline-none focus:ring-3 focus:ring-brand-500/10">
                Save Changes
            </button>
        </div>
    </form>
</section>