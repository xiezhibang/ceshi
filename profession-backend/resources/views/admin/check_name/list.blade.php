@extends("admin.layouts.layout")

@section("content")

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>实名认证</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">设置选项1</a>
                            </li>
                            <li><a href="#">设置选项2</a>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="ibox-content">

                    <div class="row">

                        <form action="" class="form-inline pull-right">

                            <div class="form-group" id="data_5">
                                <label class="font-noraml">日期选择</label>
                                <div class="input-daterange input-group" id="datepicker">
                                    <input type="text" class="form-control" name="start" value="{{ date('Y-m-d') }}" />
                                    <span class="input-group-addon">到</span>
                                    <input type="text" class="form-control" name="end" value="{{ date('Y-m-d') }}" />
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="text" name="nick_name" class="form-control" placeholder="请输入会员昵称" id="" value="{{ $request->nick_name }}">
                            </div>

                            <div class="form-group">
                                <input type="text" name="mobile" class="form-control" placeholder="请输入账号" id="" value="{{ $request->mobile }}">
                            </div>

                            <input type="submit" value="查询" class="btn btn-primary" style="margin-top: 6px;margin-right: 15px;">

                        </form>

                        <div class="head-tab" style="margin-left: 15px;">

                            <a href="" class="btn btn-sm btn-primary" title="会员实名认证">
                                <i class="fa fa-plus-circle"></i><span class="hidden-xs">&nbsp;&nbsp;会员实名认证</span>
                            </a>

                            <span class="x-right" style="line-height:40px">共有数据：{{ $results->total() }} 条</span>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover m-t-md">
                            <thead>
                            <tr>
                                <th class="text-center" width="50">ID</th>
                                <th class="text-center" width="100">会员头像</th>
                                <th class="text-center" width="100">会员昵称</th>
                                <th class="text-center" width="100">账号</th>
                                <th class="text-center" width="100">当前会员等级</th>
                                <th class="text-center" width="100">状态</th>
                                <th class="text-center" width="100">姓名</th>
                                <th class="text-center" width="130">身份证号码</th>
                                <th class="text-center" width="150">注册日期</th>
                                <th class="text-center" width="100">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $k => $item)
                                <tr>
                                    <td class="text-center">{{ $item->id }}</td>
                                    <td>
                                        <img src="{{ $item->avatar }}" alt="" width="100px" height="100px">
                                    </td>
                                    <td class="text-center">{{ $item->nick_name }}</td>
                                    <td class="text-center">{{ $item->member->mobile }}</td>
                                    <td class="text-center">
                                        @if($item->member->type == 10)
                                            <span class="text-navy">绿卡会员</span>
                                        @elseif($item->member->type == 20)
                                            <span class="text-navy">金卡会员</span>
                                        @elseif($item->member->type == 30)
                                            <span class="text-navy">黑金卡会员</span>
                                        @elseif($item->member->type == 40)
                                            <span class="text-navy">商家</span>
                                        @elseif($item->member->type == 50)
                                            <span class="text-navy">合伙人</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($item->check_status == 10)
                                            <span class="text-navy">待审核</span>
                                        @elseif($item->check_status == 20)
                                            <span class="text-navy">已审核</span>
                                        @elseif($item->check_status == 30)
                                            <span class="text-navy">拒绝审核</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item->username }}</td>
                                    <td class="text-center">{{ $item->code_sn }}</td>
                                    <td class="text-center">{{ $item->created_at }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="/admin/checkname/{{$item->id}}/edit">
                                                <button class="btn btn-primary btn-xs" type="button"><i class="fa fa-paste"></i> 审核</button>
                                            </a>
                                           
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$results->links()}}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection