<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the event being updated.
     */
    protected function eventId(): mixed
    {
        $event = $this->route('event');

        return is_object($event) ? $event->getKey() : $event;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * IMPORTANT:
     * This is a true partial update.
     * Missing fields are not validated and are not changed.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            // Basic information
            'title' => ['sometimes', 'string', 'max:255'],

            'slug' => ['sometimes', 'nullable', 'string', 'max:255', Rule::unique('events', 'slug')->ignore($this->eventId())],

            'event_type' => ['sometimes', 'string', 'max:50'],

            'short_description' => ['sometimes', 'nullable', 'string'],

            'description' => ['sometimes', 'string'],

            // Media
            'banner' => ['sometimes', 'nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],

            'gallery_images' => ['sometimes', 'nullable', 'array'],

            'gallery_images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],

            // Location
            'location_name' => ['sometimes', 'nullable', 'string', 'max:255'],

            'address' => ['sometimes', 'nullable', 'string'],

            // Schedule
            'start_datetime' => ['sometimes', 'date'],

            'end_datetime' => ['sometimes', 'date'],

            'schedules' => ['sometimes', 'nullable', 'array'],

            'schedules.*.location' => ['nullable', 'string', 'max:255'],

            'schedules.*.start_date' => ['nullable', 'date'],

            'schedules.*.end_date' => ['nullable', 'date', 'after_or_equal:schedules.*.start_date'],

            // Online event
            'is_online' => ['sometimes', 'boolean'],

            'meeting_link' => ['sometimes', 'nullable', 'url', 'max:255'],

            // Registration
            'max_seats' => ['sometimes', 'nullable', 'integer', 'min:0'],

            'registration_deadline' => ['sometimes', 'nullable', 'date'],

            'registration_link' => ['sometimes', 'nullable', 'url', 'max:255'],

            // Organizer / contact
            'organizer' => ['sometimes', 'nullable', 'string', 'max:255'],

            'contact_email' => ['sometimes', 'nullable', 'email', 'max:255'],

            'contact_phone' => ['sometimes', 'nullable', 'string', 'max:30'],

            // Event content
            'providers' => ['sometimes', 'nullable', 'array'],

            'providers.*.name' => ['nullable', 'string', 'max:255'],

            'providers.*.logo_file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],

            'providers.*.existing_logo' => ['nullable', 'string'],

            'tags' => ['sometimes', 'nullable', 'array'],

            'tags.*' => ['nullable', 'string', 'max:100'],

            'benefits' => ['sometimes', 'nullable', 'array'],

            'benefits.*' => ['nullable', 'string', 'max:500'],

            'services_offered' => ['sometimes', 'nullable', 'array'],

            'services_offered.*' => ['nullable', 'string', 'max:500'],

            'faqs' => ['sometimes', 'nullable', 'array'],

            'faqs.*.question' => ['required_with:faqs.*.answer', 'nullable', 'string', 'max:255'],

            'faqs.*.answer' => ['required_with:faqs.*.question', 'nullable', 'string'],

            // Google Maps
            'google_map_link' => ['sometimes', 'nullable', 'url', 'max:2048'],

            // Status
            'status' => ['sometimes', Rule::in(['upcoming', 'ongoing', 'completed', 'cancelled'])],

            'is_featured' => ['sometimes', 'boolean'],

            'is_active' => ['sometimes', 'boolean'],
        ];
    }

    /**
     * Validate cross-field datetime rules only when
     * the relevant fields are present.
     */
    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $start = $this->input('start_datetime');
            $end = $this->input('end_datetime');

            if ($start !== null && $end !== null && strtotime($end) < strtotime($start)) {
                $validator->errors()->add('end_datetime', 'The end datetime must be after or equal to the start datetime.');
            }
        });
    }
}
