<?php
/**
 * Created by phpstorm.
 * Author：kanin <990921093@qq.com>
 * Date: 2019/10/12
 * Time: 18:21
 */

namespace sdf\workwx\client;


use sdf\workwx\WorkWxBase;

/**
 * 通知
 *
 * Class NotifyClient
 * @package sdf\workwx\client
 */
class NotifyClient extends WorkWxBase
{
    public function __construct($corpId = '', $secret = '', $agentId = '')
    {
        parent::__construct($corpId, $secret, $agentId);
    }
}