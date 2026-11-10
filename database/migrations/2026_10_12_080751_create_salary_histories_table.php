
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('salary_histories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('employee_id')
                ->constrained('employees')
                ->restrictOnDelete();

            // Total agreed salary for this effective period.
            $table->decimal('salary_amount', 15, 2);

            // ISO 4217 currency code, e.g. BDT.
            $table->char('currency_code', 3)->default('BDT');

            $table->string('salary_type', 24)->default('monthly');

            $table->date('effective_from');
            $table->date('effective_to')->nullable();

            $table->text('remarks')->nullable();

            $table->timestamps();

            // Prevent duplicate salary starts for one employee.
            $table->unique(
                ['employee_id', 'effective_from'],
                'salary_employee_effective_from_uq'
            );

            $table->index(
                ['employee_id', 'effective_to'],
                'salary_employee_effective_to_idx'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('salary_histories');
    }
};
