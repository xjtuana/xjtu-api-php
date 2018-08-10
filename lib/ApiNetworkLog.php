<?php

namespace Xjtuana\XjtuApi\Api;

use GuzzleHttp\Exception\RequestException;

/**
 * Class ApiNetworkLog.
 * 查询用户网络日志
 *
 * @author meteorlxy <meteor.lxy@foxmail.com>
 *
 */
class ApiNetworkLog extends XjtuApi {

    /**
     * 根据用户名获取STU日志.
     *
     * @param  string   $username     目标用户名，NETID账号
     *
     * @return string
     */
    public function getStuByUsername(string $username) {
        try {
            $response = $this->http()->get('check_stu_pppoe_log_utf8.php', [
                'query' => [
                    'username' => $username
                ]
            ]);
            return $response->getBody()->getContents();
        } catch(RequestException $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                return $response->getStatusCode() . ' ' . $response->getReasonPhrase();
            }
            return 'Exception: ' . $e->getCode();
        }
    }

    /**
     * 根据用户名获取WENET日志.
     *
     * @param  string   $username     目标用户名，WENET账号
     *
     * @return string
     */
    public function getWenetByUsername(string $username) {
        try {
            $response = $this->http()->get('check_wenet_pppoe_log.php', [
                'query' => [
                    'account' => $username
                ]
            ]);
            return $this->parseResponse($response);
        } catch(RequestException $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                return $response->getStatusCode() . ' ' . $response->getReasonPhrase();
            }
            return 'Exception: ' . $e->getCode();
        }
    }

    /**
     * 根据用户名获取WLAN日志.
     *
     * @param  string   $username     目标用户名，WLAN账号
     *
     * @return string
     */
    public function getWlanByUsername(string $username) {
        try {
            $response = $this->http()->get('check_stu_wlan_log_utf8.php', [
                'query' => [
                    'username' => $username
                ]
            ]);
            return $response->getBody()->getContents();
        } catch(RequestException $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                return $response->getStatusCode() . ' ' . $response->getReasonPhrase();
            }
            return 'Exception: ' . $e->getCode();
        }
    }
}