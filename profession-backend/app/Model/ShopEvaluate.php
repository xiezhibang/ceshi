<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShopEvaluate extends Model
{
    //    1. 关联的数据表
    public $table = 'shop_evaluates';
    //    2. 主键
    public $primaryKey = 'id';
    //    3. 允许批量操作的字段
    public $guarded = [];

    //与店铺的关系
    public function shop()
    {
        return $this->belongsTo(MerchantEnter::class,'shop_id','id');
    }

    //与订单的关系
    public function order()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
