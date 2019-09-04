<?php

namespace OFFLINE\OpeningHours\Classes;

use Carbon\Carbon;;
use Illuminate\Support\Collection;

trait DateUtils
{
    /**
     * Returns the time part of a date string.
     *
     * @param string $input
     *
     * @return string
     */
    public static function getTime(string $input): string
    {
        $parts = explode(' ', $input);
        $hours = $parts[count($parts) - 1];

        return substr($hours, 0, 5);
    }

    /**
     * Returns an array of all weekdays. Starting with Monday or Sunday
     * depending on Carbon's locale settings.
     *
     * @return array
     */
    public function getWeekdayOptions(): array
    {
        $values = self::getWeekdays();

        // For those that look at a week the right way...
        if (Carbon::now()->getWeekStartsAt() === Carbon::MONDAY) {
            unset($values[0]);
            $values += [0 => 'sunday'];
        }

        return collect($values)->mapWithKeys(function ($key, $value) {
            return [$value => trans('offline.openinghours::lang.weekdays.' . $value)];
        })->toArray();
    }

    /**
     * Return all weekdays as lowercase keys.
     *
     * @return array
     */
    public static function getWeekdays(): array
    {
        return [
            'sunday',
            'monday',
            'tuesday',
            'wednesday',
            'thursday',
            'friday',
            'saturday',
        ];
    }

    /**
     * Return all opening hours as a single string.
     *
     * @return string
     */
    public function getHoursStringAttribute(): string
    {
        return collect($this->hours)->map(function ($hours) {
            return static::getTime($hours['from']) . '&ndash;' . static::getTime($hours['to']);
        })->implode(', ');
    }

    /**
     * Reformat a [[from, to]] array to a ["from-to"] array.
     *
     * @param array $values
     *
     * @return array
     */
    public function toTimeRange(array $values): array
    {
        return collect($values)->map(function ($values) {
            return static::getTime($values['from']) . '-' . static::getTime($values['to']);
        })->toArray();
    }

    /**
     * Returns a carbon instance from a Y-m-d string.
     *
     * @param string $date
     *
     * @return Carbon
     */
    public function toCarbon(string $date): Carbon
    {
        return Carbon::createFromFormat('Y-m-d', $date);
    }

    /**
     * Return a Carbon instance of an exception date.
     *
     * If the date has no year and is in the past, intelligently return
     * the date for the next year.
     *
     * @param string $carbon
     *
     * @return Carbon
     */
    public function handleYearlyDate(string $date): Carbon
    {
        // This is a date that has a fixed year set.
        if (strlen($date) > 5) {
            return Carbon::createFromFormat('Y-m-d', $date);
        }

        // Parse the day + month pair with the current year.
        $carbon = Carbon::createFromFormat('Y-m-d', sprintf('%s-%s', date('Y'), $date));

        // If the date is past, return the date for the next year.
        if ($carbon->isPast()) {
            $carbon = $carbon->addYear();
        }

        return $carbon;
    }

    /**
     * Sort a collection with yearly dates.
     *
     * @param array|Collection $dates
     *
     * @return Collection
     */
    public function handleYearlyDates($dates): Collection
    {
        $dates = Collection::wrap($dates);
        $dates = $dates->mapWithKeys(function ($value, $date) {
            return [$this->handleYearlyDate($date)->format('Y-m-d') => $value];
        });

        $values = $dates->all();
        ksort($values);

        return collect($values);
    }

    /**
     * Build a DayRange helper class from the given input data.
     *
     * @param array $data
     *
     * @return DayRange
     */
    public function extractDayRange(array $data): DayRange
    {
        return new DayRange($data);
    }
}