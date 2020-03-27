<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberBind extends Model
{
    //    1. 关联的数据表
    public $table = 'member_binds';
    //    2. 主键
    public $primaryKey = 'id';
    //    3. 允许批量操作的字段
    public $guarded = [];

//    public function getCheckStatusAttribute($value)
//    {
//        if ($value == 10) return '待审核';
//        if ($value == 20) return '已审核';
//        if ($value == 30) return '拒绝审核';
//        return '暂无';
//    }
//
//    public function getBindCardStatusAttribute($value)
//    {
//        if ($value == 10) return '否';
//        if ($value == 20) return '是';
//        return '暂无';
//    }
//
//    public function getSexAttribute($value)
//    {
//        if ($value == 0) return '保密';
//        if ($value == 1) return '男';
//        if ($value == 2) return '女';
//        return '暂无';
//    }


    //与会员的关系
    public function member()
    {
        return $this->belongsTo(Member::class,'user_id','id');
    }


}
