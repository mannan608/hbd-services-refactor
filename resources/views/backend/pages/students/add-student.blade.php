@extends('backend.layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">Add New Lead</h1>
            <p class="text-sm text-neutral-500 dark:text-neutral-400">Fill in the lead's details below.</p>
        </div>
        <a href="#" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-200 bg-white dark:bg-neutral-800 border border-neutral-300 dark:border-neutral-700 rounded-lg hover:bg-neutral-50 dark:hover:bg-neutral-700/50 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Back to Leads List
        </a>
    </div>

    <!-- Form Card -->
    <form action="#" method="POST" class="bg-white dark:bg-neutral-900 rounded-2xl border border-neutral-200 dark:border-neutral-800 shadow-sm p-6 sm:p-8 space-y-6">
        @csrf
        
        <!-- Personal Information Section -->
        <div>
            <h3 class="text-base font-semibold text-neutral-800 dark:text-neutral-200 border-b border-neutral-200 dark:border-neutral-800 pb-2 mb-4">Personal Details</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-neutral-700 dark:text-neutral-300 uppercase tracking-wider mb-1">First Name *</label>
                    <input type="text" name="first_name" required class="w-full px-3.5 py-2.5 rounded-lg border border-neutral-300 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white focus:ring-2 focus:ring-brand-500 outline-none text-sm">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-neutral-700 dark:text-neutral-300 uppercase tracking-wider mb-1">Last Name *</label>
                    <input type="text" name="last_name" required class="w-full px-3.5 py-2.5 rounded-lg border border-neutral-300 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white focus:ring-2 focus:ring-brand-500 outline-none text-sm">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-neutral-700 dark:text-neutral-300 uppercase tracking-wider mb-1">Email Address *</label>
                    <input type="email" name="email" required class="w-full px-3.5 py-2.5 rounded-lg border border-neutral-300 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white focus:ring-2 focus:ring-brand-500 outline-none text-sm">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-neutral-700 dark:text-neutral-300 uppercase tracking-wider mb-1">Phone Number</label>
                    <input type="text" name="phone" class="w-full px-3.5 py-2.5 rounded-lg border border-neutral-300 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white focus:ring-2 focus:ring-brand-500 outline-none text-sm">
                </div>
            </div>
        </div>

        <!-- Business & Status Section -->
        <div>
            <h3 class="text-base font-semibold text-neutral-800 dark:text-neutral-200 border-b border-neutral-200 dark:border-neutral-800 pb-2 mb-4">Lead Status & Assignment</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-neutral-700 dark:text-neutral-300 uppercase tracking-wider mb-1">Company</label>
                    <input type="text" name="company" class="w-full px-3.5 py-2.5 rounded-lg border border-neutral-300 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white focus:ring-2 focus:ring-brand-500 outline-none text-sm">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-neutral-700 dark:text-neutral-300 uppercase tracking-wider mb-1">Status</label>
                    <select name="status" class="w-full px-3.5 py-2.5 rounded-lg border border-neutral-300 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white focus:ring-2 focus:ring-brand-500 outline-none text-sm">
                        <option value="new">New</option>
                        <option value="contacted">Contacted</option>
                        <option value="qualified">Qualified</option>
                        <option value="lost">Lost</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-neutral-700 dark:text-neutral-300 uppercase tracking-wider mb-1">Assign To</label>
                    <select name="assigned_to" class="w-full px-3.5 py-2.5 rounded-lg border border-neutral-300 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white focus:ring-2 focus:ring-brand-500 outline-none text-sm">
                        <option value="">Select Representative</option>
                        <option value="1">John Doe</option>
                        <option value="2">Jane Smith</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Notes Section -->
        <div>
            <label class="block text-xs font-semibold text-neutral-700 dark:text-neutral-300 uppercase tracking-wider mb-1">Additional Notes</label>
            <textarea name="notes" rows="3" class="w-full px-3.5 py-2.5 rounded-lg border border-neutral-300 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white focus:ring-2 focus:ring-brand-500 outline-none text-sm"></textarea>
        </div>

        <!-- Form Actions -->
        <div class="flex justify-end gap-3 pt-4 border-t border-neutral-100 dark:border-neutral-800">
            <a href="#" class="px-5 py-2.5 rounded-lg border border-neutral-300 dark:border-neutral-700 text-neutral-700 dark:text-neutral-300 text-sm font-medium hover:bg-neutral-50 dark:hover:bg-neutral-800 transition">Cancel</a>
            <button type="submit" class="px-5 py-2.5 bg-brand-600 hover:bg-brand-700 text-white font-medium text-sm rounded-lg shadow-sm transition">Save Lead</button>
        </div>
    </form>
</div>
@endsection