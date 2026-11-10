<?php

namespace App\Repositories\Interfaces;

use App\Models\Course;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface CourseRepositoryInterface
{
    /*
    |--------------------------------------------------------------------------
    | Existing CRUD
    |--------------------------------------------------------------------------
    */

    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator;

    public function findById(string $id): Course;

    public function create(array $data, Request $request): Course;

    public function update(Course $course, array $data, Request $request): Course;

    public function delete(Course $course): bool;

    public function getAll();


    public function getDegreeLevels(): Collection;   

    /*
    |--------------------------------------------------------------------------
    | Related Courses
    |--------------------------------------------------------------------------
    */

    public function relatedCourses(Course $course, int $limit = 4): Collection;
}