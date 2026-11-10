<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
     public function index(){
        return view('frontend.pages.services.index');
    }
}
