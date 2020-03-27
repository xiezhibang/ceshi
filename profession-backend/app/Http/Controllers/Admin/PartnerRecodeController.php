<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\PartnerRecode;
use Illuminate\Http\Request;

class PartnerRecodeController extends Controller
{
    /**
     * Display a listing of the resource.
     * 店铺管理---合伙人列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = PartnerRecode::query();
        if (!empty($request['status'])) {
            $query = $query->where('status', $request['status']);
        }
        if (!empty($request['username'])) {
            $query = $query->where('username', 'like', '%' . $request['username'] . '%');
        }
        if (!empty($request['shop_name'])) {
            $query = $query->where('shop_name', 'like', '%' . $request['shop_name'] . '%');
        }
        if (!empty($request['account'])) {
            $query = $query->where('account', 'like', '%' . $request['account'] . '%');
        }
        $results = $query->latest('id')->paginate(20);
        return view('admin.partner_recode.list',['results'=>$results,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
