@extends('errors.layout')

@section('title', 'Page Not Found')

@section('content')
  <main class="flex-1 flex items-center justify-center px-4 sm:px-6 py-12 z-10">
    <div class="w-full max-w-2xl text-center">
      
      <!-- 404 Status Pill -->
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full border border-brand-500/30 bg-brand-500/10 dark:bg-brand-500/15 text-brand-600 dark:text-brand-300 text-xs font-mono font-semibold tracking-wider uppercase mb-6 backdrop-blur-md animate-float">
        <span class="relative flex h-2 w-2">
          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-brand-400 opacity-75"></span>
          <span class="relative inline-flex rounded-full h-2 w-2 bg-brand-500"></span>
        </span>
        ERROR 404 &bull; PAGE NOT FOUND
      </div>

      <!-- Hero Numeric Graphic with Glowing Backdrop -->
      <div class="relative mb-4 select-none">
        <h1 class="font-mono text-8xl sm:text-9xl font-extrabold tracking-tighter text-transparent bg-clip-text bg-gradient-to-b from-neutral-900 via-neutral-700 to-neutral-400 dark:from-white dark:via-neutral-200 dark:to-neutral-600 drop-shadow-sm">
          404
        </h1>
        <div class="absolute inset-0 flex items-center justify-center -z-10 blur-2xl opacity-30 dark:opacity-50">
          <span class="font-mono text-9xl font-bold text-brand-500">404</span>
        </div>
      </div>

      <!-- Main Headline & Subtitle -->
      <h2 class="text-2xl sm:text-3xl font-bold text-neutral-900 dark:text-white tracking-tight mb-3">
        Lost in digital space?
      </h2>
      <p class="text-sm sm:text-base text-neutral-600 dark:text-neutral-400 max-w-lg mx-auto leading-relaxed mb-8">
        The page you are looking for might have been moved, renamed, or temporarily deleted. Let's get you back on track.
      </p>
      <!-- Action Buttons -->
      <div class="flex flex-col sm:flex-row items-center justify-center gap-3.5 mb-12">
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
    </div>
  </main> 
@endsection


