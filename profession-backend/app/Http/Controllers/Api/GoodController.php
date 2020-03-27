<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\GoodAddRequest;
use App\Http\Requests\Api\GoodAttributeRequest;
use App\Http\Requests\Api\GoodAttributeSkuRequest;
use App\Http\Requests\Api\GoodCollectAddRequest;
use App\Http\Requests\Api\GoodDetailRequest;
use App\Http\Requests\Api\GoodSkuRequest;
use App\Http\Requests\Api\PageLimitRequest;
use App\Http\Requests\Api\RemoveGoodRequest;
use App\Http\Requests\Api\SkuListRequest;
use App\Http\Requests\Api\StateGoodRequest;
use App\Services\WebService\GoodService;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    /*
     * 商品详情
     * @param number $good_id 商品ID
     *
     * */
    public function goodDetail(GoodDetailRequest $request,GoodService $goodService)
    {
        $result = $goodService->goodDetail($request->good_id);
        return $result;
    }

    /*
     * 商品收藏
     * @param number $good_id 商品ID
     *
     *
     * */
    public function addGoodCollect(GoodCollectAddRequest $request,GoodService $goodService)
    {
        $result = $goodService->addGoodCollect($request->good_id);
        return $result;
    }

    /*
    * 取消商品收藏
    * @param number $good_id 商品ID
    *
    * */
    public function removeGoodCollect(GoodCollectAddRequest $request,GoodService $goodService)
    {
        $result = $goodService->removeGoodCollect($request->good_id);
        return $result;
    }

    /*
    * 商品分类列表
    *
    * */
    public function goodCategoryList(GoodService $goodService)
    {
        $result = $goodService->goodCategoryList();
        return $result;
    }

    /*
     * 行业项目分类列表
     *
     * */
    public function industryCategoryList(GoodService $goodService)
    {
        $result = $goodService->industryCategoryList();
        return $result;
    }

    /*
     * 特权商品---更多
     * @param number $page 分页数
     * @param number $limit 每页几条
     * @param number $category_id 商品分类ID
     * @param number $integral 积分
     * @param string $address 地区
     *
     * */
    public function privilegeGoodList(Request $request,GoodService $goodService)
    {
        $result = $goodService->privilegeGoodList($request->page,$request->limit,$request->category_id,$request->integral,$request->address);
        return $result;
    }

    /*
     * 热销商品---更多
     * @param number $page 分页数
     * @param number $limit 每页几条
     * @param number $category_id 商品分类ID
     * @param number $money 价格
     * @param string $address 地区
     *
     * */
    public function hotGoodList(Request $request,GoodService $goodService)
    {
        $result = $goodService->hotGoodList($request->page,$request->limit,$request->category_id,$request->money,$request->address);
        return $result;
    }

    /*
     *
     * 创建商品规格
     * @param string $name 规格名称
     *
     * */
    public function createGoodAttribute(GoodAttributeRequest $request,GoodService $goodService)
    {
        $result = $goodService->createGoodAttribute($request->name);
        return $result;
    }

    /*
    * 创建商品规格值
    * @param number $attribute_id 规格ID
    * @param number $type 类型 1-价格 2-积分
    * @param string $sku_name 规格选项名称
    * @param number $money 积分或者价格
    * @param number $stock 库存
    *
    * */
    public function createGoodSku(GoodSkuRequest $request,GoodService $goodService)
    {
        $result = $goodService->createGoodSku($request->items);
        return $result;
    }

    /*
    *
    * 商品SKU列表
    * @param array $attribute_id 商品规格ID
    *
    * */
    public function goodSkuList(SkuListRequest $request,GoodService $goodService)
    {
        $result = $goodService->goodSkuList($request->attribute_id);
        return $result;
    }

    /*
     * 商品管理列表
     * @param int $page 分页数
     * @param int $limit 每页几条
     *
     * */
    public function goodList(PageLimitRequest $request,GoodService $goodService)
    {
        $result = $goodService->goodList($request->page,$request->limit);
        return $result;
    }

    /*
     *
     * 创建商品
     * @param string $good_name 商品名称
     * @param string $commodity_price 商品原价
     * @param string $category_id 商品分类ID
     * @param string $type 是否特权 1-否 2-是
     * @param string $selling_price 商品售价
     * @param string $good_integral 商品积分
     * @param string $sku_id 商品规格值ID，数组形式
     * @param string $limit_num 限购数量
     * @param string $total_stock 商品总库存
     * @param string $state 上下架 1-上架 2-下架 3-软删除
     * @param string $order 排序
     * @param string $good_image 商品主图
     * @param string $detail_image 商品详情
     * @param string $description 购买须知
     *
     *
     * */
    public function createGood(GoodAddRequest $request,GoodService $goodService)
    {
        $result = $goodService->createGood($request->good_name,$request->commodity_price,$request->category_id,$request->type,$request->selling_price,$request->good_integral,$request->sku_id,$request->limit_num,$request->total_stock,$request->state,$request->order,$request->good_image,$request->detail_image,$request->description);
        return $result;
    }

    /*
     *
     * 删除商品
     * @param array $good_id 商品ID
     *
     * */
    public function removeGood(RemoveGoodRequest $request,GoodService $goodService)
    {
        $result = $goodService->removeGood($request->good_id);
        return $result;
    }

    /*
     * 规格列表
     *
     * */
    public function goodAttributeList(GoodService $goodService)
    {
        $result = $goodService->goodAttributeList();
        return $result;
    }

    /*
    * 商品下架
    * @param int $good_id 商品ID
    *
    *
    * */
    public function removeGoodState(StateGoodRequest $request,GoodService $goodService)
    {
        $result = $goodService->removeGoodState($request->good_id);
        return $result;
    }

    /*
    * 商品上架
    * @param int $good_id 商品ID
    *
    *
    * */
    public function addGoodState(StateGoodRequest $request,GoodService $goodService)
    {
        $result = $goodService->addGoodState($request->good_id);
        return $result;
    }

    /*
     * 单个商品的规格信息
     * @param int $good_id 商品ID
     *
     * */
    public function goodAttributeSkuInfo(GoodAttributeSkuRequest $request,GoodService $goodService)
    {
        $result = $goodService->goodAttributeSkuInfo($request->good_id);
        return $result;
    }
}
