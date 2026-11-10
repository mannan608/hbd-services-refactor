<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Counsellor;
use App\Models\CounsellorBooking;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CounsellorController extends Controller
{

    public function index()
    {
        $counsellors = Counsellor::query()
            ->with('user')
            ->where('is_active', true)
            ->latest()
            ->paginate(12);

        // return $counsellors;

         return view('frontend.pages.counsellors.counsellors',
            compact('counsellors')
        );
    }

     public function show(Counsellor $counsellor)
    {      
        $counsellor->load('user');
            //    return $counsellor;

        return view('frontend.pages.counsellors.counsellor-details',compact('counsellor'));
    }

   /**
     * Store counsellor booking.
     */
    public function storeBooking(Request $request, Counsellor $counsellor)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'mail' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'service' => ['required', 'string', 'max:100'],

            'appointment_date' => [
                'required',
                'date',
                'after_or_equal:today',
            ],

            'appointment_time' => [
                'required',
                'date_format:H:i',
            ],
        ]);

        // Create booking here

        CounsellorBooking::create([
            'counsellor_id' => $counsellor->id,
            'name' => $validated['name'],
            'email' => $validated['mail'],
            'phone' => $validated['phone'],
            'service' => $validated['service'],
            'appointment_date' => $validated['appointment_date'],
            'appointment_time' => $validated['appointment_time'],
            'status' => 'pending',
        ]);

        return redirect()
            ->route('counsellor.details', $counsellor)
            ->with('success', 'Your counselling session has been booked successfully.');
    }

    public function bookingAppointment(Counsellor $counsellor)
    {
        return view('frontend.pages.counselling.index');
    }

  
}
