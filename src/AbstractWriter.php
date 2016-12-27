<?php

namespace ch\tebe\worker;

abstract class AbstractWriter implements WriterInterface
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * @return array
     */
    public function getKeys()
    {
        return [];
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
     * @return void
     */
    public function write()
    {
    }

}
