<?php namespace OFFLINE\OpeningHours\Models;

use Model;
use October\Rain\Database\Traits\Validation;
use OFFLINE\OpeningHours\Classes\DateUtils;

class DateException extends Model
{
    use Validation;
    use DateUtils;

    public $table = 'offline_openinghours_exceptions';
    public $rules = [
        'for_date'     => 'required|date',
        'hours.*.from' => 'required|date',
        'hours.*.to'   => 'required|date',
    ];
    public $dates = ['for_date'];
    public $casts = ['yearly' => 'boolean'];
    public $jsonable = ['hours'];
    public $belongsTo = [
        'location' => Location::class,
    ];
}
