<?php
/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 23.12.16
 * Time: 08:16
 */

namespace ch\tebe\worker;


interface WriterInterface
{
    /**
     * @return mixed
     */
    public function write();
}
