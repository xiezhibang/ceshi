<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShopStaff extends Model
{
    //    1. 关联的数据表
    public $table = 'shop_staff';

    //    2. 主键
    public $primaryKey = 'id';

    //    3. 允许批量操作的字段
    public $guarded = [];

    //状态
    public function getStatusAttribute($value)
    {
        if ($value == 1) return '启用';
        if ($value == 2) return '禁用';
        return '--';
    }

    //自定义函数手机号隐藏中间四位
    public function getStaffPhoneAttribute($value)
    {
        $res_str = substr_replace($value,'****',3,4);
        return $res_str;
    }

    public function getAccountAttribute($value)
    {
        //$cardNo = $this->phone;
        $res_str = substr_replace($value,'****',3,4);
        return $res_str;
    }
}
