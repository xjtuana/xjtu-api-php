# XJTU API - PHP Version

PHP Client for XJTU API

目前支持：
- ApiPppoeLog 用户PPPOE日志接口

## Usage 使用方法

- 通过Composer引入包（[Packagist](https://packagist.org/packages/xjtuana/xjtu-api)）

```shell
composer require xjtuana/xjtu-api ~1.0
```

- 示例代码

```php
use Xjtuana\XjtuApi\Api\ApiPppoeLog;
use GuzzleHttp\Psr7;

$pppoe = new ApiPppoeLog([
    'url' => 'API_URL',
]);
echo $pppoe->getByUsername('PPPOE_USERNAME');
```

## API

### ApiPppoeLog

- `getByUsername()` 通过PPPOE用户名/NETID获取日志

    - 参数：`string` 查询的PPPOE用户名/NETID

    - 返回值：`string` 日志

## Related Packages 相关包

- [xjtuana/laravel-xjtuana](https://git.xjtuana.com/xjtuana/laravel-xjtuana)