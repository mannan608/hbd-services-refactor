@if (session('success'))
    <div
        x-data="{ show: true }"
        x-show="show"
        x-init="setTimeout(() => show = false, 5000)"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-500"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="mb-6 rounded-xl border border-success-200 bg-success-50 px-4 py-3 text-sm font-medium text-success-800"
    >
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('booking-session', $counsellor) }}" method="POST" class="space-y-6" x-data="bookingCalendar()"
    x-init="init()" @submit.prevent="submitForm">
    @csrf

    <input type="hidden" name="appointment_date" :value="selectedDate"> <input type="hidden" name="appointment_time"
        :value="selectedTime">
    <!-- ========================================================= STEP 1 : PERSONAL DETAILS ========================================================== -->
    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-neutral-100 shadow-sm space-y-5"> <!-- Header -->
        <div class="flex items-center justify-between">
            <h3 class="text-base sm:text-lg font-bold text-neutral-900 flex items-center"> <span
                    class="w-7 h-7 rounded-full bg-brand-100 text-brand-700 text-xs font-bold flex items-center justify-center mr-2.5">
                    1 </span> Personal Details </h3>
            <span class="text-xs text-neutral-400 font-medium"> Step 1 of 2</span>
        </div> <!-- Fields -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4"> 
            <x-form.input-text type="text" name="name" label="Full Name" placeholder="Enter Full Name..." /> <x-form.input-text type="email" name="mail"
                label="Mail Address" placeholder="Enter Your Mail..." /> 
                <x-form.input-text type="tel" name="phone" label="Phone No" placeholder="Enter Your Phone..." /> <x-form.select-input name="service"
                label="Service" :options="[
                    'university_course_selection' => 'University & Course Selection',
                    'study_abroad_counseling' => 'Study Abroad Counseling',
                    'application_processing' => 'Application Processing',
                    'admission_offer_letter' => 'Admission & Offer Letter Assistance',
                    'scholarship_guidance' => 'Scholarship Guidance',
                    'visa_assistance' => 'Visa Application Assistance',
                    'english_test_guidance' => 'IELTS / English Language Test Guidance',
                    'documentation_support' => 'Financial & Documentation Support',
                    'pre_departure_orientation' => 'Pre-Departure Orientation',
                    'accommodation_travel' => 'Accommodation & Travel Assistance',
                ]" /> 
                </div>
    </div>
    <!-- ========================================================= STEP 2 : DATE & TIME ========================================================== -->
    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-neutral-100 shadow-sm space-y-6"> <!-- Header -->
        <div class="flex items-center justify-between">
            <h3 class="text-base sm:text-lg font-bold text-neutral-900 flex items-center"> <span
                    class="w-7 h-7 rounded-full bg-brand-100 text-brand-700 text-xs font-bold flex items-center justify-center mr-2.5">
                    2 </span> Select Date & Time </h3> <span class="text-xs text-neutral-400 font-medium"> Step 2 of 2
            </span>
        </div>
        <!-- ===================================================== CALENDAR + TIME ====================================================== -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
            <!-- ================================================= CALENDAR ================================================== -->
            <div class="md:col-span-7">
                <div class="bg-neutral-50/70 p-4 sm:p-5 rounded-2xl border border-neutral-100">
                    <!-- ================================================= CALENDAR HEADER ================================================== -->
                    <div class="flex items-center justify-between mb-5"> <!-- Previous Month --> <button type="button"
                            @click="previousMonth()" :disabled="isCurrentMonth()"
                            class=" w-9 h-9 rounded-xl bg-white text-neutral-600 flex items-center justify-center border border-neutral-200 transition hover:bg-neutral-100 disabled:opacity-30 disabled:cursor-not-allowed ">
                            <i class="fa-solid fa-chevron-left text-xs"></i> </button> <!-- Month + Year -->
                        <div class="text-center">
                            <h4 class="font-bold text-sm sm:text-base text-neutral-900" x-text="monthName"></h4>
                            <p class="text-[11px] text-neutral-400 mt-0.5" x-text="currentYear"></p>
                        </div> <!-- Next Month --> <button type="button" @click="nextMonth()"
                            class=" w-9 h-9 rounded-xl bg-white text-neutral-600 flex items-center justify-center border border-neutral-200 transition hover:bg-neutral-100 ">
                            <i class="fa-solid fa-chevron-right text-xs"></i> </button>
                    </div>
                    <!-- ================================================= DAY NAMES ================================================== -->
                    <div
                        class=" grid grid-cols-7 text-center text-[10px] sm:text-xs font-semibold text-neutral-400 mb-2 ">
                        <span>SUN</span> <span>MON</span> <span>TUE</span> <span>WED</span> <span>THU</span>
                        <span>FRI</span> <span>SAT</span>
                    </div>
                    <!-- ================================================= CALENDAR GRID ================================================== -->
                    <div class="grid grid-cols-7 gap-1.5"> <template x-for="day in calendarDays" :key="day.key">
                            <!-- Calendar Day --> <button type="button" @click="selectDate(day)"
                                :disabled="day.disabled"
                                class=" aspect-square rounded-xl flex flex-col items-center justify-center text-xs sm:text-sm font-medium transition relative "
                                :class="{
                                    /* * Previous / next month dates */
                                    'text-neutral-300 bg-transparent cursor-not-allowed': day
                                        .outsideMonth,
                                    /* * Past current-month date */
                                    'text-neutral-300 bg-neutral-100/50 cursor-not-allowed': day
                                        .past && !day
                                        .outsideMonth,
                                    /* * Normal future date */
                                    'bg-white text-neutral-700 hover:bg-brand-50 hover:text-brand-600':
                                        !day.disabled && !day.selected && !day
                                        .today,
                                    /* * Today */ 'bg-brand-50 text-brand-600 ring-1 ring-brand-500': day
                                        .today && !day
                                        .selected,
                                    /* * Selected date */
                                    'bg-brand-600 text-white font-bold shadow-md shadow-brand-500/20': day
                                        .selected
                                }">
                                <!-- Date number --> <span x-text="day.date" class="leading-none"></span>
                                <!-- Today indicator --> <span x-show="day.today && !day.selected"
                                    class=" absolute bottom-1 w-1 h-1 rounded-full bg-brand-500 "></span> </button>
                        </template> </div>
                </div>
            </div>
            <!-- ================================================= TIME SLOTS ================================================== -->
            <div class="md:col-span-5">
                <div class="h-full flex flex-col"> <!-- Header -->
                    <div class="mb-4"> <span class="text-xs font-semibold text-neutral-500 block mb-1"> Available
                            Slots </span>
                        <div x-show="selectedDate" class="flex items-center gap-2"> <i
                                class="fa-regular fa-calendar text-brand-600 text-sm"></i>
                            <p class="text-sm font-bold text-neutral-900" x-text="formattedSelectedDate"></p>
                        </div>
                    </div> <!-- No Date -->
                    <div x-show="!selectedDate"
                        class=" flex flex-1 items-center justify-center rounded-2xl border border-dashed border-neutral-200 p-8 text-center ">
                        <div>
                            <div
                                class=" w-12 h-12 rounded-2xl bg-neutral-100 flex items-center justify-center mx-auto mb-3 ">
                                <i class="fa-regular fa-calendar text-neutral-400"></i>
                            </div>
                            <p class="text-sm font-semibold text-neutral-700"> Select a date </p>
                            <p class="text-xs text-neutral-400 mt-1"> Choose a date from the calendar </p>
                        </div>
                    </div>
                    <!-- ================================================= FIXED TIME SLOTS ================================================== -->
                    <div x-show="selectedDate" class="grid grid-cols-2 gap-2.5"> <template
                            x-for="slot in availableSlots" :key="slot.value"> <button type="button"
                                @click="selectTime(slot)" :disabled="slot.disabled"
                                class=" py-3 px-3 rounded-xl border text-xs sm:text-sm font-semibold transition "
                                :class="{
                                    /* * Selected */
                                    'bg-brand-600 text-white border-brand-600 shadow-md shadow-brand-500/20': selectedTime ===
                                        slot
                                        .value,
                                    /* * Available */
                                    'bg-white border-neutral-200 text-neutral-700 hover:border-brand-500 hover:text-brand-600 hover:bg-brand-50': selectedTime !==
                                        slot.value && !slot
                                        .disabled,
                                    /* * Disabled */
                                    'bg-neutral-50 border-neutral-100 text-neutral-300 cursor-not-allowed': slot
                                        .disabled
                                }">
                                <span x-text="slot.label"></span> </button> </template> </div> <!-- Timezone -->
                    <div x-show="selectedDate"
                        class=" p-3.5 bg-brand-50/60 rounded-xl border border-brand-100 flex items-center justify-between text-[11px] text-brand-900 font-medium mt-5 ">
                        <span class="flex items-center"> <i
                                class="fa-solid fa-earth-americas mr-1.5 text-brand-600"></i> Your Local Time </span>
                        <span class="text-brand-700" x-text="timezone"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ========================================================= BOOKING SUMMARY ========================================================== -->
    <div class=" bg-white rounded-3xl p-5 sm:p-6 border border-neutral-100 shadow-sm ">
        <div class=" flex flex-col sm:flex-row items-center justify-between gap-5 "> <!-- Summary -->
            <div class="w-full sm:w-auto"> <span class=" text-xs text-neutral-400 block font-medium mb-1 "> Selected
                    Consultation </span> <!-- Selected -->
                <p x-show="selectedDate && selectedTime" class="text-sm font-bold text-neutral-900"> <span
                        x-text="formattedSelectedDate"></span> <span class="text-neutral-300 mx-1"> • </span> <span
                        x-text="formattedSelectedTime"></span> </p> <!-- Not selected -->
                <p x-show="!selectedDate || !selectedTime" class="text-sm font-medium text-neutral-400"> Select a date
                    and time to continue </p>
            </div> <!-- Submit --> <button type="submit" :disabled="!selectedDate || !selectedTime"
                class=" w-full sm:w-auto bg-brand-600 hover:bg-brand-700 text-white font-bold px-8 py-3.5 rounded-2xl transition shadow-md shadow-brand-500/20 text-sm flex items-center justify-center disabled:opacity-40 disabled:cursor-not-allowed ">
                Confirm & Book Session <i class="fa-solid fa-arrow-right ml-2"></i> </button>
        </div>
    </div>
</form>
<!-- ============================================================= ALPINE JS ============================================================== -->
<script>
    function bookingCalendar() {
        return {
            /* |-------------------------------------------------------------------------- | DATE STATE |-------------------------------------------------------------------------- */
            today: null,
            currentMonth: null,
            currentYear: null,
            /* |-------------------------------------------------------------------------- | SELECTED |-------------------------------------------------------------------------- */
            selectedDate: null,
            selectedTime: null,
            /* |-------------------------------------------------------------------------- | CALENDAR |-------------------------------------------------------------------------- */
            calendarDays: [],
            /* |-------------------------------------------------------------------------- | TIME SLOTS |-------------------------------------------------------------------------- */
            availableSlots: [],
            /* |-------------------------------------------------------------------------- | TIMEZONE |-------------------------------------------------------------------------- */
            timezone: '',
            /* |-------------------------------------------------------------------------- | FIXED TIME SLOTS |-------------------------------------------------------------------------- */
            slots: [{
                value: '09:00',
                label: '09:00 AM'
            }, {
                value: '10:00',
                label: '10:00 AM'
            }, {
                value: '11:00',
                label: '11:00 AM'
            }, {
                value: '12:00',
                label: '12:00 PM'
            }, {
                value: '13:00',
                label: '01:00 PM'
            }, {
                value: '14:00',
                label: '02:00 PM'
            }, {
                value: '15:00',
                label: '03:00 PM'
            }, {
                value: '16:00',
                label: '04:00 PM'
            }],
            /* |-------------------------------------------------------------------------- | INIT |-------------------------------------------------------------------------- */
            init() {
                const now = new Date(); /* * Today without time */
                this.today = new Date(now.getFullYear(), now.getMonth(), now
                    .getDate()); /* * Start from current month */
                this.currentMonth = this.today.getMonth();
                this.currentYear = this.today.getFullYear(); /* * Browser timezone */
                this.timezone = Intl.DateTimeFormat().resolvedOptions().timeZone; /* * Generate calendar */
                this.generateCalendar(); /* * Automatically select today */
                this.selectDate({
                    value: this.formatDate(this.today),
                    disabled: false,
                    outsideMonth: false,
                    empty: false
                });
            },
            /* |-------------------------------------------------------------------------- | MONTH NAME |-------------------------------------------------------------------------- */
            get monthName() {
                return new Date(this.currentYear, this.currentMonth, 1).toLocaleString('en-US', {
                    month: 'long'
                });
            },
            /* |-------------------------------------------------------------------------- | GENERATE CALENDAR |-------------------------------------------------------------------------- */
            generateCalendar() {
                /* * First day of current month. * * Sunday = 0 * Monday = 1 * ... */
                const firstDay = new Date(this.currentYear, this.currentMonth, 1)
                    .getDay(); /* * Number of days * in current month. */
                const daysInMonth = new Date(this.currentYear, this.currentMonth + 1, 0)
                    .getDate(); /* * Number of days * previous month. */
                const previousMonthDays = new Date(this.currentYear, this.currentMonth, 0).getDate();
                const
                    days = []; /* |-------------------------------------------------------------------------- | PREVIOUS MONTH DAYS |-------------------------------------------------------------------------- | | Example: | | August starts Saturday. | | Calendar will show: | | 26 27 28 29 30 31 1 | | Previous month dates are visible | but disabled. | */
                for (let i = firstDay - 1; i >= 0; i--) {
                    const date = previousMonthDays - i;
                    const dateObject = new Date(this.currentYear, this.currentMonth - 1, date);
                    days.push({
                        date: date,
                        value: this.formatDate(dateObject),
                        key: `prev-${dateObject.getTime()}`,
                        empty: false,
                        outsideMonth: true,
                        past: true,
                        today: false,
                        selected: false,
                        disabled: true
                    });
                } /* |-------------------------------------------------------------------------- | CURRENT MONTH DATES |-------------------------------------------------------------------------- */
                for (let day = 1; day <= daysInMonth; day++) {
                    const dateObject = new Date(this.currentYear, this.currentMonth, day);
                    const dateString = this.formatDate(dateObject); /* * Is past? */
                    const isPast = dateObject < this.today; /* * Is today? */
                    const isToday = dateObject.getTime() === this.today.getTime(); /* * Is selected? */
                    const isSelected = this.selectedDate === dateString;
                    days.push({
                        date: day,
                        value: dateString,
                        key: `current-${dateString}`,
                        empty: false,
                        outsideMonth: false,
                        past: isPast,
                        today: isToday,
                        selected: isSelected,
                        disabled: isPast
                    });
                } /* |-------------------------------------------------------------------------- | NEXT MONTH DAYS |-------------------------------------------------------------------------- | | Fill remaining calendar cells. | */
                const totalCells = Math.ceil(days.length / 7) * 7;
                const nextDays = totalCells - days.length;
                for (let day = 1; day <= nextDays; day++) {
                    const dateObject = new Date(this.currentYear, this.currentMonth + 1, day);
                    days.push({
                        date: day,
                        value: this.formatDate(dateObject),
                        key: `next-${dateObject.getTime()}`,
                        empty: false,
                        outsideMonth: true,
                        past: false,
                        today: false,
                        selected: false,
                        disabled: true
                    });
                } /* * Set calendar */
                this.calendarDays = days;
            },
            /* |-------------------------------------------------------------------------- | FORMAT DATE |-------------------------------------------------------------------------- */
            formatDate(date) {
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');
                return `${year}-${month}-${day}`;
            },
            /* |-------------------------------------------------------------------------- | CURRENT MONTH |-------------------------------------------------------------------------- */
            isCurrentMonth() {
                return (this.currentYear === this.today.getFullYear() && this.currentMonth === this.today.getMonth());
            },
            /* |-------------------------------------------------------------------------- | PREVIOUS MONTH |-------------------------------------------------------------------------- */
            previousMonth() {
                /* * Never allow user * to go before current month. */
                if (this.isCurrentMonth()) {
                    return;
                }
                this.currentMonth--;
                if (this.currentMonth < 0) {
                    this.currentMonth = 11;
                    this.currentYear--;
                }
                this.generateCalendar();
            },
            /* |-------------------------------------------------------------------------- | NEXT MONTH |-------------------------------------------------------------------------- */
            nextMonth() {
                this.currentMonth++;
                if (this.currentMonth > 11) {
                    this.currentMonth = 0;
                    this.currentYear++;
                }
                this.generateCalendar();
            },
            /* |-------------------------------------------------------------------------- | SELECT DATE |-------------------------------------------------------------------------- */
            selectDate(day) {
                /* * Don't select: * * Previous month * Next month * Past dates */
                if (day.empty || day.disabled || day.outsideMonth) {
                    return;
                } /* * Set date */
                this.selectedDate = day.value; /* * Reset previous time */
                this.selectedTime = null; /* * Generate slots */
                this.generateTimeSlots(); /* * Refresh calendar */
                this.generateCalendar();
            },
            /* |-------------------------------------------------------------------------- | GENERATE TIME SLOTS |-------------------------------------------------------------------------- */
            generateTimeSlots() {
                if (!this.selectedDate) {
                    this.availableSlots = [];
                    return;
                }
                const now = new Date();
                const selectedDate = new Date(`${this.selectedDate}T00:00:00`); /* * Check today */
                const isToday = selectedDate.getFullYear() === now.getFullYear() && selectedDate.getMonth() === now
                    .getMonth() && selectedDate.getDate() === now.getDate(); /* * Fixed slots */
                this.availableSlots = this.slots.map(slot => {
                    let disabled = false; /* * Today: * past time disabled. */
                    if (isToday) {
                        const [hours, minutes] = slot.value.split(':');
                        const slotTime = new Date(now.getFullYear(), now.getMonth(), now.getDate(), Number(
                            hours), Number(minutes), 0); /* * Minimum 30 minute * future booking. */
                        const minimumTime = new Date(now.getTime() + (30 * 60 * 1000));
                        if (slotTime <= minimumTime) {
                            disabled = true;
                        }
                    }
                    return {
                        value: slot.value,
                        label: slot.label,
                        disabled: disabled
                    };
                });
            },
            /* |-------------------------------------------------------------------------- | SELECT TIME |-------------------------------------------------------------------------- */
            selectTime(slot) {
                if (slot.disabled) {
                    return;
                }
                this.selectedTime = slot.value;
            },
            /* |-------------------------------------------------------------------------- | FORMATTED DATE |-------------------------------------------------------------------------- */
            get formattedSelectedDate() {
                if (!this.selectedDate) {
                    return '';
                }
                const date = new Date(`${this.selectedDate}T00:00:00`);
                return date.toLocaleDateString('en-US', {
                    weekday: 'long',
                    month: 'short',
                    day: 'numeric',
                    year: 'numeric'
                });
            },
            /* |-------------------------------------------------------------------------- | FORMATTED TIME |-------------------------------------------------------------------------- */
            get formattedSelectedTime() {
                if (!this.selectedTime) {
                    return '';
                }
                const [hours, minutes] = this.selectedTime.split(':');
                const date = new Date();
                date.setHours(Number(hours), Number(minutes), 0);
                return date.toLocaleTimeString('en-US', {
                    hour: 'numeric',
                    minute: '2-digit'
                });
            },
            /* |-------------------------------------------------------------------------- | SUBMIT |-------------------------------------------------------------------------- */
            submitForm() {
                if (!this.selectedDate) {
                    alert('Please select a date.');
                    return;
                }
                if (!this.selectedTime) {
                    alert('Please select a time slot.');
                    return;
                } /* * Real form submit */
                this.$el.submit();
            }
        };
    }
</script>
