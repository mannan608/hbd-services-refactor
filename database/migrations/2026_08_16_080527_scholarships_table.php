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
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();

            $table->string('name', 191);

            $table->enum('scope_type', ['university', 'course', 'intake']);

            // Base level - always required
            $table->foreignUuid('university_id')
                ->constrained('universities')
                ->cascadeOnDelete();

            // Required when scope_type = course or intake
            $table->foreignUuid('course_id')
                ->nullable()
                ->constrained('courses')
                ->nullOnDelete();

            // Required when scope_type = intake
            $table->foreignId('intake_id')
                ->nullable()
                ->constrained('course_intakes')
                ->nullOnDelete();

            $table->enum('discount_type', ['percentage', 'fixed']);

            $table->decimal('discount_value', 10, 2);

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarships');
    }
};
