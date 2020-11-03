<?php

$data = [
    'events' => [
        [
            'title' => 'Les défis de la RoboCup 2020',
            'speakers' => '',
            'date_start' => '2018-11-29 14:00',
            'date_end' => '2018-11-29 16:00',
            'where' => 'Remote',
            'visio' => 'http://desktop.visio.renater.fr/scopia?ID=728157***1234&autojoin'
        ],
        [
            'title' => 'Introduction aux <a href="https://fr.wikipedia.org/wiki/Cartographie_et_localisation_simultan%C3%A9es">méthodes SLAM</a>
            et à l\'algorithme <em>Cartographer</em>.',
            'speakers' => 'Antoine Billy & Rémi Fabre',
            'date_start' => '2020-11-17 14:00',
            'date_end' => '2020-11-17 16:00',
            'where' => 'Remote',
            'visio' => 'http://desktop.visio.renater.fr/scopia?ID=722712***1234&autojoin'
        ],
        [
            'title' => 'Programmation quadratique pour les robots humanoïdes.',
            'speakers' => 'Quentin Rouxel',
            'date_start' => '2020-12-16 14:00',
            'date_end' => '2020-12-16 16:00',
            'where' => 'Remote'
        ]
    ],
];

foreach ($data['events'] as &$event) {
    $ts = strtotime($event['date_end']);
    $event['passed'] = $ts < time();
}

return $data;