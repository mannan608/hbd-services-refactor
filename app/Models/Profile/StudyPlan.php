<?php

namespace App\Models\Profile;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class StudyPlan extends Model
{
    protected $fillable = [
        'student_id',
        'target_degree',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function choices()
    {
        return $this->hasMany(StudyPlanChoice::class)->orderBy('sort_order');
    }
}
