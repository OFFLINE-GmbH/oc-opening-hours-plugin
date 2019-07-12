<?php namespace OFFLINE\OpeningHours\Models;

use Model;
use October\Rain\Database\Traits\Validation;
use OFFLINE\OpeningHours\Classes\DateUtils;

class Hour extends Model
{
    use Validation;
    use DateUtils;

    public $table = 'offline_openinghours_hours';
    public $jsonable = ['hours'];
    public $rules = [
        'weekday'      => 'required|min:0|max:6',
        'hours.*.from' => 'required|date',
        'hours.*.to'   => 'required|date',
    ];
    public $belongsTo = [
        'location' => Location::class,
    ];
    
    /**
     * Alias for getWeekdaysOption, used for checkbox list
     * in create context.
     *
     * @return array
     */
    public function getWeekdaysOptions()
    {
        return $this->getWeekdayOptions();
    }
}
