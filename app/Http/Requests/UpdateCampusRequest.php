<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCampusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->can('campus.edit');
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'university_id' => ['required', 'exists:universities,id'],

            'name' => ['required', 'string', 'max:255'],

            'email' => ['nullable', 'email', 'max:255'],

            'phone' => ['nullable', 'string', 'max:50'],

            'city_id' => ['nullable', 'uuid', 'exists:cities,id'],

            'address' => ['nullable', 'string'],

            'description' => ['nullable', 'string'],
            // Google Maps
            'google_map_link' => ['sometimes', 'nullable', 'url', 'max:2048'],

            'is_main_campus' => ['nullable', 'boolean'],

            'is_active' => ['nullable', 'boolean'],

            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }
}
