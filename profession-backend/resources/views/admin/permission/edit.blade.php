@extends('admin.layouts.layout')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox-title">
                <h5>修改权限</h5>
            </div>
            <div class="ibox-content">
                <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a>
                <a href="{{route('permission.index')}}"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus-circle"></i> 后台授权</button></a>
                <div class="hr-line-dashed m-t-sm m-b-sm"></div>
                <form class="form-horizontal m-t-md" action="{{ route('permission.update',$per->id) }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    {{method_field('PATCH')}}

                    <div class="form-group">
                        <label class="col-sm-2 control-label">权限名称：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="per_name" value="{{$per->per_name}}" required data-msg-required="请输入权限名称">
                            @if ($errors->has('per_name'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('per_name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">权限路由：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="per_url" value="{{$per->per_url}}" required data-msg-required="请输入权限路由">
                            @if ($errors->has('per_url'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('per_url')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

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