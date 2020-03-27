@extends('admin.layouts.layout')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox-title">
                <h5>添加费率设置</h5>
            </div>
            <div class="ibox-content">
                <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a>
                <a href="{{route('configrate.index')}}"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus-circle"></i> 网站信息配置</button></a>
                <div class="hr-line-dashed m-t-sm m-b-sm"></div>
                <form class="form-horizontal m-t-md" action="{{ route('configrate.store') }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label class="col-sm-2 control-label">描述：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="description" value="{{old('description')}}" required data-msg-required="请输入描述">
                            @if ($errors->has('description'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('description')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">类型：</label>
                        <div class="input-group col-sm-1">
                            <select class="form-control" name="type">
                                <option value="1" @if(old('type') == 1) selected="selected" @endif>个人提现费率</option>
                                <option value="2" @if(old('type') == 2) selected="selected" @endif>店铺（营业款）提现费率</option>
                                <option value="3" @if(old('type') == 3) selected="selected" @endif>个人积分转现费率</option>
                                <option value="4" @if(old('type') == 4) selected="selected" @endif>商家积分转现费率</option>
                            </select>
                            @if ($errors->has('type'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('type')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">费率：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="rate" value="{{old('rate')}}" required data-msg-required="请输入费率">
                            @if ($errors->has('rate'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('rate')}}</span>
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