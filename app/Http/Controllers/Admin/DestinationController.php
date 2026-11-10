<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\University;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index(Request $request, string $role)
    {
        abort_unless($request->user()->can('destinations.list'), 403);

        $destinations = Country::query()->withCount('universities')->latest()->paginate(15);

        // return $destinations;

        return view('backend.pages.destinations.index', compact('destinations'));
    }

    public function universityList(Request $request, string $role, Country $country)
    {
        abort_unless($request->user()->can('destinations.list'), 403);

        $universities = University::query()
            ->where('country_id', $country->id)
            ->latest()
            ->paginate(15);

        // return $universities;

        return view('backend.pages.destinations.destinations-university', compact('universities', 'country'));
    }
}
