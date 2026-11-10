
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employee_documents', function (Blueprint $table) {
            $table->id();

            // Employee relationship
            $table->foreignId('employee_id')
                ->constrained('employees')
                ->restrictOnDelete();

            // Document information
            $table->string('document_key', 100);

            $table->string('file_path');
            $table->string('original_name');
            $table->string('mime_type', 100)->nullable();
            $table->unsignedBigInteger('file_size')->nullable();

            // Upload audit
            $table->foreignId('uploaded_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();

            // One document per key — re-uploading replaces it
            $table->unique(
                ['employee_id', 'document_key'],
                'employee_documents_unique_key'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employee_documents');
    }
};
