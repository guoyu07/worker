<?php

namespace ch\tebe\workertest\plugins\reader;

use ch\tebe\worker\AbstractReader;
use ch\tebe\workertest\services\CsvFile;

class City extends AbstractReader
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
        $filepath = realpath(__DIR__ . '/../../data/cities.csv');
        /** @var CsvFile $csvFile */
        $csvFile = $this->getService('csvFile');
        $csv = [];
        foreach ($csvFile->read($filepath) as $line => $data) {
            $csv[] = [
                'countryCode' => $data[0],
                'city' => $data[1]
            ];
        }
        return $csv;
    }
}
