<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            // Primary
            $table->id();

            // Basic information
            $table->string('title');
            $table->string('slug')->unique();

            $table->string('event_type')->default('expo');
            // expo, roadshow, webinar, application_day

            $table->text('short_description')->nullable();
            $table->longText('description');

            // Media
            $table->string('banner')->nullable();
            $table->json('gallery_images')->nullable();

            // Location
            $table->string('location_name')->nullable();
            $table->text('address')->nullable();

            // Event schedule
            $table->timestamp('start_datetime');
            $table->timestamp('end_datetime');

            $table->json('schedules')->nullable();

            // Online event
            $table->boolean('is_online')->default(false);

            $table->string('meeting_link')->nullable();

            // Registration
            $table->unsignedInteger('max_seats')->nullable();

            $table->timestamp('registration_deadline')->nullable();

            $table->string('registration_link')->nullable();

            // Organizer / contact
            $table->string('organizer')->nullable();

            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();

            // Event content
            $table->json('providers')->nullable();

            $table->json('tags')->nullable();

            $table->json('benefits')->nullable();

            $table->json('services_offered')->nullable();

            $table->json('faqs')->nullable();

            // Google Maps
            $table->text('google_map_link')->nullable();

            // Status
            $table->enum('status', ['upcoming', 'ongoing', 'completed', 'cancelled'])->default('upcoming');

            $table->boolean('is_featured')->default(false);

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            // Indexes
            $table->index('event_type');
            $table->index('status');
            $table->index('is_active');
            $table->index('is_featured');
            $table->index('start_datetime');
            $table->index('end_datetime');
            $table->index('registration_deadline');
        });
    }

    /**
     * Reverse migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};