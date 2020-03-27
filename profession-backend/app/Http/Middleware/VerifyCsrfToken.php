<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'change/alipayr/notify',
        'change/wxpay/notify',
        'change/upgrade/pay/notify',
        'change/order/pay/notify',
        'change/order/wxpay/notify',
        'change/order/upgradewxpay/notify',
        'change/order/wyalipay/notify',
    ];
}
