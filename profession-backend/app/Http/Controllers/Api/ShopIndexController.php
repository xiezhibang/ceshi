<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ManyShopListRequest;
use App\Http\Requests\Api\NearShopListRequest;
use App\Http\Requests\Api\ShopImageListRequest;
use App\Services\WebService\ShopIndexService;
use Illuminate\Http\Request;

class ShopIndexController extends Controller
{
    /*
     *
     * 商家首页信息列表
     * @param int $page 分页数
     * @param int $limit 每页几条
     * @param string $good_name 商品名称
     * @param string $shop_name 店铺名称
     *
     *
     * */
    public function shopIndexList(Request $request,ShopIndexService $shopIndexService)
    {
        $result = $shopIndexService->shopIndexList($request->page,$request->limit,$request->good_name,$request->shop_name,$request->address);
        return $result;
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
    public function nearAddressShopList(NearShopListRequest $request,ShopIndexService $shopIndexService)
    {
        $result = $shopIndexService->nearAddressShopList($request->page,$request->limit,$request->lat,$request->lng);
        return $result;
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
    public function manyShopList(ManyShopListRequest $request,ShopIndexService $shopIndexService)
    {
        $result = $shopIndexService->manyShopList($request->page,$request->limit,$request->shop_name,$request->category_id,$request->address,$request->limit,$request->lat,$request->lng);
        return $result;
    }

    /*
    * 商家相册
    * @param number $shop_id 店铺ID
    *
    *
    * */
    public function shopImageList(ShopImageListRequest $request,ShopIndexService $shopIndexService)
    {
        $result = $shopIndexService->shopImageList($request->shop_id);
        return $result;
    }




}
