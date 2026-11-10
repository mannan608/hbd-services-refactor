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
        Schema::create('counsellor_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('counsellor_id')
                ->constrained('counsellors')
                ->cascadeOnDelete();

            $table->string('name');
            $table->string('email');
            $table->string('phone', 30);

            $table->string('service');

            $table->date('appointment_date');
            $table->time('appointment_time');

            $table->string('timezone')->nullable();

            $table->enum('status', [
                'pending',
                'confirmed',
                'completed',
                'cancelled',
            ])->default('pending');

            $table->text('notes')->nullable();

            $table->timestamps();

            $table->index(
                [
                    'counsellor_id',
                    'appointment_date',
                    'appointment_time'
                ],
                'cb_counsellor_date_time_idx'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counsellor_bookings');
    }
};
