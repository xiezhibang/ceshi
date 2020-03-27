<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\StorePartnerDetail;
use Illuminate\Http\Request;

class StorePartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     * 店铺合伙明细
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = StorePartnerDetail::query();
        if (!empty($request['shop_account'])) {
            $query = $query->where('shop_account', 'like', '%' . $request['shop_account'] . '%');
        }
        if (!empty($request['shop_name'])) {
            $query = $query->where('shop_name', 'like', '%' . $request['shop_name'] . '%');
        }
        if (!empty($request['username'])) {
            $query = $query->where('username', 'like', '%' . $request['username'] . '%');
        }
        if (!empty($request['phone'])) {
            $query = $query->where('phone', 'like', '%' . $request['phone'] . '%');
        }
        $results = $query->latest('id')->paginate(20);
        return view('admin.store_partner.list',['results'=>$results,'request'=>$request]);
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
