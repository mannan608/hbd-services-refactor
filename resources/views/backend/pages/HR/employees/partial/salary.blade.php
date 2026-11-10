<section class="rounded-2xl border border-neutral-200/80 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900"
    x-data="{ isEditing: false }">

    {{-- Header --}}
    <div class="border-b border-neutral-100 bg-neutral-50/50 px-6 py-4 dark:border-neutral-800 dark:bg-neutral-800/50 flex items-center justify-between">
        <div>
            <h2 class="text-base font-semibold text-neutral-900 dark:text-white">
                Salary History Information
            </h2>
            <p class="text-xs text-neutral-500 dark:text-neutral-400">
                Manage employee salary details, effective periods, and currency configurations.
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

        {{-- Employee and Salary Amount --}}
        <x-form.input-text name="salary_amount" label="Salary Amount" type="number" step="0.01"
            value="{{ old('salary_amount') }}"
            placeholder="e.g. 50000.00"
            ::disabled="!isEditing" />

        {{-- Currency and Salary Type --}}
        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
            <x-form.select-input name="currency_code" label="Currency Code" :options="[
                'bdt' => 'BDT - Bangladeshi Taka',
                'usd' => 'USD - US Dollar',
                'eur' => 'EUR - Euro',
            ]" :value="old('currency_code', 'bdt')"
                ::disabled="!isEditing" />

            <x-form.select-input name="salary_type" label="Salary Type" :options="[
                'monthly' => 'Monthly',
                'hourly' => 'Hourly',
                'weekly' => 'Weekly',
                'annual' => 'Annual',
            ]" :value="old('salary_type', 'monthly')"
                ::disabled="!isEditing" />
        </div>

        {{-- Effective Dates --}}
        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
            <x-form.date-picker name="effective_from" label="Effective From" type="date"
                :value="old('effective_from', now()->toDateString())"
                placeholder="YYYY-MM-DD"
                ::disabled="!isEditing" />

            <x-form.date-picker name="effective_to" label="Effective To (Optional)" type="date"
                :value="old('effective_to')"
                placeholder="YYYY-MM-DD"
                ::disabled="!isEditing" />
        </div>

        {{-- Remarks --}}
        <div>
            <x-form.textarea-input name="remarks" label="Remarks / Notes"
                value="{{ old('remarks') }}"
                placeholder="e.g. Annual increment based on performance review"
                ::disabled="!isEditing" />
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