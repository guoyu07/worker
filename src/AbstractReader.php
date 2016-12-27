<?php

namespace ch\tebe\worker;

abstract class AbstractReader implements ReaderInterface
{

    /**
     * @return string
     */
    public function getId()
    {
        return '';
    }

    /**
     * @return void
     */
    public function read()
    {
    }

}
