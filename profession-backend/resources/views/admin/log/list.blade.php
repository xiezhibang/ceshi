@extends("admin.layouts.layout")

@section("content")

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>操作日志</h5>
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
                                <input type="text" name="" class="form-control" placeholder="管理员名称" id="" value="">
                            </div>

                            <div class="form-group">
                                <input type="text" name="" class="form-control" placeholder="账号" id="" value="">
                            </div>

                            <div class="form-group">
                                <input type="text" name="" class="form-control" placeholder="模块" id="" value="">
                            </div>

                            <input type="submit" value="查询" class="btn btn-primary" style="margin-top: 6px;margin-right: 15px;">

                        </form>

                        <div class="head-tab" style="margin-left: 15px;">

                            <span class="x-right" style="line-height:40px">共有数据：3 条</span>
                        </div>

                    </div>

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover m-t-md">
                            <thead>
                            <tr>
                                <th class="text-center" width="100">管理员名称</th>
                                <th class="text-center" width="100">账号</th>
                                <th class="text-center" width="100">操作模块</th>
                                <th class="text-center" width="100">操作对象</th>
                                <th class="text-center" width="100">操作内容</th>
                                <th class="text-center" width="100">IP地址</th>
                                <th class="text-center" width="160">操作时间</th>
                            </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td class="text-center">张三</td>
                                    <td class="text-center">18933658897</td>
                                    <td class="text-center">商品</td>
                                    <td class="text-center">审核商品</td>
                                    <td class="text-center">审核商品</td>
                                    <td class="text-center">127.0.0.1</td>
                                    <td class="text-center">2020-02-28 21:05:07</td>

                                </tr>


                                <tr>
                                    <td class="text-center">李四</td>
                                    <td class="text-center">18933658897</td>
                                    <td class="text-center">商品</td>
                                    <td class="text-center">审核商品</td>
                                    <td class="text-center">审核商品</td>
                                    <td class="text-center">127.0.0.1</td>
                                    <td class="text-center">2020-02-28 21:05:07</td>

                                </tr>


                                <tr>
                                    <td class="text-center">晓晓</td>
                                    <td class="text-center">18933658897</td>
                                    <td class="text-center">商品</td>
                                    <td class="text-center">审核商品</td>
                                    <td class="text-center">审核商品</td>
                                    <td class="text-center">127.0.0.1</td>
                                    <td class="text-center">2020-02-28 21:05:07</td>

                                </tr>

                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection