<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ClosedOrderRequest;
use App\Http\Requests\Api\CompoleteOrderRequest;
use App\Http\Requests\Api\CreateOrderRequest;
use App\Http\Requests\Api\MakeOrderRequest;
use App\Http\Requests\Api\OrderCommentRequest;
use App\Http\Requests\Api\OrderDetailRequest;
use App\Http\Requests\Api\OrderListRequest;
use App\Http\Requests\Api\PageLimitRequest;
use App\Http\Requests\Api\PayOrderRequest;
use App\Http\Requests\Api\PrepaidOrderPayRequest;
use App\Http\Requests\Api\ShopOrderListRequest;
use App\Services\WebService\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /*
     *
     * 我的--店铺订单列表
     *
     * */
    public function shopOrderList(ShopOrderListRequest $request,OrderService $orderService)
    {
        $result = $orderService->shopOrderList($request->shop_id,$request->page,$request->limit,$request->status,$request);
        return $result;
    }

    /*
     * 取消订单（分手动取消和自动取消，自动取消是30分钟后订单还没支付则自动关闭该订单）
     *
     * @param int $order_id 订单ID
     *
     * */
    public function closedOrder(ClosedOrderRequest $request,OrderService $orderService)
    {
        $result = $orderService->closedOrder($request->order_id);
        return $result;
    }

    /*
     * 订单列表---我的全部订单
     * @param int $page 分页数
     * @param int $limit 每页几条
     *
     * @param int $status 订单状态 这里搜索设置为 8-全部 1-待付款 2-待消费 3-待评价
     *
     * */
    public function orderList(OrderListRequest $request,OrderService $orderService)
    {
        $result = $orderService->orderList($request->page,$request->limit,$request->status);
        return $result;
    }

    /*
     * 订单评价
     * @param int $order_id 订单ID
     * @param int $overall_evaluate 总体
     * @param int $good_evaluate 商品
     * @param int $service_evaluate 服务
     * @param int $environment_evaluate 环境
     *
     * */
    public function orderComment(OrderCommentRequest $request,OrderService $orderService)
    {
        $result = $orderService->orderComment($request->order_id,$request->overall_evaluate,$request->good_evaluate,$request->service_evaluate,$request->environment_evaluate);
        return $result;
    }

    /*
     *
     * 订单详情
     * @param int $order_id 订单ID
     *
     * */
    public function orderDetail(OrderDetailRequest $request,OrderService $orderService)
    {
        $result = $orderService->orderDetail($request->order_id);
        return $result;
    }

    /*
    * 订单待评价列表
    * @param int $page 分页数
    * @param int $limit 每页几条
    * */
    public function waitOrderCommentList(PageLimitRequest $request,OrderService $orderService)
    {
        $result = $orderService->waitOrderCommentList($request->page,$request->limit);
        return $result;
    }

    /*
     * 已评价订单列表
     * @param int $page 分页数
     * @param int $limit 每页几条
     *
     * */
    public function orderEvaluateList(PageLimitRequest $request,OrderService $orderService)
    {
        $result = $orderService->orderEvaluateList($request->page,$request->limit);
        return $result;
    }

    /*
    * 收款明细
    * @param int $page 分页数
    * @param int $limit 每页几条
    *
    * */
    public function paymentRecodeList(PageLimitRequest $request,OrderService $orderService)
    {
        $result = $orderService->paymentRecodeList($request->page,$request->limit);
        return $result;
    }

    /*
     * 零钱明细
     * @param int $page 分页数
     * @param int $limit 每页几条
     *
     * */
    public function moneyRecodeList(PageLimitRequest $request,OrderService $orderService)
    {
        $result = $orderService->moneyRecodeList($request->page,$request->limit);
        return $result;
    }

    /*
     * 支付完成
     *
     * */
    public function compoleteOrder(CompoleteOrderRequest $request,OrderService $orderService)
    {
        $result = $orderService->compoleteOrder($request->order_no);
        return $result;
    }

    /*
     * 确认消费---订单详情
     * @param string $order_id 订单ID
     *
     * */
    public function makeOrderComplete(MakeOrderRequest $request,OrderService $orderService)
    {
        $result = $orderService->makeOrderComplete($request->order_id);
        return $result;
    }

    /*
     *
     * 确认消费
     * @param string $order_id 订单ID
     *
     * */
    public function makeFreeOrder(MakeOrderRequest $request,OrderService $orderService)
    {
        $result = $orderService->makeFreeOrder($request->order_id);
        return $result;
    }

    /*
     * 已选商品--去结算（创建订单）
     * @param int $cart_id 购物车ID
     * @param int $amount 单个商品的数量
     * @param int $cart_item 购物车数组数据
     *
     * */
    public function createGoodPrepaidOrder(CreateOrderRequest $request,OrderService $orderService)
    {
        $result = $orderService->createGoodPrepaidOrder($request->cart_item);
        return $result;
    }

    /*
    * 支付订单
    * @param string $order_sn 订单号
    *
    * */
    public function confirmPrepaidOrderInfo(PrepaidOrderPayRequest $request,OrderService $orderService)
    {
        $result = $orderService->confirmPrepaidOrderInfo($request->order_sn);
        return $result;
    }

    /*
    *
    * 发起订单支付
    * @param string $order_sn 订单号
    * @param string $pay_type 支付方式 wxpay-微信支付 alipay-支付宝支付 balance-余额支付 credit-积分支付
    * @param string $password 支付密码
    * */
    public function payOrder(PayOrderRequest $request,OrderService $orderService)
    {
        $result = $orderService->payOrder($request->order_sn,$request->pay_type,$request->password);
        return $result;
    }

    /*
    * 支付宝回调
    *
    * */
    public function waliPayOrderNotify(OrderService $orderService)
    {
        $result = $orderService->waliPayOrderNotify();
        return $result;
    }

    /*
     * 微信回调
     *
     * */
    public function wxOrderNotify(OrderService $orderService)
    {
        $result = $orderService->wxOrderNotify();
        return $result;
    }

}
