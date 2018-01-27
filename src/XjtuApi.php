<?php

namespace Xjtuana\XjtuApi\Api;

use GuzzleHttp\Client;

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
        if (! $this->http instanceof Client) {
            $this->http = new Client(
                array_merge([
                    'base_uri' => $this->url,
                ],
                $this->options
                )
            );
        }
        return $this->http;
    }
}