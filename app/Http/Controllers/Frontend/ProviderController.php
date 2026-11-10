<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;

class ProviderController extends Controller
{

    public function providers()
    {
        return view('frontend.pages.providers.providers');
    }

     public function providerDetails(Course $course)
    {
        return view('frontend.pages.providers.provider-details');
    }

  
}
