<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GoodAttribute extends Model
{
    //    1. 关联的数据表
    public $table = 'good_attributes';

    //    2. 主键
    public $primaryKey = 'id';

    //    3. 允许批量操作的字段
    public $guarded = [];

    //与商品SKU的关系
    public function goodSku()
    {
        return $this->hasMany(GoodSku::class,'attribute_id','id');
    }

    //与商品的关系
    public function good()
    {
        return $this->belongsTo(Good::class,'attribute_id','id');
    }

}
