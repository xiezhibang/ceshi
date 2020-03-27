@extends("admin.layouts.layout")

@section("content")

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>商品列表</h5>
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

                        <div class="form-group draggable">
                            <div class="col-sm-9">
                                <select class="form-control" name="state">
                                    <option value="0">请选择上下架状态</option>
                                    <option value="1">上架</option>
                                    <option value="2">下架</option>
                                    <option value="3">已删除</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group draggable">
                            <div class="col-sm-9">
                                <select class="form-control" name="type">
                                    <option value="0">请选择商品类型</option>
                                    <option value="1">普通商品</option>
                                    <option value="2">特权商品</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" name="good_name" class="form-control" placeholder="请输入商品名称" id="" value="{{ $request->good_name }}">
                        </div>

                        <input type="submit" value="查询" class="btn btn-primary" style="margin-top: 6px;margin-right: 15px;">

                    </form>

                    <div class="head-tab" style="margin-left: 15px;">

                        <a href="" class="btn btn-sm btn-primary" title="商品列表">
                            <i class="fa fa-plus-circle"></i><span class="hidden-xs">&nbsp;&nbsp;商品列表</span>
                        </a>

                        <span class="x-right" style="line-height:40px">共有数据：{{ $results->total() }} 条</span>
                    </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover m-t-md">
                            <thead>
                            <tr>
                                <th class="text-center" width="50">ID</th>
                                <th class="text-center" width="150">商品名称</th>
                                <th class="text-center" width="150">分类名称</th>
                                <th class="text-center" width="130">商品图片</th>
                                <th class="text-center" width="150">店铺名称</th>
                                <th class="text-center" width="100">总库存</th>
                                <th class="text-center" width="100">销量</th>
                                <th class="text-center" width="100">积分</th>
                                <th class="text-center" width="100">售价</th>
                                <th class="text-center" width="100">商品类型</th>
                                <th class="text-center" width="100">审核状态</th>
                                <th class="text-center" width="100">上/下架</th>
                                <th class="text-center" width="160">创建时间</th>
                                <th class="text-center" width="130">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $k => $item)
                            <tr>
                                <td class="text-center">{{ $item->id }}</td>
                                <td class="text-center">{{ $item->good_name }}</td>
                                <td class="text-center">{{ $item->cate_name }}</td>
                                <td>
                                    <img src="{{ $item->good_image }}" alt="" width="100px" height="100px">
                                </td>
                                <td class="text-center">{{ $item->shop_name }}</td>
                                <td class="text-center">{{ $item->total_stock }}</td>
                                <td class="text-center">{{ $item->selling_num }}</td>
                                <td class="text-center">{{ $item->good_integral }}</td>
                                <td class="text-center"><b>￥</b>{{ $item->selling_price }}</td>
                                <td class="text-center">{{ $item->type }}</td>
                                <td class="text-center">
                                    @if($item->status == 1)
                                        <span class="text-navy">待审核</span>
                                    @elseif($item->status == 2)
                                        <span class="text-danger">审核通过</span>
                                    @elseif($item->status == 3)
                                        <span class="text-navy">审核不通过</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($item->state == 1)
                                        <span class="text-navy">上架</span>
                                    @elseif($item->state == 2)
                                        <span class="text-danger">下架</span>
                                    @elseif($item->state == 3)
                                        <span class="text-navy">已删除</span>
                                    @endif
                                </td>
                                <td class="text-center">{{ $item->created_at }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="/admin/good/{{$item->id}}/edit">
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