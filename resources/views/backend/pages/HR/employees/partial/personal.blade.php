<div class="overflow-hidden rounded-2xl border border-neutral-200/80 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900"
    x-data="{ isEditing: false }">

    {{-- Section Header & Edit Toggle Button --}}
    <div class="border-b border-neutral-100 bg-neutral-50/50 px-6 py-4 dark:border-neutral-800 dark:bg-neutral-800/50 flex items-center justify-between">
        <div>
            <h2 class="text-base font-semibold text-neutral-900 dark:text-white">Personal Information</h2>
            <p class="text-xs text-neutral-500 dark:text-neutral-400">Basic identification and personal contact details.</p>
        </div>

        <div>
            <button type="button" @click="isEditing = !isEditing"
                x-text="isEditing ? 'Cancel Edit' : 'Edit Information'"
                class="inline-flex items-center px-3.5 py-1.5 text-xs font-medium rounded-lg border border-neutral-300 bg-white text-neutral-700 shadow-sm hover:bg-neutral-50 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-300 dark:hover:bg-neutral-700 transition-all">
            </button>
        </div>
    </div>

    <form action="" method="POST" class="p-6 space-y-6">
        @csrf
        @method('PUT')

        {{-- Names --}}
        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
            <div>
                <label for="first_name" class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">First Name</label>
                <input type="text" id="first_name" name="first_name"
                    value="{{ old('first_name', $employee?->first_name) }}" placeholder="e.g. John"
                    x-bind:disabled="!isEditing"
                    class="w-full rounded-lg h-11 border placeholder:text-neutral-400 border-neutral-300 bg-white px-4 py-2.5 text-sm disabled:bg-neutral-100 disabled:text-neutral-500 disabled:cursor-not-allowed dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:disabled:bg-neutral-800/50">
                @error('first_name')<p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="last_name" class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">Last Name</label>
                <input type="text" id="last_name" name="last_name"
                    value="{{ old('last_name', $employee?->last_name) }}" placeholder="e.g. Doe"
                    x-bind:disabled="!isEditing"
                    class="w-full rounded-lg h-11 border placeholder:text-neutral-400 border-neutral-300 bg-white px-4 py-2.5 text-sm disabled:bg-neutral-100 disabled:text-neutral-500 disabled:cursor-not-allowed dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:disabled:bg-neutral-800/50">
                @error('last_name')<p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>@enderror
            </div>
        </div>

        {{-- Credentials & Contact --}}
        <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
            <div>
                <label for="email" class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">Email Address</label>
                <input type="email" id="email" name="email"
                    value="{{ old('email', $employee?->user?->email) }}" placeholder="john@example.com"
                    x-bind:disabled="!isEditing"
                    class="w-full rounded-lg h-11 border placeholder:text-neutral-400 border-neutral-300 bg-white px-4 py-2.5 text-sm disabled:bg-neutral-100 disabled:text-neutral-500 disabled:cursor-not-allowed dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:disabled:bg-neutral-800/50">
                @error('email')<p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="phone" class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">Phone Number</label>
                <input type="text" id="phone" name="phone"
                    value="{{ old('phone', $employee?->user?->phone) }}" placeholder="+1 (555) 000-0000"
                    x-bind:disabled="!isEditing"
                    class="w-full rounded-lg h-11 border placeholder:text-neutral-400 border-neutral-300 bg-white px-4 py-2.5 text-sm disabled:bg-neutral-100 disabled:text-neutral-500 disabled:cursor-not-allowed dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:disabled:bg-neutral-800/50">
                @error('phone')<p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="password" class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">Password</label>
                <input type="password" id="password" name="password"
                    value="" placeholder="Keep blank to retain current password"
                    x-bind:disabled="!isEditing"
                    class="w-full rounded-lg h-11 border placeholder:text-neutral-400 border-neutral-300 bg-white px-4 py-2.5 text-sm disabled:bg-neutral-100 disabled:text-neutral-500 disabled:cursor-not-allowed dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:disabled:bg-neutral-800/50">
                @error('password')<p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>@enderror
            </div>
        </div>

        {{-- Demographics & Details --}}
        <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
            <div>
                <label for="date_of_birth" class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">Date of Birth</label>
                <input type="date" id="date_of_birth" name="date_of_birth"
                    value="{{ old('date_of_birth', $employee?->date_of_birth?->format('Y-m-d')) }}"
                    x-bind:disabled="!isEditing"
                    class="w-full rounded-lg h-11 border placeholder:text-neutral-400 border-neutral-300 bg-white px-4 py-2.5 text-sm disabled:bg-neutral-100 disabled:text-neutral-500 disabled:cursor-not-allowed dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:disabled:bg-neutral-800/50">
                @error('date_of_birth')<p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="gender" class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">Gender</label>
                <select id="gender" name="gender" x-bind:disabled="!isEditing"
                    class="w-full rounded-lg h-11 border placeholder:text-neutral-400 border-neutral-300 bg-white px-4 py-2.5 text-sm transition focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/10 disabled:bg-neutral-100 disabled:text-neutral-500 disabled:cursor-not-allowed dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:disabled:bg-neutral-800/50 dark:disabled:text-neutral-500">
                    <option value="">Select Gender</option>
                    @foreach (['Male', 'Female', 'Other'] as $gender)
                        <option value="{{ $gender }}" @selected(old('gender', $employee?->gender) === $gender)>{{ $gender }}</option>
                    @endforeach
                </select>
                @error('gender')<p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="blood_group" class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">Blood Group</label>
                <select id="blood_group" name="blood_group" x-bind:disabled="!isEditing"
                    class="w-full rounded-lg h-11 border placeholder:text-neutral-400 border-neutral-300 bg-white px-4 py-2.5 text-sm transition focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/10 disabled:bg-neutral-100 disabled:text-neutral-500 disabled:cursor-not-allowed dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:disabled:bg-neutral-800/50 dark:disabled:text-neutral-500">
                    <option value="">Select Blood Group</option>
                    @foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $blood)
                        <option value="{{ $blood }}" @selected(old('blood_group', $employee?->blood_group) === $blood)>{{ $blood }}</option>
                    @endforeach
                </select>
                @error('blood_group')<p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
            <div>
                <label for="religion" class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">Religion</label>
                <input type="text" id="religion" name="religion"
                    value="{{ old('religion', $employee?->religion) }}" placeholder="e.g. Islam, Hinduism, Christianity"
                    x-bind:disabled="!isEditing"
                    class="w-full rounded-lg h-11 border placeholder:text-neutral-400 border-neutral-300 bg-white px-4 py-2.5 text-sm disabled:bg-neutral-100 disabled:text-neutral-500 disabled:cursor-not-allowed dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:disabled:bg-neutral-800/50">
                @error('religion')<p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="national_id" class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">National ID / Passport</label>
                <input type="text" id="national_id" name="national_id"
                    value="{{ old('national_id', $employee?->national_id) }}" placeholder="Enter NID Number"
                    x-bind:disabled="!isEditing"
                    class="w-full rounded-lg h-11 border placeholder:text-neutral-400 border-neutral-300 bg-white px-4 py-2.5 text-sm disabled:bg-neutral-100 disabled:text-neutral-500 disabled:cursor-not-allowed dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:disabled:bg-neutral-800/50">
                @error('national_id')<p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>@enderror
            </div>
        </div>

        {{-- Emergency Contact --}}
        <div class="rounded-xl border border-neutral-200 p-4 dark:border-neutral-800 bg-neutral-50/30 dark:bg-neutral-900/50">
            <div class="mb-3">
                <h2 class="text-base font-semibold text-neutral-900 dark:text-white">Emergency Contact</h2>
                <p class="text-xs text-neutral-500 dark:text-neutral-400">Enter your emergency contact details</p>
            </div>
            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                <div>
                    <label for="emergency_contact_name" class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">Contact Name</label>
                    <input type="text" id="emergency_contact_name" name="emergency_contact_name"
                        value="{{ old('emergency_contact_name', $employee?->emergency_contact_name) }}"
                        placeholder="Emergency contact name" x-bind:disabled="!isEditing"
                        class="w-full rounded-lg h-11 border placeholder:text-neutral-400 border-neutral-300 bg-white px-4 py-2.5 text-sm disabled:bg-neutral-100 disabled:text-neutral-500 disabled:cursor-not-allowed dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:disabled:bg-neutral-800/50">
                    @error('emergency_contact_name')<p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="emergency_contact_phone" class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">Phone Number</label>
                    <input type="text" id="emergency_contact_phone" name="emergency_contact_phone"
                        value="{{ old('emergency_contact_phone', $employee?->emergency_contact_phone) }}"
                        placeholder="+1 (555) 000-0000" x-bind:disabled="!isEditing"
                        class="w-full rounded-lg h-11 border placeholder:text-neutral-400 border-neutral-300 bg-white px-4 py-2.5 text-sm disabled:bg-neutral-100 disabled:text-neutral-500 disabled:cursor-not-allowed dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:disabled:bg-neutral-800/50">
                    @error('emergency_contact_phone')<p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        {{-- Submit Button --}}
        <div x-show="isEditing" x-cloak x-transition
            class="flex items-center justify-end space-x-3 pt-4 border-t border-neutral-200 dark:border-neutral-800">
            <button type="button" @click="isEditing = false"
                class="px-4 py-2 text-sm font-medium text-neutral-700 bg-white border border-neutral-300 rounded-lg shadow-sm hover:bg-neutral-50 dark:bg-neutral-800 dark:text-neutral-300 dark:border-neutral-700">
                Cancel
            </button>
            <button type="submit"
                class="px-5 py-2 text-sm font-medium text-white bg-brand-600 rounded-lg shadow-sm hover:bg-brand-700">
                Save Changes
            </button>
        </div>
    </form>
</div>