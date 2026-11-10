<!-- Avatar and Rating Header -->
<div class="text-center">
    <div class="relative inline-block mb-4">
        <img src="{{ asset($counsellor->user?->avatar ?? 'frontend-img/prisha.jpg') }}"
            alt="{{ $counsellor->user?->name ?? 'Counsellor' }}"
            class="w-28 h-28 sm:w-32 sm:h-32 rounded-full object-cover mx-auto ring-4 ring-brand-100">
        <span class="absolute bottom-1 right-1 bg-green-500 w-4 h-4 rounded-full border-2 border-white"
            title="Available Online"></span>
    </div>
    <h2 class="text-xl font-bold text-neutral-900">{{ $counsellor->user?->name ?? 'N/A' }}</h2>
    <p class="text-xs font-medium text-brand-600 uppercase tracking-wider mt-0.5">
        {{ $counsellor->designation ?? 'Counsellor' }}</p>

    <!-- Rating Badge -->
    <div class="flex items-center justify-center space-x-1 mt-3">
        <i class="fa-solid fa-star text-amber-400 text-sm"></i>
        <span class="text-sm font-bold text-neutral-900">4.9</span>
        <span class="text-xs text-neutral-400">(128 reviews)</span>
    </div>
</div>

<hr class="border-neutral-100">

<!-- Quick Stats Grid -->
<div class="grid grid-cols-2 gap-3 text-center">
    <div class="bg-brand-50/50 border border-brand-100 p-3 rounded-2xl">
        <span class="block text-xs text-neutral-500">Experience</span>
        <span class="text-base font-bold text-brand-700">{{ $counsellor->experience_years ?? 0 }}+ Years</span>
    </div>
    <div class="bg-brand-50/50 border border-brand-100 p-3 rounded-2xl">
        <span class="block text-xs text-neutral-500">Sessions</span>
        <span class="text-base font-bold text-brand-700">1,400+</span>
    </div>
</div>

<!-- Short Bio -->
<div class="space-y-2">
    <h3 class="text-xs font-bold uppercase tracking-wider text-neutral-400">About Counsellor</h3>
    <p class="text-xs sm:text-sm text-neutral-600 leading-relaxed">
        {{ $counsellor->bio ?? 'N/A' }}
    </p>
</div>

<!-- Expertise Tags -->
<div class="space-y-2">
    <h3 class="text-xs font-bold uppercase tracking-wider text-neutral-400">Specializations</h3>
    @if (!empty($counsellor->expertise))
        <div class="flex flex-wrap gap-1.5">
            @foreach ($counsellor->expertise as $expertise)
                <span class="text-xs bg-neutral-100 text-neutral-700 font-medium px-3 py-1 rounded-full">
                    {{ strtoupper($expertise) }} </span>
            @endforeach
        </div>
    @endif
</div>

 {{-- Languages --}}
            @if (!empty($counsellor->languages))
                <div class="mt-4 flex items-center gap-1.5 text-sm text-slate-500"> <svg
                        class="h-3.5 w-3.5 shrink-0 text-slate-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <path
                            d="M2 12h20M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z" />
                    </svg> <span> <strong class="font-semibold text-slate-700"> Languages : </strong>
                        {{ implode(', ', $counsellor->languages) }} </span> </div>
            @endif
            {{-- Location --}}
            <div class="mt-4 flex items-center gap-1.5 text-sm text-slate-500">
                <svg class="h-4 w-4 shrink-0 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg> <span> <strong class="font-semibold text-slate-700"> Location : </strong> Bangladesh
                </span>
            </div>

<!-- Trust Badges -->
<div class="pt-2 border-t border-neutral-100 space-y-2 text-xs text-neutral-500">
    <div class="flex items-center space-x-2">
        <i class="fa-solid fa-shield-halved text-brand-500"></i>
        <span>100% Confidential & Private</span>
    </div>
    <div class="flex items-center space-x-2">
        <i class="fa-solid fa-video text-brand-500"></i>
        <span>Includes HD Video Call & Notes</span>
    </div>
</div>
