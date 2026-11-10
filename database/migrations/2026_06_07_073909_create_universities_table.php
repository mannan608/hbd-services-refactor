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
        Schema::create('universities', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // Location
            $table->uuid('country_id')->nullable();
            $table->uuid('city_id')->nullable();

            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();

            // Basic information
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('short_name')->nullable();
            $table->enum('tag', ['public', 'private'])
                ->default('public')
                ->index();

            // Media
            $table->string('logo')->nullable();
            $table->string('banner')->nullable();

            // Contact
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();

            // Address
            $table->string('state')->nullable();
            $table->text('address')->nullable();

            // Rankings
            $table->integer('global_ranking')->nullable();
            $table->integer('national_ranking')->nullable();

            // Accreditation
            $table->string('accreditation')->nullable();

            // Description / Overview
            $table->text('description')->nullable();
            $table->text('overview')->nullable();

            // Campus facilities
            $table->json('campus_facilities')->nullable();

             // Google Maps
            $table->text('google_map_link')->nullable();

            // Status
            $table->boolean('is_featured')
                ->default(false)
                ->index();

            $table->boolean('is_active')
                ->default(true)
                ->index();

            // Ordering
            $table->integer('sort_order')
                ->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universities');
    }
};
