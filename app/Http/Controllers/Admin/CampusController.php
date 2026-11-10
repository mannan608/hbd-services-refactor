<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCampusRequest;
use App\Http\Requests\UpdateCampusRequest;
use App\Models\UniversityCampus;
use App\Repositories\Interfaces\CampusRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CampusController extends Controller
{
    public function __construct(private readonly CampusRepositoryInterface $campuses) {}

    public function index(Request $request): View
    {
        $request->user()->can('campus.list') || abort(403);
        $campuses = $this->campuses->paginate();
        // return $campuses;

        return view('backend.pages.campuses.index', [
            'campuses' => $campuses,
            'title' => 'Campuses',
        ]);
    }

    public function create(Request $request): View
    {
        $request->user()->can('campus.create') || abort(403);

        return view('backend.pages.campuses.create', [
            'campus' => null,
            'universities' => $this->campuses->universities(),
            'title' => 'Create Campus',
        ]);
    }

    public function store(StoreCampusRequest $request): RedirectResponse
    {
        $this->campuses->create($request->validated());

        return redirect()
            ->route('role.campuses.index', [
                'role' => $request->route('role'),
            ])
            ->with('success', 'Campus created successfully.');
    }

    public function show(Request $request, string $role, UniversityCampus $campus): View
    {
        $request->user()->can('campus.view') || abort(403);

        return view('backend.pages.campuses.show', [
            'campus' => $campus->load(['university', 'city']),
            'title' => 'Campus Details',
        ]);
    }

    public function edit(Request $request, string $role, UniversityCampus $campus): View
    {
        $request->user()->can('campus.edit') || abort(403);

        return view('backend.pages.campuses.edit', [
            'campus' => $campus->load(['university', 'city']),
            'universities' => $this->campuses->universities(),
            'title' => 'Edit Campus',
        ]);
    }

    public function update(UpdateCampusRequest $request, string $role, UniversityCampus $campus): RedirectResponse
    {
        $this->campuses->update($campus, $request->validated());

        return redirect()
            ->route('role.campuses.index', [
                'role' => $role,
            ])
            ->with('success', 'Campus updated successfully.');
    }

    public function destroy(Request $request, string $role, UniversityCampus $campus): RedirectResponse
    {
        $request->user()->can('campus.delete') || abort(403);

        $this->campuses->delete($campus);

        return redirect()
            ->route('role.campuses.index', [
                'role' => $role,
            ])
            ->with('success', 'Campus deleted successfully.');
    }

    public function cities(Request $request, string $role)
    {
        abort_unless($request->user()->can('campus.create') || $request->user()->can('campus.edit'), 403);

        $request->validate(['university_id' => ['required', 'exists:universities,id',],]);

        return response()->json(
            $this->campuses->citiesByUniversity(
                $request->university_id
            )
        );
    }
}
