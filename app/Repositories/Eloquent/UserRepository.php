<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserRepository implements UserRepositoryInterface
{
    // public function paginate(int $perPage = 25): LengthAwarePaginator
    // {
    //      return User::query()
    //     ->with('roles:id,name', 'primaryRole:id,name')
    //     ->where('primary_role_id', '!=', 4)
    //     ->latest()
    //     ->paginate($perPage);
    // }

    public function paginate(
        int $perPage = 25,
        ?string $search = null,
        ?string $role = null,
        ?string $status = null
    ): LengthAwarePaginator {
        $query = User::query()
            ->with('roles:id,name', 'primaryRole:id,name')
            ->where('primary_role_id', '!=', 4);

        // Search by name, email, or phone
        if (filled($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        // Filter by primary role
        if (filled($role)) {
            $query->where('primary_role_id', $role);
        }

        // Filter by status
        if (filled($status)) {
            $query->where('status', $status);
        }

        return $query
            ->latest()
            ->paginate($perPage)
            ->withQueryString();
    }

    public function create(array $data): User
    {
        $roleIds = $data['roles'] ?? [];
        unset($data['roles']);

        if (! empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $user = User::create($data);

        // If no roles provided, assign default role
        if (empty($roleIds)) {
            $defaultRole = \Spatie\Permission\Models\Role::where('name', 'default')->first();
            if ($defaultRole) {
                $roleIds[] = $defaultRole->id;
            }
        }

        // Convert IDs to integer to ensure Spatie resolves by ID
        $user->syncRoles(array_map('intval', $roleIds));

        return $user->load('roles', 'primaryRole');
    }

    public function update(User $user, array $data): User
    {
        $roleIds = $data['roles'] ?? [];
        unset($data['roles']);

        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }

        $user->update($data);

        // Convert IDs to integer to ensure Spatie resolves by ID
        $user->syncRoles(array_map('intval', $roleIds));

        return $user->load('roles', 'primaryRole');
    }

    public function delete(User $user): bool
    {
        return (bool) $user->delete();
    }
}
