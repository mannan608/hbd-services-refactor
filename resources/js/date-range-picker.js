
export default function dateRangePicker(config = {}) {
    return {
        open: false,

        startDate: config.startDate || '',
        endDate: config.endDate || '',

        draftStartDate: '',
        draftEndDate: '',

        activeField: 'start',

        inputStart: '',
        inputEnd: '',

        startError: '',
        endError: '',

        activePreset: '',

        // Calendar month/year
        leftMonth: null,
        leftYear: null,

        rightMonth: null,
        rightYear: null,

        showLeftMonthPicker: false,
        showRightMonthPicker: false,

        yearRangeStart: null,

        weekDays: [
            'Mo',
            'Tu',
            'We',
            'Th',
            'Fr',
            'Sa',
            'Su',
        ],

        monthNames: [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December',
        ],

        presets: [
            'Last 7 days',
            'This Month',
            'Last 3 months',
            'Last 6 months',
            'This Year',
        ],

        init() {
            const today = this.today();

            this.leftMonth = today.month;
            this.leftYear = today.year;

            const next = this.addMonths(
                today.year,
                today.month,
                1
            );

            this.rightMonth = next.month;
            this.rightYear = next.year;

            this.yearRangeStart =
                today.year - 5;

            this.syncInputs();

            // Escape key
            this.escapeHandler = (event) => {
                if (event.key === 'Escape' && this.open) {
                    this.close();
                }
            };

            document.addEventListener(
                'keydown',
                this.escapeHandler
            );
        },

        destroy() {
            if (this.escapeHandler) {
                document.removeEventListener(
                    'keydown',
                    this.escapeHandler
                );
            }
        },

        /*
        |--------------------------------------------------------------------------
        | Basic date helpers
        |--------------------------------------------------------------------------
        */

        pad(value) {
            return String(value).padStart(2, '0');
        },

        today() {
            const now = new Date();

            return {
                year: now.getFullYear(),
                month: now.getMonth(),
                day: now.getDate(),
            };
        },

        daysInMonth(year, month) {
            return new Date(
                year,
                month + 1,
                0
            ).getDate();
        },

        dateToString(year, month, day) {
            return `${year}-${this.pad(month + 1)}-${this.pad(day)}`;
        },

        parseDateString(value) {
            if (!value) {
                return null;
            }

            const match = value.match(
                /^(\d{4})-(\d{2})-(\d{2})$/
            );

            if (!match) {
                return null;
            }

            const year = Number(match[1]);
            const month = Number(match[2]);
            const day = Number(match[3]);

            if (
                month < 1 ||
                month > 12
            ) {
                return null;
            }

            const maxDay = this.daysInMonth(
                year,
                month - 1
            );

            if (
                day < 1 ||
                day > maxDay
            ) {
                return null;
            }

            return {
                year,
                month: month - 1,
                day,
                value: this.dateToString(
                    year,
                    month - 1,
                    day
                ),
            };
        },

        compareDates(first, second) {
            if (first === second) {
                return 0;
            }

            return first < second ? -1 : 1;
        },

        addDays(dateString, amount) {
            const date = this.parseDateString(dateString);

            if (!date) {
                return '';
            }

            const result = new Date(
                date.year,
                date.month,
                date.day
            );

            result.setDate(
                result.getDate() + amount
            );

            return this.dateToString(
                result.getFullYear(),
                result.getMonth(),
                result.getDate()
            );
        },

        addMonths(year, month, amount) {
            const date = new Date(
                year,
                month + amount,
                1
            );

            return {
                year: date.getFullYear(),
                month: date.getMonth(),
            };
        },

        /*
        |--------------------------------------------------------------------------
        | Open / Close
        |--------------------------------------------------------------------------
        */

        openPicker() {
            this.open = true;

            this.draftStartDate =
                this.startDate || '';

            this.draftEndDate =
                this.endDate || '';

            this.activeField =
                this.draftStartDate
                    ? 'end'
                    : 'start';

            this.syncInputs();

            this.startError = '';
            this.endError = '';
            this.activePreset = '';

            this.setCalendarFromSelection();
        },

        close() {
            this.open = false;

            this.showLeftMonthPicker = false;
            this.showRightMonthPicker = false;

            this.startError = '';
            this.endError = '';
        },

        cancel() {
            this.draftStartDate =
                this.startDate || '';

            this.draftEndDate =
                this.endDate || '';

            this.syncInputs();

            this.close();
        },

        /*
        |--------------------------------------------------------------------------
        | Calendar positioning
        |--------------------------------------------------------------------------
        */

        setCalendarFromSelection() {
            let base = this.draftStartDate;

            if (!base) {
                base = this.draftEndDate;
            }

            if (!base) {
                const today = this.today();

                this.leftMonth =
                    today.month;

                this.leftYear =
                    today.year;
            } else {
                const parsed =
                    this.parseDateString(base);

                if (parsed) {
                    this.leftMonth =
                        parsed.month;

                    this.leftYear =
                        parsed.year;

                    // Keep the year selector centered on the displayed range.
                    this.yearRangeStart =
                        parsed.year - 5;
                }
            }

            const next = this.addMonths(
                this.leftYear,
                this.leftMonth,
                1
            );

            this.rightMonth = next.month;
            this.rightYear = next.year;
        },

        previousMonth() {
            const previous =
                this.addMonths(
                    this.leftYear,
                    this.leftMonth,
                    -1
                );

            this.leftMonth =
                previous.month;

            this.leftYear =
                previous.year;

            const next = this.addMonths(
                this.leftYear,
                this.leftMonth,
                1
            );

            this.rightMonth =
                next.month;

            this.rightYear =
                next.year;
        },

        nextMonth() {
            const next =
                this.addMonths(
                    this.leftYear,
                    this.leftMonth,
                    1
                );

            this.leftMonth =
                next.month;

            this.leftYear =
                next.year;

            const nextNext = this.addMonths(
                this.leftYear,
                this.leftMonth,
                1
            );

            this.rightMonth =
                nextNext.month;

            this.rightYear =
                nextNext.year;
        },

        /*
        |--------------------------------------------------------------------------
        | Month / Year picker
        |--------------------------------------------------------------------------
        */

        openLeftMonthPicker() {
            this.showRightMonthPicker = false;

            this.showLeftMonthPicker =
                !this.showLeftMonthPicker;
        },

        openRightMonthPicker() {
            this.showLeftMonthPicker = false;

            this.showRightMonthPicker =
                !this.showRightMonthPicker;
        },

        selectLeftMonth(month) {
            this.leftMonth = month;

            const next = this.addMonths(
                this.leftYear,
                this.leftMonth,
                1
            );

            this.rightMonth =
                next.month;

            this.rightYear =
                next.year;

            this.showLeftMonthPicker =
                false;
        },

        selectRightMonth(month) {
            this.rightMonth = month;

            const previous = this.addMonths(
                this.rightYear,
                this.rightMonth,
                -1
            );

            this.leftMonth =
                previous.month;

            this.leftYear =
                previous.year;

            this.showRightMonthPicker =
                false;
        },

        selectLeftYear(year) {
            this.leftYear = year;

            const next = this.addMonths(
                this.leftYear,
                this.leftMonth,
                1
            );

            this.rightMonth =
                next.month;

            this.rightYear =
                next.year;
        },

        selectRightYear(year) {
            this.rightYear = year;

            const previous = this.addMonths(
                this.rightYear,
                this.rightMonth,
                -1
            );

            this.leftMonth =
                previous.month;

            this.leftYear =
                previous.year;
        },

        previousYears() {
            this.yearRangeStart -= 12;
        },

        nextYears() {
            this.yearRangeStart += 12;
        },

        get years() {
            return Array.from(
                { length: 12 },
                (_, index) =>
                    this.yearRangeStart + index
            );
        },

        /*
        |--------------------------------------------------------------------------
        | Calendar days
        |--------------------------------------------------------------------------
        */

        getCalendarDays(year, month) {
            const days = [];

            const firstDay = new Date(
                year,
                month,
                1
            );

            /*
             * JS:
             * Sunday = 0
             *
             * Convert to:
             * Monday = 0
             */
            let firstWeekDay =
                firstDay.getDay();

            firstWeekDay =
                firstWeekDay === 0
                    ? 6
                    : firstWeekDay - 1;

            /*
             * Previous month
             */
            const previousMonthDays =
                this.daysInMonth(
                    year,
                    month - 1
                );

            for (
                let i = firstWeekDay - 1;
                i >= 0;
                i--
            ) {
                const day =
                    previousMonthDays - i;

                const previous =
                    new Date(
                        year,
                        month - 1,
                        day
                    );

                days.push(
                    this.makeCalendarDay(
                        previous,
                        false
                    )
                );
            }

            /*
             * Current month
             */
            const totalDays =
                this.daysInMonth(
                    year,
                    month
                );

            for (
                let day = 1;
                day <= totalDays;
                day++
            ) {
                const date =
                    new Date(
                        year,
                        month,
                        day
                    );

                days.push(
                    this.makeCalendarDay(
                        date,
                        true
                    )
                );
            }

            /*
             * Next month
             *
             * Keep exactly 42 cells.
             */
            let nextDay = 1;

            while (days.length < 42) {
                const date =
                    new Date(
                        year,
                        month + 1,
                        nextDay
                    );

                days.push(
                    this.makeCalendarDay(
                        date,
                        false
                    )
                );

                nextDay++;
            }

            return days;
        },

        makeCalendarDay(date, currentMonth) {
            return {
                day: date.getDate(),

                date: this.dateToString(
                    date.getFullYear(),
                    date.getMonth(),
                    date.getDate()
                ),

                currentMonth,

                today:
                    this.dateToString(
                        date.getFullYear(),
                        date.getMonth(),
                        date.getDate()
                    ) ===
                    this.dateToString(
                        this.today().year,
                        this.today().month,
                        this.today().day
                    ),
            };
        },

        /*
        |--------------------------------------------------------------------------
        | Date selection
        |--------------------------------------------------------------------------
        */

        selectDate(date) {
            this.activePreset = '';

            /*
             * Start selection
             */
            if (
                this.activeField === 'start' ||
                !this.draftStartDate ||
                (
                    this.draftStartDate &&
                    this.draftEndDate
                )
            ) {
                this.draftStartDate = date;
                this.draftEndDate = '';

                this.inputStart =
                    this.formatDisplay(date);

                this.inputEnd = '';

                this.activeField = 'end';

                this.startError = '';
                this.endError = '';

                return;
            }

            /*
             * End selection
             */
            if (
                this.activeField === 'end'
            ) {
                if (
                    this.compareDates(
                        date,
                        this.draftStartDate
                    ) < 0
                ) {
                    /*
                     * User selected end
                     * before start.
                     *
                     * Automatically swap.
                     */
                    this.draftEndDate =
                        this.draftStartDate;

                    this.draftStartDate =
                        date;
                } else {
                    this.draftEndDate =
                        date;
                }

                this.syncInputs();

                this.activeField =
                    'start';

                this.validateDates();
            }
        },

        /*
        |--------------------------------------------------------------------------
        | Input handling
        |--------------------------------------------------------------------------
        */

        focusStart() {
            this.activeField = 'start';
            this.startError = '';
        },

        focusEnd() {
            this.activeField = 'end';
            this.endError = '';
        },

        parseUserInput(value) {
            value = value.trim();

            if (!value) {
                return null;
            }

            let day;
            let month;
            let year;

            /*
             * YYYY-MM-DD
             */
            let match = value.match(
                /^(\d{4})[-/.](\d{1,2})[-/.](\d{1,2})$/
            );

            if (match) {
                year = Number(match[1]);
                month = Number(match[2]);
                day = Number(match[3]);
            } else {

                /*
                 * DD/MM/YYYY
                 * DD-MM-YYYY
                 * DD.MM.YYYY
                 */
                match = value.match(
                    /^(\d{1,2})[-/.](\d{1,2})[-/.](\d{4})$/
                );

                if (!match) {
                    return null;
                }

                day = Number(match[1]);
                month = Number(match[2]);
                year = Number(match[3]);
            }

            if (
                year < 1000 ||
                year > 9999
            ) {
                return null;
            }

            if (
                month < 1 ||
                month > 12
            ) {
                return null;
            }

            const maxDay =
                this.daysInMonth(
                    year,
                    month - 1
                );

            if (
                day < 1 ||
                day > maxDay
            ) {
                return null;
            }

            return this.dateToString(
                year,
                month - 1,
                day
            );
        },

        handleStartInput() {
            this.startError = '';

            const value =
                this.inputStart.trim();

            if (!value) {
                this.draftStartDate = '';
                return;
            }

            const parsed =
                this.parseUserInput(value);

            if (!parsed) {
                this.startError =
                    'Please enter a valid date.';

                return;
            }

            this.draftStartDate =
                parsed;

            this.inputStart =
                this.formatDisplay(parsed);

            this.activeField = 'end';

            this.setCalendarFromSelection();

            this.validateDates();
        },

        handleEndInput() {
            this.endError = '';

            const value =
                this.inputEnd.trim();

            if (!value) {
                this.draftEndDate = '';
                return;
            }

            const parsed =
                this.parseUserInput(value);

            if (!parsed) {
                this.endError =
                    'Please enter a valid date.';

                return;
            }

            this.draftEndDate =
                parsed;

            this.inputEnd =
                this.formatDisplay(parsed);

            this.activeField = 'start';

            this.setCalendarFromSelection();

            this.validateDates();
        },

        /*
        |--------------------------------------------------------------------------
        | Validation
        |--------------------------------------------------------------------------
        */

        validateDates() {
            this.startError = '';
            this.endError = '';

            if (
                this.draftStartDate &&
                !this.parseDateString(
                    this.draftStartDate
                )
            ) {
                this.startError =
                    'Please enter a valid date.';

                return false;
            }

            if (
                this.draftEndDate &&
                !this.parseDateString(
                    this.draftEndDate
                )
            ) {
                this.endError =
                    'Please enter a valid date.';

                return false;
            }

            if (
                this.draftStartDate &&
                this.draftEndDate &&
                this.compareDates(
                    this.draftStartDate,
                    this.draftEndDate
                ) > 0
            ) {
                this.endError =
                    'End date must be after start date.';

                return false;
            }

            return true;
        },

        /*
        |--------------------------------------------------------------------------
        | Display
        |--------------------------------------------------------------------------
        */

        formatDisplay(dateString) {
            const date =
                this.parseDateString(
                    dateString
                );

            if (!date) {
                return '';
            }

            return `${this.pad(date.day)} / ${this.pad(date.month + 1)} / ${date.year}`;
        },

        syncInputs() {
            this.inputStart =
                this.formatDisplay(
                    this.draftStartDate
                );

            this.inputEnd =
                this.formatDisplay(
                    this.draftEndDate
                );
        },

        /*
        |--------------------------------------------------------------------------
        | Range state
        |--------------------------------------------------------------------------
        */

        isStart(date) {
            return (
                !!this.draftStartDate &&
                date === this.draftStartDate
            );
        },

        isEnd(date) {
            return (
                !!this.draftEndDate &&
                date === this.draftEndDate
            );
        },

        isInRange(date) {
            if (
                !this.draftStartDate ||
                !this.draftEndDate
            ) {
                return false;
            }

            return (
                this.compareDates(
                    date,
                    this.draftStartDate
                ) >= 0 &&
                this.compareDates(
                    date,
                    this.draftEndDate
                ) <= 0
            );
        },

        /*
        |--------------------------------------------------------------------------
        | Calendar classes
        |--------------------------------------------------------------------------
        */

        dayClasses(day) {
            const classes = [];

            if (!day.currentMonth) {
                classes.push(
                    'text-neutral-300'
                );

                return classes.join(' ');
            }

            if (this.isStart(day.date)) {
                classes.push(
                    this.isEnd(day.date)
                        ? 'bg-brand-600 text-white rounded-lg'
                        : 'bg-brand-600 text-white rounded-l-lg'
                );

                return classes.join(' ');
            }

            if (this.isEnd(day.date)) {
                classes.push(
                    'bg-brand-600 text-white rounded-r-lg'
                );

                return classes.join(' ');
            }

            if (this.isInRange(day.date)) {
                classes.push(
                    'bg-brand-50 text-brand-600 rounded-none'
                );
            } else {
                classes.push(
                    'text-neutral-700 hover:bg-neutral-50'
                );
            }

            if (
                day.today &&
                !this.isInRange(day.date)
            ) {
                classes.push(
                    'font-semibold ring-1 ring-brand-200'
                );
            }

            return classes.join(' ');
        },

        /*
        |--------------------------------------------------------------------------
        | Presets
        |--------------------------------------------------------------------------
        */

        selectPreset(preset) {
            const today = this.today();

            let start = '';
            let end =
                this.dateToString(
                    today.year,
                    today.month,
                    today.day
                );

            switch (preset) {

                case 'Last 7 days':
                    start =
                        this.addDays(
                            end,
                            -6
                        );
                    break;

                case 'This Month':
                    start =
                        this.dateToString(
                            today.year,
                            today.month,
                            1
                        );

                    end =
                        this.dateToString(
                            today.year,
                            today.month,
                            this.daysInMonth(
                                today.year,
                                today.month
                            )
                        );
                    break;

                case 'Last 3 months':
                    {
                        const first =
                            this.addMonths(
                                today.year,
                                today.month,
                                -2
                            );

                        start =
                            this.dateToString(
                                first.year,
                                first.month,
                                1
                            );
                    }
                    break;

                case 'Last 6 months':
                    {
                        const first =
                            this.addMonths(
                                today.year,
                                today.month,
                                -5
                            );

                        start =
                            this.dateToString(
                                first.year,
                                first.month,
                                1
                            );
                    }
                    break;

                case 'This Year':
                    start =
                        this.dateToString(
                            today.year,
                            0,
                            1
                        );

                    end =
                        this.dateToString(
                            today.year,
                            11,
                            31
                        );
                    break;
            }

            this.draftStartDate = start;
            this.draftEndDate = end;

            this.activePreset = preset;

            this.syncInputs();

            this.setCalendarFromSelection();

            this.activeField = 'start';
        },

        /*
        |--------------------------------------------------------------------------
        | Apply
        |--------------------------------------------------------------------------
        */

        apply() {
            /*
             * Validate inputs first.
             */
            if (
                this.inputStart &&
                this.inputStart !==
                    this.formatDisplay(
                        this.draftStartDate
                    )
            ) {
                const parsed =
                    this.parseUserInput(
                        this.inputStart
                    );

                if (!parsed) {
                    this.startError =
                        'Please enter a valid date.';

                    return;
                }

                this.draftStartDate =
                    parsed;
            }

            if (
                this.inputEnd &&
                this.inputEnd !==
                    this.formatDisplay(
                        this.draftEndDate
                    )
            ) {
                const parsed =
                    this.parseUserInput(
                        this.inputEnd
                    );

                if (!parsed) {
                    this.endError =
                        'Please enter a valid date.';

                    return;
                }

                this.draftEndDate =
                    parsed;
            }

            /*
             * Both dates are required.
             */
            if (!this.draftStartDate) {
                this.startError =
                    'Please select a start date.';

                return;
            }

            if (!this.draftEndDate) {
                this.endError =
                    'Please select an end date.';

                return;
            }

            /*
             * Automatic swap.
             */
            if (
                this.compareDates(
                    this.draftStartDate,
                    this.draftEndDate
                ) > 0
            ) {
                const temp =
                    this.draftStartDate;

                this.draftStartDate =
                    this.draftEndDate;

                this.draftEndDate =
                    temp;
            }

            if (!this.validateDates()) {
                return;
            }

            /*
             * Commit.
             */
            this.startDate =
                this.draftStartDate;

            this.endDate =
                this.draftEndDate;

            this.syncInputs();

            this.open = false;
        },

        clear() {
            this.startDate = '';
            this.endDate = '';

            this.draftStartDate = '';
            this.draftEndDate = '';

            this.inputStart = '';
            this.inputEnd = '';

            this.activePreset = '';
            this.activeField = 'start';

            this.startError = '';
            this.endError = '';
        },

        /*
        |--------------------------------------------------------------------------
        | Useful computed values
        |--------------------------------------------------------------------------
        */

        get hasRange() {
            return (
                !!this.draftStartDate &&
                !!this.draftEndDate
            );
        },

        get rangeLabel() {
            if (
                !this.startDate ||
                !this.endDate
            ) {
                return 'Select date range';
            }

            return `${this.formatDisplay(this.startDate)} — ${this.formatDisplay(this.endDate)}`;
        },
    };
}
