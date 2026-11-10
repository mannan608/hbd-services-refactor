<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class ReferralController extends Controller
{
    public function index()
    {
        return view('frontend.pages.referral.index' );
    }
}
