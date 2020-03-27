<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //    1. 关联的数据表
    public $table = 'orders';

    //    2. 主键
    public $primaryKey = 'id';

    //    3. 允许批量操作的字段
    public $guarded = [];

    const STATUS_TEMP = 0;   //临时订单
    const STATUS_NEW = 1;    //有效订单，待付款
    const STATUS_PAY = 2;    //已支付订单，待发货

    const STATUS_DELIVERED = 3;    //已发货，待收货
    const STATUS_RECEIVED = 4;    //已收货，待评价
    const STATUS_COMPLETE = 5;    //已评价，订单完成

//    public function getPaymentAttribute($value)
//    {
//        if ($value == 'wxpay') return '微信支付';
//        if ($value == 'alipay') return '支付宝支付';
//        if ($value == 'balance') return '余额支付';
//        if ($value == 'credit') return '积分支付';
//        return '暂无';
//    }
//
//    public function getStatusAttribute($value)
//    {
//        if ($value == 0) return '临时订单';
//        if ($value == 1) return '待支付';
//        if ($value == 2) return '已支付';
//        if ($value == 3) return '支付失败';
//        if ($value == 4) return '确认消费';
//        return '暂无';
//    }

    //与订单详情的关系
    public function item()
    {
        return $this->hasMany(OrderItem::class,'order_id','id');
    }

    //生成唯一订单号
    public function makeOrder()
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
}
