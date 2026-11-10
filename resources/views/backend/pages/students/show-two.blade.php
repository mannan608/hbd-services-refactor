@extends('backend.layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50/50 p-4 sm:p-6 lg:p-8 font-sans antialiased text-slate-800">
    <div class="mx-auto max-w-7xl space-y-6">

        {{-- Top Navigation / Header Bar --}}
        <header class="flex flex-col gap-4 rounded-2xl border border-slate-200 bg-white p-4 sm:p-6 shadow-xs sm:flex-row sm:items-center sm:justify-between">
            <div class="flex items-center gap-4">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=256&q=80" alt="Aisha Rahman" class="h-16 w-16 rounded-full object-cover ring-2 ring-blue-500/20" />
                    <span class="absolute bottom-0 right-0 rounded-full bg-emerald-500 p-1 text-white ring-2 ring-white">
                        <iconify-icon icon="lucide:check" class="block text-xs font-bold"></iconify-icon>
                    </span>
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <h1 class="text-xl font-bold tracking-tight text-slate-900">Aisha Rahman</h1>
                        <span class="inline-flex items-center gap-1 rounded-full bg-emerald-50 px-2.5 py-0.5 text-xs font-semibold text-emerald-700 ring-1 ring-inset ring-emerald-600/20">
                            <iconify-icon icon="lucide:shield-check" class="text-sm"></iconify-icon>
                            Profile Verified
                        </span>
                    </div>
                    <p class="text-xs text-slate-500 mt-1">Application ID: <span class="font-mono text-slate-700">APP-2026-8941</span></p>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-6 border-t border-slate-100 pt-4 sm:border-0 sm:pt-0">
                {{-- Status & Progress --}}
                <div class="flex items-center gap-4">
                    <div>
                        <p class="text-xs font-medium text-slate-500">Application Status</p>
                        <span class="mt-0.5 inline-flex items-center gap-1.5 text-xs font-bold text-blue-700 bg-blue-50 px-2.5 py-1 rounded-md border border-blue-200">
                            <span class="h-2 w-2 rounded-full bg-blue-600 animate-pulse"></span>
                            Ready for Visa Submission
                        </span>
                    </div>

                    <div class="flex items-center gap-2 border-l border-slate-200 pl-4">
                        <div class="relative flex h-11 w-11 items-center justify-center rounded-full bg-blue-50 text-blue-600">
                            <span class="text-xs font-extrabold">92%</span>
                        </div>
                        <div class="hidden md:block">
                            <p class="text-xs font-bold text-slate-900">Completion</p>
                            <p class="text-xs text-slate-500">Almost complete</p>
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex items-center gap-2">
                    <button type="button" class="inline-flex items-center gap-1.5 rounded-xl border border-slate-200 bg-white px-3.5 py-2 text-xs font-semibold text-slate-700 shadow-xs hover:bg-slate-50 transition">
                        <iconify-icon icon="lucide:save" class="text-base text-slate-400"></iconify-icon>
                        Save Draft
                    </button>
                    <button type="button" class="inline-flex items-center gap-1.5 rounded-xl border border-slate-200 bg-white px-3.5 py-2 text-xs font-semibold text-slate-700 shadow-xs hover:bg-slate-50 transition">
                        <iconify-icon icon="lucide:eye" class="text-base text-slate-400"></iconify-icon>
                        Preview
                    </button>
                    <button type="button" class="inline-flex items-center gap-1.5 rounded-xl bg-blue-600 px-4 py-2 text-xs font-semibold text-white shadow-xs hover:bg-blue-700 transition">
                        <iconify-icon icon="lucide:send" class="text-base"></iconify-icon>
                        Submit for Visa
                    </button>
                </div>
            </div>
        </header>

        {{-- Main Dashboard Layout Grid --}}
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">

            {{-- Main Content Column (8 cols) --}}
            <div class="space-y-6 lg:col-span-8">

                {{-- 1. Personal Information Card --}}
                <section class="rounded-2xl border border-slate-200 bg-white p-5 sm:p-6 shadow-xs space-y-6">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                        <div class="flex items-center gap-2.5">
                            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                                <iconify-icon icon="lucide:user" class="text-lg"></iconify-icon>
                            </div>
                            <h2 class="text-base font-bold text-slate-900">Personal Information</h2>
                        </div>
                        <span class="inline-flex items-center gap-1 rounded-md bg-emerald-50 px-2 py-1 text-xs font-medium text-emerald-700 border border-emerald-200">
                            <iconify-icon icon="lucide:check-circle" class="text-xs"></iconify-icon> Complete
                        </span>
                    </div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                        <div class="sm:col-span-2 md:col-span-3">
                            <label class="block text-xs font-medium text-slate-500">Full Legal Name (as per Passport)</label>
                            <div class="mt-1 font-semibold text-slate-900 text-sm bg-slate-50/50 p-2.5 rounded-xl border border-slate-200">Aisha Mariam Rahman</div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-500">Date of Birth</label>
                            <div class="mt-1 text-sm font-medium text-slate-900 bg-slate-50/50 p-2.5 rounded-xl border border-slate-200">14 August 2002</div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-500">Gender</label>
                            <div class="mt-1 text-sm font-medium text-slate-900 bg-slate-50/50 p-2.5 rounded-xl border border-slate-200">Female</div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-500">Nationality</label>
                            <div class="mt-1 text-sm font-medium text-slate-900 bg-slate-50/50 p-2.5 rounded-xl border border-slate-200">Bangladeshi</div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-500">Passport Number</label>
                            <div class="mt-1 text-sm font-mono font-semibold text-slate-900 bg-slate-50/50 p-2.5 rounded-xl border border-slate-200">A08923411</div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-500">Issue Date</label>
                            <div class="mt-1 text-sm font-medium text-slate-900 bg-slate-50/50 p-2.5 rounded-xl border border-slate-200">10 Jan 2022</div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-500">Expiry Date</label>
                            <div class="mt-1 text-sm font-medium text-slate-900 bg-slate-50/50 p-2.5 rounded-xl border border-slate-200">09 Jan 2032</div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-500">Place of Birth</label>
                            <div class="mt-1 text-sm font-medium text-slate-900 bg-slate-50/50 p-2.5 rounded-xl border border-slate-200">Dhaka, Bangladesh</div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-500">Marital Status</label>
                            <div class="mt-1 text-sm font-medium text-slate-900 bg-slate-50/50 p-2.5 rounded-xl border border-slate-200">Single</div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-500">Phone Number</label>
                            <div class="mt-1 text-sm font-medium text-slate-900 bg-slate-50/50 p-2.5 rounded-xl border border-slate-200">+880 1712-345678</div>
                        </div>

                        <div class="sm:col-span-2 md:col-span-3">
                            <label class="block text-xs font-medium text-slate-500">Email Address</label>
                            <div class="mt-1 text-sm font-medium text-slate-900 bg-slate-50/50 p-2.5 rounded-xl border border-slate-200">aisha.rahman@example.com</div>
                        </div>

                        <div class="sm:col-span-2 md:col-span-3">
                            <label class="block text-xs font-medium text-slate-500">Current Residential Address</label>
                            <div class="mt-1 text-sm font-medium text-slate-900 bg-slate-50/50 p-2.5 rounded-xl border border-slate-200">House 42, Road 11, Banani, Dhaka-1213, Bangladesh</div>
                        </div>

                        <div class="sm:col-span-2 md:col-span-3">
                            <label class="block text-xs font-medium text-slate-500">Permanent Address</label>
                            <div class="mt-1 text-sm font-medium text-slate-900 bg-slate-50/50 p-2.5 rounded-xl border border-slate-200">Same as current address</div>
                        </div>
                    </div>
                </section>

                {{-- 2. Academic Background Card --}}
                <section class="rounded-2xl border border-slate-200 bg-white p-5 sm:p-6 shadow-xs space-y-6">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                        <div class="flex items-center gap-2.5">
                            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                                <iconify-icon icon="lucide:graduation-cap" class="text-lg"></iconify-icon>
                            </div>
                            <h2 class="text-base font-bold text-slate-900">Academic Background</h2>
                        </div>
                        <span class="inline-flex items-center gap-1 rounded-md bg-emerald-50 px-2 py-1 text-xs font-medium text-emerald-700 border border-emerald-200">
                            <iconify-icon icon="lucide:check-circle" class="text-xs"></iconify-icon> Verified
                        </span>
                    </div>

                    {{-- Highest Qualification Summary Banner --}}
                    <div class="rounded-xl border border-blue-100 bg-blue-50/40 p-4">
                        <p class="text-xs font-bold uppercase tracking-wider text-blue-700">Highest Qualification</p>
                        <div class="mt-2 flex flex-col justify-between gap-2 sm:flex-row sm:items-center">
                            <div>
                                <p class="text-sm font-bold text-slate-900">Bachelor of Science in Computer Science & Engineering</p>
                                <p class="text-xs text-slate-600">North South University, Bangladesh • Graduated May 2024</p>
                            </div>
                            <div class="rounded-lg bg-white px-3 py-1.5 border border-slate-200 text-center">
                                <span class="text-xs text-slate-500 block">GPA / Result</span>
                                <span class="text-sm font-bold text-blue-600">3.82 / 4.00</span>
                            </div>
                        </div>
                    </div>

                    {{-- Education History Table --}}
                    <div>
                        <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Education History</h3>
                        <div class="overflow-x-auto rounded-xl border border-slate-200">
                            <table class="w-full text-left text-xs">
                                <thead class="bg-slate-50 text-slate-600 border-b border-slate-200">
                                    <tr>
                                        <th class="p-3 font-semibold">Degree / Level</th>
                                        <th class="p-3 font-semibold">Institution</th>
                                        <th class="p-3 font-semibold">Country</th>
                                        <th class="p-3 font-semibold">Year Completed</th>
                                        <th class="p-3 font-semibold">Grade / Score</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-slate-800">
                                    <tr>
                                        <td class="p-3 font-medium">B.Sc. CSE</td>
                                        <td class="p-3">North South University</td>
                                        <td class="p-3">Bangladesh</td>
                                        <td class="p-3">2024</td>
                                        <td class="p-3 font-semibold text-slate-900">3.82 GPA</td>
                                    </tr>
                                    <tr>
                                        <td class="p-3 font-medium">Higher Secondary (HSC)</td>
                                        <td class="p-3">Viqarunnisa Noon College</td>
                                        <td class="p-3">Bangladesh</td>
                                        <td class="p-3">2020</td>
                                        <td class="p-3 font-semibold text-slate-900">5.00 GPA</td>
                                    </tr>
                                    <tr>
                                        <td class="p-3 font-medium">Secondary School (SSC)</td>
                                        <td class="p-3">Viqarunnisa Noon School</td>
                                        <td class="p-3">Bangladesh</td>
                                        <td class="p-3">2018</td>
                                        <td class="p-3 font-semibold text-slate-900">5.00 GPA</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Standardized Test Scores --}}
                    <div>
                        <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Standardized Test Scores</h3>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div class="rounded-xl border border-slate-200 p-4 space-y-2">
                                <div class="flex items-center justify-between">
                                    <span class="text-xs font-bold text-slate-900">IELTS Academic</span>
                                    <span class="text-xs text-slate-500">Test Date: 12 Aug 2025</span>
                                </div>
                                <div class="flex items-baseline gap-2">
                                    <span class="text-2xl font-extrabold text-blue-600">7.5</span>
                                    <span class="text-xs text-slate-500">Overall Band (C1)</span>
                                </div>
                                <div class="grid grid-cols-4 gap-1 pt-2 text-center text-xs border-t border-slate-100">
                                    <div class="bg-slate-50 p-1 rounded">L: <span class="font-bold">8.0</span></div>
                                    <div class="bg-slate-50 p-1 rounded">R: <span class="font-bold">7.5</span></div>
                                    <div class="bg-slate-50 p-1 rounded">W: <span class="font-bold">7.0</span></div>
                                    <div class="bg-slate-50 p-1 rounded">S: <span class="font-bold">7.5</span></div>
                                </div>
                            </div>

                            <div class="rounded-xl border border-slate-200 p-4 space-y-2">
                                <div class="flex items-center justify-between">
                                    <span class="text-xs font-bold text-slate-900">GRE General</span>
                                    <span class="text-xs text-slate-500">Test Date: 05 Nov 2025</span>
                                </div>
                                <div class="flex items-baseline gap-2">
                                    <span class="text-2xl font-extrabold text-blue-600">322</span>
                                    <span class="text-xs text-slate-500">Combined Score</span>
                                </div>
                                <div class="grid grid-cols-3 gap-1 pt-2 text-center text-xs border-t border-slate-100">
                                    <div class="bg-slate-50 p-1 rounded">Quant: <span class="font-bold">165</span></div>
                                    <div class="bg-slate-50 p-1 rounded">Verbal: <span class="font-bold">157</span></div>
                                    <div class="bg-slate-50 p-1 rounded">AWA: <span class="font-bold">4.5</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- 3. Study Plan & University Details Card --}}
                <section class="rounded-2xl border border-slate-200 bg-white p-5 sm:p-6 shadow-xs space-y-6">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                        <div class="flex items-center gap-2.5">
                            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                                <iconify-icon icon="lucide:building-2" class="text-lg"></iconify-icon>
                            </div>
                            <h2 class="text-base font-bold text-slate-900">Study Plan & University Details</h2>
                        </div>
                        <span class="inline-flex items-center gap-1 rounded-md bg-emerald-50 px-2 py-1 text-xs font-medium text-emerald-700 border border-emerald-200">
                            <iconify-icon icon="lucide:check-circle" class="text-xs"></iconify-icon> Unconditional Offer
                        </span>
                    </div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label class="block text-xs font-medium text-slate-500">Intended Program</label>
                            <div class="mt-1 text-sm font-semibold text-slate-900 bg-slate-50/50 p-2.5 rounded-xl border border-slate-200">MSc in Human-Computer Interaction</div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-500">Degree Level</label>
                            <div class="mt-1 text-sm font-medium text-slate-900 bg-slate-50/50 p-2.5 rounded-xl border border-slate-200">Master's Degree</div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-500">University Name</label>
                            <div class="mt-1 text-sm font-medium text-slate-900 bg-slate-50/50 p-2.5 rounded-xl border border-slate-200">University of Manchester</div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-500">Destination Country</label>
                            <div class="mt-1 text-sm font-medium text-slate-900 bg-slate-50/50 p-2.5 rounded-xl border border-slate-200">United Kingdom</div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-500">Course Duration & Start Date</label>
                            <div class="mt-1 text-sm font-medium text-slate-900 bg-slate-50/50 p-2.5 rounded-xl border border-slate-200">1 Year (Sept 2026 – Sept 2027)</div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-500">Tuition Fee & Scholarship</label>
                            <div class="mt-1 text-sm font-medium text-slate-900 bg-slate-50/50 p-2.5 rounded-xl border border-slate-200">£28,500/yr (£5,000 Merit Award)</div>
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block text-xs font-medium text-slate-500">Study Plan Summary</label>
                            <div class="mt-1 text-xs leading-relaxed text-slate-600 bg-slate-50/50 p-3 rounded-xl border border-slate-200">
                                Seeking advanced specialization in accessible UX design and software ergonomics. Intend to complete the 1-year taught master's program and utilize university industry partnerships for field research before returning home to contribute to the digital technology sector.
                            </div>
                        </div>
                    </div>
                </section>

                {{-- 4. Financial Information Card --}}
                <section class="rounded-2xl border border-slate-200 bg-white p-5 sm:p-6 shadow-xs space-y-6">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                        <div class="flex items-center gap-2.5">
                            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                                <iconify-icon icon="lucide:wallet" class="text-lg"></iconify-icon>
                            </div>
                            <h2 class="text-base font-bold text-slate-900">Financial Information</h2>
                        </div>
                        <span class="inline-flex items-center gap-1 rounded-md bg-emerald-50 px-2 py-1 text-xs font-medium text-emerald-700 border border-emerald-200">
                            <iconify-icon icon="lucide:shield-check" class="text-xs"></iconify-icon> Solvency Verified
                        </span>
                    </div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label class="block text-xs font-medium text-slate-500">Primary Source of Funds</label>
                            <div class="mt-1 text-sm font-semibold text-slate-900 bg-slate-50/50 p-2.5 rounded-xl border border-slate-200">Parents Support & Partial Scholarship</div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-500">Proof of Funds Status</label>
                            <div class="mt-1 text-sm font-semibold text-emerald-600 bg-emerald-50/50 p-2.5 rounded-xl border border-emerald-200">Sufficient Funds Verified (£38,500 Equivalent)</div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-500">Sponsor Name & Relationship</label>
                            <div class="mt-1 text-sm font-medium text-slate-900 bg-slate-50/50 p-2.5 rounded-xl border border-slate-200">Tariq Rahman (Father)</div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-500">Sponsor Occupation & Capacity</label>
                            <div class="mt-1 text-sm font-medium text-slate-900 bg-slate-50/50 p-2.5 rounded-xl border border-slate-200">Managing Director, Tech Solutions Inc.</div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-500">Bank Statement Status</label>
                            <div class="mt-1 text-sm font-medium text-slate-900 bg-slate-50/50 p-2.5 rounded-xl border border-slate-200">Uploaded (28-day continuous balance met)</div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-500">Affidavit of Support</label>
                            <div class="mt-1 text-sm font-medium text-slate-900 bg-slate-50/50 p-2.5 rounded-xl border border-slate-200">Notarized & Attached</div>
                        </div>
                    </div>
                </section>

                {{-- 5. Family & Background Information Card --}}
                <section class="rounded-2xl border border-slate-200 bg-white p-5 sm:p-6 shadow-xs space-y-6">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                        <div class="flex items-center gap-2.5">
                            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                                <iconify-icon icon="lucide:users" class="text-lg"></iconify-icon>
                            </div>
                            <h2 class="text-base font-bold text-slate-900">Family & Travel Background</h2>
                        </div>
                        <span class="inline-flex items-center gap-1 rounded-md bg-emerald-50 px-2 py-1 text-xs font-medium text-emerald-700 border border-emerald-200">
                            <iconify-icon icon="lucide:check" class="text-xs"></iconify-icon> Declared
                        </span>
                    </div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label class="block text-xs font-medium text-slate-500">Father's Full Name & Occupation</label>
                            <div class="mt-1 text-sm font-medium text-slate-900 bg-slate-50/50 p-2.5 rounded-xl border border-slate-200">Tariq Rahman • Business Executive</div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-500">Mother's Full Name & Occupation</label>
                            <div class="mt-1 text-sm font-medium text-slate-900 bg-slate-50/50 p-2.5 rounded-xl border border-slate-200">Nusrat Rahman • Professor</div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-500">Siblings Details</label>
                            <div class="mt-1 text-sm font-medium text-slate-900 bg-slate-50/50 p-2.5 rounded-xl border border-slate-200">1 Brother (Student)</div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-500">Previous Visa Refusals</label>
                            <div class="mt-1 text-sm font-semibold text-emerald-700 bg-emerald-50/50 p-2.5 rounded-xl border border-emerald-200">None (Clean Record)</div>
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block text-xs font-medium text-slate-500">Previous International Travel History</label>
                            <div class="mt-1 text-xs text-slate-700 bg-slate-50/50 p-2.5 rounded-xl border border-slate-200">
                                Malaysia (2023 - Tourism), United Arab Emirates (2022 - Conference)
                            </div>
                        </div>
                    </div>
                </section>

                {{-- 6. Additional Sections: Work & Extracurriculars --}}
                <section class="rounded-2xl border border-slate-200 bg-white p-5 sm:p-6 shadow-xs space-y-6">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                        <div class="flex items-center gap-2.5">
                            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                                <iconify-icon icon="lucide:briefcase" class="text-lg"></iconify-icon>
                            </div>
                            <h2 class="text-base font-bold text-slate-900">Experience & Achievements</h2>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Work Experience</h3>
                            <div class="rounded-xl border border-slate-200 p-3.5 space-y-1">
                                <div class="flex justify-between items-start">
                                    <p class="text-sm font-bold text-slate-900">Junior UX Researcher • Tech Craft Labs</p>
                                    <span class="text-xs text-slate-500">Jun 2024 – Present</span>
                                </div>
                                <p class="text-xs text-slate-600">Conducted usability testing with over 40 participants and contributed to accessible UI pattern libraries.</p>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Extracurriculars & Leadership</h3>
                            <div class="rounded-xl border border-slate-200 p-3.5 space-y-1">
                                <div class="flex justify-between items-start">
                                    <p class="text-sm font-bold text-slate-900">President • NSU Computer Club</p>
                                    <span class="text-xs text-slate-500">2023 – 2024</span>
                                </div>
                                <p class="text-xs text-slate-600">Organized national hackathons involving 500+ participants and led tech mentorship clinics.</p>
                            </div>
                        </div>
                    </div>
                </section>

            </div>

            {{-- Sidebar Column (4 cols) --}}
            <div class="space-y-6 lg:col-span-4">

                {{-- 7. Documents Checklist Card --}}
                <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-xs space-y-5 sticky top-6">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                        <div class="flex items-center gap-2">
                            <iconify-icon icon="lucide:file-check" class="text-xl text-blue-600"></iconify-icon>
                            <h2 class="text-base font-bold text-slate-900">Document Checklist</h2>
                        </div>
                        <span class="text-xs font-bold text-slate-500">8 of 8</span>
                    </div>

                    {{-- Individual Document Items --}}
                    <div class="space-y-3.5">
                        
                        {{-- Doc item --}}
                        <div class="space-y-1">
                            <div class="flex items-center justify-between text-xs">
                                <span class="font-medium text-slate-800 flex items-center gap-1.5">
                                    <iconify-icon icon="lucide:file-text" class="text-slate-400"></iconify-icon>
                                    Passport Copy
                                </span>
                                <span class="rounded bg-emerald-50 px-1.5 py-0.5 font-semibold text-emerald-700 text-[10px]">Verified</span>
                            </div>
                            <div class="h-1.5 w-full rounded-full bg-slate-100">
                                <div class="h-1.5 rounded-full bg-emerald-500 w-full"></div>
                            </div>
                        </div>

                        {{-- Doc item --}}
                        <div class="space-y-1">
                            <div class="flex items-center justify-between text-xs">
                                <span class="font-medium text-slate-800 flex items-center gap-1.5">
                                    <iconify-icon icon="lucide:file-text" class="text-slate-400"></iconify-icon>
                                    Academic Transcripts
                                </span>
                                <span class="rounded bg-emerald-50 px-1.5 py-0.5 font-semibold text-emerald-700 text-[10px]">Verified</span>
                            </div>
                            <div class="h-1.5 w-full rounded-full bg-slate-100">
                                <div class="h-1.5 rounded-full bg-emerald-500 w-full"></div>
                            </div>
                        </div>

                        {{-- Doc item --}}
                        <div class="space-y-1">
                            <div class="flex items-center justify-between text-xs">
                                <span class="font-medium text-slate-800 flex items-center gap-1.5">
                                    <iconify-icon icon="lucide:file-text" class="text-slate-400"></iconify-icon>
                                    English Test (IELTS)
                                </span>
                                <span class="rounded bg-emerald-50 px-1.5 py-0.5 font-semibold text-emerald-700 text-[10px]">Verified</span>
                            </div>
                            <div class="h-1.5 w-full rounded-full bg-slate-100">
                                <div class="h-1.5 rounded-full bg-emerald-500 w-full"></div>
                            </div>
                        </div>

                        {{-- Doc item --}}
                        <div class="space-y-1">
                            <div class="flex items-center justify-between text-xs">
                                <span class="font-medium text-slate-800 flex items-center gap-1.5">
                                    <iconify-icon icon="lucide:file-text" class="text-slate-400"></iconify-icon>
                                    University Offer Letter
                                </span>
                                <span class="rounded bg-emerald-50 px-1.5 py-0.5 font-semibold text-emerald-700 text-[10px]">Verified</span>
                            </div>
                            <div class="h-1.5 w-full rounded-full bg-slate-100">
                                <div class="h-1.5 rounded-full bg-emerald-500 w-full"></div>
                            </div>
                        </div>

                        {{-- Doc item --}}
                        <div class="space-y-1">
                            <div class="flex items-center justify-between text-xs">
                                <span class="font-medium text-slate-800 flex items-center gap-1.5">
                                    <iconify-icon icon="lucide:file-text" class="text-slate-400"></iconify-icon>
                                    Bank Statements & Solvency
                                </span>
                                <span class="rounded bg-emerald-50 px-1.5 py-0.5 font-semibold text-emerald-700 text-[10px]">Verified</span>
                            </div>
                            <div class="h-1.5 w-full rounded-full bg-slate-100">
                                <div class="h-1.5 rounded-full bg-emerald-500 w-full"></div>
                            </div>
                        </div>

                        {{-- Doc item --}}
                        <div class="space-y-1">
                            <div class="flex items-center justify-between text-xs">
                                <span class="font-medium text-slate-800 flex items-center gap-1.5">
                                    <iconify-icon icon="lucide:file-text" class="text-slate-400"></iconify-icon>
                                    Statement of Purpose (SOP)
                                </span>
                                <span class="rounded bg-emerald-50 px-1.5 py-0.5 font-semibold text-emerald-700 text-[10px]">Ready</span>
                            </div>
                            <div class="h-1.5 w-full rounded-full bg-slate-100">
                                <div class="h-1.5 rounded-full bg-emerald-500 w-full"></div>
                            </div>
                        </div>

                        {{-- Doc item --}}
                        <div class="space-y-1">
                            <div class="flex items-center justify-between text-xs">
                                <span class="font-medium text-slate-800 flex items-center gap-1.5">
                                    <iconify-icon icon="lucide:file-text" class="text-slate-400"></iconify-icon>
                                    Medical & Police Clearance
                                </span>
                                <span class="rounded bg-amber-50 px-1.5 py-0.5 font-semibold text-amber-700 text-[10px]">In Review</span>
                            </div>
                            <div class="h-1.5 w-full rounded-full bg-slate-100">
                                <div class="h-1.5 rounded-full bg-amber-400 w-4/5"></div>
                            </div>
                        </div>

                        {{-- Doc item --}}
                        <div class="space-y-1">
                            <div class="flex items-center justify-between text-xs">
                                <span class="font-medium text-slate-800 flex items-center gap-1.5">
                                    <iconify-icon icon="lucide:file-text" class="text-slate-400"></iconify-icon>
                                    CV / Professional Resume
                                </span>
                                <span class="rounded bg-emerald-50 px-1.5 py-0.5 font-semibold text-emerald-700 text-[10px]">Uploaded</span>
                            </div>
                            <div class="h-1.5 w-full rounded-full bg-slate-100">
                                <div class="h-1.5 rounded-full bg-emerald-500 w-full"></div>
                            </div>
                        </div>

                    </div>

                    {{-- Declaration & Consent Area --}}
                    <div class="border-t border-slate-100 pt-4 space-y-4">
                        <h3 class="text-xs font-bold text-slate-900 uppercase tracking-wider">Declaration & Signature</h3>
                        
                        <div class="space-y-2">
                            <label class="flex items-start gap-2 text-xs text-slate-600 cursor-pointer">
                                <input type="checkbox" checked class="mt-0.5 h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                                <span>I confirm that all information provided is true, accurate, and complete to the best of my knowledge.</span>
                            </label>
                            
                            <label class="flex items-start gap-2 text-xs text-slate-600 cursor-pointer">
                                <input type="checkbox" checked class="mt-0.5 h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                                <span>I authorize official immigration officers to verify submitted documents.</span>
                            </label>
                        </div>

                        {{-- Digital Signature Box --}}
                        <div class="rounded-xl border border-dashed border-slate-300 bg-slate-50/50 p-3 text-center">
                            <p class="text-[10px] uppercase font-bold text-slate-400 tracking-wider">Digital Signature</p>
                            <p class="mt-1 font-serif italic text-lg text-slate-800 font-bold">Aisha Rahman</p>
                            <p class="text-[10px] text-slate-400 font-mono">Signed via Verified Auth • Sept 01, 2026</p>
                        </div>

                        <button type="button" class="w-full rounded-xl bg-blue-600 py-2.5 text-xs font-bold text-white shadow-xs hover:bg-blue-700 transition flex items-center justify-center gap-1.5">
                            <iconify-icon icon="lucide:check-circle" class="text-base"></iconify-icon>
                            Final Submission Ready
                        </button>
                    </div>
                </section>

                 {{-- Declaration & Signature --}}
                    <section class="rounded-2xl border border-brand-100 bg-white p-5 shadow-sm">
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-brand-600">Declaration</p>
                        <h2 class="mt-1 text-lg font-bold text-brand-950">Consent & Signature</h2>

                        <div class="mt-5 space-y-3 text-sm text-slate-600">
                            <label class="flex items-start gap-3 cursor-pointer">
                                <input type="checkbox" checked
                                    class="mt-1 rounded border-brand-300 text-brand-600 focus:ring-brand-500">
                                <span>I confirm that all information provided is true and complete to the best of my
                                    knowledge.</span>
                            </label>
                            <label class="flex items-start gap-3 cursor-pointer">
                                <input type="checkbox" checked
                                    class="mt-1 rounded border-brand-300 text-brand-600 focus:ring-brand-500">
                                <span>I consent to the processing of my personal data for the purpose of student visa
                                    application and university admission.</span>
                            </label>
                        </div>

                        <div
                            class="mt-6 rounded-xl border-2 border-dashed border-brand-200 bg-brand-25/50 p-6 text-center">
                            <iconify-icon icon="lucide:pen-line" class="text-3xl text-brand-400 mx-auto"></iconify-icon>
                            <p class="mt-2 text-sm font-medium text-brand-700">Digital Signature</p>
                            <p class="text-xs text-slate-500 mt-1">Aisha Rahman · 01 Sep 2026</p>
                        </div>
                    </section>

                    {{-- Final CTA --}}
                    <section class="relative overflow-hidden rounded-2xl bg-brand-700 p-5 text-white shadow-sm">
                        <div class="absolute -right-8 -top-8 h-28 w-28 rounded-full bg-white/10"></div>
                        <div class="relative">
                            <h2 class="text-lg font-bold">Ready to shortlist</h2>
                            <p class="mt-2 text-sm text-brand-100 leading-relaxed">
                                92% ready. Your profile is ready to match with programmes and scholarships.
                            </p>
                            <button
                                class="mt-4 w-full rounded-lg bg-white px-4 py-2.5 text-sm font-bold text-brand-700 shadow-sm hover:bg-brand-50 transition">
                                Explore matching courses
                            </button>
                        </div>
                    </section>

            </div>

        </div>
    </div>
</div>
@endsection