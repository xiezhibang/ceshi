@extends('admin.layouts.layout')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox-title">
                <h5>财务管理--流水支出信息</h5>
            </div>
            <div class="ibox-content">
                <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a>
                <a href="{{route('fiscalcharge.index')}}"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus-circle"></i> 财务管理</button></a>
                <div class="hr-line-dashed m-t-sm m-b-sm"></div>
                <form class="form-horizontal m-t-md" action="{{ route('fiscalcharge.update',$info->id) }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    {{method_field('PATCH')}}

                    <div class="form-group">
                        <label class="col-sm-2 control-label">订单号：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="order_no" value="{{$info->order_no}}" required data-msg-required="请输入订单号">
                            @if ($errors->has('order_no'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('order_no')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">会员昵称：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="username" value="{{$info->username}}" required data-msg-required="请输入会员昵称">
                            @if ($errors->has('username'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('username')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">会员账号：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="account" value="{{$info->account}}" required data-msg-required="请输入会员账号">
                            @if ($errors->has('account'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('account')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">类型：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="type" value="{{$info->type}}" required data-msg-required="请输入类型">
                            @if ($errors->has('type'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('type')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">审核状态：</label>
                        <div class="input-group col-sm-1">
                            <select class="form-control" name="status">
                                <option value="1" @if($info->status == 1) selected="selected" @endif>待审核</option>
                                <option value="2" @if($info->status == 2) selected="selected" @endif>审核通过</option>
                                <option value="3" @if($info->status == 3) selected="selected" @endif>审核不通过</option>
                            </select>
                            @if ($errors->has('status'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('status')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">交易金额：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="order_money" value="{{$info->order_money}}" required data-msg-required="请输入交易金额">
                            @if ($errors->has('order_money'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('order_money')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">实到金额：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="money" value="{{$info->money}}" required data-msg-required="请输入实到金额">
                            @if ($errors->has('money'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('money')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">平台佣金：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="commission_price" value="{{$info->commission_price}}" required data-msg-required="请输入平台佣金">
                            @if ($errors->has('commission_price'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('commission_price')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">日期：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="created_at" value="{{$info->created_at}}" required data-msg-required="请输入日期">
                            @if ($errors->has('created_at'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('created_at')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">银行：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="bank_name" value="{{$info->bank_name}}" required data-msg-required="请输入银行">
                            @if ($errors->has('bank_name'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('bank_name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">开户姓名：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="bank_user_name" value="{{$info->bank_user_name}}" required data-msg-required="请输入开户姓名">
                            @if ($errors->has('bank_user_name'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('bank_user_name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">银行卡号：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="bank_no" value="{{$info->bank_no}}" required data-msg-required="请输入银行卡号">
                            @if ($errors->has('bank_no'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('bank_no')}}</span>
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