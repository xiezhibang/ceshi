<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MerchantEnter extends Model
{
    //    1. 关联的数据表
    public $table = 'merchant_enters';

    //    2. 主键
    public $primaryKey = 'id';

    //    3. 允许批量操作的字段
    public $guarded = [];

    //与商品的关系
    public function good()
    {
        return $this->hasMany(Good::class,'shop_id','id');
    }

    //与购物车数量关系
    public function cart()
    {
        return $this->hasMany(GoodCart::class,'shop_id','id');
    }

    //与图片的关系
    public function shopImage()
    {
        return $this->hasMany(ShopImage::class,'shop_id','id');
    }
}
