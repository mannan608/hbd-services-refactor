<?php

namespace App\Http\Requests\HR;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreHolidayRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('holiday.create') ?? false;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:150'],

            'date' => ['required', 'date'],

            'end_date' => ['nullable', 'required_if:is_multi_day,1', 'date', 'after_or_equal:date'],

            'is_multi_day' => ['required', 'boolean'],

            'is_recurring' => ['sometimes', 'boolean'],

            'is_active' => ['sometimes', 'boolean'],

            'description' => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'end_date.required_if' => 'An end date is required for multi-day holidays.',
            'end_date.after_or_equal' => 'The end date must be on or after the start date.',
        ];
    }
  
}
