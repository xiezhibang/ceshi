@extends('admin.layouts.layout')
<div class="plate">
    <div class="plateClose" onclick="triggerPlate()">x</div>
    <div class="plateTitle">是否确定通过审核?</div>
    <div class="plateBody">
        <div class="plateLabel">备注</div>
        <div class="plateTextarea">
            <textarea id="textarea"></textarea>
        </div>
    </div>
    <div class="plateFooter">
        <div class="plateBtn plateReslove"  onclick="noYZ()">不通过</div>
        <div class="plateBtn" onclickj="yZ()">通过</div>
    </div>
</div>
@section('content')
    <style lang="scss">
        .plate{
            display: none;
            width: 400px;
            position: fixed;
            top: 50%;
            left: 50%;
            transform : translate(-50%, -50%);
            background: #fff;
            border-radius: 5px;
            z-index: 200;
            box-shadow: 2px 2px 10px rgba(0,0,0,.2);
            padding : 10px;

        }

        .plateClose{
            width: 20px;
            height: 20px;
            text-align: center;
            line-height: 20px;
            font-size: 26px;
            font-family: '黑体';
            position: absolute;
            top: 10px;
            cursor: pointer;
            right: 10px;
        }
        
        .plateTitle{
            line-height: 20px;
            text-align: center;
            font-size: 15px;
            font-weight: bold;
            color: #333333;
        }

        .plateBody{
            padding: 20px;

            display: flex;

        }

        .plateLabel{
            width: 40px;
            font-size: 14px;
            color: #333;
        }

        .plateTextarea{
            flex: 1;

        }

        .plateTextarea textarea{
            display: block;
            width: 100%;
            height: 80px;
            border-color: #ccc;
        }

        .plateFooter{
            display: flex;

        }
        
        .plateReslove{
            color: #f00 !important;
        }

        .plateFooter .plateBtn{
            flex: 1;
            height: 30px;
            cursor: pointer;
            text-align: center;
            font-size: 13px;
            font-weight: bold;
            color: #333;
        }
    </style>

    <div class="row">
        <div class="col-sm-12">
            <div class="ibox-title">
                <h5>实名认证</h5>
            </div>
            <div class="ibox-content">
                <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a>
                <a href="{{route('checkname.index')}}"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus-circle"></i> 会员管理</button></a>
                <div class="hr-line-dashed m-t-sm m-b-sm"></div>
                <form class="form-horizontal m-t-md" action="{{ route('checkname.update',$info->id) }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    {{method_field('PATCH')}}

                    <div class="form-group">
                        <label class="col-sm-2 control-label">会员头像：</label>
                        <div class="input-group col-sm-2">
                            <input type="file" class="form-control" name="avatar">
                            @if ($errors->has('avatar'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('avatar')}}</span>
                            @endif
                            <span class="view picview ">
                           <img id="thumbnail-avatar" class="thumbnail img-responsive" src="{{$info->avatar}}" width="150" height="150">
                        </span>
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">会员昵称：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="nick_name" value="{{$info->nick_name}}"  >
                            @if ($errors->has('nick_name'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('nick_name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">账号：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="mobile" value="{{$user->mobile}}"  >
                            @if ($errors->has('mobile'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('mobile')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">姓名：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="username" value="{{$info->username}}"  >
                            @if ($errors->has('username'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('username')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">身份证：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="code_sn" value="{{$info->code_sn}}"  >
                            @if ($errors->has('code_sn'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('code_sn')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">所在地：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="address" value="{{$info->address}}"  >
                            @if ($errors->has('address'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('address')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">身份证正面：</label>
                        <div class="input-group col-sm-2">
                            <input type="file" class="form-control" name="front_card_image">
                            @if ($errors->has('front_card_image'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('front_card_image')}}</span>
                            @endif
                            <span class="view picview ">
                           <img id="thumbnail-avatar" class="thumbnail img-responsive" src="{{$info->front_card_image}}" width="150" height="150">
                        </span>
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">身份证反面：</label>
                        <div class="input-group col-sm-2">
                            <input type="file" class="form-control" name="back_card_image">
                            @if ($errors->has('back_card_image'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('back_card_image')}}</span>
                            @endif
                            <span class="view picview ">
                           <img id="thumbnail-avatar" class="thumbnail img-responsive" src="{{$info->back_card_image}}" width="150" height="150">
                        </span>
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">审核状态：</label>
                            <div onclick="triggerPlate()" style="margin-top:7px;">未审核</div>
{{--                        <div class="input-group col-sm-1">--}}
{{--                            <select class="form-control" name="check_status">--}}
{{--                                <option value="20" @if($info->check_status == 20) selected="selected" @endif>审核</option>--}}
{{--                            </select>--}}
{{--                            @if ($errors->has('check_status'))--}}
{{--                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('check_status')}}</span>--}}
{{--                            @endif--}}
{{--                        </div>--}}
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

{{--                    <div class="form-group">--}}
{{--                        <label class="col-sm-2 control-label">拒绝审核原因：</label>--}}
{{--                        <div class="input-group col-sm-2">--}}
{{--                            <input type="text" class="form-control" name="refuse_review" value="{{$info->refuse_review}}"  >--}}
{{--                            @if ($errors->has('refuse_review'))--}}
{{--                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('refuse_review')}}</span>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>--}}

                    <div class="form-group">
                        <div class="col-sm-12 col-sm-offset-2">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-check"></i>&nbsp;通 过</button>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
    <script src="http://zjl.gdweihu.com/js/jquery.min.js"></script>
    <script>

        function triggerPlate(){
            if(window.$('.plate').is(':hidden')){
                $('.plate').show()
            }else{
                $('.plate').hide()
            }
        }

        function noYZ(){

            // 执行不通过代码

            triggerPlate()
        }

        function yZ(){

            let value = $('#textarea').value();   // 简介的值

            // 执行通过代码

            triggerPlate()
        }

        //triggerPlate();
    </script>
@endsection