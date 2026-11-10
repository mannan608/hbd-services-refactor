<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Models\hrm\Branch;
use App\Models\hrm\Department;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class DepartmentController extends Controller
{
    public function index(Request $request): View
    {
        abort_unless($request->user()?->can('department.list'), 403);

        $departments = Department::query()
            ->with('branch:id,name')
            ->withCount(['teams', 'employments'])
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->input('search');

                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")->orWhere('code', 'like', "%{$search}%");
                });
            })
            ->when($request->filled('status'), function ($query) use ($request) {
                $query->where('is_active', $request->input('status'));
            })
            ->latest('id')
            ->paginate(10)
            ->withQueryString();

        return view('backend.pages.HR.departments.index', compact('departments'));
    }

    public function create(string $role,Request $request): View
    {
        abort_unless($request->user()?->can('department.create'), 403);

        $branches = Branch::query()
            ->orderBy('name')
            ->get(['id', 'name']);

        return view('backend.pages.HR.departments.create', compact('branches'));
    }

    public function store(string $role ,Request $request): RedirectResponse
    {
        abort_unless($request->user()?->can('department.create'), 403);

        $validated = $request->validate([
            'branch_id' => ['nullable', 'integer', 'exists:branches,id'],
            'name' => ['required', 'string', 'max:191'],
            'code' => ['nullable', 'string', 'max:50', Rule::unique('departments', 'code')],
            'description' => ['nullable', 'string', 'max:5000'],
            'is_active' => ['required', 'boolean'],
        ]);
        Department::create($validated);

        return redirect()->route('role.departments.index', ['role' => $request->route('role')])->with('success', 'Department created successfully.');
    }

    public function show(Request $request, Department $department): View
    {
        abort_unless($request->user()?->can('department.view'), 403);

        $department->load('branch:id,name');
        $department->loadCount(['teams', 'employments']);

        return view('backend.pages.HR.departments.show', compact('department'));
    }

    public function edit(string $role,Request $request, Department $department): View
    {
        abort_unless($request->user()?->can('department.edit'), 403);

        $branches = Branch::query()
            ->orderBy('name')
            ->get(['id', 'name']);

        return view('backend.pages.HR.departments.edit', compact('department', 'branches'));
    }

    public function update(string $role,Request $request, Department $department): RedirectResponse
    {
        abort_unless($request->user()?->can('department.edit'), 403);

        $validated = $request->validate([
            'branch_id' => ['nullable', 'integer', 'exists:branches,id'],
            'name' => ['required', 'string', 'max:191'],
            'code' => ['nullable', 'string', 'max:50', Rule::unique('departments', 'code')->ignore($department->id)],
            'description' => ['nullable', 'string', 'max:5000'],
            'is_active' => ['required', 'boolean'],
        ]);

        $department->update($validated);

        return redirect()->route('role.departments.index', ['role' => $request->route('role')])->with('success', 'Department updated successfully.');
    }

    public function destroy(string $role,Request $request, Department $department): RedirectResponse
    {
        abort_unless($request->user()?->can('department.delete'), 403);

        if ($department->teams()->exists() || $department->employments()->exists()) {
            return redirect()->route('role.departments.index', ['role' => $request->route('role')])->with('error', 'This department cannot be deleted because it has related teams or employments.');
        }

        $department->delete();

        return redirect()->route('role.departments.index', ['role' => $request->route('role')])->with('success', 'Department deleted successfully.');
    }
}
