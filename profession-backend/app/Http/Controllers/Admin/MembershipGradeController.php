<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\MembershipGrade;
use Illuminate\Http\Request;

class MembershipGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     * 会员等级收益
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = MembershipGrade::query();
        if (!empty($request['name'])) {
            $query = $query->where('name', 'like', '%' . $request['name'] . '%');
        }
        $results = $query->latest('id')->paginate(20);
        return view('admin.membership_grade.list',['results'=>$results,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.membership_grade.add');
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
        $info =  MembershipGrade::create($input);
        flash('添加成功')->success()->important();
        return redirect()->route('shipgrade.index');
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
        $info = MembershipGrade::findOrFail($id);
        return view('admin.membership_grade.edit',['info'=>$info]);
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
        $info = MembershipGrade::find($id);
        $input = $request->all();
        $res = $info->update($input);
        flash('修改成功')->success()->important();
        return redirect()->route('shipgrade.index');
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
