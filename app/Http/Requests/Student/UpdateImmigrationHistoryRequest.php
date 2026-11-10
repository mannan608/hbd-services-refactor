<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class UpdateImmigrationHistoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'refusals'              => ['required', 'array', 'min:1'],
            'refusals.*.country'    => ['required', 'string', 'max:100'],
            'refusals.*.visa_type'  => ['required', 'string', 'max:100'],
            'refusals.*.year'       => ['required', 'integer', 'min:1990', 'max:2100'],
            'refusals.*.status'     => ['nullable', 'string', 'max:50'],
            'refusals.*.grounds'    => ['required', 'string', 'max:3000'],

            // Optional uploaded refusal letter for each record
            'refusals.*.document'   => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'],
        ];
    }

    public function attributes(): array
    {
        return [
            'refusals.*.country'   => 'country',
            'refusals.*.visa_type' => 'visa category / type',
            'refusals.*.year'      => 'application year',
            'refusals.*.grounds'   => 'grounds for refusal',
        ];
    }
}
