<?php
require __DIR__ . '/../vendor/autoload.php';

use Xjtuana\XjtuApi\Api\ApiSms;

$config = require __DIR__ . '/config.php';

$sms = new ApiSms($config['sms']['url'], $config['sms']['config']);

var_dump($sms->getChannels());
echo "\n";

var_dump($sms->send(['SMS_TARGET'], 'SMS_CONTENT'));
echo "\n";
