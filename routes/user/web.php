<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\Calculator;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\CounsellorController;
use App\Http\Controllers\Frontend\CourseController;
use App\Http\Controllers\Frontend\DestinationController;
use App\Http\Controllers\Frontend\ProviderController;
use App\Http\Controllers\Frontend\EventController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\EventRegistrationController;
use App\Http\Controllers\Frontend\ReferralController;
use App\Http\Controllers\Frontend\ServicesController;
use App\Http\Controllers\Frontend\UniversityController;
use App\Http\Controllers\Student\ProfileController;
use App\SEO\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

//Routes
Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('/signup', function () {
    return view('backend.pages.auth.signup');
})->name('signup');

Route::get('/generate-sitemap', [SitemapController::class, 'generate']);

//static pages
Route::get('/', [FrontendController::class, 'homePage'])->name('home');
Route::get('/destinations', [DestinationController::class, 'destinations'])->name('destinations');
Route::get('/destinations/{slug}', [DestinationController::class, 'show'])->name('destination.details');
// Route::get('/how-we-works', [FrontendController::class, 'howWeWork'])->name('how-we-works');
Route::get('/about-us', [FrontendController::class, 'aboutPage'])->name('about');
Route::get('/contact-us', [FrontendController::class, 'contactPage'])->name('contact');

// Route::get('/can-achieve', [FrontendController::class, 'achieve'])->name('achieve');

Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-conditions', [FrontendController::class, 'termsConditions'])->name('terms-conditions');
Route::get('/ceo', [FrontendController::class, 'owner'])->name('owner');
Route::get('/digital-solutions', [FrontendController::class, 'digitalSolution'])->name('digital-solution');

Route::get('/universities', [UniversityController::class, 'index'])->name('universities');
Route::get('/universities/{slug}', [UniversityController::class, 'show'])->name('university.details');

//counselling or consultation
Route::get('/counselling', [CounsellorController::class, 'bookingAppointment'])->name('counselling');


//dynami pages
Route::get('/events/{event}/register', [EventRegistrationController::class, 'create'])->name('events.register');
Route::post('/events/{event}/register', [EventRegistrationController::class, 'store'])->name('events.register.store');

//dynami pages
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blog-details');


Route::get('/courses', [CourseController::class, 'courses'])->name('courses');
Route::get('/courses/{course:slug}', [CourseController::class, 'coursesDetails'])->name('course-details');

Route::get('/providers', [ProviderController::class, 'providers'])->name('providers');
Route::get('/provider-details', [ProviderController::class, 'providerDetails'])->name('provider-details');


// counsellors
Route::get('/counsellors', [CounsellorController::class, 'index'])->name('counsellors');
Route::get('/counsellors/{counsellor}', [CounsellorController::class, 'show'])
    ->name('counsellor.details');

Route::get('/counsellors/{counsellor}/booking', [CounsellorController::class, 'bookingCounsellor'])
    ->name('counsellor.booking');

Route::post('/counsellors/{counsellor}/booking', [CounsellorController::class, 'storeBooking'])
    ->name('booking-session');


//Events
Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/events/{event}', [EventController::class, 'show'])->name('event-details');

Route::get('/services', [ServicesController::class, 'index'])->name('services');

Route::post('/inquiry-us', [ContactController::class, 'store'])->name('contact.store');
Route::get('/visa-points-calculator', [Calculator::class, 'visaPoints'])->name('visa-points-calculator');
Route::get('/referral', [ReferralController::class, 'index'])->name('referral');


// Route::post('/subscribe', [SubscriberController::class, 'store'])
//     ->name('subscribe.store');

//student routes
Route::prefix('student')
    ->name('student.')
    ->middleware(['auth', 'active.user'])
    ->group(function () {
        Route::get('/dashboard', [StudentController::class, 'dashboard'])
            ->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        
        // student account settings
        Route::get('/account/settings', [ProfileController::class, 'accountSettings'])->name('account.settings');
        Route::put('/account/personal-information', [ProfileController::class, 'updatePersonalInformation'])->name('account.personal-information.update');
        Route::put('/account/academic-information', [ProfileController::class, 'updateAcademicInformation'])->name('account.academic-information.update');
        Route::put('/account/study-plan', [ProfileController::class, 'updateStudyPlan'])->name('account.study-plan.update');
        Route::put('/account/work-experience', [ProfileController::class, 'updateWorkExperience'])->name('account.work-experience.update');
        Route::put('/account/immigration-history', [ProfileController::class, 'updateImmigrationHistory'])->name('account.immigration-history.update');
        Route::put('/account/visa-documents-checklist', [ProfileController::class, 'updateVisaDocumentsChecklist'])->name('account.visa-documents-checklist.update');

    });
