<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class University extends Model
{
    use HasFactory,HasUuids;


    protected $table = 'universities';

    protected $fillable = [
        'country_id',
        'city_id',
        'name',
        'slug',
        'short_name',
        'tag',
        'logo',
        'banner',
        'email',
        'phone',
        'website',
        'state',
        'address',
        'global_ranking',
        'national_ranking',
        'accreditation',
        'description',
        'overview',
        'campus_facilities',
        'google_map_link',
        'is_featured',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'campus_facilities' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'global_ranking' => 'integer',
        'national_ranking' => 'integer',
        'sort_order' => 'integer',
    ];

    /**
     * Keep slug generation as a model-level safety net so
     * direct model writes still behave correctly.
     */
    protected static function booted(): void
    {
        static::saving(function (self $university): void {
            if (
                ! $university->slug
                || $university->isDirty('name')
                || $university->isDirty('short_name')
            ) {
                $university->slug = static::generateUniqueSlug(
                    [$university->name, $university->short_name],
                    $university->exists ? $university->getKey() : null
                );
            }
        });
    }

    /**
     * Generate a unique slug from the given values.
     */
/**
 * Generate a unique slug from the given values.
 */
public static function generateUniqueSlug(
    array $sources,
    ?string $ignoreId = null
): string {
    $baseSlug = 'university';

    foreach ($sources as $source) {
        $slug = Str::slug((string) $source);

        if ($slug !== '') {
            $baseSlug = $slug;
            break;
        }
    }

    return static::makeUniqueSlug($baseSlug, $ignoreId);
}

/**
 * Resolve a unique slug for the given base value.
 */
protected static function makeUniqueSlug(
    string $baseSlug,
    ?string $ignoreId = null
): string {
    $slug = $baseSlug !== '' ? $baseSlug : 'university';

    $query = static::query()->where('slug', $slug);

    if ($ignoreId !== null) {
        $query->whereKeyNot($ignoreId);
    }

    if (! $query->exists()) {
        return $slug;
    }

    $counter = 2;

    do {
        $nextSlug = "{$slug}-{$counter}";

        $exists = static::query()
            ->where('slug', $nextSlug)
            ->when(
                $ignoreId !== null,
                fn ($query) => $query->whereKeyNot($ignoreId)
            )
            ->exists();

        $counter++;
    } while ($exists);

    return $nextSlug;
}

    /**
     * University belongs to a country.
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * University belongs to a city.
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function campuses(): HasMany
{
    return $this->hasMany(UniversityCampus::class, 'university_id');
}

public function courses(): HasMany
{
    return $this->hasMany(Course::class, 'university_id');
}
public function intakes(): HasMany
{
    return $this->hasMany(UniversityIntake::class);
}
}
