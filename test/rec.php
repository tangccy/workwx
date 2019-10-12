<?php
/**
 * Created by phpstorm.
 * Author：kanin <990921093@qq.com>
 * Date: 2019/10/12
 * Time: 15:40
 */
ini_set('display_errors', 'on');
require "../vendor/autoload.php";

use sdf\workwx\exception\WorkWxExcetion;

$corpid = 'wwxxxxxxxx';
$secret = 'tg6xxxxxxxxxxxx';
$agentId = '10xxxxx';

try {
    $loginClient = new \sdf\workwx\client\UserClient($corpid, $secret, $agentId);
    $token = $loginClient->getAccessToken();
    $code = $_GET['code'];
    $data = $loginClient->getUserInfo($token, $code);
    var_dump($data);
} catch (WorkWxExcetion $exception) {
    var_dump($exception->getMessage());
} catch (\Exception $exception) {
    var_dump($exception->getMessage());
}
