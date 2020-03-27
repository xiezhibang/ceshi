<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SmsCode extends Model
{
    //    1. 关联的数据表
    public $table = 'sms_codes';
    //    2. 主键
    public $primaryKey = 'id';
    //    3. 允许批量操作的字段
    public $guarded = [];
}
