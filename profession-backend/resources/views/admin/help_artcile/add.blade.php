@extends('admin.layouts.layout')
@section('content')
    {!! we_css() !!}
    {!! we_js() !!}
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox-title">
                <h5>添加文章</h5>
            </div>
            <div class="ibox-content">
                <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a>
                <a href="{{route('helpartcile.index')}}"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus-circle"></i> 网站信息配置</button></a>
                <div class="hr-line-dashed m-t-sm m-b-sm"></div>
                <form class="form-horizontal m-t-md" action="{{ route('helpartcile.store') }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label class="col-sm-2 control-label">文章名称：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="name" value="{{old('name')}}" required data-msg-required="请输入文章名称">
                            @if ($errors->has('name'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">文章分类：</label>
                        <div class="input-group col-sm-1">
                            <select class="form-control" name="cate_id">
                                <option value="">选择分类</option>
                                @foreach($cates as $k=>$v)
                                    <option value="{{ $v->id }}">{{ $v->cate_name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('cate_id'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('cate_id')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">排序：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="sort" value="{{old('sort')}}" required data-msg-required="请输入排序">
                            @if ($errors->has('sort'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('sort')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">文章内容：</label>
                        <div class="input-group col-sm-2">
                            {!! we_field('wangeditor', 'content_detail', '') !!}
                            {!! we_config('wangeditor') !!}
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <div class="col-sm-12 col-sm-offset-2">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-check"></i>&nbsp;保 存</button>　<button class="btn btn-white" type="reset"><i class="fa fa-repeat"></i> 重 置</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
@endsection