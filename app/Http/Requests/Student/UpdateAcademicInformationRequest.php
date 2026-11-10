<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAcademicInformationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            /*
            |--------------------------------------------------------------------------
            | Highest Qualification
            |--------------------------------------------------------------------------
            */
            'highest_degree'      => ['required', 'string', 'max:255'],
            'highest_institution' => ['required', 'string', 'max:255'],
            'highest_grad_date'   => ['required', 'date'],
            'highest_gpa'         => ['required', 'string', 'max:20'],
            'highest_max_gpa'     => ['nullable', 'string', 'max:20'],

           
            /*
            |--------------------------------------------------------------------------
            | Education History (dynamic rows)
            |--------------------------------------------------------------------------
            */
            'education_history'               => ['nullable', 'array'],
            'education_history.*.degree'      => ['nullable', 'string', 'max:255'],
            'education_history.*.institution' => ['nullable', 'string', 'max:255'],
            'education_history.*.country'     => ['nullable', 'string', 'max:100'],
            'education_history.*.year'        => ['nullable', 'digits:4', 'integer', 'min:1950', 'max:2100'],
            'education_history.*.grade'       => ['nullable', 'string', 'max:50'],

            /*
            |--------------------------------------------------------------------------
            | IELTS
            |--------------------------------------------------------------------------
            */
            'ielts_overall'    => ['nullable', 'string', 'max:10'],
            'ielts_test_date'  => ['nullable', 'date'],
            'ielts_listening'  => ['nullable', 'string', 'max:10'],
            'ielts_reading'    => ['nullable', 'string', 'max:10'],
            'ielts_writing'    => ['nullable', 'string', 'max:10'],
            'ielts_speaking'   => ['nullable', 'string', 'max:10'],

            /*
            |--------------------------------------------------------------------------
            | GRE
            |--------------------------------------------------------------------------
            */
            'gre_combined'   => ['nullable', 'string', 'max:10'],
            'gre_test_date'  => ['nullable', 'date'],
            'gre_quant'      => ['nullable', 'string', 'max:10'],
            'gre_verbal'     => ['nullable', 'string', 'max:10'],
            'gre_awa'        => ['nullable', 'string', 'max:10'],
        ];
    }

    public function attributes(): array
    {
        return [
            'highest_degree'      => 'degree name',
            'highest_institution' => 'institution',
            'highest_grad_date'   => 'graduation date',
            'highest_gpa'         => 'GPA score',
        ];
    }

 
}
