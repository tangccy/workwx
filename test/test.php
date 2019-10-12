<?php
ini_set('display_errors', 'on');
require "../vendor/autoload.php";

use sdf\workwx\exception\WorkWxExcetion;

$corpid = 'wwxxxxxxxx';
$secret = 'tg6xxxxxxxxxxxx';
$agentId = '10xxxxx';

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
