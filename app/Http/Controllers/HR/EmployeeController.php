<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Http\Requests\HR\StoreEmployeeRequest;
use App\Http\Requests\HR\UpdateEmployeeRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\hrm\Branch;
use App\Models\hrm\Department;
use App\Models\hrm\Designation;
use App\Models\hrm\Employee;
use App\Models\hrm\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Throwable;

class EmployeeController extends Controller
{
    /**
     * List employees with search and pagination.
     */
    public function index(Request $request)
    {
        $request->user()->can('employee.list') || abort(403);

        $employees = Employee::query()
            ->with(['user', 'country', 'city', 'currentEmployment.branch', 'currentEmployment.department', 'currentEmployment.team', 'currentEmployment.designation'])
            ->when($request->filled('search'), function (Builder $query) use ($request) {
                $search = trim($request->input('search'));

                $query->where(function (Builder $q) use ($search) {
                    $q->where('first_name', 'like', "%{$search}%")
                        ->orWhere('last_name', 'like', "%{$search}%")
                        ->orWhereHas('user', function (Builder $userQuery) use ($search) {
                            $userQuery->where('email', 'like', "%{$search}%");
                        })
                        ->orWhereHas('employments', function (Builder $employmentQuery) use ($search) {
                            $employmentQuery->where('employee_code', 'like', "%{$search}%");
                        });
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('backend.pages.HR.employees.index', compact('employees'));
    }

    /**
     * Show the create form.
     */
    public function create(Request $request)
    {
        $request->user()->can('employee.create') || abort(403);

        return view('backend.pages.HR.employees.create');
    }

    /**
     * Store user, employee profile and first employment record.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $validated = $request->validated();

        try {
            DB::transaction(function () use ($validated) {
                // 1. Login account.
                $user = User::createEmployee([
                    'name' => trim($validated['first_name'] . ' ' . $validated['last_name']),
                    'email' => $validated['email'],
                    'phone' => $validated['phone'] ?? null,
                    'password' => $validated['password'],
                    'status' => 'active',
                ]);

                // 2. Personal employee profile.
                $employee = Employee::create(array_merge($this->prepareEmployeeData($validated), ['user_id' => $user->id]));

                // 3. First employment record.
                $employee->employments()->create($this->prepareEmploymentData($validated, true));
            });

            return redirect()
                ->route('role.employees.index', [
                    'role' => $request->route('role'),
                ])
                ->with('success', 'Employee created successfully.');
        } catch (Throwable $e) {
            report($e);

            return back()->withInput()->with('error', 'Unable to create employee. Please try again.');
        }
    }

    /**
     * Show the edit form.
     */
    public function edit(string $role, string $employee, Request $request)
    {
        $request->user()->can('employee.edit') || abort(403);

        $employee = Employee::query()
            ->with(['user', 'country', 'city', 'currentEmployment'])
            ->findOrFail($employee);

        return view(
            'backend.pages.HR.employees.edit',
            array_merge($this->formOptions(), [
                'employee' => $employee,
                'title' => 'Edit Employee',
            ]),
        );
    }

    /**
     * Update user, employee profile and current employment.
     */
    public function update(UpdateEmployeeRequest $request, string $role, string $employee)
    {
        $validated = $request->validated();

        try {
            DB::transaction(function () use ($validated, $employee) {
                $employee = Employee::query()->with('user')->lockForUpdate()->findOrFail($employee);

                // 1. Update or restore the associated login account.
                $userData = [];

                if (array_key_exists('first_name', $validated) || array_key_exists('last_name', $validated)) {
                    $userData['name'] = trim(
                        ($validated['first_name'] ?? $employee->first_name) . ' ' .
                            ($validated['last_name'] ?? $employee->last_name)
                    );
                }

                foreach (['email', 'phone'] as $field) {
                    if (array_key_exists($field, $validated)) {
                        $userData[$field] = $validated[$field];
                    }
                }

                if (!empty($validated['password'])) {
                    $userData['password'] = Hash::make($validated['password']);
                }

                if ($employee->user) {
                    if ($userData !== []) {
                        $employee->user->update($userData);
                    }
                } else {
                    if (empty($validated['password']) || empty($validated['email']) || empty($validated['first_name']) || empty($validated['last_name'])) {
                        throw ValidationException::withMessages([
                            'email' => 'Name, email, and password are required to create the login account.',
                        ]);
                    }

                    $userData['password'] = Hash::make($validated['password']);

                    $userData['status'] = 'active';

                    $user = User::create($userData);

                    $employee->user_id = $user->id;
                }

                // 2. Update personal profile only.
                $employee->fill($this->prepareEmployeeData($validated));

                $employee->save();

                // 3. Update the current employment, or create it if missing.
                $employmentData = $this->prepareEmploymentData($validated, false);

                if ($employmentData !== []) {
                    $currentEmployment = $employee->employments()->where('is_current', true)->lockForUpdate()->first();

                    if ($currentEmployment) {
                        $currentEmployment->update($employmentData);
                    } else {
                        $employee->employments()->create(array_merge($employmentData, ['is_current' => true]));
                    }
                }
            });

            return redirect()
                ->route('role.employees.index', [
                    'role' => $role,
                ])
                ->with('success', 'Employee updated successfully.');
        } catch (ValidationException $e) {
            throw $e;
        } catch (Throwable $e) {
            report($e);

            return back()->withInput()->with('error', 'Unable to update employee. Please try again.');
        }
    }

    /**
     * Delete employee profile.
     *
     * This preserves the associated user account, as in your original code.
     */
    public function destroy(Request $request, string $role, string $employee)
    {
        $request->user()->can('employee.delete') || abort(403);

        $employee = Employee::findOrFail($employee);

        $employee->delete();

        return redirect()
            ->route('role.employees.index', [
                'role' => $role,
            ])
            ->with('success', 'Employee deleted successfully.');
    }

    /**
     * Load shared dropdown options for create and edit forms.
     */
    private function formOptions(): array
    {
        return [
            'branches' => Branch::query()
                ->orderBy('name')
                ->get(['id', 'name', 'code',  'is_active']),

            'departments' => Department::query()
                ->orderBy('name')
                ->get(['id', 'name', 'branch_id']),

            'teams' => Team::query()
                ->orderBy('name')
                ->get(['id', 'name', 'department_id']),

            'designations' => Designation::query()
                ->orderBy('name')
                ->get(['id', 'name']),

            'countries' => Country::query()->orderBy('name')->get(),

            'cities' => City::query()->orderBy('name')->get(),
        ];
    }

    /**
     * Map only fields that belong to the employees table.
     */
    private function prepareEmployeeData(array $validated): array
    {
        $fields = ['first_name', 'last_name', 'date_of_birth', 'gender', 'religion', 'blood_group', 'national_id', 'address', 'bio', 'education', 'institution', 'experience_years', 'languages', 'expertise', 'emergency_contact_name', 'emergency_contact_phone', 'country_id', 'city_id', 'is_verified'];

        $data = array_intersect_key($validated, array_flip($fields));

        if (array_key_exists('languages', $data)) {
            $data['languages'] = $this->cleanArray($data['languages'] ?? []);
        }

        if (array_key_exists('expertise', $data)) {
            $data['expertise'] = $this->cleanArray($data['expertise'] ?? []);
        }

        if (array_key_exists('experience_years', $data)) {
            $data['experience_years'] = $data['experience_years'] ?? 0;
        }

        if (array_key_exists('is_verified', $data)) {
            $data['is_verified'] = (bool) $data['is_verified'];
        }

        return $data;
    }

    /**
     * Map only fields that belong to the employments table.
     */
    private function prepareEmploymentData(array $validated, bool $creating): array
    {
        $fields = ['employee_code', 'branch_id', 'department_id', 'team_id', 'designation_id', 'work_type', 'weekend_days', 'employment_status', 'joining_date', 'resignation_date', 'last_working_day'];

        $data = array_intersect_key($validated, array_flip($fields));

        // New employees always begin with a current employment.
        if ($creating) {
            $data['is_current'] = true;
        }

        return $data;
    }

    /**
     * Trim, remove blank items and reindex array fields.
     */
    private function cleanArray(array $items): array
    {
        return array_values(array_filter(array_map(static fn($item) => is_string($item) ? trim($item) : $item, $items), static fn($item) => filled($item)));
    }

    public function updateBasicInfo(Request $request, string $role, string $employee)
    {
        $request->user()->can('employee.update') || abort(403);
    }

    public function updateAddress(Request $request, string $role, string $employee)
    {
        $request->user()->can('employee.update') || abort(403);
    }

    public function updateProfessionalInfo(Request $request, string $role, string $employee)
    {
        $request->user()->can('employee.update') || abort(403);
    }

    public function updateEmployment(Request $request, string $role, string $employee)
    {
        $request->user()->can('employee.update') || abort(403);
    }

    public function updateSalary(Request $request, string $role, string $employee)
    {
        $request->user()->can('employee.update') || abort(403);
    }

    public function updateBank(Request $request, string $role, string $employee)
    {
        $request->user()->can('employee.update') || abort(403);
    }

    public function updateDocuments(Request $request, string $role, string $employee)
    {
        $request->user()->can('employee.update') || abort(403);
    }
}
