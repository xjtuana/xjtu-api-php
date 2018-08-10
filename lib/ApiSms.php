<?php

namespace Xjtuana\XjtuApi\Api;

/**
 * Class ApiSms.
 * 短信平台接口
 *
 * @author meteorlxy <meteor.lxy@foxmail.com>
 *
 */
class ApiSms extends XjtuApi {
    
    /**
     * 获取短信发送渠道
     *
     * @return array
     */
    public function getChannels() {
        $response = $this->http()->get('get_channels', [
            'query' => [
                'accountID' => $this->config['accountID'],
                'accountKey' => $this->config['accountKey'],
            ],
        ]);
        return $this->parseResponse($response);
    }

    /**
     * 根据手机号发送短信
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
            'title' => 'title',
            'content' => $content,
            'isCron' => $isCron ? 1 : 0,
            'sendtime' => $sendtime,
            'typecode' => '',
            'channels' => 'ydxy-mobile',
            'channelIds' => $this->config['channelIds'],
            'intReceiver' => [],
            'extReceiver' => $targets,
            'ext' => null,
        ];
        
        $response = $this->http()->post('v1/sendmsg', [
            'form_params' => [
                'accountID' => $this->config['accountID'],
                'accountKey' => $this->config['accountKey'],
                'msgJson' => json_encode($msgJson),
            ],
        ]);
        
        return $this->parseResponse($response);
    }
}
