<?php return [
    'plugin' => [
        'name' => 'Öffnungszeiten',
        'description' => 'Zeigt Öffnungszeiten auf der Website an',
    ],
    'common' => [
        'add' => 'Zeit hinzufügen',
        'name' => 'Standort',
        'slug' => 'Slug',
        'weekday' => 'Wochentag',
        'hours' => 'Öffnungszeiten',
        'hours_label' => 'Öffnungszeiten',
        'note' => 'Bemerkung',
        'location' => 'Standort',
        'hours_special' => 'Sonderöffnungszeiten',
        'hours_special_label' => 'Sonderöffnungszeiten',
        'is_permanently_closed' => 'Ist permanent geschlossen',
        'is_permanently_closed_comment' => 'Die Öffnungszeiten werden ignoriert, der Standort wird als geschlossen angezeigt',
        'permanently_closed_until' => 'Permanent geschlossen bis',
        'permanently_closed_until_comment' => 'Leer lassen, um die Location nicht automatisch wieder zu eröffenen',
    ],
    'hours' => [
        'from' => 'Von',
        'to' => 'Bis',
    ],
    'date' => [
        'created_at' => 'Erstellt',
        'updated_at' => 'Bearbeitet',
        'for' => 'Für Datum',
        'yearly' => 'Wird jedes Jahr wiederholt',
        'yearly_comment' => 'Die Ausnahme wird jedes Jahr am gleichen Datum wieder aktiv',
    ],
    'exceptions' => [
        'hours_comment' => 'Leer lassen, falls der Standort geschlossen bleibt',
    ],
    'permissions' => [
        'manage' => 'Kann Öffnungszeiten verwalten',
    ],
    'weekdays' => [
        0 => 'Sonntag',
        1 => 'Montag',
        2 => 'Dienstag',
        3 => 'Mittwoch',
        4 => 'Donnerstag',
        5 => 'Freitag',
        6 => 'Samstag',
    ],
    'titles' => [
        'locations' => [
            'reorder' => 'Standorte sortieren',
        ],
    ],
    'components' => [
        'opening_hours' => [
            'name' => 'Öffnungszeiten',
            'description' => 'Zeigt Öffnungszeiten an',
            'slug' => [
                'title' => 'Slug eines Standorts',
                'description' => 'Lädt einen spezifischen Standort gemäss slug',
            ],
        ],
    ],
];
