<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Course;
use App\Models\University;
use App\Models\UniversityIntake;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __construct(private readonly CourseRepositoryInterface $courses) {}

    public function courses(Request $request)
    {

        $filters = [
            'search' => $request->input('search'),

            'qualification' => $request->input('qualification'),

            'provider' => $request->input('provider'),

            'country' => $request->input('country'),

            'max_fee' => $request->input('max_fee'),

            'ielts_score' => $request->input('ielts_score'),

            'scholarship' => $request->boolean('scholarship'),

            'intake' => $request->input('intake'),

            'sort' => $request->input('sort', 'relevance'),
        ];

        /*
        |--------------------------------------------------------------------------
        | Courses
        |--------------------------------------------------------------------------
        */

        $courses = $this->courses->paginate(filters: $filters, perPage: 15);

        /*
        |--------------------------------------------------------------------------
        | Filter Data
        |--------------------------------------------------------------------------
        */

        $qualifications = $this->courses->getDegreeLevels();

        $providers = University::query()
            ->get(['id', 'name']);
        $providerCount = $providers->count();

        $countries = Country::query()
            ->get(['id', 'name']);

        $intakes = UniversityIntake::query()
            ->with('university:id,name')
            ->get([
                'id',
                'university_id',
                'name',
                'year',
                'status',
            ])
            ->unique(fn($intake) => $intake->name . '-' . $intake->year)
            ->values();

        /*
        |--------------------------------------------------------------------------
        | Statistics
        |--------------------------------------------------------------------------
        */

        $courseCount = $courses->total();

        /*
        |--------------------------------------------------------------------------
        | Current Filter State
        |--------------------------------------------------------------------------
        */

        $selectedFilters = [
            'search' => $request->input('search'),

            'qualification' => $request->input('qualification'),

            'provider' => $request->input('provider'),

            'country' => $request->input('country'),

            'max_fee' => $request->input('max_fee', 60000),

            'ielts_score' => $request->input('ielts_score', 8.0),

            'scholarship' => $request->boolean('scholarship'),

            'intake' => $request->input('intake'),

            'sort' => $request->input('sort', 'relevance'),
        ];

        // return $qualifications;

        return view('frontend.pages.courses.courses', compact('courses', 'qualifications', 'providers', 'countries', 'intakes', 'selectedFilters', 'courseCount','providerCount'));
    }

    /*
    |--------------------------------------------------------------------------
    | Course Details
    |--------------------------------------------------------------------------
    */

    public function coursesDetails(Course $course)
    {
        $course = $this->courses->findById($course->id);

        $relatedCourses = $this->courses->relatedCourses($course, 4);

        // return $relatedCourses;

        return view('frontend.pages.courses.course-details', compact('course', 'relatedCourses'));
    }
}
