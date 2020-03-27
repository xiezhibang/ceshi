@extends('admin.layouts.layout')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox-title">
                <h5>实名认证</h5>
            </div>
            <div class="ibox-content">
                <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a>
                <a href="{{route('checkname.index')}}"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus-circle"></i> 会员管理</button></a>
                <div class="hr-line-dashed m-t-sm m-b-sm"></div>
                <form class="form-horizontal m-t-md" action="{{ route('checkname.nopassupdate',$pass->id) }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    {!! csrf_field() !!}
{{--                    {{method_field('PATCH')}}--}}

                    <div class="form-group">
                        <label class="col-sm-2 control-label">会员头像：</label>
                        <div class="input-group col-sm-2">
                            <input type="file" class="form-control" name="avatar">
                            @if ($errors->has('avatar'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('avatar')}}</span>
                            @endif
                            <span class="view picview ">
                           <img id="thumbnail-avatar" class="thumbnail img-responsive" src="{{$pass->avatar}}" width="150" height="150">
                        </span>
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">会员昵称：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="nick_name" value="{{$pass->nick_name}}"  >
                            @if ($errors->has('nick_name'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('nick_name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">账号：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="mobile" value="{{$user->mobile}}"  >
                            @if ($errors->has('mobile'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('mobile')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">姓名：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="username" value="{{$pass->username}}"  >
                            @if ($errors->has('username'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('username')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">身份证：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="code_sn" value="{{$pass->code_sn}}"  >
                            @if ($errors->has('code_sn'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('code_sn')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">所在地：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="address" value="{{$pass->address}}"  >
                            @if ($errors->has('address'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('address')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">身份证正面：</label>
                        <div class="input-group col-sm-2">
                            <input type="file" class="form-control" name="front_card_image">
                            @if ($errors->has('front_card_image'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('front_card_image')}}</span>
                            @endif
                            <span class="view picview ">
                           <img id="thumbnail-avatar" class="thumbnail img-responsive" src="{{$pass->front_card_image}}" width="150" height="150">
                        </span>
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">身份证反面：</label>
                        <div class="input-group col-sm-2">
                            <input type="file" class="form-control" name="back_card_image">
                            @if ($errors->has('back_card_image'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('back_card_image')}}</span>
                            @endif
                            <span class="view picview ">
                           <img id="thumbnail-avatar" class="thumbnail img-responsive" src="{{$pass->back_card_image}}" width="150" height="150">
                        </span>
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">审核状态：</label>
                        <div class="input-group col-sm-1">
                            <select class="form-control" name="check_status">
                                <option value="30" @if($pass->check_status == 30) selected="selected" @endif>拒绝审核</option>
                            </select>
                            @if ($errors->has('check_status'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('check_status')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">拒绝审核原因：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="refuse_review" value="{{$pass->refuse_review}}"  >
                            @if ($errors->has('refuse_review'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('refuse_review')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <div class="col-sm-12 col-sm-offset-2">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-check"></i>&nbsp;不通过</button>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
@endsection