# 企业微信SDK

#### 生成扫码地址

```php
$corpid = 'wwxxxxxxxx';
$secret = 'tg6xxxxxxxxxxxx';
$agentId = '10xxxxx';

try {
    $loginClient = new \sdf\workwx\client\QrLoginClient($corpid, $secret, $agentId);
    $url = $loginClient->setRedirectUri('http://example.com/test/rec.php')->getUrl();
    var_dump($url);
} catch (WorkWxExcetion $exception) {
    var_dump($exception->getMessage());
} catch (\Exception $exception) {
    var_dump(2333);
    var_dump($exception->getMessage());
}
```

##### 回调接收 获取access_token 和 用户资料

```php
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
```

