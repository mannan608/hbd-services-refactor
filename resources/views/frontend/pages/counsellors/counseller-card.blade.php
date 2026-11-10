@isset($counsellor)
    <a href="{{ route('counsellor.details', $counsellor) }}"
        class="flex flex-col justify-between rounded-2xl border border-slate-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
        <div>
            <div class="flex items-start justify-between">
                {{-- User Info --}}
                <div class="flex items-center gap-3">
                    <img class="h-12 w-12 rounded-full object-cover"
                        src="{{ asset($counsellor->user?->avatar ?? 'frontend-img/prisha.jpg') }}"
                        alt="{{ $counsellor->user?->name ?? 'Counsellor' }}" />
                    <div>
                        <h3 class="font-bold text-slate-900"> {{ $counsellor->user?->name ?? 'N/A' }} </h3>
                        <p class="text-sm text-slate-500"> {{ $counsellor->designation ?? 'Counsellor' }} </p>
                    </div>
                </div>
                {{-- Experience --}}
                <span class="rounded-full bg-brand-25 px-2 py-1 text-sm font-semibold text-brand-600">
                    {{ $counsellor->experience_years ?? 0 }}+ Yrs Exp </span>
            </div>
            {{-- Expertise --}}
            @if (!empty($counsellor->expertise))
                <div class="mt-4 flex flex-wrap gap-2">
                    @foreach ($counsellor->expertise as $expertise)
                        <span
                            class="rounded-full bg-slate-50 px-3 py-1 text-[11px] font-medium tracking-wide text-neutral-600">
                            {{ strtoupper($expertise) }} </span>
                    @endforeach
                </div>
            @endif
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
        </div>
        {{-- Button --}}
        <div class="flex items-center justify-center"> <span
                class="mt-6 inline-flex w-fit items-center justify-center gap-2 rounded-xl bg-brand-100 px-4 py-2.5 text-sm font-bold text-brand-700 transition hover:bg-slate-100">
                View Profile &amp; Book <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    stroke-width="2">
                    <rect x="3" y="4" width="18" height="18" rx="2" />
                    <path d="M16 2v4M8 2v4M3 10h18" />
                </svg> </span> </div>
    </a>
@endisset
