<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactPoint extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'value',
        'normalized_value',
        'is_whatsapp',
    ];

    protected $casts = [
        'is_whatsapp' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}