<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UniversityIntake extends Model
{
    protected $fillable = [
        'university_id',
        'name',
        'year',
        'application_open_date',
        'application_deadline',
        'status',
        'is_active',
    ];

  protected $casts = [
    'application_open_date' => 'date',
    'application_deadline' => 'date',
    'is_active' => 'boolean',
];

    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }
}