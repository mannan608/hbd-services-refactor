<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Counsellor;
use App\Models\Course;
use App\Models\Event;
use Illuminate\Support\Facades\File;


class FrontendController extends Controller
{

  public function homePage()
{
    $events = Event::latest()->paginate(12);

    $destinationPath = resource_path('data/destinations.json');

    $destinationData = File::exists($destinationPath)
        ? json_decode(File::get($destinationPath), true)
        : [];

    $destinations = $destinationData['destinations'] ?? [];

    $destinations = array_filter($destinations, function ($destination) {
        return isset($destination['id'], $destination['name'], $destination['slug']);
    });

    $counsellors = Counsellor::query()
        ->with('user')
        ->where('is_active', true)
        ->latest()
        ->paginate(12);

    return view('frontend.pages.home.home', compact(
        'events',
        'destinations',
        'counsellors'
    ));
}

    public function aboutPage()
    {
        
        return view('frontend.pages.about.about');
    }

    public function contactPage()
    {
        return view('frontend.pages.contact');
    }
   
    public function registration()
    {
        return view('frontend.pages.register');
    }

      public function login()
    {
        return view('frontend.pages.login');
    }
    public function achieve(){
        return view('frontend.pages.achieve.achieve');
    }
     public function howWeWork(){
        return view('frontend.pages.how-we-works.index');
    }
    public function privacyPolicy(){
        return view('frontend.pages.privacy-policy');
    }
    public function termsConditions(){
        return view('frontend.pages.terms-conditions');
    }

    public function owner(){
        return view('frontend.pages.teams.owner');
    }

     public function digitalSolution(){
        return view('frontend.pages.digital-solutions.index');
    }
}
