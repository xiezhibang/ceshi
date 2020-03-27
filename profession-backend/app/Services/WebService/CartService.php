<?php

namespace App\Services\WebService;
use App\Model\Good;
use App\Model\GoodAttribute;
use App\Model\GoodCart;
use App\Model\GoodSku;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
class CartService extends BaseService
{

   /*
    *
    * 购物车添加
    * @param number $good_id 商品ID
    * @param number $num 商品数量
    * @param number $attribute_id 规格ID
    * @param number $sku_id 规格值ID
    *
    * */
   public function cartAdd($good_id,$num,$attribute_id,$sku_id)
   {
       //用户信息
       $user = Auth::guard('member')->user();
       //用户ID
       $uid = $user->id;
       //商品信息
       $good = Good::find($good_id);
       //判断该用户是否已添加该商品
       $exit_cart = GoodCart::where('user_id',$uid)->where('good_id',$good_id)->first();
       if ($exit_cart){
           //更新商品数量
          // $data = $exit_cart->increment('cart_num',$num);
           //更新购物车信息
           $data = $exit_cart->update([
               'user_id' => $uid,
               'attribute_id' => $attribute_id,
               'sku_id' => $sku_id,
               'shop_id' => $good['shop_id'],
               'cart_num' => $num,
               'attr_name' => GoodAttribute::where('id',$attribute_id)->value('name'),
               'sku_name' => GoodSku::where('id',$sku_id)->value('sku_name'),
           ]);
       }else{
           //添加购物车信息
           $cart = New GoodCart();
           $cart->good_id = $good_id;
           $cart->user_id = $uid;
           $cart->shop_id = $good['shop_id'];
           $cart->attribute_id = $attribute_id;
           $cart->attr_name = GoodAttribute::where('id',$attribute_id)->value('name');
           $cart->sku_id = $sku_id;
           $cart->sku_name = GoodSku::where('id',$sku_id)->value('sku_name');
           $cart->cart_num = $num;
           $cart->good_name = $good['good_name'];
           $cart->good_image = $good['good_image'];
           $cart->money = $good['selling_price'];
           $cart->credit = $good['good_integral'];
           $cart->orgin_money = $good['commodity_price'];
           $cart->good_type = $good['type'];
           $cart->created_at = date('Y-m-d H:i:s');
           $cart->updated_at = date('Y-m-d H:i:s');
           $data = $cart->save();
       }
       //返回结果
       if ($data){
           return $this->success($data);
       }
       return $this->fail(700007);
   }


   /*
    * 已勾选商品---购物车列表
    * 查询当天的用户购物车信息
    * @param number $shop_id 店铺ID
    *
    * */
   public function cartList($shop_id)
   {
       //用户信息
       $user = Auth::guard('member')->user();
       //用户ID
       $uid = $user->id;
       //当天时间
       //$date = date('Y-m-d');
       //购物车信息
       $data = GoodCart::where('user_id',$uid)
           ->where('shop_id',$shop_id)
          // ->whereDate('created_at', $date)
           ->latest()
           ->get()
           ->toArray();
       //返回结果
       if ($data){
           return $this->success($data);
       }
       return $this->fail(900009);
   }

   /*
    * 已勾选的商品--清空（删除购物车商品）
    * @param int $cart_id 购物车ID
    *
    * */
   public function removeGoodCart($cart_id)
   {
       //可以传单个 ID，也可以传 ID 数组
       if (!is_array($cart_id)) {
           $cart_id = [$cart_id];
       }
       //用户信息
       $user = Auth::guard('member')->user();
       //用户ID
       $uid = $user->id;
       //移除购物车商品
       $data = GoodCart::where('user_id',$uid)->whereIn('id',$cart_id)->delete();
       //返回结果
       if ($data){
           return $this->success($data);
       }
       return $this->fail(700008);
   }

   /*
    * 删除商品（单个）
    * @param int $cart_id 购物车ID
    *
    * */
   public function deleteCartGood($cart_id)
   {
       $user = Auth::guard('member')->user();
       //用户ID
       $uid = $user->id;
       //移除购物车商品
       $data = GoodCart::where('user_id',$uid)->where('id',$cart_id)->delete();
       //返回结果
       if ($data){
           return $this->success($data);
       }
       return $this->fail(700008);
   }

}