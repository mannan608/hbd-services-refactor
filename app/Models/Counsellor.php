<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Counsellor extends Model
{
    use HasUuids;

    protected $fillable = [
        'user_id', 'slug', 'designation', 'bio', 'education', 
        'institution', 'city_id', 'country_id', 'languages', 'expertise', 
        'experience_years', 'is_featured', 'is_verified', 'is_active', 'sort_order'
    ];

    protected $casts = [
        'languages' => 'array',
        'expertise' => 'array',
        'is_featured' => 'boolean',
        'is_verified' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
    public function bookings(): HasMany
{
    return $this->hasMany(CounsellorBooking::class);
}
}