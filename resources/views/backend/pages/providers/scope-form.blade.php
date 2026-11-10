<div x-data="courseScopeForm()" x-init="init()" class="space-y-6">

    {{-- ================================================================
        UNIVERSITY + COURSE / PROGRAM
    ================================================================= --}}

    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

        {{-- University --}}
        <div>
            <label class="mb-2 block text-sm font-medium text-neutral-800 dark:text-neutral-200">
                University
                <span class="text-red-500">*</span>
            </label>

            <select
                name="university_id"
                x-model="universityId"
                @change="changeUniversity()"
                class="w-full rounded-lg border border-neutral-300 bg-white px-3 py-2.5 text-sm
                       text-neutral-900 outline-none transition
                       focus:border-neutral-500 focus:ring-1 focus:ring-neutral-500
                       dark:border-neutral-700 dark:bg-neutral-900 dark:text-white"
                required
            >
                <option value="">Select University</option>

                <template x-for="university in universities" :key="university.id">
                    <option
                        :value="university.id"
                        x-text="university.name"
                    ></option>
                </template>
            </select>

            @error('university_id')
                <p class="mt-1 text-xs text-red-600">
                    {{ $message }}
                </p>
            @enderror
        </div>


        {{-- Course / Program --}}
        <div>
            <label class="mb-2 block text-sm font-medium text-neutral-800 dark:text-neutral-200">
                Course / Program
                <span class="text-red-500">*</span>
            </label>

            <select
                name="course_id"
                x-model="courseId"
                @change="changeCourse()"
                :disabled="!universityId"
                class="w-full rounded-lg border border-neutral-300 bg-white px-3 py-2.5 text-sm
                       text-neutral-900 outline-none transition
                       focus:border-neutral-500 focus:ring-1 focus:ring-neutral-500
                       disabled:cursor-not-allowed disabled:bg-neutral-100
                       dark:border-neutral-700 dark:bg-neutral-900 dark:text-white
                       dark:disabled:bg-neutral-800"
                required
            >
                <option value="">Select Course / Program</option>

                <template x-for="course in filteredCourses" :key="course.id">
                    <option
                        :value="course.id"
                        x-text="course.title"
                    ></option>
                </template>
            </select>

            <p
                x-show="universityId && filteredCourses.length === 0"
                class="mt-2 text-xs text-neutral-500 dark:text-neutral-400"
            >
                No course available for this university.
            </p>

            @error('course_id')
                <p class="mt-1 text-xs text-red-600">
                    {{ $message }}
                </p>
            @enderror
        </div>

    </div>


    {{-- ================================================================
    CAMPUS
================================================================= --}}

<div>

    <label class="mb-2 block text-sm font-medium text-neutral-800 dark:text-neutral-200">
        Campus
        <span class="text-red-500">*</span>
    </label>

    {{-- Campus Selector --}}
    <div
        class="relative"
        x-show="courseId"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
    >

        {{-- Loading Overlay --}}
        <div
            x-show="loadingCampuses"
            x-transition.opacity
            class="absolute inset-0 z-10 flex items-center justify-center
                   rounded-lg bg-white/70 backdrop-blur-[1px]
                   dark:bg-neutral-900/70"
        >
            <div class="flex items-center gap-2 text-xs text-neutral-500 dark:text-neutral-400">
                <svg
                    class="size-4 animate-spin"
                    viewBox="0 0 24 24"
                    fill="none"
                >
                    <circle
                        class="opacity-25"
                        cx="12"
                        cy="12"
                        r="10"
                        stroke="currentColor"
                        stroke-width="3"
                    ></circle>

                    <path
                        class="opacity-75"
                        fill="currentColor"
                        d="M4 12a8 8 0 018-8v3a5 5 0 00-5 5H4z"
                    ></path>
                </svg>

                Loading campuses...
            </div>
        </div>


        {{-- Keep component mounted --}}
        <x-form.multi-select
            id="course-scope-campus"
            name="campus_ids[]"
            label=""
            placeholder="Select Campus..."
            :options="[]"
            :selected="old('campus_ids', [])"
            required
        />


        @error('campus_ids')
            <p class="mt-1 text-xs text-red-600">
                {{ $message }}
            </p>
        @enderror

        @error('campus_ids.*')
            <p class="mt-1 text-xs text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>


    {{-- Course Not Selected --}}
    <div
        x-show="!courseId"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
        class="flex items-center gap-2 rounded-lg border border-dashed
               border-neutral-300 px-4 py-4 text-sm text-neutral-500
               dark:border-neutral-700 dark:text-neutral-400"
    >
        <iconify-icon
            icon="lucide:info"
            class="text-base"
        ></iconify-icon>

        Select a course first to see available campuses.
    </div>


    {{-- No Campus Available --}}
    <div
        x-show="courseId && !loadingCampuses && campuses.length === 0"
        x-transition
        class="mt-3 flex items-center gap-2 rounded-lg border border-dashed
               border-neutral-300 px-4 py-4 text-sm text-neutral-500
               dark:border-neutral-700 dark:text-neutral-400"
    >
        <iconify-icon
            icon="lucide:info"
            class="text-base"
        ></iconify-icon>

        No campus is available for this course.
    </div>

</div>


    {{-- ================================================================
        EDIT MODE
    ================================================================= --}}

    <div
        x-show="editing"
        x-transition
        class="flex items-start gap-3 rounded-lg border border-amber-200
               bg-amber-50 px-4 py-3
               dark:border-amber-500/20 dark:bg-amber-500/10"
    >

        <iconify-icon
            icon="lucide:pencil"
            class="mt-0.5 shrink-0 text-sm text-amber-600 dark:text-amber-400"
        ></iconify-icon>

        <div>
            <p class="text-xs font-medium text-amber-800 dark:text-amber-300">
                Editing Course Scope
            </p>

            <p class="mt-0.5 text-xs text-amber-700/80 dark:text-amber-400/80">
                Update the course and campus access for this scope.
            </p>
        </div>

    </div>

</div>


@push('scripts')
<script>
    function courseScopeForm() {

        return {

            /*
            |--------------------------------------------------------------------------
            | State
            |--------------------------------------------------------------------------
            */

            universityId: @js(old('university_id', '')),

            courseId: @js(old('course_id', '')),

            editing: false,

            campuses: [],


            /*
            |--------------------------------------------------------------------------
            | Universities
            |--------------------------------------------------------------------------
            */

            universities: @js(
                $universities
                    ->map(fn ($university) => [
                        'id' => $university->id,
                        'name' => $university->name,
                    ])
                    ->values()
            ),


            /*
            |--------------------------------------------------------------------------
            | Courses
            |--------------------------------------------------------------------------
            |
            | IMPORTANT:
            | campuses must be loaded using with('campuses:id,name')
            | in the controller.
            |
            */

            courses: @js(
                $courses
                    ->map(fn ($course) => [
                        'id' => $course->id,

                        'university_id' => $course->university_id,

                        'title' => $course->title,

                        'campuses' => $course->campuses
                            ->map(fn ($campus) => [
                                'id' => $campus->id,
                                'name' => $campus->name,
                            ])
                            ->values(),
                    ])
                    ->values()
            ),


            /*
            |--------------------------------------------------------------------------
            | Filter Courses By University
            |--------------------------------------------------------------------------
            */

            get filteredCourses() {

                if (!this.universityId) {
                    return [];
                }

                return this.courses.filter(course => {

                    return String(course.university_id) ===
                        String(this.universityId);

                });
            },


            /*
            |--------------------------------------------------------------------------
            | Init
            |--------------------------------------------------------------------------
            */

            init() {

                /*
                |--------------------------------------------------------------------------
                | Edit Scope
                |--------------------------------------------------------------------------
                */

                window.addEventListener(
                    'course-scope:edit',
                    event => {

                        const scope = event.detail || {};

                        this.editing = true;

                        this.universityId =
                            scope.university_id ?? '';

                        this.courseId =
                            scope.course_id ?? '';

                        const selectedCampusIds =
                            scope.campus_ids ?? [];

                        this.loadCampusesForCourse(
                            selectedCampusIds
                        );
                    }
                );


                /*
                |--------------------------------------------------------------------------
                | Create New Scope
                |--------------------------------------------------------------------------
                */

                window.addEventListener(
                    'course-scope:create',
                    () => {

                        this.resetForm();

                    }
                );


                /*
                |--------------------------------------------------------------------------
                | Validation Error / Old Input
                |--------------------------------------------------------------------------
                */

                if (this.universityId && this.courseId) {

                    this.loadCampusesForCourse(
                        @js(old('campus_ids', []))
                    );

                } else {

                    this.updateCampusOptions([]);

                }
            },


            /*
            |--------------------------------------------------------------------------
            | University Changed
            |--------------------------------------------------------------------------
            */

            changeUniversity() {

                /*
                | Reset course
                */

                this.courseId = '';


                /*
                | Reset campuses
                */

                this.campuses = [];


                this.updateCampusOptions([]);
            },


            /*
            |--------------------------------------------------------------------------
            | Course Changed
            |--------------------------------------------------------------------------
            */

            changeCourse() {

                /*
                | No course selected
                */

                if (!this.courseId) {

                    this.campuses = [];

                    this.updateCampusOptions([]);

                    return;
                }


                /*
                | Load campuses belonging to selected course
                */

                this.loadCampusesForCourse([]);
            },


            /*
            |--------------------------------------------------------------------------
            | Load Campuses For Course
            |--------------------------------------------------------------------------
            */

            loadCampusesForCourse(selectedIds = []) {

                /*
                | No course selected
                */

                if (!this.courseId) {

                    this.campuses = [];

                    this.updateCampusOptions([]);

                    return;
                }


                /*
                | Find selected course
                */

                const course = this.courses.find(course => {

                    return String(course.id) ===
                        String(this.courseId) &&

                        String(course.university_id) ===
                        String(this.universityId);

                });


                /*
                | Course not found
                */

                if (!course) {

                    this.campuses = [];

                    this.updateCampusOptions([]);

                    return;
                }


                /*
                | Get course campuses
                */

                const availableCampuses =
                    Array.isArray(course.campuses)
                        ? course.campuses
                        : [];


                /*
                | Store campuses in Alpine state
                */

                this.campuses = availableCampuses;


                /*
                | Normalize selected campus IDs
                */

                const normalizedSelectedIds =
                    Array.isArray(selectedIds)
                        ? selectedIds.map(id => String(id))
                        : [];


                /*
                | Get available campus IDs
                */

                const availableIds =
                    availableCampuses.map(
                        campus => String(campus.id)
                    );


                /*
                | Only keep valid selected campuses
                */

                const validSelectedIds =
                    normalizedSelectedIds.filter(
                        id => availableIds.includes(id)
                    );


                /*
                | Update Multi Select
                */

                this.updateCampusOptions(
                    availableCampuses,
                    validSelectedIds
                );
            },


            /*
            |--------------------------------------------------------------------------
            | Update Multi Select Component
            |--------------------------------------------------------------------------
            */

            updateCampusOptions(
                options = [],
                selected = []
            ) {

                window.dispatchEvent(
                    new CustomEvent(
                        'multi-select:update',
                        {
                            detail: {

                                id: 'course-scope-campus',

                                options: options,

                                selected: selected,

                            }
                        }
                    )
                );
            },


            /*
            |--------------------------------------------------------------------------
            | Reset Form
            |--------------------------------------------------------------------------
            */

            resetForm() {

                this.editing = false;

                this.universityId = '';

                this.courseId = '';

                this.campuses = [];

                this.updateCampusOptions([]);
            }

        };
    }
</script>
@endpush