<?php namespace OFFLINE\OpeningHours\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Collection;
use OFFLINE\OpeningHours\Classes\DateUtils;
use OFFLINE\OpeningHours\Models\Location;

class OpeningHours extends ComponentBase
{
    use DateUtils;

    /**
     * All available locations.
     *
     * @return Collection
     */
    public $locations;
    /**
     * All available locations keyed by the slug attribute.
     *
     * @return Collection
     */
    public $locationsBySlug;
    /**
     * The first available location.
     *
     * Makes it easier to access it in the frontend if
     * only one location is available.
     *
     * @return Location
     */
    public $location;

    public function componentDetails()
    {
        return [
            'name'        => 'offline.openinghours::lang.components.opening_hours.name',
            'description' => 'offline.openinghours::lang.components.opening_hours.description',
            'icon'        => 'clock',
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->locations       = Location::with('hours', 'exceptions')->orderBy('sort_order')->get();
        $this->locationsBySlug = $this->locations->keyBy('slug');
        $this->location        = $this->locations->first();
    }
}
