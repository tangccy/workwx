<?php
ini_set('display_errors', 'on');
require "../vendor/autoload.php";

use sdf\workwx\exception\WorkWxExcetion;

$corpid = '';
$secret = '';
$contact_secret = '';
$agentId = 1000001;

try {
    $userId = "TangJiaNing";
    $client = \sdf\workwx\WorkWxClient::initialize($corpid, $secret, $agentId)->messageClient();
    $token = "zZr2y0TCWin1G8TtSY5W_06cIpnmoAl_nhIzGfvZ9aQEXoEJ_2JFE8a7vK8KjzESCgGzxAxz7PLKaQ6h9VjVuY4WtvWkyc4YpJctNmP-46H0VUZ1VHrl3Nzbkme_mjoajoawelvlKn3Iguf7PaVuiwo2ywG4Y_DjjKzmqSkOamsSuTP805Lk9NtxUKfFa7Sw3xjRojEYTAVSgrmqLrL78w";
//    $token = $client->getAccessToken();
    $text = "@你的大白 你的快递已到，请携带工卡前往邮件中心领取。出发前可查看<a href=\"http://work.weixin.qq.com\">邮件中心视频实况</a>，聪明避开排队。";
    $data = $client->sendText($token, $userId, );
    print_r($data);
} catch (WorkWxExcetion $exception) {
    var_dump($exception->getMessage());
} catch (\Exception $exception) {
    var_dump($exception->getMessage());
}
