<?php

namespace App\Repositories\Eloquent;

use App\Models\City;
use App\Models\University;
use App\Models\UniversityCampus;
use App\Repositories\Interfaces\CampusRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CampusRepository implements CampusRepositoryInterface
{
    public function paginate(int $perPage = 15)
    {
        return UniversityCampus::select('id', 'university_id',
                'city_id','name', 'slug','email', 'phone','address', 'is_main_campus', 'is_active')
        ->with(['university:id,name', 'city:id,name'])
            ->latest()
            ->paginate($perPage);
    }

    public function universities()
    {
        return University::query()
            ->orderBy('name')
            ->get(['id', 'name']);
    }

    public function findById(string $id): UniversityCampus
    {
        return UniversityCampus::with(['university', 'city'])->findOrFail($id);
    }

    public function create(array $data): UniversityCampus
    {
        return DB::transaction(function () use ($data) {
            $data['slug'] = $this->generateUniqueSlug($data['name']);

            return UniversityCampus::create($data);
        });
    }

    public function update(UniversityCampus $campus, array $data): UniversityCampus
    {
        return DB::transaction(function () use ($campus, $data) {
            if (isset($data['name']) && $campus->name !== $data['name']) {
                $data['slug'] = $this->generateUniqueSlug($data['name'], $campus->id);
            }

            $campus->update($data);

            return $campus->fresh(['university', 'city']);
        });
    }

    public function delete(UniversityCampus $campus): bool
    {
        return DB::transaction(function () use ($campus) {
            return $campus->delete();
        });
    }

    private function generateUniqueSlug(string $name, ?string $ignoreId = null): string
    {
        $baseSlug = Str::slug($name);

        if ($baseSlug === '') {
            $baseSlug = 'campus';
        }

        $slug = $baseSlug;
        $counter = 2;

        while (UniversityCampus::query()->where('slug', $slug)->when($ignoreId, fn($query) => $query->where('id', '!=', $ignoreId))->exists()) {
            $slug = "{$baseSlug}-{$counter}";
            $counter++;
        }

        return $slug;
    }

    public function citiesByUniversity(string $universityId)
{
    $university = University::query()
        ->select('id', 'country_id')
        ->findOrFail($universityId);

    return City::query()
        ->where('country_id', $university->country_id)
        ->orderBy('name')
        ->get([
            'id',
            'name',
        ]);
}
}