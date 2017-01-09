<?php

namespace ch\tebe\workertest\plugins\writer;

use ch\tebe\worker\AbstractWriter;
use ch\tebe\workertest\services\CsvFile;

class CountryWithCity extends AbstractWriter
{

    /**
     * @return array
     */
    public function getKeys()
    {
        return [
            'cityToCountry'
        ];
    }

    /**
     * @return array
     */
    public function write()
    {
        $lines = [];
        foreach ($this->data['cityToCountry'] as $countryCode => $arr) {
            $lines[] = sprintf("%s (%s): %s", $arr['name'], $countryCode, implode(", ", $arr['cities']));
        }

        $filepath = __DIR__ . '/../../data/output/countries-with-cities.txt';
        /** @var CsvFile $csvFile */
        $csvFile = $this->getService('csvFile');
        $csvFile->write($filepath, $lines);
    }

}
