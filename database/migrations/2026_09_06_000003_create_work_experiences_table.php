<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')
                ->constrained('students')
                ->cascadeOnDelete();

            $table->string('title');
            $table->string('organization');
            $table->string('department')->nullable();
            $table->string('start_date')->nullable(); // YYYY-MM
            $table->string('end_date')->nullable();   // YYYY-MM or null if current
            $table->boolean('is_current')->default(false);
            $table->text('description')->nullable();

            $table->unsignedSmallInteger('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('work_experiences');
    }
};
