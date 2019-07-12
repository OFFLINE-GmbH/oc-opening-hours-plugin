<?php namespace OFFLINE\OpeningHours\Controllers;

use Backend\Behaviors\FormController;
use Backend\Behaviors\ListController;
use Backend\Behaviors\RelationController;
use Backend\Behaviors\ReorderController;
use Backend\Classes\Controller;
use BackendMenu;
use October\Rain\Exception\ValidationException;
use OFFLINE\OpeningHours\Models\Hour;
use OFFLINE\OpeningHours\Models\Location;

class Locations extends Controller
{
    public $implement = [
        ListController::class,
        FormController::class,
        ReorderController::class,
        RelationController::class,
    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';
    public $relationConfig = 'config_relation.yaml';

    public $requiredPermissions = [
        'offline.openinghours::manage',
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('OFFLINE.Openinghours', 'opening-hours-main');
    }

    public function onRelationManageCreate()
    {
        $sessionKey = post('_session_key');
        if (post('_relation_field') !== 'hours') {
            return parent::onRelationManageCreate();
        }

        $this->initRelation(Location::find($this->params[0]), 'hours');
        $this->prepareVars();

        // Handle multi creation of opening hours.
        $weekdays = post('Hour.weekdays', []);
        if ( ! $weekdays) {
            throw new ValidationException(['weekdays' => 'Select at least one weekday']);
        }

        $data = post('Hour');

        foreach ($weekdays as $weekday) {
            $newModel              = new Hour();
            $newModel->weekday     = $weekday;
            $newModel->hours       = $data['hours'] ?? [];
            $newModel->note        = $data['note'] ?? [];
            $newModel->location_id = $this->params[0];
            $newModel->save(null, $sessionKey);
        }


        return $this->relationRefresh();
    }
}
