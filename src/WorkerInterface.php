<?php

namespace ch\tebe\worker;


interface WorkerInterface
{
    /**
     * @return array
     */
    public function getKeys();

    /**
     * @return string
     */
    public function getId();

    /**
     * @param string $key
     * @param array $data
     * @return void
     */
    public function setData($key, array $data);

    /**
     * @return mixed
     */
    public function work();
}
