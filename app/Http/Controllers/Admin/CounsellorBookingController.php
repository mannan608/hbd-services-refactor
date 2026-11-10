<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CounsellorBooking;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CounsellorBookingController extends Controller
{
    public function index(string $role ,Request $request): View
    {
        $user = $request->user();

        $canListAll = $user->can('bookings.list');
        $isCounsellor = $user->counsellor()->exists();

        if (!$canListAll && !$isCounsellor) {
            abort(403);
        }

        $bookings = CounsellorBooking::query()
            ->with(['counsellor.user'])

            ->when($user->primary_role_id == 5 || ($isCounsellor && !$canListAll), function ($query) use ($user) {
                $query->whereHas('counsellor', function ($counsellorQuery) use ($user) {
                    $counsellorQuery->where('user_id', $user->id);
                });
            })

            ->latest()
            ->paginate(10);

        return view('backend.pages.counsellor-bookings.index', compact('bookings'));
    }

    public function show(string $role ,Request $request, string $bookingId): View
    {
        $user = $request->user();

        $canViewAll = $user->can('bookings.view');
        $isCounsellor = $user->counsellor()->exists();

        if (!$canViewAll && !$isCounsellor) {
            abort(403);
        }

        $booking = CounsellorBooking::query()
            ->with(['counsellor.user'])
            ->findOrFail($bookingId);

        if ($user->primary_role_id == 5 || ($isCounsellor && !$canViewAll)) {
            if ($booking->counsellor?->user_id !== $user->id) {
                abort(403);
            }
        }

        return view('backend.pages.counsellor-bookings.show', compact('booking'));
    }

    public function destroy(string $role ,Request $request, string $bookingId)
    {
        $user = $request->user();

        $user->can('bookings.delete') || abort(403);

        $isCounsellor = $user->counsellor()->exists();

        $booking = CounsellorBooking::query()->with('counsellor')->findOrFail($bookingId);

        if ($user->primary_role_id == 5 || $isCounsellor) {
            if ($booking->counsellor?->user_id !== $user->id) {
                abort(403);
            }
        }

        $booking->delete();

        return redirect()
            ->route('role.booking-sessions.index', [
                'role' => $request->route('role'),
            ])
            ->with('success', 'Booking deleted successfully.');
    }

 public function update(string $role,Request $request, string $bookingId)
{
    $user = $request->user();

    // Update permission
    if (! $user->can('bookings.update')) {
        abort(403);
    }

    $request->validate([
        'status' => [
            'required',
            'in:pending,confirmed,completed,cancelled',
        ],
    ]);

    $booking = CounsellorBooking::query()
        ->with('counsellor')
        ->findOrFail($bookingId);

    /*
    |--------------------------------------------------------------------------
    | Role 5 / Counsellor access
    |--------------------------------------------------------------------------
    | counsellor_id = counsellors.id
    | counsellors.user_id = users.id
    */
    if ($user->primary_role_id == 5) {
        if ($booking->counsellor?->user_id != $user->id) {
            abort(403);
        }
    } elseif ($user->counsellor()->exists()) {
        if ($booking->counsellor?->user_id != $user->id) {
            abort(403);
        }
    }

    $booking->update([
        'status' => $request->input('status'),
    ]);
 return redirect()
            ->route('role.booking-sessions.index', [
                'role' => $request->route('role'),
            ])
            ->with('success', 'Booking status updated successfully.');
}
}