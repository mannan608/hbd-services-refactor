<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('name', 100);
            $table->string('slug', 120)->unique();
            $table->char('code', 2)->unique();

            $table->string('phone_code', 10)->nullable();
            $table->string('flag_url')->nullable();
            $table->char('currency_code', 3)->nullable();

            $table->text('visa_requirements')->nullable();

            $table->boolean('is_popular')->default(false);
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};