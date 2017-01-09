<?php

namespace ch\tebe\workertest\plugins\reader;

use ch\tebe\worker\AbstractReader;
use ch\tebe\workertest\services\CsvFile;

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
        /** @var CsvFile $csvFile */
        $csvFile = $this->getService('csvFile');
        $csv = [];
        foreach ($csvFile->read($filepath) as $line => $data) {
            $csv[$data[0]] = $data[1];
        }
        return $csv;
    }
}
