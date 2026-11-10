<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUniversityRequest;
use App\Http\Requests\UpdateUniversityRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\University;
use App\Repositories\Interfaces\UniversityRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UniversityController extends Controller
{
    public function __construct(private readonly UniversityRepositoryInterface $universities) {}

    public function index(Request $request): View
    {
        abort_unless(
            $request->user()->can('university.list'),
            403
        );

        $filters = $request->only(['search','country_id','city_id','is_active','is_featured']);

        $universities = $this->universities->paginate( $filters,20);

        $countries = Country::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get([ 'id','name']);

        $cities = City::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get([ 'id', 'name','country_id']);

        // return $universities;

        return view('backend.pages.universities.index', [
            'universities' => $universities,
            'countries' => $countries,
            'cities' => $cities,
        ]);
    }

    public function create(Request $request): View
    {
        abort_unless($request->user()->can('university.create'), 403);

        return view('backend.pages.universities.create', [
            'university' => null,

            'countries' => Country::query()
                ->orderBy('name')
                ->get(['id', 'name']),

            'cities' => City::query()
                ->orderBy('name')
                ->get(['id', 'name', 'country_id']),
        ]);
    }

    public function store(StoreUniversityRequest $request): RedirectResponse
    {
        $this->universities->create($request->validated(), $request);

        // dd($request->all());

        return redirect()
            ->route('role.universities.index', [
                'role' => $request->route('role'),
            ])
            ->with('success', 'University created successfully.');
    }

    public function show(Request $request, string $role, University $university)
    {
        abort_unless($request->user()->can('university.view'), 403);

        $university->load(['country', 'city', 'campuses', 'courses', 'intakes']);

        // return $university;

        return view('backend.pages.universities.show', [
            'university' => $university,
        ]);
    }

    public function edit(Request $request, string $role, University $university)
    {
        abort_unless($request->user()->can('university.edit'), 403);

    // return $university;

        return view('backend.pages.universities.edit', [
            'university' => $university,

            'countries' => Country::query()
                ->orderBy('name')
                ->get(['id', 'name']),

            'cities' => City::query()
                ->orderBy('name')
                ->get(['id', 'name', 'country_id']),
        ]);
    }

    public function update(UpdateUniversityRequest $request, string $role, University $university): RedirectResponse
    {
        /*
         * Only fields present in the request and passing
         * validation are returned.
         */
        $this->universities->update($university, $request->validated(), $request);

        return redirect()
            ->route('role.universities.index', [
                'role' => $role,
            ])
            ->with('success', 'University updated successfully.');
    }

    public function destroy(Request $request, string $role, University $university): RedirectResponse
    {
        abort_unless($request->user()->can('university.delete'), 403);

        $this->universities->delete($university);

        return redirect()
            ->route('role.universities.index', [
                'role' => $role,
            ])
            ->with('success', 'University deleted successfully.');
    }
}
