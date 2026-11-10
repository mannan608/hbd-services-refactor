<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\University;
use App\Models\UniversityCampus;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function __construct(private readonly CourseRepositoryInterface $courses) {}

    public function index(Request $request)
    {
        $request->user()->can('course.list') || abort(403);
        $courses = $this->courses->paginate();
        // return $courses;

        return view('backend.pages.courses.index', [
            'courses' => $courses,
            'title' => 'Courses',
        ]);
    }

    public function create(Request $request): View
    {
        $request->user()->can('course.create') || abort(403);
        $categories = CourseCategory::query()->orderBy('name')->get();

        $universities = University::query()
            ->select(['id', 'name'])
            ->orderBy('name')
            ->get();

        $campuses = UniversityCampus::query()
            ->select(['id', 'university_id', 'name'])
            ->orderBy('name')
            ->get();

        $campusOptions = $campuses->mapWithKeys(
            fn($campus) => [
                $campus->id => $campus->name,
            ]
        )->toArray();


        return view('backend.pages.courses.create', [
            'course' => null,
            'universities' => $universities,
            'campuses' => $campuses,
            'campusOptions' => $campusOptions,
            'categories' => $categories,
        ]);
    }

    public function store(StoreCourseRequest $request): RedirectResponse
    {
        $this->courses->create($request->validated(), $request);

        Cache::forget('navbar_courses');

        return redirect()
            ->route('role.courses.index', [
                'role' => $request->route('role'),
            ])
            ->with('success', 'Course created successfully.');
    }

    public function show(Request $request, string $role, Course $course)
    {
        $request->user()->can('course.view') || abort(403);

        $course->load([
            'university:id,name',
            'campuses:id,name',
            'category:id,name',
        ]);

        // return $course;

        return view('backend.pages.courses.show', [
            'course' => $course,
            'title' => 'Course Details',
        ]);
    }

    public function edit(Request $request, string $role, Course $course): View
    {
        $request->user()->can('course.edit') || abort(403);

        $categories = CourseCategory::query()->orderBy('name')->get();

        $universities = University::query()
            ->select(['id', 'name'])
            ->orderBy('name')
            ->get();

        $campuses = UniversityCampus::query()
            ->select(['id', 'university_id', 'name'])
            ->orderBy('name')
            ->get();

        $campusOptions = $campuses->mapWithKeys(
            fn($campus) => [
                $campus->id => $campus->name,
            ]
        )->toArray();


        return view('backend.pages.courses.edit', [
            'course' => $course,
            'universities' => $universities,
            'campuses' => $campuses,
            'campusOptions' => $campusOptions,
            'categories' => $categories,
            'title' => 'Edit Course',
        ]);
    }

    public function update(UpdateCourseRequest $request, string $role, Course $course): RedirectResponse
    {
        $this->courses->update($course, $request->validated(), $request);

        Cache::forget('navbar_courses');

        return redirect()
            ->route('role.courses.index', [
                'role' => $request->route('role'),
            ])
            ->with('success', 'Course updated successfully.');
    }

    public function destroy(Request $request, string $role, Course $course): RedirectResponse
    {
        $request->user()->can('course.delete') || abort(403);

        $this->courses->delete($course);

        Cache::forget('navbar_courses');

        return redirect()
            ->route('role.courses.index', [
                'role' => $role,
            ])
            ->with('success', 'Course deleted successfully.');
    }
}
