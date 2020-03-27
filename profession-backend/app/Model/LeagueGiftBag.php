<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LeagueGiftBag extends Model
{
    //    1. 关联的数据表
    public $table = 'league_gift_bags';

    //    2. 主键
    public $primaryKey = 'id';

    //    3. 允许批量操作的字段
    public $guarded = [];

    //状态
    public function getStatusAttribute($value)
    {
        if ($value == 10) return '启用';
        if ($value == 20) return '禁用';
        return '--';
    }
}
