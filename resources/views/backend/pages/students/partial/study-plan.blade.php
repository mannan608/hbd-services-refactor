  <div class="flex flex-wrap items-center justify-between gap-4 border-b border-slate-100 pb-5">

      <div class="flex items-center gap-3">

          <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-violet-50 text-violet-600">
              <iconify-icon icon="lucide:book-open-check" class="text-xl"></iconify-icon>
          </div>

          <div>

              <h2 class="text-base font-bold text-slate-900">
                  Study Plan & University Details
              </h2>

              <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-violet-600">
                  Study Destination
              </p>

          </div>

      </div>


      <div class="flex items-center gap-2 rounded-xl border border-slate-200 bg-slate-50 px-3 py-1.5">

          <span class="text-xs font-medium text-slate-500">
              Target Degree:
          </span>

          <span class="text-xs font-semibold text-slate-900">
              Master's Degree
          </span>

      </div>

  </div>
  <!-- Multi-Choice / Priority Options (Alpine.js Tabs or Blade Loop) -->
  <div x-data="{ activeTab: 1 }" class="space-y-4">

      <!-- Tab Navigation for Multiple Institutions/Plans -->
      <div class="flex items-center justify-between border-b border-slate-200">
          <div class="flex gap-2 overflow-x-auto pb-px">
              <button @click="activeTab = 1"
                  :class="activeTab === 1 ? 'border-brand-600 text-brand-600 font-semibold' :
                      'border-transparent text-slate-500 hover:text-slate-700'"
                  class="flex items-center gap-2 border-b-2 px-3 py-2 text-xs transition-all whitespace-nowrap">
                  <span
                      class="flex h-5 w-5 items-center justify-center rounded-full bg-brand-100 text-[10px] font-bold text-brand-700">1</span>
                  Choice 1 (Primary)
              </button>

              <button @click="activeTab = 2"
                  :class="activeTab === 2 ? 'border-brand-600 text-brand-600 font-semibold' :
                      'border-transparent text-slate-500 hover:text-slate-700'"
                  class="flex items-center gap-2 border-b-2 px-3 py-2 text-xs transition-all whitespace-nowrap">
                  <span
                      class="flex h-5 w-5 items-center justify-center rounded-full bg-slate-100 text-[10px] font-bold text-slate-600">2</span>
                  Choice 2
              </button>
          </div>

          <!-- Optional Action: Add Choice -->
          {{-- <button
                                    class="inline-flex items-center gap-1 text-xs font-medium text-brand-600 hover:text-brand-700 mb-2">
                                    <iconify-icon icon="lucide:plus" class="text-sm"></iconify-icon>
                                    <span>Add Choice</span>
                                </button> --}}
      </div>

      <!-- Tab 1: Primary Option -->
      <div x-show="activeTab === 1" class="space-y-4">
          <!-- Program Header Card -->
          <div
              class="flex flex-wrap items-center justify-between gap-3 rounded-xl bg-slate-50/70 p-4 border border-slate-200/80">
              <div>
                  <span class="text-[11px] font-semibold uppercase tracking-wider text-brand-600">Intended
                      Program</span>
                  <h3 class="text-sm font-bold text-slate-900">MSc in Human-Computer Interaction</h3>
              </div>
              {{-- <button type="button"
                                        class="inline-flex items-center gap-1.5 rounded-lg border border-brand-200 bg-brand-50 px-3 py-1.5 text-xs font-semibold text-brand-700 transition hover:border-brand-300 hover:bg-brand-100 focus:outline-none focus:ring-2 focus:ring-brand-200">
                                        <iconify-icon icon="lucide:edit" class="text-sm"></iconify-icon>
                                        <span>Edit</span>
                                    </button> --}}
          </div>

          <!-- Key Info Grid -->
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
              <div class="p-3 rounded-xl bg-white border border-slate-100 shadow-2xs">
                  <span class="text-[11px] font-medium text-slate-400 block mb-0.5">University</span>
                  <span class="text-xs font-semibold text-slate-800 flex items-center gap-1.5">
                      <iconify-icon icon="lucide:building" class="text-slate-400"></iconify-icon>
                      University of Manchester
                  </span>
              </div>

              <div class="p-3 rounded-xl bg-white border border-slate-100 shadow-2xs">
                  <span class="text-[11px] font-medium text-slate-400 block mb-0.5">Destination
                      Country</span>
                  <span class="text-xs font-semibold text-slate-800 flex items-center gap-1.5">
                      <iconify-icon icon="lucide:globe" class="text-slate-400"></iconify-icon>
                      United Kingdom
                  </span>
              </div>

              <div class="p-3 rounded-xl bg-white border border-slate-100 shadow-2xs">
                  <span class="text-[11px] font-medium text-slate-400 block mb-0.5">Duration &
                      Start</span>
                  <span class="text-xs font-semibold text-slate-800 flex items-center gap-1.5">
                      <iconify-icon icon="lucide:calendar" class="text-slate-400"></iconify-icon>
                      1 Year (Sept 2026 – Sept 2027)
                  </span>
              </div>

              <div class="p-3 rounded-xl bg-white border border-slate-100 shadow-2xs">
                  <span class="text-[11px] font-medium text-slate-400 block mb-0.5">Tuition
                      Fee</span>
                  <span class="text-xs font-semibold text-slate-800">£28,500 / year</span>
              </div>

              <div class="p-3 rounded-xl bg-white border border-slate-100 shadow-2xs sm:col-span-2">
                  <span class="text-[11px] font-medium text-slate-400 block mb-0.5">Scholarship /
                      Funding</span>
                  <span class="text-xs font-semibold text-emerald-600 flex items-center gap-1.5">
                      <iconify-icon icon="lucide:award"></iconify-icon>
                      £5,000 Merit Award Applied
                  </span>
              </div>
          </div>

          <!-- Study Plan Summary -->
          <div class="space-y-1">
              <label class="text-xs font-medium text-slate-500">Study Plan Summary</label>
              <div
                  class="text-xs leading-relaxed text-slate-600 bg-slate-50/50 p-3.5 rounded-xl border border-slate-200">
                  Seeking advanced specialization in accessible UX design and software ergonomics.
                  Intend to complete the 1-year taught master's program and utilize university
                  industry partnerships for field research before returning home to contribute to the
                  digital technology sector.
              </div>
          </div>
      </div>

      <!-- Tab 2: Secondary Option -->
      <div x-show="activeTab === 2" class="space-y-4" style="display: none;">
          <div
              class="flex flex-wrap items-center justify-between gap-3 rounded-xl bg-slate-50/70 p-4 border border-slate-200/80">
              <div>
                  <span class="text-[11px] font-semibold uppercase tracking-wider text-brand-600">Intended
                      Program</span>
                  <h3 class="text-sm font-bold text-slate-900">MSc in Interaction Design</h3>
              </div>
              {{-- <button type="button"
                                        class="inline-flex items-center gap-1.5 rounded-lg border border-brand-200 bg-brand-50 px-3 py-1.5 text-xs font-semibold text-brand-700 transition hover:border-brand-300 hover:bg-brand-100 focus:outline-none focus:ring-2 focus:ring-brand-200">
                                        <iconify-icon icon="lucide:edit" class="text-sm"></iconify-icon>
                                        <span>Edit</span>
                                    </button> --}}
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
              <div class="p-3 rounded-xl bg-white border border-slate-100 shadow-2xs">
                  <span class="text-[11px] font-medium text-slate-400 block mb-0.5">University</span>
                  <span class="text-xs font-semibold text-slate-800 flex items-center gap-1.5">
                      <iconify-icon icon="lucide:building" class="text-slate-400"></iconify-icon>
                      TU Delft
                  </span>
              </div>

              <div class="p-3 rounded-xl bg-white border border-slate-100 shadow-2xs">
                  <span class="text-[11px] font-medium text-slate-400 block mb-0.5">Destination
                      Country</span>
                  <span class="text-xs font-semibold text-slate-800 flex items-center gap-1.5">
                      <iconify-icon icon="lucide:globe" class="text-slate-400"></iconify-icon>
                      Netherlands
                  </span>
              </div>

              <div class="p-3 rounded-xl bg-white border border-slate-100 shadow-2xs">
                  <span class="text-[11px] font-medium text-slate-400 block mb-0.5">Duration &
                      Start</span>
                  <span class="text-xs font-semibold text-slate-800 flex items-center gap-1.5">
                      <iconify-icon icon="lucide:calendar" class="text-slate-400"></iconify-icon>
                      2 Years (Sept 2026 – Sept 2028)
                  </span>
              </div>

              <div class="p-3 rounded-xl bg-white border border-slate-100 shadow-2xs">
                  <span class="text-[11px] font-medium text-slate-400 block mb-0.5">Tuition
                      Fee</span>
                  <span class="text-xs font-semibold text-slate-800">€20,500 / year</span>
              </div>

              <div class="p-3 rounded-xl bg-white border border-slate-100 shadow-2xs sm:col-span-2">
                  <span class="text-[11px] font-medium text-slate-400 block mb-0.5">Scholarship /
                      Funding</span>
                  <span class="text-xs font-semibold text-slate-500 flex items-center gap-1.5">
                      <iconify-icon icon="lucide:minus-circle"></iconify-icon>
                      None / Self-funded
                  </span>
              </div>
          </div>

          <div class="space-y-1">
              <label class="text-xs font-medium text-slate-500">Study Plan Summary</label>
              <div
                  class="text-xs leading-relaxed text-slate-600 bg-slate-50/50 p-3.5 rounded-xl border border-slate-200">
                  Alternative option focused on human-centered hardware and software systems design in
                  Europe.
              </div>
          </div>
      </div>

  </div>
