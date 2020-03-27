<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class IntegralConverOrder extends Model
{
    //    1. 关联的数据表
    public $table = 'integral_conver_orders';

    //    2. 主键
    public $primaryKey = 'id';

    //    3. 允许批量操作的字段
    public $guarded = [];

    //订单状态
    public function getStatusAttribute($value)
    {
        if ($value == 0) return '待完成';
        if ($value == 1) return '已完成';
        if ($value == 2) return '已失败';
        return '--';
    }

    //类型
    public function getTypeAttribute($value)
    {
        if ($value == 1) return '个人';
        if ($value == 2) return '商家';
        return '--';
    }
}
