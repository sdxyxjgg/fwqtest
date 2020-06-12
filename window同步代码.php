<?php
//自配window系统，需要先安装git软件
$secret = "secret";
$path = 'C:/Program Files/Git/bin';
$dir = '上传的项目存放的路径';
$signature = $_SERVER['HTTP_X_HUB_SIGNATURE'];

if ($signature) {
    $hash = "sha1=" . hash_hmac('sha1', file_get_contents("php://input"), $secret);
    if (strcmp($signature, $hash) == 0) {
        echo shell_exec("rmdir /q /s {$dir}"); //下载前先清空一下文件夹，否则会下载失败
        echo shell_exec("cd {$path} && git clone https://github.com/sdxyxjgg/fwqtest.git {$dir}");
        exit();
    }
}

http_response_code(404);
