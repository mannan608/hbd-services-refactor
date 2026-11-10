@extends('errors.layout')

@section('title', 'Access Denied')

@section('content')
<div class="relative rounded-3xl   p-8 sm:p-12 text-center shadow-2xl backdrop-blur-2xl">
    
    <!-- Status Badge & Code -->
    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-amber-500/10 border border-amber-500/20 text-amber-400 text-xs font-mono font-medium mb-6">
        <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
        ERROR CODE: 403
    </div>

    <!-- Icon -->
    <div class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-2xl bg-gradient-to-tr from-amber-500/20 to-orange-500/20 border border-amber-500/30 text-amber-400 shadow-xl shadow-amber-500/10">
        <iconify-icon icon="lucide:shield-alert" class="text-4xl"></iconify-icon>
    </div>

    <!-- Title & Description -->
    <h1 class="font-extrabold text-3xl sm:text-4xl text-red-600 tracking-tight">Access Denied</h1>
    
    <p class="mt-3 text-slate-400 text-sm sm:text-base leading-relaxed max-w-md mx-auto">
        You don't have permission to access this page. If you believe this is a mistake, please contact an administrator.
    </p>


    <!-- Action Buttons -->
    <div class="flex flex-col sm:flex-row items-center justify-center gap-3.5 mt-8">
        <a 
          href="{{ route('home')}}" 
          class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-6 py-3.5 rounded-xl bg-brand-600 hover:bg-brand-500 text-white font-semibold text-sm transition-all duration-200 shadow-lg shadow-brand-600/25 hover:shadow-brand-600/40 hover:-tranneutral-y-0.5 active:tranneutral-y-0"
        >
          {{-- <i data-lucide="arrow-left" class="w-4 h-4"></i> --}}
           <iconify-icon icon="lucide:arrow-left" class="text-sm"></iconify-icon>
          <span>Back to Homepage</span>
        </a>

        <button 
          onclick="history.back()" 
          class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-6 py-3.5 rounded-xl border border-neutral-200 dark:border-neutral-800 bg-white/70 dark:bg-neutral-900/70 backdrop-blur-md text-neutral-700 dark:text-neutral-300 hover:bg-neutral-100 dark:hover:bg-neutral-800/80 font-semibold text-sm transition-all duration-200 shadow-sm hover:-tranneutral-y-0.5 active:tranneutral-y-0"
        >
           <iconify-icon icon="lucide:rotate-ccw" class="text-sm"></iconify-icon>
          
          <span>Go Back</span>
        </button>
      </div>

    @if(isset($requestId))
        <div class="mt-8 pt-6 border-t border-slate-800/60 text-xs font-mono text-slate-500">
            REQUEST ID: <span class="text-slate-400">{{ $requestId }}</span>
        </div>
    @endif
</div>
@endsection