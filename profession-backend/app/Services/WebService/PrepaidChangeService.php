<?php

namespace App\Services\WebService;
use App\Model\MemberBind;
use App\Model\MoneyRecode;
use App\Model\PrepaidChange;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Yansongda\Pay\Gateways\Alipay;
use Yansongda\Pay\Pay;
class PrepaidChangeService extends BaseService
{

    /*
     * 会员充值
     * @param string $pay_type 支付方式 wxpay-微信支付 alipay-支付宝支付 balance-余额支付 credit-积分支付
     * @param number $money 充值金额
     * */
    public function payInit($pay_type,$money)
    {
        //订单号
        $orderNo = $this->getOrderSn();
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //用户名称
        $name = MemberBind::where('user_id',$uid)->value('nick_name');
        if (!$money){
            return $this->fail(800008);
        }
        switch ($pay_type) {
            //会员充值，发起支付宝支付
            case 'alipay':
                //插入充值订单记录
                $data = PrepaidChange::create([
                    'user_id' => $uid,
                    'username' => $name,
                    'money' => $money,//充值金额
                    'remark' => '零钱充值',//支付说明
                    'payment' => 'alipay',//支付方式
                    'order_no' => $orderNo,//订单号
                    'status' => 1,//订单状态 0-临时订单 1-待支付 2-已支付 3-支付失败
                ]);
                //支付信息
                $order = [
                    'out_trade_no' => $orderNo,
                    'total_amount' => $money,
                    'subject' => 'alipay change amount',
                ];
                //获取配置信息
                $config = config('alipaychange.pay');
                //返回支付结果
                return Pay::alipay($config)->app($order);
                //结束程序执行
                break;

            //会员充值，发起微信支付
            case 'wxpay':
                //支付信息
                $config_biz = [
                    'out_trade_no' => $orderNo,
                    'total_fee' => $money * 100,
                    'body' => 'wxpay change money',
                ];
                //获取配置信息
                $config = config('wxpaychange.pay');
                //插入充值订单记录
                $data = PrepaidChange::create([
                    'user_id' => $uid,
                    'username' => $name,
                    'money' => $money,//充值金额
                    'remark' => '零钱充值',//支付说明
                    'payment' => 'wxpay',//支付方式
                    'order_no' => $orderNo,//订单号
                    'status' => 1,//订单状态 0-临时订单 1-待支付 2-已支付 3-支付失败
                ]);
                //返回支付结果
                return Pay::wechat($config)->app($config_biz);
                //结束程序执行
                break;
            //默认
            default:
                return $this->fail(800002);
        }

    }

    /**
     *  生成不重复的订单号
     *
     */
//    public function getOrderSn($prefix = 'O')
//    {
//        $order_sn = $prefix . (strtotime(date('YmdHis', time()))) . substr(microtime(), 2, 6) . sprintf('%03d', rand(0, 999));
//        return $order_sn;
//    }

    //生成唯一订单号
    public function getOrderSn()
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
     * 支付宝回调
     *
     * */
    public function aliPayNotify()
    {

        $config = config('alipaychange.pay');
        $pay = Pay::alipay($config);
        //日志
        \Illuminate\Support\Facades\Log::info('支付宝--零钱充值回调',['pay' => $pay]);

        if ( $data = $pay->verify()) {
            //写入文件
            file_put_contents(storage_path('paychange_notify.txt'), "收到来自支付宝的异步通知\r\n", FILE_APPEND);
            file_put_contents(storage_path('paychange_notify.txt'), '订单号：' . $data->out_trade_no . "\r\n", FILE_APPEND);
            file_put_contents(storage_path('paychange_notify.txt'), '订单金额：' . $data->total_amount . "\r\n\r\n", FILE_APPEND);
            //查询充值记录
            $order = PrepaidChange::where('order_no',$data->out_trade_no)->first();
            //判断订单是否存在
            if (!$order){
                return $this->fail(800001);
            }
            //判断是否已经支付
            if ($order['paid_at']){
                return $this->fail(800003);
            }
            //更新支付信息
            $update = PrepaidChange::where('order_no',$data->out_trade_no)->update([
                'status'  => 2,//支付状态更改为已支付
                'paid_at' => date('Y-m-d H:i:s'),//支付时间
            ]);
            //零钱明细
            $money_recode_list = MoneyRecode::create([
                'user_id' => $order['user_id'],
                'username' => $order['username'],
                'type' => 6,
                'money' => $order['money'],
                'remark' => '充值',
            ]);
            //日志
            Log::info('支付宝充值回调',['status' => 2,'paid_at' => date('Y-m-d H:i:s')]);

        } else {
            //写入支付失败记录
            file_put_contents(storage_path('paychange_notify.txt'), "收到异步通知\r\n", FILE_APPEND);
            //更新支付信息
            $update = PrepaidChange::where('order_no',$data->out_trade_no)->update([
                'status'  => 3,
            ]);
            //日志
            Log::info('支付宝充值回调',['status' => 3,'paid_fail_at' => date('Y-m-d H:i:s')]);
            return $this->fail(800005);
        }
        //返回支付回调结果
        return $pay->success()->send();

    }

    /*
     * 微信回调
     *
     * */
    public function wxpayNotity()
    {
        //获取配置信息
        $config = config('wxpaychange.pay');
        $pay = Pay::wechat($config);
        //日志
        Log::info('微信充值记录',['pay' => $pay]);
        //如果验签成功
        if ( $data = $pay->verify()) {
            //写入文件
            file_put_contents('wxchange_notify.txt', "收到来自微信的异步通知\r\n", FILE_APPEND);
            file_put_contents('wxchange_notify.txt', '订单号：' . $data['out_trade_no'] . "\r\n", FILE_APPEND);
            file_put_contents('wxchange_notify.txt', '订单金额：' . $data['total_fee'] . "\r\n\r\n", FILE_APPEND);
            //查询充值记录
            $order = PrepaidChange::where('order_no',$data['out_trade_no'])->first();
            //判断订单是否存在
            if (!$order){
                return $this->fail(800001);
            }
            //判断是否已经支付
            if ($order['paid_at']){
                return $this->fail(800003);
            }

            //更新支付信息
            $update = PrepaidChange::where('order_no',$data['out_trade_no'])->update([
                'status'  => 2,
                'paid_at' => date('Y-m-d H:i:s'),//支付时间
            ]);

            //日志
            Log::info('零钱充值，微信回调',['status' => 2]);

        } else {
            //写入支付失败记录
            file_put_contents(storage_path('wxchange_notify.txt'), "收到异步通知\r\n", FILE_APPEND);
            //更新支付信息
            $update = PrepaidChange::where('order_no',$data['out_trade_no'])->update([
                'status'  => 3,
                'paid_at' => date('Y-m-d H:i:s'),//支付时间
            ]);
            //日志
            Log::info('零钱充值，微信回调',['status' => 3]);
            return $this->fail(800005);
        }

        return $pay->success();

    }

}