<div x-data="{
    activityType: 'Phone Call',
    connected: true,
    outcome: 'Follow-up',
    notes: '',

    connectedOutcomes: [
        { value: 'Follow-up', label: 'Follow-up', icon: 'lucide:phone-forwarded' },
        { value: 'File Open', label: 'File Open', icon: 'lucide:folder-open' },
        { value: 'Visit Office', label: 'Visit Office', icon: 'lucide:building-2' },
        { value: 'Attend Session', label: 'Attend Session', icon: 'lucide:presentation' },
        { value: 'Attend Expo', label: 'Attend Expo', icon: 'lucide:ticket' },
        { value: 'Master Class', label: 'Master Class', icon: 'lucide:graduation-cap' }
    ],

    notConnectedOutcomes: [
        { value: 'Call Back', label: 'Call Back', icon: 'lucide:phone-call' },
        { value: 'No Answer', label: 'No Answer', icon: 'lucide:phone-missed' },
        { value: 'Busy', label: 'Busy', icon: 'lucide:phone-off' },
        { value: 'Switched Off', label: 'Switched Off', icon: 'lucide:power' },
        { value: 'Wrong Number', label: 'Wrong Number', icon: 'lucide:circle-alert' },
        { value: 'Follow-up', label: 'Follow-up', icon: 'lucide:calendar-clock' }
    ],

    otherOutcomes: [
        { value: 'Follow-up', label: 'Follow-up', icon: 'lucide:calendar-clock' },
        { value: 'File Open', label: 'File Open', icon: 'lucide:folder-open' },
        { value: 'Visit Office', label: 'Visit Office', icon: 'lucide:building-2' },
        { value: 'Attend Session', label: 'Attend Session', icon: 'lucide:presentation' },
        { value: 'Attend Expo', label: 'Attend Expo', icon: 'lucide:ticket' },
        { value: 'Master Class', label: 'Master Class', icon: 'lucide:graduation-cap' }
    ],

    get currentOutcomes() {
        if (this.activityType !== 'Phone Call') {
            return this.otherOutcomes;
        }

        return this.connected ?
            this.connectedOutcomes :
            this.notConnectedOutcomes;
    },

    setActivityType(type) {
        this.activityType = type;

        if (type !== 'Phone Call') {
            this.outcome = 'Follow-up';
        } else {
            this.outcome = this.connected ?
                'Follow-up' :
                'Call Back';
        }
    },

    setConnection(value) {
        this.connected = value;
        this.outcome = value ? 'Follow-up' : 'Call Back';
    },

    submitForm() {
        // Keep your existing submitForm() logic here.
    },
    openTransferModal: false,
    selectedUser: '2',
    users: [
        { id: '1', name: 'Alex Morgan', role: 'Senior Consultant', avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&auto=format&fit=crop&q=80', activeLeads: 14 },
        { id: '2', name: 'David Chen', role: 'Lead Advisor', avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=80', activeLeads: 8 },
        { id: '3', name: 'Sarah Jenkins', role: 'Student Counselor', avatar: 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&auto=format&fit=crop&q=80', activeLeads: 21 },
        { id: '4', name: 'Michael Vance', role: 'Admissions Specialist', avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&auto=format&fit=crop&q=80', activeLeads: 5 }
    ],
}" class="mx-auto w-full">

    <!-- =========================================================
         MAIN CARD
    ========================================================== -->
    <div
        class="overflow-hidden rounded-2xl border border-slate-200
               bg-white shadow-sm
               dark:border-slate-800 dark:bg-slate-900">

        <!-- =====================================================
             HEADER
        ====================================================== -->
        <div class="border-b border-slate-100 px-4 py-3.5 dark:border-slate-800 flex justify-between">

            <div class="flex items-center gap-3">

                <div
                    class="flex h-9 w-9 shrink-0 items-center justify-center
                           rounded-xl bg-brand-50 text-brand-600
                           dark:bg-brand-500/10 dark:text-brand-400">
                    <iconify-icon icon="lucide:clipboard-pen-line" class="text-lg"></iconify-icon>
                </div>

                <div class="min-w-0">

                    <h1
                        class="text-sm font-bold tracking-tight
                               text-slate-900 dark:text-white">
                        Log Lead Activity
                    </h1>

                    <p class="mt-0.5 truncate text-[11px]
                               text-slate-400">
                        Record interaction and next action.
                    </p>

                </div>

            </div>

            <button @click="openTransferModal = true" type="button"
                class="inline-flex items-center justify-center gap-2 rounded-xl bg-slate-900 px-4 py-2.5 text-xs font-semibold text-white transition-all duration-200 hover:bg-brand-600 hover:shadow-md active:scale-95">
                <iconify-icon icon="lucide:arrow-left-right" class="text-sm"></iconify-icon>
                Transfer Ownership
            </button>

        </div>


        <!-- =====================================================
             FORM
        ====================================================== -->
        <form @submit.prevent="submitForm()" class="space-y-4 px-4 py-4">

            <!-- =================================================
                 SERVICE STREAM
            ================================================== -->
            <div>

                <div class="mb-1.5 flex items-center justify-between">

                    <label
                        class="text-[11px] font-bold uppercase
                               tracking-wider text-slate-500
                               dark:text-slate-400">
                        Service Stream
                        <span class="text-rose-500">*</span>
                    </label>

                </div>


                <div
                    class="grid grid-cols-2 gap-1 rounded-xl
                           border border-slate-200 bg-slate-100 p-1
                           dark:border-slate-700 dark:bg-slate-800">

                    <label
                        class="flex cursor-pointer items-center
                               justify-center gap-1.5 rounded-lg px-2 py-2
                               text-xs font-semibold text-slate-500
                               transition-all
                               has-checked:bg-white
                               has-checked:text-brand-600
                               has-[:checked]:shadow-sm
                               dark:text-slate-400
                               dark:has-[:checked]:bg-slate-700
                               dark:has-[:checked]:text-brand-400">

                        <input type="radio" name="service_stream" value="HBD Service" class="sr-only" checked>

                        <iconify-icon icon="lucide:graduation-cap" class="text-sm"></iconify-icon>

                        HBD Service

                    </label>


                    <label
                        class="flex cursor-pointer items-center
                               justify-center gap-1.5 rounded-lg px-2 py-2
                               text-xs font-semibold text-slate-500
                               transition-all
                               has-checked:bg-white
                               has-checked:text-brand-600
                               has-[:checked]:shadow-sm
                               dark:text-slate-400
                               dark:has-[:checked]:bg-slate-700
                               dark:has-[:checked]:text-brand-400">

                        <input type="radio" name="service_stream" value="Language Academic" class="sr-only">

                        <iconify-icon icon="lucide:languages" class="text-sm"></iconify-icon>

                        Language Academic

                    </label>

                </div>

            </div>


            <!-- =================================================
                 ACTIVITY TYPE
            ================================================== -->
            <div>

                <div class="mb-1.5 flex items-center justify-between">

                    <label
                        class="text-[11px] font-bold uppercase
                               tracking-wider text-slate-500
                               dark:text-slate-400">
                        Activity Type
                        <span class="text-rose-500">*</span>
                    </label>

                    <span class="text-[9px] text-slate-400">
                        Communication method
                    </span>

                </div>


                <div class="grid grid-cols-2 gap-1.5 sm:grid-cols-4">

                    <!-- Physical -->
                    <label
                        class="flex cursor-pointer items-center gap-2
                               rounded-xl border border-slate-200
                               bg-white px-2.5 py-2.5
                               transition-all
                               hover:border-slate-300
                               has-checked:border-brand-500
                               has-checked:bg-brand-50/60
                               dark:border-slate-700
                               dark:bg-slate-900
                               dark:has-checked:border-brand-500
                               dark:has-checked:bg-brand-500/10">

                        <input type="radio" name="activity_type" value="Physical" class="sr-only"
                            @change="setActivityType('Physical')">

                        <iconify-icon icon="lucide:users-round"
                            class="text-sm text-slate-400
                                   group-has-checked:text-brand-600"></iconify-icon>

                        <span
                            class="text-xs font-semibold
                                   text-slate-600 dark:text-slate-300">
                            Physical
                        </span>

                    </label>


                    <!-- Phone -->
                    <label
                        class="flex cursor-pointer items-center gap-2
                               rounded-xl border border-slate-200
                               bg-white px-2.5 py-2.5
                               transition-all
                               hover:border-slate-300
                               has-checked:border-brand-500
                               has-checked:bg-brand-50/60
                               dark:border-slate-700
                               dark:bg-slate-900
                               dark:has-checked:border-brand-500
                               dark:has-checked:bg-brand-500/10">

                        <input type="radio" name="activity_type" value="Phone Call" class="sr-only" checked
                            @change="setActivityType('Phone Call')">

                        <iconify-icon icon="lucide:phone" class="text-sm text-slate-400"></iconify-icon>

                        <span
                            class="text-xs font-semibold
                                   text-slate-600 dark:text-slate-300">
                            Phone Call
                        </span>

                    </label>


                    <!-- WhatsApp -->
                    <label
                        class="flex cursor-pointer items-center gap-2
                               rounded-xl border border-slate-200
                               bg-white px-2.5 py-2.5
                               transition-all
                               hover:border-slate-300
                               has-checked:border-brand-500
                               has-checked:bg-brand-50/60
                               dark:border-slate-700
                               dark:bg-slate-900
                               dark:has-checked:border-brand-500
                               dark:has-checked:bg-brand-500/10">

                        <input type="radio" name="activity_type" value="WhatsApp" class="sr-only"
                            @change="setActivityType('WhatsApp')">

                        <iconify-icon icon="lucide:message-circle" class="text-sm text-slate-400"></iconify-icon>

                        <span
                            class="text-xs font-semibold
                                   text-slate-600 dark:text-slate-300">
                            WhatsApp
                        </span>

                    </label>


                    <!-- SMS -->
                    <label
                        class="flex cursor-pointer items-center gap-2
                               rounded-xl border border-slate-200
                               bg-white px-2.5 py-2.5
                               transition-all
                               hover:border-slate-300
                               has-checked:border-brand-500
                               has-checked:bg-brand-50/60
                               dark:border-slate-700
                               dark:bg-slate-900
                               dark:has-checked:border-brand-500
                               dark:has-checked:bg-brand-500/10">

                        <input type="radio" name="activity_type" value="SMS" class="sr-only"
                            @change="setActivityType('SMS')">

                        <iconify-icon icon="lucide:message-square" class="text-sm text-slate-400"></iconify-icon>

                        <span
                            class="text-xs font-semibold
                                   text-slate-600 dark:text-slate-300">
                            SMS
                        </span>

                    </label>


                    <!-- Mail -->
                    <label
                        class="flex cursor-pointer items-center gap-2
                               rounded-xl border border-slate-200
                               bg-white px-2.5 py-2.5
                               transition-all
                               hover:border-slate-300
                               has-checked:border-brand-500
                               has-checked:bg-brand-50/60
                               dark:border-slate-700
                               dark:bg-slate-900
                               dark:has-checked:border-brand-500
                               dark:has-checked:bg-brand-500/10">

                        <input type="radio" name="activity_type" value="Mail" class="sr-only"
                            @change="setActivityType('Mail')">

                        <iconify-icon icon="lucide:mail" class="text-sm text-slate-400"></iconify-icon>

                        <span
                            class="text-xs font-semibold
                                   text-slate-600 dark:text-slate-300">
                            Mail
                        </span>

                    </label>

                </div>

            </div>


            <!-- =================================================
                 CALL RESULT
            ================================================== -->
            <div x-show="activityType === 'Phone Call'" x-transition.opacity.duration.150ms
                class="rounded-xl border border-slate-200
                       bg-slate-50 p-2.5
                       dark:border-slate-700
                       dark:bg-slate-800/50">

                <div class="mb-2 flex items-center justify-between">

                    <span
                        class="text-[11px] font-bold uppercase
                               tracking-wider text-slate-500
                               dark:text-slate-400">
                        Call Result
                    </span>

                    <span
                        class="text-[11px] font-semibold text-brand-600
                               dark:text-brand-400"
                        x-text="connected ? 'Connected' : 'Not Connected'"></span>

                </div>


                <div class="grid grid-cols-2 gap-1.5">

                    <button type="button" @click="setConnection(true)"
                        :class="connected
                            ?
                            'border-brand-500 bg-brand-50 text-brand-700 dark:bg-brand-500/10 dark:text-brand-400' :
                            'border-slate-200 bg-white text-slate-500 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-400'"
                        class="flex items-center justify-center gap-1.5
                               rounded-lg border px-3 py-2
                               text-xs font-semibold transition-all">

                        <iconify-icon icon="lucide:phone-call" class="text-sm"></iconify-icon>

                        Connected

                    </button>


                    <button type="button" @click="setConnection(false)"
                        :class="!connected
                            ?
                            'border-brand-500 bg-brand-50 text-brand-700 dark:bg-brand-500/10 dark:text-brand-400' :
                            'border-slate-200 bg-white text-slate-500 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-400'"
                        class="flex items-center justify-center gap-1.5
                               rounded-lg border px-3 py-2
                               text-xs font-semibold transition-all">

                        <iconify-icon icon="lucide:phone-missed" class="text-sm"></iconify-icon>

                        Not Connected

                    </button>

                </div>


                <input type="hidden" name="communication_result" :value="connected ? 'Connected' : 'Not Connected'">

            </div>


            <!-- =================================================
                 OUTCOME & STATUS
            ================================================== -->
            <div>

                <div class="mb-1.5 flex items-center justify-between">

                    <label
                        class="text-[11px] font-bold uppercase
                               tracking-wider text-slate-500
                               dark:text-slate-400">
                        Outcome & Status
                        <span class="text-rose-500">*</span>
                    </label>

                    <span x-show="activityType === 'Phone Call'" class="text-[9px] font-medium text-slate-400"
                        x-text="connected ? 'After connection' : 'After missed call'"></span>

                </div>


                <div class="grid grid-cols-2 md:grid-cols-3 gap-1.5">

                    <template x-for="item in currentOutcomes" :key="item.value">

                        <label
                            class="flex cursor-pointer items-center gap-2
                                   rounded-xl border border-slate-200
                                   bg-white px-2.5 py-2.5
                                   transition-all
                                   hover:border-slate-300
                                   dark:border-slate-700
                                   dark:bg-slate-900"
                            :class="outcome === item.value ?
                                'border-brand-500 bg-brand-50/60 dark:border-brand-500 dark:bg-brand-500/10' :
                                ''">

                            <input type="radio" name="outcome" :value="item.value" x-model="outcome"
                                class="sr-only">

                            <span
                                class="flex h-5 w-5 shrink-0 items-center
                                       justify-center rounded-lg
                                       bg-slate-100 text-slate-500
                                       dark:bg-slate-800 dark:text-slate-400"
                                :class="outcome === item.value ?
                                    'bg-brand-100 text-brand-600 dark:bg-brand-500/20 dark:text-brand-400' :
                                    ''">
                                <iconify-icon :icon="item.icon" class="text-xs"></iconify-icon>
                            </span>

                            <span
                                class="min-w-0 flex-1 truncate text-[11px]
                                       font-semibold text-slate-600
                                       dark:text-slate-300"
                                x-text="item.label"></span>

                            <span
                                class="flex h-4 w-4 shrink-0 items-center
                                       justify-center rounded-full border"
                                :class="outcome === item.value ?
                                    'border-brand-500 bg-brand-500 text-white' :
                                    'border-slate-300 text-transparent dark:border-slate-600'">
                                <iconify-icon icon="lucide:check" class="text-[9px]"></iconify-icon>
                            </span>

                        </label>

                    </template>

                </div>

            </div>


            <!-- =================================================
                 REMINDER
            ================================================== -->
            <div
                class="rounded-xl border border-slate-200 bg-slate-50
                       p-3 dark:border-slate-700 dark:bg-slate-800/50">

                <div class="mb-2 flex items-center gap-2">

                    <iconify-icon icon="lucide:calendar-clock" class="text-sm text-brand-500"></iconify-icon>

                    <span
                        class="text-[11px] font-bold uppercase
                               tracking-wider text-slate-600
                               dark:text-slate-300">
                        Schedule Reminder
                    </span>

                </div>


                <div class="grid grid-cols-2 gap-2">

                    <!-- Date -->
                    <div>

                        <label for="reminderDate"
                            class="mb-1 block text-[11px] font-medium
                                   text-slate-500 dark:text-slate-400">
                            Reminder Date
                            <span class="text-rose-500">*</span>
                        </label>

                        <input type="date" id="reminderDate" name="reminder_date" value="2026-09-28"
                            class="w-full rounded-lg border border-slate-200
                                   bg-white px-2.5 py-2 text-xs
                                   font-medium text-slate-700 outline-none
                                   focus:border-brand-500
                                   focus:ring-2 focus:ring-brand-500/10
                                   dark:border-slate-700
                                   dark:bg-slate-900
                                   dark:text-slate-300">

                    </div>


                    <!-- Counsellor -->
                    <div>

                        <label for="assignedCounsellor"
                            class="mb-1 block text-[11px] font-medium
                                   text-slate-500 dark:text-slate-400">
                            Assigned Counsellor
                        </label>

                        <div class="relative">

                            <select id="assignedCounsellor" name="assigned_counsellor"
                                class="w-full appearance-none rounded-lg
                                       border border-slate-200 bg-white
                                       px-2.5 py-2 pr-7 text-xs
                                       font-medium text-slate-700 outline-none
                                       focus:border-brand-500
                                       focus:ring-2 focus:ring-brand-500/10
                                       dark:border-slate-700
                                       dark:bg-slate-900
                                       dark:text-slate-300">

                                <option value="Self (Sarah Jenkins)">
                                    Self (Sarah Jenkins)
                                </option>

                                <option value="Rohan Thapa (HBD Head)">
                                    Rohan Thapa (HBD Head)
                                </option>

                                <option value="Pooja Shrestha (Language Academic)">
                                    Pooja Shrestha (Language Academic)
                                </option>

                                <option value="Front Desk Team">
                                    Front Desk Team
                                </option>

                            </select>

                        </div>

                    </div>

                </div>

            </div>


            <!-- =================================================
                 NOTES
            ================================================== -->
            <div>

                <div class="mb-1 flex items-center justify-between">

                    <label for="notes"
                        class="text-[11px] font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">
                        Notes
                    </label>

                    <span class="text-[9px] text-slate-400" x-text="notes.length + '/500'"></span>

                </div>

                <textarea id="notes" x-model="notes" name="notes" rows="2" maxlength="500"
                    placeholder="Write a short note..."
                    class="w-full resize-none rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-xs leading-5 text-slate-700  placeholder-slate-400 outline-none
                           focus:border-brand-500  focus:ring-2 focus:ring-brand-500/10 dark:border-slate-700
                           dark:bg-slate-900  dark:text-slate-300">
                          </textarea>

            </div>


            <!-- =================================================
                 ACTIONS
            ================================================== -->
            <div
                class="flex items-center justify-end gap-2
                       border-t border-slate-100 pt-3
                       dark:border-slate-800">

                <button type="button"
                    class="rounded-lg border border-slate-200 bg-white px-4 py-2 text-xs  transition hover:bg-slate-50
                           dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300">
                    Cancel
                </button>


                <button type="submit"
                    class="inline-flex items-center gap-1.5 rounded-lg bg-brand-600 px-4 py-2 text-xs font-semibold text-white
                           shadow-sm transition  hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-brand-500/20">

                    <iconify-icon icon="lucide:check" class="text-sm"></iconify-icon>

                    Save Activity

                </button>

            </div>

        </form>

    </div>
    <!-- TRANSFER LEAD MODAL / SLIDE OVER -->
    <div x-show="openTransferModal" x-transition.opacity
        class="fixed inset-0 z-999999 flex items-center justify-center bg-slate-900/40 p-4 backdrop-blur-sm" x-cloak>
        <div @click.away="openTransferModal = false"
            class="w-full max-w-md overflow-hidden rounded-2xl bg-white shadow-2xl">

            <div class="flex items-center justify-between border-b border-slate-100 px-6 py-4">
                <div>
                    <h3 class="text-sm font-bold text-slate-900">Transfer Lead Ownership</h3>
                    <p class="text-xs text-slate-500">Reassign this student record to another team member</p>
                </div>
                <button @click="openTransferModal = false"
                    class="rounded-lg p-2 w-9 h-9 flex items-center justify-center text-slate-400 hover:bg-slate-100 hover:text-slate-600">
                    <iconify-icon icon="lucide:x" class="text-lg"></iconify-icon>
                </button>
            </div>

            {{-- <form @submit.prevent="openTransferModal = false; alert('Lead transferred successfully!')"
                    class="p-6 space-y-4">
                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-2">Select
                            New Owner</label>
                        <div class="space-y-2 max-h-56 overflow-y-auto pr-1">
                            <template x-for="user in users" :key="user.id">
                                <label
                                    :class="selectedUser === user.id ? 'border-brand-600 bg-brand-50/50 ring-1 ring-brand-600' :
                                        'border-slate-200 hover:border-slate-300 bg-white'"
                                    class="flex items-center justify-between rounded-xl border p-3 cursor-pointer transition-all">
                                    <div class="flex items-center gap-3">
                                        <input type="radio" name="lead_owner" :value="user.id"
                                            x-model="selectedUser" class="sr-only">
                                        <img :src="user.avatar" :alt="user.name"
                                            class="h-9 w-9 rounded-full object-cover">
                                        <div>
                                            <p class="text-xs font-semibold text-slate-800" x-text="user.name"></p>
                                            <p class="text-[11px] text-slate-500" x-text="user.role"></p>
                                        </div>
                                    </div>
                                    <span
                                        class="rounded-md bg-slate-100 px-2 py-0.5 text-[10px] font-medium text-slate-600"
                                        x-text="user.activeLeads + ' leads'"></span>
                                </label>
                            </template>
                        </div>
                    </div>

                    <div>
                        <label
                            class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1.5">Handover
                            Note <span class="text-slate-400 font-normal">(Optional)</span></label>
                        <textarea rows="3" placeholder="Add context or instructions for the new owner..."
                            class="w-full rounded-xl border border-slate-200 p-3 text-xs text-slate-800 placeholder-slate-400 shadow-sm focus:border-brand-600 focus:outline-none"></textarea>
                    </div>

                    <div class="flex items-center justify-end gap-2 pt-2">
                        <button @click="openTransferModal = false" type="button"
                            class="rounded-xl border border-slate-200 px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50">
                            Cancel
                        </button>
                        <button type="submit"
                            class="rounded-xl bg-brand-600 px-4 py-2 text-xs font-semibold text-white shadow-sm hover:bg-brand-700">
                            Confirm Transfer
                        </button>
                    </div>
                </form> --}}

            <div x-data="{
                activeTab: 'transfer',
                currentOwner: 'Hasan (Application Officer)',
                selectedHistoryItem: null,
            
                history: [
                    { id: 1,  name: 'Rahim', role: 'Customer Support', datetime: '10 Oct 2026, 10:00 AM', note: 'Initial lead qualification complete. Assigned for counselling.' },
                    { id: 2,  name: 'Karim', role: 'Counsellor', datetime: '12 Oct 2026, 11:30 AM', note: 'Document collection verified and handed over for visa application processing.' },
                    { id: 3,  name: 'Hasan', role: 'Application Officer', datetime: '15 Oct 2026, 02:00 PM', note: 'Offer letter received from university. Re-assigning back for enrollment payment.' }
                ]
            }"
                class="max-w-md mx-auto rounded-2xl border border-slate-200 bg-white shadow-xl shadow-slate-100 overflow-hidden">

                <!-- Header & Toggle Bar -->
                <div class="border-b border-slate-100 bg-slate-50/50 p-4">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-sm font-bold text-[#182F5A] flex items-center gap-2">
                            <iconify-icon icon="lucide:user-cog" class="text-brand-500 text-lg"></iconify-icon>
                            <span>Lead Ownership</span>
                        </h3>
                    </div>

                    <!-- Segmented Tab Switcher -->
                    <div class="grid grid-cols-2 p-1 bg-slate-200/50 rounded-xl text-xs font-semibold text-slate-600">
                        <button @click="activeTab = 'transfer'"
                            :class="activeTab === 'transfer' ? 'bg-white text-brand-500 shadow-xs' : 'hover:text-slate-900'"
                            class="py-1.5 rounded-lg transition-all flex items-center justify-center gap-1.5">
                            <iconify-icon icon="lucide:arrow-right-left" class="text-sm"></iconify-icon>
                            <span>Transfer</span>
                        </button>
                        <button @click="activeTab = 'history'"
                            :class="activeTab === 'history' ? 'bg-white text-brand-500 shadow-xs' : 'hover:text-slate-900'"
                            class="py-1.5 rounded-lg transition-all flex items-center justify-center gap-1.5">
                            <iconify-icon icon="lucide:history" class="text-sm"></iconify-icon>
                            <span>History</span>
                        </button>
                    </div>
                </div>

                <!-- TAB 1: TRANSFER FORM -->
                <div x-show="activeTab === 'transfer'" class="p-5 space-y-4">
                    <form @submit.prevent="alert('Lead transferred successfully!')" class="space-y-4">

                      
                        <div>
                                <label
                                    class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1.5">From
                                    (Current Owner)</label>
                                <div
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 p-2.5 text-xs font-semibold text-slate-700 flex items-center gap-2">
                                    <iconify-icon icon="lucide:user-check"
                                        class="text-slate-400 text-sm"></iconify-icon>
                                    <span x-text="currentOwner"></span>
                                </div>
                            </div>

                        <!-- TO FIELD (Both Admin & Owner) -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1.5">To
                                (New Owner)</label>
                            <select x-model="selectedToUser"
                                class="w-full rounded-xl border border-slate-200 bg-white p-2.5 text-xs font-medium text-slate-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 focus:outline-none transition-all">
                                <option value="" disabled selected>Select new owner...</option>
                                <option value="1">Rahim (Customer Support)</option>
                                <option value="2">Karim (Counsellor)</option>
                                <option value="3">Hasan (Application Officer)</option>
                            </select>
                        </div>

                        <!-- HANDOVER NOTE -->
                        <div>
                            <label
                                class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1.5">Handover
                                Note</label>
                            <textarea rows="3" placeholder="Add handover instructions or reason for transfer..."
                                class="w-full rounded-xl border border-slate-200 p-2.5 text-xs text-slate-800 placeholder-slate-400 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 focus:outline-none transition-all resize-none"></textarea>
                        </div>

                        <!-- SUBMIT BUTTON -->
                        <div class="pt-2">
                            <button type="submit"
                                class="w-full rounded-xl bg-brand-500 hover:bg-brand-600 py-2.5 text-xs font-bold text-white shadow-sm transition-all flex items-center justify-center gap-1.5">
                                <iconify-icon icon="lucide:send" class="text-xs"></iconify-icon>
                                <span>Confirm Transfer</span>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- TAB 2: SIMPLE HISTORY FLOW -->
                <div x-show="activeTab === 'history'" x-cloak class="p-5 space-y-3">
                    <template x-for="(item, index) in history" :key="item.id">
                        <div
                            class="relative p-3.5 rounded-xl border border-slate-100 bg-slate-50/60 hover:bg-slate-50 transition-all space-y-2">

                            <!-- Owner Info & Sequence Header -->
                            <div class="flex items-start justify-between">
                                <div class="flex items-start gap-2.5">
                                    <!-- Sequence Number Badge -->
                                    <div
                                        class="w-6 h-6 rounded-md bg-blue-50 text-[#1968b2] font-bold text-[11px] flex items-center justify-center shrink-0 mt-0.5">
                                        <span x-text="index + 1"></span>
                                    </div>
                                    <div>                                       
                                        <h4 class="text-xs font-bold text-[#182F5A]"
                                            x-text="item.name + ' (' + item.role + ')'"></h4>
                                    </div>
                                </div>

                                <!-- Timestamp -->
                                <p class="text-[10px] text-slate-400 font-mono flex items-center gap-1 shrink-0">
                                    <iconify-icon icon="lucide:clock" class="text-xs"></iconify-icon>
                                    <span x-text="item.datetime"></span>
                                </p>
                            </div>

                            <!-- Inline Handover Note -->
                            <template x-if="item.note">
                                <div class="pl-8">
                                    <p
                                        class="text-[11px] text-slate-600 bg-white border border-slate-200/70 rounded-lg p-2 leading-relaxed">
                                        <span class="font-semibold text-slate-700">Note:</span> <span
                                            x-text="item.note"></span>
                                    </p>
                                </div>
                            </template>
                        </div>
                    </template>
                </div>

            </div>
        </div>
    </div>

</div>
