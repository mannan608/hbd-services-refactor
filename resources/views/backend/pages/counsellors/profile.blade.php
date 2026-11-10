@extends('backend.layouts.app')

@section('content')
    @php
        $selectedCountryId = old('country_id', $counsellor?->country_id);
        $selectedCityId = old('city_id', $counsellor?->city_id);

        $normalizeArrayInput = function ($value) {
            if (is_string($value)) {
                $value = explode(',', $value);
            }

            if (!is_array($value)) {
                return [''];
            }

            $value = array_values(
                array_filter(
                    array_map(static fn($item) => is_string($item) ? trim($item) : $item, $value),
                    static fn($item) => filled($item),
                ),
            );

            return $value ?: [''];
        };

        $languages = $normalizeArrayInput(old('languages', $counsellor?->languages ?? []));
        $expertise = $normalizeArrayInput(old('expertise', $counsellor?->expertise ?? []));
    @endphp

    <div class="min-h-screen bg-slate-50 dark:bg-slate-950" x-data="{
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
        <form action="{{ role_route('role.account.settings.update') }}" method="POST" enctype="multipart/form-data"
            class="mx-auto max-w-5xl px-4 py-8 sm:px-6 lg:px-8">
            @csrf
            @method('PUT')

            {{-- Header --}}
            <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div class="space-y-1">
                    <h1 class="text-2xl font-semibold tracking-tight text-slate-900 dark:text-white">
                        Account Settings
                    </h1>
                    <p class="text-sm text-slate-500 dark:text-slate-400">
                        Manage your counsellor profile and account information.
                    </p>
                </div>

                <button type="submit"
                    class="group inline-flex items-center justify-center gap-2 rounded-lg bg-brand-600 px-5 py-2.5 text-sm font-medium text-white shadow-sm shadow-brand-500/20 transition-all duration-200 hover:bg-brand-700 hover:shadow-md hover:shadow-brand-500/30 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 active:scale-[0.98] dark:focus:ring-offset-slate-950">
                    <svg class="h-4 w-4 transition-transform duration-200 group-hover:scale-110" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    Save Changes
                </button>
            </div>

            <div class="space-y-6">

                {{-- Personal Information --}}
                <section
                    class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition-shadow duration-200 hover:shadow-md dark:border-slate-800 dark:bg-slate-900/50 dark:shadow-none dark:hover:shadow-lg dark:hover:shadow-black/20">
                    <div class="border-b border-slate-100 px-6 py-5 dark:border-slate-800">
                        <div class="flex items-center gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-800">
                                <svg class="h-4 w-4 text-slate-600 dark:text-slate-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-base font-semibold text-slate-900 dark:text-white">
                                    Personal Information
                                </h2>
                                <p class="text-xs text-slate-500 dark:text-slate-400">
                                    Update your basic account information.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-6 p-6 sm:grid-cols-2 lg:grid-cols-3">
                        <x-form.input-text name="name" label="Full Name"
                            value="{{ old('name', $counsellor?->user?->name) }}" placeholder="Enter your name..." />

                        <x-form.input-text name="email" label="Email Address" type="email"
                            value="{{ old('email', $counsellor?->user?->email) }}" placeholder="Enter your email..." />

                        <x-form.input-text name="phone" label="Phone"
                            value="{{ old('phone', $counsellor?->user?->phone) }}" placeholder="Enter your phone..." />
                    </div>
                </section>

                {{-- Change Password --}}
                <section
                    class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition-shadow duration-200 hover:shadow-md dark:border-slate-800 dark:bg-slate-900/50 dark:shadow-none dark:hover:shadow-lg dark:hover:shadow-black/20">
                    <div class="border-b border-slate-100 px-6 py-5 dark:border-slate-800">
                        <div class="flex items-center gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-800">
                                <svg class="h-4 w-4 text-slate-600 dark:text-slate-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-base font-semibold text-slate-900 dark:text-white">
                                    Change Password
                                </h2>
                                <p class="text-xs text-slate-500 dark:text-slate-400">
                                    Leave these fields empty if you don't want to change your password.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-6 p-6 sm:grid-cols-2">
                        <x-form.input-text name="password" label="New Password" type="password"
                            placeholder="Enter new password..." />

                        <x-form.input-text name="password_confirmation" label="Confirm New Password" type="password"
                            placeholder="Repeat new password..." />
                    </div>
                </section>

                {{-- Counsellor Information --}}
                <section
                    class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition-shadow duration-200 hover:shadow-md dark:border-slate-800 dark:bg-slate-900/50 dark:shadow-none dark:hover:shadow-lg dark:hover:shadow-black/20">
                    <div class="border-b border-slate-100 px-6 py-5 dark:border-slate-800">
                        <div class="flex items-center gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-800">
                                <svg class="h-4 w-4 text-slate-600 dark:text-slate-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-base font-semibold text-slate-900 dark:text-white">
                                    Counsellor Information
                                </h2>
                                <p class="text-xs text-slate-500 dark:text-slate-400">
                                    Update your professional profile information.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-8 p-6">

                        {{-- Designation / Experience --}}
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <x-form.input-text name="designation" label="Designation"
                                value="{{ old('designation', $counsellor?->designation) }}"
                                placeholder="e.g. Senior Counsellor" />

                            <x-form.input-text name="experience_years" label="Experience (Years)" type="number"
                                min="0" value="{{ old('experience_years', $counsellor?->experience_years ?? 0) }}"
                                placeholder="0" />
                        </div>

                        {{-- Bio --}}
                        <x-form.textarea-input name="bio" label="Bio" rows="5"
                            placeholder="Write something about yourself..." value="{{ old('bio', $counsellor?->bio) }}" />

                        {{-- Languages / Expertise --}}
                        <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">

                            {{-- Languages --}}
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
                            }" class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <label class="text-sm font-medium text-slate-700 dark:text-slate-300">
                                        Languages
                                    </label>
                                    <button type="button" @click="add()"
                                        class="inline-flex items-center gap-1 rounded-md px-2 py-1 text-xs font-medium text-brand-600 transition-colors hover:bg-brand-50 hover:text-brand-700 dark:text-brand-400 dark:hover:bg-brand-500/10 dark:hover:text-brand-300">
                                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                        Add Language
                                    </button>
                                </div>

                                <div class="space-y-2.5">
                                    <template x-for="(item, index) in items" :key="index">
                                        <div class="group flex items-center gap-2">
                                            <input type="text" name="languages[]" x-model="items[index]"
                                                placeholder="English"
                                                class="h-10 w-full rounded-lg border border-slate-200 bg-white px-3.5 text-sm text-slate-900 placeholder:text-slate-400 transition-all duration-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 focus:outline-none dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:placeholder:text-slate-500 dark:focus:border-brand-500 dark:focus:ring-brand-500/20">
                                            <button type="button" @click="remove(index)"
                                                class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-lg border border-slate-200 text-slate-400 transition-all duration-200 hover:border-red-200 hover:bg-red-50 hover:text-red-500 focus:outline-none focus:ring-2 focus:ring-red-500/20 dark:border-slate-700 dark:text-slate-500 dark:hover:border-red-900/50 dark:hover:bg-red-500/10 dark:hover:text-red-400">
                                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                                </svg>
                                            </button>
                                        </div>
                                    </template>
                                </div>

                                @error('languages')
                                    <p class="text-sm text-red-500">
                                        {{ $message }}
                                    </p>
                                @enderror

                                @error('languages.*')
                                    <p class="text-sm text-red-500">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Expertise --}}
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
                            }" class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <label class="text-sm font-medium text-slate-700 dark:text-slate-300">
                                        Expertise
                                    </label>
                                    <button type="button" @click="add()"
                                        class="inline-flex items-center gap-1 rounded-md px-2 py-1 text-xs font-medium text-brand-600 transition-colors hover:bg-brand-50 hover:text-brand-700 dark:text-brand-400 dark:hover:bg-brand-500/10 dark:hover:text-brand-300">
                                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                        Add Expertise
                                    </button>
                                </div>

                                <div class="space-y-2.5">
                                    <template x-for="(item, index) in items" :key="index">
                                        <div class="group flex items-center gap-2">
                                            <input type="text" name="expertise[]" x-model="items[index]"
                                                placeholder="SOP Writing"
                                                class="h-10 w-full rounded-lg border border-slate-200 bg-white px-3.5 text-sm text-slate-900 placeholder:text-slate-400 transition-all duration-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 focus:outline-none dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:placeholder:text-slate-500 dark:focus:border-brand-500 dark:focus:ring-brand-500/20">
                                            <button type="button" @click="remove(index)"
                                                class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-lg border border-slate-200 text-slate-400 transition-all duration-200 hover:border-red-200 hover:bg-red-50 hover:text-red-500 focus:outline-none focus:ring-2 focus:ring-red-500/20 dark:border-slate-700 dark:text-slate-500 dark:hover:border-red-900/50 dark:hover:bg-red-500/10 dark:hover:text-red-400">
                                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                                </svg>
                                            </button>
                                        </div>
                                    </template>
                                </div>

                                @error('expertise')
                                    <p class="text-sm text-red-500">
                                        {{ $message }}
                                    </p>
                                @enderror

                                @error('expertise.*')
                                    <p class="text-sm text-red-500">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                        </div>

                        {{-- Country / City --}}
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

                            {{-- Country --}}
                            <div class="space-y-2">
                                <label for="country_id" class="text-sm font-medium text-slate-700 dark:text-slate-300">
                                    Country
                                </label>

                                <div class="relative">
                                    <select id="country_id" name="country_id" x-model="countryId"
                                        @change="countryChanged()"
                                        class="h-11 w-full appearance-none rounded-lg border border-slate-200 bg-white px-4 pr-10 text-sm text-slate-900 transition-all duration-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 focus:outline-none dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:focus:border-brand-500 dark:focus:ring-brand-500/20">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-400">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </div>
                                </div>

                                @error('country_id')
                                    <p class="text-sm text-red-500">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- City --}}
                            <div class="space-y-2">
                                <label for="city_id" class="text-sm font-medium text-slate-700 dark:text-slate-300">
                                    City
                                </label>

                                <div class="relative">
                                    <select id="city_id" name="city_id" x-model="cityId" :disabled="!countryId"
                                        class="h-11 w-full appearance-none rounded-lg border border-slate-200 bg-white px-4 pr-10 text-sm text-slate-900 transition-all duration-200 disabled:cursor-not-allowed disabled:bg-slate-100 disabled:text-slate-400 focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 focus:outline-none dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:disabled:bg-slate-800/50 dark:disabled:text-slate-600 dark:focus:border-brand-500 dark:focus:ring-brand-500/20">
                                        <option value="">Select City</option>
                                        <template x-for="city in filteredCities" :key="city.id">
                                            <option :value="city.id" x-text="city.name"></option>
                                        </template>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-400">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </div>
                                </div>

                                @error('city_id')
                                    <p class="text-sm text-red-500">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                        </div>
                    </div>
                </section>

                {{-- Sticky Bottom Action (Mobile) --}}
                <div class="sticky bottom-4 flex justify-end sm:hidden">
                    <button type="submit"
                        class="inline-flex items-center gap-2 rounded-xl bg-brand-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-brand-500/30 backdrop-blur transition-all active:scale-95">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        Save Changes
                    </button>
                </div>

            </div>
        </form>
    </div>
@endsection