<?php

namespace App\Http\Controllers\Admin;
use App\Handlers\ImageUploadHandler;
use App\Http\Controllers\Controller;
use App\Model\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    protected $uploader;

    public function __construct(ImageUploadHandler $imageUploadHandler)
    {
        $this->uploader = $imageUploadHandler;

    }

    /**
     * Display a listing of the resource.
     * banner图列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Banner::query();
        $results = $query->latest('id')->paginate(20);
        return view('admin.banner.list',['results'=>$results,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.add');
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
        if ($request->banner_image) {
            $result = $this->uploader->save($request->banner_image, 'banner');
            if ($result) {
                $input['banner_image'] = $url.$result['path'];
            }
        }
        $info =  Banner::create($input);
        flash('添加成功')->success()->important();
        return redirect()->route('banner.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = Banner::findOrFail($id);
        return view('admin.banner.edit',['info'=>$info]);
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
        $info = Banner::find($id);
        $input = $request->all();
        //获取当前域名
        $url = 'http://'.$_SERVER["HTTP_HOST"];
        //上传图片
        if ($request->banner_image) {
            $result = $this->uploader->save($request->banner_image, 'banner');
            if ($result) {
                $input['banner_image'] = $url.$result['path'];
            }
        }
        $res = $info->update($input);
        flash('修改成功')->success()->important();
        return redirect()->route('banner.index');
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
