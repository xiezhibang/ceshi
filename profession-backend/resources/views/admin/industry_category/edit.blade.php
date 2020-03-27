@extends('admin.layouts.layout')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox-title">
                <h5>行业分类</h5>
            </div>
            <div class="ibox-content">
                <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a>
                <a href="{{route('industry.index')}}"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus-circle"></i> 行业分类管理</button></a>
                <div class="hr-line-dashed m-t-sm m-b-sm"></div>
                <form class="form-horizontal m-t-md" action="{{ route('industry.update',$info->id) }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    {{method_field('PATCH')}}

                    <div class="form-group">
                        <label class="col-sm-2 control-label">分类名称：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="cate_name" value="{{$info->cate_name}}" required data-msg-required="请输入分类名称">
                            @if ($errors->has('cate_name'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('cate_name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">行业分类：</label>
                        <div class="input-group col-sm-1">
                            <select class="form-control" name="cate_pid">
                                <option value="0">顶级分类</option>
                                @foreach($cates as $item)
                                    <option value="{{$item->id}}">{{($item->level==0)?"":"|"}}{{str_repeat("------",$item->level)}}{{$item->cate_name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('cate_pid'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('cate_pid')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">排序：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="cate_order" value="{{$info->cate_order}}" required data-msg-required="请输入排序">
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