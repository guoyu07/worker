<?php

namespace ch\tebe\worker;

abstract class AbstractWriter implements WriterInterface
{
    /**
     * @var array
     */
    protected $data = [];

    /** @var array */
    protected $services = [];

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

    /**
     * @param string $name
     * @return object
     */
    public function getService($name)
    {
        return $this->services[$name];
    }

    /**
     * @return void
     */
    public function setServices(array $services)
    {
        $this->services = $services;
    }

}
