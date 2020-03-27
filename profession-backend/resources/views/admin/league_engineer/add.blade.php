@extends('admin.layouts.layout')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox-title">
                <h5>添加合伙项目</h5>
            </div>
            <div class="ibox-content">
                <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a>
                <a href="{{route('engineer.index')}}"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus-circle"></i> 合伙项目管理</button></a>
                <div class="hr-line-dashed m-t-sm m-b-sm"></div>
                <form class="form-horizontal m-t-md" action="{{ route('engineer.store') }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label class="col-sm-2 control-label">项目名称：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="engineer_name" value="{{old('engineer_name')}}" required data-msg-required="请输入项目名称">
                            @if ($errors->has('engineer_name'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('engineer_name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">关联分类：</label>
                        <div class="input-group col-sm-1">
                            <select class="form-control" name="work_id">
                                @foreach($cates as $item)
                                    <option value="{{$item->id}}">{{($item->level==0)?"":"|"}}{{str_repeat("------",$item->level)}}{{$item->cate_name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('work_id'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('work_id')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">合伙金额（元）：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="league_money" value="{{old('league_money')}}" required data-msg-required="请输入合伙金额">
                            @if ($errors->has('league_money'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('league_money')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">合伙期限（天）：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="league_time" value="{{old('league_time')}}" required data-msg-required="请输入合伙期限">
                            @if ($errors->has('league_time'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('league_time')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">合伙奖励比例（%）：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="league_scale" value="{{old('league_scale')}}" required data-msg-required="请输入合伙奖励比例">
                            @if ($errors->has('league_scale'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('league_scale')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">合伙礼包：</label>
                        <div class="input-group col-sm-1">
                            <select class="form-control" name="gift_id">
                                @foreach($giftbags as $item)
                                    <option value="{{$item->id}}">{{$item->gift_name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('gift_id'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('gift_id')}}</span>
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