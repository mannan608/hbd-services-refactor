<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('university_campuses', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // University
            $table->foreignUuid('university_id')
                ->constrained('universities')
                ->cascadeOnDelete();

            // Location
            $table->uuid('city_id')->nullable();


            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();

            // Basic information
            $table->string('name');
            $table->string('slug');

            // Contact
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            // Address
            $table->text('address')->nullable();

            // Description
            $table->text('description')->nullable();

             // Google Maps
            $table->text('google_map_link')->nullable();

            $table->json('campus_facilities')->nullable();

            // Campus status
            $table->boolean('is_main_campus')
                ->default(false);

            $table->boolean('is_active')
                ->default(true);

            // Ordering
            $table->integer('sort_order')
                ->default(0);

            $table->timestamps();

            // A university can have multiple campuses,
            // but campus names/slugs should be unique within that university.
            $table->unique(['university_id', 'slug']);

            $table->index(['university_id', 'is_active']);
            $table->index(['city_id', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('university_campuses');
    }
};