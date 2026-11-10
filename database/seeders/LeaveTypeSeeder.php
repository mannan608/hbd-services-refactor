<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Seed the application's default leave types.
     */
    public function run(): void
    {
        $leaveTypes = [
            [
                'name' => 'Casual Leave',
                'slug' => 'casual',
                'max_days_per_year' => 10,
                'description' => 'For personal or urgent work.',
                'requires_approval' => true,
                'requires_document' => false,
                'is_paid' => true,
                'can_carry_forward' => true,
                'carry_forward_limit' => 5,
                'applicable_during_probation' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Sick Leave',
                'slug' => 'sick',
                'max_days_per_year' => 14,
                'description' => 'Medical leave with a certificate required according to company policy.',
                'requires_approval' => false,
                'requires_document' => true,
                'is_paid' => true,
                'can_carry_forward' => false,
                'carry_forward_limit' => 0,
                'applicable_during_probation' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Annual Leave',
                'slug' => 'annual',
                'max_days_per_year' => 21,
                'description' => 'Yearly paid vacation leave.',
                'requires_approval' => true,
                'requires_document' => false,
                'is_paid' => true,
                'can_carry_forward' => true,
                'carry_forward_limit' => 10,
                'applicable_during_probation' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Unpaid Leave',
                'slug' => 'unpaid',
                'max_days_per_year' => 30,
                'description' => 'Unpaid leave without salary payment.',
                'requires_approval' => true,
                'requires_document' => false,
                'is_paid' => false,
                'can_carry_forward' => false,
                'carry_forward_limit' => 0,
                'applicable_during_probation' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Replacement Leave',
                'slug' => 'replacement',
                'max_days_per_year' => 0,
                'description' => 'Leave granted in replacement for eligible additional working days.',
                'requires_approval' => true,
                'requires_document' => false,
                'is_paid' => true,
                'can_carry_forward' => false,
                'carry_forward_limit' => 0,
                'applicable_during_probation' => true,
                'is_active' => true,
            ],
        ];

        foreach ($leaveTypes as $leaveType) {
            \App\Models\hrm\LeaveType::updateOrCreate(
                ['slug' => $leaveType['slug']],
                $leaveType
            );
        }
    }
}
