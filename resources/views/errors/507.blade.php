@extends('errors.layout')

@section('title', 'Storage Temporarily Unavailable')

@section('content')
<div class="relative rounded-3xl border border-slate-800/80 bg-slate-900/50 p-8 sm:p-12 text-center shadow-2xl backdrop-blur-2xl">
    
    <!-- Status Badge & Code -->
    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-violet-500/10 border border-violet-500/20 text-violet-400 text-xs font-mono font-medium mb-6">
        <span class="w-2 h-2 rounded-full bg-violet-500 animate-pulse"></span>
        ERROR CODE: 507
    </div>

    <!-- Icon -->
    <div class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-2xl bg-gradient-to-tr from-violet-500/20 to-purple-500/20 border border-violet-500/30 text-violet-400 shadow-xl shadow-violet-500/10">
        <iconify-icon icon="lucide:database-zap" class="text-4xl"></iconify-icon>
    </div>

    <!-- Title & Description -->
    <h1 class="font-extrabold text-3xl sm:text-4xl text-white tracking-tight">Service Temporarily Unavailable</h1>
    
    <p class="mt-3 text-slate-400 text-sm sm:text-base leading-relaxed max-w-md mx-auto">
        The server is currently experiencing storage limits and is unable to complete your request. Please try again later.
    </p>

    <!-- Action Buttons -->
    <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-3">
        <a href="{{ url('/') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 rounded-xl bg-brand-600 hover:bg-brand-500 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-brand-600/25 transition-all active:scale-95">
            <iconify-icon icon="lucide:home" class="text-lg"></iconify-icon>
            Go to Homepage
        </a>
        
        <a href="javascript:location.reload()" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 rounded-xl border border-slate-800 bg-slate-800/40 hover:bg-slate-800/80 px-6 py-3 text-sm font-semibold text-slate-300 transition-all active:scale-95">
            <iconify-icon icon="lucide:refresh-cw" class="text-lg text-slate-400"></iconify-icon>
            Try Again
        </a>
    </div>

    @if(isset($requestId))
        <div class="mt-8 pt-6 border-t border-slate-800/60 text-xs font-mono text-slate-500">
            REQUEST ID: <span class="text-slate-400">{{ $requestId }}</span>
        </div>
    @endif
</div>
@endsection