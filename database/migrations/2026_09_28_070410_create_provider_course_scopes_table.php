<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('provider_course_scopes', function (Blueprint $table) {

            $table->id();
            $table->foreignId('provider_id')->constrained('providers')->cascadeOnDelete();
            $table->foreignUuid('university_id')->constrained('universities')->cascadeOnDelete();
            $table->foreignUuid('course_id')->constrained('courses')->cascadeOnDelete();
            $table->foreignUuid('campus_id')->constrained('university_campuses')->cascadeOnDelete();

            $table->timestamps();

            $table->unique(['provider_id', 'university_id', 'course_id', 'campus_id'], 'provider_course_scope_unique');

            /*
             * Useful for provider scope queries.
             */
            $table->index(['provider_id', 'university_id', 'course_id'], 'provider_course_scope_lookup');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('provider_course_scopes');
    }
};
