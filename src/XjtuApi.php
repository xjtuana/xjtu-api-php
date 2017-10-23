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
     * 构造函数，传入url.
     *
     * @param  string    $url 
     *
     * @return void
     * @throws \Xjtuana\Ws\XjtuWebServiceException
     */
    public function __construct(string $url) {
        $this->url = $url;
    }

    /**
     * Get the http client instance
     * 
     * @return \GuzzleHttp\Client
     */
    protected function http() {
        if (! $this->http instanceof Client) {
            $this->http = new Client([
                'base_uri' => $this->url,
            ]);
        }
        return $this->http;
    }
}