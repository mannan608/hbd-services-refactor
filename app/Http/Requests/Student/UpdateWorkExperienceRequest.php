<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkExperienceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'roles'                   => ['required', 'array', 'min:1'],
            'roles.*.title'           => ['required', 'string', 'max:255'],
            'roles.*.organization'    => ['required', 'string', 'max:255'],
            'roles.*.department'      => ['nullable', 'string', 'max:255'],
            'roles.*.start_date'      => ['required', 'string', 'max:20'],
            'roles.*.end_date'        => ['nullable', 'string', 'max:20'],
            'roles.*.is_current'      => ['nullable', 'boolean'],
            'roles.*.description'     => ['nullable', 'string', 'max:3000'],
        ];
    }

    public function attributes(): array
    {
        return [
            'roles.*.title'        => 'role / position title',
            'roles.*.organization' => 'organization / company',
            'roles.*.start_date'   => 'start date',
        ];
    }
}
