<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberUpgradeLevel extends Model
{
    //    1. 关联的数据表
    public $table = 'member_upgrade_levels';

    //    2. 主键
    public $primaryKey = 'id';

    //    3. 允许批量操作的字段
    public $guarded = [];
}
