<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\MerchantEnter;
use Illuminate\Http\Request;

class MerchantEnterController extends Controller
{
    /**
     * Display a listing of the resource.
     * 商家入驻列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = MerchantEnter::query();
        if (!empty($request['check_status'])) {
            $query = $query->where('check_status', $request['check_status']);
        }
        if (!empty($request['type'])) {
            $query = $query->where('type', $request['type']);
        }
        if (!empty($request['status'])) {
            $query = $query->where('status', $request['status']);
        }
        if (!empty($request['shop_name'])) {
            $query = $query->where('shop_name', 'like', '%' . $request['shop_name'] . '%');
        }
        if (!empty($request['username'])) {
            $query = $query->where('username', 'like', '%' . $request['username'] . '%');
        }
        if (!empty($request['user_phone'])) {
            $query = $query->where('user_phone', 'like', '%' . $request['user_phone'] . '%');
        }
        $results = $query->latest('id')->paginate(20);
        return view('admin.merchant.list',['results'=>$results,'request'=>$request]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = MerchantEnter::findOrFail($id);
        return view('admin.merchant.edit',['info'=>$info]);
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
        //根据id,获取要修改的信息
        $info = MerchantEnter::find($id);
        $res = $info->update([
            'status' => $request->status,
            'recommend_status' => $request->recommend_status,
            'check_status' => $request->check_status,
        ]);
        flash('修改成功')->success()->important();
        return redirect()->route('merchant.index');
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
