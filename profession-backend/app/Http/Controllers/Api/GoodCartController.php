<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CartListRequest;
use App\Http\Requests\Api\GoodCartAddRequest;
use App\Http\Requests\Api\RemoveCartRequest;
use App\Services\WebService\CartService;
use Illuminate\Http\Request;

class GoodCartController extends Controller
{
    /*
    *
    * 购物车添加
    * @param number $good_id 商品ID
    * @param number $num 商品数量
    *
    * */
    public function cartAdd(GoodCartAddRequest $request,CartService $cartService)
    {
        $result = $cartService->cartAdd($request->good_id,$request->num,$request->attribute_id,$request->sku_id);
        return $result;
    }

    /*
   * 已勾选商品---购物车列表
   * 查询当天的用户购物车信息
   * @param number $shop_id 店铺ID
   *
   * */
    public function cartList(CartListRequest $request,CartService $cartService)
    {
        $result = $cartService->cartList($request->shop_id);
        return $result;
    }

    /*
    * 已勾选的商品--清空（删除购物车商品）
    * @param int $cart_id 购物车ID
    *
    * */
    public function removeGoodCart(RemoveCartRequest $request,CartService $cartService)
    {
        $result = $cartService->removeGoodCart($request->cart_id);
        return $result;
    }

    /*
   * 删除购物车商品（单个）
   * @param int $cart_id 购物车ID
   *
   * */
    public function deleteCartGood(RemoveCartRequest $request,CartService $cartService)
    {
        $result = $cartService->removeGoodCart($request->cart_id);
        return $result;
    }

}
