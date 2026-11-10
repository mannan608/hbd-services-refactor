<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('immigration_refusals', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')
                ->constrained('students')
                ->cascadeOnDelete();

            $table->string('country');
            $table->string('visa_type');
            $table->year('year');
            $table->string('status')->default('Refused');
            $table->text('grounds')->nullable();

            // Uploaded refusal letter file path
            $table->string('document_path')->nullable();
            $table->string('document_name')->nullable();

            $table->unsignedSmallInteger('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('immigration_refusals');
    }
};
