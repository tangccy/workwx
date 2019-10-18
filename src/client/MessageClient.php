<?php
/**
 * Created by phpstorm.
 * Author：kanin <990921093@qq.com>
 * Date: 2019/10/12
 * Time: 18:21
 */

namespace sdf\workwx\client;


use sdf\workwx\tool\HttpClient;
use sdf\workwx\WorkWxBase;

/**
 * 通知
 *
 * Class NotifyClient
 * @package sdf\workwx\client
 */
class MessageClient extends WorkWxBase
{
    public function __construct($corpId = '', $secret = '',int $agentId = null)
    {
        parent::__construct($corpId, $secret, $agentId);
    }

    /**
     * 发送
     * Author：kanin <990921093@qq.com>
     * Date: 2019/10/17
     * Time: 17:57
     *
     * @param string $access_token
     * @param string $user 指定用户可以看到, 多个用户用 | 隔开,如: "UserId1|UserId2|UserId3"
     * @param string $text
     * @return array
     * @throws \sdf\workwx\exception\WorkWxApiExcetion
     */
    public function sendText(string $access_token, string $user, string $text)
    {
        $data = [
            "touser" => $user,
            "msgtype" => "text",
            "agentid" => $this->agentId,
            "text" => [
                "content" => $text
            ],
            "safe" => 0,
            "enable_id_trans" => 0
        ];
        $url = $this->baseUrl . '/message/send?access_token=' . $access_token;

        $result = HttpClient::initialize($url)->post($data);

        return $result;
    }
}