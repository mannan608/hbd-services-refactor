<?php

namespace App\Models\Profile;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class ImmigrationRefusal extends Model
{
    protected $fillable = [
        'student_id',
        'country',
        'visa_type',
        'year',
        'status',
        'grounds',
        'document_path',
        'document_name',
        'sort_order',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
