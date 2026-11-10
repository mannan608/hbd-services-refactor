<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUniversityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return (bool) ($this->user()?->can('university.edit') ?? false);
    }

    public function rules(): array
    {
        return [
            // Location
            'country_id' => ['sometimes', 'nullable', 'uuid', 'exists:countries,id'],

            'city_id' => ['sometimes', 'nullable', 'uuid', 'exists:cities,id'],

            // Basic information
            'name' => ['sometimes', 'required', 'string', 'max:255'],

            'short_name' => ['sometimes', 'nullable', 'string', 'max:255'],
            'tag' => ['required', Rule::in(['public', 'private'])],


            // Media
            'logo' => ['sometimes', 'nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],

            'banner' => ['sometimes', 'nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],

            // Contact
            'email' => ['sometimes', 'nullable', 'email', 'max:255'],

            'phone' => ['sometimes', 'nullable', 'string', 'max:50'],

            'website' => ['sometimes', 'nullable', 'url', 'max:255'],

            // Address
            'state' => ['sometimes', 'nullable', 'string', 'max:255'],

            'address' => ['sometimes', 'nullable', 'string'],

            // Rankings
            'global_ranking' => ['sometimes', 'nullable', 'integer', 'min:1'],

            'national_ranking' => ['sometimes', 'nullable', 'integer', 'min:1'],

            // Accreditation
            'accreditation' => ['sometimes', 'nullable', 'string', 'max:255'],

            // Description
            'description' => ['sometimes', 'nullable', 'string'],

            'overview' => ['sometimes', 'nullable', 'string'],

            // Facilities
            'campus_facilities' => ['sometimes', 'nullable', 'array'],

            'campus_facilities.*' => ['nullable', 'string', 'max:255'],

        
            // Google Maps
            'google_map_link' => ['sometimes', 'nullable', 'url', 'max:2048'],

            // Status
            'is_featured' => ['sometimes', 'boolean'],

            'is_active' => ['sometimes', 'boolean'],

            // Ordering
            'sort_order' => ['sometimes', 'integer', 'min:0'],
        ];
    }
}
