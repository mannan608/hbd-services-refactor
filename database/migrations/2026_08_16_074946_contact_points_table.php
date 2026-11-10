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
        Schema::create('contact_points', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->enum('type', [
                'phone',
                'email',
            ]);

            $table->string('value', 191);

            $table->string('normalized_value', 191);
            // Only meaningful for phone contacts
            $table->boolean('is_whatsapp')
                ->default(false);

            $table->timestamps();

            $table->unique('normalized_value');

            $table->index([
                'user_id',
                'type',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_points');
    }
};
