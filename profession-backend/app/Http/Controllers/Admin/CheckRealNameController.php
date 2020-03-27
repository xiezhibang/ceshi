<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Member;
use App\Model\MemberBind;
use Illuminate\Http\Request;
use App\Handlers\ImageUploadHandler;

class CheckRealNameController extends Controller
{

    protected $uploader;

    public function __construct(ImageUploadHandler $imageUploadHandler)
    {
        $this->uploader = $imageUploadHandler;

    }
    /**
     * Display a listing of the resource.
     * whereDate('created_at', $date)
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = MemberBind::with('member');
        if (!empty($request['mobile'])) {
            $query = $query->whereHas('member', function ($query) use ($request) {
                $query->where('mobile', 'like', '%' . $request['mobile'] . '%');
            });
        }
        if (!empty($request['start'])) {
            $query = $query->where('created_at', '>=',$request['start']);
        }
        if (!empty($request['end'])) {
            $query = $query->where('created_at', '<=',$request['end']);
        }
        if (!empty($request['nick_name'])) {
            $query = $query->where('nick_name', 'like', '%' . $request['nick_name'] . '%');
        }
        $results = $query->latest('id')->paginate(20);
        return view('admin.check_name.list',['results'=>$results,'request'=>$request]);
    }

    /*
     *
     * 实名认证展示---不通过
     *
     * */
    public function nopassShow($id)
    {
        $pass = MemberBind::findOrFail($id);
        $user = Member::findOrFail($pass['user_id']);
        return view('admin.check_name.nopass',['pass'=>$pass,'user'=>$user]);
    }

    /*
     * 实名认证处理---不通过
     *
     * */
    public function nopassUpdate(Request $request, $id)
    {
        //根据id,获取要修改的信息
        $info = MemberBind::find($id);
        // $input = $request->all();
        $input = $request->except('mobile');
        $input['refuse_review'] = $request->refuse_review ? $request->refuse_review : '暂无';
        //获取当前域名
        $url = 'http://'.$_SERVER["HTTP_HOST"];
        //上传图片
        if ($request->avatar) {
            $result = $this->uploader->save($request->avatar, 'avatar');
            if ($result) {
                $input['avatar'] = $url.$result['path'];
            }
        }
        if ($request->front_card_image) {
            $result = $this->uploader->save($request->front_card_image, 'card_image');
            if ($result) {
                $input['front_card_image'] = $url.$result['path'];
            }
        }
        if ($request->back_card_image) {
            $result = $this->uploader->save($request->back_card_image, 'card_image');
            if ($result) {
                $input['back_card_image'] = $url.$result['path'];
            }
        }
        $res = $info->update($input);
        flash('修改成功')->success()->important();
        return redirect()->route('checkname.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = MemberBind::findOrFail($id);
        $user = Member::findOrFail($info['user_id']);
        return view('admin.check_name.edit',['info'=>$info,'user'=>$user]);
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
        $info = MemberBind::find($id);
       // $input = $request->all();
        $input = $request->except('mobile');
        $input['refuse_review'] = $request->refuse_review ? $request->refuse_review : '暂无';
        //获取当前域名
        $url = 'http://'.$_SERVER["HTTP_HOST"];
        //上传图片
        if ($request->avatar) {
            $result = $this->uploader->save($request->avatar, 'avatar');
            if ($result) {
                $input['avatar'] = $url.$result['path'];
            }
        }
        if ($request->front_card_image) {
            $result = $this->uploader->save($request->front_card_image, 'card_image');
            if ($result) {
                $input['front_card_image'] = $url.$result['path'];
            }
        }
        if ($request->back_card_image) {
            $result = $this->uploader->save($request->back_card_image, 'card_image');
            if ($result) {
                $input['back_card_image'] = $url.$result['path'];
            }
        }
        $res = $info->update($input);
        flash('修改成功')->success()->important();
        return redirect()->route('checkname.index');
    }


}
