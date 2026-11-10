<?php namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Models\hrm\Department;
use App\Models\hrm\Team;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class TeamController extends Controller
{
    public function index(Request $request): View
    {
        abort_unless($request->user()?->can('team.list'), 403);

        $teams = Team::with(['department:id,name', 'teamLead:id,name'])
            ->withCount('employments')
            ->latest()
            ->paginate(15);
        // dd($teams);

        return view('backend.pages.HR.teams.index', compact('teams'));
    }

    public function create(string $role, Request $request): View
    {
        abort_unless($request->user()?->can('team.create'), 403);

        $departments = Department::orderBy('name')->get(['id', 'name']);

        $teamLeads = User::orderBy('name')->get(['id', 'name']);

        return view('backend.pages.HR.teams.create', compact('departments', 'teamLeads'));
    }

    public function store(string $role, Request $request): RedirectResponse
    {
        abort_unless($request->user()?->can('team.create'), 403);

        $validated = $request->validate([
            'department_id' => ['required', 'integer', 'exists:departments,id'],
            'name' => ['required', 'string', 'max:191'],
            'team_lead_id' => ['nullable', 'integer', 'exists:users,id'],
        ]);

        Team::create($validated);

        return redirect()
            ->route('role.teams.index', ['role' => $role])
            ->with('success', 'Team created successfully.');
    }

    public function show(string $role, Request $request, Team $team): View
    {
        abort_unless($request->user()?->can('team.view'), 403);

        $team->load(['department:id,name', 'teamLead:id,name', 'employments']);

        $team->loadCount('employments');

        return view('backend.pages.HR.teams.show', compact('team'));
    }

    public function edit(string $role, Request $request, Team $team): View
    {
        abort_unless($request->user()?->can('team.edit'), 403);

        $departments = Department::orderBy('name')->get(['id', 'name']);

        $teamLeads = User::orderBy('name')->get(['id', 'name']);

        return view('backend.pages.HR.teams.edit', compact('team', 'departments', 'teamLeads'));
    }

    public function update(string $role, Request $request, Team $team): RedirectResponse
    {
        abort_unless($request->user()?->can('team.edit'), 403);

        $validated = $request->validate([
            'department_id' => ['required', 'integer', 'exists:departments,id'],
            'name' => ['required', 'string', 'max:191', Rule::unique('teams', 'name')->where('department_id', $request->input('department_id'))->ignore($team->id)],
            'team_lead_id' => ['nullable', 'integer', 'exists:users,id'],
        ]);

        $team->update($validated);

        return redirect()
            ->route('role.teams.index', ['role' => $role])
            ->with('success', 'Team updated successfully.');
    }

    public function destroy(string $role, Request $request, Team $team): RedirectResponse
    {
        abort_unless($request->user()?->can('team.delete'), 403);

        if ($team->employments()->exists()) {
            return redirect()
                ->route('role.teams.index', ['role' => $role])
                ->with('error', 'This team cannot be deleted because it has related employments.');
        }

        $team->delete();

        return redirect()
            ->route('role.teams.index', ['role' => $role])
            ->with('success', 'Team deleted successfully.');
    }
}