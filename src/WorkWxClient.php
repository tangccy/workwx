<?php
/**
 * Created by phpstorm.
 * Author：kanin <990921093@qq.com>
 * Date: 2019/10/14
 * Time: 14:35
 */

namespace sdf\workwx;


use sdf\workwx\client\DepartmentClient;
use sdf\workwx\client\MessageClient;
use sdf\workwx\client\QrLoginClient;
use sdf\workwx\client\UserClient;


/**
 * 入口文件
 *
 * Class WorkWxClient
 * @package sdf\workwx
 */
class WorkWxClient
{
    /**
     * @var
     */
    protected static $userClient;

    /**
     * @var
     */
    protected static $qrLoginClient;

    /**
     * @var
     */
    protected static $messageClient;

    /**
     * @var
     */
    protected static $departmentClient;

    /**
     * 企业id
     *
     * @var string
     */
    protected static $corpId = '';

    /**
     * 应用凭证秘钥
     *
     * @var string
     */
    protected static $secret = '';

    /**
     * 授权方的网页应用ID
     * @var string
     */
    protected static $agentId;

    /**
     * 实例化
     * Author：kanin <990921093@qq.com>
     * Date: 2019/10/14
     * Time: 14:56
     *
     * @param $corpId
     * @param $secret
     * @param $agentId
     * @return WorkWxClient
     */
    public static function initialize($corpId, $secret, $agentId)
    {
        self::$corpId = $corpId;
        self::$secret = $secret;
        self::$agentId = $agentId;

        return new self();
    }

    /**
     * 实例化用户接口
     * Author：kanin <990921093@qq.com>
     * Date: 2019/10/14
     * Time: 14:42
     *
     * @return UserClient
     * @throws exception\WorkWxExcetion
     */
    public function userClientInit()
    {
        if (!is_object(self::$userClient)) {
            self::$userClient = new UserClient(self::$corpId, self::$secret, self::$agentId);
        }

        return self::$userClient;
    }


    /**
     * 登录实例
     *
     * Author：kanin <990921093@qq.com>
     * Date: 2019/10/14
     * Time: 14:47
     *
     * @return QrLoginClient
     * @throws exception\WorkWxExcetion
     */
    public function qrLoginClient()
    {
        if (!is_object(self::$qrLoginClient)) {
            self::$qrLoginClient = new QrLoginClient(self::$corpId, self::$secret, self::$agentId);
        }

        return self::$qrLoginClient;
    }

    /**
     * 通知实例
     *
     * Author：kanin <990921093@qq.com>
     * Date: 2019/10/14
     * Time: 14:47
     *
     * @return MessageClient
     * @throws exception\WorkWxExcetion
     */
    public function messageClient()
    {
        if (!is_object(self::$messageClient)) {
            self::$messageClient = new MessageClient(self::$corpId, self::$secret, self::$agentId);
        }

        return self::$messageClient;
    }

    /**
     * 部门实例
     *
     * Author：kanin <990921093@qq.com>
     * Date: 2019/10/17
     * Time: 9:32
     *
     * @return DepartmentClient
     * @throws exception\WorkWxExcetion
     */
    public function departmentClient()
    {
        if (!is_object(self::$departmentClient)) {
            self::$departmentClient = new DepartmentClient(self::$corpId, self::$secret, self::$agentId);
        }

        return self::$departmentClient;
    }
}