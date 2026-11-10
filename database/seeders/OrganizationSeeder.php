<?php

namespace Database\Seeders;

use App\Models\hrm\Branch;
use App\Models\hrm\Department;
use App\Models\hrm\Designation;
use App\Models\hrm\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            /*
             * 1. Branches
             */
            $branches = [
                [
                    'code' => 'DHK-HO',
                    'name' => 'Main Branch',
                    'is_active' => true,
                ],
                [
                    'code' => 'DHK-02',
                    'name' => 'Dhaka Branch',
                    'is_active' => true,
                ],
                [
                    'code' => 'CTG-01',
                    'name' => 'Chattogram Branch',
                    'is_active' => true,
                ],
                [
                    'code' => 'SYL-01',
                    'name' => 'Sylhet Branch',
                    'is_active' => true,
                ],
                [
                    'code' => 'RAJ-01',
                    'name' => 'Rajshahi Branch',
                    'is_active' => true,
                ],
            ];

            foreach ($branches as $data) {
                Branch::updateOrCreate(
                    ['code' => $data['code']],
                    $data
                );
            }

            $mainBranch = Branch::where('code', 'DHK-HO')
                ->firstOrFail();

            $dhakaBranch = Branch::where('code', 'DHK-02')
                ->firstOrFail();

            $chattogramBranch = Branch::where('code', 'CTG-01')
                ->firstOrFail();

            $sylhetBranch = Branch::where('code', 'SYL-01')
                ->firstOrFail();

            $rajshahiBranch = Branch::where('code', 'RAJ-01')
                ->firstOrFail();

            /*
             * 2. Departments
             */
            $departments = [
                [
                    'code' => 'HR',
                    'name' => 'Human Resources',
                    'branch_id' => $mainBranch->id,
                    'is_active' => true,
                ],
                [
                    'code' => 'IT',
                    'name' => 'Information Technology',
                    'branch_id' => $mainBranch->id,
                    'is_active' => true,
                ],
                [
                    'code' => 'FIN',
                    'name' => 'Finance & Accounts',
                    'branch_id' => $dhakaBranch->id,
                    'is_active' => true,
                ],
                [
                    'code' => 'MKT',
                    'name' => 'Marketing',
                    'branch_id' => $chattogramBranch->id,
                    'is_active' => true,
                ],
                [
                    'code' => 'OPS',
                    'name' => 'Operations',
                    'branch_id' => $sylhetBranch->id,
                    'is_active' => true,
                ],
            ];

            foreach ($departments as $data) {
                Department::updateOrCreate(
                    ['code' => $data['code']],
                    $data
                );
            }

            // Teams are keyed by department and name because the teams table
            // does not have a code column.
            $teams = [
                ['department_code' => 'HR', 'name' => 'People Operations'],
                ['department_code' => 'IT', 'name' => 'Application Development'],
                ['department_code' => 'FIN', 'name' => 'Accounts'],
                ['department_code' => 'MKT', 'name' => 'Digital Marketing'],
                ['department_code' => 'OPS', 'name' => 'Operations'],
            ];

            foreach ($teams as $data) {
                $team = Team::withTrashed()->firstOrNew([
                    'department_id' => Department::where('code', $data['department_code'])->value('id'),
                    'name' => $data['name'],
                ]);
                $team->deleted_at = null;
                $team->save();
            }

            /*
             * 3. Designations
             */
            $designations = [
                [
                    'code' => 'CEO',
                    'name' => 'Chief Executive Officer',
                    'is_active' => true,
                ],
                [
                    'code' => 'MGR',
                    'name' => 'Manager',
                    'is_active' => true,
                ],
                [
                    'code' => 'SWE',
                    'name' => 'Software Engineer',
                    'is_active' => true,
                ],
                [
                    'code' => 'ACC',
                    'name' => 'Accountant',
                    'is_active' => true,
                ],
                [
                    'code' => 'HR-EX',
                    'name' => 'HR Executive',
                    'is_active' => true,
                ],
            ];

            foreach ($designations as $data) {
                Designation::updateOrCreate(
                    ['code' => $data['code']],
                    $data
                );
            }
        });
    }
}
