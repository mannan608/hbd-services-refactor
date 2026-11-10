<?php

namespace App\Models;

use App\Models\Profile\Address;
use App\Models\Profile\AcademicInformation;
use App\Models\Profile\ImmigrationRefusal;
use App\Models\Profile\StudentDocument;
use App\Models\Profile\StudyPlan;
use App\Models\Profile\WorkExperience;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'student_number',
        'profile_step',

        // Student Information
        'first_name',
        'last_name',

        'date_of_birth',
        'gender',
        'destination',
        'marital_status',

        // Passport Information
        'passport_number',
        'passport_issue_date',
        'passport_expiry_date',

        // service type
        'service_type',

    ];

    protected function casts(): array
    {
        return [
            'date_of_birth'        => 'date',
            'passport_issue_date'  => 'date',
            'passport_expiry_date' => 'date',
            'profile_step'         => 'integer',
        ];
    }

    // ── Relationships ────────────────────────────────────────────────────────

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function academicInformation()
    {
        return $this->hasOne(AcademicInformation::class);
    }

    public function studyPlan()
    {
        return $this->hasOne(StudyPlan::class);
    }

    public function workExperiences()
    {
        return $this->hasMany(WorkExperience::class)->orderBy('sort_order');
    }

    public function immigrationRefusals()
    {
        return $this->hasMany(ImmigrationRefusal::class)->orderBy('sort_order');
    }

    public function documents()
    {
        return $this->hasMany(StudentDocument::class);
    }

    // ── Helpers ──────────────────────────────────────────────────────────────

    /**
     * Advance profile_step if the completed step is the current highest.
     */
    public function advanceStepTo(int $completedStep): void
    {
        if ($completedStep >= $this->profile_step) {
            $next = min($completedStep + 1, 6);
            $this->update(['profile_step' => $next]);
        }
    }
}