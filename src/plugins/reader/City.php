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
        return [
            'CH' => 'Schweiz',
            'DE' => 'Deutschland',
            'AT' => 'Österreich',
            'FL' => 'Fürstentum Liechtenstein',
            'IT' => 'Italien'
        ];
    }
}
