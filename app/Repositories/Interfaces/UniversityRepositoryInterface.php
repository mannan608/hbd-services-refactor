<?php

namespace App\Repositories\Interfaces;

use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface UniversityRepositoryInterface
{
    /**
     * Get paginated universities.
     */
    public function paginate(array $filters = [], int $perPage = 20): LengthAwarePaginator;

    /**
     * Find university by UUID.
     */
    public function findById(string $id): University;

    /**
     * Create university.
     */
    public function create(array $data, ?Request $request = null): University;

    /**
     * Update university.
     */
    public function update(University $university, array $data, ?Request $request = null): University;

    /**
     * Delete university.
     */
    public function delete(University $university): bool;
}