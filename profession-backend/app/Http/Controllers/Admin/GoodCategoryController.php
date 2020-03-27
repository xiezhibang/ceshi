<?php

namespace App\Http\Controllers\Admin;
use App\Handlers\ImageUploadHandler;
use App\Http\Controllers\Controller;
use App\Model\GoodCategory;
use Illuminate\Http\Request;

class GoodCategoryController extends Controller
{

    protected $uploader;

    public function __construct(ImageUploadHandler $imageUploadHandler)
    {
        $this->uploader = $imageUploadHandler;

    }

    /**
     * Display a listing of the resource.
     * 分类列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = GoodCategory::query();
        if (!empty($request['name'])) {
            $query = $query->where('name', 'like', '%' . $request['name'] . '%');
        }
        $data = $query->paginate(20);
        //获取分类
        $results = GoodCategory::showCategory();
        //返回分类页面
        return view('admin.good_category.list',['results'=>$results,'request'=>$request,'data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = GoodCategory::getcates();
        return view('admin.good_category.add',['cates'=>$cates]);
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
        if ($request->category_image) {
            $result = $this->uploader->save($request->category_image, 'category_image');
            if ($result) {
                $input['category_image'] = $url.$result['path'];
            }
        }
        $info =  GoodCategory::create($input);
        flash('添加成功')->success()->important();
        return redirect()->route('goodcategory.index');
    }

    /*
     * 查看下级
     *
     * */
    public function lower($id)
    {
        $query = GoodCategory::query()->where('pid',$id);
        $results = $query->paginate(20);
        return view('admin.good_category.lower',['results'=>$results]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = GoodCategory::findOrFail($id);
        $cates = GoodCategory::getcates();
        return view('admin.good_category.edit',['info'=>$info,'cates'=>$cates]);
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
        $info = GoodCategory::find($id);
        $input = $request->all();
        //获取当前域名
        $url = 'http://'.$_SERVER["HTTP_HOST"];
        //上传图片
        if ($request->category_image) {
            $result = $this->uploader->save($request->category_image, 'category_image');
            if ($result) {
                $input['category_image'] = $url.$result['path'];
            }
        }
        $res = $info->update($input);
        flash('修改成功')->success()->important();
        return redirect()->route('goodcategory.index');
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
