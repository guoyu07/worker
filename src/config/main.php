<?php

return [
    'plugins' => [
        'reader' => [
            'ch\tebe\worker\plugins\reader\Country',
            'ch\tebe\worker\plugins\reader\City',
        ],
        'worker' => [
            'ch\tebe\worker\plugins\worker\CityToCountry'
        ],
        'writer' => [
            'ch\tebe\worker\plugins\writer\CountryWithCity'
        ]
    ]
];
