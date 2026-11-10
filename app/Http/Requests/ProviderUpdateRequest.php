<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProviderUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],

            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $this->provider->user_id],

            'short_name' => ['nullable', 'string', 'max:255'],

            'phone' => ['nullable', 'string', 'max:50'],

            'country_id' => ['nullable', 'uuid', 'exists:countries,id'],

            'state' => ['nullable', 'string', 'max:100'],

            'city_id' => [
                'nullable',
                'uuid',
                Rule::exists('cities', 'id')->where('country_id', $this->input('country_id')),
            ],

            'address' => ['nullable', 'string'],

            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ];
    }
}
