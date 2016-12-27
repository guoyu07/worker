<?php

namespace ch\tebe\worker;

abstract class AbstractWorker implements WorkerInterface
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
     * @return string
     */
    public function getId()
    {
        return '';
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

}
