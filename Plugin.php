<?php namespace OFFLINE\OpeningHours;

use OFFLINE\OpeningHours\Components\OpeningHours;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            OpeningHours::class => 'openingHours',
        ];
    }

    public function registerSettings()
    {
    }
}
