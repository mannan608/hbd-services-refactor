<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\Request;

class EventRegistrationController extends Controller
{
  public function create(Event $event)
    {
        abort_unless($event->is_active, 404);

        // return $event;

        return view('frontend.pages.events.registration', [
            'event' => $event,
        ]);
    }

    public function store(Request $request, Event $event)
    {
        abort_unless($event->is_active, 404);

        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:191'],
            'phone' => ['nullable', 'string', 'max:50'],
            'whatsapp' => ['nullable', 'string', 'max:50'],
            'nationality' => ['nullable', 'string', 'size:2'],
            'interested_course' => ['nullable', 'string', 'max:255'],
            'message' => ['nullable', 'string'],
        ]);

        EventRegistration::create([
            'event_id' => $event->id,

            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'whatsapp' => $validated['whatsapp'] ?? null,
            'interested_course' => $validated['interested_course'] ?? null,
            'message' => $validated['message'] ?? null,

            'status' => 'registered',
            'source' => 'website',
        ]);

        return redirect()
            ->route('events.register', $event)
            ->with('success', 'Registration successful.');
    }
}
