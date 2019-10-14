<?php
/**
 * Created by phpstorm.
 * Author：kanin <990921093@qq.com>
 * Date: 2019/10/12
 * Time: 14:19
 */
namespace sdf\workwx;

use sdf\workwx\exception\ErrorCode;
use sdf\workwx\exception\WorkWxExcetion;
use sdf\workwx\tool\HttpClient;

/**
 * 基础类
 *
 * Class workwx
 * @package sdf\workwx
 */
abstract class WorkWxBase
{
    /**
     * 企业id
     *
     * @var string
     */
    protected $corpId = '';

    /**
     * 应用凭证秘钥
     *
     * @var string
     */
    protected $secret = '';

    /**
     * 授权方的网页应用ID
     * @var string
     */
    protected $agentId = '';

    /**
     * WorkWxBase constructor.
     *
     * WorkWxBase constructor.
     * @param string $corpId 企业id
     * @param string $secret 应用签名
     * @param string $agentId 应用id
     * @throws WorkWxExcetion
     */
    public function __construct($corpId = '', $secret = '', $agentId = '')
    {
        if (empty($corpId)) {
            throw new WorkWxExcetion('corpId不能为空', ErrorCode::CORP_ID_EMPTY);
        }
        if (empty($secret)) {
            throw new WorkWxExcetion('secret不能为空', ErrorCode::SECRET_EMPTY);
        }
        if (empty($agentId)) {
            throw new WorkWxExcetion('agentId不能为空', ErrorCode::AGENT_ID_EMPTY);
        }

        $this->corpId = $corpId;
        $this->secret = $secret;
        $this->agentId = $agentId;
    }

    /**
     * 获取token
     *
     * Author：kanin <990921093@qq.com>
     * Date: 2019/10/12
     * Time: 17:11
     *
     * @return array|bool|string
     */
    public function getAccessToken()
    {
        $url = "https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid={$this->corpId}&corpsecret={$this->secret}";

        $tokenTemp = HttpClient::initialize($url)->get();

        $tokenTempArr = json_decode($tokenTemp, 1);

        return $tokenTempArr['access_token'];
    }
}
