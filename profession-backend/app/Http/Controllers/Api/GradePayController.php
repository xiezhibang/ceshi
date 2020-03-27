<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\GradeOrderRequest;
use App\Services\WebService\UpgradePayService;
use Illuminate\Http\Request;

class GradePayController extends Controller
{
    /*
     *
     * 金卡会员升级和黑金卡会员升级
     * @param string $pay_type 支付方式 wxpay-微信支付 alipay-支付宝支付 balance-余额支付 credit-积分支付
     * @param number $upgrade_type 升级类型 1-金卡升级 2-黑金卡升级
     * @param number  $money 支付金额
     * @param number  $password 支付密码 可选（余额支付和积分支付时候使用）
     * */
    public function upgradeOrder(GradeOrderRequest $request,UpgradePayService $upgradePayService)
    {
        $result = $upgradePayService->upgradeOrder($request->pay_type,$request->upgrade_type,$request->money,$request->fee_type,$request->password);
        return $result;
    }

    /*
    * 支付宝支付回调
    *
    *
    * */
    public function alipayChangeNotify(UpgradePayService $upgradePayService)
    {
        $result = $upgradePayService->alipayChangeNotify();
        return $result;
    }

    /*
     * 微信充值回调
     *
     * */
    public function wxUpgradeNotify(UpgradePayService $upgradePayService)
    {
        $result = $upgradePayService->wxUpgradeNotify();
        return $result;
    }
}
