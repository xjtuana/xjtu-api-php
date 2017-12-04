<?php

namespace Xjtuana\XjtuApi\Api;

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
     * 根据用户名获取PPPOE日志.
     *
     * @param  string   $username     目标用户名，NETID/PPPOE账号
     *
     * @return string
     */
    public function getByUsername(string $username) {
        try {
            $response = $this->http()->get( 'check_stu_pppoe_log.php', [
                'query' => [
                    'username' => $username
                ]
            ] );
            return utf8_encode($response->getBody()->getContents());
        } catch(RequestException $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                return $response->getStatusCode() . ' ' . $response->getReasonPhrase();
            }
            return 'Exception: ' . $e->getCode();
        }
    }

}