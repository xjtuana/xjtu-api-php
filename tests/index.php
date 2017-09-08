<?php
require "../vendor/autoload.php";

use Xjtuana\XjtuApi\Api\ApiPppoeLog;
use GuzzleHttp\Psr7;

$config = require './config.php';

$pppoe = new ApiPppoeLog($config['pppoelog']);

echo $pppoe->getByUsername('PPPOE_USERNAME');


