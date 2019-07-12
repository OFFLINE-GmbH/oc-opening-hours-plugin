<?php return [
    'plugin'      => [
        'name'        => 'Öffnungszeiten',
        'description' => 'Zeigt Öffnungszeiten auf der Website an',
    ],
    'common'      => [
        'add'                 => 'Zeit hinzufügen',
        'name'                => 'Standort',
        'slug'                => 'Slug',
        'weekday'             => 'Wochentag',
        'hours'               => 'Öffnungszeiten',
        'note'                => 'Bemerkung',
        'location'            => 'Standort',
        'hours_special'       => 'Sonderöffnungszeiten',
        'hours_special_label' => 'Sonderöffnungszeiten',
    ],
    'hours'       => [
        'from' => 'Von',
        'to'   => 'Bis',
    ],
    'date'        => [
        'created_at'     => 'Erstellt',
        'updated_at'     => 'Bearbeitet',
        'for'            => 'Für Datum',
        'yearly'         => 'Wird jedes Jahr wiederholt',
        'yearly_comment' => 'Die Ausnahme wird jedes Jahr am gleichen Datum wieder aktiv',
    ],
    'exceptions'  => [
        'is_closed'         => 'Der Standort ist an diesem Tag geschlossen',
        'is_closed_comment' => 'Deaktivere diese Option um Sonderöffnungszeiten für das Datum zu erfassen',
    ],
    'permissions' => [
        'manage' => 'Kann Öffnungszeiten verwalten',
    ],
    'weekdays'    => [
        'Sonntag',
        'Montag',
        'Dienstag',
        'Mittwoch',
        'Donnerstag',
        'Freitag',
        'Samstag',
    ],
    'titles'      => [
        'locations' => [
            'reorder' => 'Standorte sortieren',
        ],
    ],
    'components'  => [
        'opening_hours' => [
            'name'        => 'Öffnungszeiten',
            'description' => 'Zeigt Öffnungszeiten an',
        ],
    ],
];