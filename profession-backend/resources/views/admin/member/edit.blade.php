@extends('admin.layouts.layout')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox-title">
                <h5>修改会员信息</h5>
            </div>
            <div class="ibox-content">
                <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a>
                <a href="{{route('member.index')}}"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus-circle"></i> 会员管理</button></a>
                <div class="hr-line-dashed m-t-sm m-b-sm"></div>
                <form class="form-horizontal m-t-md" action="{{ route('member.update',$member->id) }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    {{method_field('PATCH')}}

                    <div class="form-group">
                        <label class="col-sm-2 control-label">头像：</label>
                        <div class="input-group col-sm-2">
                            <input type="file" class="form-control" name="avatar">
                            @if ($errors->has('avatar'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('avatar')}}</span>
                            @endif
                            <span class="view picview ">
                           <img id="thumbnail-avatar" class="thumbnail img-responsive" src="{{$member_bind->avatar}}" width="100" height="100">
                        </span>
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">手机号：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="mobile" value="{{$member->mobile}}" >
                            @if ($errors->has('mobile'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('mobile')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">手机号：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="mobile" value="{{$member->mobile}}" >
                            @if ($errors->has('mobile'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('mobile')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">手机号：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="mobile" value="{{$member->mobile}}" >
                            @if ($errors->has('mobile'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('mobile')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">手机号：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="mobile" value="{{$member->mobile}}" >
                            @if ($errors->has('mobile'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('mobile')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">手机号：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="mobile" value="{{$member->mobile}}" >
                            @if ($errors->has('mobile'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('mobile')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">手机号：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="mobile" value="{{$member->mobile}}" >
                            @if ($errors->has('mobile'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('mobile')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">手机号：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="mobile" value="{{$member->mobile}}" >
                            @if ($errors->has('mobile'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('mobile')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">手机号：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="mobile" value="{{$member->mobile}}" >
                            @if ($errors->has('mobile'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('mobile')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">手机号：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="mobile" value="{{$member->mobile}}" >
                            @if ($errors->has('mobile'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('mobile')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">手机号：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="mobile" value="{{$member->mobile}}" >
                            @if ($errors->has('mobile'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('mobile')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">手机号：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="mobile" value="{{$member->mobile}}" >
                            @if ($errors->has('mobile'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('mobile')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">手机号：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="mobile" value="{{$member->mobile}}" >
                            @if ($errors->has('mobile'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('mobile')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">手机号：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="mobile" value="{{$member->mobile}}" >
                            @if ($errors->has('mobile'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('mobile')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">手机号：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="mobile" value="{{$member->mobile}}" >
                            @if ($errors->has('mobile'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('mobile')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">手机号：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="mobile" value="{{$member->mobile}}" >
                            @if ($errors->has('mobile'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('mobile')}}</span>
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