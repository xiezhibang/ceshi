<?php
return [
//    // APPID
//    'app_id' => '2021001108679018',
//    // 支付宝 支付成功后 主动通知商户服务器地址  注意 是post请求
//    'notify_url' => 'http://zjl.gdweihu.com/api/V1/change/upgrade/pay/notify',
//    // 支付宝 支付成功后 回调页面 get
//   // 'return_url' => 'http://zjl.gdweihu.com/api/V1/change/alipay/return',
//    // 公钥（注意是支付宝的公钥，不是商家应用公钥）
//    'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA5fpzrY33qNwDwEAsFtcvZ/B8mzpvGWkPNqmR0SbT7gEJV2F5wI8qDF8Vzhhs+4wnPbp3zeroBr3WV+hFS70u6NqaCvcSKUTc8yrpLqlurEG6cEK/DirkNLeWiPXyWiec7ijIvyqOy4TLuQXH8OminpZbMrL4RwPfrLFE2/H5XBE1Yh0xHrf8mb8P0u5zsHoT8NPUwbDiqF6CdMRVQppPwEiACvrgmFWyU6BbB36K8vuwERx1uSDbE2mnYZEYVvcYF+IuESI0cKz2FHTg+pg2tLdPbq0qLlVIZhvxdZ3U0s0qagwnFLu5P38uUdwqK80a6T1sO6Fx648Ob6gN1e6iIwIDAQAB',
//    // 加密方式： **RSA2** 私钥 商家应用私钥
//    'private_key' => 'MIIEogIBAAKCAQEA5fpzrY33qNwDwEAsFtcvZ/B8mzpvGWkPNqmR0SbT7gEJV2F5wI8qDF8Vzhhs+4wnPbp3zeroBr3WV+hFS70u6NqaCvcSKUTc8yrpLqlurEG6cEK/DirkNLeWiPXyWiec7ijIvyqOy4TLuQXH8OminpZbMrL4RwPfrLFE2/H5XBE1Yh0xHrf8mb8P0u5zsHoT8NPUwbDiqF6CdMRVQppPwEiACvrgmFWyU6BbB36K8vuwERx1uSDbE2mnYZEYVvcYF+IuESI0cKz2FHTg+pg2tLdPbq0qLlVIZhvxdZ3U0s0qagwnFLu5P38uUdwqK80a6T1sO6Fx648Ob6gN1e6iIwIDAQABAoIBAB6yq7ZC+QgFNkr3RetWlfFd3IQr7KCLsYguYlR0xl1CriiHzmSxt38nQhXclM+PCb3nog5OiOI9fNsHGhjeC+DxLRbBnB7+HjAnTjD4VNmRfH13q2EMwKF40BNAITV/jCcOMp2x5JWuCDOOXf3+ccKRd2LxGMsB7V1z3Ckvx4VOVfbRicXM80EgSNZIFSGVgdHtu0GZQdC90YgbI0r2P5DvNQV1p2YHn63Ts0lUMlZUtDhYQWShyjcxD1mdC5hjiUJ6Vpz4CJckI8ffi9gM+5WzzoPszNES+iho/uvE17LrCZknILkDasKJpFzIMwR4cSMNfAgRmGa9RLecmBH6iSECgYEA82qNwgxGMd6bn/SQTTZ5gOSdKaMgAaXupf+afH231TYsd/UR+MxjKPcJSuRi3Kz/iQWR9jxM423Q7WAp5nXk557cRleW7Cj88Lq1X1KEW8vIEg9lWJ9NuYBeatnt428GG8Q3PDi8bLVCuE03sTt2f+dgc5mIgQRzlTihOvrDxWUCgYEA8d4OieWmUaKR/y+xvrd/AvgX2SRJYBK35pXNZADjk0MXwqb66Cg3MrLCzyQtP7L91W1ErqKLMVOP34CDfKK0ux/Wsy/tNkcUuFPqPWzSyHQhkTEQUAppcF0pWnS2+1ixvPAGBpjro+xRGE2NLyyjOs12dSJ1opU8nbXgUl8DNOcCgYBP6g+YQYdaIAdfwF8Pum6xjly6qr97SwrKnNwPOwb7jMmUqHS6BgAYFuKKH+kFIhbS2W1ONgXYNNl+1S9sZhA8qr8OqPr3lY1VSzb4kJK7wG9y3nMbYVGXMTnOQrYDERQkUYsAzm+uEORStacvHKKO41ubGDDkip2Xw/vK7UEQsQKBgG7h625inw4b5qzD08voWc0lqeE9lnn5+t82XBP1qF9RyenOHYcjMLMIavEF18y1JVOcJXmeQQvbEEFZrG4ONab34LkDRs+0ZJZguilw421MeDsU8DKRo2cE/rleeqjeL5W7wDd0EctzwnXOz+QJpceGfEEVDDL+Ee0HfZClyFWPAoGAY2/Q+ZGLuMQZJmmYfZdLNE678gyJBM4vrM1wFRUrz8jKm/8aG2/fUjowcntlxk0t5x32LbTcGOQU9mSllPASno9T11I9qbpKMpb5ClD98c6Oc9KlqGOBOLIF/a9zmJsoMAXGAw+J/TZQloQLldxZGKVCReSgibWUliPTGgCB9wI=',
//
//
//    'log' => [ // optional
//        'file' => storage_path('logs/charge_ali_pay.log'),
//        'level' => 'info', // 建议生产环境等级调整为 info，开发环境为 debug
//        'type' => 'single', // optional, 可选 daily.
//        'max_file' => 30, // optional, 当 type 为 daily 时有效，默认 30 天
//    ],
//    'http' => [
//        'timeout' => 5.0,
//        'connect_timeout' => 5.0,
//        // 更多配置项请参考 [Guzzle](https://guzzle-cn.readthedocs.io/zh_CN/latest/request-options.html)
//    ],
//    //'mode' => 'dev', // optional,设置此参数，将进入沙箱模式


    'pay'=>[

        'app_id'=>'2021001108679018',
        // 支付宝 支付成功后 主动通知商户服务器地址  注意 是post请求。服务器异步通知页面路径，根据自己项目路径做相应的修改。外网可访问的地址，本地不跳转
        'notify_url' => 'http://zjl.gdweihu.com/api/V1/change/order/wyalipay/notify',
        // 支付宝 支付成功后 回调页面 get//页面跳转同步通知页面路径。
        //'return_url' => 'http://jinghuajuanke.cn/#/pay_success',

        // 公钥（注意是支付宝的公钥，不是商家应用公钥）
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA5fpzrY33qNwDwEAsFtcvZ/B8mzpvGWkPNqmR0SbT7gEJV2F5wI8qDF8Vzhhs+4wnPbp3zeroBr3WV+hFS70u6NqaCvcSKUTc8yrpLqlurEG6cEK/DirkNLeWiPXyWiec7ijIvyqOy4TLuQXH8OminpZbMrL4RwPfrLFE2/H5XBE1Yh0xHrf8mb8P0u5zsHoT8NPUwbDiqF6CdMRVQppPwEiACvrgmFWyU6BbB36K8vuwERx1uSDbE2mnYZEYVvcYF+IuESI0cKz2FHTg+pg2tLdPbq0qLlVIZhvxdZ3U0s0qagwnFLu5P38uUdwqK80a6T1sO6Fx648Ob6gN1e6iIwIDAQAB',
        // 加密方式： **RSA2** 私钥 商家应用私钥
        'private_key' => 'MIIEogIBAAKCAQEA5fpzrY33qNwDwEAsFtcvZ/B8mzpvGWkPNqmR0SbT7gEJV2F5wI8qDF8Vzhhs+4wnPbp3zeroBr3WV+hFS70u6NqaCvcSKUTc8yrpLqlurEG6cEK/DirkNLeWiPXyWiec7ijIvyqOy4TLuQXH8OminpZbMrL4RwPfrLFE2/H5XBE1Yh0xHrf8mb8P0u5zsHoT8NPUwbDiqF6CdMRVQppPwEiACvrgmFWyU6BbB36K8vuwERx1uSDbE2mnYZEYVvcYF+IuESI0cKz2FHTg+pg2tLdPbq0qLlVIZhvxdZ3U0s0qagwnFLu5P38uUdwqK80a6T1sO6Fx648Ob6gN1e6iIwIDAQABAoIBAB6yq7ZC+QgFNkr3RetWlfFd3IQr7KCLsYguYlR0xl1CriiHzmSxt38nQhXclM+PCb3nog5OiOI9fNsHGhjeC+DxLRbBnB7+HjAnTjD4VNmRfH13q2EMwKF40BNAITV/jCcOMp2x5JWuCDOOXf3+ccKRd2LxGMsB7V1z3Ckvx4VOVfbRicXM80EgSNZIFSGVgdHtu0GZQdC90YgbI0r2P5DvNQV1p2YHn63Ts0lUMlZUtDhYQWShyjcxD1mdC5hjiUJ6Vpz4CJckI8ffi9gM+5WzzoPszNES+iho/uvE17LrCZknILkDasKJpFzIMwR4cSMNfAgRmGa9RLecmBH6iSECgYEA82qNwgxGMd6bn/SQTTZ5gOSdKaMgAaXupf+afH231TYsd/UR+MxjKPcJSuRi3Kz/iQWR9jxM423Q7WAp5nXk557cRleW7Cj88Lq1X1KEW8vIEg9lWJ9NuYBeatnt428GG8Q3PDi8bLVCuE03sTt2f+dgc5mIgQRzlTihOvrDxWUCgYEA8d4OieWmUaKR/y+xvrd/AvgX2SRJYBK35pXNZADjk0MXwqb66Cg3MrLCzyQtP7L91W1ErqKLMVOP34CDfKK0ux/Wsy/tNkcUuFPqPWzSyHQhkTEQUAppcF0pWnS2+1ixvPAGBpjro+xRGE2NLyyjOs12dSJ1opU8nbXgUl8DNOcCgYBP6g+YQYdaIAdfwF8Pum6xjly6qr97SwrKnNwPOwb7jMmUqHS6BgAYFuKKH+kFIhbS2W1ONgXYNNl+1S9sZhA8qr8OqPr3lY1VSzb4kJK7wG9y3nMbYVGXMTnOQrYDERQkUYsAzm+uEORStacvHKKO41ubGDDkip2Xw/vK7UEQsQKBgG7h625inw4b5qzD08voWc0lqeE9lnn5+t82XBP1qF9RyenOHYcjMLMIavEF18y1JVOcJXmeQQvbEEFZrG4ONab34LkDRs+0ZJZguilw421MeDsU8DKRo2cE/rleeqjeL5W7wDd0EctzwnXOz+QJpceGfEEVDDL+Ee0HfZClyFWPAoGAY2/Q+ZGLuMQZJmmYfZdLNE678gyJBM4vrM1wFRUrz8jKm/8aG2/fUjowcntlxk0t5x32LbTcGOQU9mSllPASno9T11I9qbpKMpb5ClD98c6Oc9KlqGOBOLIF/a9zmJsoMAXGAw+J/TZQloQLldxZGKVCReSgibWUliPTGgCB9wI=',

        'log'=>[

            'file'=>'../storage/logs/alipay.log',

            'level'=>'info',//建设生产环境下info，开发环境下debug

            'type'=>'single',//optional 可选daily

            'max_file'=>30 //optional 当type是daily时有效，默认是30天

        ],

        'http'=>[

            'timeout'=>5.0,

            'connect_timeout'=>5.0,

        ],

    ]
];