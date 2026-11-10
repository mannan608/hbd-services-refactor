<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('event_registrations', function (Blueprint $table) {
            $table->uuid('id')->primary();

             $table->foreignId('event_id');

            $table->string('full_name', 150);
            $table->string('email', 191);
            $table->string('phone', 50)->nullable();
            $table->string('whatsapp', 50)->nullable();

            $table->string('interested_course')->nullable();
            $table->text('message')->nullable();

            // registered, confirmed, attended, cancelled
            $table->string('status', 30)->default('registered');

            // website, facebook, agent etc.
            $table->string('source', 50)->default('website');

            $table->timestamps();

            // Foreign key
            $table->foreign('event_id')
                ->references('id')
                ->on('events')
                ->cascadeOnDelete();

            // Useful indexes
            $table->index('email');
            $table->index('status');
            $table->index('source');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_registrations');
    }
};