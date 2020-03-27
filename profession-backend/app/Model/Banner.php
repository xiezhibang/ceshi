<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //    1. 关联的数据表
    public $table = 'banners';

    //    2. 主键
    public $primaryKey = 'id';

    //    3. 允许批量操作的字段
    public $guarded = [];

    //类型
    public function getTypeAttribute($value)
    {
        if ($value == 10) return '首页轮播图';
        if ($value == 20) return '商家首页轮播图';
        if ($value == 30) return '会员金卡';
        if ($value == 40) return '会员黑金卡';
        if ($value == 50) return '邀请好友';
        if ($value == 60) return '启动页面广告';
        return '--';
    }

    //状态
    public function getStatusAttribute($value)
    {
        if ($value == 1) return '显示';
        if ($value == 2) return '隐藏';
        return '--';
    }
}
