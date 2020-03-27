<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\MerchantUpdateRequest;
use App\Http\Requests\Api\ProjectDetailRequest;
use App\Http\Requests\Api\SearchRequest;
use App\Http\Requests\Api\ShopCollectRequest;
use App\Http\Requests\Api\ShopDetailGoodListRequest;
use App\Http\Requests\Api\ShopDetailRequest;
use App\Services\WebService\ShopService;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /*
    * 商家详情---在售商品
    * @param int $page 分页数
    * @param int $limit 每页几条
    * @param number $shop_id 店铺ID
    *
    * */
    public function shopDetailGoodList(ShopDetailGoodListRequest $request,ShopService $shopService)
    {
        $result = $shopService->shopDetailGoodList($request->page,$request->limit,$request->shop_id);
        return $result;
    }

    /*
    * 商家详情---商家信息
    * @param number $shop_id 店铺ID
    *
    * */
    public function shopDetail(ShopDetailRequest $request,ShopService $shopService)
    {
        $result = $shopService->shopDetail($request->shop_id);
        return $result;
    }

    /*
     * 店铺收藏
     * @param number $shop_id 店铺ID
     *
     * */
    public function shopCollectAdd(ShopCollectRequest $request,ShopService $shopService)
    {
        $result = $shopService->shopCollectAdd($request->shop_id);
        return $result;
    }

    /*
     * 取消店铺收藏
     * @param number $shop_id 店铺ID
     *
     * */
    public function removeShopCollect(ShopCollectRequest $request,ShopService $shopService)
    {
        $result = $shopService->removeShopCollect($request->shop_id);
        return $result;
    }

    /*
     * 店铺信息
     *
     * */
    public function shopMerchantDetail(ShopService $shopService)
    {
        $result = $shopService->shopMerchantDetail();
        return $result;
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
    public function updateShopDetail(MerchantUpdateRequest $request,ShopService $shopService)
    {
        $result = $shopService->updateShopDetail($request->shop_name,$request->desc,$request->shop_province,$request->shop_city,$request->shop_district,$request->shop_address,$request->shop_mobile,$request->longitude,$request->latitude);
        return $result;
    }

    /*
    *
    * 店铺列表
    * @param string $keywords 关键词
    *
    * */
    public function shopList(SearchRequest $request,ShopService $shopService)
    {
        $result = $shopService->shopList($request);
        return $result;
    }

    /*
    *
    * 中资联店铺列表（项目列表）
    * @param int $category_id 项目分类ID
    * @param number $lat 当前的纬度
    * @param number $lng 当前的经度
    * 获取收藏的商店，并按距离排序
    *
    * */
    public function zjlShopList(Request $request,ShopService $shopService)
    {
        $result = $shopService->zjlShopList($request->category_id,$request->page,$request->limit,$request->lat,$request->lng);
        return $result;
    }

    /*
    * 项目详情
    * @param int $project_id 项目ID
    *
    * */
    public function projectDetail(ProjectDetailRequest $request,ShopService $shopService)
    {
        $result = $shopService->projectDetail($request->project_id);
        return $result;
    }

}
