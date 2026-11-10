<?php

namespace App\Models\hrm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class LeaveType extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'slug',
        'max_days_per_year',
        'description',
        'requires_approval',
        'requires_document',
        'is_paid',
        'can_carry_forward',
        'carry_forward_limit',
        'applicable_during_probation',
        'is_active',
    ];

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'max_days_per_year' => 'integer',
            'carry_forward_limit' => 'integer',
            'requires_approval' => 'boolean',
            'requires_document' => 'boolean',
            'is_paid' => 'boolean',
            'can_carry_forward' => 'boolean',
            'applicable_during_probation' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Scope a query to only include active leave types.
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }
}