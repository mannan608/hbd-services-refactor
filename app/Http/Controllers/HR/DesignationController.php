<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Models\hrm\Designation;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class DesignationController extends Controller
{
    /**
     * Display designation list.
     */
    public function index(Request $request): View
    {
        abort_unless($request->user()?->can('designation.list'), 403);

        $designations = Designation::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = trim($request->input('search'));

                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")->orWhere('code', 'like', "%{$search}%");
                });
            })
            ->when($request->filled('status'), function ($query) use ($request) {
                $query->where('is_active', $request->input('status'));
            })
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('backend.pages.HR.designations.index', compact('designations'));
    }

    /**
     * Show create form.
     */
    public function create(Request $request, string $role): View
    {
        abort_unless($request->user()?->can('designation.create'), 403);

        return view('backend.pages.HR.designations.create');
    }

    /**
     * Store a new designation.
     */
    public function store(Request $request, string $role): RedirectResponse
    {
        abort_unless($request->user()?->can('designation.create'), 403);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'code' => ['nullable', 'string', 'max:50', Rule::unique('designations', 'code')],
            'description' => ['nullable', 'string', 'max:5000'],
            'level' => ['nullable', 'integer', 'min:1', 'max:65535'],
            'is_active' => ['required', 'boolean'],
        ]);

        $validated['code'] = filled($validated['code'] ?? null) ? strtoupper(trim($validated['code'])) : null;
      

        Designation::create($validated);

        return redirect()
            ->route('role.designations.index', ['role' => $role])
            ->with('success', 'Designation created successfully.');
    }

    /**
     * Show designation details.
     */
    public function show(Request $request, string $role, Designation $designation): View
    {
        abort_unless($request->user()?->can('designation.view'), 403);

        $designation->loadCount(['employments', 'teams']);

        return view('backend.pages.HR.designations.show', compact('designation'));
    }

    /**
     * Show edit form.
     */
    public function edit(Request $request, string $role, Designation $designation): View
    {
        abort_unless($request->user()?->can('designation.edit'), 403);

        return view('backend.pages.HR.designations.edit', compact('designation'));
    }

    /**
     * Update designation.
     */
    public function update(Request $request, string $role, Designation $designation): RedirectResponse
    {
        abort_unless($request->user()?->can('designation.edit'), 403);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'code' => ['nullable', 'string', 'max:50', Rule::unique('designations', 'code')->ignore($designation->id)],
            'description' => ['nullable', 'string', 'max:5000'],
            'level' => ['nullable', 'integer', 'min:1', 'max:65535'],
            'is_active' => ['required', 'boolean'],
        ]);

        $validated['code'] = filled($validated['code'] ?? null) ? strtoupper(trim($validated['code'])) : null;

      

        $designation->update($validated);

        return redirect()
            ->route('role.designations.index', ['role' => $role])
            ->with('success', 'Designation updated successfully.');
    }

    /**
     * Delete designation.
     */
    public function destroy(Request $request, string $role, Designation $designation): RedirectResponse
    {
        abort_unless($request->user()?->can('designation.delete'), 403);

        if ($designation->employments()->exists() || $designation->teams()->exists()) {
            return redirect()
                ->route('role.designations.index', ['role' => $role])
                ->with('error', 'This designation cannot be deleted because it has related teams or employments.');
        }

        $designation->delete();

        return redirect()
            ->route('role.designations.index', ['role' => $role])
            ->with('success', 'Designation deleted successfully.');
    }
}