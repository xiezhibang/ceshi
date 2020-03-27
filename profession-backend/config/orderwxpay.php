<?php
return [
    // APP APPID
    'appid' => 'wxed44395404258a7c',
    //公众号 APPID
    'app_id' => 'wxb3fxxxxxxxxxxx',
    //小程序 APPID
    'miniapp_id' => 'wxb3fxxxxxxxxxxx',
    //AppSecret
    'app_secret' => '3056dbbaf4800b1c9e1890b2e041ee0c',
    //小程序授权的url
    'auth_url' => "https://api.weixin.qq.com/sns/jscode2session?appid=%s&secret=%s&js_code=%s&grant_type=authorization_code",
    //商户号
    'mch_id' => '1437385102',
    //API密钥
    'key' => 'UH2dBB55fsAm8w746f5fgM1eTIBJ87KL',
    //回调
    'notify_url' => 'http://zjl.gdweihu.com/api/V1/change/order/wxpay/notify',
    //证书
    'cert_client' => resource_path('cert/apiclient_cert.pem'),
    'cert_key'    => resource_path('cert/apiclient_key.pem'),
    //日志
    'log' => [
        'file' => storage_path('logs/wechatorderpay.log')
    ],
    //自动退款时间，30天
    'refunde_time' => 10
];