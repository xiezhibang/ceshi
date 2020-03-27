<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GoodCategory extends Model
{
    //    1. 关联的数据表
    public $table = 'good_categories';

    //    2. 主键
    public $primaryKey = 'id';

    //    3. 允许批量操作的字段
    public $guarded = [];

    //子分类
    public function childs()
    {
        return $this->hasMany('App\Model\GoodCategory','pid','id');
    }

    //所有子类
    public function allChilds()
    {
        return $this->childs()->with('allChilds');
    }

    //分类下所有的商品
//    public function articles()
//    {
//        return $this->hasMany('App\Model\Article');
//    }


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
                    if($v->pid == $n->cate_pid){
                        //给分类名称添加缩进
                        $n->name = '|-----'.$n->name;
                        $arr[] = $n;
                    }
                }
            }
        }

        return $arr;
    }

    //状态
//    public function getStatusAttribute($value)
//    {
//        if ($value == 10) return '显示';
//        if ($value == 20) return '隐藏';
//        if ($value == 30) return '已删除';
//        return '--';
//    }

    public static function showCategory()
    {
        // 查看数据
        $info= \DB::table('good_categories')->get()->toArray();
        // 递归调用 自己调用自己
        $result = self::list_level($info,$pid=0,$level=0);
        return $result;
    }

    // 写一个提供无限极分类调取的方法
    public static function list_level($info,$pid,$level)
    {
        //静态定义一个数组
        static $array=array();
        // 循环
        foreach($info as $k => $v){
            if($pid==$v->pid){
                $v->level=$level;
                $array[]=$v;
                self::list_level($info,$v->id,$level+1);
            }
        }
        return $array;
    }


    /**
     * 获取分类列表
     */
    public static function getcates()
    {
        $cates = self::orderBy("cate_order","desc")->orderBy("id","desc")->get();
//        $cates = (new self())->makecates($cates);
        $cates = self::makecates($cates);
        return $cates;
    }

    /**
     * 组织分类数据
     */
    private static function makecates($data,$pid=0,$level=0)
    {
        $arr = [];
        foreach ($data as $item){
            if($item->pid==$pid){
                $item->level = $level;
                $arr[]=$item;
                $arr_tmp = self::makecates($data,$item->id,$level+1);
                $arr = array_merge($arr,$arr_tmp);
            }
        }
        return $arr;
    }

    /**
     * 取指定分类所有的子分类
     * @param $id
     */
    public static function getChildsIds($id){
        $ids[] =$id;
        $data = self::all();
        $childs =  self::makecates($data,$id);
        foreach ($childs as $item){
            $ids[] =$item->id;
        }
        return $ids;
    }

}
