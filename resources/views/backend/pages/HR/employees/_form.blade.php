@php
    $isEdit = isset($employee) && $employee;

    $selectedCountryId = old('country_id', $employee?->country_id);
    $selectedCityId = old('city_id', $employee?->city_id);


    $normalizeArrayInput = function ($value) {
        if (is_string($value)) {
            $value = explode(',', $value);
        }

        if (!is_array($value)) {
            return [''];
        }

        $value = array_values(array_filter(
            array_map(
                static fn ($item) => is_string($item) ? trim($item) : $item,
                $value
            ),
            static fn ($item) => filled($item)
        ));

        return $value ?: [''];
    };

    $languages = $normalizeArrayInput(
        old('languages', $employee?->languages ?? [])
    );

    $expertise = $normalizeArrayInput(
        old('expertise', $employee?->expertise ?? [])
    );
@endphp

<div
    class="space-y-8"
    x-data="{
        countryId: @js((string) ($selectedCountryId ?? '')),
        cityId: @js((string) ($selectedCityId ?? '')),

        cities: @js(
            $cities->map(fn ($city) => [
                'id' => (string) $city->id,
                'name' => $city->name,
                'country_id' => (string) $city->country_id,
            ])->values()
        ),

        get filteredCities() {
            return this.countryId
                ? this.cities.filter(
                    city => city.country_id === this.countryId
                )
                : [];
        },

        countryChanged() {
            if (!this.filteredCities.some(
                city => city.id === this.cityId
            )) {
                this.cityId = '';
            }
        },

        init() {
            this.countryChanged();
        }
    }"
>
    

    {{-- Personal Information --}}
    <div
        class="overflow-hidden rounded-2xl border border-neutral-200/80 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900">
        <div
            class="border-b border-neutral-100 bg-neutral-50/50 px-6 py-4 dark:border-neutral-800 dark:bg-neutral-800/50">
            <h2 class="text-base font-semibold text-neutral-900 dark:text-white">
                Personal Information
            </h2>
            <p class="text-xs text-neutral-500 dark:text-neutral-400">Basic identification and personal contact details.
            </p>
        </div>

        <div class="p-6 space-y-6">
            {{-- Names --}}
            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                <x-form.input-text name="first_name" label="First Name"
                    value="{{ old('first_name', $employee?->first_name) }}" placeholder="e.g. John" />

                <x-form.input-text name="last_name" label="Last Name"
                    value="{{ old('last_name', $employee?->last_name) }}" placeholder="e.g. Doe" />
            </div>

            {{-- Credentials & Contact --}}
            <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
                <x-form.input-text name="email" label="Email Address"
                    value="{{ old('email', $employee?->user?->email) }}" placeholder="john@example.com" />

                <x-form.input-text name="phone" label="Phone Number"
                    value="{{ old('phone', $employee?->user?->phone) }}" placeholder="+1 (555) 000-0000" />

                <x-form.input-text name="password" label="Password" type="password" value="{{old('password'),$employee?->user?->password}}"
                    placeholder="{{ $isEdit ? 'Keep blank to retain current' : 'Enter secure password' }}" />
            </div>

            {{-- Demographics & Details --}}
            <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
                <x-form.input-text name="date_of_birth" label="Date of Birth" type="date"
                    value="{{ old('date_of_birth', $employee?->date_of_birth?->format('Y-m-d')) }}" />

                <div>
                    <label for="gender" class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">
                        Gender
                    </label>
                    <select id="gender" name="gender"
                        class="w-full rounded-xl border border-neutral-300 bg-white px-4 py-2.5 text-sm transition focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/10 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white">
                        <option value="">Select Gender</option>
                        @foreach (['Male', 'Female', 'Other'] as $gender)
                            <option value="{{ $gender }}" @selected(old('gender', $employee?->gender) === $gender)>
                                {{ $gender }}
                            </option>
                        @endforeach
                    </select>
                    @error('gender')
                        <p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="blood_group"
                        class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">
                        Blood Group
                    </label>
                    <select id="blood_group" name="blood_group"
                        class="w-full rounded-xl border border-neutral-300 bg-white px-4 py-2.5 text-sm transition focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/10 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white">
                        <option value="">Select Blood Group</option>
                        @foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $blood)
                            <option value="{{ $blood }}" @selected(old('blood_group', $employee?->blood_group) === $blood)>
                                {{ $blood }}
                            </option>
                        @endforeach
                    </select>
                    @error('blood_group')
                        <p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                <x-form.input-text name="religion" label="Religion"
                    value="{{ old('religion', $employee?->religion) }}"
                    placeholder="e.g. Christianity, Islam, etc." />

                <x-form.input-text name="national_id" label="National ID / Passport"
                    value="{{ old('national_id', $employee?->national_id) }}" placeholder="Enter NID Number" />
            </div>

            {{-- Emmergency & Contact --}}
            <div class="rounded-xl border border-neutral-200 p-4 dark:border-neutral-800 bg-neutral-50/30 dark:bg-neutral-900/50">
                <div class=" bg-neutral-50/50 dark:border-neutral-800 dark:bg-neutral-800/50 mb-3">
                    <h2 class="text-base font-semibold text-neutral-900 dark:text-white">
                        Emergency Contact
                    </h2>
                    <p class="text-xs text-neutral-500 dark:text-neutral-400">Enter your emmergency contact details</p>
                </div>
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                <x-form.input-text name="emergency_contact_name" label="Contact Name" type="text"
                    value="{{ old('emergency_contact_name', $employee?->emergency_contact_name) }}" placeholder="Emmergency contact name" />

                <x-form.input-text name="emergency_contact_phone" label="Phone Number"
                    value="{{ old('emergency_contact_phone', $employee?->emergency_contact_phone) }}" placeholder="+1 (555) 000-0000" />
            </div>
            </div>
            
        </div>
    </div>

    {{-- Employeement Information --}}
 @include('backend.pages.HR.employees.partial.employeement')

    {{-- Professional Background --}}
 @include('backend.pages.HR.employees.partial.professional')
  

    {{-- Location & Address --}}
 @include('backend.pages.HR.employees.partial.address')
  

 @include('backend.pages.HR.employees.partial.salary')
 @include('backend.pages.HR.employees.partial.bank_accounts')
 @include('backend.pages.HR.employees.partial.employee_documents')


    {{-- Employee Settings --}}
    <div
        class="overflow-hidden rounded-2xl border border-neutral-200/80 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900">
        <div
            class="border-b border-neutral-100 bg-neutral-50/50 px-6 py-4 dark:border-neutral-800 dark:bg-neutral-800/50">
            <h2 class="text-base font-semibold text-neutral-900 dark:text-white">
                Account Settings
            </h2>
            <p class="text-xs text-neutral-500 dark:text-neutral-400">Manage account privileges and status flags.</p>
        </div>

        <div class="p-6">
            <label class="relative flex items-start gap-3 cursor-pointer">
                <input type="hidden" name="is_verified" value="0">
                <input type="checkbox" id="is_verified" name="is_verified" value="1"
                    @checked(old('is_verified', $employee?->is_verified ?? false))
                    class="mt-0.5 h-4 w-4 rounded border-neutral-300 text-brand-600 focus:ring-brand-500">
                <div>
                    <span class="text-sm font-medium text-neutral-900 dark:text-white">Verified Employee</span>
                    <p class="text-xs text-neutral-500 dark:text-neutral-400">Verified status gives the profile
                        standard clearance across platform modules.</p>
                </div>
            </label>
        </div>
    </div>

    {{-- Form Actions --}}
    <div class="flex items-center justify-end gap-3 pt-2">
        <a href="{{ role_route('role.employees.index') }}"
            class="inline-flex items-center justify-center rounded-xl border border-neutral-300 px-5 py-2.5 text-sm font-medium text-neutral-700 transition hover:bg-neutral-50 dark:border-neutral-700 dark:text-neutral-200 dark:hover:bg-neutral-800">
            Cancel
        </a>

        <button type="submit"
            class="inline-flex items-center justify-center rounded-xl bg-brand-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-brand-500/20">
            {{ $isEdit ? 'Update Employee' : 'Create Employee' }}
        </button>
    </div>

    @if ($errors->any())
    <div class="bg-red-100 p-4 rounded">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</div>
