@extends("admin.layouts.layout")

@section("content")

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>礼包列表</h5>
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
                                <input type="text" name="gift_name" class="form-control" placeholder="请输入礼包名称" id="" value="{{ $request->username }}">
                            </div>

                            <input type="submit" value="查询" class="btn btn-primary" style="margin-top: 6px;margin-right: 15px;">

                        </form>

                        <div class="head-tab" style="margin-left: 15px;">

                            <a href="{{route('giftbag.create')}}" class="btn btn-sm btn-primary" title="添加礼包">
                                <i class="fa fa-plus-circle"></i><span class="hidden-xs">&nbsp;&nbsp;添加礼包</span>
                            </a>

                            <span class="x-right" style="line-height:40px">共有数据：{{ $results->total() }} 条</span>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover m-t-md">
                            <thead>
                            <tr>
                                <th class="text-center" width="50">ID</th>
                                <th class="text-center" width="100">礼包图片</th>
                                <th class="text-center" width="100">礼包名称</th>
                                <th class="text-center" width="100">礼包金额</th>
                                <th class="text-center" width="100">领取人数</th>
                                <th class="text-center" width="100">状态</th>
                                <th class="text-center" width="150">创建时间</th>
                                <th class="text-center" width="160">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $k => $item)
                                <tr>
                                    <td class="text-center">{{ $item->id }}</td>
                                    <td>
                                        <img src="{{ $item->gift_image }}" alt="" width="100px" height="100px">
                                    </td>
                                    <td class="text-center">{{ $item->gift_name }}</td>
                                    <td class="text-center">{{ $item->gift_money }}</td>
                                    <td class="text-center">{{ $item->num }}</td>
                                    <td class="text-center">{{ $item->status }}</td>
                                    <td class="text-center">{{ $item->created_at }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="/admin/giftbag/{{$item->id}}/edit">
                                                <button class="btn btn-primary btn-xs" type="button"><i class="fa fa-paste"></i> 编辑</button>
                                            </a>
                                            <a href="/admin/giftbag/{{$item->id}}">
                                                <button class="btn btn-success btn-xs" type="button"><i class="fa fa-paste"></i> 领取记录</button>
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