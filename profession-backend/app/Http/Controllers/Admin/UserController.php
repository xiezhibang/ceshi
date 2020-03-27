<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AdminRole;
use App\Model\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use DB;
class UserController extends Controller
{

    //返回角色授权页面
    public function auth($id)
    {
        //根据ID获取用户
        $user = AdminUser::find($id);
        //获取所有的角色
        $roles = AdminRole::get();

        //获取当前用户已经被授予的角色
        $own_roles = $user->role;
//        dd($own_roles);
        //当前用户拥有的角色的ID列表
        $own_roleids = [];
        foreach ($own_roles as $v){
            $own_roleids[] = $v->id;
        }

        return view('admin.user.auth',compact('user','roles','own_roleids'));
    }

    //处理角色授权
    public function doAuth(Request $request)
    {
        $input = $request->all();
//        dd($input);

        DB::beginTransaction();

        try{
            //要执行的sql语句
            //删除当前角色被赋予的所有权限
            DB::table('user_role')->delete();

            if(!empty($input['role_id'])){
                //将提交的数据添加到 角色权限关联表
                foreach ($input['role_id'] as $v){
                    DB::table('user_role')->insert([
                        'user_id'=>$input['user_id'],
                        'role_id'=>$v
                    ]);
                }
            }
            DB::commit();
            flash('修改成功')->success()->important();
           // return redirect('admin/user');
            return redirect()->route('user.index');

        }catch(Exception $e){
            DB::rollBack();
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $results =  AdminUser::orderBy('user_id','asc')
            ->where(function($query) use($request){
                $username = $request->input('username');
                $email = $request->input('email');
                if(!empty($username)){
                    $query->where('user_name','like','%'.$username.'%');
                }
                if(!empty($email)){
                    $query->where('email','like','%'.$email.'%');
                }
            })
            ->paginate(20);
        return view('admin.user.list',['results'=>$results,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1. 接收前台表单提交的数据  email   pass repass
        $input = $request->all();
//        2. 进行表单验证
//        3. 添加到数据库的user表
        $username = $input['email'];
        $pass = Crypt::encrypt($input['pass']);
        $res = AdminUser::create(['user_name'=>$username,'user_pass'=>$pass,'email'=>$input['email']]);
        flash('添加成功')->success()->important();
        return redirect()->route('user.index');
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
        $info = AdminUser::findOrFail($id);
        return view('admin.user.edit',['info'=>$info]);
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
        //        1. 根据id获取要修改的记录
        $user = AdminUser::find($id);
        $pass = Crypt::encrypt($request->user_pass);
//        2. 获取要修改成的用户名
        $username = $request->input('user_name');
        $user->user_name = $username;
        $user->user_pass = $pass;
        $res = $user->save();
        flash('修改成功')->success()->important();
        return redirect()->route('user.index');

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
