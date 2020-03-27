@extends('admin.layouts.layout')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox-title">
                <h5>添加Banner图</h5>
            </div>
            <div class="ibox-content">
                <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a>
                <a href="{{route('banner.index')}}"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus-circle"></i> 网站信息配置</button></a>
                <div class="hr-line-dashed m-t-sm m-b-sm"></div>
                <form class="form-horizontal m-t-md" action="{{ route('banner.store') }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label class="col-sm-2 control-label">标题：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="title" value="{{old('title')}}" required data-msg-required="请输入标题">
                            @if ($errors->has('title'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('title')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">图片类型：</label>
                        <div class="input-group col-sm-1">
                            <select class="form-control" name="type">
                                <option value="10" @if(old('type') == 10) selected="selected" @endif>首页轮播图</option>
                                <option value="20" @if(old('type') == 20) selected="selected" @endif>商家首页轮播图</option>
                                <option value="30" @if(old('type') == 30) selected="selected" @endif>会员金卡</option>
                                <option value="40" @if(old('type') == 40) selected="selected" @endif>会员黑金卡</option>
                                <option value="50" @if(old('type') == 50) selected="selected" @endif>邀请好友</option>
                                <option value="60" @if(old('type') == 60) selected="selected" @endif>启动页面广告</option>
                            </select>
                            @if ($errors->has('type'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('type')}}</span>
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
                        <label class="col-sm-2 control-label">图片：</label>
                        <div class="input-group col-sm-2">
                            <input type="file" class="form-control" name="banner_image">
                            @if ($errors->has('banner_image'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('banner_image')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">链接：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="links" value="{{old('links')}}" required data-msg-required="请输入链接">
                            @if ($errors->has('links'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('links')}}</span>
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