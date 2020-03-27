<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    //    1. 关联的数据表
    public $table = 'goods';

    //    2. 主键
    public $primaryKey = 'id';

    //    3. 允许批量操作的字段
    public $guarded = [];

    //上下架状态
//    public function getStateAttribute($value)
//    {
//        if ($value == 1) return '上架';
//        if ($value == 2) return '下架';
//        if ($value == 3) return '已删除';
//        return '--';
//    }

    //审核状态
//    public function getStatusAttribute($value)
//    {
//        if ($value == 1) return '待审核';
//        if ($value == 2) return '审核通过';
//        if ($value == 3) return '审核不通过';
//        return '--';
//    }

    //商品类型
//    public function getTypeAttribute($value)
//    {
//        if ($value == 1) return '普通商品';
//        if ($value == 2) return '特权商品';
//        return '--';
//    }

    //与商品规格以及SKU的关系
    public function goodAttributeSku()
    {
        return $this->hasMany(GoodSku::class,'good_id','id');
    }

    //与图片的关系
    public function image()
    {
        return $this->hasMany(GoodImage::class,'good_id','id');
    }
}
