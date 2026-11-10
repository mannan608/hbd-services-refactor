<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseIntake;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CourseIntakeController extends Controller
{
    /**
     * Display a listing of course intakes.
     */
    public function index(Request $request): View
    {
        $request->user()->can('course-intakes.list') || abort(403);

        $intakes = CourseIntake::with('course')->latest()->paginate(15);

        // return $intakes;

        return view('backend.pages.course-intakes.index', [
            'intakes' => $intakes,
        ]);
    }

    /**
     * Show the form for creating a new intake.
     */
    public function create(Request $request): View
    {
        $request->user()->can('course-intakes.create') || abort(403);

        $courses = Course::query()
            ->select('id', 'title')
            ->orderBy('title')
            ->get();

        return view('backend.pages.course-intakes.create', [
            'intake' => null,
            'courses' => $courses,
        ]);
    }

    /**
     * Store a newly created intake.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->user()->can('course-intakes.create') || abort(403);

        $validated = $request->validate([
            'course_id' => ['required', 'uuid', 'exists:courses,id'],
            'intake_month' => ['required', 'string', 'max:20'],
            'intake_year' => ['required', 'integer', 'min:2000', 'max:2100'],
            'application_deadline' => ['required', 'date'],
            'start_date' => ['nullable', 'date', 'before_or_equal:application_deadline'],
            'status' => ['required', Rule::in(['open', 'closed', 'upcoming'])],
        ]);

        // Prevent duplicate intake
        $exists = CourseIntake::query()->where('course_id', $validated['course_id'])->where('intake_month', $validated['intake_month'])->where('intake_year', $validated['intake_year'])->exists();

        if ($exists) {
            return back()
                ->withInput()
                ->withErrors([
                    'intake_month' => 'This intake already exists for the selected course.',
                ]);
        }

        CourseIntake::create($validated);

        return redirect(role_route('role.course-intakes.index'))
            ->with('success', 'Course intake created successfully.');
    }

    /**
     * Show the form for editing the specified intake.
     */
 public function edit(Request $request, string $role, $course_intake): View
{
    $request->user()->can('course-intakes.edit') || abort(403);

    $courseIntake = CourseIntake::where('id', $course_intake)->first();

    if (!$courseIntake) {
        abort(404, 'Course Intake not found: ' . $course_intake);
    }

    $courses = Course::query()
        ->select('id', 'title')
        ->orderBy('title')
        ->get();

    return view('backend.pages.course-intakes.edit', [
        'intake' => $courseIntake,
        'courses' => $courses,
    ]);
}

    /**
     * Update the specified intake.
     */
 public function update(Request $request, string $role, $course_intake): RedirectResponse
{
    $request->user()->can('course-intakes.edit') || abort(403);

    $courseIntake = CourseIntake::findOrFail($course_intake);

    $validated = $request->validate([
        'course_id' => ['required', 'uuid', 'exists:courses,id'],
        'intake_month' => ['required', 'string', 'max:20'],
        'intake_year' => ['required', 'integer', 'min:2000', 'max:2100'],
        'application_deadline' => ['required', 'date'],
        'start_date' => [
            'nullable',
            'date',
            'before_or_equal:application_deadline',
        ],
        'status' => [
            'required',
            Rule::in(['open', 'closed', 'upcoming']),
        ],
    ]);

    $exists = CourseIntake::query()
        ->where('course_id', $validated['course_id'])
        ->where('intake_month', $validated['intake_month'])
        ->where('intake_year', $validated['intake_year'])
        ->where('id', '!=', $courseIntake->id)
        ->exists();

    if ($exists) {
        return back()
            ->withInput()
            ->withErrors([
                'intake_month' => 'This intake already exists for the selected course.',
            ]);
    }

    $courseIntake->update($validated);

    return redirect(role_route('role.course-intakes.index'))
        ->with('success', 'Course intake updated successfully.');
}
    /**
     * Remove the specified intake.
     */
    public function destroy(Request $request, string $role, CourseIntake $course_intake): RedirectResponse
    {
        $request->user()->can('course-intakes.delete') || abort(403);

        $course_intake->delete();

        return redirect(role_route('role.course-intakes.index'))
            ->with('success', 'Course intake deleted successfully.');
    }
}
