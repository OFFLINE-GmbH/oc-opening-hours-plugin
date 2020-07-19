<?php return [
    'plugin' => [
        'name' => 'Otváracie hodiny',
        'description' => 'Zobrazí otváracie hodiny na stránke',
    ],
    'common' => [
        'add' => 'Pridať otváracie hodiny',
        'name' => 'Názov pobočky',
        'slug' => 'Slug',
        'weekday' => 'Deň',
        'hours' => 'Otváracie hodiny',
        'hours_label' => 'Otváracie hodiny',
        'note' => 'Poznámka',
        'location' => 'Pobočka',
        'hours_special' => 'Pridať špeciálne otváracie hodiny',
        'hours_special_label' => 'špeciálne otváracie hodiny',
    ],
    'hours' => [
        'from' => 'Od',
        'to' => 'Do',
    ],
    'date' => [
        'created_at' => 'Vytvorené',
        'updated_at' => 'Upravené',
        'for' => 'Pre dátum',
        'yearly' => 'Opakovať každý rok',
        'yearly_comment' => 'Toto pravidlo sa bude opakovať každý rok',
    ],
    'exceptions' => [
        'hours_comment' => 'Nechajte prázdne ak je počas tohto dátumu zavreté',
    ],
    'permissions' => [
        'manage' => 'Môže upravovať otváracie hodiny',
    ],
    'weekdays' => [
        'Nedeľa',
        'Pondelok',
        'Utorok',
        'Streda',
        'Štvrtok',
        'Piatok',
        'Sobota',
    ],
    'titles' => [
        'locations' => [
            'reorder' => 'Zoradiť pobočky',
        ],
    ],
    'components' => [
        'opening_hours' => [
            'name' => 'Otváracie hodiny',
            'description' => 'Zobrazí otváracie hodiny',
            'slug' => [
                'title' => 'Slug pobočky',
                'description' => 'Získa špecifickú pobočku podľa slugu',
            ],
        ],
    ]
];
