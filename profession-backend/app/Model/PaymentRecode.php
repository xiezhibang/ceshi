<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PaymentRecode extends Model
{
    //    1. 关联的数据表
    public $table = 'payment_recodes';
    //    2. 主键
    public $primaryKey = 'id';
    //    3. 允许批量操作的字段
    //    public $fillable = ['user_name','user_pass','email','phone'];
    public $guarded = [];
}
