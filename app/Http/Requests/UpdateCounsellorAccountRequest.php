<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCounsellorAccountRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->counsellor !== null;
    }

    public function rules(): array
    {
        $user = auth()->user();

        return [
            /*
            |--------------------------------------------------------------------------
            | User
            |--------------------------------------------------------------------------
            */
            'name' => ['required', 'string', 'max:255'],

            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],

            'phone' => ['nullable', 'string', 'max:20'],

            'password' => ['nullable', 'string', 'min:8', 'confirmed'],

            /*
            |--------------------------------------------------------------------------
            | Counsellor
            |--------------------------------------------------------------------------
            */
            'photo' => ['nullable', 'image', 'max:2048'],

            'designation' => ['nullable', 'string', 'max:150'],

            'bio' => ['nullable', 'string'],

            'education' => ['nullable', 'string'],

            'institution' => ['nullable', 'string'],

            'city_id' => ['nullable', 'exists:cities,id'],

            'country_id' => ['nullable', 'exists:countries,id'],

            'languages' => ['required', 'array', 'min:1'],

            'languages.*' => ['required', 'string', 'max:255'],

            'expertise' => ['nullable', 'array'],

            'expertise.*' => ['nullable', 'string', 'max:255'],

            'experience_years' => ['nullable', 'integer', 'min:0'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'languages' => $this->normalizeArrayField($this->input('languages')),

            'expertise' => $this->normalizeArrayField($this->input('expertise'), true),
        ]);
    }

    protected function normalizeArrayField(mixed $value, bool $nullable = false): ?array
    {
        if (is_string($value)) {
            $value = explode(',', $value);
        }

        if (!is_array($value)) {
            return $nullable ? null : [];
        }

        $value = array_values(array_filter(array_map(static fn($item) => is_string($item) ? trim($item) : $item, $value), static fn($item) => filled($item)));

        return $nullable && empty($value) ? null : $value;
    }
}