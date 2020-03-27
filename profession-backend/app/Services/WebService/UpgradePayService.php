<?php

namespace App\Services\WebService;
use App\Model\GradeOrder;
use App\Model\Member;
use App\Model\MoneyRecode;
use App\Model\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Yansongda\Pay\Gateways\Alipay;
use Yansongda\Pay\Pay;
class UpgradePayService extends BaseService
{

    //生成唯一订单号
    public function makeOrderNo()
    {
        //订单号码主体（YYYYMMDDHHIISSNNNNNNNN）
        $order_id_main = date('YmdHis') . rand(10000000,99999999);
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
     *
     * 金卡会员升级和黑金卡会员升级
     * @param string $pay_type 支付方式 wxpay-微信支付 alipay-支付宝支付 balance-余额支付 credit-积分支付
     * @param number $upgrade_type 升级类型 1-金卡升级 2-黑金卡升级
     * @param number  $money 支付金额
     * @param number  $fee_type 订单类型 1-升级 2-续费
     * @param number  $password 支付密码 可选（余额支付和积分支付时候使用）
     * */
    public function upgradeOrder($pay_type,$upgrade_type,$money,$fee_type,$password)
    {
        //订单号
        $orderNo = $this->makeOrderNo();
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //会员
        $member = Member::find($uid);
        if (!$money){
            return $this->fail(800008);
        }
        if ($upgrade_type == 2){
            $grade = 20;//黑金卡升级
        }else{
            $grade = 10;//金卡升级
        }
        //订单号
        $order_no = $orderNo.$uid;
        //选择支付方式
        switch ($pay_type) {
            //微信支付
            case 'wxpay':
                //创建会员升级订单
                $order = GradeOrder::create([
                    'user_id'  => $uid,
                    'username' => $member->memberBind->nick_name,
                    'order_no' => $order_no,
                    'money'    => $money,
                    'type'     => $grade,
                    'fee_type' => $fee_type,
                    'payment'  => 'wxpay',
                    'status'   => 1,
                ]);
                //获取配置信息
                $config = config('upwxpay');
                $order = [
                    'out_trade_no' => $order_no,
                    'total_fee' => $money * 100, // **单位：分**
                    'body' => '充值订单 - 测试',
                ];
                $pay = Pay::wechat($config)->app($order);
                return $pay;
                //结束程序执行
                break;

            //支付宝支付
            case 'alipay':
                //创建会员升级订单
                $order = GradeOrder::create([
                    'user_id'  => $uid,
                    'username' => $member->memberBind->nick_name,
                    'order_no' => $order_no,
                    'money'    => $money,
                    'type'     => $grade,
                    'fee_type' => $fee_type,
                    'payment'  => 'alipay',
                    'status'   => 1,
                ]);
                //支付信息
                $order = [
                    'out_trade_no' => $order_no,
                    'total_amount' => $money,
                    'subject' => '会员升级订单',
                ];
                //获取配置信息
                $config = config('alipay.pay');
                //返回支付结果
                return Pay::alipay($config)->app($order);
                //结束程序执行
                break;
            //余额支付
            case 'balance':
                //创建会员升级订单
                $order = GradeOrder::create([
                    'user_id'  => $uid,
                    'username' => $member->memberBind->nick_name,
                    'order_no' => $order_no,
                    'money'    => $money,
                    'type'     => $grade,
                    'fee_type' => $fee_type,
                    'payment'  => 'balance',
                    'status'   => 1,
                ]);
                //支付密码
                $old_password = $member['password'];
                //校验支付密码是否正确
                if (!Hash::check($password, $old_password)) {
                    return $this->fail(800009);
                }
                //更新用户余额
                $pay = $member->decrement('money_bag',$money);
                return $this->success($pay);
                //结束程序执行
                break;
            //积分支付
            case 'credit':
                //创建会员升级订单
                $order = GradeOrder::create([
                    'user_id'  => $uid,
                    'username' => $member->memberBind->nick_name,
                    'order_no' => $order_no,
                    'money'    => $money,
                    'type'     => $grade,
                    'fee_type' => $fee_type,
                    'payment'  => 'balance',
                    'status'   => 1,
                ]);
                //支付密码
                $old_password = $member['password'];
                //校验支付密码是否正确
                if (!Hash::check($password, $old_password)) {
                    return $this->fail(800009);
                }
                //更新用户积分
                $pay = $member->decrement('total_credits',$money);
                return $this->success($pay);
                //结束程序执行
                break;
            //默认
            default:
                return $this->fail(800002);
        }

    }

    /*
     * 支付宝支付回调
     *
     *
     * */
    public function alipayChangeNotify()
    {
//        $data = app('alipay_pay')->verify();
//        $order = GradeOrder::where('order_no', $data->out_trade_no)->first();
//        if (!$order) {
//            return $this->fail(800001);
//        }
//        if ($order->paid_at) {
//            return app('alipay_pay')->success();
//        }
//        DB::beginTransaction();
//        try {
//            //更新升级订单信息
//            GradeOrder::where('order_no', $data->out_trade_no)->update([
//                'paid_at' => Carbon::now(),
//                //'payment_no' => $data->transaction_id,
//                'status' => 2,
//            ]);
//
//            DB::commit();
//        } catch (\Exception $e) {
//            DB::rollback();
//        }
//
//        return isset($e) ? $this->fail(800005, $e->getMessage()) : app('alipay_pay')->success();

        $config = config('alipay.pay');
        $pay = Pay::alipay($config);
        //日志
        Log::info('支付宝--升级订单回调',['pay' => $pay]);

        if ( $data = $pay->verify()) {
            //写入文件
            file_put_contents(storage_path('uporder_notify.txt'), "收到来自支付宝的异步通知\r\n", FILE_APPEND);
            file_put_contents(storage_path('uporder_notify.txt'), '订单号：' . $data->out_trade_no . "\r\n", FILE_APPEND);
            file_put_contents(storage_path('uporder_notify.txt'), '订单金额：' . $data->total_amount . "\r\n\r\n", FILE_APPEND);
            //查询充值记录
            $order = GradeOrder::where('order_no',$data->out_trade_no)->first();
            //判断订单是否存在
            if (!$order){
                return $this->fail(800001);
            }
            //判断是否已经支付
            if ($order['paid_at']){
                return $this->fail(800003);
            }
            //更新支付信息
            $update = GradeOrder::where('order_no',$data->out_trade_no)->update([
                'status'  => 2,//支付状态更改为已支付
                'paid_at' => date('Y-m-d H:i:s'),//支付时间
            ]);
            //零钱明细
            $money_recode_list = MoneyRecode::create([
                'user_id' => $order['user_id'],
                'username' => $order['username'],
                'type' => 7,
                'money' => $order['money'],
                'remark' => '会员升级',
            ]);
            //日志
            Log::info('支付宝升级订单回调',['status' => 2,'paid_at' => date('Y-m-d H:i:s')]);

        } else {
            //写入支付失败记录
            file_put_contents(storage_path('uporder_notify.txt'), "收到异步通知\r\n", FILE_APPEND);
            //更新支付信息
            $update = GradeOrder::where('order_no',$data->out_trade_no)->update([
                'status'  => 1,//支付失败
            ]);
            //日志
            Log::info('支付宝升级订单回调',['status' => 1]);
            return $this->fail(800005);
        }
        //返回支付回调结果
        return $pay->success()->send();

    }


    //微信充值回调
    public function wxUpgradeNotify()
    {
        //获取配置信息
        $config = config('upwxpay');
        $pay = Pay::wechat($config);
        try{
            $data = $pay->verify(); // 是的，验签就这么简单！
            //查询记录
            $order = GradeOrder::where('order_no',$data->out_trade_no)->first();
            //判断订单是否存在
            if (!$order){
                return $this->fail(800001);
            }
            //判断是否已经支付
            if ($order['paid_at']){
                return $this->fail(800003);
            }
            //更新支付信息
            $update = GradeOrder::where('order_no',$data->out_trade_no)->update([
                'status'  => 2,//支付状态更改为已支付
                'paid_at' => date('Y-m-d H:i:s'),//支付时间
            ]);
            //零钱明细
            $money_recode_list = MoneyRecode::create([
                'user_id' => $order['user_id'],
                'username' => $order['username'],
                'type' => 7,
                'money' => $order['money'],
                'remark' => '会员升级',
            ]);
            //日志
            Log::info('微信升级回调',['status' => 2,'paid_at' => date('Y-m-d H:i:s')]);

            Log::debug('Wechat notify', $data->all());
        } catch (\Exception $e) {
            // $e->getMessage();
        }
        return $pay->success();// laravel 框架中请直接 `return $pay->success()`
    }
    /**
     * @api {post} /payment/notify/native 扫码回调
     */
    public function notify(Request $request)
    {
        $data = app('wechat_pay')->verify();

        $order = RechargeModel::where('recharge_no', $data->out_trade_no)->first();
        if (!$order) {
            return failed(400, '订单不存在');
        }
        if ($order->payment_at) {
            return app('wechat_pay')->success();
        }
        DB::beginTransaction();
        try {
            //更新充值订单信息
            RechargeModel::where('recharge_no', $data->out_trade_no)->update([
                'payment_at' => Carbon::now(),
                'payment_no' => $data->transaction_id,
                'payment_type' => 1,
            ]);
            //增加代理余额
            AdminModel::where('id', $order->admin_id)->increment('money', $order->money);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }

        return isset($e) ? failed(401, $e->getMessage()) : app('wechat_pay')->success();
    }


}