<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CounsellorBooking extends Model
{
    protected $fillable = [
        'counsellor_id',
        'name',
        'email',
        'phone',
        'service',
        'appointment_date',
        'appointment_time',
        'timezone',
        'status',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'appointment_date' => 'date',
        ];
    }

    public function counsellor(): BelongsTo
    {
        return $this->belongsTo(Counsellor::class);
    }
}
