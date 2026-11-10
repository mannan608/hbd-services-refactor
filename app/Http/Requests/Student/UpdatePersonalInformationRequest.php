<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePersonalInformationRequest extends FormRequest
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
            | Student Information
            |--------------------------------------------------------------------------
            */

            'date_of_birth' => ['required', 'date', 'before:today'],

            'gender' => ['required', 'string', Rule::in(['Male', 'Female', 'Other'])],

            'nationality' => ['required', 'string', 'max:100'],

            'place_of_birth' => ['required', 'string', 'max:255'],

            'marital_status' => ['required', 'string', Rule::in(['Single', 'Married', 'Divorced', 'Widowed'])],

            /*
            |--------------------------------------------------------------------------
            | Passport
            |--------------------------------------------------------------------------
            */

            'passport_number' => ['nullable', 'string', 'max:100', Rule::unique('students', 'passport_number')->ignore($this->user()->student?->id)],

            'passport_issue_date' => ['nullable', 'date'],

            'passport_expiry_date' => ['nullable', 'date', 'after:passport_issue_date'],

            /*
            |--------------------------------------------------------------------------
            | Current Address
            |--------------------------------------------------------------------------
            */

            'current_address' => ['required', 'string', 'max:1000'],

            'current_city_id' => ['nullable', 'uuid', 'exists:cities,id'],

            'current_country_id' => ['nullable', 'uuid', 'exists:countries,id'],

            /*
            |--------------------------------------------------------------------------
            | Same Address
            |--------------------------------------------------------------------------
            */

            'same_address' => ['nullable', 'boolean'],

            /*
            |--------------------------------------------------------------------------
            | Permanent Address
            |--------------------------------------------------------------------------
            */

            'permanent_address' => ['required_unless:same_address,1', 'nullable', 'string', 'max:1000'],

            'permanent_city_id' => ['nullable', 'uuid', 'exists:cities,id'],

            'permanent_country_id' => ['nullable', 'uuid', 'exists:countries,id'],
        ];
    }
}