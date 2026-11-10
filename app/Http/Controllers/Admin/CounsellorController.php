<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCounsellorRequest;
use App\Http\Requests\UpdateCounsellorAccountRequest;
use App\Http\Requests\UpdateCounsellorRequest;
use App\Models\City;
use App\Models\Counsellor;
use App\Models\Country;
use App\Models\User;
use App\Traits\HandlesFiles;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CounsellorController extends Controller
{
    use HandlesFiles;

    public function index(Request $request)
    {
        $request->user()->can('counsellors.list') || abort(403);

        $counsellors = Counsellor::with(['user', 'country', 'city'])
            ->when($request->search, fn($q) => $q->where('slug', 'like', "%{$request->search}%"))
            ->latest()
            ->paginate(10);

        // return $counsellors;

        return view('backend.pages.counsellors.index', compact('counsellors'));
    }

    public function create(Request $request): View
    {
        $request->user()->can('counsellors.create') || abort(403);

        $countries = Country::all();
        $cities = City::all();

        return view('backend.pages.counsellors.create', [
            'counsellor' => null,
            'countries' => $countries,
            'cities' => $cities,
            'title' => 'Create Counsellor',
        ]);
    }

    public function store(StoreCounsellorRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        DB::beginTransaction();

        try {
            /*
            |--------------------------------------------------------------------------
            | Create User
            |--------------------------------------------------------------------------
            */
            $user = User::createCounsellor([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'password' => Hash::make($validated['password']),
                'status' => 'active',
            ]);         

            /*
            |--------------------------------------------------------------------------
            | Generate Slug
            |--------------------------------------------------------------------------
            */
            $slug = $validated['slug'] ?? Str::slug($validated['name']);

            /*
            |--------------------------------------------------------------------------
            | Create Counsellor
            |--------------------------------------------------------------------------
            */
            Counsellor::create([
                'user_id' => $user->id,
                'slug' => $slug,

                'designation' => $validated['designation'] ?? null,
                'bio' => $validated['bio'] ?? null,
                'education' => $validated['education'] ?? null,
                'institution' => $validated['institution'] ?? null,

                'city_id' => $validated['city_id'] ?? null,
                'country_id' => $validated['country_id'] ?? null,

                'languages' => $validated['languages'] ?? null,
                'expertise' => $validated['expertise'] ?? null,

                'experience_years' => $validated['experience_years'] ?? 0,

                'is_featured' => $request->boolean('is_featured'),
                'is_verified' => $request->boolean('is_verified'),
                'is_active' => $request->boolean('is_active'),

                'sort_order' => $validated['sort_order'] ?? 0,
            ]);

            DB::commit();
            return redirect()
                ->route('role.counsellors.index', [
                    'role' => $request->route('role'),
                ])
                ->with('success', 'Counsellor created successfully.');
        } catch (\Throwable $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with('error', 'Error creating counsellor: ' . $e->getMessage());
        }
    }

    public function show(string $role, string $counsellor)
    {
        $counsellor = $this->resolveCounsellor($counsellor);

        return view('backend.pages.counsellors.show', compact('counsellor'));
    }

    public function edit(string $role, string $counsellor, Request $request)
    {
        $request->user()->can('counsellors.edit') || abort(403);

        $counsellor = $this->resolveCounsellor($counsellor);
        $countries = Country::all();
        $cities = City::all();

        return view('backend.pages.counsellors.edit', [
            'counsellor' => $counsellor,
            'countries' => $countries,
            'cities' => $cities,
            'title' => 'Edit Counsellor',
        ]);
    }

    public function update(string $role, UpdateCounsellorRequest $request, string $counsellor)
    {
        $counsellor = $this->resolveCounsellor($counsellor);
        $validated = $request->validated();

        DB::beginTransaction();
        try {
            $userData = [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
            ];

            if (! empty($validated['password'])) {
                $userData['password'] = Hash::make($validated['password']);
            }

            if ($counsellor->user) {
                $counsellor->user->update($userData);
            }

           

            unset(
                $validated['name'],
                $validated['email'],
                $validated['phone'],
                $validated['password']
            );

            // Convert booleans properly
            $validated['is_featured'] = $request->boolean('is_featured');
            $validated['is_verified'] = $request->boolean('is_verified');
            $validated['is_active'] = $request->boolean('is_active');

            $counsellor->update($validated);

            DB::commit();


            return redirect()
                ->route('role.counsellors.index', [
                    'role' => $request->route('role'),
                ])
                ->with('success', 'Counsellor updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withInput()->with('error', 'Error updating counsellor: ' . $e->getMessage());
        }
    }

    public function destroy(string $role, string $counsellor, Request $request)
    {
        $request->user()->can('counsellors.delete') || abort(403);

        $counsellor = $this->resolveCounsellor($counsellor);

        // Delete photo
        if ($counsellor->photo_url) {
            $this->deleteFile($counsellor->photo_url);
        }

        $counsellor->delete();

        return redirect()
            ->route('role.counsellors.index', [
                'role' => $request->route('role'),
            ])
            ->with('success', 'Counsellor deleted successfully.');
    }

    private function resolveCounsellor(Counsellor|string $counsellor): Counsellor
    {
        if ($counsellor instanceof Counsellor) {
            return $counsellor->loadMissing(['user', 'country', 'city']);
        }

        return Counsellor::with(['user', 'country', 'city'])->findOrFail($counsellor);
    }

   public function accountSetting(): View
{
    $user = auth()->user()->load('counsellor');

    $counsellor = $user->counsellor;

    abort_unless($counsellor, 404);

    return view('backend.pages.counsellors.profile', [
        'user' => $user,
        'counsellor' => $counsellor,
        'countries' => Country::all(),
        'cities' => City::all(),
    ]);
}

public function updateAccountSetting(
    UpdateCounsellorAccountRequest $request
): RedirectResponse {
    $validated = $request->validated();

    $user = auth()->user()->load('counsellor');
    $counsellor = $user->counsellor;

    abort_unless($counsellor, 404);

    DB::beginTransaction();

    try {
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
        ]);

        if (!empty($validated['password'])) {
            $user->update([
                'password' => Hash::make($validated['password']),
            ]);
        }

       

        $counsellor->update([
            'designation' => $validated['designation'] ?? null,
            'bio' => $validated['bio'] ?? null,
            'education' => $validated['education'] ?? null,
            'institution' => $validated['institution'] ?? null,
            'city_id' => $validated['city_id'] ?? null,
            'country_id' => $validated['country_id'] ?? null,
            'languages' => $validated['languages'] ?? [],
            'expertise' => $validated['expertise'] ?? [],
            'experience_years' => $validated['experience_years'] ?? 0,
        ]);

        DB::commit();

        return back()->with(
            'success',
            'Account settings updated successfully.'
        );
    } catch (\Throwable $e) {
        DB::rollBack();

        return back()
            ->withInput()
            ->with('error', 'Error updating account settings: ' . $e->getMessage());
    }
}
}