<?php

namespace App\Http\Controllers\Admin;

use App\Handlers\ImageUploadHandler;
use App\Http\Controllers\Controller;
use App\Model\GiftBagRecode;
use App\Model\LeagueGiftBag;
use Illuminate\Http\Request;

class GiftBagController extends Controller
{

    protected $uploader;

    public function __construct(ImageUploadHandler $imageUploadHandler)
    {
        $this->uploader = $imageUploadHandler;

    }

    /**
     * Display a listing of the resource.
     * 礼包列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = LeagueGiftBag::query();
        if (!empty($request['gift_name'])) {
            $query = $query->where('gift_name', 'like', '%' . $request['gift_name'] . '%');
        }
        $results = $query->latest('id')->paginate(20);
        return view('admin.gift_bag.list',['results'=>$results,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     * 展示添加礼包页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gift_bag.add');
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
        //获取当前域名
        $url = 'http://'.$_SERVER["HTTP_HOST"];
        //上传图片
        if ($request->gift_image) {
            $result = $this->uploader->save($request->gift_image, 'giftbag');
            if ($result) {
                $input['gift_image'] = $url.$result['path'];
            }
        }
        $info =  LeagueGiftBag::create($input);
        flash('添加成功')->success()->important();
        return redirect()->route('giftbag.index');
    }

    /**
     * Display the specified resource.
     * 查看领取记录
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $query = GiftBagRecode::query()->where('gift_bag_id',$id);
        if (!empty($request['username'])) {
            $query = $query->where('username', 'like', '%' . $request['username'] . '%');
        }
        if (!empty($request['account'])) {
            $query = $query->where('account', 'like', '%' . $request['account'] . '%');
        }
        $results = $query->latest('id')->paginate(20);
        return view('admin.gift_bag.recode',['results'=>$results,'request'=>$request]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = LeagueGiftBag::findOrFail($id);
        return view('admin.gift_bag.edit',['info'=>$info]);
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
        $info = LeagueGiftBag::find($id);
        $input = $request->all();
        //获取当前域名
        $url = 'http://'.$_SERVER["HTTP_HOST"];
        //上传图片
        if ($request->gift_image) {
            $result = $this->uploader->save($request->gift_image, 'giftbag');
            if ($result) {
                $input['gift_image'] = $url.$result['path'];
            }
        }
        $res = $info->update($input);
        flash('修改成功')->success()->important();
        return redirect()->route('giftbag.index');
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
