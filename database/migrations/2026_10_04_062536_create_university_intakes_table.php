<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('university_intakes', function (Blueprint $table) {
            $table->id();

            $table->foreignUuid('university_id')
                ->constrained('universities')
                ->cascadeOnDelete();

            $table->string('name');
            $table->unsignedSmallInteger('year');
            $table->date('application_open_date')->nullable();
            $table->date('application_deadline')->nullable();

            $table->string('status')->default('upcoming');
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->unique([
                'university_id',
                'name',
                'year',
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('university_intakes');
    }
};