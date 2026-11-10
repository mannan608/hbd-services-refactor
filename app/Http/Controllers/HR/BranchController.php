<?php namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Models\hrm\Branch;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class BranchController extends Controller
{
    public function index(string $role, Request $request): View
    {
        abort_unless($request->user()?->can('branch.list'), 403);

        $query = Branch::query();

        if ($request->filled('search')) {
            $search = trim($request->input('search'));

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")->orWhere('code', 'like', "%{$search}%");
            });
        }

        if ($request->input('status') === 'active') {
            $query->where('is_active', true);
        } elseif ($request->input('status') === 'inactive') {
            $query->where('is_active', false);
        }

        $branches = $query->orderByDesc('id')->paginate(10)->withQueryString();

        return view('backend.pages.HR.branches.index', compact('branches'));
    }

    public function create(string $role, Request $request): View
    {
        abort_unless($request->user()?->can('branch.create'), 403);

        return view('backend.pages.HR.branches.create');
    }

    public function store(string $role, Request $request): RedirectResponse
    {
        abort_unless($request->user()?->can('branch.create'), 403);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:191', 'unique:branches,name'],
            'code' => ['nullable', 'string', 'max:191', 'unique:branches,code'],
            'is_active' => ['required', 'boolean'],
        ]);

        $validated['code'] = filled($validated['code'] ?? null) ? trim($validated['code']) : null;

        Branch::create($validated);

        return redirect()
            ->route('role.branches.index', ['role' => $role])
            ->with('success', 'Branch created successfully.');
    }

    public function show(string $role, Request $request, Branch $branch): View
    {
        abort_unless($request->user()?->can('branch.view'), 403);

        $branch->loadCount('employees');

        return view('backend.pages.HR.branches.show', compact('branch'));
    }

    public function edit(string $role, Request $request, Branch $branch): View
    {
        abort_unless($request->user()?->can('branch.edit'), 403);

        return view('backend.pages.HR.branches.edit', compact('branch'));
    }

    public function update(string $role, Request $request, Branch $branch): RedirectResponse
    {
        abort_unless($request->user()?->can('branch.edit'), 403);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:191', Rule::unique('branches', 'name')->ignore($branch->id)],
            'code' => ['nullable', 'string', 'max:191', Rule::unique('branches', 'code')->ignore($branch->id)],
            'is_active' => ['required', 'boolean'],
        ]);

        $validated['code'] = filled($validated['code'] ?? null) ? trim($validated['code']) : null;

        $branch->update($validated);

        return redirect()
            ->route('role.branches.index', ['role' => $role])
            ->with('success', 'Branch updated successfully.');
    }

    public function destroy(string $role, Request $request, Branch $branch): RedirectResponse
    {
        abort_unless($request->user()?->can('branch.delete'), 403);

        if ($branch->employees()->exists()) {
            return redirect()
                ->route('role.branches.index', ['role' => $role])
                ->with('error', 'This branch cannot be deleted because employees are assigned to it.');
        }

        $branch->delete();

        return redirect()
            ->route('role.branches.index', ['role' => $role])
            ->with('success', 'Branch deleted successfully.');
    }
}