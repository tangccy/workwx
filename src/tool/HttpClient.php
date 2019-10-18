<?php
/**
 * Created by phpstorm.
 * Author：kanin <990921093@qq.com>
 * Date: 2019/10/12
 * Time: 16:49
 */

namespace sdf\workwx\tool;

use sdf\workwx\exception\WorkWxApiExcetion;
use sdf\workwx\exception\WorkWxExcetion;

/**
 * 简单的http请求
 *
 * Class HttpClient
 * @package sdf\workwx\tool
 */
class HttpClient
{
    /**
     * curl 资源
     *
     * @var
     */
    protected static $curl;

    /**
     * 初始化
     *
     * Author：kanin <990921093@qq.com>
     * Date: 2019/10/14
     * Time: 9:30
     *
     * @param $url
     * @param int $timeOut
     * @param array $header
     * @return HttpClient
     */
    public static function initialize($url, $timeOut = 5000, $header = ['Expect:'])
    {
        if (!is_resource(self::$curl)) {
            //初始化
            self::$curl = curl_init();
            //设置抓取的url
            curl_setopt(self::$curl, CURLOPT_URL, $url);
            //设置获取的信息以文件流的形式返回，而不是直接输出。
            curl_setopt(self::$curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt(self::$curl, CURLOPT_HTTPHEADER, $header);

            curl_setopt(self::$curl, CURLOPT_NOSIGNAL, 1);//注意，毫秒超时一定要设置这个
            curl_setopt(self::$curl, CURLOPT_TIMEOUT_MS, $timeOut);//3秒 超时毫秒，

            curl_setopt(self::$curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt(self::$curl, CURLOPT_SSL_VERIFYHOST, false);
        }

        return new self();
    }

    /**
     * get请求
     *
     * Author：kanin <990921093@qq.com>
     * Date: 2019/10/17
     * Time: 9:55
     *
     * @return mixed
     * @throws WorkWxApiExcetion
     */
    public function get()
    {

        curl_setopt(self::$curl, CURLOPT_POST, 0);


        return self::execute();
    }

    /**
     * post请求
     *
     * Author：kanin <990921093@qq.com>
     * Date: 2019/10/17
     * Time: 9:53
     *
     * @param array $data
     * @return array
     * @throws WorkWxApiExcetion
     */
    public function post($data = [])
    {
        //设置post方式提交
        curl_setopt(self::$curl, CURLOPT_POST, 1);
        //设置post数据
        curl_setopt(self::$curl, CURLOPT_POSTFIELDS, json_encode($data));

        $data = self::execute();

        return  $data;
    }

    /**
     * 执行
     *
     * Author：kanin <990921093@qq.com>
     * Date: 2019/10/17
     * Time: 9:53
     *
     * @return array
     * @throws WorkWxApiExcetion
     */
    protected static function execute()
    {
        //执行命令
        $data = curl_exec(self::$curl);

        //关闭URL请求
        curl_close(self::$curl);

        if (!empty($data['errcode']) && $data['errcode'] != 0) {
            throw new WorkWxApiExcetion($data['errmsg'], $data['errcode']);
        }

        return json_decode($data, true);
    }
}