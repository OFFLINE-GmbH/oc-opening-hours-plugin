<?php namespace OFFLINE\OpeningHours\Models;

use Model;
use October\Rain\Database\Traits\Sluggable;
use October\Rain\Database\Traits\Sortable;
use October\Rain\Database\Traits\Validation;
use OFFLINE\OpeningHours\Classes\DateUtils;
use Spatie\OpeningHours\OpeningHours;

class Location extends Model
{
    use Validation;
    use Sluggable;
    use DateUtils;
    use Sortable;

    public $slugs = [
        'slug' => 'name',
    ];
    public $table = 'offline_openinghours_locations';
    public $rules = [
        'name' => 'required',
    ];
    public $hasMany = [
        'hours'      => Hour::class,
        'exceptions' => DateException::class,
    ];

    /**
     * @var OpeningHours
     */
    public $openingHours;

    /**
     * Create an OpeningHours instance from the available data.
     */
    protected function afterFetch()
    {
        $data = $this->opening_hours_data;
        if (is_array($data) && OpeningHours::isValid($data)) {
            try {
                $this->openingHours = OpeningHours::create($data);
            } catch (\Throwable $e) {
                logger()->error(sprintf('Failed to initialize OpeningHours class: %s', $e->getMessage()), [$e]);
            }
        }
    }

    /**
     * Return the data in the required format for spatie/opening-hours.
     *
     * @return array
     */
    public function getOpeningHoursDataAttribute()
    {
        $weekdays = self::getWeekdays();
        $values   = $this->hours->mapWithKeys(function ($day) use ($weekdays) {
            $key    = $weekdays[$day->weekday] ?? $day->weekday;
            $values = self::toTimeRange($day->hours);
            if ($day->note !== '') {
                $values['data'] = $day->note;
            }

            return [$key => $values];
        })->filter();

        $values['exceptions'] = $this->exceptions->mapWithKeys(function ($exception) {
            $format = $exception->yearly ? 'm-d' : 'Y-m-d';
            $key    = $exception->for_date->format($format);
            $values = self::toTimeRange($exception->hours);
            if ($exception->note !== '') {
                $values['data'] = $exception->note;
            }

            return [$key => $values];
        });

        $values['overflow'] = true;

        return $values->toArray();
    }
}
