# XJTU API - PHP Version

PHP Client for XJTU API

目前支持：
- ApiNetworkLog 用户网络日志接口
- ApiSms 统一消息协作平台（短信接口）

## Usage 使用方法

- 通过Composer引入包（[Packagist](https://packagist.org/packages/xjtuana/xjtu-api)）

```shell
composer require xjtuana/xjtu-api ~2.0.0
```

- 示例代码

NetworkLog:

```php
use Xjtuana\XjtuApi\Api\ApiNetworkLog;

$networklog = new ApiNetworkLog(
    'API_URL'
);
echo $networklog->getStuByUsername('PPPOE_USERNAME');
echo $networklog->getWenetByUsername('PPPOE_USERNAME');
```

Sms:

```php
use Xjtuana\XjtuApi\Api\ApiSms;

$sms = new ApiSms([
    API_URL',
    [
        'accountID' => 'ACCOUNT_ID',
        'accountKey' => 'ACCOUNT_KEY',
        'channelIds' => 'CHANNEL_ID',
    ]
);

var_dump($sms->getChannels());
echo "\n";

var_dump($sms->send(['SMS_TARGET'], 'SMS_CONTENT'));
echo "\n";
```

## API

### ApiNetworkLog

- `getStuByUsername()` 通过PPPOE用户名/NETID获取Stu日志

    - 参数：`string` 查询的PPPOE用户名/NETID

    - 返回值：`string` 日志

- `getWenetByUsername()` 通过PPPOE用户名/NETID获取Wenet日志

    - 参数：`string` 查询的PPPOE用户名/NETID

    - 返回值：`string` 日志

### ApiSms

- `getChannels()` 获取可以使用的消息渠道

    - 返回值：`array` 渠道列表
    

- `send()` 发送消息（目前仅支持短信）

    - 参数：`array` 目标手机号数组

    - 参数：`string` 短信内容

    - 返回值：`array` 渠道列表
    

## Related Packages 相关包

- [xjtuana/laravel-xjtuana](https://git.xjtuana.com/xjtuana/laravel-xjtuana)
