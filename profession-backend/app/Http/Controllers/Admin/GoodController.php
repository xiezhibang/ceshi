<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Good;
use App\Model\GoodAttribute;
use App\Model\GoodCategory;
use App\Model\GoodImage;
use App\Model\GoodSku;
use Illuminate\Http\Request;
use App\Handlers\ImageUploadHandler;

class GoodController extends Controller
{

    protected $uploader;

    public function __construct(ImageUploadHandler $imageUploadHandler)
    {
        $this->uploader = $imageUploadHandler;

    }
    /**
     * Display a listing of the resource.
     * 商品列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Good::query();
        if (!empty($request['state'])) {
            $query = $query->where('state', $request['state']);
        }
        if (!empty($request['type'])) {
            $query = $query->where('type', $request['type']);
        }
        if (!empty($request['good_name'])) {
            $query = $query->where('good_name', 'like', '%' . $request['good_name'] . '%');
        }
        $results = $query->latest('id')->paginate(20);
        return view('admin.good.list',['results'=>$results,'request'=>$request]);
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
     * 展示商品详情
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 展示商品编辑
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //商品信息
        $good = Good::findOrFail($id);
        //商品图片
        $goodImages = GoodImage::query()->where('good_id',$id)->get()->toArray();
        //商品规格ID
        $attribute_id = $good['attribute_id'];
        //商品规格信息
        $goodAttributeSku = GoodSku::query()->where('good_id',$id)
            ->where('attribute_id',$attribute_id)
            ->get()->toArray();
        //商品分类
        $cates = GoodCategory::getcates();
        return view('admin.good.edit',['good'=>$good,'goodAttributeSku'=>$goodAttributeSku,'goodImages'=>$goodImages,'cates'=>$cates]);
    }

    /**
     * Update the specified resource in storage.
     * 商品编辑处理
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //根据id,获取要修改的信息
        $info = Good::find($id);
        //$input = $request->all();
        $input = $request->except('type');
        $input['category_id'] = $request->category_id ? $request->category_id : $info['category_id'];
        $cateName = GoodCategory::where('id',$request->category_id)->value('name');
        $input['cate_name'] = $cateName ? $cateName : $info['cate_name'];
        //获取当前域名
        $url = 'http://'.$_SERVER["HTTP_HOST"];
        //上传图片
        if ($request->detail_image) {
            $result = $this->uploader->save($request->detail_image, 'goodimage');
            if ($result) {
                $input['detail_image'] = $url.$result['path'];
            }
        }
        $res = $info->update($input);
        flash('修改成功')->success()->important();
        return redirect()->route('good.index');
    }

    /**
     * Remove the specified resource from storage.
     * 删除商品，做软删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
