<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUniversityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return (bool) ($this->user()?->can('university.create') ?? false);
    }

    public function rules(): array
    {
        return [
            // Location
            'country_id' => ['nullable', 'uuid', 'exists:countries,id'],

            'city_id' => ['nullable', 'uuid', 'exists:cities,id'],

            // Basic information
            'name' => ['required', 'string', 'max:255'],
            'tag' => ['required', Rule::in(['public', 'private'])],

            'short_name' => ['nullable', 'string', 'max:255'],

            // Media
            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],

            'banner' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],

            // Contact
            'email' => ['nullable', 'email', 'max:255'],

            'phone' => ['nullable', 'string', 'max:50'],

            'website' => ['nullable', 'url', 'max:255'],

            // Address
            'state' => ['nullable', 'string', 'max:255'],

            'address' => ['nullable', 'string'],

            // Rankings
            'global_ranking' => ['nullable', 'integer', 'min:1'],

            'national_ranking' => ['nullable', 'integer', 'min:1'],

            // Accreditation
            'accreditation' => ['nullable', 'string', 'max:255'],

            // Description
            'description' => ['nullable', 'string'],

            'overview' => ['nullable', 'string'],

            // Facilities
            'campus_facilities' => ['nullable', 'array'],

            'campus_facilities.*' => ['nullable', 'string', 'max:255'],
                // Google Maps
            'google_map_link' => ['nullable', 'url', 'max:2048'],

            // Status
            'is_featured' => ['required', 'boolean'],

            'is_active' => ['required', 'boolean'],

            // Ordering
            'sort_order' => ['required', 'integer', 'min:0'],
        ];
    }
}
