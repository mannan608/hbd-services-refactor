<?php

namespace App\Repositories\Interfaces;

use App\Models\UniversityCampus;

interface CampusRepositoryInterface
{
    public function paginate(int $perPage = 15);

    public function universities();

    public function findById(string $id): UniversityCampus;

    public function create(array $data): UniversityCampus;

    public function update(UniversityCampus $campus, array $data): UniversityCampus;

    public function delete(UniversityCampus $campus): bool;

    public function citiesByUniversity(string $universityId);
}