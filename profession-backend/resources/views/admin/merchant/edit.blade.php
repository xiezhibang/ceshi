@extends('admin.layouts.layout')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox-title">
                <h5>商家入驻</h5>
            </div>
            <div class="ibox-content">
                <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a>
                <a href="{{route('merchant.index')}}"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus-circle"></i> 店铺管理</button></a>
                <div class="hr-line-dashed m-t-sm m-b-sm"></div>
                <form class="form-horizontal m-t-md" action="{{ route('merchant.update',$info->id) }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    {{method_field('PATCH')}}

                    <div class="form-group">
                        <label class="col-sm-2 control-label">商家名称：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="shop_name" value="{{$info->shop_name}}"  >
                            @if ($errors->has('shop_name'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('shop_name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">商家分类：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="industry_name" value="{{$info->industry_name}}"  >
                            @if ($errors->has('industry_name'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('industry_name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">入驻类型：</label>
                        <div class="input-group col-sm-1">
                            <select class="form-control" name="type">
                                <option value="1" @if($info->type == 1) selected="selected" @endif>普通商家入驻</option>
                                <option value="2" @if($info->type == 2) selected="selected" @endif>共享项目入驻</option>
                            </select>
                            @if ($errors->has('type'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('type')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">店铺所在省份：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="province" value="{{$info->province}}"  >
                            @if ($errors->has('province'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('province')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">店铺所在城市：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="city" value="{{$info->city}}"  >
                            @if ($errors->has('city'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('city')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">店铺所在地区：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="district" value="{{$info->district}}"  >
                            @if ($errors->has('district'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('district')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">店铺详细地址：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="address" value="{{$info->address}}"  >
                            @if ($errors->has('address'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('address')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">是否特权店铺：</label>
                        <div class="input-group col-sm-1">
                            <select class="form-control" name="privilege_type">
                                <option value="10" @if($info->privilege_type == 10) selected="selected" @endif>否</option>
                                <option value="20" @if($info->privilege_type == 20) selected="selected" @endif>是</option>
                            </select>
                            @if ($errors->has('privilege_type'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('privilege_type')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">店铺电话：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="phone" value="{{$info->phone}}"  >
                            @if ($errors->has('phone'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('phone')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">店铺简介：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="desc" value="{{$info->desc}}"  >
                            @if ($errors->has('desc'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('desc')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">店铺图片：</label>
                        <div class="input-group col-sm-2">
                            <input type="file" class="form-control" name="shop_image">
                            @if ($errors->has('shop_image'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('shop_image')}}</span>
                            @endif
                            <span class="view picview ">
                           <img id="thumbnail-avatar" class="thumbnail img-responsive" src="{{$info->shop_image}}" width="150" height="150">
                        </span>
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">是否显示：</label>
                        <div class="input-group col-sm-1">
                            <select class="form-control" name="status">
                                <option value="0" @if($info->status == 0) selected="selected" @endif>显示</option>
                                <option value="1" @if($info->status == 1) selected="selected" @endif>隐藏</option>
                            </select>
                            @if ($errors->has('status'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('status')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">是否推荐：</label>
                        <div class="input-group col-sm-1">
                            <select class="form-control" name="recommend_status">
                                <option value="1" @if($info->recommend_status == 1) selected="selected" @endif>不推荐</option>
                                <option value="2" @if($info->recommend_status == 2) selected="selected" @endif>推荐</option>
                            </select>
                            @if ($errors->has('recommend_status'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('recommend_status')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">审核状态：</label>
                        <div class="input-group col-sm-1">
                            <select class="form-control" name="check_status">
                                <option value="0" @if($info->check_status == 0) selected="selected" @endif>待审核</option>
                                <option value="1" @if($info->check_status == 1) selected="selected" @endif>已审核</option>
                                <option value="2" @if($info->check_status == 2) selected="selected" @endif>拒绝审核</option>
                            </select>
                            @if ($errors->has('check_status'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('check_status')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">会员名称：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="username" value="{{$info->username}}"  >
                            @if ($errors->has('username'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('username')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">会员电话：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="user_phone" value="{{$info->user_phone}}"  >
                            @if ($errors->has('user_phone'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('user_phone')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">身份证正面：</label>
                        <div class="input-group col-sm-2">
                            <input type="file" class="form-control" name="front_identity_card">
                            @if ($errors->has('front_identity_card'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('front_identity_card')}}</span>
                            @endif
                            <span class="view picview ">
                           <img id="thumbnail-avatar" class="thumbnail img-responsive" src="{{$info->front_identity_card}}" width="150" height="150">
                        </span>
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">身份证反面：</label>
                        <div class="input-group col-sm-2">
                            <input type="file" class="form-control" name="side_identity_card">
                            @if ($errors->has('side_identity_card'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('side_identity_card')}}</span>
                            @endif
                            <span class="view picview ">
                           <img id="thumbnail-avatar" class="thumbnail img-responsive" src="{{$info->side_identity_card}}" width="150" height="150">
                        </span>
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">公司名称：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="company_name" value="{{$info->company_name}}"  >
                            @if ($errors->has('company_name'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('company_name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">社会信用代码：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="social_code" value="{{$info->social_code}}"  >
                            @if ($errors->has('social_code'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('social_code')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">公司详细地址：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="company_address" value="{{$info->company_address}}"  >
                            @if ($errors->has('company_address'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('company_address')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">营业执照：</label>
                        <div class="input-group col-sm-2">
                            <input type="file" class="form-control" name="license_image">
                            @if ($errors->has('license_image'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('license_image')}}</span>
                            @endif
                            <span class="view picview ">
                           <img id="thumbnail-avatar" class="thumbnail img-responsive" src="{{$info->license_image}}" width="150" height="150">
                        </span>
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">项目名称：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="engineer_name" value="{{$info->engineer_name}}"  >
                            @if ($errors->has('engineer_name'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('engineer_name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">中资联加盟凭证：</label>
                        <div class="input-group col-sm-2">
                            <input type="file" class="form-control" name="league_image">
                            @if ($errors->has('league_image'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('league_image')}}</span>
                            @endif
                            <span class="view picview ">
                           <img id="thumbnail-avatar" class="thumbnail img-responsive" src="{{$info->league_image}}" width="150" height="150">
                        </span>
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