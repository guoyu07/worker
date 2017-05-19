<?php

namespace ch\tebe\worker;

abstract class AbstractWorker implements WorkerInterface
{
    /** @var array */
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
     * @return string
     */
    public function getId()
    {
        return static::class;
    }

    /**
     * @param string $key
     * @return array
     */
    public function getData($key)
    {
        return $this->data[$key];
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
    public function work()
    {
        return [];
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
