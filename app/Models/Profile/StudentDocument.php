<?php

namespace App\Models\Profile;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class StudentDocument extends Model
{
    protected $fillable = [
        'student_id',
        'document_key',
        'document_name',
        'file_path',
        'original_name',
        'file_size',
        'status',
    ];

    /**
     * The predefined checklist slots in display order.
     */
    public const CHECKLIST = [
        'passport_copy'           => 'Passport Copy',
        'academic_transcripts'    => 'Academic Transcripts',
        'degree_certificates'     => 'Degree Certificates',
        'english_test_result'     => 'IELTS / English Test Result',
        'offer_letter'            => 'Unconditional Offer Letter',
        'bank_statements'         => 'Bank Statements (6 months)',
        'affidavit_of_support'    => 'Affidavit of Support',
        'statement_of_purpose'    => 'Statement of Purpose (SOP)',
        'recommendation_letters'  => 'Recommendation Letters',
        'cv_resume'               => 'CV / Resume',
        'medical_police_clearance'=> 'Medical / Police Clearance',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'ready'     => 'Ready',
            'in_review' => 'In Review',
            default     => 'Pending Upload',
        };
    }
}
