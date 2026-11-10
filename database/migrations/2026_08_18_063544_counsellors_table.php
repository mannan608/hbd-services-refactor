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
        Schema::create('counsellors', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignId('user_id')->nullable()->unique()->constrained('users')->nullOnDelete();

            // Personal information
            $table->string('slug', 180)->unique();
            // Professional information
            $table->string('designation', 150)->nullable();
            $table->text('bio')->nullable();
            $table->text('education')->nullable();
            $table->string('institution')->nullable();

            // Location
            $table->foreignUuid('city_id')->nullable()->constrained('cities')->nullOnDelete();

            $table->foreignUuid('country_id')->nullable()->constrained('countries')->nullOnDelete();

            // Languages & expertise
            $table->json('languages');
            $table->json('expertise')->nullable();

            // Experience
            $table->unsignedInteger('experience_years')->default(0);

            // Status
        
            $table->boolean('is_verified')->default(true)->index();

            $table->boolean('is_active')->default(true)->index();

            // Ordering
            $table->integer('sort_order')->default(0);

            $table->timestamps();

            // Useful indexes
            $table->index(['city_id', 'is_active']);
            $table->index(['country_id', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counsellors');
    }
};