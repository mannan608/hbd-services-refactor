<?php

namespace App\Repositories\Interfaces;

use App\Models\Provider;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProviderRepositoryInterface
{
    public function paginate(int $perPage = 15): LengthAwarePaginator;

    public function findById(int $id): Provider;

    public function create(array $data): Provider;

    public function update(Provider $provider, array $data): Provider;

    public function delete(Provider $provider): bool;
}