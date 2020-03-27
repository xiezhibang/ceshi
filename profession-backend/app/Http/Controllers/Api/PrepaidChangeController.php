<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PrepaidChangeRequest;
use App\Services\WebService\PrepaidChangeService;
use Illuminate\Http\Request;

class PrepaidChangeController extends Controller
{

    /*
     * 会员充值
     *
     * */
    public function prepaidPay(PrepaidChangeRequest $request,PrepaidChangeService $prepaidChangeService)
    {
        $result = $prepaidChangeService->payInit($request->pay_type,$request->money);
        return $result;
    }

    /*
     * 支付宝回调
     *
     * */
    public function aliPayNotify(PrepaidChangeService $prepaidChangeService)
    {
        $result = $prepaidChangeService->aliPayNotify();
        return $result;
    }

    /*
     * 微信回调
     *
     * */
    public function wxpayNotity(PrepaidChangeService $prepaidChangeService)
    {
        $result = $prepaidChangeService->wxpayNotity();
        return $result;
    }
}
