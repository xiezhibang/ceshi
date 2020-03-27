<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\PartnerInvest;
use Illuminate\Http\Request;

class PartnerInvestController extends Controller
{
    /**
     * Display a listing of the resource.
     * 合伙人投资明细
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = PartnerInvest::query();
        if (!empty($request['username'])) {
            $query = $query->where('username', 'like', '%' . $request['username'] . '%');
        }
        if (!empty($request['user_account'])) {
            $query = $query->where('user_account', 'like', '%' . $request['user_account'] . '%');
        }
        $results = $query->latest('id')->paginate(20);
        return view('admin.partner_invest.list',['results'=>$results,'request'=>$request]);
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
