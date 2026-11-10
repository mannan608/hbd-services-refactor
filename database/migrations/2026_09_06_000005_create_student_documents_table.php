<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_documents', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')
                ->constrained('students')
                ->cascadeOnDelete();

            // The predefined document slot key (e.g. 'passport_copy', 'academic_transcripts')
            $table->string('document_key');
            $table->string('document_name'); // Human-readable label
            $table->string('file_path')->nullable();
            $table->string('original_name')->nullable();
            $table->string('file_size')->nullable();

            // Status: 'pending', 'ready', 'in_review'
            $table->string('status')->default('pending');

            $table->unique(['student_id', 'document_key']);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_documents');
    }
};
