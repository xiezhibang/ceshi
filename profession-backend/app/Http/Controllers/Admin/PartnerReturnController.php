<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\PartnerReturnDetail;
use Illuminate\Http\Request;

class PartnerReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     * 合伙人收益明细
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = PartnerReturnDetail::query();
        if (!empty($request['order_no'])) {
            $query = $query->where('order_no', 'like', '%' . $request['order_no'] . '%');
        }
        $results = $query->latest('id')->paginate(20);
        return view('admin.partner_return.list',['results'=>$results,'request'=>$request]);
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
