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

        'app_id'=>'2018102361798295',
        // 支付宝 支付成功后 主动通知商户服务器地址  注意 是post请求。服务器异步通知页面路径，根据自己项目路径做相应的修改。外网可访问的地址，本地不跳转
        'notify_url' => 'http://zjl.gdweihu.com/api/V1/change/upgrade/pay/notify',
        // 支付宝 支付成功后 回调页面 get//页面跳转同步通知页面路径。
        //'return_url' => 'http://jinghuajuanke.cn/#/pay_success',

        // 公钥（注意是支付宝的公钥，不是商家应用公钥）
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAgAjLcCMMUZW36iBafMco8H4V89BOW6yM0Us/0TrL3MYiXnXrTFRagS3IaCMEXOfNdAO1HFNBEb8LX6QiHYQOeLPOTevyf+jNQIXJTmXdEru/nwWcCX4R8BbEwktEQilM9xJ6XoQ8dy6YH3OgcM8hZguIL/7ugThxVpgDdcmBejW3S69EtsGKgTjVgOA4yqc1ypPF5vOJQVeWPF4NxmVaUJYZuQSh4f/cMb4QmGfEQw+/6DTGg8we1XNIukgQ86V6lndrnQp8yWq00XRUoxP8BYDEC39UQU0I79vBueSmvTiSJZ4X30t48i2ztrmfyrfwq/G6u549cO4WGZ0FpN0L1wIDAQAB',
        // 加密方式： **RSA2** 私钥 商家应用私钥
        'private_key' => 'MIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQDeSW0GlPRk5YIgUsx4pdYWeUjKkv77O0peFJBvClXst/FjSEzHoDZvgmgpYHbZFvgXam4KzglPmqq0HlRjBwx2DRv7/hLWCSTKZmVU2GlhKVfJZxtoH5eZQaGAds/3KFHlSVFpJqB+tp8pZZzN2/korTyM7w5xxC+JuHQ1QVHdvYygiUD7YDg8cXIPMJgbUveWtS3Vt44fsVmTng9wIYkDB2QyZraF3q/z2/zwpSikQ52X0YVYn1Q+lEYP/zk2gglQRx70T1lqstzArbtsuMG+qIqS4CP2lphKGzsuGYoFMlR9lAPS+3PkX50LI2ybUtB3k2c8q50MnolR5ggVV5enAgMBAAECggEAQb4nr7WoXpr+lH7ImLo7imQOolM9dKKBiTe9zAmbhiqVCw8cHkKFNw+zrOEp5WUEtTA2IZ30ZQXSjPkXbj5schHIgAwSGBmWNwJ339Mtv53Rp/CFy5LkbGBb2rnJIklbh1va5yWUfEWY5051RPFVTLGH4grmE8G5aZsTS5jpFJJoq47qwwJHPCrU86eDMTzKUvyAlCdN1mZcZyiAu8C5dpHwf5AOOwIyBF9LBsRB/8PJndk/1B/aY230x1+waIFSgtv6nlgwtHu96NI1hUfqNMMHuppecpVz4NPHN5Dfn/bLsa8XmFc4Fu8wjgt9xsjj20vsZMQXXR/eayNtFCYd8QKBgQD/6uOzjt2rVMQTgwwVHcatgsITCaToVsy1Xcp0COzKJBZbmdcKPPq2yQ5woaD7U7npIQuRNz47tHP6FhsT7qGm3uVpqQCsh3piyMmBYnCHcLJcOFlGmxoxs5/+uNCQCHFwPxz8/GDFb2emckUGj7sndbarcBSXwSW7V4ZU4WgJuQKBgQDeW8MiBZjUAg021uQCLnSWeQdN+wbhP6OBQallwEjD5iXBvprFHSewBE/0A0SRAQ7sZv374NNSAF4vI9GULmBgsnYloek90TaEPH1L6qUA74Z3Sj2g8nYshjAckiECHK78nl3370B0qLmT+Vk68htAMMPJ72y97p7Vuw8ynuncXwKBgAmeK0aRRPVubxwIncihYNkeg+qxPxhYQsNCLhykRTnnl0uEAZfp6MY70iYbfPBVGjSPwF6Jw/X8dytb71KVck/SKq8I4fSZ9tiFkUUijPYaHynmGDzWEWryxD2Pdo8jMhg01wMO/RgOcsfHnZ58gl0eSGozASMe6CsdQ/gmrIFJAoGAWM7vhaQUoQBcxL1Y/aIOQJcAGt4aplYjeJmADbqZlVxTUilNaVK2qi9eu4eemAeDLVoJMNNfs02gUFWO/A71wUkltOwQ2va3PmNma67AzjncS8KkEKcmGaxShOa8Njq8jPq3bzHoXW+SBw6827Ucuyt+1yVAGi+20ohOjpo3ryMCgYBgGqyOJVVABj2DNrAhfgLOurh3pJFvadrxpk4texIDRLq00a3vYJrz1VUgGWJ08RxOAo7mevP3eTh40eBlAogZfFOjU+fkE4Xf7j/mCeAR3RaIK5raQ4C7/OeR2L2/5dPQgzIeT4wydNDACN50SZ116gWGKTEfyxvikz2buypWnQ==',

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