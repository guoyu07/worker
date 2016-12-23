<?php

namespace ch\tebe\worker\plugins\writer;

use ch\tebe\worker\WriterInterface;

class CountryWithCity implements WriterInterface
{
    /**
     * @var array
     */
    protected $data = [];

    public function getKeys()
    {
        return [
            'cityToCountry'
        ];
    }

    /**
     * @param string $key
     * @param array $data
     */
    public function setData($key, array $data)
    {
        $this->data[$key] = $data;
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

        $filepath = __DIR__ . '/../../../data/output/countries-with-cities.txt';
        file_put_contents($filepath, implode($lines, "\n"));
    }

}
