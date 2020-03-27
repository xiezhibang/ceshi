<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    //    1. 关联的数据表
    public $table = 'banks';

    //    2. 主键
    public $primaryKey = 'id';

    //    3. 允许批量操作的字段
    public $guarded = [];

    protected $appends = [
        'card_num',
    ];

    public function setBankSnAttribute($value)
    {
        $value = str_replace(' ', '', $value);  // 将所有空格去掉
        $this->attributes['bank_sn'] = encrypt($value);
    }

    public function getCardNumAttribute()
    {
        if (!$this->bank_sn) {
            return '';
        }
        $cardNo = decrypt($this->bank_sn);
        $lastFour = mb_substr($cardNo, -4);
        return '**** **** **** ' . $lastFour;
    }

}
