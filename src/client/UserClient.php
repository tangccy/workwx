<?php
/**
 * Created by phpstorm.
 * Author：kanin <990921093@qq.com>
 * Date: 2019/10/12
 * Time: 14:10
 */

namespace sdf\workwx\client;

use sdf\workwx\tool\HttpClient;
use sdf\workwx\WorkWxBase;

class UserClient extends WorkWxBase
{
    /**
     * UserClient constructor.
     * @param string $corpId
     * @param string $secret
     * @param string $agentId
     * @throws \sdf\workwx\exception\WorkWxExcetion
     * @return array
     */
    public function __construct($corpId = '', $secret = '', $agentId = '')
    {
        parent::__construct($corpId, $secret, $agentId);
    }

    /**
     * 获取用户信息
     *
     * Author：kanin <990921093@qq.com>
     * Date: 2019/10/12
     * Time: 18:02
     *
     * @param $accessToken
     * @param $code
     * @return array
     */
    public function getUserInfo($accessToken, $code)
    {
        $url = "https://qyapi.weixin.qq.com/cgi-bin/user/getuserinfo?access_token={$accessToken}&code={$code}";

        $data =  HttpClient::initialize($url)::get();

        return json_decode($data, true);
    }
}