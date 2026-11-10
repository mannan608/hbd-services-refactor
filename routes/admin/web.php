<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CampusController;
use App\Http\Controllers\Admin\CourseCategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CourseIntakeController;
use App\Http\Controllers\Admin\UniversityIntakeController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\Admin\ScholarshipController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\UniversityController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProviderController;
use App\Http\Controllers\Admin\CounsellorController;
use App\Http\Controllers\Admin\LeadsController;
use App\Http\Controllers\Admin\CounsellorBookingController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\HR\BranchController;
use App\Http\Controllers\HR\DepartmentController;
use App\Http\Controllers\HR\DesignationController;
use App\Http\Controllers\HR\EmployeeController;
use App\Http\Controllers\HR\HolidayController;
use App\Http\Controllers\HR\LeaveTypeController;
use App\Http\Controllers\HR\TeamController;
use App\SEO\Controllers\SeoController;
use Illuminate\Support\Facades\Route;

Route::redirect('/admin/login', '/login')->name('admin.login.redirect');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

Route::post('/admin/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('admin.logout.redirect');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::prefix('{role}')
    ->name('role.')
    ->where(['role' => '[a-z0-9-]+'])
    ->middleware(['auth', 'active.user', 'role.prefix'])
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('backend.pages.dashboard.index', [
                'title' => 'Dashboard',
            ]);
        })->middleware('permission:dashboard.view')->name('dashboard');

        Route::resource('seo', SeoController::class)
            ->middleware('permission:seo.manage');

        Route::resource('blogs', BlogController::class)
            ->middleware('permission:blog.manage');

        Route::resource('events', EventController::class)
            ->middleware('permission:event.manage');

        Route::resource('roles-permissions', RolePermissionController::class);
        //Destinations
        Route::get('destinations', [DestinationController::class, 'index'])->name('destinations.index');
        Route::get('destinations/{country}', [DestinationController::class, 'universityList'])->name('destination.universities');

        Route::resource('users', UserController::class);
        Route::resource('universities', UniversityController::class);
        Route::get('campuses/cities', [CampusController::class, 'cities'])
            ->name('campuses.cities');
        Route::resource('campuses', CampusController::class);

        Route::resource('course-categories', CourseCategoryController::class);
        Route::resource('courses', CourseController::class);
        Route::resource('contacts', ContactController::class);
        Route::resource('subscribers', SubscriberController::class);
        Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::resource('university-intakes', UniversityIntakeController::class);
        Route::resource('course-intakes', CourseIntakeController::class);
        Route::resource('scholarships', ScholarshipController::class);
        Route::resource('counsellors', CounsellorController::class);

        Route::get('event-leads', [LeadsController::class, 'eventLeads'])->name('event-leads.index');
        Route::get('event-leads/{eventLead}', [LeadsController::class, 'show'])->name('event-leads.show');
        Route::delete('/event-leads/{eventLead}', [LeadsController::class, 'destroy'])->name('event-leads.destroy');

        Route::get('/account-settings', [CounsellorController::class, 'accountSetting'])->name('account.settings');

        Route::put('/account-settings', [CounsellorController::class, 'updateAccountSetting'])->name('account.settings.update');

        //booking session
        Route::get('booking-sessions', [CounsellorBookingController::class, 'index'])->name('booking-sessions.index');
        Route::get('booking-sessions/{bookingId}', [CounsellorBookingController::class, 'show'])->name('booking-sessions.show');
        Route::delete('booking-sessions/{bookingId}', [CounsellorBookingController::class, 'destroy'])->name('booking-sessions.destroy');
        Route::put('booking-sessions/{bookingId}', [CounsellorBookingController::class, 'update'])->name('booking-sessions.update');
        Route::get('students', [StudentController::class, 'index'])->name('students.index');
        Route::get('students/create', [StudentController::class, 'create'])->name('students.create');
        Route::get('students/add', [StudentController::class, 'addStudent'])->name('students.add');
        Route::get('students/bulk-import', [StudentController::class, 'bulkImport'])->name('students.import');
        Route::get('students/{student}', [StudentController::class, 'show'])->name('students.show');

        //Providers
        Route::resource('providers', ProviderController::class);

        Route::post('/providers/{provider}/scopes', [ProviderController::class, 'addNewScope'])->name('providers.scopes.store');
        Route::put('/providers/{provider}/scopes/{scope}', [ProviderController::class, 'editScope'])->name('providers.scopes.update');
        Route::delete('/providers/{provider}/scopes/{scope}', [ProviderController::class, 'deleteScope'])->name('providers.scopes.delete');

        // HR Route
        Route::resource('branches', BranchController::class);
        Route::resource('departments', DepartmentController::class);
        Route::resource('designations', DesignationController::class);
        Route::resource('teams', TeamController::class);
        Route::resource('employees', EmployeeController::class);

        // Update Personal / Basic Information
        Route::put('/basic-info', [EmployeeController::class, 'updateBasicInfo'])
            ->name('update.basic-info');

        // Update Address & Location
        Route::put('/address', [EmployeeController::class, 'updateAddress'])
            ->name('update.address');

        // Update Professional Information
        Route::put('/professional-info', [EmployeeController::class, 'updateProfessionalInfo'])
            ->name('update.professional-info');

        // Update Employment Details
        Route::put('/employment', [EmployeeController::class, 'updateEmployment'])
            ->name('update.employment');

        // Update Salary Details
        Route::put('/salary', [EmployeeController::class, 'updateSalary'])
            ->name('update.salary');

        // Update Bank Accounts
        Route::put('/bank', [EmployeeController::class, 'updateBank'])
            ->name('update.bank');

        // Update / Upload Documents
        Route::put('/documents', [EmployeeController::class, 'updateDocuments'])
            ->name('update.documents');

        Route::patch('holidays/{holiday}/toggle', [
            HolidayController::class,
            'toggle'
        ])->name('holidays.toggle');

        Route::resource('holidays', HolidayController::class);
        Route::resource('leave-types', LeaveTypeController::class);
    });
