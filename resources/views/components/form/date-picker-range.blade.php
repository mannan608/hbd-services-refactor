@props([
    'startName' => 'start_date',
    'endName' => 'end_date',
    'startValue' => '',
    'endValue' => '',
    'label' => '',
    'placeholder' => 'Select date range',
])

<div
    x-data="dateRangePicker({
        startDate: @js($startValue),
        endDate: @js($endValue),
    })"
    x-init="init()"
    class="relative w-full"
>
    @if($label)
        <label class="block text-xs font-semibold text-slate-700 mb-1.5">
            {{ $label }}
        </label>
    @endif

    {{-- Trigger --}}
    <button
        type="button"
        @click="openPicker()"
        class="flex items-center justify-between w-full px-4 py-2.5 text-sm text-left bg-white border border-neutral-300 rounded-lg hover:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-100 focus:border-brand-500"
    >
        <div class="flex items-center min-w-0 gap-1">

            {{-- Calendar Icon --}}
            <svg
                class="flex-shrink-0 w-4 h-4 text-neutral-400"
                fill="none"
                viewBox="0 0 24 24"
            >
                <path
                    d="M7 3v3M17 3v3M4.5 9.5h15M6 5h12a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z"
                    stroke="currentColor"
                    stroke-width="1.5"
                    stroke-linecap="round"
                />
            </svg>

            <span
                class="truncate"
                :class="hasRange ? 'text-neutral-900' : 'text-neutral-400'"
                x-text="rangeLabel"
            ></span>
        </div>

        <svg
            class="flex-shrink-0 w-4 h-4 ml-3 text-neutral-400"
            fill="none"
            viewBox="0 0 24 24"
        >
            <path
                d="m6 9 6 6 6-6"
                stroke="currentColor"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
            />
        </svg>
    </button>


    {{-- Hidden Laravel inputs --}}
    <input
        type="hidden"
        name="{{ $startName }}"
        :value="startDate"
    >

    <input
        type="hidden"
        name="{{ $endName }}"
        :value="endDate"
    >


    {{-- Picker --}}
    <div
        x-cloak
        x-show="open"
        x-transition.opacity
        @click.outside="close()"
        class="absolute z-50 mt-2 bg-white border border-neutral-200 shadow-xl rounded-xl"
        style="width: 760px; max-width: calc(100vw - 2rem);"
    >

        <div class="flex">

            {{-- Presets --}}
            <div class="w-40 py-5 border-r border-neutral-100">

                <div class="px-5 mb-3 text-[11px] font-semibold tracking-wider text-neutral-400 uppercase">
                    Quick select
                </div>

                <div class="space-y-0.5">

                    <template
                        x-for="preset in presets"
                        :key="preset"
                    >
                        <button
                            type="button"
                            @click="selectPreset(preset)"
                            class="w-full px-5 py-2 text-xs text-left transition"
                            :class="activePreset === preset
                                ? 'bg-brand-50 text-brand-600 font-semibold'
                                : 'text-neutral-600 hover:bg-neutral-50 hover:text-brand-600'"
                            x-text="preset"
                        ></button>
                    </template>

                </div>

            </div>


            {{-- Calendar Area --}}
            <div class="flex-1 min-w-0">

                <div class="px-5 pt-5">

                    {{-- Months --}}
                    <div class="flex divide-x divide-neutral-100">

                        {{-- LEFT MONTH --}}
                        <div class="w-1/2 pr-5">

                            {{-- Header --}}
                            <div class="relative flex items-center justify-between mb-3">

                                <button
                                    type="button"
                                    @click="previousMonth()"
                                    class="flex items-center justify-center w-8 h-8 rounded-lg hover:bg-neutral-100"
                                >
                                    <svg
                                        class="w-5 h-5 text-neutral-700"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="m14.5 7-5 5 5 5"
                                            stroke="currentColor"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                </button>


                                {{-- Month / Year --}}
                                <button
                                    type="button"
                                    @click="openLeftMonthPicker()"
                                    class="px-3 py-1.5 text-sm font-semibold rounded-lg hover:bg-neutral-50"
                                >
                                    <span x-text="monthNames[leftMonth]"></span>
                                    <span x-text="leftYear"></span>
                                </button>


                                <button
                                    type="button"
                                    @click="nextMonth()"
                                    class="flex items-center justify-center w-8 h-8 rounded-lg hover:bg-neutral-100"
                                >
                                    <svg
                                        class="w-5 h-5 text-neutral-700"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="m9.5 7 5 5-5 5"
                                            stroke="currentColor"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                </button>


                                {{-- Month Picker --}}
                                <div
                                    x-cloak
                                    x-show="showLeftMonthPicker"
                                    @click.outside="showLeftMonthPicker = false"
                                    class="absolute left-0 right-0 z-20 p-4 bg-white border border-neutral-200 rounded-xl shadow-lg top-11"
                                >

                                    <div class="grid grid-cols-3 gap-1">

                                        <template
                                            x-for="(month, index) in monthNames"
                                            :key="month"
                                        >
                                            <button
                                                type="button"
                                                @click="selectLeftMonth(index)"
                                                class="px-2 py-2 text-xs rounded-lg hover:bg-brand-50 hover:text-brand-600"
                                                :class="leftMonth === index
                                                    ? 'bg-brand-50 text-brand-600 font-semibold'
                                                    : 'text-neutral-600'"
                                                x-text="month.substring(0, 3)"
                                            ></button>
                                        </template>

                                    </div>

                                    <div class="flex items-center justify-between pt-3 mt-3 border-t border-neutral-100">

                                        <button
                                            type="button"
                                            @click="previousYears()"
                                            class="px-2 py-1 text-xs text-neutral-500 hover:text-brand-600"
                                        >
                                            ←
                                        </button>

                                        <div class="grid grid-cols-4 gap-1">
                                            <template
                                                x-for="year in years"
                                                :key="year"
                                            >
                                                <button
                                                    type="button"
                                                    @click="selectLeftYear(year)"
                                                    class="px-2 py-1 text-xs rounded hover:bg-brand-50 hover:text-brand-600"
                                                    :class="leftYear === year
                                                        ? 'bg-brand-50 text-brand-600 font-semibold'
                                                        : ''"
                                                    x-text="year"
                                                ></button>
                                            </template>
                                        </div>

                                        <button
                                            type="button"
                                            @click="nextYears()"
                                            class="px-2 py-1 text-xs text-neutral-500 hover:text-brand-600"
                                        >
                                            →
                                        </button>

                                    </div>

                                </div>

                            </div>


                            {{-- Week --}}
                            <div class="grid grid-cols-7 mb-1">

                                <template
                                    x-for="day in weekDays"
                                    :key="day"
                                >
                                    <div
                                        class="flex items-center justify-center h-8 text-[11px] font-semibold text-neutral-400"
                                        x-text="day"
                                    ></div>
                                </template>

                            </div>


                            {{-- Days --}}
                            <div class="grid grid-cols-7">

                                <template
                                    x-for="(day, index) in getCalendarDays(leftYear, leftMonth)"
                                    :key="'left-' + index"
                                >
                                    <button
                                        type="button"
                                        @click="selectDate(day.date)"
                                        class="relative flex items-center justify-center w-full h-9 text-xs transition"
                                        :class="dayClasses(day)"
                                        x-text="day.day"
                                    ></button>
                                </template>

                            </div>

                        </div>


                        {{-- RIGHT MONTH --}}
                        <div class="w-1/2 pl-5">

                            <div class="relative flex items-center justify-between mb-3">

                                <button
                                    type="button"
                                    @click="previousMonth()"
                                    class="flex items-center justify-center w-8 h-8 rounded-lg hover:bg-neutral-100"
                                >
                                    <svg
                                        class="w-5 h-5 text-neutral-700"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="m14.5 7-5 5 5 5"
                                            stroke="currentColor"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                </button>


                                <button
                                    type="button"
                                    @click="openRightMonthPicker()"
                                    class="px-3 py-1.5 text-sm font-semibold rounded-lg hover:bg-neutral-50"
                                >
                                    <span x-text="monthNames[rightMonth]"></span>
                                    <span x-text="rightYear"></span>
                                </button>


                                <button
                                    type="button"
                                    @click="nextMonth()"
                                    class="flex items-center justify-center w-8 h-8 rounded-lg hover:bg-neutral-100"
                                >
                                    <svg
                                        class="w-5 h-5 text-neutral-700"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="m9.5 7 5 5-5 5"
                                            stroke="currentColor"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                </button>


                                {{-- Right Month Picker --}}
                                <div
                                    x-cloak
                                    x-show="showRightMonthPicker"
                                    @click.outside="showRightMonthPicker = false"
                                    class="absolute right-0 z-20 p-4 bg-white border border-neutral-200 rounded-xl shadow-lg top-11"
                                    style="width: 230px;"
                                >

                                    <div class="grid grid-cols-3 gap-1">

                                        <template
                                            x-for="(month, index) in monthNames"
                                            :key="month"
                                        >
                                            <button
                                                type="button"
                                                @click="selectRightMonth(index)"
                                                class="px-2 py-2 text-xs rounded-lg hover:bg-brand-50 hover:text-brand-600"
                                                :class="rightMonth === index
                                                    ? 'bg-brand-50 text-brand-600 font-semibold'
                                                    : 'text-neutral-600'"
                                                x-text="month.substring(0, 3)"
                                            ></button>
                                        </template>

                                    </div>

                                    <div class="flex items-center justify-between pt-3 mt-3 border-t border-neutral-100">

                                        <button
                                            type="button"
                                            @click="previousYears()"
                                            class="px-2 py-1 text-xs text-neutral-500 hover:text-brand-600"
                                        >
                                            ←
                                        </button>

                                        <div class="grid grid-cols-4 gap-1">

                                            <template
                                                x-for="year in years"
                                                :key="year"
                                            >
                                                <button
                                                    type="button"
                                                    @click="selectRightYear(year)"
                                                    class="px-2 py-1 text-xs rounded hover:bg-brand-50 hover:text-brand-600"
                                                    :class="rightYear === year
                                                        ? 'bg-brand-50 text-brand-600 font-semibold'
                                                        : ''"
                                                    x-text="year"
                                                ></button>
                                            </template>

                                        </div>

                                        <button
                                            type="button"
                                            @click="nextYears()"
                                            class="px-2 py-1 text-xs text-neutral-500 hover:text-brand-600"
                                        >
                                            →
                                        </button>

                                    </div>

                                </div>

                            </div>


                            <div class="grid grid-cols-7 mb-1">

                                <template
                                    x-for="day in weekDays"
                                    :key="day"
                                >
                                    <div
                                        class="flex items-center justify-center h-8 text-[11px] font-semibold text-neutral-400"
                                        x-text="day"
                                    ></div>
                                </template>

                            </div>


                            <div class="grid grid-cols-7">

                                <template
                                    x-for="(day, index) in getCalendarDays(rightYear, rightMonth)"
                                    :key="'right-' + index"
                                >
                                    <button
                                        type="button"
                                        @click="selectDate(day.date)"
                                        class="relative flex items-center justify-center w-full h-9 text-xs transition"
                                        :class="dayClasses(day)"
                                        x-text="day.day"
                                    ></button>
                                </template>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- Footer --}}
                <div class="px-5 py-4 mt-5 border-t border-neutral-100">

                    <div class="flex items-start justify-between gap-4">

                        {{-- Inputs --}}
                        <div class="flex items-start gap-2">

                            {{-- Start --}}
                            <div>

                                <div class="mb-1 text-[10px] font-semibold tracking-wider text-neutral-400 uppercase">
                                    Start date
                                </div>

                                <input
                                    type="text"
                                    x-model="inputStart"
                                    @focus="focusStart()"
                                    @keydown.enter.prevent="handleStartInput()"
                                    @blur="handleStartInput()"
                                    placeholder="DD / MM / YYYY"
                                    class="w-36 px-3 py-2 text-sm placeholder:text-sm text-neutral-800 bg-white border rounded-lg outline-none"
                                    :class="startError
                                        ? 'border-red-400 focus:ring-2 focus:ring-red-100'
                                        : activeField === 'start'
                                            ? 'border-brand-500 ring-2 ring-brand-100'
                                            : 'border-neutral-300 focus:border-brand-500 focus:ring-2 focus:ring-brand-100'"
                                >

                                <p
                                    x-show="startError"
                                    x-text="startError"
                                    class="mt-1 text-[10px] text-red-500"
                                ></p>

                            </div>


                            <div class="pt-7 text-neutral-400">
                                →
                            </div>


                            {{-- End --}}
                            <div>

                                <div class="mb-1 text-[10px] font-semibold tracking-wider text-neutral-400 uppercase">
                                    End date
                                </div>

                                <input
                                    type="text"
                                    x-model="inputEnd"
                                    @focus="focusEnd()"
                                    @keydown.enter.prevent="handleEndInput()"
                                    @blur="handleEndInput()"
                                    placeholder="DD / MM / YYYY"
                                    class="w-36 px-3 py-2 text-sm placeholder:text-sm text-neutral-800 bg-white border rounded-lg outline-none"
                                    :class="endError
                                        ? 'border-red-400 focus:ring-2 focus:ring-red-100'
                                        : activeField === 'end'
                                            ? 'border-brand-500 ring-2 ring-brand-100'
                                            : 'border-neutral-300 focus:border-brand-500 focus:ring-2 focus:ring-brand-100'"
                                >

                                <p
                                    x-show="endError"
                                    x-text="endError"
                                    class="mt-1 text-[10px] text-red-500"
                                ></p>

                            </div>

                        </div>


                        {{-- Buttons --}}
                        <div class="flex items-center gap-2 pt-5">

                            <button
                                type="button"
                                @click="clear()"
                                class="px-3 py-2 text-xs text-neutral-600 rounded-lg hover:bg-neutral-50"
                            >
                                Clear
                            </button>

                            <button
                                type="button"
                                @click="cancel()"
                                class="px-4 py-2 text-xs text-neutral-700 bg-neutral-50 rounded-lg hover:bg-neutral-100"
                            >
                                Cancel
                            </button>

                            <button
                                type="button"
                                @click="apply()"
                                class="px-4 py-2 text-xs font-medium text-white rounded-lg bg-brand-600 hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-brand-200"
                            >
                                Apply
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>