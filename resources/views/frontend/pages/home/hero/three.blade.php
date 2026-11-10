
<section class="relative isolate overflow-hidden bg-gradient-to-br from-[#f5fbfb] via-[#eaf7f6] to-[#d7efec]">

  <!-- Background decorations -->
  <div class="pointer-events-none absolute -right-32 -bottom-48 h-[480px] w-[480px] rounded-full bg-teal-500/20 blur-3xl md:h-[700px] md:w-[700px]"></div>
  <div class="pointer-events-none absolute -left-40 top-20 h-96 w-96 rounded-full border border-teal-600/20"></div>
  <div class="pointer-events-none absolute -left-32 bottom-0 h-72 w-72 rounded-full bg-teal-300/10 blur-2xl"></div>

  <!-- Hero content -->
  <div class="relative mx-auto max-w-7xl px-5 pb-8 pt-12 sm:px-8 lg:px-10 lg:pt-16">

    <div class="grid items-center gap-12 lg:min-h-[480px] lg:grid-cols-2 lg:gap-8">

      <!-- Left content -->
      <div class="relative z-20">

        <!-- Trust badge -->
        <div class="mb-7 inline-flex items-center gap-2.5 rounded-full border border-teal-600/20 bg-white/70 px-4 py-2">
          <span class="h-2 w-2 rounded-full bg-teal-600"></span>
          <span class="text-xs font-semibold text-slate-700 sm:text-sm">
            Explore Australia — No account needed
          </span>
        </div>

        <!-- Heading -->
        <h1 class="max-w-2xl text-4xl font-extrabold leading-[1.12] tracking-tight text-[#0f1b2d] sm:text-5xl lg:text-[56px]">
          Find your course in
          <span class="text-teal-600">Australia</span>,
          then apply with an
          <span class="text-teal-600">expert</span>
          beside you
        </h1>

        <!-- Description -->
        <p class="mt-6 max-w-xl text-base leading-7 text-slate-600 sm:text-lg sm:leading-8">
          Compare tuition, English scores, intakes and scholarships across 620+ institutions — then talk to a verified counsellor for free.
        </p>

        <!-- Course search -->
        <form id="course-search-form"
          class="mt-8 flex flex-col gap-2 rounded-2xl border border-slate-200 bg-white p-2 shadow-xl shadow-teal-950/10 sm:flex-row sm:items-center sm:rounded-full">

          <label for="course-search" class="sr-only">Search courses</label>

          <div class="flex min-w-0 flex-1 items-center gap-3 px-3">
            <svg class="h-5 w-5 shrink-0 text-slate-400"
              fill="none" stroke="currentColor" viewBox="0 0 24 24"
              aria-hidden="true">
              <circle cx="11" cy="11" r="7" stroke-width="2"></circle>
              <path d="m16 16 4 4" stroke-width="2" stroke-linecap="round"></path>
            </svg>

            <input
              id="course-search"
              name="course"
              type="search"
              placeholder="Search courses, e.g. Master of IT"
              class="h-12 w-full min-w-0 border-0 bg-transparent text-sm text-slate-800 outline-none placeholder:text-slate-400 focus:ring-0 sm:text-base"
            />
          </div>

          <button
            type="submit"
            class="shrink-0 rounded-full bg-teal-600 px-6 py-3.5 text-sm font-bold text-white transition hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
            Search courses
          </button>
        </form>

        <p id="course-search-message" class="mt-3 hidden text-sm text-teal-800" role="status" aria-live="polite"></p>

        <!-- Popular courses -->
        <div class="mt-5 flex flex-wrap items-center gap-2">
          <span class="mr-1 text-sm font-medium text-slate-500">Popular:</span>

          <button type="button" data-course="Nursing"
            class="course-chip rounded-lg border border-teal-700/15 bg-white/80 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-teal-600 hover:bg-teal-50">
            Nursing
          </button>

          <button type="button" data-course="Master of IT"
            class="course-chip rounded-lg border border-teal-700/15 bg-white/80 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-teal-600 hover:bg-teal-50">
            Master of IT
          </button>

          <button type="button" data-course="MBA"
            class="course-chip rounded-lg border border-teal-700/15 bg-white/80 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-teal-600 hover:bg-teal-50">
            MBA
          </button>

          <button type="button" data-course="Cyber Security"
            class="course-chip rounded-lg border border-teal-700/15 bg-white/80 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-teal-600 hover:bg-teal-50">
            Cyber Security
          </button>

          <button type="button" data-course="Foundation"
            class="course-chip rounded-lg border border-teal-700/15 bg-white/80 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-teal-600 hover:bg-teal-50">
            Foundation
          </button>
        </div>

      </div>

      <!-- Right visual -->
      <div class="relative mx-auto flex min-h-[340px] w-full max-w-xl items-center justify-center sm:min-h-[440px] lg:min-h-[520px]">

        <!-- Decorative circle -->
        <div class="absolute right-0 top-1/2 aspect-square w-[80%] -translate-y-1/2 rounded-full bg-gradient-to-br from-teal-400/30 to-teal-600/10"></div>

        <div class="absolute right-3 top-1/2 aspect-square w-[68%] -translate-y-1/2 rounded-full border border-teal-600/20"></div>

        <!-- Replace with your own student image -->
        <img
          src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1000&q=85"
          alt="Students preparing for their education journey"
          class="relative z-10 max-h-[480px] w-full object-contain drop-shadow-2xl"
          loading="eager"
        />

        <!-- Floating info card -->
        <div class="absolute bottom-4 left-2 z-20 max-w-[230px] rounded-2xl border border-white/70 bg-white/95 p-4 shadow-2xl shadow-teal-950/15 sm:bottom-8 sm:left-0 sm:p-5">
          <div class="mb-3 grid h-10 w-10 place-items-center rounded-xl bg-teal-50 text-teal-600">
            <svg class="h-5 w-5" fill="none" stroke="currentColor"
              viewBox="0 0 24 24" aria-hidden="true">
              <path d="M12 3 20 8 12 13 4 8 12 3Z" stroke-width="1.8" stroke-linejoin="round"></path>
              <path d="m4 12 8 5 8-5M4 16l8 5 8-5" stroke-width="1.8" stroke-linejoin="round"></path>
            </svg>
          </div>
          <h3 class="font-extrabold text-slate-900">Your journey</h3>
          <p class="mt-1 text-sm leading-6 text-slate-500">
            Guided by experts, powered by insights.
          </p>
        </div>

        <!-- Floating trust card -->
        <div class="absolute right-0 top-5 z-20 rounded-xl border border-white/70 bg-white/90 px-4 py-3 shadow-lg sm:right-2 sm:top-10 sm:px-5 sm:py-4">
          <p class="text-xs font-medium text-slate-500">Your next step</p>
          <p class="mt-1 text-sm font-bold text-teal-700">Study in Australia</p>
        </div>

      </div>
    </div>

    <!-- Feature cards -->
    <div class="relative z-20 mt-10 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:mt-12 lg:grid-cols-4">

      <div class="flex items-center gap-4 rounded-2xl border border-white bg-white/90 p-5 shadow-lg shadow-teal-950/5">
        <div class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-teal-50 text-teal-700">
          <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <circle cx="10.5" cy="10.5" r="6.5" stroke-width="2"></circle>
            <path d="m15.5 15.5 5 5" stroke-width="2" stroke-linecap="round"></path>
          </svg>
        </div>
        <div>
          <h3 class="font-bold text-slate-900">Compare</h3>
          <p class="mt-1 text-sm text-slate-500">Courses &amp; fees</p>
        </div>
      </div>

      <div class="flex items-center gap-4 rounded-2xl border border-white bg-white/90 p-5 shadow-lg shadow-teal-950/5">
        <div class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-teal-50 text-teal-700">
          <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <circle cx="12" cy="8" r="4" stroke-width="2"></circle>
            <path d="M4 21v-2a8 8 0 0 1 16 0v2" stroke-width="2" stroke-linecap="round"></path>
          </svg>
        </div>
        <div>
          <h3 class="font-bold text-slate-900">Connect</h3>
          <p class="mt-1 text-sm text-slate-500">Verified experts</p>
        </div>
      </div>

      <div class="flex items-center gap-4 rounded-2xl border border-white bg-white/90 p-5 shadow-lg shadow-teal-950/5">
        <div class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-teal-50 text-teal-700">
          <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path d="m5 12 4 4L19 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M20 12v7a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h9" stroke-width="2" stroke-linecap="round"></path>
          </svg>
        </div>
        <div>
          <h3 class="font-bold text-slate-900">Apply</h3>
          <p class="mt-1 text-sm text-slate-500">With confidence</p>
        </div>
      </div>

      <div class="flex items-center gap-4 rounded-2xl border border-white bg-white/90 p-5 shadow-lg shadow-teal-950/5">
        <div class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-teal-50 text-teal-700">
          <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path d="M12 3 15 9l6 .9-4.5 4.4 1.1 6.2L12 17.5l-5.6 3 1.1-6.2L3 9.9 9 9l3-6Z" stroke-width="1.8" stroke-linejoin="round"></path>
          </svg>
        </div>
        <div>
          <h3 class="font-bold text-slate-900">Succeed</h3>
          <p class="mt-1 text-sm text-slate-500">In Australia</p>
        </div>
      </div>

    </div>
  </div>
</section>

<script>
  const courseInput = document.getElementById("course-search");
  const courseForm = document.getElementById("course-search-form");
  const courseMessage = document.getElementById("course-search-message");

  document.querySelectorAll(".course-chip").forEach((button) => {
    button.addEventListener("click", () => {
      courseInput.value = button.dataset.course;
      courseInput.focus();
    });
  });

  courseForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const course = courseInput.value.trim();

    if (!course) {
      courseMessage.textContent = "Please enter a course name to search.";
      courseMessage.classList.remove("hidden");
      courseInput.focus();
      return;
    }

    courseMessage.textContent = `Searching for "${course}". Connect this form to your course search page or API.`;
    courseMessage.classList.remove("hidden");
  });
</script>
