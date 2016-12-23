<?php

namespace ch\tebe\worker\plugins\reader;

use ch\tebe\worker\ReaderInterface;

/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 23.12.16
 * Time: 07:21
 */
class Country implements ReaderInterface
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
        $filepath = realpath(__DIR__ . '/../../../data/countries.csv');
        $csv = [];
        foreach (array_map('str_getcsv', file($filepath)) as $line => $data) {
            $csv[$data[0]] = $data[1];
        }
        return $csv;
    }
}
