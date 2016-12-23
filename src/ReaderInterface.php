<?php

namespace ch\tebe\worker;

interface ReaderInterface
{
    /**
     * @return string
     */
    public function getId();

    /**
     * @return mixed
     */
    public function read();
}
