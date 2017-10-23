<?php
require "../vendor/autoload.php";

use Xjtuana\XjtuApi\Api\ApiSms;

$config = require './config.php';

$sms = new ApiSms($config['sms']);

var_dump($sms->getChannels());
echo "\n";

var_dump($sms->send(['SMS_TARGET'], 'SMS_CONTENT'));
echo "\n";