<?php
ini_set('display_errors', 'on');
require "../vendor/autoload.php";

use sdf\workwx\exception\WorkWxExcetion;

$corpid = '';
$secret = '';
$agentId = 1000001;

try {
    $url = \sdf\workwx\WorkWxClient::initialize($corpid, $secret, $agentId)
        ->qrLoginClient()
        ->setRedirectUri('http://workwx.com/test/rec.php')
        ->getUrl();
    header("location:".$url);
} catch (WorkWxExcetion $exception) {
    var_dump($exception->getMessage());
} catch (\Exception $exception) {
    var_dump($exception->getMessage());
}
