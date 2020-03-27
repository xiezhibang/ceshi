@extends('admin.layouts.layout')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox-title">
                <h5>角色权限</h5>
            </div>
            <div class="ibox-content">
                <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a>
                <a href="{{route('role.index')}}"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus-circle"></i> 后台授权</button></a>
                <div class="hr-line-dashed m-t-sm m-b-sm"></div>
                <form class="form-horizontal m-t-md" action="{{ url('admin/role/doauth') }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    {{method_field('PATCH')}}

                    <div class="form-group">
                        <label class="col-sm-2 control-label">角色名称：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="role_name" value="{{$role->role_name}}" required data-msg-required="请输入角色名称">
                            @if ($errors->has('role_name'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('role_name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">权限列表：</label>
                        <div class="col-sm-10">
                            @foreach($perms as $v)
                            @if(in_array($v->id,$own_pers))
                            <label class="checkbox-inline">
                                <input type="checkbox" checked value="{{ $v->id }}" name="permission_id[]" id="inlineCheckbox1">{{ $v->per_name }}</label>
                            @else
                            <label class="checkbox-inline">
                                <input type="checkbox" value="{{ $v->id }}" name="permission_id[]" id="inlineCheckbox2">{{ $v->per_name }}</label>
                            @endif
                            @endforeach
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