<?php
require __DIR__ . '/../vendor/autoload.php';

use Xjtuana\XjtuApi\Api\ApiNetworkLog;

$config = require __DIR__ . '/config.php';

$pppoe = new ApiNetworkLog($config['network_log']['url']);

var_dump($pppoe->getStuByUsername('USERNAME'));
echo "\n";

var_dump($pppoe->getWenetByUsername('USERNAME'));
echo "\n";
