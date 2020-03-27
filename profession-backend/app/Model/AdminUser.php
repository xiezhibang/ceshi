<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    //    1. 关联的数据表
    public $table = 'admin_users';

    //    2. 主键
    public $primaryKey = 'user_id';

    //    3. 允许批量操作的字段
    public $guarded = [];

    //    4. 是否维护crated_at 和 updated_at字段
   // public $timestamps = false;

    //跟Role的关联模型
    public function role()
    {
        return $this->belongsToMany('App\Model\AdminRole','user_roles','user_id','role_id');
    }

    /**
     * 获取新的文章标题。
     *
     * @param  string  $value
     * @return string
     */
//    public function getNewTitleAttribute($value)
//    {
//        return $this->user_id . "_" . $this->title;
//    }

    public function getPhoneAttribute($value)
    {
        return $value ? $value : '--';
    }

}
