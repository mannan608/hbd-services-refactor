<?php

namespace App\Models\Profile;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class AcademicInformation extends Model
{
    protected $table = 'academic_information';

    protected $fillable = [
        'student_id',

        // Highest Qualification
        'highest_degree',
        'highest_institution',
        'highest_grad_date',
        'highest_gpa',
        'highest_max_gpa',

        // Education History
        'education_history',

        // IELTS
        'ielts_overall',
        'ielts_test_date',
        'ielts_listening',
        'ielts_reading',
        'ielts_writing',
        'ielts_speaking',

        // GRE
        'gre_combined',
        'gre_test_date',
        'gre_quant',
        'gre_verbal',
        'gre_awa',
    ];

    protected function casts(): array
    {
        return [
            'education_history' => 'array',
            'ielts_test_date'   => 'date',
            'gre_test_date'     => 'date',
        ];
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
