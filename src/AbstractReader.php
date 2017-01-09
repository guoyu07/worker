<?php

namespace ch\tebe\worker;

abstract class AbstractReader implements ReaderInterface
{
    /** @var array */
    protected $services = [];

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
