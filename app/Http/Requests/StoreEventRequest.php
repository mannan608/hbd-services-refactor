<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            // Basic information
            'title' => ['required', 'string', 'max:255'],

            'slug' => ['nullable', 'string', 'max:255', 'unique:events,slug'],

            'event_type' => ['required', 'string', 'max:50'],

            'short_description' => ['nullable', 'string'],

            'description' => ['required', 'string'],

            // Media
            'banner' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],

            'gallery_images' => ['nullable', 'array'],

            'gallery_images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],

            // Location
            'location_name' => ['nullable', 'string', 'max:255'],

            'address' => ['nullable', 'string'],

            // Schedule
            'start_datetime' => ['required', 'date'],

            'end_datetime' => ['required', 'date', 'after_or_equal:start_datetime'],

            'schedules' => ['nullable', 'array'],

            'schedules.*.location' => ['nullable', 'string', 'max:255'],

            'schedules.*.start_date' => ['nullable', 'date'],

            'schedules.*.end_date' => ['nullable', 'date', 'after_or_equal:schedules.*.start_date'],

            // Online event
            'is_online' => ['sometimes', 'boolean'],

            'meeting_link' => ['nullable', 'url', 'max:255'],

            // Registration
            'max_seats' => ['nullable', 'integer', 'min:0'],

            'registration_deadline' => ['nullable', 'date'],

            'registration_link' => ['nullable', 'url', 'max:255'],

            // Organizer / contact
            'organizer' => ['nullable', 'string', 'max:255'],

            'contact_email' => ['nullable', 'email', 'max:255'],

            'contact_phone' => ['nullable', 'string', 'max:30'],

            // Event content
            'providers' => ['nullable', 'array'],

            'providers.*.name' => ['nullable', 'string', 'max:255'],

            'providers.*.logo_file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],

            'providers.*.existing_logo' => ['nullable', 'string'],

            'tags' => ['nullable', 'array'],

            'tags.*' => ['nullable', 'string', 'max:100'],

            'benefits' => ['nullable', 'array'],

            'benefits.*' => ['nullable', 'string', 'max:500'],

            'services_offered' => ['nullable', 'array'],

            'services_offered.*' => ['nullable', 'string', 'max:500'],

            'faqs' => ['nullable', 'array'],

            'faqs.*.question' => ['required_with:faqs.*.answer', 'nullable', 'string', 'max:255'],

            'faqs.*.answer' => ['required_with:faqs.*.question', 'nullable', 'string'],

            // Google Maps
            'google_map_link' => ['nullable', 'url', 'max:2048'],

            // Status
            'status' => ['required', Rule::in(['upcoming', 'ongoing', 'completed', 'cancelled'])],

            'is_featured' => ['sometimes', 'boolean'],

            'is_active' => ['sometimes', 'boolean'],
        ];
    }
}
