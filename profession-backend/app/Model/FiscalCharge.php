<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FiscalCharge extends Model
{
    //    1. 关联的数据表
    public $table = 'fiscal_charges';

    //    2. 主键
    public $primaryKey = 'id';

    //    3. 允许批量操作的字段
    public $guarded = [];

    //数据库字段转换
    protected $casts = [
        'created_at' => 'Y-m-d H:i:s',
        'updated_at' => 'Y-m-d H:i:s'
    ];

    //添加额外的字段转换
    protected $appends = [
        //'card_num',
    ];

    //状态
//    public function getStatusAttribute($value)
//    {
//        if ($value == 1) return '待审核';
//        if ($value == 2) return '审核通过';
//        if ($value == 3) return '审核不通过';
//        return '--';
//    }

    //银行名称
    public function getBankNameAttribute($value)
    {
        return $value ? $value : '暂无';
    }

    //银行开户名
    public function getBankUserNameAttribute($value)
    {
        return $value ? $value : '暂无';
    }

    public function getBankNoAttribute($value)
    {
        return $value ? $value : '暂无';
    }

    //类型
    public function getTypeAttribute($value)
    {
        if ($value == 1) return '提现';
        if ($value == 2) return '充值';
        if ($value == 3) return '交易';
        if ($value == 4) return '升级';
        if ($value == 5) return '续费';
        if ($value == 6) return '合伙';
        return '--';
    }

//    //银行卡号加密
//    public function setBankNoAttribute($value)
//    {
//        $value = str_replace(' ', '', $value);  // 将所有空格去掉
//        $this->attributes['bank_no'] = encrypt($value);
//    }
//
//    //隐藏银行卡号部分数字
//    public function getCardNumAttribute()
//    {
//        if (!$this->bank_no) {
//            return '';
//        }
//        $cardNo = decrypt($this->bank_no);
//        $lastFour = mb_substr($cardNo, -4);
//        return '**** **** **** ' . $lastFour;
//    }

}
