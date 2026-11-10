<?php 
namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Http\Requests\HR\StoreLeaveTypeRequest;
use App\Http\Requests\HR\UpdateLeaveTypeRequest;
use App\Models\hrm\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    /**
     * Display a listing of leave types.
     */
    public function index(Request $request)
    {
        $perPage = $request->integer('per_page', 10);

        $leaveTypes = LeaveType::orderBy('is_active', 'desc')
            //->where('is_active', 1)
            ->orderBy('name')
            ->paginate($perPage)->withQueryString();

        return view('backend.pages.HR.leave-types.index', compact('leaveTypes'));
    }

    /**
     * Show the form for creating a new leave type.
     */
    public function create()
    {
        return view('backend.pages.HR.leave-types._form');
    }

    /**
     * Store a newly created leave type.
     */
    public function store(StoreLeaveTypeRequest $request)
    {
        $validated = $request->validated();
        $data = $validated;
        $data['is_paid'] = $request->boolean('is_paid');
        $data['requires_approval'] = $request->boolean('requires_approval');
        $data['requires_document'] = $request->boolean('requires_document');
        $data['can_carry_forward']  = $request->boolean('can_carry_forward');
        $data['is_active']  = $request->boolean('is_active');

        // Set carry_forward_limit to 0 if carry forward is disabled
        if (!$request->can_carry_forward) {
            $validated['carry_forward_limit'] = 0;
        }

        LeaveType::create($data);

        return redirect()
            ->route('leave-types.index')
            ->with('success', 'Leave type added successfully!');
    }

    /**
     * Display the specified leave type.
     */
    public function show(LeaveType $leaveType)
    {
        // Single view code
    }

    /**
     * Show the form for editing the leave type.
     */
    public function edit(LeaveType $leaveType)
    {
        return view('backend.pages.HR.leave-types._form', compact('leaveType'));
    }

    /**
     * Update the leave type.
     */
    public function update(UpdateLeaveTypeRequest $request, LeaveType $leaveType)
    {
        $validated = $request->validated();
        $data = $validated;
        $data['is_paid'] = $request->boolean('is_paid');
        $data['requires_approval'] = $request->boolean('requires_approval');
        $data['requires_document'] = $request->boolean('requires_document');
        $data['can_carry_forward']  = $request->boolean('can_carry_forward');
        $data['is_active']  = $request->boolean('is_active');

        // Fix: Handle unchecked checkboxes → default to false
        $data = [
            'name'                => $validated['name'],
            'slug'                => $validated['slug'],
            'max_days_per_year'   => $validated['max_days_per_year'],
            'description'         => $validated['description'] ?? null,
            'requires_approval'   => $request->has('requires_approval'),
            'requires_document'   => $request->has('requires_document'),
            'is_paid'             => $request->has('is_paid'),
            'can_carry_forward'  => $request->has('can_carry_forward'),
            'carry_forward_limit' => $request->has('can_carry_forward') ? ($validated['carry_forward_limit'] ?? 0) : 0,
            'is_active'           => $request->has('is_active'),
        ];

        $leaveType->update($data);

        return redirect()
            ->route('leave-types.index')
            ->with('success', 'Leave type updated successfully!');
    }

    /**
     * Soft delete or deactivate leave type (recommended: just deactivate)
     */
    /**
     * Toggle Active/Inactive status of a leave type
     */
    public function destroy(LeaveType $leaveType)
    {
        $leaveType->update([
            'is_active' => !$leaveType->is_active
        ]);

        $status = $leaveType->is_active ? 'activated' : 'deactivated';

        return view('leave.leave-types.index')
            ->with('success', "Leave type '{$leaveType->name}' has been {$status} successfully.");
    }

    public function toggle(LeaveType $leaveType)
    {
        $leaveType->update(['is_active' => !$leaveType->is_active]);

        return back()->with('success', 'Leave type status updated successfully.');
    }
}
