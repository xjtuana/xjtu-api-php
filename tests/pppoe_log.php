<?php
require "../vendor/autoload.php";

use Xjtuana\XjtuApi\Api\ApiPppoeLog;

$config = require './config.php';

$pppoe = new ApiPppoeLog($config['pppoelog']);

var_dump($pppoe->getByUsername('PPPOE_USERNAME'));
echo "\n";
