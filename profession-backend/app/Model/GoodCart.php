<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GoodCart extends Model
{
    //    1. 关联的数据表
    public $table = 'good_carts';

    //    2. 主键
    public $primaryKey = 'id';

    //    3. 允许批量操作的字段
    public $guarded = [];
}
