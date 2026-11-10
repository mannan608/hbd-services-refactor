
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leave_types', function (Blueprint $table) {
            $table->id();

            // Basic information
            $table->string('name', 100);
            $table->string('slug', 50)->unique();

            // Leave allowance
            $table->unsignedSmallInteger('max_days_per_year')->default(0);

            // Leave policies
            $table->text('description')->nullable();
            $table->boolean('requires_approval')->default(true);
            $table->boolean('requires_document')->default(false);
            $table->boolean('is_paid')->default(true);

            // Carry-forward policy
            $table->boolean('can_carry_forward')->default(false);
            $table->unsignedSmallInteger('carry_forward_limit')->default(0);

            // Eligibility and status
            $table->boolean('applicable_during_probation')->default(true);
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            // Optional index for active leave type listings
            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leave_types');
    }
};
