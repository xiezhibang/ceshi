@extends("admin.layouts.layout")

@section("content")

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>用户反馈列表</h5>
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
                            <input type="text" name="username" class="form-control" placeholder="请输入会员昵称" id="" value="{{ $request->username }}">
                        </div>

                        <div class="form-group">
                            <input type="text" name="account" class="form-control" placeholder="请输入会员账号" id="" value="{{ $request->account }}">
                        </div>

                        <input type="submit" value="查询" class="btn btn-primary" style="margin-top: 6px;margin-right: 15px;">

                    </form>

                    <div class="head-tab" style="margin-left: 15px;">

                        <a href="" class="btn btn-sm btn-primary" title="用户反馈列表">
                            <i class="fa fa-plus-circle"></i><span class="hidden-xs">&nbsp;&nbsp;用户反馈列表</span>
                        </a>

                        <span class="x-right" style="line-height:40px">共有数据：{{ $results->total() }} 条</span>
                    </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover m-t-md">
                            <thead>
                            <tr>
                                <th class="text-center" width="50">ID</th>
                                <th class="text-center" width="100">会员昵称</th>
                                <th class="text-center" width="100">会员账号</th>
                                <th class="text-center" width="150">反馈内容</th>
                                <th class="text-center" width="160">反馈时间</th>
                                <th class="text-center" width="130">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $k => $item)
                            <tr>
                                <td class="text-center">{{ $item->id }}</td>
                                <td class="text-center">{{ $item->username }}</td>
                                <td class="text-center">{{ $item->account }}</td>
                                <td class="text-center">{{ $item->content }}</td>
                                <td class="text-center">{{ $item->created_at }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="/admin/feedback/{{$item->id}}">
                                            <button class="btn btn-info btn-xs" type="button"><i class="fa fa-paste"></i> 查看</button>
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