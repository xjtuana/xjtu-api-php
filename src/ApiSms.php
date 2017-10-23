<?php

namespace Xjtuana\XjtuApi\Api;

use GuzzleHttp\Psr7\Response;

/**
 * Class ApiSms.
 * 短信平台接口
 *
 * @author meteorlxy <meteor.lxy@foxmail.com>
 *
 */
class ApiSms extends XjtuApi {
    
    protected $accountID;
    
    protected $accountKey;
    
    protected $channelIds;

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
        $this->accountID = $config['accountID'];
        $this->accountKey = $config['accountKey'];
        $this->channelIds = $config['channelIds'];
    }
    
    protected function parseResponse(Response $response) {
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
    
    public function getChannels() {
        $response = $this->http()->get('get_channels', [
            'query' => [
                'accountID' => $this->accountID,
                'accountKey' => $this->accountKey,
            ],
        ]);
        return $this->parseResponse($response);
    }

    /**
     * 根据手机号发送短信.
     *
     * @param  array    $targets     目标手机号数组
     * @param  string   $content     短信内容
     * @param  bool     $isCron      是否定时消息
     * @param  string   $sendtime    定时消息发送时间yyyy-MM-dd HH:mm:ss
     *
     * @return bool
     */
    public function send(array $targets, string $content, bool $isCron = false, string $sendtime = null) {
        
        $msgJson = [
            'title' => 'titlea',
            'content' => $content,
            'isCron' => $isCron ? 1 : 0,
            'sendtime' => $sendtime,
            'typecode' => '',
            'channels' => 'ydxy-mobile',
            'channelIds' => $this->channelIds,
            'intReceiver' => [],
            'extReceiver' => $targets,
            'ext' => null,
        ];
        
        $response = $this->http()->post('v1/sendmsg', [
            'form_params' => [
                'accountID' => $this->accountID,
                'accountKey' => $this->accountKey,
                'msgJson' => json_encode($msgJson),
            ],
        ]);
        
        return $this->parseResponse($response);
    }

}