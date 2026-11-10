<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudyPlanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'target_degree' => [
                'required',
                'string',
                Rule::in(["Master's Degree", "Bachelor's Degree", "PhD / Doctorate", "Postgraduate Diploma"]),
            ],

            /*
            |--------------------------------------------------------------------------
            | University / Program Choices (at least one required)
            |--------------------------------------------------------------------------
            */
            'choices'                  => ['required', 'array', 'min:1'],
            'choices.*.program'        => ['required', 'string', 'max:255'],
            'choices.*.university'     => ['required', 'string', 'max:255'],
            'choices.*.country'        => ['required', 'string', 'max:100'],
            'choices.*.duration'       => ['nullable', 'string', 'max:100'],
            'choices.*.start_date'     => ['nullable', 'string', 'max:20'],
            'choices.*.end_date'       => ['nullable', 'string', 'max:20'],
            'choices.*.tuition'        => ['nullable', 'string', 'max:100'],
            'choices.*.scholarship'    => ['nullable', 'string', 'max:255'],
            'choices.*.summary'        => ['nullable', 'string', 'max:3000'],
        ];
    }

    public function attributes(): array
    {
        return [
            'choices.*.program'    => 'intended program',
            'choices.*.university' => 'university name',
            'choices.*.country'    => 'destination country',
        ];
    }
}
