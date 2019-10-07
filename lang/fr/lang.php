<?php return [
    'plugin'      => [
        'name'        => 'Heures d’ouverture',
        'description' => 'Affiche les heures d’ouverture sur votre site web',
    ],
    'common'      => [
        'add'                 => 'Ajouter des heures d’ouverture',
        'name'                => 'Nom de l’emplacement',
        'slug'                => 'Slug',
        'weekday'             => 'Jour de la semaine',
        'hours'               => 'Heures d’ouverture',
        'hours_label'         => 'heures d’ouverture',
        'note'                => 'Note',
        'location'            => 'Emplacement',
        'hours_special'       => 'Heures d’ouverture spéciales',
        'hours_special_label' => 'heures d’ouverture spéciales',
    ],
    'hours'       => [
        'from' => 'De',
        'to'   => 'A',
    ],
    'date'        => [
        'created_at'     => 'Créé le',
        'updated_at'     => 'Mis à jour le',
        'for'            => 'Pour la date',
        'yearly'         => 'Se répète chaque année',
        'yearly_comment' => 'Cette règle se répète chaque année à la même date',
    ],
    'exceptions'  => [
        'hours_comment' => 'Laisser vide si le lieu est fermé à cette date',
    ],
    'permissions' => [
        'manage' => 'Peut gérer les heures d’ouverture',
    ],
    'weekdays'    => [
        'Dimanche',
        'Lundi',
        'Mardi',
        'Mercredi',
        'Jeudi',
        'Vendredi',
        'Samedi',
    ],
    'titles'      => [
        'locations' => [
            'reorder' => 'Trier les emplacements',
        ],
    ],
    'components'  => [
        'opening_hours' => [
            'name'        => 'Heures d’ouverture',
            'description' => 'Affichage les heures d’ouverture',
            'slug'        => [
                'title'       => 'Slug de l’emplacement',
                'description' => 'Récupérer un emplacement spécifique par son slug.',
            ],
        ],
    ],
];