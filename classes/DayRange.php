<?php

namespace OFFLINE\OpeningHours\Classes;


class DayRange
{
    use DateUtils;

    /**
     * All given input days.
     * @var array
     */
    public $days = [];
    /**
     * Opening hours data.
     * @var array
     */
    public $hours = [];
    /**
     * The given days are all in sequence (no missing days).
     * @var bool
     */
    public $isSequence;
    /**
     * First day of the range.
     * @var string
     */
    public $firstDay;
    /**
     * Last day of the range.
     * @var string
     */
    public $lastDay;

    public function __construct(array $data)
    {
        if ( ! array_key_exists('days', $data) || ! array_key_exists('opening_hours', $data)) {
            throw new \InvalidArgumentException('Invalid array data passed to DayRange: "days" and "opening_hours" keys are required.');
        }

        $this->hours = $data['opening_hours'];

        $days = $this->setKeys($data['days']);
        ksort($days);

        $this->days     = $days;
        $this->firstDay = array_first($this->days);
        $this->lastDay  = array_last($this->days);

        // If the first and last day are the same (sunday is available twice to make weekend overlapping
        // date ranges work) we need to remove the first element and take the next available element as
        // the starting point for our range.
        if ($this->firstDay === $this->lastDay && count($days) > 1) {
            unset($this->days[array_search($this->firstDay, $this->days)]);

            $this->firstDay = array_first($this->days);
        }

        $startIndex = array_search($this->firstDay, $this->days, true);
        $endIndex   = array_search($this->lastDay, $this->days, true);

        $isSequence = true;
        for ($i = $startIndex; $i <= $endIndex; $i++) {
            if ( ! array_key_exists($i, $this->days)) {
                $isSequence = false;
                break;
            }
        }

        $this->isSequence = $isSequence;
    }

    /**
     * Returns a structured data string representation of this dayrange.
     *
     * @return string
     */
    public function getStructuredData(): string
    {
        // Transform 'monday' to 'Mo'
        $shorten = function (string $in): string {
            return ucfirst(substr($in, 0, 2));
        };

        // Let's work with the shortened day names only from here on.
        $days     = array_map($shorten, $this->days);
        $firstDay = $shorten($this->firstDay);
        $lastDay  = $shorten($this->lastDay);

        $dayString = implode(',', $days);

        if ($this->isSequence) {
            $dayString = $firstDay === $lastDay  // single day?
                ? $shorten($firstDay)
                : sprintf('%s-%s', $firstDay, $lastDay);
        }

        return sprintf('%s %s', $dayString, (string)$this->hours);
    }

    /**
     * Set the correct day-of-week keys for a given
     * array of weekday names.
     *
     * @param array $days
     *
     * @return array
     */
    public function setKeys(array $days): array
    {
        $weekdays = array_flip(self::getWeekdays());
        $withKeys = [];
        foreach ($days as $day) {
            $withKeys[$weekdays[$day]] = $day;
        }

        if (in_array('sunday', $withKeys, true)) {
            $withKeys[7] = 'sunday';
        }

        return $withKeys;
    }

    /**
     * Alias for getStructuredData.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->getStructuredData();
    }
}