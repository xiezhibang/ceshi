<?php

namespace App\Services\WebService;
use App\Model\GoodCollect;
use App\Model\ShopCollect;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
class CollectService extends BaseService
{

    /*
     *
     * 我的--商品收藏列表
     * @param int $page 分页数
     * @param int $limit 每页几条
     * */
    public function goodCollectList($page,$limit)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        $list = GoodCollect::where('user_id',$uid)->latest()
            ->get(['id','user_id','good_image','good_name','shop_name','commodity_price','selling_price','good_integral'])
            ->toArray();
        //每页条数
        $perPage = $limit ? $limit : 200;
        //分页数
        if ($page) {
            $current_page = $page;
            $current_page = $current_page <= 0 ? 1 :$current_page;
        } else {
            $current_page = 1;
        }

        $item = array_slice($list, ($current_page-1)*$perPage, $perPage); //注释1
        $total = count($list);

        $paginator = new LengthAwarePaginator($item, $total, $perPage, $current_page, [
            'path' => Paginator::resolveCurrentPath(),  //注释2
            'pageName' => 'page',
        ]);

        $data = $paginator->toArray()['data'];

        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     *
     * 我的--店铺收藏列表
     * @param int $page 分页数
     * @param int $limit 每页几条
     * @param number $lat 用户所在纬度
     * @param number $lng 用户所在经度
     * 获取收藏的商店，并按距离排序
     * */
    public function shopCollectList($page,$limit,$lat,$lng)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //用户所收藏的所有店铺数据
        $data = ShopCollect::where('user_id',$uid)->get()->toArray();
        $arr = [];
        foreach ($data as $k=>$v){
            $res = $this->getDistance($lng, $lat, $v['longitude'], $v['latitude'], 2);
            $data[$k]['shop_km'] = $res.'km';
            $arr[$k] = $res;
        }
        //排序
        asort($arr);
        $arr2 = [];
        foreach($arr as $k=>$v){
            $arr2[] = $data[$k];
        }
        //每页条数
        $perPage = $limit ? $limit : 200;
        //分页数
        if ($page) {
            $current_page = $page;
            $current_page = $current_page <= 0 ? 1 :$current_page;
        } else {
            $current_page = 1;
        }

        $item = array_slice($arr2, ($current_page-1)*$perPage, $perPage); //注释1
        $total = count($arr2);

        $paginator = new LengthAwarePaginator($item, $total, $perPage, $current_page, [
            'path' => Paginator::resolveCurrentPath(),  //注释2
            'pageName' => 'page',
        ]);

        $result = $paginator->toArray()['data'];

        //返回结果
        if ($result){
            return $this->success($result);
        }
        return $this->fail(900009);
    }

    /**
     * 计算两点地理坐标之间的距离
     * @param  Decimal $longitude1 起点经度
     * @param  Decimal $latitude1  起点纬度
     * @param  Decimal $longitude2 终点经度
     * @param  Decimal $latitude2  终点纬度
     * @param  Int     $unit       单位 1:米 2:公里
     * @param  Int     $decimal    精度 保留小数位数
     *
     */
    public function getDistance($longitude1, $latitude1, $longitude2, $latitude2, $unit=2, $decimal=2)
    {
        $EARTH_RADIUS = 6370.996; // 地球半径系数
        $PI = 3.1415926;

        $radLat1 = $latitude1 * $PI / 180.0;
        $radLat2 = $latitude2 * $PI / 180.0;

        $radLng1 = $longitude1 * $PI / 180.0;
        $radLng2 = $longitude2 * $PI /180.0;

        $a = $radLat1 - $radLat2;
        $b = $radLng1 - $radLng2;

        $distance = 2 * asin(sqrt(pow(sin($a/2),2) + cos($radLat1) * cos($radLat2) * pow(sin($b/2),2)));
        $distance = $distance * $EARTH_RADIUS * 1000;

        if($unit==2){
            $distance = $distance / 1000;
        }

        return round($distance, $decimal);

        //        // 起点坐标
//        $longitude1 = 113.330405;
//        $latitude1 = 23.147255;
//
//        // 终点坐标
//        $longitude2 = 113.314271;
//        $latitude2 = 23.1323;
//
//        $distance = getDistance($longitude1, $latitude1, $longitude2, $latitude2, 1);
//        echo $distance.'m'; // 2342.38m
//
//        $distance = getDistance($longitude1, $latitude1, $longitude2, $latitude2, 2);
//        echo $distance.'km'; // 2.34km

    }

    /*
     * 取消店铺收藏
     *
     * */


}