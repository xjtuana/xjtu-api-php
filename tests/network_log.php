<?php
require __DIR__ . '/../vendor/autoload.php';

use Xjtuana\XjtuApi\Api\ApiNetworkLog;

$config = require __DIR__ . '/config.php';

$networklog = new ApiNetworkLog($config['network_log']['url']);

var_dump($networklog->getStuByUsername('USERNAME'));
echo "\n";

var_dump($networklog->getWenetByUsername('USERNAME'));
echo "\n";

var_dump($networklog->getWlanByUsername('USERNAME'));
echo "\n";

