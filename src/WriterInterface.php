<?php

namespace ch\tebe\worker;

interface WriterInterface
{
    /**
     * @return array
     */
    public function getKeys();

    /**
     * @param string $key
     * @param array $data
     * @return void
     */
    public function setData($key, array $data);

    /**
     * @return void
     */
    public function write();
}
