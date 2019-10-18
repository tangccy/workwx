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
class DepartmentClient extends WorkWxBase
{
    public function __construct($corpId = '', $secret = '', $agentId = '')
    {
        parent::__construct($corpId, $secret, $agentId);
    }

    /**
     * 获取部门
     *
     * Author：kanin <990921093@qq.com>
     * Date: 2019/10/17
     * Time: 15:51
     *
     * @param $token
     * @param int|null $pid
     * @return mixed
     * @throws \sdf\workwx\exception\WorkWxApiExcetion
     */
    public function getDepartment($token, int $pid = 0)
    {

        $param['access_token'] = $token;
        if ($pid) {
            $param['id'] = $pid;
        }
        $url = $this->baseUrl.'/department/list?'.http_build_query($param);

        $data = HttpClient::initialize($url)->get();

        return $data;
    }

    /**
     * 获取部门成员
     *
     * Author：kanin <990921093@qq.com>
     * Date: 2019/10/17
     * Time: 16:45
     *
     * @param $token
     * @param int $departmentId
     * @param int $fetchChild
     * @return mixed
     * @throws \sdf\workwx\exception\WorkWxApiExcetion
     */
    public function getUserList($token, $departmentId = 1, $fetchChild = 1)
    {
        $param['access_token'] = $token;
        $param['department_id'] = $departmentId;
        $param['fetch_child'] = $fetchChild;

        $url = $this->baseUrl . '/user/list?'.http_build_query($param);

        $data = HttpClient::initialize($url)->get();

        return $data;
    }
    /**
     * 获取部门成员
     *
     * Author：kanin <990921093@qq.com>
     * Date: 2019/10/17
     * Time: 16:45
     *
     * @param $token
     * @param int $departmentId
     * @param int $fetchChild
     * @return mixed
     * @throws \sdf\workwx\exception\WorkWxApiExcetion
     */
    public function getSimpleUserList($token, $departmentId = 1, $fetchChild = 1)
    {
        $param['access_token'] = $token;
        $param['department_id'] = $departmentId;
        $param['fetch_child'] = $fetchChild;

        $url = $this->baseUrl . '/user/simplelist?'.http_build_query($param);

        $data = HttpClient::initialize($url)->get();

        return $data;
    }
}