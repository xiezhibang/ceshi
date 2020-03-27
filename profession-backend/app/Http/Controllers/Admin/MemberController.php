<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Member;
use App\Model\MemberBind;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Member::query()->with('memberBind');
        if (!empty($request['check_status'])) {
            $query = $query->whereHas('memberBind', function ($query) use ($request) {
                $query->where('check_status', $request['check_status']);
            });
        }
        if (!empty($request['start'])) {
            $query = $query->where('created_at', '>=',$request['start']);
        }
        if (!empty($request['end'])) {
            $query = $query->where('created_at', '<=',$request['end']);
        }
        if (!empty($request['bind_card_status'])) {
            $query = $query->whereHas('memberBind', function ($query) use ($request) {
                $query->where('bind_card_status', $request['bind_card_status']);
            });
        }
        if (!empty($request['nick_name'])) {
            $query = $query->whereHas('memberBind', function ($query) use ($request) {
                $query->where('nick_name', 'like', '%' . $request['nick_name'] . '%');
            });
        }
        if (!empty($request['mobile'])) {
            $query = $query->where('mobile', 'like', '%' . $request['mobile'] . '%');
        }
        $results = $query->latest('id')->paginate(20);
        return view('admin.member.list',['results'=>$results,'request'=>$request]);
    }

    /*
     * 禁用
     *
     * */
    public function stopShow($id)
    {
        //查询会员信息
        $info = Member::find($id);
        $user = MemberBind::where('user_id',$id)->first();
        return view('admin.member.stopstatus',['info'=>$info,'user'=>$user]);
    }

    public function stopstatus(Request $request,$id)
    {
        //状态
        $status = $request->status;
        //更新操作
        $update = Member::where('id',$id)->update(['status'=>20]);
        flash('更新成功')->success()->important();
        return redirect()->route('member.index');
    }

    /*
     * 启用
     *
     * */
    public function restartShow($id)
    {
        //查询会员信息
        $info = Member::find($id);
        $user = MemberBind::where('user_id',$id)->first();
        return view('admin.member.restartstatus',['info'=>$info,'user'=>$user]);
    }

    public function restartstatus(Request $request,$id)
    {
        //状态
        $status = $request->status;
        //更新操作
        $update = Member::where('id',$id)->update(['status'=>10]);
        flash('更新成功')->success()->important();
        return redirect()->route('member.index');
    }

    /**
     * Display the specified resource.
     * 查看会员详情
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //查询会员信息
        $member = Member::find($id);
        //查会员详情
        $member_bind = MemberBind::query()->where('user_id',$id)->firstOrFail();
        return view('admin.member.item',['member'=>$member,'member_bind'=>$member_bind]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //用户信息
        $member = Member::find($id);
        $member_bind = MemberBind::query()->where('user_id',$id)->firstOrFail();
        return view('admin.member.edit',['member'=>$member,'member_bind'=>$member_bind]);
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
        //状态
        $status = $request->status;
        //更新操作
        $update = Member::query()->where('id',$id)->update(['status'=>$status]);

        flash('更新成功')->success()->important();

        return redirect()->route('member.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * member.destroy
     */
    public function destroy($id)
    {
        $member = Member::query()->where('id',$id)->delete();
        $memberInfo = MemberBind::query()->where('user_id',$id)->delete();

        if (empty($member) && $memberInfo) {
            flash('删除失败')->error()->important();

            return redirect()->route('member.index');
        }

        flash('删除成功')->success()->important();

        return redirect()->route('member.index');
    }
}
