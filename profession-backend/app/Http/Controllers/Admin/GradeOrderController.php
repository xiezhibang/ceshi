<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\GradeOrder;
use Illuminate\Http\Request;

class GradeOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * 会员升级订单列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = GradeOrder::query();
        if (!empty($request['type'])) {
            $query = $query->where('type', $request['type']);
        }
        if (!empty($request['payment'])) {
            $query = $query->where('payment', $request['payment']);
        }
        if (!empty($request['order_no'])) {
            $query = $query->where('order_no', 'like', '%' . $request['order_no'] . '%');
        }
        if (!empty($request['username'])) {
            $query = $query->where('username', 'like', '%' . $request['username'] . '%');
        }
        $results = $query->latest('id')->paginate(20);
        return view('admin.grade_order.list',['results'=>$results,'request'=>$request]);
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
