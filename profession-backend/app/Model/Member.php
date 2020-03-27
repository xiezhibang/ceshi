<?php

namespace App\Model;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable implements JWTSubject
{
    use Notifiable;

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * 配置Jwt-Auth验证表格的主键（默认ID）
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    //定义表
    protected $table = "members";

    //定义主键
    protected $primaryKey = "id";

    //    3. 允许批量操作的字段
    public $guarded = [];

    //隐藏字段
    protected $hidden = ['password'];

    //数据库字段转换
    protected $casts = [
        'bind_user_time' => 'Y-m-d H:i:s',
        'user_path_time' => 'Y-m-d H:i:s',
        'email_verified_at' => 'Y-m-d H:i:s',
        'created_at' => 'Y-m-d H:i:s',
        'updated_at' => 'Y-m-d H:i:s'
    ];

    protected $appends = [
        'username',
        'full_avatar',
        'is_card',
    ];

    public function getUsernameAttribute()
    {
        return $this->attributes['nick_name'] = $this->memberBind->nick_name;
    }

    public function getFullAvatarAttribute()
    {
        return $this->attributes['avatar'] = $this->memberBind->avatar;
    }

    public function getIsCardAttribute()
    {
        return $this->attributes['bind_card_status'] = $this->memberBind->bind_card_status == 20 ? '是' : '否';
    }

//    public function getTypeAttribute($value)
//    {
//        if ($value == 50) return '合伙人';
//        if ($value == 40) return '商家';
//        if ($value == 30) return '黑金卡会员';
//        if ($value == 20) return '金卡会员';
//        if ($value == 10) return '绿卡会员';
//        return '暂无';
//    }
//
//    public function getBindMobileStatusAttribute($value)
//    {
//        if ($value == 20) return '绑定';
//        if ($value == 10) return '未绑定';
//        return '暂无';
//    }
//
//    public function getStatusAttribute($value)
//    {
//        if ($value == 20) return '锁定';
//        if ($value == 10) return '正常';
//        return '暂无';
//    }

    public function getBindUserTimeAttribute($value)
    {
        return $value ? $value : '暂无';
    }

    //与会员信息的关系
    public function memberBind()
    {
        return $this->hasOne(MemberBind::class,'user_id','id');
    }

    /*
     * 与购物车的关系
     *
     * */
    public function goodCartItems()
    {
        return $this->hasMany(GoodCart::class,'user_id','id');
    }


}
