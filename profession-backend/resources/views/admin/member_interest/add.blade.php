@extends('admin.layouts.layout')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox-title">
                <h5>添加会员权益</h5>
            </div>
            <div class="ibox-content">
                <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a>
                <a href="{{route('interest.index')}}"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus-circle"></i> 会员管理</button></a>
                <div class="hr-line-dashed m-t-sm m-b-sm"></div>
                <form class="form-horizontal m-t-md" action="{{ route('interest.store') }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label class="col-sm-2 control-label">等级名称：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="name" value="{{old('name')}}" required data-msg-required="请输入等级名称">
                            @if ($errors->has('name'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">类型：</label>
                        <div class="input-group col-sm-1">
                            <select class="form-control" name="type">
                                <option value="7" @if(old('type') == 7) selected="selected" @endif>绿卡</option>
                                <option value="8" @if(old('type') == 8) selected="selected" @endif>金卡</option>
                                <option value="9" @if(old('type') == 9) selected="selected" @endif>黑金卡</option>
                            </select>
                            @if ($errors->has('type'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('type')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">是否特权：</label>
                        <div class="input-group col-sm-1">
                            <select class="form-control" name="interest_type">
                                <option value="10" @if(old('type') == 10) selected="selected" @endif>否</option>
                                <option value="20" @if(old('type') == 20) selected="selected" @endif>是</option>
                            </select>
                            @if ($errors->has('interest_type'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('interest_type')}}</span>
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