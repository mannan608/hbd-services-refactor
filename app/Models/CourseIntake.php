<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseIntake extends Model
{
    protected $fillable = [
        'course_id',
        'campus_id',
        'name',
        'year',
        'start_date',
        'application_open_date',
        'application_deadline',
        'status',
        'is_active',
    ];

    protected $casts = [
        'start_date' => 'date',
        'application_open_date' => 'date',
        'application_deadline' => 'date',
        'is_active' => 'boolean',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function campus(): BelongsTo
    {
        return $this->belongsTo(UniversityCampus::class, 'campus_id');
    }
}