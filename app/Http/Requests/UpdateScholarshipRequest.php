<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateScholarshipRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('scholarships.edit') ?? false;
    }

    public function rules(): array
    {
        return [
            'university_id' => ['required', 'uuid', 'exists:universities,id'],

            'course_id' => ['nullable', 'uuid', 'exists:courses,id'],

            'title' => ['required', 'string', 'max:255'],

            'amount_description' => ['nullable', 'string', 'max:255'],

            'coverage_type' => ['nullable', 'string', 'max:50'],

            'eligibility_criteria' => ['nullable', 'string'],

            'deadline' => ['nullable', 'date'],

            'is_active' => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'university_id.integer' => 'The university id field must be a valid integer.',
        ];
    }

    protected function passedValidation(): void
    {
        $this->merge([
            'is_active' => $this->boolean('is_active'),
        ]);
    }
}