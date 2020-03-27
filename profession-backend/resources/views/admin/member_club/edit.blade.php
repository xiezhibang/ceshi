@extends('admin.layouts.layout')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox-title">
                <h5>修改俱乐部会员信息</h5>
            </div>
            <div class="ibox-content">
                <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a>
                <a href="{{route('club.index')}}"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus-circle"></i> 会员管理</button></a>
                <div class="hr-line-dashed m-t-sm m-b-sm"></div>
                <form class="form-horizontal m-t-md" action="{{ route('club.update',$info->id) }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    {{method_field('PATCH')}}

                    <div class="form-group">
                        <label class="col-sm-2 control-label">会员昵称：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="username" value="{{$info->username}}" required data-msg-required="请输入会员昵称">
                            @if ($errors->has('username'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('username')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">店铺名称：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="shop_name" value="{{$info->shop_name}}" required data-msg-required="请输入店铺名称">
                            @if ($errors->has('shop_name'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('shop_name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">审核状态：</label>
                        <div class="input-group col-sm-1">
                            <select class="form-control" name="status">
                                <option value="10" @if($info->status == 10) selected="selected" @endif>待审核</option>
                                <option value="20" @if($info->status == 20) selected="selected" @endif>已审核</option>
                                <option value="30" @if($info->status == 30) selected="selected" @endif>拒绝审核</option>
                            </select>
                            @if ($errors->has('status'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('status')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">加入状态：</label>
                        <div class="input-group col-sm-1">
                            <select class="form-control" name="add_status">
                                <option value="0" @if($info->add_status == 0) selected="selected" @endif>待加入</option>
                                <option value="1" @if($info->add_status == 1) selected="selected" @endif>已加入</option>
                                <option value="2" @if($info->add_status == 2) selected="selected" @endif>已过期</option>
                            </select>
                            @if ($errors->has('add_status'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('add_status')}}</span>
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