<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PartnerRecode extends Model
{
    //    1. 关联的数据表
    public $table = 'partner_recodes';

    //    2. 主键
    public $primaryKey = 'id';

    //    3. 允许批量操作的字段
    public $guarded = [];

    //状态
    public function getStatusAttribute($value)
    {
        if ($value == 1) return '已入伙';
        if ($value == 2) return '已过期';
        return '--';
    }

    //与店铺图片的关系
    public function shopImage()
    {
        return $this->hasMany(ShopImage::class,'shop_id','shop_id');
    }

    //与店铺的关系
    public function shop()
    {
        return $this->belongsTo(MerchantEnter::class,'shop_id','id');
    }
}
