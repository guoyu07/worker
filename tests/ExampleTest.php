<?php

use ch\tebe\worker\Worker;

class ExampleTest extends PHPUnit_Framework_TestCase
{
    public function testOutput()
    {
        $params = [];
        $config = require('config/main.php');

        $worker = new Worker($params, $config);
        $worker->run();

        $expectedFilename = realpath(__DIR__ . '/data/countries-with-cities.txt');
        $actualFilename = realpath(__DIR__ . '/data/output/countries-with-cities.txt');

        $this->assertEquals(sha1_file($expectedFilename), sha1_file($actualFilename));
    }
}
