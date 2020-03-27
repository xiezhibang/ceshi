@extends('admin.layouts.layout')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox-title">
                <h5>添加消息</h5>
            </div>
            <div class="ibox-content">
                <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a>
                <a href="{{route('message.index')}}"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus-circle"></i> 消息管理</button></a>
                <div class="hr-line-dashed m-t-sm m-b-sm"></div>
                <form class="form-horizontal m-t-md" action="{{ route('message.store') }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label class="col-sm-2 control-label">消息名称：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="name" value="{{old('name')}}" required data-msg-required="请输入消息名称">
                            @if ($errors->has('name'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">推送平台：</label>
                        <div class="input-group col-sm-1">
                            <select class="form-control" name="push_type">
                                <option value="1" @if(old('push_type') == 1) selected="selected" @endif>IOS</option>
                                <option value="2" @if(old('push_type') == 2) selected="selected" @endif>Android</option>
                            </select>
                            @if ($errors->has('type'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('type')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">目标人群：</label>
                        <div class="input-group col-sm-1">
                            <select class="form-control" name="target_type">
                                <option value="1" @if(old('target_type') == 1) selected="selected" @endif>所有用户</option>
                                <option value="2" @if(old('target_type') == 2) selected="selected" @endif>绿卡会员</option>
                                <option value="3" @if(old('target_type') == 3) selected="selected" @endif>金卡会员</option>
                                <option value="4" @if(old('target_type') == 4) selected="selected" @endif>黑金卡会员</option>
                            </select>
                            @if ($errors->has('target_type'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('target_type')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">发送类型：</label>
                        <div class="input-group col-sm-1">
                            <select class="form-control" name="send_type">
                                <option value="1" @if(old('send_type') == 1) selected="selected" @endif>立即发送</option>
                                <option value="2" @if(old('send_type') == 2) selected="selected" @endif>定时发送</option>
                            </select>
                            @if ($errors->has('send_type'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('send_type')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">省份：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="province" value="{{old('province')}}" required data-msg-required="请输入省份">
                            @if ($errors->has('province'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('province')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">城市：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="city" value="{{old('city')}}" required data-msg-required="请输入城市">
                            @if ($errors->has('city'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('city')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">区县：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="district" value="{{old('district')}}" required data-msg-required="请输入区县">
                            @if ($errors->has('district'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('district')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">消息内容：</label>
                        <div class="input-group col-sm-2">
                            <textarea name="message_content" cols="35" rows="15" class="textarea"  placeholder="请填写消息内容"></textarea>
                            @if ($errors->has('message_content'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('message_content')}}</span>
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