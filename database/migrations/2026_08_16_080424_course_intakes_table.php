<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('course_intakes', function (Blueprint $table) {
            $table->id();

            $table->foreignUuid('course_id')
                ->constrained('courses')
                ->cascadeOnDelete();

            $table->foreignUuid('campus_id')
                ->constrained('university_campuses')
                ->cascadeOnDelete();

            $table->string('name', 50);
            $table->unsignedSmallInteger('year');

            $table->date('start_date')->nullable();
            $table->date('application_open_date')->nullable();
            $table->date('application_deadline')->nullable();

            $table->string('status', 30)->default('upcoming');
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->unique([
                'course_id',
                'campus_id',
                'name',
                'year',
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('course_intakes');
    }
};