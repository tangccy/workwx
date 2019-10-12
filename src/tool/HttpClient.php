<?php
/**
 * Created by phpstorm.
 * Author：kanin <990921093@qq.com>
 * Date: 2019/10/12
 * Time: 16:49
 */

namespace sdf\workwx\tool;


class HttpClient
{
    protected static $curl;

    public static function initialize($url, $timeOut = 5000, $header = ['Expect:'])
    {
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

        return new self();
    }

    /**
     * get请求
     *
     * Author：kanin <990921093@qq.com>
     * Date: 2019/10/12
     * Time: 17:02
     *
     * @return mixed
     */
    public static function get()
    {

        curl_setopt(self::$curl, CURLOPT_POST, 0);

        //执行命令
        $data = curl_exec(self::$curl);

        //关闭URL请求
        curl_close(self::$curl);

        return $data;
    }

    /**
     * post请求
     *
     * Author：kanin <990921093@qq.com>
     * Date: 2019/10/12
     * Time: 17:02
     *
     * @param array $data
     * @return bool|string
     */
    public static function post($data = [])
    {
        //设置post方式提交
        curl_setopt(self::$curl, CURLOPT_POST, 1);
        //设置post数据
        curl_setopt(self::$curl, CURLOPT_POSTFIELDS, json_encode($data));

        return self::execute();
    }

    /**
     * 执行
     *
     * Author：kanin <990921093@qq.com>
     * Date: 2019/10/12
     * Time: 17:04
     *
     * @return bool|string
     */
    protected static function execute()
    {
        //执行命令
        $data = curl_exec(self::$curl);

        //关闭URL请求
        curl_close(self::$curl);

        return $data;
    }
}