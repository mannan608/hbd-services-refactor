<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(12);

        // return $events;
        return view('frontend.pages.events.index', compact('events'));
    }

    public function show($slug)
    {
        $event = Event::where('slug', $slug)
            ->firstOrFail();

        // Latest events except current one
        $latestEvents = Event::where('id', '!=', $event->id)
            ->latest()
            ->take(5)
            ->get();

        // return $event;

        return view('frontend.pages.events.show', [
            'event' => $event,
            'latestEvents' => $latestEvents,
        ]);
    }

    // public function eventDetails()
    // {
    //     return view('frontend.pages.events.show');
    // }
}
