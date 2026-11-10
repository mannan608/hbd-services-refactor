
@extends('frontend.layouts.app')

@section('content')
<div x-data="{
    // Selections
    visaSubclass: null,
    age: null,
    english: null,
    workExperience: null,
    education: null,
    partnerSkill: null,

    // Point maps
    pointsMap: {
        visaSubclass: { subclass189: 0, subclass190: 5, subclass491: 15 },
        age: { age18: 25, age25: 30, age33: 25, age40: 15, age45: 0 },
        english: { competent: 0, proficient: 10, superior: 20 },
        workExperience: { lessThan3: 0, threeTo5: 5, fiveTo7: 10, eightOrMore: 15 },
        education: { noQualification: 0, diploma: 10, bachelor: 15, doctorate: 20 },
        partnerSkill: { yes: 10, noWithEnglish: 5, noWithoutEnglish: 0, single: 10 }
    },

    // Category Getters
    get getSubclassPoints() { return this.visaSubclass ? this.pointsMap.visaSubclass[this.visaSubclass] : 0; },
    get getAgePoints() { return this.age ? this.pointsMap.age[this.age] : 0; },
    get getEnglishPoints() { return this.english ? this.pointsMap.english[this.english] : 0; },
    get getWorkPoints() { return this.workExperience ? this.pointsMap.workExperience[this.workExperience] : 0; },
    get getEducationPoints() { return this.education ? this.pointsMap.education[this.education] : 0; },
    get getPartnerPoints() { return this.partnerSkill ? this.pointsMap.partnerSkill[this.partnerSkill] : 0; },

    // Total Score
    get totalScore() {
        return this.getSubclassPoints + this.getAgePoints + this.getEnglishPoints + 
               this.getWorkPoints + this.getEducationPoints + this.getPartnerPoints;
    },

    // Eligibility Logic (Typical threshold is 65 points)
    get isEligible() {
        return this.totalScore >= 65;
    }
}" class="min-h-screen bg-neutral-50/50 dark:bg-neutral-950 py-8 px-4 sm:px-6 lg:px-8 font-sans text-neutral-800 dark:text-neutral-100">

    <div class="max-w-7xl mx-auto space-y-8">
        
        <!-- Header -->
        <header class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 pb-6 border-b border-neutral-200 dark:border-neutral-800">
            <div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-neutral-900 dark:text-white tracking-tight">
                    Visa Points Calculator
                </h1>
                <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                    Calculate your eligibility points for Australian General Skilled Migration (Subclass 189, 190, and 491).
                </p>
            </div>
            <div>
                <a href="/Home/VisaServices" 
                   class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-xs tracking-wide shadow-sm transition active:scale-95">
                    Book a Free Consultation
                </a>
            </div>
        </header>

        <!-- Main Body Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Filter Options (Left Column) -->
            <div class="lg:col-span-8 space-y-8">
                
                <!-- 1. Visa Subclass -->
                <section class="bg-white dark:bg-neutral-900 rounded-2xl border border-neutral-200/80 dark:border-neutral-800 p-5 sm:p-6 shadow-sm">
                    <h2 class="text-base font-bold text-neutral-900 dark:text-white mb-4 flex items-center gap-2">
                        <span class="flex items-center justify-center w-6 h-6 rounded-full bg-emerald-100 dark:bg-emerald-950/80 text-emerald-700 dark:text-emerald-400 text-xs font-bold">1</span>
                        Visa Subclass
                    </h2>
                    <div class="grid grid-cols-1 gap-3">
                        
                        <label :class="visaSubclass === 'subclass189' ? 'border-emerald-500 ring-2 ring-emerald-500/20 bg-emerald-50/30 dark:bg-emerald-950/20' : 'border-neutral-200 dark:border-neutral-800 bg-white dark:bg-neutral-900 hover:border-neutral-300 dark:hover:border-neutral-700'"
                               class="relative flex items-center justify-between p-4 rounded-xl border cursor-pointer transition-all">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="visa-subclass" value="subclass189" x-model="visaSubclass" class="h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-neutral-300 dark:border-neutral-700" />
                                <span class="text-xs sm:text-sm font-medium text-neutral-800 dark:text-neutral-200">Skilled Independent 189 visa (Permanent)</span>
                            </div>
                            <span class="px-2.5 py-1 rounded-md bg-neutral-100 dark:bg-neutral-800 text-neutral-600 dark:text-neutral-300 text-xs font-semibold">0 pts</span>
                        </label>

                        <label :class="visaSubclass === 'subclass190' ? 'border-emerald-500 ring-2 ring-emerald-500/20 bg-emerald-50/30 dark:bg-emerald-950/20' : 'border-neutral-200 dark:border-neutral-800 bg-white dark:bg-neutral-900 hover:border-neutral-300 dark:hover:border-neutral-700'"
                               class="relative flex items-center justify-between p-4 rounded-xl border cursor-pointer transition-all">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="visa-subclass" value="subclass190" x-model="visaSubclass" class="h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-neutral-300 dark:border-neutral-700" />
                                <span class="text-xs sm:text-sm font-medium text-neutral-800 dark:text-neutral-200">Skilled Nominated 190 visa (Permanent)</span>
                            </div>
                            <span class="px-2.5 py-1 rounded-md bg-emerald-100 dark:bg-emerald-950/80 text-emerald-700 dark:text-emerald-400 text-xs font-bold">+5 pts</span>
                        </label>

                        <label :class="visaSubclass === 'subclass491' ? 'border-emerald-500 ring-2 ring-emerald-500/20 bg-emerald-50/30 dark:bg-emerald-950/20' : 'border-neutral-200 dark:border-neutral-800 bg-white dark:bg-neutral-900 hover:border-neutral-300 dark:hover:border-neutral-700'"
                               class="relative flex items-center justify-between p-4 rounded-xl border cursor-pointer transition-all">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="visa-subclass" value="subclass491" x-model="visaSubclass" class="h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-neutral-300 dark:border-neutral-700" />
                                <span class="text-xs sm:text-sm font-medium text-neutral-800 dark:text-neutral-200">Skilled Work Regional 491 visa (Provisional)</span>
                            </div>
                            <span class="px-2.5 py-1 rounded-md bg-emerald-100 dark:bg-emerald-950/80 text-emerald-700 dark:text-emerald-400 text-xs font-bold">+15 pts</span>
                        </label>

                    </div>
                </section>

                <!-- 2. Your Age -->
                <section class="bg-white dark:bg-neutral-900 rounded-2xl border border-neutral-200/80 dark:border-neutral-800 p-5 sm:p-6 shadow-sm">
                    <h2 class="text-base font-bold text-neutral-900 dark:text-white mb-4 flex items-center gap-2">
                        <span class="flex items-center justify-center w-6 h-6 rounded-full bg-emerald-100 dark:bg-emerald-950/80 text-emerald-700 dark:text-emerald-400 text-xs font-bold">2</span>
                        Your Age
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        
                        <template x-for="item in [
                            { id: 'age18', label: '18 to 24 years', pts: '25 pts' },
                            { id: 'age25', label: '25 to 32 years', pts: '30 pts' },
                            { id: 'age33', label: '33 to 39 years', pts: '25 pts' },
                            { id: 'age40', label: '40 to 44 years', pts: '15 pts' },
                            { id: 'age45', label: '45 to 49 years', pts: '0 pts' }
                        ]" :key="item.id">
                            <label :class="age === item.id ? 'border-emerald-500 ring-2 ring-emerald-500/20 bg-emerald-50/30 dark:bg-emerald-950/20' : 'border-neutral-200 dark:border-neutral-800 bg-white dark:bg-neutral-900 hover:border-neutral-300 dark:hover:border-neutral-700'"
                                   class="relative flex items-center justify-between p-3.5 rounded-xl border cursor-pointer transition-all">
                                <div class="flex items-center gap-3">
                                    <input type="radio" name="age" :value="item.id" x-model="age" class="h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-neutral-300 dark:border-neutral-700" />
                                    <span class="text-xs sm:text-sm font-medium text-neutral-800 dark:text-neutral-200" x-text="item.label"></span>
                                </div>
                                <span class="px-2 py-0.5 rounded bg-neutral-100 dark:bg-neutral-800 text-neutral-600 dark:text-neutral-300 text-xs font-semibold" x-text="item.pts"></span>
                            </label>
                        </template>

                    </div>
                </section>

                <!-- 3. English Language -->
                <section class="bg-white dark:bg-neutral-900 rounded-2xl border border-neutral-200/80 dark:border-neutral-800 p-5 sm:p-6 shadow-sm">
                    <h2 class="text-base font-bold text-neutral-900 dark:text-white mb-4 flex items-center gap-2">
                        <span class="flex items-center justify-center w-6 h-6 rounded-full bg-emerald-100 dark:bg-emerald-950/80 text-emerald-700 dark:text-emerald-400 text-xs font-bold">3</span>
                        English Language Ability
                    </h2>
                    <div class="grid grid-cols-1 gap-3">
                        
                        <template x-for="item in [
                            { id: 'competent', label: 'Competent English (IELTS 6 / PTE 50)', pts: '0 pts' },
                            { id: 'proficient', label: 'Proficient English (IELTS 7 / PTE 65)', pts: '+10 pts' },
                            { id: 'superior', label: 'Superior English (IELTS 8 / PTE 79)', pts: '+20 pts' }
                        ]" :key="item.id">
                            <label :class="english === item.id ? 'border-emerald-500 ring-2 ring-emerald-500/20 bg-emerald-50/30 dark:bg-emerald-950/20' : 'border-neutral-200 dark:border-neutral-800 bg-white dark:bg-neutral-900 hover:border-neutral-300 dark:hover:border-neutral-700'"
                                   class="relative flex items-center justify-between p-4 rounded-xl border cursor-pointer transition-all">
                                <div class="flex items-center gap-3">
                                    <input type="radio" name="english" :value="item.id" x-model="english" class="h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-neutral-300 dark:border-neutral-700" />
                                    <span class="text-xs sm:text-sm font-medium text-neutral-800 dark:text-neutral-200" x-text="item.label"></span>
                                </div>
                                <span class="px-2.5 py-1 rounded-md bg-neutral-100 dark:bg-neutral-800 text-neutral-600 dark:text-neutral-300 text-xs font-semibold" x-text="item.pts"></span>
                            </label>
                        </template>

                    </div>
                </section>

                <!-- 4. Work Experience -->
                <section class="bg-white dark:bg-neutral-900 rounded-2xl border border-neutral-200/80 dark:border-neutral-800 p-5 sm:p-6 shadow-sm">
                    <h2 class="text-base font-bold text-neutral-900 dark:text-white mb-4 flex items-center gap-2">
                        <span class="flex items-center justify-center w-6 h-6 rounded-full bg-emerald-100 dark:bg-emerald-950/80 text-emerald-700 dark:text-emerald-400 text-xs font-bold">4</span>
                        Work Experience (Overseas)
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        
                        <template x-for="item in [
                            { id: 'lessThan3', label: 'Less than 3 years', pts: '0 pts' },
                            { id: 'threeTo5', label: '3 to 4 years', pts: '+5 pts' },
                            { id: 'fiveTo7', label: '5 to 7 years', pts: '+10 pts' },
                            { id: 'eightOrMore', label: '8 years or more', pts: '+15 pts' }
                        ]" :key="item.id">
                            <label :class="workExperience === item.id ? 'border-emerald-500 ring-2 ring-emerald-500/20 bg-emerald-50/30 dark:bg-emerald-950/20' : 'border-neutral-200 dark:border-neutral-800 bg-white dark:bg-neutral-900 hover:border-neutral-300 dark:hover:border-neutral-700'"
                                   class="relative flex items-center justify-between p-3.5 rounded-xl border cursor-pointer transition-all">
                                <div class="flex items-center gap-3">
                                    <input type="radio" name="work-experience" :value="item.id" x-model="workExperience" class="h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-neutral-300 dark:border-neutral-700" />
                                    <span class="text-xs sm:text-sm font-medium text-neutral-800 dark:text-neutral-200" x-text="item.label"></span>
                                </div>
                                <span class="px-2 py-0.5 rounded bg-neutral-100 dark:bg-neutral-800 text-neutral-600 dark:text-neutral-300 text-xs font-semibold" x-text="item.pts"></span>
                            </label>
                        </template>

                    </div>
                </section>

                <!-- 5. Educational Qualifications -->
                <section class="bg-white dark:bg-neutral-900 rounded-2xl border border-neutral-200/80 dark:border-neutral-800 p-5 sm:p-6 shadow-sm">
                    <h2 class="text-base font-bold text-neutral-900 dark:text-white mb-4 flex items-center gap-2">
                        <span class="flex items-center justify-center w-6 h-6 rounded-full bg-emerald-100 dark:bg-emerald-950/80 text-emerald-700 dark:text-emerald-400 text-xs font-bold">5</span>
                        Educational Qualifications
                    </h2>
                    <div class="grid grid-cols-1 gap-3">
                        
                        <template x-for="item in [
                            { id: 'noQualification', label: 'No Recognised Qualifications', pts: '0 pts' },
                            { id: 'diploma', label: 'Diploma or Trade Qualification', pts: '+10 pts' },
                            { id: 'bachelor', label: 'Bachelor’s degree (or Master’s)', pts: '+15 pts' },
                            { id: 'doctorate', label: 'Doctorate degree (PhD)', pts: '+20 pts' }
                        ]" :key="item.id">
                            <label :class="education === item.id ? 'border-emerald-500 ring-2 ring-emerald-500/20 bg-emerald-50/30 dark:bg-emerald-950/20' : 'border-neutral-200 dark:border-neutral-800 bg-white dark:bg-neutral-900 hover:border-neutral-300 dark:hover:border-neutral-700'"
                                   class="relative flex items-center justify-between p-4 rounded-xl border cursor-pointer transition-all">
                                <div class="flex items-center gap-3">
                                    <input type="radio" name="education" :value="item.id" x-model="education" class="h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-neutral-300 dark:border-neutral-700" />
                                    <span class="text-xs sm:text-sm font-medium text-neutral-800 dark:text-neutral-200" x-text="item.label"></span>
                                </div>
                                <span class="px-2.5 py-1 rounded-md bg-neutral-100 dark:bg-neutral-800 text-neutral-600 dark:text-neutral-300 text-xs font-semibold" x-text="item.pts"></span>
                            </label>
                        </template>

                    </div>
                </section>

                <!-- 6. Partner Skills -->
                <section class="bg-white dark:bg-neutral-900 rounded-2xl border border-neutral-200/80 dark:border-neutral-800 p-5 sm:p-6 shadow-sm">
                    <h2 class="text-base font-bold text-neutral-900 dark:text-white mb-4 flex items-center gap-2">
                        <span class="flex items-center justify-center w-6 h-6 rounded-full bg-emerald-100 dark:bg-emerald-950/80 text-emerald-700 dark:text-emerald-400 text-xs font-bold">6</span>
                        Partner Skills & Status
                    </h2>
                    <div class="grid grid-cols-1 gap-3">
                        
                        <template x-for="item in [
                            { id: 'yes', label: 'Partner has eligible skills & competent English', pts: '+10 pts' },
                            { id: 'noWithEnglish', label: 'Partner has competent English only', pts: '+5 pts' },
                            { id: 'noWithoutEnglish', label: 'Partner has no competent English', pts: '0 pts' },
                            { id: 'single', label: 'I am single (or partner is Australian PR/citizen)', pts: '+10 pts' }
                        ]" :key="item.id">
                            <label :class="partnerSkill === item.id ? 'border-emerald-500 ring-2 ring-emerald-500/20 bg-emerald-50/30 dark:bg-emerald-950/20' : 'border-neutral-200 dark:border-neutral-800 bg-white dark:bg-neutral-900 hover:border-neutral-300 dark:hover:border-neutral-700'"
                                   class="relative flex items-center justify-between p-4 rounded-xl border cursor-pointer transition-all">
                                <div class="flex items-center gap-3">
                                    <input type="radio" name="partner-skill" :value="item.id" x-model="partnerSkill" class="h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-neutral-300 dark:border-neutral-700" />
                                    <span class="text-xs sm:text-sm font-medium text-neutral-800 dark:text-neutral-200" x-text="item.label"></span>
                                </div>
                                <span class="px-2.5 py-1 rounded-md bg-neutral-100 dark:bg-neutral-800 text-neutral-600 dark:text-neutral-300 text-xs font-semibold" x-text="item.pts"></span>
                            </label>
                        </template>

                    </div>
                </section>

            </div>

            <!-- Summary & Total Score Sidebar (Right Column - Sticky) -->
            <div class="lg:col-span-4 sticky top-22 space-y-6">
                
                <div class="bg-white dark:bg-neutral-900 rounded-2xl border border-neutral-200/80 dark:border-neutral-800 p-6 shadow-sm space-y-6">
                    
                    <!-- Score Counter Box -->
                    <div class="text-center p-6 rounded-xl bg-gradient-to-b from-neutral-50 to-neutral-100/50 dark:from-neutral-800/40 dark:to-neutral-800/80 border border-neutral-100 dark:border-neutral-800">
                        <span class="block text-xs font-bold uppercase tracking-wider text-neutral-400 dark:text-neutral-500 mb-1">Assessment Total</span>
                        <div class="text-5xl font-extrabold text-neutral-900 dark:text-white font-mono" x-text="totalScore">0</div>
                        <p class="text-xs text-neutral-400 mt-1">Minimum required score: 65 points</p>
                        
                        <!-- Status Badge -->
                        <div class="mt-4">
                            <template x-if="isEligible">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800 dark:bg-emerald-950/80 dark:text-emerald-300 ring-1 ring-inset ring-emerald-500/20">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Eligible for EOI Submission
                                </span>
                            </template>
                            <template x-if="!isEligible">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-rose-100 text-rose-800 dark:bg-rose-950/80 dark:text-rose-300 ring-1 ring-inset ring-rose-500/20">
                                    Below Minimum Threshold
                                </span>
                            </template>
                        </div>
                    </div>

                    <!-- Points Breakdown List -->
                    <div class="space-y-3">
                        <h3 class="text-xs font-bold uppercase tracking-wider text-neutral-500 dark:text-neutral-400 border-b border-neutral-100 dark:border-neutral-800 pb-2">Points Breakdown</h3>
                        
                        <ul class="divide-y divide-neutral-100 dark:divide-neutral-800 text-xs font-medium">
                            <li class="py-2 flex justify-between items-center text-neutral-600 dark:text-neutral-400">
                                <span>Visa Subclass</span>
                                <span class="font-bold text-neutral-900 dark:text-neutral-100" x-text="getSubclassPoints + ' pts'"></span>
                            </li>
                            <li class="py-2 flex justify-between items-center text-neutral-600 dark:text-neutral-400">
                                <span>Age Points</span>
                                <span class="font-bold text-neutral-900 dark:text-neutral-100" x-text="getAgePoints + ' pts'"></span>
                            </li>
                            <li class="py-2 flex justify-between items-center text-neutral-600 dark:text-neutral-400">
                                <span>English Proficiency</span>
                                <span class="font-bold text-neutral-900 dark:text-neutral-100" x-text="getEnglishPoints + ' pts'"></span>
                            </li>
                            <li class="py-2 flex justify-between items-center text-neutral-600 dark:text-neutral-400">
                                <span>Work Experience</span>
                                <span class="font-bold text-neutral-900 dark:text-neutral-100" x-text="getWorkPoints + ' pts'"></span>
                            </li>
                            <li class="py-2 flex justify-between items-center text-neutral-600 dark:text-neutral-400">
                                <span>Education Points</span>
                                <span class="font-bold text-neutral-900 dark:text-neutral-100" x-text="getEducationPoints + ' pts'"></span>
                            </li>
                            <li class="py-2 flex justify-between items-center text-neutral-600 dark:text-neutral-400">
                                <span>Partner Points</span>
                                <span class="font-bold text-neutral-900 dark:text-neutral-100" x-text="getPartnerPoints + ' pts'"></span>
                            </li>
                        </ul>
                    </div>

                    <!-- Book Consultation CTA -->
                    <button onclick="window.location.href='/Home/VisaServices'" 
                            class="w-full py-3 px-4 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs tracking-wide shadow-sm transition active:scale-95 flex items-center justify-center gap-2">
                        <span>Book a Free Consultation</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>

                </div>
            </div>

        </div>

    </div>

</div>
@endsection