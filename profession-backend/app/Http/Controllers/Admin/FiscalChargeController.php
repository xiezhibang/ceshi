<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\FiscalCharge;
use Illuminate\Http\Request;

class FiscalChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     * 财务管理---流水支出列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = FiscalCharge::query();
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
        return view('admin.fiscal_charge.list',['results'=>$results,'request'=>$request]);
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
        $info = FiscalCharge::findOrFail($id);
        return view('admin.fiscal_charge.edit',['info'=>$info]);
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
        $info = FiscalCharge::find($id);
        $input = $request->all();
        $res = $info->update($input);
        flash('修改成功')->success()->important();
        return redirect()->route('fiscalcharge.index');
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
