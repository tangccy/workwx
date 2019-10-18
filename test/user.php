<?php
ini_set('display_errors', 'on');
require "../vendor/autoload.php";

use sdf\workwx\exception\WorkWxExcetion;

$corpid = '';
$secret = '';
$contact_secret = '';
$agentId = 1000001;

try {
    $client = \sdf\workwx\WorkWxClient::initialize($corpid, $contact_secret, $agentId)->userClientInit();
    $code = $_GET['code'];
    $data = $client->getUserInfo($token, $code);
    var_dump($data);
} catch (WorkWxExcetion $exception) {
    var_dump($exception->getMessage());
} catch (\Exception $exception) {
    var_dump($exception->getMessage());
}
