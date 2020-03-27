<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\PrepaidChange;
use Illuminate\Http\Request;

class PrepaidChangeController extends Controller
{
    /**
     * Display a listing of the resource.
     * 充值订单列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = PrepaidChange::query();
        if (!empty($request['username'])) {
            $query = $query->where('username', 'like', '%' . $request['username'] . '%');
        }
        if (!empty($request['order_no'])) {
            $query = $query->where('order_no', 'like', '%' . $request['order_no'] . '%');
        }
        $results = $query->latest('id')->paginate(20);
        return view('admin.prepaid_change.list',['results'=>$results,'request'=>$request]);
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
