<?php

namespace App\Services\WebService;
use App\Model\GoodCart;
use App\Model\Member;
use App\Model\MemberBind;
use App\Model\MoneyRecode;
use App\Model\Order;
use App\Model\PaymentRecode;
use App\Model\ShopEvaluate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Yansongda\Pay\Gateways\Alipay;
use Yansongda\Pay\Pay;
class OrderService extends BaseService
{

    /*
     *
     * 我的--店铺订单列表
     * @param int $page 分页数
     * @param int $limit 每页几条
     * @param int $shop_id 店铺ID
     * @param int $status 订单状态
     * @param string $good_name 商品名称
     * @param string $order_no 订单号
     *
     * */
    public function shopOrderList($shop_id,$page,$limit,$status,$request)
    {
        $where = function ($query) use ($request) {
            if ($request->has('keywords') and $request->keywords != '') {
                $search = "%" . $request->keywords . "%";
                $query->where('order_sn', 'like', $search);
            }
        };

        $where_2 = function ($query) use ($request) {
            if ($request->has('keywords') and $request->keywords != '') {
                $search = "%" . $request->keywords . "%";
                $query->where('good_name', 'like', $search);
            }
        };

        $query = Order::with('item')->where('shop_id',$shop_id)->where('status','<',5);
//        if (!empty($order_no)) {
//            $query = $query->where('order_sn', 'like', '%' . $order_no . '%');
//        }
        if (!empty($status)) {
            $query = $query->where('status', $status);
        }
        if (!empty($where_2)) {
            $query = $query->whereHas('item', function ($query) use ($where_2) {
                //$query->where('good_name', 'like', '%' . $good_name . '%');
                $query->where($where_2);
            });
        }
        $query = $query->where($where)->latest('id')->get()->toArray();
        //每页条数
        $perPage = $limit ? $limit : 200;
        //分页数
        if ($page) {
            $current_page = $page;
            $current_page = $current_page <= 0 ? 1 :$current_page;
        } else {
            $current_page = 1;
        }
        $item = array_slice($query, ($current_page-1)*$perPage, $perPage); //注释1
        $total = count($query);
        $paginator = new LengthAwarePaginator($item, $total, $perPage, $current_page, [
            'path' => Paginator::resolveCurrentPath(),  //注释2
            'pageName' => 'page',
        ]);
        $data = $paginator->toArray()['data'];
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }


    /*
     * 取消订单（分手动取消和自动取消，自动取消是30分钟后订单还没支付则自动关闭该订单）
     *
     * @param int $order_id 订单ID
     *
     * */
    public function closedOrder($order_id)
    {
        //取消订单后，把商品库存退回去
        //手动取消
        $order = Order::find($order_id);
        if (!$order){
            return $this->fail(800001);
        }
        //更新订单状态
        $status = $order->update(['status'=>5]);
        //更新库存
        //此处对商品总库存增加
        $data = \DB::table('goods')->increment('total_stock',$order['total']);
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(800006);
    }

    /*
     * 订单列表---我的全部订单
     * @param int $page 分页数
     * @param int $limit 每页几条
     *
     * @param int $status 订单状态 这里搜索设置为 8-全部 1-待付款 2-待消费 3-待评价
     *
     * */
    public function orderList($page,$limit,$status)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //订单信息
        $query = Order::with('item')->where('user_id',$uid)->where('status','<',5);
        if (!empty($status)) {
            $query = $query->where('status', $status);
        }
        $query = $query->latest('id')->get()->toArray();
        //每页条数
        $perPage = $limit ? $limit : 200;
        //分页数
        if ($page) {
            $current_page = $page;
            $current_page = $current_page <= 0 ? 1 :$current_page;
        } else {
            $current_page = 1;
        }
        $item = array_slice($query, ($current_page-1)*$perPage, $perPage); //注释1
        $total = count($query);
        $paginator = new LengthAwarePaginator($item, $total, $perPage, $current_page, [
            'path' => Paginator::resolveCurrentPath(),  //注释2
            'pageName' => 'page',
        ]);
        $data = $paginator->toArray()['data'];
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
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
    public function orderComment($order_id,$overall_evaluate,$good_evaluate,$service_evaluate,$environment_evaluate)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //会员昵称
        $nick_name = MemberBind::where('user_id',$uid)->value('nick_name');
        //查订单信息
        $order = Order::find($order_id);
        //判断是否可以评价
        if (empty($order['paid_at'])){
            return $this->fail(800013);
        }
        //添加评价数据
        $data = ShopEvaluate::create([
            'user_id' => $uid,
            'nick_name' => $nick_name,
            'order_id' => $order_id,
            'shop_id' => $order['shop_id'],
            'shop_name' => $order['shop_name'],
            'overall_evaluate' => $overall_evaluate,
            'good_evaluate' => $good_evaluate,
            'service_evaluate' => $service_evaluate,
            'environment_evaluate' => $environment_evaluate,
        ]);
        //返回结果
        if ($data){
            //修改评价状态
            $update_order = $order->update(['status'=>4]);

            return $this->success($data);
        }
        return $this->fail(800007);
    }

    /*
     *
     * 订单详情
     * @param int $order_id 订单ID
     *
     * */
    public function orderDetail($order_id)
    {
        $data = Order::with('item')->findOrFail($order_id);
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 订单待评价列表
     * @param int $page 分页数
     * @param int $limit 每页几条
     * */
    public function waitOrderCommentList($page,$limit)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //订单信息
        $query = Order::with('item')->where('user_id',$uid)->where('status',3);
        if (!empty($status)) {
            $query = $query->where('status', $status);
        }
        $query = $query->latest('id')->get()->toArray();
        //每页条数
        $perPage = $limit ? $limit : 200;
        //分页数
        if ($page) {
            $current_page = $page;
            $current_page = $current_page <= 0 ? 1 :$current_page;
        } else {
            $current_page = 1;
        }
        $item = array_slice($query, ($current_page-1)*$perPage, $perPage); //注释1
        $total = count($query);
        $paginator = new LengthAwarePaginator($item, $total, $perPage, $current_page, [
            'path' => Paginator::resolveCurrentPath(),  //注释2
            'pageName' => 'page',
        ]);
        $data = $paginator->toArray()['data'];
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 已评价订单列表
     * @param int $page 分页数
     * @param int $limit 每页几条
     *
     * */
    public function orderEvaluateList($page,$limit)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //订单信息
        $query = ShopEvaluate::with('shop:id,shop_name,shop_image,address')->where('user_id',$uid);
        $query = $query->select('id','shop_id','overall_evaluate','created_at')
            ->latest('id')->get()->toArray();
        //每页条数
        $perPage = $limit ? $limit : 200;
        //分页数
        if ($page) {
            $current_page = $page;
            $current_page = $current_page <= 0 ? 1 :$current_page;
        } else {
            $current_page = 1;
        }
        $item = array_slice($query, ($current_page-1)*$perPage, $perPage); //注释1
        $total = count($query);
        $paginator = new LengthAwarePaginator($item, $total, $perPage, $current_page, [
            'path' => Paginator::resolveCurrentPath(),  //注释2
            'pageName' => 'page',
        ]);
        $data = $paginator->toArray()['data'];
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 收款明细
     * @param int $page 分页数
     * @param int $limit 每页几条
     *
     * */
    public function paymentRecodeList($page,$limit)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        $query = PaymentRecode::where('user_id',$uid)->latest('id')->get()->toArray();
        //每页条数
        $perPage = $limit ? $limit : 200;
        //分页数
        if ($page) {
            $current_page = $page;
            $current_page = $current_page <= 0 ? 1 :$current_page;
        } else {
            $current_page = 1;
        }
        $item = array_slice($query, ($current_page-1)*$perPage, $perPage); //注释1
        $total = count($query);
        $paginator = new LengthAwarePaginator($item, $total, $perPage, $current_page, [
            'path' => Paginator::resolveCurrentPath(),  //注释2
            'pageName' => 'page',
        ]);
        $data = $paginator->toArray()['data'];
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 零钱明细
     * @param int $page 分页数
     * @param int $limit 每页几条
     *
     * */
    public function moneyRecodeList($page,$limit)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        $query = MoneyRecode::where('user_id',$uid)->latest('id')->get()->toArray();
        //每页条数
        $perPage = $limit ? $limit : 200;
        //分页数
        if ($page) {
            $current_page = $page;
            $current_page = $current_page <= 0 ? 1 :$current_page;
        } else {
            $current_page = 1;
        }
        $item = array_slice($query, ($current_page-1)*$perPage, $perPage); //注释1
        $total = count($query);
        $paginator = new LengthAwarePaginator($item, $total, $perPage, $current_page, [
            'path' => Paginator::resolveCurrentPath(),  //注释2
            'pageName' => 'page',
        ]);
        $data = $paginator->toArray()['data'];
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 支付完成
     * @param string $order_no 订单号
     *
     * */
    public function compoleteOrder($order_no)
    {
        $data = Order::where('order_sn',$order_no)->first();
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 确认消费---订单详情
     * @param string $order_id 订单ID
     *
     * */
    public function makeOrderComplete($order_id)
    {
        $data = Order::with('item')->findOrFail($order_id);
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     *
     * 确认消费
     * @param string $order_id 订单ID
     *
     * */
    public function makeFreeOrder($order_id)
    {
        $order = Order::findOrFail($order_id);
        //判断是否支付
        if (!$order['paid_at']){
            return $this->fail(800010);
        }
        //确认消费
        $data = $order->update(['status'=>3]);
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(800011);
    }

    //生成唯一订单号
    public function makeOrderNo()
    {
        //订单号码主体（YYYYMMDDHHIISSNNNNNNNN）
        $order_id_main = date('YmdHis') . rand(1000000,9999999);
        //订单号码主体长度
        $order_id_len = strlen($order_id_main);
        $order_id_sum = 0;

        for($i=0; $i<$order_id_len; $i++){
            $order_id_sum += (int)(substr($order_id_main,$i,1));
        }
        //唯一订单号码（YYYYMMDDHHIISSNNNNNNNNCC）
        $order_id = $order_id_main . str_pad((100 - $order_id_sum % 100) % 100,2,'0',STR_PAD_LEFT);
        return $order_id;
    }

    /*
     * 已选商品--去结算（创建订单）
     * @param int $cart_id 购物车ID
     * @param int $amount 单个商品的数量
     * @param int $cart_item 购物车数组数据
     *
     * */
    public function createGoodPrepaidOrder($cart_item)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        $member = Member::find($uid);
        //订单号
        $sn = $this->makeOrderNo();
        //订单总金额
        $total_money = 0;
        //创建订单
        $order = New Order([
            'user_id'    => $uid,
            'username'   => $member->memberBind->nick_name,
            'order_sn'   => $sn,
            'status'     => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        //保存到数据库
        $order->save();
        $cart_item = json_decode($cart_item,true);
        //遍历商品数据
        foreach ($cart_item as $item){
            //购物车ID
            $cart_id = $item['cart_id'];
            //商品数量
            $amount  = $item['amount'];
            //购物车信息
            $cart = GoodCart::find($cart_id);
            //创建订单详情
            $orderItem = $order->item()->make([
                'user_id'     => $uid,
                'username'    => $member->memberBind->nick_name,
                'good_id'     => $cart['good_id'],
                'good_image'  => $cart['good_image'],
                'good_name'   => $cart['good_name'],
                'good_price'  => $cart['good_type'] == 2 ? $cart['credit'] : $cart['money'],
                'amount'      => $amount,
                'total_price' => $cart['good_type'] == 2 ? $cart['credit']*$amount : $cart['money']*$amount,
                'good_type'   => $cart['good_type'],
                'created_at'  => date('Y-m-d H:i:s'),
            ]);
            //保存数据
            $orderItem->save();
            //订单总金额累计
            $total_money += $cart['good_type'] == 2 ? $cart['credit']*$amount : $cart['money']*$amount;
        }
        //更新订单总金额
        $order->update(['total_money'=>$total_money,'pay_money'=>$total_money]);
        // 将下单的商品从购物车中移除
        $cartIds = collect($cart_item)->pluck('cart_id');
        $removeCart = Auth::guard('member')->user()->goodCartItems()->whereIn('id', $cartIds)->delete();
        //返回结果
        if ($order){
            return $this->success($order);
        }
        return $this->fail(800012);
    }

    /*
     * 支付订单
     * @param string $order_sn 订单号
     *
     * */
    public function confirmPrepaidOrderInfo($order_sn)
    {
        $data = Order::where('order_sn',$order_sn)->select('id','pay_money','total_money','discount_money')->first();
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     *
     * 发起订单支付
     * @param string $order_sn 订单号
     * @param string $pay_type 支付方式 wxpay-微信支付 alipay-支付宝支付 balance-余额支付 credit-积分支付
     * @param string $password 支付密码
     * */
    public function payOrder($order_sn,$pay_type,$password)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //会员
        $member = Member::find($uid);
        //订单信息
//        $order = Order::where('order_sn',$order_sn)->first();
//        if (!$order){
//            return $this->fail(800001);
//        }
        //选择支付方式
        switch ($pay_type) {
            //微信支付
            case 'wxpay':
                //获取配置信息
                $config = config('orderwxpay');
                $order = [
                    'out_trade_no' => $order_sn,
                    'total_fee' => $order['pay_money'] * 100, // **单位：分**
                    'body' => '商品订单 - 测试',
                ];
                //更新订单
                $bool = Order::where('order_sn',$order_sn)->update(['payment'=>'wxpay']);
                $pay = Pay::wechat($config)->app($order);
                return $pay;
                //结束程序执行
                break;
            //支付宝支付
            case 'alipay':
                //支付信息
                $order = [
                    'out_trade_no' => $order_sn,
                    'total_amount' => $order['pay_money'],
                    'subject' => '商品订单',
                ];
                //获取配置信息
                $config = config('walipay.pay');
                //更新订单
                $bool = Order::where('order_sn',$order_sn)->update(['payment'=>'alipay']);
                //返回支付结果
                return Pay::alipay($config)->app($order);
                //结束程序执行
                break;
            //余额支付
            case 'balance':
                //支付密码
                $old_password = $member['password'];
                //校验支付密码是否正确
                if (!Hash::check($password, $old_password)) {
                    return $this->fail(800009);
                }
                //更新用户余额
                $pay = $member->decrement('money_bag',$order['pay_money']);
                //更新订单
                $bool = Order::where('order_sn',$order_sn)->update([
                    'payment'=>'balance',
                    'status'  => 2,//支付状态更改为已支付
                ]);
                //零钱明细
                $money_recode_list = MoneyRecode::create([
                    'user_id' => $order['user_id'],
                    'username' => $order['username'],
                    'type' => 5,
                    'money' => $order['money'],
                    'remark' => '购买商品',
                ]);
                return $this->success($pay);
                //结束程序执行
                break;
            //积分支付
            case 'credit':
                //支付密码
                $old_password = $member['password'];
                //校验支付密码是否正确
                if (!Hash::check($password, $old_password)) {
                    return $this->fail(800009);
                }
                //更新用户积分
                $pay = $member->decrement('total_credits',$order['pay_money']);
                //更新订单
                $bool = Order::where('order_sn',$order_sn)->update([
                    'payment'=>'credit',
                    'status'  => 2,//支付状态更改为已支付
                ]);
                //零钱明细
                $money_recode_list = MoneyRecode::create([
                    'user_id' => $order['user_id'],
                    'username' => $order['username'],
                    'type' => 5,
                    'money' => $order['money'],
                    'remark' => '购买商品',
                ]);
                return $this->success($pay);
                //结束程序执行
                break;
            //默认
            default:
                return $this->fail(800002);
        }
    }

    /*
    * 支付宝回调
    *
    * */
    public function waliPayOrderNotify()
    {
        $config = config('walipay.pay');
        $pay = Pay::alipay($config);
        //日志
        Log::info('支付宝--订单回调',['pay' => $pay,'date'=>date('Y-m-d H:i:s')]);

        if ( $data = $pay->verify()) {

            $order = Order::where('order_sn',$data->out_trade_no)->first();
            //判断订单是否存在
            if (!$order){
                return $this->fail(800001);
            }
            //判断是否已经支付
            if ($order['paid_at']){
                return $this->fail(800003);
            }
            //更新支付信息
            $update = Order::where('order_sn',$data->out_trade_no)->update([
                'status'  => 2,//支付状态更改为已支付
                'paid_at' => date('Y-m-d H:i:s'),//支付时间
            ]);
            //零钱明细
            $money_recode_list = MoneyRecode::create([
                'user_id' => $order['user_id'],
                'username' => $order['username'],
                'type' => 5,
                'money' => $order['pay_money'],
                'remark' => '购买商品',
            ]);
            //日志
            Log::info('支付宝支付回调',['status' => 2,'paid_at' => date('Y-m-d H:i:s')]);

        } else {
            //写入支付失败记录
            file_put_contents(storage_path('paychange_notify.txt'), "收到异步通知\r\n", FILE_APPEND);
            //更新支付信息
            $update = Order::where('order_sn',$data->out_trade_no)->update([
                'status'  => 1,//支付失败
            ]);
            //日志
            Log::info('支付宝订单回调',['status' => 1]);
            return $this->fail(800005);
        }
        //返回支付回调结果
        return $pay->success()->send();
    }

    /*
     *
     * 微信回调
     *
     * */
    public function wxOrderNotify()
    {
        //获取配置信息
        $config = config('orderwxpay');
        $pay = Pay::wechat($config);
        try{
            $data = $pay->verify(); // 是的，验签就这么简单！
            //查询记录
            $order = Order::where('order_sn',$data->out_trade_no)->first();
            //判断订单是否存在
            if (!$order){
                return $this->fail(800001);
            }
            //判断是否已经支付
            if ($order['paid_at']){
                return $this->fail(800003);
            }
            //更新支付信息
            $update = Order::where('order_sn',$data->out_trade_no)->update([
                'status'  => 2,//支付状态更改为已支付
                'paid_at' => date('Y-m-d H:i:s'),//支付时间
            ]);
            //零钱明细
            $money_recode_list = MoneyRecode::create([
                'user_id' => $order['user_id'],
                'username' => $order['username'],
                'type' => 5,
                'money' => $order['pay_money'],
                'remark' => '购买商品',
            ]);
            //日志
            Log::info('微信订单支付回调',['status' => 2,'paid_at' => date('Y-m-d H:i:s')]);

            Log::debug('Wechat notify', $data->all());
        } catch (\Exception $e) {
            // $e->getMessage();
        }
        return $pay->success();// laravel 框架中请直接 `return $pay->success()`
    }
}