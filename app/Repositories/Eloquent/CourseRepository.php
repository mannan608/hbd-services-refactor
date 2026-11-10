<?php

namespace App\Repositories\Eloquent;

use App\Models\Course;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseRepository implements CourseRepositoryInterface
{
    /*
    |--------------------------------------------------------------------------
    | Get All Active Courses
    |--------------------------------------------------------------------------
    */

    public function getAll()
    {
        return Course::query()->select('id', 'title')->where('is_active', true)->orderBy('title')->get();
    }

    /*
    |--------------------------------------------------------------------------
    | Course Listing
    |--------------------------------------------------------------------------
    */

    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        $query = Course::query()
            ->select(['id', 'title', 'slug','code', 'university_id', 'category_id', 'degree_level', 'entry_requirements','outcomes', 'overview', 'gpa_requirement', 'english_requirement_text', 'duration_months', 'toefl_overall', 'pte_overall', 'ielts_overall', 'tuition_fee', 'is_scholarship_available', 'is_active'])
            ->where('is_active', true)
            ->with(['university:id,name', 
            'university.intakes:id,university_id,name,year,application_open_date,application_deadline,status,is_active',
            'campuses:id,name', 'category:id,name']);

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if (!empty($filters['search'])) {
            $search = trim($filters['search']);

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('degree_level', 'like', "%{$search}%")
                    ->orWhere('english_requirement_text', 'like', "%{$search}%")
                    ->orWhere('overview', 'like', "%{$search}%")
                    ->orWhereHas('university', function ($university) use ($search) {
                        $university->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('category', function ($category) use ($search) {
                        $category->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('campuses', function ($campus) use ($search) {
                        $campus->where('name', 'like', "%{$search}%");
                    });
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Degree / Qualification
        |--------------------------------------------------------------------------
        */

        if (!empty($filters['qualification'])) {
            $query->where('degree_level', $filters['qualification']);
        }

        /*
        |--------------------------------------------------------------------------
        | University
        |--------------------------------------------------------------------------
        */

        if (!empty($filters['provider'])) {
            $query->where('university_id', $filters['provider']);
        }

        /*
        |--------------------------------------------------------------------------
        | Maximum Tuition Fee
        |--------------------------------------------------------------------------
        */

        if (isset($filters['max_fee']) && $filters['max_fee'] !== '') {
            $query->where('tuition_fee', '<=', (float) $filters['max_fee']);
        }

        /*
        |--------------------------------------------------------------------------
        | IELTS Requirement
        |--------------------------------------------------------------------------
        */

        if (isset($filters['ielts_score']) && $filters['ielts_score'] !== '') {
            $query->where(function ($q) use ($filters) {
                $score = (float) $filters['ielts_score'];

                $q->whereNull('ielts_overall')->orWhere('ielts_overall', '<=', $score);
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Scholarship
        |--------------------------------------------------------------------------
        */

        if (!empty($filters['scholarship'])) {
            $query->where('is_scholarship_available', true);
        }

        /*
        |--------------------------------------------------------------------------
        | Sorting
        |--------------------------------------------------------------------------
        */

        match ($filters['sort'] ?? 'relevance') {
            'fee_asc' => $query->orderBy('tuition_fee', 'asc'),

            'fee_desc' => $query->orderBy('tuition_fee', 'desc'),

            default => $query->latest('id'),
        };

        return $query->paginate($perPage)->withQueryString();
    }

    /*
    |--------------------------------------------------------------------------
    | Find Course
    |--------------------------------------------------------------------------
    */

    public function findById(string $id): Course
{
    return Course::with(['university:id,name,logo,country_id',
        'university.country:id,name',
        'campuses',
        'category:id,name',
    ])->findOrFail($id);
}

    /*
    |--------------------------------------------------------------------------
    | Degree Levels
    |--------------------------------------------------------------------------
    */

    public function getDegreeLevels(): Collection
    {
        return Course::query()->where('is_active', true)->whereNotNull('degree_level')->where('degree_level', '!=', '')->distinct()->orderBy('degree_level')->pluck('degree_level');
    }


    /*
    |--------------------------------------------------------------------------
    | Related Courses
    |--------------------------------------------------------------------------
    */

    public function relatedCourses(Course $course, int $limit = 4): Collection
    {
        return Course::query()
            ->where('is_active', true)
            ->where('id', '!=', $course->id)
            ->where(function ($query) use ($course) {
                $query->where('university_id', $course->university_id)->orWhere('category_id', $course->category_id);
            })
            ->with(['university:id,name,logo,country_id', 'university.country:id,name', 'campuses:id,name', 'category:id,name'])
            ->latest('id')
            ->limit($limit)
            ->get();
    }

    /*
    |--------------------------------------------------------------------------
    | Create
    |--------------------------------------------------------------------------
    */

    public function create(array $data, Request $request): Course
    {
        return DB::transaction(function () use ($data) {
            $data['slug'] = $this->generateUniqueSlug($data['title']);

            $campusIds = $data['campus_ids'] ?? [];

            unset($data['campus_ids']);

            $course = Course::create($data);

            if (!empty($campusIds)) {
                $course->campuses()->sync($campusIds);
            }

            return $course->fresh(['university', 'campuses', 'category']);
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    */

    public function update(Course $course, array $data, Request $request): Course
    {
        return DB::transaction(function () use ($course, $data) {
            if (isset($data['title']) && $course->title !== $data['title']) {
                $data['slug'] = $this->generateUniqueSlug($data['title'], $course->id);
            }

            $campusIds = $data['campus_ids'] ?? [];

            unset($data['campus_ids']);

            $course->update($data);

            $course->campuses()->sync($campusIds);

            return $course->fresh(['university', 'campuses', 'category']);
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */

    public function delete(Course $course): bool
    {
        return $course->delete();
    }

    /*
    |--------------------------------------------------------------------------
    | Base Filter Query
    |--------------------------------------------------------------------------
    */

    private function buildFilteredQuery(array $filters = [])
    {
        $query = Course::query()->where('is_active', true);

        if (!empty($filters['search'])) {
            $search = trim($filters['search']);

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                ->orWhereHas('university', function ($university) use ($search) {
                    $university->where('name', 'like', "%{$search}%");
                });
            });
        }

        if (!empty($filters['qualification'])) {
            $query->where('degree_level', $filters['qualification']);
        }

        if (!empty($filters['provider'])) {
            $query->where('university_id', $filters['provider']);
        }

        if (isset($filters['max_fee']) && $filters['max_fee'] !== '') {
            $query->where('tuition_fee', '<=', (float) $filters['max_fee']);
        }

        if (isset($filters['ielts_score']) && $filters['ielts_score'] !== '') {
            $query->where('ielts_overall', '<=', (float) $filters['ielts_score']);
        }

        if (!empty($filters['scholarship'])) {
            $query->where('is_scholarship_available', true);
        }

        return $query;
    }

    /*
    |--------------------------------------------------------------------------
    | Unique Slug
    |--------------------------------------------------------------------------
    */

    private function generateUniqueSlug(string $title, ?string $ignoreId = null): string
    {
        $baseSlug = Str::slug($title);

        if ($baseSlug === '') {
            $baseSlug = 'course';
        }

        $slug = $baseSlug;

        $counter = 2;

        while (Course::where('slug', $slug)->when($ignoreId, fn($query) => $query->where('id', '!=', $ignoreId))->exists()) {
            $slug = "{$baseSlug}-{$counter}";

            $counter++;
        }

        return $slug;
    }
}