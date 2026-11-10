<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasUuids;

    protected $fillable = [
        'university_id',
        'category_id',
        'title',
        'slug',
        'code',
        'degree_level',
        'duration_months',
        'tuition_fee',
        'currency',
        'ielts_overall',
        'toefl_overall',
        'pte_overall',
        'gpa_requirement',
        'entry_requirements',
        'outcomes',
        'overview',
        'is_featured',
        'is_scholarship_available',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'duration_months' => 'integer',
            'tuition_fee' => 'decimal:2',
            'ielts_overall' => 'decimal:1',
            'toefl_overall' => 'integer',
            'pte_overall' => 'integer',
            'gpa_requirement' => 'decimal:2',
            'entry_requirements' => 'array',
            'outcomes' => 'array',
            'is_featured' => 'boolean',
            'is_scholarship_available' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }

    public function campuses(): BelongsToMany
    {
        return $this->belongsToMany(
            UniversityCampus::class,
            'course_campus',
            'course_id',
            'campus_id'
        )->withTimestamps();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(
            CourseCategory::class,
            'category_id'
        );
    }
}
