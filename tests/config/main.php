<?php

return [
    'plugins' => [
        'reader' => [
            'ch\tebe\workertest\plugins\reader\Country',
            'ch\tebe\workertest\plugins\reader\City',
        ],
        'worker' => [
            'ch\tebe\workertest\plugins\worker\CityToCountry'
        ],
        'writer' => [
            'ch\tebe\workertest\plugins\writer\EmptyWriter',
            'ch\tebe\workertest\plugins\writer\CountryWithCity'
        ]
    ]
];
