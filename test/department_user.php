<?php
ini_set('display_errors', 'on');
require "../vendor/autoload.php";

use sdf\workwx\exception\WorkWxExcetion;

$corpid = '';
$secret = '';
$contact_secret = '';
$agentId = 1000001;

try {
    $client = \sdf\workwx\WorkWxClient::initialize($corpid, $contact_secret, $agentId)->departmentClient();
    $token = "822ck8ongZndOiHyjQ3su4ymhRKB6ydhblbd0IUaRCTevcliMSXWNfx8pFbypbOglIPx7WebW2ZBveifrLMhwQQGZZvSaUZrMoGTQs0B1bcFmWoB_UBOrG6iQdXgXIZk3IMQbPxpckI0_yMQwRgWm5eei5UwXHkA5EZf-fpSn29kYH4IN1FNz-AV92Z_aQ6VMIqMqwLs6uiTIkp_3JPwYA";
//    $token = $client->getAccessToken();
    $data = $client->getUserList($token);
//    $data = $client->getSimpleUserList($token);
    print_r($data);
} catch (WorkWxExcetion $exception) {
    var_dump($exception->getMessage());
} catch (\Exception $exception) {
    var_dump($exception->getMessage());
}
