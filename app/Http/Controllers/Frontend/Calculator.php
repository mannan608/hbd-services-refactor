<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class Calculator extends Controller
{
    public function visaPoints()
    {
        return view('frontend.pages.calculator.visa-point-calculator' );
    }



}
