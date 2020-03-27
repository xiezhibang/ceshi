<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GradeOrder extends Model
{
    //    1. 关联的数据表
    public $table = 'grade_orders';

    //    2. 主键
    public $primaryKey = 'id';

    //    3. 允许批量操作的字段
    public $guarded = [];

    //支付方式
    public function getPaymentAttribute($value)
    {
        if ($value == 'wxpay') return '微信支付';
        if ($value == 'alipay') return '支付宝支付';
        if ($value == 'balance') return '余额支付';
        if ($value == 'credit') return '积分支付';
        return '--';
    }

    //订单状态
    public function getStatusAttribute($value)
    {
        if ($value == 0) return '临时订单';
        if ($value == 1) return '待支付';
        if ($value == 2) return '已支付';
        if ($value == 3) return '支付失败';
        return '--';
    }

    //类型
    public function getTypeAttribute($value)
    {
        if ($value == 10) return '金卡升级';
        if ($value == 20) return '黑金卡升级';
        return '--';
    }
}
