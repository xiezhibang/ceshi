@extends('admin.layouts.layout')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox-title">
                <h5>修改礼包信息</h5>
            </div>
            <div class="ibox-content">
                <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a>
                <a href="{{route('giftbag.index')}}"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus-circle"></i> 礼包管理</button></a>
                <div class="hr-line-dashed m-t-sm m-b-sm"></div>
                <form class="form-horizontal m-t-md" action="{{ route('giftbag.update',$info->id) }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    {{method_field('PATCH')}}

                    <div class="form-group">
                        <label class="col-sm-2 control-label">礼包图片：</label>
                        <div class="input-group col-sm-2">
                            <input type="file" class="form-control" name="gift_image">
                            @if ($errors->has('gift_image'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('gift_image')}}</span>
                            @endif
                            <span class="view picview ">
                           <img id="thumbnail-avatar" class="thumbnail img-responsive" src="{{$info->gift_image}}" width="145" height="145">
                        </span>
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">礼包名称：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="gift_name" value="{{$info->gift_name}}" required data-msg-required="请输入礼包名称">
                            @if ($errors->has('gift_name'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('gift_name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">礼包价格：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="gift_money" value="{{$info->gift_money}}" required data-msg-required="请输入礼包价格">
                            @if ($errors->has('gift_money'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('gift_money')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">启用状态：</label>
                        <div class="input-group col-sm-1">
                            <select class="form-control" name="status">
                                <option value="10" @if($info->status == 10) selected="selected" @endif>启用</option>
                                <option value="20" @if($info->status == 20) selected="selected" @endif>禁用</option>
                            </select>
                            @if ($errors->has('status'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('status')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">简介：</label>
                        <div class="input-group col-sm-2">
                            <textarea name="description" cols="35" rows="15" class="textarea"  placeholder="请填写简介">{{ $info->description }}</textarea>
                            @if ($errors->has('description'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('description')}}</span>
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