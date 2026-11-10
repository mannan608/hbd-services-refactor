<aside class="w-full lg:w-80 shrink-0 space-y-4">
  <div class="rounded-2xl border border-neutral-200/80 bg-white p-5 ">
    
    <!-- Sidebar Header -->
    <div class="flex items-center justify-between pb-4 border-b border-neutral-100">
      <div class="flex items-center gap-2">
        <svg class="h-4 w-4 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
        </svg>
        <h2 class="text-sm font-bold tracking-tight text-neutral-900">Filters</h2>
      </div>
      <button type="reset" class="flex items-center gap-1.5 text-xs font-semibold text-neutral-400 hover:text-red-600 transition-colors">
        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
        </svg>
        Reset
      </button>
    </div>

    <div class="mt-5 space-y-6">

      <!-- Qualification Level (Segmented Pills) -->
      <div>
        <label class="block text-xs font-bold tracking-wider text-neutral-400 uppercase mb-2.5">Qualification Level</label>
        <div class="grid grid-cols-1 gap-1.5">
          @foreach(['Doctorate', 'Postgraduate', 'Undergraduate', 'Uni Prep', 'VET'] as $qualification)
            <label class="relative flex items-center justify-between px-3 py-2 rounded-xl border border-neutral-200/60 bg-neutral-50/50 hover:bg-neutral-100/80 cursor-pointer transition-all group">
              <span class="text-sm font-medium text-neutral-700 group-hover:text-neutral-900">{{ $qualification }}</span>
              <input type="radio" name="qualification" class="h-4 w-4 text-brand-500 border-neutral-300 focus:ring-brand-500" />
            </label>
          @endforeach
        </div>
      </div>

      <hr class="border-neutral-100" />

      <!-- Location Dropdowns Group -->
      <div class="space-y-3.5">
        <span class="block text-xs font-bold tracking-wider text-neutral-400 uppercase">Location & Institution</span>
        
        <!-- State Select -->
        <div>
          <label class="block text-sm font-medium text-neutral-600 mb-1">State</label>
          <div class="relative">
            <select class="w-full appearance-none rounded-xl border border-neutral-200 bg-white px-3.5 py-2.5 text-sm text-neutral-700 font-medium focus:border-brand-500 focus:ring-1 focus:ring-brand-500 focus:outline-none shadow-xs transition">
              <option value="">All States</option>
              <option value="nsw">New South Wales</option>
              <option value="vic">Victoria</option>
              <option value="qld">Queensland</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-neutral-400">
              <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
            </div>
          </div>
        </div>

        <!-- City Select -->
        <div>
          <label class="block text-sm font-medium text-neutral-600 mb-1">City</label>
          <div class="relative">
            <select class="w-full appearance-none rounded-xl border border-neutral-200 bg-white px-3.5 py-2.5 text-sm text-neutral-700 font-medium focus:border-brand-500 focus:ring-1 focus:ring-brand-500 focus:outline-none shadow-xs transition">
              <option value="">All Cities</option>
              <option value="sydney">Sydney</option>
              <option value="melbourne">Melbourne</option>
              <option value="brisbane">Brisbane</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-neutral-400">
              <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
            </div>
          </div>
        </div>

        <!-- Provider Select -->
        <div>
          <label class="block text-sm font-medium text-neutral-600 mb-1">Provider / University</label>
          <div class="relative">
            <select class="w-full appearance-none rounded-xl border border-neutral-200 bg-white px-3.5 py-2.5 text-sm text-neutral-700 font-medium focus:border-brand-500 focus:ring-1 focus:ring-brand-500 focus:outline-none shadow-xs transition">
              <option value="">All Providers</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-neutral-400">
              <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
            </div>
          </div>
        </div>
      </div>

      <hr class="border-neutral-100" />

      <!-- Range Sliders -->
      <div class="space-y-5">
        
        <!-- Max Annual Fee Slider -->
        <div x-data="{ fee: 60000 }">
          <div class="flex items-center justify-between mb-2">
            <label class="text-xs font-bold tracking-wider text-neutral-400 uppercase">Max Annual Fee</label>
            <span class="inline-flex items-center rounded-md bg-brand-500/10 px-2 py-0.5 text-xs font-bold text-brand-500" x-text="'A$' + Number(fee).toLocaleString()">A$60,000</span>
          </div>
          <input type="range" min="5000" max="100000" step="2500" x-model="fee" class="h-1.5 w-full cursor-pointer appearance-none rounded-lg bg-neutral-200 accent-brand-500" />
        </div>

        <!-- Max Duration Slider -->
        <div x-data="{ duration: 48 }">
          <div class="flex items-center justify-between mb-2">
            <label class="text-xs font-bold tracking-wider text-neutral-400 uppercase">Max Duration</label>
            <span class="inline-flex items-center rounded-md bg-brand-500/10 px-2 py-0.5 text-xs font-bold text-brand-500" x-text="duration + ' Months'">48 Months</span>
          </div>
          <input type="range" min="6" max="60" step="6" x-model="duration" class="h-1.5 w-full cursor-pointer appearance-none rounded-lg bg-neutral-200 accent-brand-500" />
        </div>

        <!-- IELTS Score Slider -->
        <div x-data="{ score: 8.0 }">
          <div class="flex items-center justify-between mb-1.5">
            <label class="text-xs font-bold tracking-wider text-neutral-400 uppercase">Target IELTS Score</label>
            <span class="inline-flex items-center rounded-md bg-brand-500/10 px-2 py-0.5 text-xs font-bold text-brand-500" x-text="'Band ' + score">Band 8.0</span>
          </div>
          <input type="range" min="4.5" max="9.0" step="0.5" x-model="score" class="h-1.5 w-full cursor-pointer appearance-none rounded-lg bg-neutral-200 accent-brand-500" />
          <p class="mt-1.5 text-xs leading-snug text-neutral-400">PTE and TOEFL equivalencies calculated automatically on cards.</p>
        </div>

      </div>

      <hr class="border-neutral-100" />

      <!-- Scholarship Toggle Toggle/Checkbox -->
      <div>
        <label class="relative flex items-center justify-between p-3 rounded-xl border border-amber-200/60 bg-amber-50/30 cursor-pointer">
          <span class="text-xs font-semibold text-neutral-800">Scholarships available only</span>
          <input type="checkbox" name="scholarship" class="h-4 w-4 rounded border-neutral-300 text-brand-500 focus:ring-brand-500" />
        </label>
      </div>

      <!-- Guest CTA Banner -->
      <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-amber-50 via-orange-50 to-amber-100/60 p-4 border border-amber-200/80 shadow-xs">
        <div class="flex items-start gap-3">
          <div class="rounded-lg bg-amber-500/10 p-1.5 text-amber-800 shrink-0">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
          </div>
          <div>
            <p class="text-xs font-medium leading-relaxed text-neutral-800">
              Save shortlists and receive personalized profile matches.
            </p>
            <button class="mt-3 w-full rounded-xl bg-brand-500 py-2 px-3 text-xs font-bold text-white shadow-xs transition hover:bg-brand-600 active:scale-[0.99]">
              Create Free Account
            </button>
          </div>
        </div>
      </div>

    </div>
  </div>
</aside>