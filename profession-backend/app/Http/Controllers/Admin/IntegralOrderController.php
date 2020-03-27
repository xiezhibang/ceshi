<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\IntegralConverOrder;
use Illuminate\Http\Request;

class IntegralOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * 积分转换订单列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = IntegralConverOrder::query();
        if (!empty($request['status'])) {
            $query = $query->where('status', $request['status']);
        }
        if (!empty($request['order_no'])) {
            $query = $query->where('order_no', 'like', '%' . $request['order_no'] . '%');
        }
        if (!empty($request['username'])) {
            $query = $query->where('username', 'like', '%' . $request['username'] . '%');
        }
        if (!empty($request['account'])) {
            $query = $query->where('account', 'like', '%' . $request['account'] . '%');
        }
        $results = $query->latest('id')->paginate(20);
        return view('admin.integral_order.list',['results'=>$results,'request'=>$request]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
