<?php
require __DIR__ . '/../vendor/autoload.php';

use Xjtuana\XjtuApi\Api\ApiPppoeLog;

$config = require __DIR__ . '/config.php';

$pppoe = new ApiPppoeLog($config['pppoelog']['url']);

var_dump($pppoe->getByUsername('PPPOE_USERNAME'));
echo "\n";
