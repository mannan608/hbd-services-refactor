<?php

namespace App\Models\hrm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employment extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'employee_code',
        'department_id',
        'branch_id',
        'team_id',
        'designation_id',
        'work_type',
        'weekend_days',
        'employment_status',
        'joining_date',
        'resignation_date',
        'last_working_day',
        'is_current',
    ];

    protected function casts(): array
    {
        return [
            'joining_date' => 'date',
            'resignation_date' => 'date',
            'last_working_day' => 'date',
            'is_current' => 'boolean',
            'weekend_days' => 'array',
        ];
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function designation(): BelongsTo
    {
        return $this->belongsTo(Designation::class);
    }
}

