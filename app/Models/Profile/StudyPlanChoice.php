<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class StudyPlanChoice extends Model
{
    protected $fillable = [
        'study_plan_id',
        'sort_order',
        'program',
        'university',
        'country',
        'duration',
        'start_date',
        'end_date',
        'tuition',
        'scholarship',
        'summary',
    ];

    public function studyPlan()
    {
        return $this->belongsTo(StudyPlan::class);
    }
}
