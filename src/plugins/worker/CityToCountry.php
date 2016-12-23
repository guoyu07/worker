<?php

namespace ch\tebe\worker\plugins\worker;

use ch\tebe\worker\WorkerInterface;

class CityToCountry implements WorkerInterface
{
    /**
     * @return array
     */
    public function getKeys()
    {
        return [
            'countries',
            'cities'
        ];
    }

    public function setData($key, array $data)
    {

    }

    /**
     * @return array
     */
    public function work()
    {
        // Do something
    }
}
