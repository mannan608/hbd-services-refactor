
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('employee_id')
                ->constrained('employees')
                ->restrictOnDelete();

            // Unique for each employment record.
            $table->string('employee_code', 50)->unique();

            // Organizational assignment
            $table->foreignId('department_id')
                ->nullable()
                ->constrained('departments')
                ->nullOnDelete();

            $table->foreignId('branch_id')
                ->nullable()
                ->constrained('branches')
                ->nullOnDelete();

            $table->foreignId('team_id')
                ->nullable()
                ->constrained('teams')
                ->nullOnDelete();

            $table->foreignId('designation_id')
                ->nullable()
                ->constrained('designations')
                ->nullOnDelete();

            // Prefer a lookup table if work types are configurable.
            $table->string('work_type', 20)->default('onsite');

            $table->string('employment_status', 32)
                ->default('probation');

            $table->json('weekend_days')->nullable();

            $table->date('joining_date');
            $table->date('resignation_date')->nullable();
            $table->date('last_working_day')->nullable();

            // One current employment period per employee.
            $table->boolean('is_current')->default(true);

            // MySQL generated column: only current records receive
            // an employee ID; historical records receive NULL.
            // A unique index then prevents duplicate current records.
            $table->unsignedBigInteger('current_employee_id')
                ->nullable()
                ->storedAs(
                    'CASE WHEN is_current = 1 THEN employee_id ELSE NULL END'
                );

            $table->timestamps();

            $table->unique(
                'current_employee_id',
                'employments_one_current_per_employee_uq'
            );

            $table->index(
                ['employee_id', 'joining_date'],
                'employments_employee_joining_idx'
            );

            $table->index(
                ['branch_id', 'employment_status'],
                'employments_branch_status_idx'
            );

            $table->index(
                ['department_id', 'employment_status'],
                'employments_department_status_idx'
            );

            $table->index(
                ['designation_id', 'is_current'],
                'employments_designation_current_idx'
            );

            $table->index(
                ['employment_status', 'is_current'],
                'employments_status_current_idx'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employments');
    }
};
