<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ConfigRate extends Model
{
    //    1. 关联的数据表
    public $table = 'config_rates';

    //    2. 主键
    public $primaryKey = 'id';

    //    3. 允许批量操作的字段
    public $guarded = [];

    //类型
    public function getTypeAttribute($value)
    {
        if ($value == 1) return '个人提现费率';
        if ($value == 2) return '店铺（营业款）提现费率';
        if ($value == 3) return '个人积分转现费率';
        if ($value == 4) return '商家积分转现费率';
        return '--';
    }
}
