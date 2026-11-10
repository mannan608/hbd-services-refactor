<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('holidays', function (Blueprint $table) {
            $table->id();

            $table->string('name', 150);
            $table->date('date');
            $table->date('end_date')->nullable();

            $table->boolean('is_multi_day')->default(false);
            $table->boolean('is_recurring')->default(false);
            $table->boolean('is_active')->default(true);

            $table->text('description')->nullable();

            $table->timestamps();

            $table->index('date', 'holidays_date_index');
            $table->index('end_date', 'holidays_end_date_index');
            $table->index(
                ['is_active', 'is_recurring', 'date'],
                'holidays_status_recurring_date_index'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('holidays');
    }
};