<section class="rounded-2xl border border-neutral-200/80 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900"
    x-data="{ isEditing: false }">

    {{-- Header --}}
    <div class="border-b border-neutral-100 bg-neutral-50/50 px-6 py-4 dark:border-neutral-800 dark:bg-neutral-800/50 flex items-center justify-between">
        <div>
            <h2 class="text-base font-semibold text-neutral-900 dark:text-white">
                Bank Account Information
            </h2>
            <p class="text-xs text-neutral-500 dark:text-neutral-400">
                Manage employee bank account details, routing numbers, and primary disbursement preferences.
            </p>
        </div>

        {{-- Toggle Edit Button --}}
        <div>
            <button type="button" @click="isEditing = !isEditing"
                x-text="isEditing ? 'Cancel Edit' : 'Edit Information'"
                class="inline-flex items-center px-3.5 py-1.5 text-xs font-medium rounded-lg border border-neutral-300 bg-white text-neutral-700 shadow-sm hover:bg-neutral-50 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-300 dark:hover:bg-neutral-700 transition-all">
            </button>
        </div>
    </div>

    <div class="space-y-6 p-6">

        {{-- Bank Name & Bank Branch --}}
        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
            <x-form.input-text name="bank_name" label="Bank Name"
                value="{{ old('bank_name', $bankAccount?->bank_name ?? '') }}"
                placeholder="e.g. Dutch-Bangla Bank Ltd"
                ::disabled="!isEditing" />

            <x-form.input-text name="bank_branch" label="Bank Branch"
                value="{{ old('bank_branch', $bankAccount?->bank_branch ?? '') }}"
                placeholder="e.g. Gulshan Branch"
                ::disabled="!isEditing" />
        </div>

        {{-- Account Name & Account Number --}}
        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
            <x-form.input-text name="account_name" label="Account Name"
                value="{{ old('account_name', $bankAccount?->account_name ?? '') }}"
                placeholder="e.g. John Doe"
                ::disabled="!isEditing" />

            <x-form.input-text name="account_number" label="Account Number" type="text"
                value="{{ old('account_number', $bankAccount?->account_number ?? '') }}"
                placeholder="e.g. 1234567890123"
                ::disabled="!isEditing" />
        </div>

        {{-- Routing Number & Primary Toggle --}}
        <div class="grid grid-cols-1 gap-5 md:grid-cols-2 items-center">
            <x-form.input-text name="routing_number" label="Routing Number"
                value="{{ old('routing_number', $bankAccount?->routing_number ?? '') }}"
                placeholder="e.g. 125261234"
                ::disabled="!isEditing" />

            <div>
                <h2 class="block mb-1 text-sm font-medium text-slate-700">
                    Account Settings
                </h2>
                <label class="relative flex items-start gap-3"
                    :class="isEditing ? 'cursor-pointer' : 'cursor-not-allowed opacity-60'">
                    <input type="hidden" name="is_primary" value="0">
                    <input type="checkbox" id="is_primary" name="is_primary" value="1"
                        @checked(old('is_primary', $employee?->is_primary ?? false))
                        x-bind:disabled="!isEditing"
                        class="mt-0.5 h-4 w-4 rounded border-neutral-300 text-brand-600 focus:ring-brand-500 disabled:cursor-not-allowed">
                    <div>
                        <span class="text-sm font-medium text-neutral-900 dark:text-white">Is Primary</span>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400">Set this as the primary account for salary disbursement</p>
                    </div>
                </label>
            </div>
        </div>

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
    </div>
</section>