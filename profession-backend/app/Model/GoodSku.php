<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GoodSku extends Model
{
    //    1. 关联的数据表
    public $table = 'good_skus';

    //    2. 主键
    public $primaryKey = 'id';

    //    3. 允许批量操作的字段
    public $guarded = [];

    //商品类型
//    public function getTypeAttribute($value)
//    {
//        if ($value == 1) return '普通商品';
//        if ($value == 2) return '特权商品';
//        return '--';
//    }

    //与商品规格的关系
    public function goodAttribute()
    {
        return $this->belongsTo(GoodAttribute::class,'attribute_id','id');
    }

}
