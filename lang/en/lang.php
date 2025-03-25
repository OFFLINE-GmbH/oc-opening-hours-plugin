<?php return [
    'plugin' => [
        'name' => 'Opening hours',
        'description' => 'Displays opening hours on your website',
    ],
    'common' => [
        'add' => 'Add opening hours',
        'name' => 'Name of the location',
        'slug' => 'Slug',
        'weekday' => 'Weekday',
        'hours' => 'Opening hours',
        'hours_label' => 'opening hours',
        'note' => 'Note',
        'location' => 'Location',
        'hours_special' => 'Special opening hours',
        'hours_special_label' => 'special opening hours',
        'is_permanently_closed' => 'Is permanently closed',
        'is_permanently_closed_comment' => 'Opening hours are ignored, the location is displayed as closed',
        'permanently_closed_until' => 'Permanently closed until',
        'permanently_closed_until_comment' => 'Leave empty to not automatically reopen the location',
    ],
    'hours' => [
        'from' => 'From',
        'to' => 'To',
    ],
    'date' => [
        'created_at' => 'Created at',
        'updated_at' => 'Updated at',
        'for' => 'For date',
        'yearly' => 'Repeats every year',
        'yearly_comment' => 'This rule repeats every year on the same date',
    ],
    'exceptions' => [
        'hours_comment' => 'Leave empty is the location is closed on this date',
    ],
    'permissions' => [
        'manage' => 'Can manage opening hours',
    ],
    'weekdays' => [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
    ],
    'titles' => [
        'locations' => [
            'reorder' => 'Sort locations',
        ],
    ],
    'components' => [
        'opening_hours' => [
            'name' => 'Opening Hours',
            'description' => 'Displays opening hours',
            'slug' => [
                'title' => 'Location slug',
                'description' => 'Fetch a specific location by its slug',
            ],
        ],
    ],
];
