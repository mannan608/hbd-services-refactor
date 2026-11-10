<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCourseRequest extends FormRequest
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
            'code' => ['required','string','max:255', Rule::unique('courses', 'code')->ignore($this->course), ],

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
        return (new StoreCourseRequest())->messages();
    }

    public function attributes(): array
    {
        return (new StoreCourseRequest())->attributes();
    }
}
