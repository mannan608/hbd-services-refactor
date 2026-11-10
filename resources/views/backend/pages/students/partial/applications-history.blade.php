 @php
     $applications = [
         [
             'id' => 'APP-2026-8941',
             'university' => 'University of Manchester',
             'program' => 'MSc in Human-Computer Interaction',
             'country' => 'United Kingdom',
             'degree' => "Master's Degree",
             'submitted_date' => '15 Jan 2026',
             'status' => 'Unconditional Offer',
             'status_type' => 'success', // success, warning, danger, neutral
             'intake' => 'Fall 2026',
             'notes' => 'Merit Award £5,000 granted. CAS reference generation in progress.',
         ],
         [
             'id' => 'APP-2026-7210',
             'university' => 'TU Delft',
             'program' => 'MSc in Interaction Design',
             'country' => 'Netherlands',
             'degree' => "Master's Degree",
             'submitted_date' => '02 Feb 2026',
             'status' => 'Under Assessment',
             'status_type' => 'warning',
             'intake' => 'Fall 2026',
             'notes' => 'Faculty committee reviewing academic transcript equivalency.',
         ],
         [
             'id' => 'APP-2025-4109',
             'university' => 'University of Melbourne',
             'program' => 'Master of Information Technology (UX)',
             'country' => 'Australia',
             'degree' => "Master's Degree",
             'submitted_date' => '10 Nov 2025',
             'status' => 'Unsuccessful',
             'status_type' => 'danger',
             'intake' => 'Spring 2026',
             'notes' => 'Program quota filled for the intake round.',
         ],
     ];
 @endphp

 <div class="flex flex-wrap items-center justify-between gap-4 border-b border-indigo-50 pb-5">

     <div class="flex items-center gap-3">

         <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
             <iconify-icon icon="lucide:history" class="text-xl"></iconify-icon>
         </div>

         <div>

             <h2 class="text-base font-bold text-brand-950">
                 Applications History
             </h2>

             <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-indigo-600">
                 University Portal
             </p>

         </div>

     </div>


     <div class="flex items-center gap-2">

         <span
             class="inline-flex items-center gap-1 rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700">
             <iconify-icon icon="lucide:layers" class="text-xs"></iconify-icon>

             3 Total
         </span>


         <span
             class="inline-flex items-center gap-1 rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
             <iconify-icon icon="lucide:check-circle-2" class="text-xs"></iconify-icon>

             1 Offer
         </span>

     </div>

 </div>

 <!-- Multiple Applications Cards List -->
 <div class="space-y-4">
     @foreach ($applications as $app)
         <div
             class="rounded-xl border border-slate-200/80 bg-slate-50/50 p-4 transition-all hover:bg-white hover:shadow-xs space-y-3">

             <!-- Card Header: Program & Status -->
             <div class="flex flex-wrap items-start justify-between gap-2 border-b border-slate-200/60 pb-3">
                 <div class="space-y-0.5">
                     <div class="flex items-center gap-2">
                         <span class="text-[11px] font-mono font-medium text-slate-400">{{ $app['id'] }}</span>
                         <span class="text-[11px] text-slate-300">•</span>
                         <span class="text-[11px] font-medium text-brand-600">{{ $app['intake'] }}</span>
                     </div>
                     <h3 class="text-sm font-bold text-slate-900">{{ $app['program'] }}</h3>
                     <p class="text-xs font-semibold text-slate-600 flex items-center gap-1.5">
                         <iconify-icon icon="lucide:building-2" class="text-slate-400"></iconify-icon>
                         {{ $app['university'] }}
                     </p>
                 </div>

                 <!-- Contextual Status Badges -->
                 <span
                     class="inline-flex items-center gap-1.5 rounded-full px-3 py-1 text-xs font-semibold border
                                                {{ $app['status_type'] === 'success' ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : '' }}
                                                {{ $app['status_type'] === 'warning' ? 'bg-amber-50 text-amber-700 border-amber-200' : '' }}
                                                {{ $app['status_type'] === 'danger' ? 'bg-rose-50 text-rose-700 border-rose-200' : '' }}
                                                {{ $app['status_type'] === 'neutral' ? 'bg-slate-100 text-slate-700 border-slate-200' : '' }}">
                     <span
                         class="h-1.5 w-1.5 rounded-full 
                                                {{ $app['status_type'] === 'success' ? 'bg-emerald-500' : '' }}
                                                {{ $app['status_type'] === 'warning' ? 'bg-amber-500' : '' }}
                                                {{ $app['status_type'] === 'danger' ? 'bg-rose-500' : '' }}
                                                {{ $app['status_type'] === 'neutral' ? 'bg-slate-400' : '' }}"></span>
                     {{ $app['status'] }}
                 </span>
             </div>

             <!-- Attributes Grid -->
             <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 pt-1">
                 <div class="p-2.5 rounded-lg bg-white border border-slate-200/60">
                     <span class="text-[10px] font-medium text-slate-400 block">Destination</span>
                     <span class="text-xs font-semibold text-slate-800 flex items-center gap-1 mt-0.5">
                         <iconify-icon icon="lucide:globe" class="text-slate-400 text-xs"></iconify-icon>
                         {{ $app['country'] }}
                     </span>
                 </div>

                 <div class="p-2.5 rounded-lg bg-white border border-slate-200/60">
                     <span class="text-[10px] font-medium text-slate-400 block">Submitted
                         Date</span>
                     <span class="text-xs font-semibold text-slate-800 flex items-center gap-1 mt-0.5">
                         <iconify-icon icon="lucide:calendar" class="text-slate-400 text-xs"></iconify-icon>
                         {{ $app['submitted_date'] }}
                     </span>
                 </div>

                 <div class="p-2.5 rounded-lg bg-white border border-slate-200/60 col-span-2 sm:col-span-1">
                     <span class="text-[10px] font-medium text-slate-400 block">Degree Level</span>
                     <span class="text-xs font-semibold text-slate-800 flex items-center gap-1 mt-0.5">
                         <iconify-icon icon="lucide:graduation-cap" class="text-slate-400 text-xs"></iconify-icon>
                         {{ $app['degree'] }}
                     </span>
                 </div>
             </div>

             <!-- Remarks / Notes Footer -->
             @if (!empty($app['notes']))
                 <div
                     class="flex items-start gap-2 rounded-lg bg-white/80 p-2.5 border border-slate-200/60 text-xs text-slate-600">
                     <iconify-icon icon="lucide:info" class="text-slate-400 text-sm mt-0.5 shrink-0"></iconify-icon>
                     <span class="leading-relaxed">{{ $app['notes'] }}</span>
                 </div>
             @endif

         </div>
     @endforeach
 </div>
