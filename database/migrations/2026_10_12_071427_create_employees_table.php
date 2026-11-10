<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->nullable()->unique()->constrained('users')->nullOnDelete();           

            // Personal information
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->date('date_of_birth')->nullable();

            $table->string('gender', 24)->nullable();
            $table->string('religion', 64)->nullable();
            $table->string('blood_group', 8)->nullable();

            // Consider application-level encryption for sensitive IDs.
            $table->text('national_id')->nullable();

            $table->text('address')->nullable();

            // Optional profile information
            $table->text('bio')->nullable();
            $table->text('education')->nullable();
            $table->string('institution', 200)->nullable();

            $table->unsignedSmallInteger('experience_years')->default(0);

            $table->json('languages')->nullable();
            $table->json('expertise')->nullable();

            // Geographic references; referenced PKs must be UUIDs.
            $table->foreignUuid('city_id')->nullable()->constrained('cities')->nullOnDelete();

            $table->foreignUuid('country_id')->nullable()->constrained('countries')->nullOnDelete();

            // Emergency contact
            $table->string('emergency_contact_name', 150)->nullable();
            $table->string('emergency_contact_phone', 32)->nullable();

            // Verification of employee/profile information
            $table->boolean('is_verified')->default(false);

            $table->timestamps();

            $table->index('first_name');
            $table->index('last_name');
            $table->index(['country_id', 'city_id']);
            $table->index('is_verified');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};