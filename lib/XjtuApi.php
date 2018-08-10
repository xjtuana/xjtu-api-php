<?php

namespace Xjtuana\XjtuApi\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

/**
 * Class XjtuApi.
 * Api基类
 *
 * @author meteorlxy <meteor.lxy@foxmail.com>
 *
 */
abstract class XjtuApi {

    /**
     * Instace of Client
     * 
     * @val \GuzzleHttp\Client
     */
    protected $http;

    /**
     * 该api的URL.
     *
     * @var string
     */
    protected $url;

    /**
     * 该api的配置.
     *
     * @var array
     */
    protected $config;

    /**
     * GuzzleHttp Client options.
     *
     * @var array
     */
    protected $options = [
        'timeout' => 5,
        'connect_timeout' => 5,
    ];

    /**
     * 构造函数，传入url.
     *
     * @param  string    $url 
     * @param  array     $config
     * @param  array     $options
     *
     * @return void
     */
    public function __construct(string $url, array $config = [], array $options = []) {
        $this->url = $url;
        $this->config = $config;
        $this->options = array_merge($this->options, $options);
    }

    /**
     * Get the http client instance
     * 
     * @return \GuzzleHttp\Client
     */
    protected function http() {
        // 若$this->http不是\GuzzleHttp\Client实例，则创建一个
        if (!$this->http instanceof Client) {
            $this->http = new Client(
                array_merge(
                    [ 'base_uri' => $this->url ],
                    $this->options
                )
            );
        }

        return $this->http;
    }
    
    /**
     * 解析服务器响应
     * 
     * @param  \GuzzleHttp\Psr7\Response $response
     * 
     * @return mixed
     **/
    protected function parseResponse(Response $response, bool $json = false) {
        // 获取响应body
        $result = $response->getBody()->getContents();

        // 是否需要解析json
        if ($json) {
            $result = json_decode($result, true);
        }

        return $result;
    }
}
