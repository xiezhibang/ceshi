<?php

$file = storage_path('logs/wechat.log');

return [
    'pay' => [
        'appid' => '2222', // APP APPID
        'mch_id' => '222',
        'key' => '2222',
        'notify_url' => '',
        //'cert_client' => $cert_client, // optional，退款等情况时用到
        //'cert_key' => $cert_key,// optional，退款等情况时用到
        'log' => [ // optional
            'file' => $file,
            'level' => 'info', // 建议生产环境等级调整为 info，开发环境为 debug
            'type' => 'single', // optional, 可选 daily.
            'max_file' => 30, // optional, 当 type 为 daily 时有效，默认 30 天
        ],
        'http' => [ // optionala
            'timeout' => 5.0,
            'connect_timeout' => 5.0,
            // 更多配置项请参考 [Guzzle](https://guzzle-cn.readthedocs.io/zh_CN/latest/request-options.html)
        ],
    ]
];