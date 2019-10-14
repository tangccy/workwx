<?php
ini_set('display_errors', 'on');
require "../vendor/autoload.php";

use sdf\workwx\exception\WorkWxExcetion;

$corpid = 'ww1b0f2d1180d85f64';
$secret = 'tg6OPTwzBS0j5k6477qi5ri-UFhnEO00EcqKuWuM5TY';
$agentId = '1000024';


try {
    $loginClient = new \sdf\workwx\client\QrLoginClient($corpid, $secret, $agentId);
    $url = $loginClient->setRedirectUri('http://workwx.com/test/rec.php')->getUrl();
    var_dump($url);
} catch (WorkWxExcetion $exception) {
    var_dump($exception->getMessage());
} catch (\Exception $exception) {
    var_dump(2333);
    var_dump($exception->getMessage());
}
