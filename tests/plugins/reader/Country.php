<?php

namespace ch\tebe\workertest\plugins\reader;

use ch\tebe\worker\AbstractReader;

class Country extends AbstractReader
{
    /**
     * @return string
     */
    public function getId()
    {
        return 'countries';
    }

    /**
     * @return array
     */
    public function read()
    {
        $filepath = realpath(__DIR__ . '/../../data/countries.csv');
        $csv = [];
        foreach (array_map('str_getcsv', file($filepath)) as $line => $data) {
            $csv[$data[0]] = $data[1];
        }
        return $csv;
    }
}
