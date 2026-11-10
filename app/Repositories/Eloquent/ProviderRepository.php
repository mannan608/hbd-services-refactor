<?php

namespace App\Repositories\Eloquent;

use App\Models\Provider;
use App\Models\User;
use App\Repositories\Interfaces\ProviderRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProviderRepository implements ProviderRepositoryInterface
{
    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return Provider::query()
            ->with('user')
            ->latest()
            ->paginate($perPage);
    }

    public function findById(int $id): Provider
    {
        return Provider::query()
            ->with('user')
            ->findOrFail($id);
    }

    public function create(array $data): Provider
    {
        return DB::transaction(function () use ($data) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            return Provider::create([
                'user_id' => $user->id,
                'short_name' => $data['short_name'] ?? null,
                'phone' => $data['phone'] ?? null,
                'country_id' => $data['country_id'] ?? null,
                'state' => $data['state'] ?? null,
                'city_id' => $data['city_id'] ?? null,
                'address' => $data['address'] ?? null,
            ]);
        });
    }

  public function update(Provider $provider, array $data): Provider
{
    return DB::transaction(function () use ($provider, $data) {

        $provider->user->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        if (!empty($data['password'])) {
            $provider->user->update([
                'password' => Hash::make($data['password']),
            ]);
        }

        $provider->update([
            'short_name' => $data['short_name'] ?? null,
            'phone' => $data['phone'] ?? null,
            'country_id' => $data['country_id'] ?? null,
            'state' => $data['state'] ?? null,
            'city_id' => $data['city_id'] ?? null,
            'address' => $data['address'] ?? null,
        ]);

        return $provider->fresh('user');
    });
}

    public function delete(Provider $provider): bool
    {
        return $provider->delete();
    }
}
