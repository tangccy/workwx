# 企业微信SDK

##### 配置
```php
$corpid = '';//企业id
$secret = '';//企业应用秘钥
$contact_secret = '';//通讯录秘钥
$agentId ='';//企业应用id
```

#### 生成扫码地址

```php

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

```


##### 获取access_token 和 获取登录用户资料

```php

try {
    $client = \sdf\workwx\WorkWxClient::initialize($corpid, $secret, $agentId);
    $token = $client->userClientInit()->getAccessToken();
    $code = $_GET['code'];
    $data = $client->userClientInit()->getUserInfo($token, $code);
    var_dump($data);
} catch (WorkWxExcetion $exception) {
    var_dump($exception->getMessage());
} catch (\Exception $exception) {
    var_dump($exception->getMessage());
}
```

##### 获取通讯录的部门列表

```php

try {
    $client = \sdf\workwx\WorkWxClient::initialize($corpid, $contact_secret, $agentId)->departmentClient();
    $token = $client->getAccessToken();
    $data = $client->getDepartment($token);
    var_dump($data);
} catch (WorkWxExcetion $exception) {
    var_dump($exception->getMessage());
} catch (\Exception $exception) {
    var_dump($exception->getMessage());
}
```

##### 获取通讯录的部门用户列表

```php


try {
    
    $client = \sdf\workwx\WorkWxClient::initialize($corpid, $contact_secret, $agentId)->departmentClient();
    
    $token = $client->getAccessToken();
    
    //获取详细的列表
    $data = $client->getUserList($token);
    
    //获取简单列表    
    $data = $client->getSimpleUserList($token);

} catch (WorkWxExcetion $exception) {
    var_dump($exception->getMessage());
} catch (\Exception $exception) {
    var_dump($exception->getMessage());
}
```
##### 发送应用文本消息

```php
try {
    $userId = "DaBai";
    $client = \sdf\workwx\WorkWxClient::initialize($corpid, $secret, $agentId)->messageClient();
    $token = $client->getAccessToken();
    $text = "@你的大白 你的快递已到，请携带工卡前往邮件中心领取。出发前可查看<a href=\"http://work.weixin.qq.com\">邮件中心视频实况</a>，聪明避开排队。";
    $data = $client->sendText($token, $userId, $text);
    print_r($data);
} catch (WorkWxExcetion $exception) {
    var_dump($exception->getMessage());
} catch (\Exception $exception) {
    var_dump($exception->getMessage());
}
```

