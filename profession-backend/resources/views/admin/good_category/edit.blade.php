@extends('admin.layouts.layout')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox-title">
                <h5>商品分类</h5>
            </div>
            <div class="ibox-content">
                <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a>
                <a href="{{route('goodcategory.index')}}"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus-circle"></i> 商品管理</button></a>
                <div class="hr-line-dashed m-t-sm m-b-sm"></div>
                <form class="form-horizontal m-t-md" action="{{ route('goodcategory.update',$info->id) }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    {{method_field('PATCH')}}

                    <div class="form-group">
                        <label class="col-sm-2 control-label">分类名称：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="name" value="{{$info->name}}" >
                            @if ($errors->has('name'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">层级：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="level_name" value="{{$info->level_name}}">
                            @if ($errors->has('level_name'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('level_name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    {{--<div class="form-group">--}}
                        {{--<label class="col-sm-2 control-label">商品分类：</label>--}}
                        {{--<div class="input-group col-sm-1">--}}
                            {{--<select class="form-control" name="pid">--}}
                                {{--<option value="0">顶级分类</option>--}}
                                {{--@foreach($cates as $item)--}}
                                    {{--<option value="{{$item->id}}" >{{($item->level==0)?"":"|"}}{{str_repeat("------",$item->level)}}{{$item->name}}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                            {{--@if ($errors->has('pid'))--}}
                                {{--<span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('pid')}}</span>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="hr-line-dashed m-t-sm m-b-sm"></div>--}}

                    <div class="form-group">
                        <label class="col-sm-2 control-label">商品分类：</label>
                        <div class="input-group col-sm-1">
                            <select class="form-control" name="pid">
                                @foreach($cates as $item)
                                    @if ($info->id == $item->id )
                                        <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                    @else
                                        <option value="{{$item->id}}" >{{($item->level==0)?"":"|"}}{{str_repeat("------",$item->level)}}{{$item->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if ($errors->has('pid'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('pid')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">图标：</label>
                        <div class="input-group col-sm-2">
                            <input type="file" class="form-control" name="category_image">
                            @if ($errors->has('category_image'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('category_image')}}</span>
                            @endif
                            <span class="view picview ">
                           <img id="thumbnail-avatar" class="thumbnail img-responsive" src="{{$info->category_image}}" width="150" height="150">
                        </span>
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">排序：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="cate_order" value="{{$info->cate_order}}" >
                            @if ($errors->has('cate_order'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('cate_order')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">状态：</label>
                        <div class="input-group col-sm-1">
                            <select class="form-control" name="status">
                                <option value="10" @if($info->status == 10) selected="selected" @endif>显示</option>
                                <option value="20" @if($info->status == 20) selected="selected" @endif>隐藏</option>
                                <option value="30" @if($info->status == 30) selected="selected" @endif>删除</option>
                            </select>
                            @if ($errors->has('status'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('status')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>
0
                    <div class="form-group">
                        <div class="col-sm-12 col-sm-offset-2">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-check"></i>&nbsp;保 存</button>
                            <button class="btn btn-white" type="reset"><i class="fa fa-repeat"></i> 重 置</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
@endsection