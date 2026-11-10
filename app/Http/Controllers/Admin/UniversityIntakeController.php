<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\University;
use App\Models\UniversityIntake;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UniversityIntakeController extends Controller
{
      /**
     * Display a listing of the university intakes.
     */
    public function index(Request $request, string $role)
    {
        $request->user()->can('university-intakes.list') || abort(403);

        $intakes = UniversityIntake::query()
            ->with('university:id,name')
            ->latest()
            ->paginate(15);

        // return $intakes;

        return view('backend.pages.university-intakes.index', [
            'intakes' => $intakes,
        ]);
    }

    /**
     * Show the form for creating a new intake.
     */
 public function create(Request $request, string $role): View
{
    $request->user()->can('university-intakes.create') || abort(403);

    $university = null;

    if ($request->filled('university')) {
        $university = University::findOrFail($request->university);
    }

    $universities = University::query()
        ->select('id', 'name')
        ->where('is_active', true)
        ->orderBy('name')
        ->get();

    // return $universities;

    return view('backend.pages.university-intakes.create', [
        'intake' => null,
        'university' => $university,
        'universities' => $universities,
    ]);
}

    /**
     * Store a newly created intake.
     */
    public function store(Request $request, string $role): RedirectResponse
    {
        $request->user()->can('university-intakes.create') || abort(403);

        $validated = $request->validate([
            'university_id' => ['required', 'uuid', 'exists:universities,id'],
            'name' => ['required', 'string', 'max:100'],
            'year' => ['required', 'integer', 'min:2000', 'max:2100'],
            'application_open_date' => ['nullable', 'date'],
            'application_deadline' => [
                'nullable',
                'date',
                'after_or_equal:application_open_date',
            ],
            'status' => [
                'required',
                Rule::in(['open', 'closed', 'upcoming']),
            ],
            'is_active' => ['boolean'],
        ]);

        $exists = UniversityIntake::query()
            ->where('university_id', $validated['university_id'])
            ->where('name', $validated['name'])
            ->where('year', $validated['year'])
            ->exists();

        if ($exists) {
            return back()
                ->withInput()
                ->withErrors([
                    'name' => 'This intake already exists for the selected university and year.',
                ]);
        }

        UniversityIntake::create($validated);

        return redirect(role_route('role.university-intakes.index'))
            ->with('success', 'University intake created successfully.');
    }

    /**
     * Display the specified intake.
     */
    public function show(
        Request $request,
        string $role,
        UniversityIntake $universityIntake
    ): View {
        $request->user()->can('university-intakes.view') || abort(403);

        $universityIntake->load('university:id,name');

        return view('backend.pages.university-intakes.show', [
            'intake' => $universityIntake,
        ]);
    }

    /**
     * Show the form for editing the specified intake.
     */
    public function edit(
        Request $request,
        string $role,
        UniversityIntake $universityIntake
    ): View {
        $request->user()->can('university-intakes.edit') || abort(403);

        $universityIntake->load('university:id,name');

        return view('backend.pages.university-intakes.edit', [
            'intake' => $universityIntake,
            'university' => $universityIntake->university,
        ]);
    }

    /**
     * Update the specified intake.
     */
    public function update(
        Request $request,
        string $role,
        UniversityIntake $universityIntake
    ): RedirectResponse {
        $request->user()->can('university-intakes.edit') || abort(403);

        $validated = $request->validate([
            'university_id' => ['required', 'uuid', 'exists:universities,id'],
            'name' => ['required', 'string', 'max:100'],
            'year' => ['required', 'integer', 'min:2000', 'max:2100'],
            'application_open_date' => ['nullable', 'date'],
            'application_deadline' => [
                'nullable',
                'date',
                'after_or_equal:application_open_date',
            ],
            'status' => [
                'required',
                Rule::in(['open', 'closed', 'upcoming']),
            ],
            'is_active' => ['boolean'],
        ]);

        $exists = UniversityIntake::query()
            ->where('university_id', $validated['university_id'])
            ->where('name', $validated['name'])
            ->where('year', $validated['year'])
            ->where('id', '!=', $universityIntake->id)
            ->exists();

        if ($exists) {
            return back()
                ->withInput()
                ->withErrors([
                    'name' => 'This intake already exists for the selected university and year.',
                ]);
        }

        $universityIntake->update($validated);

        return redirect(role_route('role.university-intakes.index'))
            ->with('success', 'University intake updated successfully.');
    }

    /**
     * Remove the specified intake.
     */
    public function destroy(
        Request $request,
        string $role,
        UniversityIntake $universityIntake
    ): RedirectResponse {
        $request->user()->can('university-intakes.delete') || abort(403);

        $universityIntake->delete();

        return redirect(role_route('role.university-intakes.index'))
            ->with('success', 'University intake deleted successfully.');
    }
}
