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
                <h5>商品管理--商品详情信息</h5>
            </div>
            <div class="ibox-content">
                <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a>
                <a href="{{route('good.index')}}"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus-circle"></i> 商品管理</button></a>
                <div class="hr-line-dashed m-t-sm m-b-sm"></div>
                <form class="form-horizontal m-t-md" action="{{ route('good.update',$good->id) }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    {{method_field('PATCH')}}

                    <div class="form-group">
                        <label class="col-sm-2 control-label">商品名称：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="good_name" value="{{$good->good_name}}" >
                            @if ($errors->has('good_name'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('good_name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">商品分类：</label>
                        <div class="input-group col-sm-1">
                            <select class="form-control" name="category_id">
                                @foreach($cates as $item)
                                    @if ($good->category_id == $item->id )
                                        <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                    @else
                                        <option value="{{$item->id}}" >{{($item->level==0)?"":"|"}}{{str_repeat("------",$item->level)}}{{$item->name}}</option>
                                   @endif
                                @endforeach
                            </select>
                            @if ($errors->has('pid'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('pid')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">会员昵称：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="username" value="{{$good->username}}" >
                            @if ($errors->has('username'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('username')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">商品主图：</label>
                        <div class="table-responsive" style="width: 30%;">
                        <table class="table table-striped table-bordered table-hover m-t-md">
                            <thead>
                            <tr>
                                <th class="text-center" width="50">ID</th>
                                <th class="text-center" width="80">商品ID</th>
                                <th class="text-center" width="130">商品图片</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($goodImages as $k => $item)
                                <tr>
                                    <td class="text-center">{{ $item['id'] }}</td>
                                    <td class="text-center">{{ $item['good_id'] }}</td>
                                    <td>
                                        <img src="{{ $item['good_images'] }}" alt="" width="150px" height="150px">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">审核状态：</label>
                        <div onclick="triggerPlate()" style="margin-top:7px;">未审核</div>
{{--                        <div class="input-group col-sm-1">--}}
{{--                            <select class="form-control" name="status">--}}
{{--                                <option value="1" @if($good->status == 1) selected="selected" @endif>待审核</option>--}}
{{--                                <option value="2" @if($good->status == 2) selected="selected" @endif>审核通过</option>--}}
{{--                                <option value="3" @if($good->status == 3) selected="selected" @endif>审核不通过</option>--}}
{{--                            </select>--}}
{{--                            @if ($errors->has('status'))--}}
{{--                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('status')}}</span>--}}
{{--                            @endif--}}
{{--                        </div>--}}
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">上下架：</label>
                        <div class="input-group col-sm-1">
                            <select class="form-control" name="state">
                                <option value="1" @if($good->state == 1) selected="selected" @endif>上架</option>
                                <option value="2" @if($good->state == 2) selected="selected" @endif>下架</option>
                                <option value="3" @if($good->state == 3) selected="selected" @endif>软删除</option>
                            </select>
                            @if ($errors->has('state'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('state')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">原价：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="commodity_price" value="{{$good->commodity_price}}" >
                            @if ($errors->has('commodity_price'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('commodity_price')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">商品类型：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="type" value="{{$good->type}}" >
                            @if ($errors->has('type'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('type')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">积分：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="good_integral" value="{{$good->good_integral}}" >
                            @if ($errors->has('good_integral'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('good_integral')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">售价：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="selling_price" value="{{$good->selling_price}}" >
                            @if ($errors->has('selling_price'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('selling_price')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">总库存：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="total_stock" value="{{$good->total_stock}}" >
                            @if ($errors->has('total_stock'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('total_stock')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">总销量：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="selling_num" value="{{$good->selling_num}}" >
                            @if ($errors->has('selling_num'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('selling_num')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">限购数量：</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="limit_num" value="{{$good->limit_num}}" >
                            @if ($errors->has('limit_num'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('limit_num')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">商品详情：</label>
                        <div class="input-group col-sm-2">
                            <input type="file" class="form-control" name="detail_image">
                            @if ($errors->has('detail_image'))
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>{{$errors->first('detail_image')}}</span>
                            @endif
                            <span class="view picview ">
                           <img id="thumbnail-avatar" class="thumbnail img-responsive" src="{{$good->detail_image}}" width="150" height="150">
                        </span>
                        </div>
                    </div>
                    <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">购买须知：</label>
                        <div class="input-group col-sm-2">
                            <textarea name="description" cols="35" rows="15" class="textarea"  placeholder="请填写购买须知">{{ $good->description }}</textarea>
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