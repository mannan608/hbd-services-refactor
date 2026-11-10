<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Provider extends Model
{
    protected $table = 'providers';

    protected $fillable = [
        'user_id',
        'short_name',
        'phone',
        'country_id',
        'country',
        'state',
        'city_id',
        'city',
        'address',
    ];

    /**
     * Provider belongs to a user.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function courseScopes(): HasMany
{
    return $this->hasMany(ProviderCourseScope::class);
}

}
