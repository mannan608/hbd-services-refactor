<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventRegistration;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LeadsController extends Controller
{
    /**
     * Display event leads.
     */
    public function eventLeads()
    {

        $eventLeads = EventRegistration::query()
        ->select('id', 'full_name', 'email', 'phone','whatsapp', 'event_id','interested_course','source' )
            ->with(['event:id,title'])
            ->latest()
            ->paginate(20);

            // return   $eventLeads;

        return view('backend.pages.event-leads.index', compact('eventLeads'));
    }

    /**
     * Display a single event lead.
     */
    public function show(EventRegistration $eventLead): View
    {
        $eventLead->load('event');

        return view('backend.pages.event-leads.show', compact('eventLead'));
    }

    /**
     * Delete event lead.
     */
    public function destroy(string $role,EventRegistration $eventLead): RedirectResponse
    {
        $eventLead->delete();
        return redirect()
                ->route('role.event-leads.index', [
                    'role' => $role,
                ])
                ->with('success', 'Event lead deleted successfully.');
    }
}