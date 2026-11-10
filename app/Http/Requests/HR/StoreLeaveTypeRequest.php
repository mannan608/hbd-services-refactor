<?php

namespace App\Http\Requests\HR;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLeaveTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('leave-type.create') ?? false;
    }
     public function rules(): array
    {
        return [
            'name'                  => 'required|string|max:100',
            'slug'                  => 'required|string|max:50|unique:leave_types,slug|regex:/^[a-z0-9-]+$/',
            'max_days_per_year'     => 'required|integer|min:0|max:365',
            'description'           => 'nullable|string|max:1000',
            'requires_approval'     => 'sometimes|boolean',
            'requires_document'     => 'sometimes|boolean',
            'is_paid'               => 'sometimes|boolean',
            'can_carry_forward'     => 'sometimes|boolean',
            'carry_forward_limit'   => 'nullable|integer|min:0|max:365',
            'is_active'             => 'sometimes|boolean',
        ];
    }
}
