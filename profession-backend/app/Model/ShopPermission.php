<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShopPermission extends Model
{
    //    1. 关联的数据表
    public $table = 'shop_permissions';

    //    2. 主键
    public $primaryKey = 'id';

    //    3. 允许批量操作的字段
    public $guarded = [];


//    格式化分类数据
    public function tree()
    {
        //获取所有的分类数据
        $cates = $this->orderBy('cate_order','asc')->get();

        //格式化（排序、二级类缩进）
        return $this->getTree($cates);
    }

    public function getTree($category)
    {
        //排序
//        存放最终排完序的分类数据
        $arr = [];
//        先获取一级类
        foreach ($category as $k=>$v){
            //一级类
            if($v->pid == 0){
                $arr[] = $v;
                //获取一级类下的二级类
                foreach ($category as $m=>$n){
                    if($v->pid == $n->pid){
                        //给分类名称添加缩进
                        $n->name = '|-----'.$n->name;
                        $arr[] = $n;
                    }
                }
            }
        }

        return $arr;
    }

    //子分类
    public function childs()
    {
        return $this->hasMany('App\Model\ShopPermission','pid','id');
    }

    //所有子类
    public function allChilds()
    {
        return $this->childs()->with('allChilds');
    }

    //分类下所有的
    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }

}
