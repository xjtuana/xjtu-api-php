<?php

namespace Xjtuana\XjtuApi;

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
        if ( empty($url) ) {
            throw new XjtuApiException('The url of '.__CLASS__.' api is required.');
        }
        $this->url = $url;
    }

    /**
     * Get the http client instance
     * 
     * @return \GuzzleHttp\Client
     */
    protected function http() {
        if (! $this->http instanceof Client) {
            $this->http = new Client();
        }
        return $this->http;
    }
}