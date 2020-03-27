<?php

namespace App\Services\WebService;
use App\Model\Banner;
use App\Model\Good;
use App\Model\GoodBanner;
use App\Model\MerchantEnter;
use App\Model\ShopImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
class ShopIndexService extends BaseService
{

    /*
     *
     * 商家首页信息列表
     * @param int $page 分页数
     * @param int $limit 每页几条
     * @param string $good_name 商品名称
     * @param string $shop_name 店铺名称
     * @param string $address 地区
     *
     * */
    public function shopIndexList($page,$limit,$good_name,$shop_name,$address)
    {
        //商家首页轮播图
        $banners = Banner::where('type',20)->where('status',1)->select('id','banner_image','links')->get();
        //商品专区
        $good_banners = GoodBanner::get(['id','icon_image','name']);
        //特权商品信息
        $query = Good::where('type',2)->where('state',1);
        if (!empty($shop_name)) {
            $query = $query->where('shop_name', 'like', '%' . $shop_name . '%');
        }
        if (!empty($good_name)) {
            $query = $query->where('good_name', 'like', '%' . $good_name . '%');
        }
        if (!empty($address)) {
            $query = $query->where('shop_address', 'like', '%' . $address . '%');
        }
        $query = $query->select('id','good_image','good_name','shop_id','shop_name','type','commodity_price','selling_price','good_integral','shop_address')
            ->latest()->get()->toArray();
        //每页条数
        $perPage = $limit ? $limit : 200;
        //分页数
        if ($page) {
            $current_page = $page;
            $current_page = $current_page <= 0 ? 1 :$current_page;
        } else {
            $current_page = 1;
        }
        $item = array_slice($query, ($current_page-1)*$perPage, $perPage); //注释1
        $total = count($query);
        $paginator = new LengthAwarePaginator($item, $total, $perPage, $current_page, [
            'path' => Paginator::resolveCurrentPath(),  //注释2
            'pageName' => 'page',
        ]);
        $result = $paginator->toArray()['data'];

        //热销商品信息
        $list = Good::where('type',1)->where('state',1);
        if (!empty($shop_name)) {
            $list = $list->where('shop_name', 'like', '%' . $shop_name . '%');
        }
        if (!empty($good_name)) {
            $list = $list->where('good_name', 'like', '%' . $good_name . '%');
        }
        if (!empty($address)) {
            $list = $list->where('shop_address', 'like', '%' . $address . '%');
        }
        $list = $list->select('id','good_image','good_name','shop_name','commodity_price','selling_price','good_integral','shop_address')
            ->latest()->get()->toArray();
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
        $resultList = $paginator->toArray()['data'];

        $data = ['banners'=>$banners,'good_banners'=>$good_banners,'goodList'=>$result,'ReXiaoGoodList'=>$resultList];
        if ($data){
            return $this->success($data);
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

    }

    /*
     * 附近商家
     * @param int $page 分页数
     * @param int $limit 每页几条
     * @param number $lat 用户所在纬度
     * @param number $lng 用户所在经度
     * 获取收藏的商店，并按距离排序
     *
     *
     * */
    public function nearAddressShopList($page,$limit,$lat,$lng)
    {
        $data = MerchantEnter::get(['id','privilege_type','shop_name','address','overall_evaluate','shop_image','longitude','latitude'])->toArray();
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

    /*
     * 附近商家---更多
     * @param number $page 分页数
     * @param number $limit 每页几条
     * @param string $shop_name 店铺名称
     * @param string $good_name 商品名称
     * @param number $category_id 商品分类ID
     * @param string $near_addr 附近
     * @param string $address 地区
     * @param number $lat 手机当前所在的纬度 必填
     * @param number $lng 手机当前所在的经度 必填
     * */
    public function manyShopList($page,$limit,$shop_name,$good_name,$category_id,$address,$lat,$lng)
    {
        $query = MerchantEnter::with('good:id,shop_id,good_name,category_id')
            //sum 关联求和，统计每个店铺下的商品购物车的数量总和
            ->with(['cart'=>function($d){
                $d->groupBy('shop_id')->selectraw('shop_id ,sum(cart_num) as total_good_num');
            }]);
        if (!empty($shop_name)) {
            $query = $query->where('shop_name', 'like', '%' . $shop_name . '%');
        }
        if (!empty($good_name)) {
            $query = $query->whereHas('good', function ($q) use ($good_name) {
                $q->where('good_name', 'like', '%' . $good_name . '%');
            });
        }
        if (!empty($category_id)) {
            $query = $query->whereHas('good', function ($q) use ($category_id) {
                $q->where('category_id', $category_id);
            });
        }
        if (!empty($address)) {
            $query = $query->where('address', 'like', '%' . $address . '%');
        }
        $query = $query->get(['id','privilege_type','shop_name','address','overall_evaluate','shop_image','longitude','latitude'])
            ->toArray();
        $arr = [];
        foreach ($query as $k=>$v){
            $res = $this->getDistance($lng, $lat, $v['longitude'], $v['latitude'], 2);
            $query[$k]['shop_km'] = $res.'km';
            $arr[$k] = $res;
        }
        //排序
        asort($arr);
        $arr2 = [];
        foreach($arr as $k=>$v){
            $arr2[] = $query[$k];
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

    /*
     * 商家相册
     * @param number $shop_id 店铺ID
     *
     *
     * */
    public function shopImageList($shop_id)
    {
        $data = ShopImage::where('shop_id',$shop_id)->latest('id')->get(['id','shop_id','image']);
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

}