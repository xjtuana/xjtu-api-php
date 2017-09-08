<?php

namespace Xjtuana\XjtuApi\Api;

use Xjtuana\XjtuApi\XjtuApi;
use GuzzleHttp\Exception\RequestException;

/**
 * Class ApiPppoeLog.
 * 查询用户PPPOE日志
 *
 * @author meteorlxy <meteor.lxy@foxmail.com>
 *
 */
class ApiPppoeLog extends XjtuApi {

    /**
     * 构造函数，传入config数组.
     *
     * @param  array    $config 
     *
     * @return void
     * @throws \Xjtuana\Ws\WebService\XjtuWebServiceException
     */
    public function __construct(array $config) {
        parent::__construct($config['url']);
    }

    /**
     * 根据用户名获取PPPOE日志.
     *
     * @param  string   $username     目标用户名，NETID/PPPOE账号
     *
     * @return string
     */
    public function getByUsername(string $username) {
        try {
           $response = $this->http()->get( $this->url, [
                'query' => [
                    'username' => $username
                ]
            ] );
            return $response->getBody();
        } catch(RequestException $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                return $response->getStatusCode() . ' ' . $response->getReasonPhrase();
            }
            return 'Exception: ' . $e->getCode();
        }
    }

}