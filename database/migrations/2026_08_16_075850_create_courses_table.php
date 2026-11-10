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
        Schema::create('courses', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // University
            $table->foreignUuid('university_id')
                ->nullable()
                ->constrained('universities')
                ->cascadeOnDelete();        

            // Course category
          $table->foreignId('category_id')->nullable();

            // Basic information
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('code')->unique();
            

            // Bachelor, Master, PhD, Diploma, etc.
            $table->string('degree_level', 50);

            // Duration
            $table->unsignedInteger('duration_months');

            // Tuition
            $table->decimal('tuition_fee', 12, 2);
            $table->char('currency', 3)->default('USD');

            // Application & scholarship
            $table->boolean('is_scholarship_available')
                ->default(false);

            $table->decimal('application_fee', 10, 2)
                ->default(0);

            // English language requirements
            $table->decimal('ielts_overall', 3, 1)->nullable();
            $table->unsignedInteger('toefl_overall')->nullable();
            $table->unsignedInteger('pte_overall')->nullable();

            // Flexible English requirement text
            // Example: IELTS 6.5 / PTE 58
            $table->string('english_requirement_text', 255)->nullable();

            // Academic requirement
            $table->decimal('gpa_requirement', 4, 2)->nullable();

            // Course overview
            $table->text('overview')->nullable();

            $table->json('entry_requirements')->nullable();
            $table->json('outcomes')->nullable();

            // Status
            $table->boolean('is_featured')
                ->default(false);

            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();

            // Useful indexes
            $table->index(['university_id', 'is_active']);
            $table->index(['category_id', 'is_active']);
            $table->index(['degree_level', 'is_active']);
            $table->index(['is_featured', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
