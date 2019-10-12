<?php
/**
 * Created by phpstorm.
 * Author：kanin <990921093@qq.com>
 * Date: 2019/10/12
 * Time: 14:10
 */
namespace sdf\workwx\client;

use sdf\workwx\exception\ErrorCode;
use sdf\workwx\exception\WorkWxExcetion;
use sdf\workwx\WorkWxBase;

/**
 * 扫码登录
 *
 * Class QrLoginClient
 * @package sdf\workwx\client
 */
class QrLoginClient extends WorkWxBase
{

    protected $baseUrl = "https://open.work.weixin.qq.com/wwopen/sso/qrConnect?appid=%s&agentid=%s&redirect_uri=%s&state=%s";

    protected $redirectUri = '';//回调地址


    protected $state = '';//防串改校验


    public function __construct($corpId = '', $secret = '', $agentId = '')
    {
        parent::__construct($corpId,  $secret, $agentId);
    }

    /**
     * 设置回调地址
     * Author：kanin <990921093@qq.com>
     * Date: 2019/10/12
     * Time: 15:31
     *
     * @param $url
     * @return $this
     *
     */
    public function setRedirectUri($url)
    {
        $this->redirectUri = urlencode($url);
        return $this;
    }

    /**
     * 设置防串改字符
     *
     * Author：kanin <990921093@qq.com>
     * Date: 2019/10/12
     * Time: 16:23
     *
     * @param $state
     * @return $this
     *
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * 组装扫码跳转地址
     *
     * Author：kanin <990921093@qq.com>
     * Date: 2019/10/12
     * Time: 16:24
     *
     * @return string
     * @throws WorkWxExcetion
     *
     */
    public function getUrl()
    {
        if ($this->redirectUri == '') {
            throw new WorkWxExcetion('未设置回调地址', ErrorCode::LOGIN_REDIRECT_NOT_FOUND);
        }

        if (!$this->state) {
            $this->state = rand(10000, 99999);
        }

        $this->baseUrl = sprintf($this->baseUrl, $this->corpId, $this->agentId, $this->redirectUri, $this->state);

        return $this->baseUrl;
    }
}