<?php

namespace ch\tebe\worker\plugins\reader;

use ch\tebe\worker\ReaderInterface;

class City implements ReaderInterface
{
    /**
     * @return string
     */
    public function getId()
    {
        return 'cities';
    }

    /**
     * @return array
     */
    public function read()
    {
        $filepath = realpath(__DIR__ . '/../../../data/cities.csv');
        $csv = [];
        foreach (array_map('str_getcsv', file($filepath)) as $line => $data) {
            $csv[] = [
                'countryCode' => $data[0],
                'city' => $data[1]
            ];
        }
        return $csv;
    }
}