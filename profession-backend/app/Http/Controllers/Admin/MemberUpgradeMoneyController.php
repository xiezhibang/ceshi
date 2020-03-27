<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\MemberUpgradeMoney;
use Illuminate\Http\Request;

class MemberUpgradeMoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     * 会员升级金额设置
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = MemberUpgradeMoney::query();
        if (!empty($request['remark'])) {
            $query = $query->where('remark', 'like', '%' . $request['remark'] . '%');
        }
        $results = $query->latest('id')->paginate(20);
        return view('admin.member_upgrade_money.list',['results'=>$results,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.member_upgrade_money.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');
        $info =  MemberUpgradeMoney::create($input);
        flash('添加成功')->success()->important();
        return redirect()->route('upgradeprice.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = MemberUpgradeMoney::findOrFail($id);
        return view('admin.member_upgrade_money.edit',['info'=>$info]);
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
        $info = MemberUpgradeMoney::find($id);
        $input = $request->all();
        $res = $info->update($input);
        flash('修改成功')->success()->important();
        return redirect()->route('upgradeprice.index');
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
