<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Throwable;

class CourseCategoryController extends Controller
{
    /**
     * List course categories.
     */
    public function index(Request $request)
    {
        $request->user()->can('course-categories.list') || abort(403);

        try {
            $query = CourseCategory::query();

            if ($request->filled('search')) {
                $query->where('name', 'like', '%' . trim($request->search) . '%');
            }

            $categories = $query
                ->latest()
                ->paginate($request->integer('per_page', 15))
                ->withQueryString();

            // return $categories;

            return view('backend.pages.course-categories.index', compact('categories'));
        } catch (Throwable $e) {
            report($e);

            return back()->with('error', 'Unable to load categories.');
        }
    }

    /**
     * Create form.
     */
    public function create(Request $request)
    {
        $request->user()->can('course-categories.create') || abort(403);

        return view('backend.pages.course-categories.create');
    }

    /**
     * Store a category.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->user()->can('course-categories.create') || abort(403);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:course_categories,name'],
            'description' => ['nullable', 'string'],
        ]);

        DB::beginTransaction();

        try {
            CourseCategory::create([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'slug' => Str::slug($validated['name']),
            ]);

            DB::commit();

            return redirect()
            ->route('role.course-categories.index', [
                'role' => $request->route('role'),
            ])
            ->with('success', 'Course category created successfully.');

        } catch (Throwable $e) {
            DB::rollBack();

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Failed to create course category.');
        }
    }

    /**
     * Show details.
     */
    public function show(Request $request, string $role, CourseCategory $courseCategory)
    {
        $request->user()->can('course-categories.view') || abort(403);

        return view('backend.pages.course-categories.edit', [
            'category' => $courseCategory,
        ]);
    }

    /**
     * Edit form.
     */
    public function edit(Request $request, string $role, CourseCategory $courseCategory)
    {
        $request->user()->can('course-categories.edit') || abort(403);

        return view('backend.pages.course-categories.edit', [
            'category' => $courseCategory,
        ]);
    }

    /**
     * Update a category.
     */
    public function update(Request $request, string $role, CourseCategory $courseCategory)
    {
        $request->user()->can('course-categories.edit') || abort(403);

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:course_categories,name,' . $courseCategory->id,
            ],
            'description' => ['nullable', 'string'],
        ]);

        DB::beginTransaction();

        try {
            $courseCategory->fill([
                'name' => $validated['name'],
                'slug' => Str::slug($validated['name']),
                'description' => $request->description,
            ]);

            if ($courseCategory->isDirty()) {
                $courseCategory->save();
            }

            DB::commit();

            return redirect(role_route('role.course-categories.index'))
                ->with('success', 'Course category updated successfully.');
        } catch (Throwable $e) {
            DB::rollBack();

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Failed to update course category.');
        }
    }

    /**
     * Delete a category.
     */
    public function destroy(Request $request, string $role, CourseCategory $courseCategory)
    {
        $request->user()->can('course-categories.delete') || abort(403);

        DB::beginTransaction();

        try {
            $courseCategory->delete();

            DB::commit();

            return redirect()
                ->route('role.course-categories.index')
                ->with('success', 'Course category deleted successfully.');
        } catch (Throwable $e) {
            DB::rollBack();

            report($e);

            return back()
                ->with('error', 'Failed to delete course category.');
        }
    }
}
