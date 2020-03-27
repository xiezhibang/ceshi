<?php

namespace App\Services\WebService;

use App\Model\Good;
use App\Model\Member;
use App\Model\MerchantEnter;
use App\Model\ShopCollect;
use App\Model\ShopImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
class ShopService extends BaseService
{

    /*
     * 商家详情---在售商品
     * @param int $page 分页数
     * @param int $limit 每页几条
     * @param number $shop_id 店铺ID
     *
     * */
    public function shopDetailGoodList($page,$limit,$shop_id)
    {
        //店铺信息
        $shop = MerchantEnter::with('shopImage')
            ->select('id','shop_name','address','phone')
            ->where('id',$shop_id)
            ->first();
        //在售商品
        $good = Good::where('shop_id',$shop_id)
            ->where('state',1)
            ->where('selling_num','>',0)
            ->select('id','shop_id','selling_num','type','good_name','selling_price','good_integral','limit_num','good_image','shop_name')
            ->latest('id')
            ->get()->toArray();
        //每页条数
        $perPage = $limit ? $limit : 200;
        //分页数
        if ($page) {
            $current_page = $page;
            $current_page = $current_page <= 0 ? 1 :$current_page;
        } else {
            $current_page = 1;
        }
        $item = array_slice($good, ($current_page-1)*$perPage, $perPage); //注释1
        $total = count($good);
        $paginator = new LengthAwarePaginator($item, $total, $perPage, $current_page, [
            'path' => Paginator::resolveCurrentPath(),  //注释2
            'pageName' => 'page',
        ]);
        $result = $paginator->toArray()['data'];
        $data = ['shopInfo'=>$shop,'goodList'=>$result];
        if ($shop){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 商家详情---商家信息
     * @param number $shop_id 店铺ID
     *
     * */
    public function shopDetail($shop_id)
    {
        //店铺信息
        $data = MerchantEnter::query()
            ->select('id','shop_name','shop_image','desc')
            ->where('id',$shop_id)
            ->first();
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 店铺收藏
     * @param number $shop_id 店铺ID
     *
     * */
    public function shopCollectAdd($shop_id)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        $member = Member::find($uid);
        //店铺信息
        $shop = MerchantEnter::find($shop_id);
        //判断是否已收藏
        $collect = ShopCollect::where('user_id',$uid)->where('shop_id',$shop_id)->first();
        if ($collect){
            //更新
            $data = $collect->update([
                'user_id'          => $uid,
                'nick_name'        => $member->memberBind->nick_name,
                'shop_id'          => $shop_id,
                'shop_name'        => $shop['shop_name'],
                'shop_image'       => $shop['shop_image'],
                'shop_address'     => $shop['address'],
                'shop_type'        => $shop['privilege_type'],
                'overall_evaluate' => $shop['overall_evaluate'],
                'longitude'        => $shop['longitude'],
                'latitude'         => $shop['latitude'],
                'status'           => 2,
            ]);
        }else{
            //添加收藏数据
            $data = ShopCollect::create([
                'user_id'          => $uid,
                'nick_name'        => $member->memberBind->nick_name,
                'shop_id'          => $shop_id,
                'shop_name'        => $shop['shop_name'],
                'shop_image'       => $shop['shop_image'],
                'shop_address'     => $shop['address'],
                'shop_type'        => $shop['privilege_type'],
                'overall_evaluate' => $shop['overall_evaluate'],
                'longitude'        => $shop['longitude'],
                'latitude'         => $shop['latitude'],
                'status'           => 2,
            ]);
        }

        if ($data){
            return $this->success($data);
        }
        return $this->fail(300006);
    }

    /*
     * 取消店铺收藏
     * @param number $shop_id 店铺ID
     *
     * */
    public function removeShopCollect($shop_id)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //取消
        $data = ShopCollect::where('user_id',$uid)
            ->where('shop_id',$shop_id)
            ->delete();
        if ($data){
            return $this->success($data);
        }
        return $this->fail(300009);
    }

    /*
     * 店铺信息
     *
     *
     * */
    public function shopMerchantDetail()
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //店铺
        $data = MerchantEnter::where('user_id',$uid)->first();
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 店铺信息修改
     * @param string $shop_name 店铺名称
     * @param string $desc 简介
     * @param string $shop_province 店铺省份
     * @param string $shop_city 店铺城市
     * @param string $shop_district 店铺区/县
     * @param string $shop_address 店铺地址
     * @param number $shop_mobile 店铺电话
     * @param number $longitude 店铺的经度
     * @param number $latitude 店铺的纬度
     *
     * */
    public function updateShopDetail($shop_name,$desc,$shop_province,$shop_city,$shop_district,$shop_address,$shop_mobile,$longitude,$latitude)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //店铺
        $data = MerchantEnter::where('user_id',$uid)->update([
            'shop_name' => $shop_name,
            'desc' => $desc,
            'province' => $shop_province,
            'city' => $shop_city,
            'district' => $shop_district,
            'address' => $shop_address,
            'phone' => $shop_mobile,
            'longitude' => $longitude,
            'latitude' => $latitude,
        ]);
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(300008);
    }

    /*
     *
     * 店铺列表
     * @param string $keywords 关键词
     *
     * */
    public function shopList($request)
    {
        $where = function ($query) use ($request) {
            if ($request->has('keywords') and $request->keywords != '') {
                $search = "%" . $request->keywords . "%";
                $query->where('district', 'like', $search);
               // $query->orWhere('address', 'like', $search);
            }
        };
        $query = MerchantEnter::query();
        $data = $query->where($where)->select('id','shop_name','shop_image','city','district','address')
            ->orderBy('id', 'desc')->get();
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     *
     * 中资联店铺列表（项目列表）
     * @param int $category_id 项目分类ID
     * @param number $lat 用户所在纬度
     * @param number $lng 用户所在经度
     * 获取收藏的商店，并按距离排序
     *
     * */
    public function zjlShopList($category_id,$page,$limit,$lat,$lng)
    {
        $data = MerchantEnter::where('cate_industry_id',$category_id)
            ->where('type',2)
            ->where('status',0)
            ->where('check_status',1)
            ->latest('id')
            ->get(['id','privilege_type','shop_name','city','district','address','overall_evaluate','shop_image','longitude','latitude']);

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

    }

    /*
     * 项目详情
     * @param int $project_id 项目ID
     *
     * */
    public function projectDetail($project_id)
    {
        //店铺信息
        $shopInfo = MerchantEnter::where('id',$project_id)
            ->select('id','shop_name','desc','city','district','address','phone')
            ->first();
        //店铺图片
        $shopImageList = ShopImage::where('shop_id',$project_id)->get();
        //总收益
        $earnTotal = Member::where('id',$shopInfo['user_id'])->select('id','total_credits','revenue_money')->first();
        //昨日收益
        //昨天时间
        $s_data_2 = date("Y-m-d 00:00:00",strtotime("-1 day"));
        $e_data_2 = date("Y-m-d 23:59:59",strtotime("-1 day"));
        //昨日收益
        $yesterdayTotal = Member::where('id',$shopInfo['user_id'])
            ->whereBetween('updated_at', [$s_data_2,$e_data_2])
            ->select('id','total_credits','revenue_money','updated_at')
            ->first();

        $data = [
            'shopInfo' => $shopInfo,
            'shopImageList' => $shopImageList,
            'earnTotal' => $earnTotal,
            'yesterdayTotal' => $yesterdayTotal,
        ];

        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);

    }

}