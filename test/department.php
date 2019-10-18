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
    $client = \sdf\workwx\WorkWxClient::initialize($corpid, $contact_secret, $agentId)->departmentClient();
    $token = $client->getAccessToken();
    $data = $client->getDepartment($token);
    var_dump($data);
} catch (WorkWxExcetion $exception) {
    var_dump($exception->getMessage());
} catch (\Exception $exception) {
    var_dump($exception->getMessage());
}
