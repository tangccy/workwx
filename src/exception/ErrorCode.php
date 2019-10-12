<?php
/**
 * Created by phpstorm.
 * Author：kanin <990921093@qq.com>
 * Date: 2019/10/12
 * Time: 14:19
 */

namespace sdf\workwx\exception;


abstract class ErrorCode
{

    /**
     * 回调地址没有设置
     */
    const LOGIN_REDIRECT_NOT_FOUND = 1001;

    /**
     * corpid为空
     */
    const CORP_ID_EMPTY = 1002;

    /**
     * secret为空
     */
    const SECRET_EMPTY = 1003;

    /**
     * agentID为空
     */
    const AGENT_ID_EMPTY = 1004;

    /**
     * redis地址不能为空
     */
    const REDIS_HOST_EMPTY = 1005;
}