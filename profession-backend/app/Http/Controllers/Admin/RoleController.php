<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AdminPermission;
use App\Model\AdminRole;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    //获取授权页面
    public function auth($id)
    {
        //获取当前角色
        $role = AdminRole::find($id);
        //获取所有的权限列表
        $perms = AdminPermission::get();
        //获取当前角色拥有的权限
        $own_perms = $role->permission;
//        角色拥有的权限的id
        $own_pers = [];
        foreach ($own_perms as $v){
            $own_pers[] = $v->id;
        }
        return view('admin.role.auth',compact('role','perms','own_pers'));
    }

    //处理授权
    public function doAuth(Request $request)
    {
        $input = $request->except('_token');
        //删除当前角色已有的权限
        \DB::table('role_permissions')->where('role_id',$input['role_id'])->delete();
        //添加新授予的权限
        if(!empty($input['permission_id'])){
            foreach ($input['permission_id'] as $v){
                \DB::table('role_permissions')->insert(['role_id'=>$input['role_id'],'permission_id'=>$v]);
            }
        }
        return redirect()->route('role.index');
        //return redirect('admin/role');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //        1. 获取所有的角色数据
        $results = AdminRole::paginate(20);

//        2. 返回视图
        return view('admin.role.list',['results'=>$results]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 1. 获取表单提交数据
        $input = $request->except('_token');
//        dd($input);
//        2. 进行表单验证
//        3. 将数据添加到role表中
        $res = AdminRole::create($input);
        flash('添加成功')->success()->important();
        return redirect()->route('role.index');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = AdminRole::find($id);
        return view('admin.role.edit',compact('role'));
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
        $input = $request->all();
//        使用模型修改表记录的两种方法,方法一
        $role = AdminRole::find($id);
        $role->role_name = $input['role_name'];
        $res = $role->save();
        flash('修改成功')->success()->important();
        return redirect()->route('role.index');
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
