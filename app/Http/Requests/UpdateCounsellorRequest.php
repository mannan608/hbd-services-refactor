<?php

namespace App\Http\Requests;

use App\Models\Counsellor;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCounsellorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->can('counsellors.edit');
    }

    public function rules(): array
    {
        $counsellor = $this->resolveCounsellor();
        $counsellorId = $counsellor?->id;
        $userId = $counsellor?->user_id;

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($userId)],
            'phone' => ['nullable', 'string', 'max:20'],
            'password' => ['nullable', 'string', 'min:8'],
            'slug' => ['nullable', 'string', 'max:180', Rule::unique('counsellors', 'slug')->ignore($counsellorId)],
           
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
            'is_featured' => ['boolean'],
            'is_verified' => ['boolean'],
            'is_active' => ['boolean'],
            'sort_order' => ['nullable', 'integer'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'languages' => $this->normalizeArrayField($this->input('languages')),
            'expertise' => $this->normalizeArrayField($this->input('expertise'), true),
        ]);
    }

    /**
     * Normalize string/array input into a trimmed array.
     */
    protected function normalizeArrayField(mixed $value, bool $nullable = false): ?array
    {
        if (is_string($value)) {
            $value = explode(',', $value);
        }

        if (! is_array($value)) {
            return $nullable ? null : [];
        }

        $value = array_values(array_filter(array_map(
            static fn ($item) => is_string($item) ? trim($item) : $item,
            $value
        ), static fn ($item) => filled($item)));

        return $nullable && empty($value) ? null : $value;
    }

    protected function resolveCounsellor(): ?Counsellor
    {
        $counsellor = $this->route('counsellor');

        if ($counsellor instanceof Counsellor) {
            return $counsellor;
        }

        if (is_string($counsellor) || is_int($counsellor)) {
            return Counsellor::query()->find($counsellor);
        }

        return null;
    }
}
