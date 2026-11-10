   @php
       $docs = [
           [
               'name' => 'Passport Copy',
               'status' => 'Ready',
               'icon' => 'check-circle-2',
               'color' => 'emerald',
               'size' => '2.4 MB · PDF',
               'url' => '#',
           ],
           [
               'name' => 'Academic Transcripts',
               'status' => 'Ready',
               'icon' => 'check-circle-2',
               'color' => 'emerald',
               'size' => '4.1 MB · PDF',
               'url' => '#',
           ],
           [
               'name' => 'Degree Certificates',
               'status' => 'Ready',
               'icon' => 'check-circle-2',
               'color' => 'emerald',
               'size' => '1.8 MB · PDF',
               'url' => '#',
           ],
           [
               'name' => 'IELTS / English Test Result',
               'status' => 'Ready',
               'icon' => 'shield-check',
               'color' => 'emerald',
               'size' => '850 KB · PDF',
               'url' => '#',
           ],
           [
               'name' => 'Unconditional Offer Letter',
               'status' => 'Ready',
               'icon' => 'check-circle-2',
               'color' => 'emerald',
               'size' => '1.2 MB · PDF',
               'url' => '#',
           ],
           [
               'name' => 'Bank Statements (6 months)',
               'status' => 'Ready',
               'icon' => 'check-circle-2',
               'color' => 'emerald',
               'size' => '5.6 MB · PDF',
               'url' => '#',
           ],
           [
               'name' => 'Affidavit of Support',
               'status' => 'Ready',
               'icon' => 'check-circle-2',
               'color' => 'emerald',
               'size' => '920 KB · PDF',
               'url' => '#',
           ],
           [
               'name' => 'Statement of Purpose (SOP)',
               'status' => 'In Review',
               'icon' => 'clock-3',
               'color' => 'amber',
               'size' => 'Draft v2 · Docx',
               'url' => '#',
           ],
           [
               'name' => 'Recommendation Letters',
               'status' => '1 of 2 Received',
               'icon' => 'clock-3',
               'color' => 'amber',
               'size' => '1.1 MB · PDF',
               'url' => '#',
           ],
           [
               'name' => 'CV / Resume',
               'status' => 'Ready',
               'icon' => 'check-circle-2',
               'color' => 'emerald',
               'size' => '450 KB · PDF',
               'url' => '#',
           ],
           [
               'name' => 'Medical / Police Clearance',
               'status' => 'Pending Upload',
               'icon' => 'alert-circle',
               'color' => 'slate',
               'size' => 'Not uploaded',
               'url' => null,
           ],
       ];
   @endphp

   <div class="flex flex-wrap items-center justify-between gap-4 border-b border-brand-50 pb-5">

       <div class="flex items-center gap-3">

           <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
               <iconify-icon icon="lucide:folder-check" class="text-xl"></iconify-icon>
           </div>

           <div>

               <h2 class="text-base font-bold text-brand-950">
                   Visa Documents Checklist
               </h2>

               <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-brand-600">
                   Verification & Compliance
               </p>

           </div>

       </div>


       <div class="flex items-center gap-3">

           <div class="hidden text-right sm:block">

               <span class="text-xs font-semibold text-slate-700">
                   8 of 11 Completed
               </span>

               <div class="mt-1 h-1.5 w-32 overflow-hidden rounded-full bg-slate-100">

                   <div class="h-full rounded-full bg-emerald-500" style="width: 72%;"></div>

               </div>

           </div>


           <span
               class="inline-flex items-center gap-1.5 rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
               72% Ready
           </span>

       </div>

   </div>

   <!-- Document List Grid -->
   <div class="mt-5 grid grid-cols-1 md:grid-cols-2 gap-3">
       @foreach ($docs as $doc)
           <div
               class="group flex items-center justify-between gap-3 rounded-xl border p-3 transition-all duration-200 hover:shadow-xs
                                        {{ $doc['color'] === 'emerald' ? 'border-emerald-100 bg-emerald-50/30 hover:bg-emerald-50/60' : ($doc['color'] === 'amber' ? 'border-amber-100 bg-amber-50/30 hover:bg-amber-50/60' : 'border-slate-200 bg-slate-50/50 hover:bg-white') }}">

               <!-- Left Details -->
               <div class="flex items-center gap-3 min-w-0">
                   <div
                       class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg 
                                                {{ $doc['color'] === 'emerald' ? 'bg-emerald-100/70 text-emerald-600' : ($doc['color'] === 'amber' ? 'bg-amber-100/70 text-amber-600' : 'bg-slate-200/70 text-slate-500') }}">
                       <iconify-icon icon="lucide:{{ $doc['icon'] }}" class="text-lg"></iconify-icon>
                   </div>
                   <div class="truncate">
                       <h3 class="text-xs font-bold text-brand-950 truncate">{{ $doc['name'] }}</h3>
                       <p class="text-[11px] text-slate-400 mt-0.5">{{ $doc['size'] }}</p>
                   </div>
               </div>

               <!-- Right Status & Action -->
               <div class="flex items-center gap-2 shrink-0">
                   <!-- Status Badge -->
                   <span
                       class="inline-flex items-center rounded-md px-2 py-0.5 text-[11px] font-semibold
                                             {{ $doc['color'] === 'emerald' ? 'bg-emerald-100/80 text-emerald-800' : ($doc['color'] === 'amber' ? 'bg-amber-100/80 text-amber-800' : 'bg-slate-200/60 text-slate-600') }}">
                       {{ $doc['status'] }}
                   </span>

                   <!-- View Document Button -->
                   @if ($doc['url'])
                       <a href="{{ $doc['url'] }}" target="_blank" title="View Document"
                           class="flex h-7 w-7 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-600 transition-all hover:border-brand-300 hover:bg-brand-50 hover:text-brand-600">
                           <iconify-icon icon="lucide:eye" class="text-sm"></iconify-icon>
                       </a>
                   @else
                       <button title="Upload Document"
                           class="flex h-7 w-7 items-center justify-center rounded-lg border border-dashed border-slate-300 bg-white text-slate-400 hover:border-brand-400 hover:text-brand-600">
                           <iconify-icon icon="lucide:upload" class="text-sm"></iconify-icon>
                       </button>
                   @endif
               </div>

           </div>
       @endforeach
   </div>
