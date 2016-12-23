<?php

ini_set('display_errors', 1);

require_once(__DIR__ . '/../vendor/autoload.php');

use ch\tebe\worker\Worker;

$params = $_GET;
$config = require(__DIR__ . '/../src/config/main.php');

$worker = new Worker($params, $config);
$worker->run();
