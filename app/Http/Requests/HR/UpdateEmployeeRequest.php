<?php

namespace App\Http\Requests\HR;

use App\Models\hrm\Employee;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('employee.edit') ?? false;
    }

    public function rules(): array
    {
        $routeEmployee = $this->route('employee');

        $employee = $routeEmployee instanceof Employee ? $routeEmployee : Employee::query()->with('currentEmployment')->findOrFail($routeEmployee);

        $userId = $employee->user_id;
        $currentEmploymentId = $employee->currentEmployment?->id;

        return [
            // Employment
            'employee_code' => ['sometimes', 'required', 'string', 'max:50', Rule::unique('employments', 'employee_code')->ignore($currentEmploymentId)],

            'branch_id' => ['sometimes', 'nullable', 'integer', 'exists:branches,id'],

            'department_id' => [
                'sometimes', 'nullable',
                'integer',
                Rule::exists('departments', 'id')->where(function ($query) {
                    if ($this->filled('branch_id')) {
                        $query->where('branch_id', $this->input('branch_id'));
                    }
                }),
            ],

            'team_id' => [
                'sometimes',
                'nullable',
                'integer',
                Rule::exists('teams', 'id')->where(function ($query) {
                    if ($this->filled('department_id')) {
                        $query->where('department_id', $this->input('department_id'));
                    }
                }),
            ],

            'designation_id' => ['sometimes', 'required', 'integer', 'exists:designations,id'],

            'work_type' => ['sometimes', 'required', Rule::in(['onsite', 'remote', 'hybrid'])],

            'employment_status' => ['sometimes', 'required', Rule::in(['probation', 'permanent', 'resigned', 'terminated'])],

            'joining_date' => ['sometimes', 'required', 'date'],

            'resignation_date' => ['nullable', 'date', 'after_or_equal:joining_date'],

            'last_working_day' => ['nullable', 'date', 'after_or_equal:joining_date'],

            // User account
            'first_name' => ['sometimes', 'required', 'string', 'max:100'],

            'last_name' => ['sometimes', 'required', 'string', 'max:100'],

            'email' => ['sometimes', 'required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($userId)],

            'phone' => ['nullable', 'string', 'max:32'],

            // Password is optional when updating.
            'password' => ['nullable', 'string', 'min:8'],

            // Personal information
            'date_of_birth' => ['nullable', 'date', 'before:today'],

            'gender' => ['nullable', Rule::in(['Male', 'Female', 'Other'])],

            'religion' => ['nullable', 'string', 'max:64'],

            'blood_group' => ['nullable', Rule::in(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'])],

            'national_id' => ['nullable', 'string', 'max:255'],

            'address' => ['nullable', 'string'],

            // Professional information
            'bio' => ['nullable', 'string'],

            'education' => ['nullable', 'string'],

            'institution' => ['nullable', 'string', 'max:200'],

            'experience_years' => ['nullable', 'integer', 'min:0', 'max:65535'],

            // Languages
            'languages' => ['nullable', 'array'],

            'languages.*' => ['string', 'max:100'],

            // Expertise
            'expertise' => ['nullable', 'array'],

            'expertise.*' => ['string', 'max:150'],

            // Location
            'country_id' => ['nullable', 'uuid', 'exists:countries,id'],

            'city_id' => ['nullable', 'uuid', Rule::exists('cities', 'id')->where('country_id', $this->input('country_id')), 'required_with:country_id'],

            // Emergency contact
            'emergency_contact_name' => ['nullable', 'string', 'max:150'],

            'emergency_contact_phone' => ['nullable', 'string', 'max:32'],

            // Status
            'is_verified' => ['sometimes', 'boolean'],
        ];
    }

    /**
     * Normalize languages and expertise before validation.
     */
    protected function prepareForValidation(): void
    {
        foreach (['languages', 'expertise'] as $field) {
            if (! $this->exists($field)) {
                continue;
            }

            $value = $this->input($field);

            if (is_string($value)) {
                $value = explode(',', $value);
            }

            if (!is_array($value)) {
                $value = [];
            }

            $normalized = array_values(array_filter(array_map(static fn($item) => is_string($item) ? trim($item) : $item, $value), static fn($item) => is_string($item) && $item !== ''));

            $this->merge([
                $field => $normalized,
            ]);
        }
    }
}
