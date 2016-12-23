<?php
/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 23.12.16
 * Time: 08:16
 */

namespace ch\tebe\worker;


interface WorkerInterface
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
     * @return mixed
     */
    public function work();
}
