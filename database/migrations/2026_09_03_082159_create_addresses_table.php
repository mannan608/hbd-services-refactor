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
        Schema::create('addresses', function (Blueprint $table) {
           $table->id();

        $table->foreignId('student_id')
            ->constrained('students')
            ->cascadeOnDelete();

        // Address Type
        $table->string('type'); // current / permanent

        // Address
        $table->text('address')->nullable();

        // Location
        $table->foreignUuid('city_id')
            ->nullable()
            ->constrained('cities')
            ->nullOnDelete();

        $table->foreignUuid('country_id')
            ->nullable()
            ->constrained('countries')
            ->nullOnDelete();

        $table->timestamps();

        // One current + one permanent address per student
        $table->unique(['student_id', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
