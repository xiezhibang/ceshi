@extends('admin.layouts.layout')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox-title">
                <h5>修改会员升级收益信息</h5>
            </div>
            <div class="ibox-content">
                <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a>
                <a href="{{route('upgradeuser.index')}}"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus-circle"></i> 会员管理</button></a>
                <div class="hr-line-dashed m-t-sm m-b-sm"></div>
                <form class="form-horizontal m-t-md" action="{{ route('upgradeuser.update',$info->id) }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    {{method_field('PATCH')}}

                    <div class="form-group">
                        <label class="col-sm-2 control-label">等级名称：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="name" value="{{$info->name}}" required data-msg-required="请输入等级名称">
                            @if ($errors->has('name'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">推荐升级金卡：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="gold_card" value="{{$info->gold_card}}" required data-msg-required="请输入推荐升级金卡">
                            @if ($errors->has('gold_card'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('gold_card')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">推荐升级黑金卡：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="black_gold_card" value="{{$info->black_gold_card}}" required data-msg-required="请输入推荐升级黑金卡">
                            @if ($errors->has('black_gold_card'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('black_gold_card')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">类型：</label>
                        <div class="input-group col-sm-1">
                            <select class="form-control" name="type">
                                <option value="4" @if($info->type == 4) selected="selected" @endif>绿卡</option>
                                <option value="5" @if($info->type == 5) selected="selected" @endif>金卡</option>
                                <option value="6" @if($info->type == 6) selected="selected" @endif>黑金卡</option>
                            </select>
                            @if ($errors->has('type'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('type')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">优惠折扣：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="discount" value="{{$info->discount}}" required data-msg-required="请输入优惠折扣">
                            @if ($errors->has('discount'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('discount')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">直推消费收益：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="consumer" value="{{$info->consumer}}" required data-msg-required="请输入直推消费收益">
                            @if ($errors->has('consumer'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('consumer')}}</span>
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