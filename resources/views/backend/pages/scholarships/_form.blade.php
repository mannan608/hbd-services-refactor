@php
    $isEdit = isset($scholarship) && $scholarship;

    $universityId = old('university_id', $scholarship?->university_id);
    $courseId = old('course_id', $scholarship?->course_id);
    $coverageType = old('coverage_type', $scholarship?->coverage_type);
@endphp

<div x-data="{
    universityId: @js($universityId),
    courseId: @js($courseId),

    courses: @js(
    $courses
        ->map(
            fn($course) => [
                'id' => $course->id,
                'university_id' => $course->university_id,
                'name' => $course->title,
            ],
        )
        ->values(),
),

    get filteredCourses() {
        if (!this.universityId) {
            return [];
        }

        return this.courses.filter(
            course => String(course.university_id) === String(this.universityId)
        );
    },

    universityChanged() {
        const courseExists = this.filteredCourses.some(
            course => String(course.id) === String(this.courseId)
        );

        if (!courseExists) {
            this.courseId = '';
        }
    }
}">
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">

        {{-- LEFT --}}
        <div class="space-y-6 lg:col-span-8">

            {{-- Scholarship --}}
            <div class="rounded-2xl border border-neutral-200 bg-white dark:border-neutral-800 dark:bg-neutral-900">

                {{-- Header --}}
                <div class="border-b border-neutral-100 p-5 dark:border-neutral-800">
                    <h2 class="text-lg font-semibold text-neutral-800 dark:text-white">
                        Scholarship
                    </h2>
                </div>

                {{-- Form Body --}}
                <div class="space-y-5 p-5">

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                        {{-- University --}}
                        <div>
                            <label for="university_id"
                                class="mb-1.5 block text-sm font-medium text-neutral-700 dark:text-neutral-300">
                                University
                            </label>

                            <select id="university_id" name="university_id" x-model="universityId"
                                @change="universityChanged()"
                                class="h-11 w-full rounded-lg border border-neutral-300 bg-transparent px-4 text-sm text-neutral-800 focus:border-brand-500 focus:ring-brand-500 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white">
                                <option value="">
                                    Select University
                                </option>

                                @foreach ($universities as $university)
                                    <option value="{{ $university->id }}">
                                        {{ $university->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('university_id')
                                <p class="mt-1 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Course --}}
                        <div>
                            <label for="course_id"
                                class="mb-1.5 block text-sm font-medium text-neutral-700 dark:text-neutral-300">
                                Course
                            </label>

                            <select id="course_id" name="course_id" x-model="courseId" :disabled="!universityId"
                                class="h-11 w-full rounded-lg border border-neutral-300 bg-transparent px-4 text-sm text-neutral-800 focus:border-brand-500 focus:ring-brand-500 disabled:cursor-not-allowed disabled:bg-neutral-100 disabled:opacity-70 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:disabled:bg-neutral-800">
                                <option value="">
                                    Select Course
                                </option>

                                <template x-for="course in filteredCourses" :key="course.id">
                                    <option :value="course.id" x-text="course.name"></option>
                                </template>
                            </select>

                            {{-- No University Selected --}}
                            <p x-show="!universityId" class="mt-1 text-xs text-neutral-500 dark:text-neutral-400">
                                Please select a university first.
                            </p>

                            {{-- No Course --}}
                            <p x-show="universityId && filteredCourses.length === 0"
                                class="mt-1 text-xs text-neutral-500 dark:text-neutral-400">
                                No courses available for this university.
                            </p>

                            @error('course_id')
                                <p class="mt-1 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Scholarship Title --}}
                        <x-form.input-text name="title" label="Scholarship Title"
                            value="{{ old('title', $scholarship?->title) }}" placeholder="Enter Scholarship Title..." />



                        {{-- Coverage Type --}}
                        <x-form.select-input name="coverage_type" label="Coverage Type" :options="[
                            'full_free' => 'Full Free',
                            'half_free' => 'Half Free',
                            'one_time' => 'One Time',
                        ]"
                            :value="old('coverage_type', $scholarship?->coverage_type ?? '')" />
                        {{-- Amount Description --}}
                        <x-form.textarea-input name="amount_description" label="Amount Description"
                            value="{{ old('amount_description', $scholarship?->amount_description) }}"
                            placeholder="Enter Amount Description..." />

                        {{-- Eligibility Criteria --}}
                        <x-form.textarea-input name="eligibility_criteria" label="Eligibility Criteria"
                            value="{{ old('eligibility_criteria', $scholarship?->eligibility_criteria) }}"
                            placeholder="Enter Eligibility Criteria..." />

                    </div>
                </div>
            </div>
        </div>


        {{-- RIGHT --}}
        <div class="space-y-6 lg:col-span-4">

            {{-- Deadline --}}
            <x-form.input-text name="deadline" label="Expiry Date" type="datetime-local"
                value="{{ old('deadline', $scholarship?->deadline ? \Illuminate\Support\Carbon::parse($scholarship->deadline)->format('Y-m-d\TH:i') : '') }}" />

            {{-- Active --}}
            <div>
                <label class="flex cursor-pointer items-center gap-3">

                    <input type="hidden" name="is_active" value="0">

                    <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $scholarship?->is_active ?? true))
                        class="h-4 w-4 rounded border-neutral-300 text-brand-600 focus:ring-brand-500">

                    <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300">
                        Active
                    </span>
                </label>

                @error('is_active')
                    <p class="mt-1 text-sm text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            {{-- Submit --}}
            <div class="rounded-2xl border border-neutral-200 bg-white dark:border-neutral-800 dark:bg-neutral-900">
                <div class="flex justify-end p-5">

                    <button type="submit"
                        class="w-full rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-brand-500">
                        {{ $isEdit ? 'Update' : 'Create' }}
                    </button>

                </div>
            </div>

        </div>

    </div>
</div>
