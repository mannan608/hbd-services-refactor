<?php 
namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Models\hrm\Holiday;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\HR\StoreHolidayRequest;
use Illuminate\Http\JsonResponse;

class HolidayController extends Controller
{
    /**
     * Display the holiday listing.
     */
    public function index(Request $request): View
    {
        $request->user()->can('holiday.list') || abort(403);
        $perPage = min(max($request->integer('per_page', 10), 1), 100);

        $holidays = $this->holidayQuery()
            ->select(['id', 'name', 'description','date', 'end_date', 'is_active', 'is_multi_day', 'is_recurring'])
            ->orderByRaw(
                'CASE
                    WHEN is_active = 0 THEN 2
                    WHEN date < ? THEN 1
                    ELSE 0
                END',
                [today()->toDateString()],
            )
            ->orderBy('date')
            ->paginate($perPage)
            ->withQueryString();

        return view('backend.pages.HR.holidays.index', compact('holidays'));
    }

    /**
     * Show the holiday creation form.
     */
    public function create(string $role, Request $request): View
    {
        $request->user()->can('holiday.create') || abort(403);

        return view('backend.pages.HR.holidays._form', [
            'holiday' => new Holiday(),
        ]);
    }

    /**
     * Store a new holiday.
     */
    public function store(string $role,StoreHolidayRequest $request): RedirectResponse
    {
        Holiday::create($request->validated());

        return redirect()
            ->route('role.holidays.index', [
                'role' => $role,
            ])
            ->with('success', 'Public holiday added successfully.');
    }

    /**
     * Show the holiday editing form.
     */
    public function edit(string $role, Request $request, Holiday $holiday): View
    {
        $request->user()->can('holiday.edit') || abort(403);

        return view('backend.pages.HR.holidays._form', compact('holiday'));
    }

    /**
     * Update an existing holiday.
     */
    public function update(string $role,StoreHolidayRequest $request, Holiday $holiday): RedirectResponse
    {
        $holiday->update($request->validated());

       return redirect()
            ->route('role.holidays.index', [
                'role' => $role,
            ])
            ->with('success', 'Public holiday updated successfully.');
    }

    /**
     * Delete a holiday.
     */
    public function destroy(string $role,Request $request, Holiday $holiday): RedirectResponse
    {
       $request->user()->can('holiday.delete') || abort(403);

        $holiday->delete();

        return redirect()
            ->route('role.holidays.index', [
                'role' => $role,
            ])
            ->with('success', 'Public holiday deleted successfully.');
    }

    /**
     * Toggle the active status of a holiday.
     */
public function toggle(string $role,Request $request, Holiday $holiday): JsonResponse
{
    abort_unless($request->user()?->can('holiday.update'), 403);

    $holiday->is_active = ! (bool) $holiday->is_active;
    $holiday->save();

    return response()->json([
        'success' => true,
        'message' => 'Holiday status updated successfully.',
        'is_active' => (bool) $holiday->fresh()->is_active,
    ]);
}

    /**
     * Build the holiday query based on the current user's role.
     */
    private function holidayQuery()
    {
        $query = Holiday::query();

        if (auth()->user()?->role === 'employee') {
            $query->active();
        }

        return $query;
    }
}