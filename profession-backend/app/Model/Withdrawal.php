<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    //    1. 关联的数据表
    public $table = 'withdrawals';

    //    2. 主键
    public $primaryKey = 'id';

    //    3. 允许批量操作的字段
    public $guarded = [];

    //到账时间
    public function getWithdrawalTimeAttribute($value)
    {
        return $value ? $value : '--';
    }

    //银行卡号
    public function getBankSnAttribute($value)
    {
        $res_str = substr_replace($value,'*****',4,10);
        return $res_str;
    }
}
