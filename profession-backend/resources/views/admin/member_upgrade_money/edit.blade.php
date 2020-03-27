@extends('admin.layouts.layout')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox-title">
                <h5>修改会员升级金额信息</h5>
            </div>
            <div class="ibox-content">
                <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a>
                <a href="{{route('upgradeprice.index')}}"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus-circle"></i> 会员管理</button></a>
                <div class="hr-line-dashed m-t-sm m-b-sm"></div>
                <form class="form-horizontal m-t-md" action="{{ route('upgradeprice.update',$info->id) }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    {{method_field('PATCH')}}

                    <div class="form-group">
                        <label class="col-sm-2 control-label">描述：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="remark" value="{{$info->remark}}" required data-msg-required="请输入描述">
                            @if ($errors->has('remark'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('remark')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">升级金额：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="money" value="{{$info->money}}" required data-msg-required="请输入升级金额">
                            @if ($errors->has('money'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('money')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">升级类型：</label>
                        <div class="input-group col-sm-1">
                            <select class="form-control" name="upgrade_type">
                                <option value="1" @if($info->upgrade_type == 1) selected="selected" @endif>金卡升级</option>
                                <option value="2" @if($info->upgrade_type == 2) selected="selected" @endif>黑金卡升级</option>
                            </select>
                            @if ($errors->has('upgrade_type'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('upgrade_type')}}</span>
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