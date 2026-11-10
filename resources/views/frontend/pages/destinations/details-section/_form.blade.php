   {{-- <div class="max-w-7xl mx-auto px-5 md:px-8"> --}}
   <form action="" method="POST" class="space-y-4 ">
       @csrf

       <div class="grid md:grid-cols-2 gap-4">
           {{-- Full Name --}}
           <div>
               <label for="full_name" class="block text-sm font-semibold text-slate-700 mb-2">
                   Full Name <span class="text-red-500">*</span>
               </label>
               <div class="relative">
                   <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                       <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2"
                           viewBox="0 0 24 24">
                           <path stroke-linecap="round" stroke-linejoin="round"
                               d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                       </svg>
                   </div>
                   <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}"
                       placeholder="e.g. John Doe" required
                       class="w-full pl-12 pr-4 py-2.5 rounded-xl border @error('full_name') border-red-400 bg-red-50/50 @else border-slate-200 @enderror text-slate-900 placeholder-slate-400 placeholder:text-sm focus:outline-none focus:ring-4 focus:ring-brand-500/10 focus:border-brand-500 transition-all duration-200">
               </div>
               @error('full_name')
                   <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                       <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                           <path fill-rule="evenodd"
                               d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                               clip-rule="evenodd" />
                       </svg>
                       {{ $message }}
                   </p>
               @enderror
           </div>

           {{-- Email --}}
           <div>
               <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">
                   Email Address <span class="text-red-500">*</span>
               </label>
               <div class="relative">
                   <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                       <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2"
                           viewBox="0 0 24 24">
                           <path stroke-linecap="round" stroke-linejoin="round"
                               d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                       </svg>
                   </div>
                   <input type="email" id="email" name="email" value="{{ old('email') }}"
                       placeholder="you@example.com" required
                       class="w-full pl-12 pr-4 py-2.5 rounded-xl border @error('email') border-red-400 bg-red-50/50 @else border-slate-200 @enderror text-slate-900 placeholder-slate-400 placeholder:text-sm focus:outline-none focus:ring-4 focus:ring-brand-500/10 focus:border-brand-500 transition-all duration-200">
               </div>
               @error('email')
                   <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                       <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                           <path fill-rule="evenodd"
                               d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                               clip-rule="evenodd" />
                       </svg>
                       {{ $message }}
                   </p>
               @enderror
           </div>
       </div>

       {{-- Phone & WhatsApp side by side --}}
       <div class="grid md:grid-cols-2 gap-4">
           <div>
               <label for="phone" class="block text-sm font-semibold text-slate-700 mb-2">
                   Phone Number <span class="text-red-500">*</span>
               </label>
               <div class="relative">
                   <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                       <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2"
                           viewBox="0 0 24 24">
                           <path stroke-linecap="round" stroke-linejoin="round"
                               d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                       </svg>
                   </div>
                   <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                       placeholder="+880 1XXX-XXXXXX"
                       class="w-full pl-12 pr-4 py-2.5 rounded-xl border @error('phone') border-red-400 bg-red-50/50 @else border-slate-200 @enderror text-slate-900 placeholder-slate-400 placeholder:text-sm focus:outline-none focus:ring-4 focus:ring-brand-500/10 focus:border-brand-500 transition-all duration-200">
               </div>
               @error('phone')
                   <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
               @enderror
           </div>

           <div>
               <label for="whatsapp" class="block text-sm font-semibold text-slate-700 mb-2">
                   WhatsApp
                   <span class="font-normal text-slate-400 text-xs">(optional)</span>
               </label>
               <div class="relative">
                   <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                       <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                           <path
                               d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                       </svg>
                   </div>
                   <input type="tel" id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}"
                       placeholder="+880 1XXX-XXXXXX"
                       class="w-full pl-12 pr-4 py-2.5 rounded-xl border @error('whatsapp') border-red-400 bg-red-50/50 @else border-slate-200 @enderror text-slate-900 placeholder-slate-400 placeholder:text-sm focus:outline-none focus:ring-4 focus:ring-brand-500/10 focus:border-brand-500 transition-all duration-200">
               </div>
               @error('whatsapp')
                   <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
               @enderror
           </div>
       </div>

       <div class="grid md:grid-cols-2 gap-4">
           <div>
               <x-form.select-input name="destination" label="Interested Destination" placeholder="Select Destination"
                   :options="[
                       'Australia' => 'Australia',
                       'United Kingdom' => 'United Kingdom',
                       'Canada' => 'Canada',
                       'United States' => 'United States',
                       'New Zealand' => 'New Zealand',
                       'Malaysia' => 'Malaysia',
                   ]" value="{{ old('destination', 'destination') }}" />


           </div>
           <div>
               <x-form.select-input name="intake" label="Interested Intake" placeholder="Select Intake"
                   :options="[
                       '2027-01' => 'January 2027',
                       '2027-06' => 'June 2027',
                       '2028-01' => 'January 2028',
                       '2028-06' => 'June 2028',
                   ]" :value="old('intake', '')" />
           </div>
       </div>
       <!-- Terms -->
       <div class="mt-8">
           <div x-data="{ checkboxToggle: false }">
               <label for="checkboxLabelOne"
                   class="flex cursor-pointer items-start text-xs text-neutral-500 select-none dark:text-neutral-400 sm:text-sm">

                   <div class="relative shrink-0">
                       <input type="checkbox" id="checkboxLabelOne" class="sr-only"
                           @change="checkboxToggle = !checkboxToggle" />

                       <div :class="checkboxToggle
                           ?
                           'border-brand-500 bg-brand-500' :
                           'border-neutral-300 bg-transparent dark:border-neutral-700'"
                           class="mr-2.5 flex h-5 w-5 items-center justify-center rounded-md border">

                           <span :class="checkboxToggle ? '' : 'opacity-0'">
                               <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                   xmlns="http://www.w3.org/2000/svg">
                                   <path d="M11.6666 3.5L5.24992 9.91667L2.33325 7" stroke="white"
                                       stroke-width="1.94437" stroke-linecap="round" stroke-linejoin="round" />
                               </svg>
                           </span>
                       </div>
                   </div>

                   <p class="leading-5">
                       Agree with our
                       <span class="text-neutral-800 dark:text-white/90">
                           Terms and Conditions,
                       </span>
                       &
                       <span class="text-neutral-800 dark:text-white">
                           Privacy Policy
                       </span>
                   </p>
               </label>
           </div>
       </div>


       {{-- Submit --}}
       <div class="pt-2">
           <button type="submit"
               class="group relative w-full flex items-center justify-center gap-2 overflow-hidden rounded-xl bg-gradient-to-r from-brand-600 to-brand-600 px-6 py-2.5 sm:py-3.5  text-white font-semibold shadow-lg shadow-brand-600/25 hover:shadow-xl hover:shadow-brand-600/30 hover:-translate-y-0.5 active:translate-y-0 focus:outline-none focus:ring-4 focus:ring-brand-500/30 transition-all duration-200">
               <span
                   class="absolute inset-0 bg-gradient-to-r from-brand-600 to-brand-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
               <svg class="relative w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                   viewBox="0 0 24 24">
                   <path stroke-linecap="round" stroke-linejoin="round"
                       d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
               </svg>
               <span class="relative">Schedule Free Consultation</span>
           </button>

           <p class="mt-4 text-center text-xs text-slate-400 flex items-center justify-center gap-1.5">
               <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                   <path fill-rule="evenodd"
                       d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                       clip-rule="evenodd" />
               </svg>
               Your information is safe and will never be shared.
           </p>
       </div>
   </form>
   {{-- </div> --}}
