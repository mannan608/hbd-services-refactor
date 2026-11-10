@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        
        <!-- Header & Action Bar -->
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between border-b border-neutral-100 pb-5 dark:border-neutral-800">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-50 text-brand-600 dark:bg-brand-900/30 dark:text-brand-400">
                    <iconify-icon icon="lucide:calendar-check-2" class="text-xl"></iconify-icon>
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <h3 class="text-lg font-bold text-neutral-900 dark:text-white">Booking Details</h3>
                        <span class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-0.5 text-xs font-semibold
                            {{ strtolower($booking->status) === 'confirmed' || strtolower($booking->status) === 'completed' 
                                ? 'bg-emerald-50 text-emerald-700 dark:bg-emerald-950/40 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800/50' 
                                : (strtolower($booking->status) === 'pending' 
                                    ? 'bg-amber-50 text-amber-700 dark:bg-amber-950/40 dark:text-amber-400 border border-amber-200 dark:border-amber-800/50' 
                                    : 'bg-rose-50 text-rose-700 dark:bg-rose-950/40 dark:text-rose-400 border border-rose-200 dark:border-rose-800/50') }}">
                            <span class="h-1.5 w-1.5 rounded-full 
                                {{ strtolower($booking->status) === 'confirmed' || strtolower($booking->status) === 'completed' ? 'bg-emerald-500' : (strtolower($booking->status) === 'pending' ? 'bg-amber-500' : 'bg-rose-500') }}"></span>
                            {{ ucfirst($booking->status) }}
                        </span>
                    </div>
                </div>
            </div>

            <a href="{{ role_route('role.booking-sessions.index') }}"
                class="inline-flex items-center gap-2 rounded-xl border border-neutral-200 bg-white px-4 py-2 text-sm font-semibold text-neutral-700 shadow-2xs transition-all hover:bg-neutral-50 hover:text-neutral-900 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-200 dark:hover:bg-neutral-700">
                <iconify-icon icon="lucide:arrow-left" class="text-sm"></iconify-icon>
                Back to list
            </a>
        </div>

        <!-- Information Cards Grid -->
        <div class="grid gap-6 lg:grid-cols-2">
            
            <!-- Client Overview Card -->
            <div class="rounded-2xl border border-neutral-100 bg-white p-5 sm:p-6 shadow-xs dark:border-neutral-800/80 dark:bg-neutral-900 space-y-4">
                <div class="flex items-center gap-2.5 border-b border-neutral-100 pb-3 dark:border-neutral-800">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-neutral-100 text-neutral-600 dark:bg-neutral-800 dark:text-neutral-300">
                        <iconify-icon icon="lucide:user" class="text-base"></iconify-icon>
                    </div>
                    <h4 class="text-base font-bold text-neutral-900 dark:text-white">Client Information</h4>
                </div>

                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                    
                    <!-- Client Name -->
                    <div class="rounded-xl border border-neutral-100 bg-neutral-50/60 p-3 dark:border-neutral-800 dark:bg-neutral-800/40">
                        <span class="text-[11px] font-medium text-neutral-400 dark:text-neutral-500 block mb-0.5">Client Name</span>
                        <span class="text-sm font-semibold text-neutral-900 dark:text-neutral-100 flex items-center gap-1.5">
                            <iconify-icon icon="lucide:user-circle" class="text-neutral-400 text-sm"></iconify-icon>
                            {{ $booking->name }}
                        </span>
                    </div>

                    <!-- Phone Number -->
                    <div class="rounded-xl border border-neutral-100 bg-neutral-50/60 p-3 dark:border-neutral-800 dark:bg-neutral-800/40">
                        <span class="text-[11px] font-medium text-neutral-400 dark:text-neutral-500 block mb-0.5">Phone Number</span>
                        <a href="tel:{{ $booking->phone }}" class="text-sm font-semibold text-neutral-900 hover:text-brand-600 dark:text-neutral-100 dark:hover:text-brand-400 flex items-center gap-1.5 transition-colors">
                            <iconify-icon icon="lucide:phone" class="text-neutral-400 text-sm"></iconify-icon>
                            {{ $booking->phone }}
                        </a>
                    </div>

                    <!-- Email Address -->
                    <div class="rounded-xl border border-neutral-100 bg-neutral-50/60 p-3 dark:border-neutral-800 dark:bg-neutral-800/40 sm:col-span-2">
                        <span class="text-[11px] font-medium text-neutral-400 dark:text-neutral-500 block mb-0.5">Email Address</span>
                        <a href="mailto:{{ $booking->email }}" class="text-sm font-semibold text-brand-600 hover:underline dark:text-brand-400 flex items-center gap-1.5 truncate">
                            <iconify-icon icon="lucide:mail" class="text-neutral-400 text-sm shrink-0"></iconify-icon>
                            <span class="truncate">{{ $booking->email }}</span>
                        </a>
                    </div>

                    <!-- Service Requested -->
                    <div class="rounded-xl border border-neutral-100 bg-neutral-50/60 p-3 dark:border-neutral-800 dark:bg-neutral-800/40 sm:col-span-2">
                        <span class="text-[11px] font-medium text-neutral-400 dark:text-neutral-500 block mb-0.5">Requested Service</span>
                        <span class="text-sm font-semibold text-neutral-900 dark:text-neutral-100 flex items-center gap-1.5 capitalize">
                            <iconify-icon icon="lucide:briefcase" class="text-neutral-400 text-sm"></iconify-icon>
                            {{ str_replace('_', ' ', $booking->service) }}
                        </span>
                    </div>

                </div>
            </div>

            <!-- Schedule & Counsellor Card -->
            <div class="rounded-2xl border border-neutral-100 bg-white p-5 sm:p-6 shadow-xs dark:border-neutral-800/80 dark:bg-neutral-900 space-y-4">
                <div class="flex items-center gap-2.5 border-b border-neutral-100 pb-3 dark:border-neutral-800">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-neutral-100 text-neutral-600 dark:bg-neutral-800 dark:text-neutral-300">
                        <iconify-icon icon="lucide:clock" class="text-base"></iconify-icon>
                    </div>
                    <h4 class="text-base font-bold text-neutral-900 dark:text-white">Schedule & Assignment</h4>
                </div>

                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                    
                    <!-- Assigned Counsellor -->
                    <div class="rounded-xl border border-neutral-100 bg-neutral-50/60 p-3 dark:border-neutral-800 dark:bg-neutral-800/40 sm:col-span-2">
                        <span class="text-[11px] font-medium text-neutral-400 dark:text-neutral-500 block mb-0.5">Assigned Counsellor</span>
                        <span class="text-sm font-semibold text-neutral-900 dark:text-neutral-100 flex items-center gap-1.5">
                            <iconify-icon icon="lucide:user-check" class="text-brand-500 text-sm"></iconify-icon>
                            {{ $booking->counsellor?->user?->name ?? 'Unassigned' }}
                        </span>
                    </div>

                    <!-- Appointment Date -->
                    <div class="rounded-xl border border-neutral-100 bg-neutral-50/60 p-3 dark:border-neutral-800 dark:bg-neutral-800/40">
                        <span class="text-[11px] font-medium text-neutral-400 dark:text-neutral-500 block mb-0.5">Appointment Date</span>
                        <span class="text-sm font-semibold text-neutral-900 dark:text-neutral-100 flex items-center gap-1.5">
                            <iconify-icon icon="lucide:calendar" class="text-neutral-400 text-sm"></iconify-icon>
                            {{ optional($booking->appointment_date)->format('M d, Y') ?? 'N/A' }}
                        </span>
                    </div>

                    <!-- Time Slot -->
                    <div class="rounded-xl border border-neutral-100 bg-neutral-50/60 p-3 dark:border-neutral-800 dark:bg-neutral-800/40">
                        <span class="text-[11px] font-medium text-neutral-400 dark:text-neutral-500 block mb-0.5">Time Slot</span>
                        <span class="text-sm font-semibold text-neutral-900 dark:text-neutral-100 flex items-center gap-1.5">
                            <iconify-icon icon="lucide:clock-3" class="text-neutral-400 text-sm"></iconify-icon>
                            {{ $booking->appointment_time }}
                        </span>
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection