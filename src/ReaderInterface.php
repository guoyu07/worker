<?php
/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 23.12.16
 * Time: 08:16
 */

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
