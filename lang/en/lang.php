<?php return [
    'plugin'      => [
        'name'        => 'Opening hours',
        'description' => 'Displays opening hours on your website',
    ],
    'common'      => [
        'add'                 => 'Add opening hours',
        'name'                => 'Name of the location',
        'slug'                => 'Slug',
        'weekday'             => 'Weekday',
        'hours'               => 'Opening hours',
        'note'                => 'Note',
        'location'            => 'Location',
        'hours_special'       => 'Special opening hours',
        'hours_special_label' => 'special opening hours',
    ],
    'hours'       => [
        'from' => 'From',
        'to'   => 'To',
    ],
    'date'        => [
        'created_at'     => 'Created at',
        'updated_at'     => 'Updated at',
        'for'            => 'For date',
        'yearly'         => 'Repeats every year',
        'yearly_comment' => 'This rule repeats every year on the same date',
    ],
    'exceptions'  => [
        'is_closed'         => 'The location is closed on this day',
        'is_closed_comment' => 'Disable this option to enter special opening hours for this date',
    ],
    'permissions' => [
        'manage' => 'Can manage opening hours',
    ],
    'weekdays'    => [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
    ],
    'titles'      => [
        'locations' => [
            'reorder' => 'Sort locations',
        ],
    ],
    'components'  => [
        'opening_hours' => [
            'name'        => 'Opening Hours',
            'description' => 'Displays opening hours',
        ],
    ],
];