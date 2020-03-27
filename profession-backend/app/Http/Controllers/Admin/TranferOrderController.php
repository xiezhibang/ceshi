<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Member;
use App\Model\Order;
use App\Model\Website;
use Illuminate\Http\Request;

class TranferOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * 交易数据
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        dd(Order::with('item')->get()->toArray());
        $query = Order::with('item');
        if (!empty($request['status'])) {
            $query = $query->where('status', $request['status']);
        }
        if (!empty($request['payment'])) {
            $query = $query->where('payment', $request['payment']);
        }
        if (!empty($request['order_sn'])) {
            $query = $query->where('order_sn', 'like', '%' . $request['order_sn'] . '%');
        }
        $results = $query->latest('id')->paginate(20);

        return view('admin.tranfer.list',[
            'results'=>$results,
            'request'=>$request,
        ]);
    }


}
