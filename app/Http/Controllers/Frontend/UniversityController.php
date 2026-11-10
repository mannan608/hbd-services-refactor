<?php

namespace App\Http\Controllers\Frontend;

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

        return view('frontend.pages.universities.index', [
            'universities' => $universities,
            'countries' => $countries,
            'cities' => $cities,
        ]);
    }


    public function show(University $university)
    {
        

        $university->load(['country', 'city', 'campuses', 'courses', 'intakes']);

        // return $university;

        return view('frontend.pages.universities.show');
    }

}
