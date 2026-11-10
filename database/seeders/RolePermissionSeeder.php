<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $permissions = [
            'dashboard.view',

            // User permissions
            'user.list',
            'user.view',
            'user.create',
            'user.edit',
            'user.delete',
            'user.impersonate',
            'user.status.change',

            // Role permissions
            'role.list',
            'role.view',
            'role.create',
            'role.edit',
            'role.delete',
            'role.manage',
                                   
            // Blog permissions
            'blog.list',
            'blog.view',
            'blog.create',
            'blog.edit',
            'blog.delete',
            'blog.publish',
            'blog.manage',

            // Event permissions
            'event.list',
            'event.view',
            'event.create',
            'event.edit',
            'event.delete',
            'event.manage',

            //event-leads
            'event-leads.list',
            'event-leads.view',
            'event-leads.delete',
            'event-leads.manage',

            // SEO permissions
            'seo.list',
            'seo.view',
            'seo.create',
            'seo.edit',
            'seo.delete',
            'seo.manage',

            // University permissions
            'university.list',
            'university.create',
            'university.view',
            'university.status.change',
            'university.edit',
            'university.delete',
            'university.manage',

            // Campus permissions
            'campus.list',
            'campus.create',
            'campus.view',
            'campus.edit',
            'campus.delete',

            // Provider permissions
            'provider.list',
            'provider.create',
            'provider.view',
            'provider.edit',
            'provider.delete',

         // course-categories
            'course-categories.list',
            'course-categories.index',
            'course-categories.create',
            'course-categories.show',
            'course-categories.edit',
            'course-categories.delete',
            'course-categories.status.change',
            'course-categories.manage',

            // Course permissions
            'course.list',
            'course.create',
            'course.view',
            'course.edit',
            'course.delete',
            'course.status.change',

            // Course Intake permissions
            'course-intakes.list',
            'course-intakes.index',
            'course-intakes.create',
            'course-intakes.show',
            'course-intakes.edit',
            'course-intakes.delete',
            'course-intakes.status.change',
            'course-intakes.manage',

            // Scholarship permissions
            'scholarships.list',
            'scholarships.create',
            'scholarships.view',
            'scholarships.edit',
            'scholarships.delete',
            'scholarships.status.change',
            'scholarships.manage',

            //contact
            'contact.list',
            'contact.view',
            'contact.delete',

            //subscriber
            'subscriber.list',
            'subscriber.view',
            'subscriber.delete',

            //counsellors
            // 'counsellors.list',
            // 'counsellors.view',
            // 'counsellors.create',
            // 'counsellors.edit',
            // 'counsellors.delete',

            //students
            'student.list',
            'student.view',
            'student.create',
            'student.add',
            'student.bulk-import',       
            'student.delete',
            'student.manage',

            // bookings 
            'bookings.list',
            'bookings.view',
            'bookings.update',                        
            'bookings.delete',
            'bookings.manage',

            //destinations
            'destinations.list',

            // University Intake permissions
            'university-intakes.list',
            'university-intakes.index',
            'university-intakes.create',
            'university-intakes.show',
            'university-intakes.edit',
            'university-intakes.delete',
            'university-intakes.status.change',
            'university-intakes.manage',

            // HR permissions

            //branches
            'branch.list',
            'branch.create',
            'branch.edit',
            'branch.delete',
            'branch.status.change',
            'branch.manage',

            // departments
            'department.list',
            'department.create',
            'department.edit',
            'department.delete',
            'department.status.change',
            'department.manage',

            // teams
            'team.list',
            'team.create',
            'team.edit',
            'team.delete',
            'team.status.change',
            'team.manage',

            // designations
            'designation.list',
            'designation.create',
            'designation.edit',
            'designation.delete',
            'designation.status.change',
            'designation.manage',

            // employees
            'employee.list',
            'employee.create',
            'employee.edit',
            'employee.delete',
            'employee.status.change',
            'employee.manage',

            // holidays
            'holiday.list',
            'holiday.create',
            'holiday.edit',
            'holiday.delete',
            'holiday.status.change',
            'holiday.manage',

            //leave types
            'leave-type.list',
            'leave-type.create',
            'leave-type.edit',
            'leave-type.delete',
            'leave-type.status.change',
            'leave-type.manage',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => config('rbac.default_guard', 'web'),
            ]);
        }

        //super admin role 1
        $superAdmin = Role::firstOrCreate([
            'name' => config('rbac.super_admin_role'),
            'guard_name' => config('rbac.default_guard', 'web'),
        ]); 
        // admin role 2     

        $adminRole = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => config('rbac.default_guard', 'web'),
        ]);

        // default role 3
         $defaultRole = Role::firstOrCreate([
            'name' => 'default',
            'guard_name' => config('rbac.default_guard', 'web'),
        ]);

        // student role 4
         $studentRole = Role::firstOrCreate([
            'name' => 'student',
            'guard_name' => config('rbac.default_guard', 'web'),
        ]);

            // counsellor  role 5
        //  $counsellorRole = Role::firstOrCreate([
        //     'name' => 'counsellor',
        //     'guard_name' => config('rbac.default_guard', 'web'),
        // ]);

           // employee  role 5
         $employeeRole = Role::firstOrCreate([
            'name' => 'employee',
            'guard_name' => config('rbac.default_guard', 'web'),
        ]);

        $adminRole->syncPermissions($permissions);
        $superAdmin->syncPermissions($permissions);
        $defaultRole->syncPermissions(['dashboard.view']);
        $studentRole->syncPermissions([]);
        // $counsellorRole->syncPermissions([]);
        $employeeRole->syncPermissions([]);

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
