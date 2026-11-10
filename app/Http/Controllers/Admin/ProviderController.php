<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProviderStoreRequest;
use App\Http\Requests\ProviderUpdateRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Course;
use App\Models\Provider;
use App\Models\ProviderCourseScope;
use App\Models\University;
use App\Models\UniversityCampus;
use App\Repositories\Interfaces\ProviderRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProviderController extends Controller
{
    public function __construct(private readonly ProviderRepositoryInterface $providers) {}

    /**
     * Display providers.
     */
    public function index(Request $request, string $role)
    {
        abort_unless($request->user()->can('provider.list'), 403);

        $providers = $this->providers->paginate(15);

        // return $providers;

        return view('backend.pages.providers.index', compact('providers'));
    }

    /**
     * Show create provider form.
     */
    public function create(Request $request, string $role): View
    {
        abort_unless($request->user()->can('provider.create'), 403);
        $countries = Country::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get(['id', 'name']);

        $cities = City::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get(['id', 'name', 'country_id']);

        return view('backend.pages.providers.create', [
            'provider' => null,
            'countries' => $countries,
            'cities' => $cities,
            'formMode' => 'create',
        ]);
    }

    /**
     * Store provider.
     */
    public function store(ProviderStoreRequest $request, string $role): RedirectResponse
    {
        $this->providers->create($request->validated());

        return redirect()
            ->route('role.providers.index', [
                'role' => $role,
            ])
            ->with('success', 'Provider created successfully.');
    }

    /**
     * Display provider details.
     */
    public function show(Request $request, string $role, Provider $provider)
    {
        abort_unless($request->user()->can('provider.view'), 403);

        $provider->load('user');

        $universities = University::query()->select('id', 'name')->orderBy('name')->get();

        $courses = Course::query()
            ->select('id', 'university_id', 'title')
            ->with(['campuses:id,name,university_id'])
            ->orderBy('title')
            ->get();

        // return $courses;

        /* Load course scopes */

        $courseScopes = $provider
            ->courseScopes()
            ->with(['university:id,name', 'course:id,title', 'campus:id,name'])
            ->get()
            ->groupBy(function ($scope) {
                return $scope->university_id . '-' . $scope->course_id;
            })
            ->values();

        return view('backend.pages.providers.show', [
            'provider' => $provider,
            'universities' => $universities,
            'courses' => $courses,
            'courseScopes' => $courseScopes,
        ]);
    }

    /**
     * Show edit provider form.
     */
    public function edit(Request $request, string $role, Provider $provider): View
    {
        abort_unless($request->user()->can('provider.edit'), 403);
        $countries = Country::query()
            ->where(function ($query) use ($provider) {
                $query->where('is_active', true)->orWhere('id', $provider->country_id);
            })
            ->orderBy('name')
            ->get(['id', 'name']);

        $cities = City::query()
            ->where(function ($query) use ($provider) {
                $query->where('is_active', true)->orWhere('id', $provider->city_id);
            })
            ->orderBy('name')
            ->get(['id', 'name', 'country_id']);

        return view('backend.pages.providers.edit', [
            'provider' => $provider,
            'countries' => $countries,
            'cities' => $cities,
            'formMode' => 'edit',
        ]);
    }

    /**
     * Update provider.
     */
    public function update(ProviderUpdateRequest $request, string $role, Provider $provider): RedirectResponse
    {
        $this->providers->update($provider, $request->validated());

        return redirect()
            ->route('role.providers.index', [
                'role' => $role,
            ])
            ->with('success', 'Provider updated successfully.');
    }

    /**
     * Delete provider.
     */
    public function destroy(Request $request, string $role, Provider $provider): RedirectResponse
    {
        abort_unless($request->user()->can('provider.delete'), 403);

        $this->providers->delete($provider);

        return redirect()
            ->route('role.providers.index', [
                'role' => $role,
            ])
            ->with('success', 'Provider deleted successfully.');
    }

    public function scopeLists(Request $request, string $role, Provider $provider)
    {
        $provider->addScope($request->scope);

        return redirect()->back();
    }

    public function addNewScope(Request $request, string $role, Provider $provider): RedirectResponse
    {
        abort_unless($request->user()->can('provider.view'), 403);

        $validated = $request->validate([
            'university_id' => ['required', 'uuid', 'exists:universities,id'],

            'course_id' => ['required', 'uuid', 'exists:courses,id'],

            'campus_ids' => ['required', 'array', 'min:1'],

            'campus_ids.*' => ['required', 'uuid', 'exists:university_campuses,id'],
        ]);

        $this->assertScopeAssignmentsMatchUniversity($validated);

        DB::transaction(function () use ($validated, $provider) {
            foreach ($validated['campus_ids'] as $campusId) {
                ProviderCourseScope::firstOrCreate([
                    'provider_id' => $provider->id,
                    'university_id' => $validated['university_id'],
                    'course_id' => $validated['course_id'],
                    'campus_id' => $campusId,
                ]);
            }
        });

        return redirect()->back()->with('success', 'Course scope added successfully.');
    }

    public function editScope(Request $request, string $role, Provider $provider, ProviderCourseScope $scope): RedirectResponse
    {
        abort_unless($request->user()->can('provider.view'), 403);
        /*
         * Security check:
         * Make sure this scope belongs to this provider.
         */
        abort_unless($scope->provider_id === $provider->id, 404);

        $validated = $request->validate([
            'university_id' => ['required', 'uuid', 'exists:universities,id'],

            'course_id' => ['required', 'uuid', 'exists:courses,id'],

            'campus_ids' => ['required', 'array', 'min:1'],

            'campus_ids.*' => ['required', 'uuid', 'exists:university_campuses,id'],
        ]);

        $this->assertScopeAssignmentsMatchUniversity($validated);

        DB::transaction(function () use ($validated, $provider, $scope) {
            /*
             * Remove the existing group.
             */
            ProviderCourseScope::where('provider_id', $provider->id)->where('university_id', $scope->university_id)->where('course_id', $scope->course_id)->delete();

            /*
             * Create the new campus assignments.
             */
            foreach ($validated['campus_ids'] as $campusId) {
                ProviderCourseScope::create([
                    'provider_id' => $provider->id,
                    'university_id' => $validated['university_id'],
                    'course_id' => $validated['course_id'],
                    'campus_id' => $campusId,
                ]);
            }
        });

        return redirect()->back()->with('success', 'Course scope updated successfully.');
    }

    private function assertScopeAssignmentsMatchUniversity(array $validated): void
    {
        abort_unless(Course::whereKey($validated['course_id'])->where('university_id', $validated['university_id'])->exists(), 422, 'The selected course does not belong to the selected university.');

        $campusCount = UniversityCampus::whereIn('id', $validated['campus_ids'])->where('university_id', $validated['university_id'])->distinct()->count('id');

        abort_unless($campusCount === count(array_unique($validated['campus_ids'])), 422, 'All selected campuses must belong to the selected university.');
    }

    public function deleteScope(Request $request, string $role, Provider $provider, ProviderCourseScope $scope): RedirectResponse
    {
        abort_unless($request->user()->can('provider.view'), 403);

        abort_unless($scope->provider_id === $provider->id, 404);

        ProviderCourseScope::where('provider_id', $provider->id)->where('university_id', $scope->university_id)->where('course_id', $scope->course_id)->delete();

        return redirect()->back()->with('success', 'Course scope deleted successfully.');
    }
}