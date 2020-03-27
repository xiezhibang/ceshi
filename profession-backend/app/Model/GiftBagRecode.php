<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GiftBagRecode extends Model
{
    //    1. 关联的数据表
    public $table = 'gift_bag_recodes';

    //    2. 主键
    public $primaryKey = 'id';

    //    3. 允许批量操作的字段
    public $guarded = [];

    //状态
    public function getBagStatusAttribute($value)
    {
        if ($value == 0) return '待领取';
        if ($value == 1) return '已领取';
        if ($value == 2) return '领取失败';
        return '--';
    }
}
