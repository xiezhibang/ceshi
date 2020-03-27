<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * 订单列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Order::query();
        if (!empty($request['status'])) {
            $query = $query->where('status', $request['status']);
        }
        if (!empty($request['payment'])) {
            $query = $query->where('payment', $request['payment']);
        }
        if (!empty($request['order_sn'])) {
            $query = $query->where('order_sn', 'like', '%' . $request['order_sn'] . '%');
        }
        if (!empty($request['username'])) {
            $query = $query->where('username', 'like', '%' . $request['username'] . '%');
        }
        if (!empty($request['shop_name'])) {
            $query = $query->where('shop_name', 'like', '%' . $request['shop_name'] . '%');
        }
        $results = $query->latest('id')->paginate(20);
        return view('admin.order.list',['results'=>$results,'request'=>$request]);
    }

    /**
     * Display the specified resource.
     * 展示订单详情页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //查询订单信息
        $order = Order::find($id);
        //查订单详情
        $results = OrderItem::query()->where('order_id',$id)->latest('id')->get();
        //总价
        $totalPrice = OrderItem::query()->where('order_id',$id)->sum('total_price');
        return view('admin.order.item',['results'=>$results,'order'=>$order,'totalPrice'=>$totalPrice]);
    }


}
