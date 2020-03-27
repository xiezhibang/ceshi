@extends('admin.layouts.layout')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox-title">
                <h5>添加管理员</h5>
            </div>
            <div class="ibox-content">
                <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a>
                <a href="{{route('user.index')}}"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus-circle"></i> 后台授权</button></a>
                <div class="hr-line-dashed m-t-sm m-b-sm"></div>
                <form class="form-horizontal m-t-md" action="{{ route('user.store') }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label class="col-sm-2 control-label">邮箱：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="email" value="{{old('email')}}" required data-msg-required="请输入邮箱">
                            @if ($errors->has('email'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('email')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">密码：</label>
                        <div class="input-group col-sm-2">
                            <input type="password" class="form-control" name="pass" value="{{old('pass')}}" required data-msg-required="请输入密码">
                            @if ($errors->has('pass'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('pass')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">确认密码：</label>
                        <div class="input-group col-sm-2">
                            <input type="password" class="form-control" name="repass" value="{{old('repass')}}" required data-msg-required="请输入确认密码">
                            @if ($errors->has('repass'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('repass')}}</span>
                            @endif
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