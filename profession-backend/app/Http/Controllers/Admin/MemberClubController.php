<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\MemberClub;
use Illuminate\Http\Request;

class MemberClubController extends Controller
{
    /**
     * Display a listing of the resource.
     * 俱乐部会员列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = MemberClub::query();
        if (!empty($request['status'])) {
            $query = $query->where('status', $request['status']);
        }
        if (!empty($request['add_status'])) {
            $query = $query->where('add_status', $request['add_status']);
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
        return view('admin.member_club.list',['results'=>$results,'request'=>$request]);
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
        $info = MemberClub::findOrFail($id);
        return view('admin.member_club.edit',['info'=>$info]);
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
        $info = MemberClub::find($id);
        $input = $request->all();
        $res = $info->update($input);
        flash('修改成功')->success()->important();
        return redirect()->route('club.index');
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
