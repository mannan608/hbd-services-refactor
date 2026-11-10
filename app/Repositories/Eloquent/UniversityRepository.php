<?php

namespace App\Repositories\Eloquent;

use App\Models\University;
use App\Repositories\Interfaces\UniversityRepositoryInterface;
use App\Traits\HandlesFiles;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UniversityRepository implements UniversityRepositoryInterface
{

use HandlesFiles;
    /**
     * Get paginated universities.
     */
    public function paginate(array $filters = [], int $perPage = 20): LengthAwarePaginator
    {
        $query = University::query()
           ->select([
            'id',
            'name',
            'slug',
            'short_name',
            'tag',
            'logo',
            'banner',
            'email',
            'phone',
            'website',
            'state',
            'address',
            'global_ranking',
            'national_ranking',
            'accreditation',
            'description',
            'overview',
            'campus_facilities',
            'is_active',
        ])->withCount([
        'campuses',
        'courses',
        'intakes',
    ]);

        /*
         * Search
         */
        if (!empty($filters['search'])) {
            $search = trim($filters['search']);

            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('short_name', 'LIKE', "%{$search}%")
                    ->orWhere('slug', 'LIKE', "%{$search}%");
            });
        }

        /*
         * Country filter
         */
        if (array_key_exists('country_id', $filters) && $filters['country_id'] !== null && $filters['country_id'] !== '') {
            $query->where('country_id', $filters['country_id']);
        }

        /*
         * City filter
         */
        if (array_key_exists('city_id', $filters) && $filters['city_id'] !== null && $filters['city_id'] !== '') {
            $query->where('city_id', $filters['city_id']);
        }
         if (!empty($filters['tag'])) {
            $query->where('tag', $filters['tag']);
        }

        /*
         * Active filter
         */
        if (array_key_exists('is_active', $filters) && $filters['is_active'] !== null && $filters['is_active'] !== '') {
            $query->where('is_active', (bool) $filters['is_active']);
        }

        /*
         * Featured filter
         */
        if (array_key_exists('is_featured', $filters) && $filters['is_featured'] !== null && $filters['is_featured'] !== '') {
            $query->where('is_featured', (bool) $filters['is_featured']);
        }

        /*
         * Sorting
         */
        $query->orderBy('sort_order')->latest('created_at');

        return $query->paginate($perPage)->withQueryString();
    }

    /**
     * Find university by ID.
     *
     * UUID is used instead of integer.
     */
    public function findById(string $id): University
    {
        return University::findOrFail($id);
    }

    /**
     * Create university.
     */
   public function create(
    array $data,
    ?Request $request = null
): University {
    return DB::transaction(function () use ($data, $request) {

        /*
         * Normalize repeatable inputs.
         */
        if (array_key_exists('campus_facilities', $data)) {
            $data['campus_facilities'] =
                $this->normalizeFacilities(
                    $data['campus_facilities']
                );
        }

        /*
         * Generate unique slug.
         */
        $data['slug'] = University::generateUniqueSlug([
            $data['name'] ?? null,
            $data['short_name'] ?? null,
        ]);

        /*
         * Upload logo.
         */
        if ($request?->hasFile('logo')) {
            $data['logo'] = $this->uploadFile(
                $request->file('logo'),
                'universities/logos'
            );
        }

        /*
         * Upload banner.
         */
        if ($request?->hasFile('banner')) {
            $data['banner'] = $this->uploadFile(
                $request->file('banner'),
                'universities/banners'
            );
        }

        return University::create($data);
    });
}

    /**
     * Update university.
     */
 public function update(
    University $university,
    array $data,
    ?Request $request = null
): University {
    return DB::transaction(function () use (
        $university,
        $data,
        $request
    ) {

        /*
         * Normalize repeatable inputs.
         */
        if (array_key_exists('campus_facilities', $data)) {
            $data['campus_facilities'] =
                $this->normalizeFacilities(
                    $data['campus_facilities']
                );
        }

        /*
         * Regenerate slug when name changes
         * or slug is missing.
         */
        if (
            array_key_exists('name', $data) ||
            blank($university->slug)
        ) {
            $data['slug'] = University::generateUniqueSlug(
                [
                    $data['name'] ?? $university->name,
                    $data['short_name'] ?? $university->short_name,
                ],
                $university->id
            );
        }

        /*
         * Replace logo.
         */
        if ($request?->hasFile('logo')) {
            $data['logo'] = $this->replaceFile(
                $request->file('logo'),
                $university->logo,
                'universities/logos'
            );
        }

        /*
         * Replace banner.
         */
        if ($request?->hasFile('banner')) {
            $data['banner'] = $this->replaceFile(
                $request->file('banner'),
                $university->banner,
                'universities/banners'
            );
        }

        /*
         * Only update validated fields.
         */
        $university->fill($data);
        $university->save();

        return $university->fresh([
            'country',
            'city',
        ]);
    });
}

    /**
     * Delete university.
     */
public function delete(
    University $university
): bool {
    return DB::transaction(function () use ($university) {

        $this->deleteFile($university->logo);
        $this->deleteFile($university->banner);

        return $university->delete();
    });
}

    /**
     * Normalize campus facilities by removing empty values.
     */
    private function normalizeFacilities(array $facilities): array
    {
        return array_values(array_filter(
            $facilities,
            fn ($facility) => filled(is_string($facility) ? trim($facility) : $facility)
        ));
    }
}
