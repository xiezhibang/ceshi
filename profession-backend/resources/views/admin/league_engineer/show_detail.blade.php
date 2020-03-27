@extends("admin.layouts.layout")

@section("content")

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>店铺合伙明细</h5>
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


                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" placeholder="请输入" id="" value="">
                            </div>

                            <input type="submit" value="查询" class="btn btn-primary" style="margin-top: 6px;margin-right: 15px;">

                        </form>

                        <div class="head-tab" style="margin-left: 15px;">
                            <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a>
                            <a href="" class="btn btn-sm btn-primary" title="店铺合伙明细">
                                <i class="fa fa-plus-circle"></i><span class="hidden-xs">&nbsp;&nbsp;店铺合伙明细</span>
                            </a>

                            <span class="x-right" style="line-height:40px">共有数据： 条</span>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover m-t-md">
                            <thead>
                            <tr>
                                <th class="text-center" width="50">ID</th>
                                <th class="text-center" width="130">店铺名称</th>
                                <th class="text-center" width="100">账号</th>
                                <th class="text-center" width="100">联系人</th>
                                <th class="text-center" width="100">手机号</th>
                                <th class="text-center" width="100">入伙人数</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $k => $item)
                                <tr>
                                    <td class="text-center">{{ $item->id }}</td>
                                    <td class="text-center">{{ $item->shop_name }}</td>
                                    <td class="text-center">{{ $item->shop_account }}</td>
                                    <td class="text-center">{{ $item->username }}</td>
                                    <td class="text-center">{{ $item->phone }}</td>
                                    <td class="text-center">{{ $item->num }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection