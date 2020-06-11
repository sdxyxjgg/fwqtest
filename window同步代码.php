<?php
//自配window系统，需要先安装git软件
$secret = "secret";
$path = 'C:/Program Files/Git/bin';
$signature = $_SERVER['HTTP_X_HUB_SIGNATURE'];

if ($signature) {
    $hash = "sha1=" . hash_hmac('sha1', file_get_contents("php://input"), $secret);
    if (strcmp($signature, $hash) == 0) {
        echo shell_exec("cd {$path} && git clone https://github.com/sdxyxjgg/fwqtest.git 路径");
        exit();
    }
}

http_response_code(404);
