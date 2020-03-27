@extends('admin.layouts.layout')
@section('content')
    {!! we_css() !!}
    {!! we_js() !!}
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox-title">
                <h5>添加系统内容</h5>
            </div>
            <div class="ibox-content">
                <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a>
                <a href="{{route('website.index')}}"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus-circle"></i> 网站信息配置</button></a>
                <div class="hr-line-dashed m-t-sm m-b-sm"></div>
                <form class="form-horizontal m-t-md" action="{{ route('website.store') }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
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
                        <label class="col-sm-2 control-label">系统类型：</label>
                        <div class="input-group col-sm-1">
                            <select class="form-control" name="type">
                                <option value="10" @if(old('type') == 10) selected="selected" @endif>注册协议</option>
                                <option value="20" @if(old('type') == 20) selected="selected" @endif>关于我们</option>
                                <option value="30" @if(old('type') == 30) selected="selected" @endif>俱乐部说明</option>
                                <option value="40" @if(old('type') == 40) selected="selected" @endif>俱乐部会员章程</option>
                                <option value="50" @if(old('type') == 50) selected="selected" @endif>版本信息</option>
                            </select>
                            @if ($errors->has('type'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('type')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">系统内容：</label>
                        <div class="input-group col-sm-2">
                            {!! we_field('wangeditor', 'website_content', '') !!}
                            {!! we_config('wangeditor') !!}
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