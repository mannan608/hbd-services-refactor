<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    protected $fillable = [
        'title',
        'event_type',
        
        'registration_link',

        'short_description',
        'description',

        'banner',
        'gallery_images',

        'location_name',
        'address',

        'start_datetime',
        'end_datetime',
        'schedules',

        'is_online',
        'meeting_link',

        'max_seats',
        'registration_deadline',

        'organizer',
        'contact_email',
        'contact_phone',

        'providers',
        'tags',
        'benefits',
        'services_offered',
        'faqs',

        'google_map_link',

        'status',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'schedules' => 'array',
        'providers' => 'array',
        'gallery_images' => 'array',
        'tags' => 'array',
        'benefits' => 'array',
        'services_offered' => 'array',
        'faqs' => 'array',

        'is_online' => 'boolean',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',

        'start_datetime' => 'datetime',
        'end_datetime' => 'datetime',
        'registration_deadline' => 'datetime',

        'max_seats' => 'integer',
    ];

    protected static function booted(): void
    {
        static::saving(function (Event $event) {
            if ($event->isDirty('title')) {
                $baseSlug = Str::slug($event->title) ?: 'event';
                $slug = $baseSlug;
                $counter = 1;

                while (
                    static::query()
                    ->where('slug', $slug)
                    ->whereKeyNot($event->getKey())
                    ->exists()
                ) {
                    $slug = "{$baseSlug}-" . ++$counter;
                }

                $event->slug = $slug;
            }
        });
    }

    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }
    public function getRegistrationUrlAttribute(): string
    {
        return route('events.register', $this->id);
    }
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
