<?php
require "../vendor/autoload.php";

use Xjtuana\XjtuApi\Api\ApiPppoeLog;
use GuzzleHttp\Psr7;

$pppoe = new ApiPppoeLog([
    'url' => 'API_URL',
]);
echo $pppoe->getByUsername('PPPOE_USERNAME');


