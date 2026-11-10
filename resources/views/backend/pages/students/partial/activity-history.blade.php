<div class="p-6 bg-white rounded-xl shadow-lg border border-gray-100" x-data="{
    activeTab: 'all',

    isVisible(type) {
        if (this.activeTab === 'all') {
            return true;
        }

        if (this.activeTab === 'calls') {
            return type === 'call';
        }

        if (this.activeTab === 'transfers') {
            return type === 'transfer';
        }

        if (this.activeTab === 'updates') {
            return type === 'update';
        }

        return true;
    }
}">

    {{-- Header & Quick Stats --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between border-b border-gray-200 pb-5 mb-6 gap-4">

        <div>
            <h2 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>

                Lead Activity & Audit History Log
            </h2>

            <p class="text-xs text-gray-500 mt-1">
                Showing total history of changes, call logs, assignments, and milestones
            </p>
        </div>


        {{-- Activity Filter Tabs --}}
        <div class="flex flex-wrap gap-1 bg-gray-100 p-1 rounded-lg text-xs font-medium text-gray-600">

            {{-- ALL --}}
            <button type="button" @click="activeTab = 'all'"
                :class="activeTab === 'all'
                    ?
                    'bg-white text-indigo-600 shadow-sm font-semibold' :
                    'text-gray-600 hover:text-gray-900'"
                class="px-3 py-1.5 rounded-md transition-all duration-200">
                All
            </button>


            {{-- CALLS --}}
            <button type="button" @click="activeTab = 'calls'"
                :class="activeTab === 'calls'
                    ?
                    'bg-white text-indigo-600 shadow-sm font-semibold' :
                    'text-gray-600 hover:text-gray-900'"
                class="px-3 py-1.5 rounded-md transition-all duration-200">
                Calls
            </button>


            {{-- TRANSFERS --}}
            <button type="button" @click="activeTab = 'transfers'"
                :class="activeTab === 'transfers'
                    ?
                    'bg-white text-indigo-600 shadow-sm font-semibold' :
                    'text-gray-600 hover:text-gray-900'"
                class="px-3 py-1.5 rounded-md transition-all duration-200">
                Transfers
            </button>


            {{-- UPDATES --}}
            <button type="button" @click="activeTab = 'updates'"
                :class="activeTab === 'updates'
                    ?
                    'bg-white text-indigo-600 shadow-sm font-semibold' :
                    'text-gray-600 hover:text-gray-900'"
                class="px-3 py-1.5 rounded-md transition-all duration-200">
                Updates
            </button>

        </div>

    </div>


    {{-- Activity Timeline --}}
    <div class="relative border-l-2 border-indigo-100 ml-4 md:ml-6 space-y-6 pb-4">


        {{--  1. CALL CONNECTED --}}
        <div x-show="isVisible('call')" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2" class="mb-6 ml-6 relative group">

            <span
                class="absolute -left-9.5 top-1 flex items-center justify-center w-7 h-7 rounded-full ring-4 ring-white bg-green-500 text-white shadow">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                    </path>
                </svg>
            </span>

            <div class="bg-gray-50 p-4 rounded-xl border border-gray-100 hover:border-green-200 transition-all">

                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-green-100 text-green-800">
                        Call Connected
                    </span>

                    <time class="text-xs text-gray-400 font-mono">
                        23 Sep 2026, 03:45 PM
                    </time>
                </div>

                <h4 class="text-sm font-semibold text-gray-900">
                    Phone Call Completed
                </h4>

                <p class="text-xs text-gray-600 mt-1 bg-white p-2.5 rounded-lg border border-gray-100">
                    "Talked with student. Interested in UK September 2027 intake.
                    Requested course options for CSE."
                </p>

                <div
                    class="mt-2 text-xs text-gray-500 flex justify-between items-center border-t border-gray-200/60 pt-2">
                    <span>
                        Logged by:
                        <strong class="text-gray-700">
                            Tanvir Ahmed (Counselor)
                        </strong>
                    </span>
                </div>

            </div>
        </div>


        {{--2. NEXT FOLLOW-UP --}}
        <div x-show="isVisible('call')" x-transition class="mb-6 ml-6 relative group">

            <span
                class="absolute -left-9.5 top-1 flex items-center justify-center w-7 h-7 rounded-full ring-4 ring-white bg-indigo-500 text-white shadow">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
            </span>

            <div class="bg-gray-50 p-4 rounded-xl border border-gray-100 hover:border-indigo-200 transition-all">

                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-indigo-100 text-indigo-800">
                        Next Follow-Up
                    </span>

                    <time class="text-xs text-gray-400 font-mono">
                        23 Sep 2026, 03:48 PM
                    </time>
                </div>

                <div
                    class="bg-indigo-50/70 text-indigo-900 p-2.5 rounded-lg border border-indigo-100 flex items-center gap-2 text-xs">
                    <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>

                    <span>
                        <strong>Scheduled Date & Time:</strong>
                        26 Sep 2026, 11:00 AM
                    </span>
                </div>

                <div class="mt-2 text-xs text-gray-500 pt-1">
                    Assigned Agent:
                    <strong class="text-gray-700">
                        Tanvir Ahmed
                    </strong>
                </div>

            </div>
        </div>


        {{--  3. CALL NOT CONNECTED --}}
        <div x-show="isVisible('call')" x-transition class="mb-6 ml-6 relative group">

            <span
                class="absolute -left-9.5 top-1 flex items-center justify-center w-7 h-7 rounded-full ring-4 ring-white bg-red-500 text-white shadow">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636"></path>
                </svg>
            </span>

            <div class="bg-gray-50 p-4 rounded-xl border border-gray-100 hover:border-red-200 transition-all">

                <div class="flex items-center justify-between mb-2">

                    <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-red-100 text-red-800">
                        Call Not Connected
                    </span>

                    <time class="text-xs text-gray-400 font-mono">
                        22 Sep 2026, 05:10 PM
                    </time>

                </div>

                <p class="text-xs text-gray-600 bg-white p-2.5 rounded-lg border border-gray-100">
                    "Phone rang but no answer. Sent follow-up SMS and WhatsApp message."
                </p>

                <div class="mt-2 text-xs text-gray-500 border-t border-gray-200/60 pt-2">
                    Logged by:
                    <strong class="text-gray-700">
                        Tanvir Ahmed
                    </strong>
                </div>

            </div>
        </div>


        {{-- 4. LEAD TRANSFER --}}
        <div x-show="isVisible('transfer')" x-transition class="mb-6 ml-6 relative group">

            <span
                class="absolute -left-9.5 top-1 flex items-center justify-center w-7 h-7 rounded-full ring-4 ring-white bg-purple-600 text-white shadow">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                </svg>
            </span>

            <div class="bg-gray-50 p-4 rounded-xl border border-gray-100 hover:border-purple-200 transition-all">

                <div class="flex items-center justify-between mb-2">

                    <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-purple-100 text-purple-800">
                        Lead Assigned / Transferred
                    </span>

                    <time class="text-xs text-gray-400 font-mono">
                        21 Sep 2026, 10:15 AM
                    </time>

                </div>

                <div class="bg-purple-50 text-purple-900 p-2.5 rounded-lg text-xs flex items-center gap-2">

                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>

                    <span>
                        Owner
                        <strong class="text-purple-950">
                            Manager (Admin)
                        </strong>

                        transferred lead from
                        <span class="line-through text-gray-500">
                            Unassigned
                        </span>

                        to
                        <strong class="text-purple-950">
                            Tanvir Ahmed
                        </strong>
                    </span>

                </div>

            </div>
        </div>


        {{--  5. PROFILE UPDATE --}}
        <div x-show="isVisible('update')" x-transition class="mb-6 ml-6 relative group">

            <span
                class="absolute -left-9.5 top-1 flex items-center justify-center w-7 h-7 rounded-full ring-4 ring-white bg-amber-500 text-white shadow">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
            </span>

            <div class="bg-gray-50 p-4 rounded-xl border border-gray-100 hover:border-amber-200 transition-all">

                <div class="flex items-center justify-between mb-2">

                    <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-amber-100 text-amber-800">
                        Profile Updated
                    </span>

                    <time class="text-xs text-gray-400 font-mono">
                        20 Sep 2026, 02:20 PM
                    </time>

                </div>

                <div class="space-y-1.5 text-xs">

                    <div class="bg-amber-50/80 p-2 rounded border border-amber-100 text-amber-900">
                        Updated <strong>PHONE NUMBER</strong>:
                        <span class="line-through text-red-500">
                            01700000000
                        </span>
                        &rarr;
                        <span class="font-semibold text-green-600">
                            01812345678
                        </span>
                    </div>

                    <div class="bg-amber-50/80 p-2 rounded border border-amber-100 text-amber-900">
                        Updated <strong>EMAIL</strong>:
                        <span class="line-through text-red-500">
                            N/A
                        </span>
                        &rarr;
                        <span class="font-semibold text-green-600">
                            student@example.com
                        </span>
                    </div>

                </div>

                <div class="mt-2 text-xs text-gray-500 border-t border-gray-200/60 pt-2">
                    Updated by:
                    <strong class="text-gray-700">
                        System Admin
                    </strong>
                </div>

            </div>
        </div>


        {{--  6. IELTS SCORE --}}
        <div x-show="isVisible('update')" x-transition class="mb-6 ml-6 relative group">

            <span
                class="absolute -left-9.5 top-1 flex items-center justify-center w-7 h-7 rounded-full ring-4 ring-white bg-blue-600 text-white shadow">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
            </span>

            <div class="bg-gray-50 p-4 rounded-xl border border-gray-100 hover:border-blue-200 transition-all">

                <div class="flex items-center justify-between mb-2">

                    <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-blue-100 text-blue-800">
                        IELTS Score Recorded
                    </span>

                    <time class="text-xs text-gray-400 font-mono">
                        19 Sep 2026, 11:30 AM
                    </time>

                </div>

                <div
                    class="grid grid-cols-2 sm:grid-cols-5 gap-2 text-xs text-center bg-blue-50 p-3 rounded-lg border border-blue-100">

                    <div class="bg-white p-1.5 rounded shadow-sm">
                        <span class="block text-gray-400 text-[10px]">
                            OVERALL
                        </span>
                        <strong class="text-blue-700 text-sm">
                            6.5
                        </strong>
                    </div>

                    <div class="bg-white p-1.5 rounded shadow-sm">
                        <span class="block text-gray-400 text-[10px]">
                            LISTENING
                        </span>
                        <strong class="text-gray-700">
                            7.0
                        </strong>
                    </div>

                    <div class="bg-white p-1.5 rounded shadow-sm">
                        <span class="block text-gray-400 text-[10px]">
                            READING
                        </span>
                        <strong class="text-gray-700">
                            6.0
                        </strong>
                    </div>

                    <div class="bg-white p-1.5 rounded shadow-sm">
                        <span class="block text-gray-400 text-[10px]">
                            WRITING
                        </span>
                        <strong class="text-gray-700">
                            6.0
                        </strong>
                    </div>

                    <div class="bg-white p-1.5 rounded shadow-sm">
                        <span class="block text-gray-400 text-[10px]">
                            SPEAKING
                        </span>
                        <strong class="text-gray-700">
                            6.5
                        </strong>
                    </div>

                </div>

            </div>
        </div>


        {{-- 7. OFFICE VISIT --}}
        <div x-show="isVisible('update')" x-transition class="mb-6 ml-6 relative group">

            <span
                class="absolute -left-9.5 top-1 flex items-center justify-center w-7 h-7 rounded-full ring-4 ring-white bg-teal-600 text-white shadow">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                    </path>
                </svg>
            </span>

            <div class="bg-gray-50 p-4 rounded-xl border border-gray-100 hover:border-teal-200 transition-all">

                <div class="flex items-center justify-between mb-2">

                    <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-teal-100 text-teal-800">
                        Office Visit
                    </span>

                    <time class="text-xs text-gray-400 font-mono">
                        18 Sep 2026, 04:00 PM
                    </time>

                </div>

                <p class="text-xs text-gray-600 bg-white p-2.5 rounded-lg border border-gray-100">
                    "Visited Dhaka head office along with guardian.
                    Reviewed university entry requirements."
                </p>

            </div>
        </div>


        {{--  8. FILE OPENED --}}
        <div x-show="isVisible('update')" x-transition class="mb-2 ml-6 relative group">

            <span
                class="absolute -left-9.5 top-1 flex items-center justify-center w-7 h-7 rounded-full ring-4 ring-white bg-emerald-600 text-white shadow">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z">
                    </path>
                </svg>
            </span>

            <div class="bg-gray-50 p-4 rounded-xl border border-gray-100 hover:border-emerald-200 transition-all">

                <div class="flex items-center justify-between mb-2">

                    <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-800">
                        File Opened
                    </span>

                    <time class="text-xs text-gray-400 font-mono">
                        18 Sep 2026, 04:45 PM
                    </time>

                </div>

                <div class="bg-emerald-50 text-emerald-900 p-2.5 rounded-lg text-xs flex justify-between items-center">
                    <span>
                        <strong>Application File Created:</strong>
                        #UK-2026-8841
                    </span>

                    <span class="bg-emerald-200 text-emerald-900 px-2 py-0.5 rounded text-[10px] font-bold">
                        STATUS: ACTIVE
                    </span>
                </div>

            </div>
        </div>

    </div>

</div>