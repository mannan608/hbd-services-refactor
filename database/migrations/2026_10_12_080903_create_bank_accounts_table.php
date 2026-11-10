
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();

            // Employee relationship
            $table->foreignId('employee_id')
                ->constrained('employees')
                ->restrictOnDelete();

            // Bank information
            $table->string('bank_name', 120);
            $table->string('bank_branch', 120)->nullable();
            $table->string('routing_number', 50)->nullable();
            $table->string('account_name', 120);

            // Store encrypted account number if required.
            // Laravel encrypted values should use TEXT.
            $table->text('account_number');

            // Primary account
            $table->boolean('is_primary')->default(false);

            // Automatically populated by MySQL:
            // Primary account     => employee_id
            // Non-primary account => NULL
            $table->unsignedBigInteger('primary_employee_id')
                ->nullable()
                ->storedAs(
                    'CASE WHEN is_primary = 1 THEN employee_id ELSE NULL END'
                );

            $table->timestamps();

            // One primary bank account per employee
            $table->unique(
                'primary_employee_id',
                'bank_accounts_one_primary_per_employee_uq'
            );

            // Employee bank account lookups
            $table->index(
                ['employee_id', 'is_primary'],
                'bank_accounts_employee_primary_idx'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bank_accounts');
    }
};
