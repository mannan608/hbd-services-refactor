<?php

namespace App\Models\hrm;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Carbon\Exceptions\InvalidDateException;
use Illuminate\Database\Eloquent\Builder;

class Holiday extends Model
{
    protected $fillable = [
        'name',
        'date',
        'end_date',
        'is_multi_day',
        'is_recurring',
        'is_active',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'date'         => 'date',
            'end_date'     => 'date',
            'is_multi_day' => 'boolean',
            'is_recurring' => 'boolean',
            'is_active'    => 'boolean',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Query Scopes
    |--------------------------------------------------------------------------
    */

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeInactive(Builder $query): Builder
    {
        return $query->where('is_active', false);
    }

    public function scopeRecurring(Builder $query): Builder
    {
        return $query->where('is_recurring', true);
    }

    public function scopeOneTime(Builder $query): Builder
    {
        return $query->where('is_recurring', false);
    }

    public function scopeBetween(
        Builder $query,
        Carbon $start,
        Carbon $end
    ): Builder {
        return $query
            ->whereDate('date', '<=', $end->toDateString())
            ->where(function (Builder $query) use ($start) {
                $query
                    ->whereDate('end_date', '>=', $start->toDateString())
                    ->orWhere(function (Builder $query) use ($start) {
                        $query
                            ->whereNull('end_date')
                            ->whereDate('date', '>=', $start->toDateString());
                    });
            });
    }

    public function scopeForYear(
        Builder $query,
        int $year
    ): Builder {
        return $query->whereYear('date', $year);
    }

    /*
    |--------------------------------------------------------------------------
    | Date Helpers
    |--------------------------------------------------------------------------
    */

    public function getYearAttribute(): int
    {
        return $this->date->year;
    }

    public function getMonthAttribute(): int
    {
        return $this->date->month;
    }

    public function getDayAttribute(): int
    {
        return $this->date->day;
    }

    /*
    |--------------------------------------------------------------------------
    | Holiday Date Collection
    |--------------------------------------------------------------------------
    */

    public static function getHolidayDatesInRange(
        Carbon|string $start,
        Carbon|string $end
    ): array {
        $startDate = Carbon::parse($start)->startOfDay();
        $endDate = Carbon::parse($end)->startOfDay();

        if ($startDate->gt($endDate)) {
            throw new \InvalidArgumentException(
                'The start date must be before or equal to the end date.'
            );
        }

        $dates = [];

        // One-time holidays, including multi-day holidays.
        static::query()
            ->active()
            ->oneTime()
            ->between($startDate, $endDate)
            ->get(['date', 'end_date', 'is_multi_day'])
            ->each(function (self $holiday) use (
                &$dates,
                $startDate,
                $endDate
            ) {
                $holidayStart = $holiday->date->copy();
                $holidayEnd = (
                    $holiday->is_multi_day && $holiday->end_date
                )
                    ? $holiday->end_date->copy()
                    : $holidayStart->copy();

                $periodStart = $holidayStart->max($startDate->copy());
                $periodEnd = $holidayEnd->min($endDate->copy());

                foreach (CarbonPeriod::create($periodStart, $periodEnd) as $date) {
                    $dates[] = $date->toDateString();
                }
            });

        // Recurring holidays repeat annually by month and day.
        static::query()
            ->active()
            ->recurring()
            ->get(['date', 'end_date', 'is_multi_day'])
            ->each(function (self $holiday) use (
                &$dates,
                $startDate,
                $endDate
            ) {
                $duration = (
                    $holiday->is_multi_day && $holiday->end_date
                )
                    ? $holiday->date->diffInDays($holiday->end_date)
                    : 0;

                // Include the previous year for holidays spanning New Year.
                for (
                    $year = $startDate->year - 1;
                    $year <= $endDate->year;
                    $year++
                ) {
                    try {
                        $holidayStart = Carbon::createSafe(
                            $year,
                            $holiday->date->month,
                            $holiday->date->day
                        )->startOfDay();
                    } catch (InvalidDateException) {
                        // Skip dates such as February 29 in non-leap years.
                        continue;
                    }

                    $holidayEnd = $holidayStart->copy()->addDays($duration);

                    if (
                        $holidayEnd->lt($startDate) ||
                        $holidayStart->gt($endDate)
                    ) {
                        continue;
                    }

                    $periodStart = $holidayStart->max($startDate->copy());
                    $periodEnd = $holidayEnd->min($endDate->copy());

                    foreach (
                        CarbonPeriod::create($periodStart, $periodEnd) as $date
                    ) {
                        $dates[] = $date->toDateString();
                    }
                }
            });

        $dates = array_values(array_unique($dates));

        sort($dates);

        return $dates;
    }
}