<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\IntegralRequest;
use App\Http\Requests\Api\PageLimitRequest;
use App\Services\WebService\IntegralOrderService;
use Illuminate\Http\Request;

class IntegralOrderController extends Controller
{
    /*
     * 我的积分
     *
     * */
    public function memberIntegral(IntegralOrderService $integralOrderService)
    {
        $result = $integralOrderService->memberIntegral();
        return $result;
    }

    /*
    * 积分明细
    * @param int $page 分页数
    * @param int $limit 每页几条
    * */
    public function integralOrderList(PageLimitRequest $request,IntegralOrderService $integralOrderService)
    {
        $result = $integralOrderService->integralOrderList($request->page,$request->limit);
        return $result;
    }

    /*
     * 积分转换为零钱
     * @param number $integral 积分
     *
     * */
    public function makeIntegralMoney(IntegralRequest $request,IntegralOrderService $integralOrderService)
    {
        $result = $integralOrderService->makeIntegralMoney($request->integral);
        return $result;
    }
}
