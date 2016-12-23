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
        return [
            'CH' => 'Schweiz',
            'DE' => 'Deutschland',
            'AT' => 'Österreich',
            'FL' => 'Fürstentum Liechtenstein',
            'IT' => 'Italien'
        ];
    }
}
