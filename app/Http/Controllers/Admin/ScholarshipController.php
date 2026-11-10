<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreScholarshipRequest;
use App\Http\Requests\UpdateScholarshipRequest;
use App\Models\Course;
use App\Models\Scholarship;
use App\Models\University;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    /**
     * Display scholarships.
     */
    public function index(Request $request)
    {
        $request->user()->can('scholarships.list') || abort(403);

        $scholarships = Scholarship::select('id', 'university_id', 'course_id', 'title', 'amount_description', 'coverage_type', 'eligibility_criteria', 'deadline', 'is_active')
            ->with(['university:id,name', 'course:id,title'])
            ->latest()
            ->paginate(15);

        return view('backend.pages.scholarships.index', [
            'scholarships' => $scholarships,
        ]);
    }

    /**
     * Show create form.
     */
    public function create(Request $request)
    {
        $request->user()->can('scholarships.create') || abort(403);

        return view('backend.pages.scholarships.create', [
            'scholarship' => null,
            'universities' => University::query()->orderBy('name')->get(),
            'courses' => Course::query()->orderBy('title')->get(),
        ]);
    }

    /**
     * Store scholarship.
     */
    public function store(StoreScholarshipRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['is_active'] = $request->boolean('is_active');

        Scholarship::create($data);

        return redirect()
            ->to(role_route('role.scholarships.index'))
            ->with('success', 'Scholarship created successfully.');
    }

    /**
     * Show edit form.
     */
    public function edit(Request $request, string $role, Scholarship $scholarship)
    {
        $request->user()->can('scholarships.edit') || abort(403);

        return view('backend.pages.scholarships.edit', [
            'scholarship' => $scholarship->load(['university', 'course']),
            'universities' => University::query()->orderBy('name')->get(),
            'courses' => Course::query()->orderBy('title')->get(),
        ]);
    }

    /**
     * Update scholarship.
     */
    public function update(string $role, UpdateScholarshipRequest $request, Scholarship $scholarship): RedirectResponse
    {
        $scholarship->update($request->validated());

        return redirect()
            ->to(role_route('role.scholarships.index'))
            ->with('success', 'Scholarship updated successfully.');
    }

    /**
     * Delete scholarship.
     */
    public function destroy(Request $request, string $role, Scholarship $scholarship): RedirectResponse
    {
        $request->user()->can('scholarships.delete') || abort(403);

        $scholarship->delete();

        return redirect()
            ->to(role_route('role.scholarships.index'))
            ->with('success', 'Scholarship deleted successfully.');
    }
}
