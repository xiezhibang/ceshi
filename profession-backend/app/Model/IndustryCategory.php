<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class IndustryCategory extends Model
{
    //    1. 关联的数据表
    public $table = 'industry_categories';

    //    2. 主键
    public $primaryKey = 'id';

    //    3. 允许批量操作的字段
    public $guarded = [];

    //子分类
    public function childs()
    {
        return $this->hasMany('App\Model\IndustryCategory','cate_pid','id');
    }

    public static function showCategory()
    {
        // 查看数据
        $info= \DB::table('industry_categories')->get()->toArray();
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
            if($pid==$v->cate_pid){
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
            if($item->cate_pid==$pid){
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
