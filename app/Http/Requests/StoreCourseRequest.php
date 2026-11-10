<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'university_id' => ['nullable', 'uuid', 'exists:universities,id'],

            'campus_ids' => ['nullable', 'array'],

            'campus_ids.*' => [
                'uuid',
                Rule::exists('university_campuses', 'id')->where('university_id', $this->input('university_id')),
            ],

            'category_id' => ['nullable', 'integer', 'exists:course_categories,id'],

            'title' => ['required', 'string', 'max:255'],
           'code' => ['required', 'string', 'max:255', 'unique:courses,code'],
            'degree_level' => ['required', 'string', 'max:50'],

            'duration_months' => ['required', 'integer', 'min:1', 'max:1200'],

            'tuition_fee' => ['required', 'numeric', 'min:0', 'max:9999999999.99'],

            'currency' => ['required', 'string', 'size:3'],

            'ielts_overall' => ['nullable', 'numeric', 'min:0', 'max:9.0'],

            'toefl_overall' => ['nullable', 'integer', 'min:0', 'max:120'],

            'pte_overall' => ['nullable', 'integer', 'min:0', 'max:90'],

            'gpa_requirement' => ['nullable', 'numeric', 'min:0', 'max:10'],

            'entry_requirements' => ['nullable', 'array'],

            'entry_requirements.*' => ['nullable', 'string', 'max:1000'],
            'outcomes' => ['nullable', 'array'],

            'outcomes.*' => ['nullable', 'string', 'max:1000'],

            'overview' => ['nullable', 'string'],

            'is_featured' => ['nullable', 'boolean'],
            'is_scholarship_available' => ['nullable', 'boolean'],

            'is_active' => ['nullable', 'boolean'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $entryRequirements = $this->input('entry_requirements', []);

        if (is_string($entryRequirements)) {
            $decoded = json_decode($entryRequirements, true);

            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $entryRequirements = $decoded;
            } else {
                $entryRequirements = preg_split('/\r\n|\r|\n/', $entryRequirements) ?: [];
            }
        }

        if (! is_array($entryRequirements)) {
            $entryRequirements = [];
        }

        $entryRequirements = array_values(array_filter(array_map(
            static fn($requirement) => is_string($requirement) ? trim($requirement) : '',
            $entryRequirements
        ), static fn($requirement) => $requirement !== ''));

        $this->merge([
            'currency' => strtoupper($this->currency ?: 'USD'),

            'entry_requirements' => $entryRequirements,

            'is_featured' => $this->boolean('is_featured'),

            'is_active' => $this->has('is_active') ? $this->boolean('is_active') : true,
        ]);
    }

    public function messages(): array
    {
        return [
            'university_id.uuid' => 'Selected university is invalid.',
            'university_id.integer' => 'Selected university is invalid.',
            'university_id.exists' => 'Selected university does not exist.',

            'campus_ids.*.uuid' => 'Selected campus is invalid.',
            'campus_ids.*.exists' => 'Selected campus must belong to the selected university.',

            'category_id.uuid' => 'Selected category is invalid.',
            'category_id.integer' => 'Selected category is invalid.',
            'category_id.exists' => 'Selected category does not exist.',

            'title.required' => 'Course title is required.',
            'title.max' => 'Course title cannot exceed 255 characters.',

            'degree_level.required' => 'Degree level is required.',

            'duration_months.required' => 'Course duration is required.',

            'duration_months.integer' => 'Course duration must be a whole number.',

            'duration_months.min' => 'Course duration must be at least 1 month.',

            'tuition_fee.required' => 'Tuition fee is required.',

            'tuition_fee.numeric' => 'Tuition fee must be a valid number.',

            'tuition_fee.min' => 'Tuition fee cannot be negative.',

            'currency.required' => 'Currency is required.',

            'currency.size' => 'Currency must contain exactly 3 characters.',

            'ielts_overall.numeric' => 'IELTS score must be a valid number.',

            'ielts_overall.max' => 'IELTS score cannot exceed 9.',

            'toefl_overall.integer' => 'TOEFL score must be a whole number.',

            'toefl_overall.max' => 'TOEFL score cannot exceed 120.',

            'pte_overall.integer' => 'PTE score must be a whole number.',

            'pte_overall.max' => 'PTE score cannot exceed 90.',

            'gpa_requirement.numeric' => 'GPA requirement must be a valid number.',

            'entry_requirements.array' => 'Entry requirements must be provided as a list.',
            'entry_requirements.*.string' => 'Each entry requirement must be a text value.',
        ];
    }

    public function attributes(): array
    {
        return [
            'university_id' => 'university',
            'campus_ids' => 'campuses',
            'category_id' => 'category',
            'title' => 'course title',
            'degree_level' => 'degree level',
            'duration_months' => 'duration',
            'tuition_fee' => 'tuition fee',
            'currency' => 'currency',
            'ielts_overall' => 'IELTS overall',
            'toefl_overall' => 'TOEFL overall',
            'pte_overall' => 'PTE overall',
            'gpa_requirement' => 'GPA requirement',
            'entry_requirements' => 'entry requirements',
            'overview' => 'overview',
            'is_featured' => 'featured',
            'is_active' => 'status',
        ];
    }
}
