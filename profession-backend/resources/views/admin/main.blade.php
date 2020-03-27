
@extends('admin.layouts.layout')

@section('title', '首页')

@section('css')
  <link href="{{asset('/admin/css/pxgridsicons.min.css')}}" rel="stylesheet" />
@endsection
@section('content')

  <div class="row">
    <div class="col-sm-3">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <span class="label label-success pull-right"></span>
          <h5>个人零钱总额</h5>
        </div>
        <div class="ibox-content">
          <h1 class="no-margins"><b>￥</b>{{ $money_bag_total }}</h1>

        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <span class="label label-info pull-right"></span>
          <h5>商家营业款总额</h5>
        </div>
        <div class="ibox-content">
          <h1 class="no-margins"><b>￥</b>{{ $shop_money_total }}</h1>

        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <span class="label label-primary pull-right"></span>
          <h5>个人积分总数</h5>
        </div>
        <div class="ibox-content">
          <h1 class="no-margins">{{ $integral_total }}</h1>

        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <span class="label label-danger pull-right"></span>
          <h5>商家积分总数</h5>
        </div>
        <div class="ibox-content">
          <h1 class="no-margins">{{ $shop_integral_total }}</h1>

        </div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>订单</h5>
          <div class="pull-right">
            <div class="btn-group">
              <button type="button" class="btn btn-xs btn-white active">天</button>
              <button type="button" class="btn btn-xs btn-white">月</button>
              <button type="button" class="btn btn-xs btn-white">年</button>
            </div>
          </div>
        </div>
        <div class="ibox-content">
          <div class="row">
            <div class="col-sm-9">
              <div class="flot-chart">
                <div class="flot-chart-content" id="flot-dashboard-chart"></div>
              </div>
            </div>
            <div class="col-sm-3">
              <ul class="stat-list">
                <li>
                  <h2 class="no-margins">2,346</h2>
                  <small>订单总数</small>
                  <div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i>
                  </div>
                  <div class="progress progress-mini">
                    <div style="width: 48%;" class="progress-bar"></div>
                  </div>
                </li>
                <li>
                  <h2 class="no-margins ">4,422</h2>
                  <small>最近一个月订单</small>
                  <div class="stat-percent">60% <i class="fa fa-level-down text-navy"></i>
                  </div>
                  <div class="progress progress-mini">
                    <div style="width: 60%;" class="progress-bar"></div>
                  </div>
                </li>
                <li>
                  <h2 class="no-margins ">9,180</h2>
                  <small>最近一个月销售额</small>
                  <div class="stat-percent">22% <i class="fa fa-bolt text-navy"></i>
                  </div>
                  <div class="progress progress-mini">
                    <div style="width: 22%;" class="progress-bar"></div>
                  </div>
                </li>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>



  <!-- 全局js -->
  <script src="{{ asset('huiadmin/js/jquery.min.js?v=2.1.4') }}"></script>
  <script src="{{ asset('huiadmin/js/bootstrap.min.js?v=3.3.6') }}"></script>



  <!-- Flot -->
  <script src="{{ asset('huiadmin/js/plugins/flot/jquery.flot.js') }}"></script>
  <script src="{{ asset('huiadmin/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
  <script src="{{ asset('huiadmin/js/plugins/flot/jquery.flot.spline.js') }}"></script>
  <script src="{{ asset('huiadmin/js/plugins/flot/jquery.flot.resize.js') }}"></script>
  <script src="{{ asset('huiadmin/js/plugins/flot/jquery.flot.pie.js') }}"></script>
  <script src="{{ asset('huiadmin/js/plugins/flot/jquery.flot.symbol.js') }}"></script>

  <!-- Peity -->
  <script src="{{ asset('huiadmin/js/plugins/peity/jquery.peity.min.js') }}"></script>
  <script src="{{ asset('huiadmin/js/demo/peity-demo.js') }}"></script>

  <!-- 自定义js -->
  <script src="{{ asset('huiadmin/js/content.js?v=1.0.0') }}"></script>


  <!-- jQuery UI -->
  <script src="{{ asset('huiadmin/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

  <!-- Jvectormap -->
  <script src="{{ asset('huiadmin/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
  <script src="{{ asset('huiadmin/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

  <!-- EayPIE -->
  <script src="{{ asset('huiadmin/js/plugins/easypiechart/jquery.easypiechart.js') }}"></script>

  <!-- Sparkline -->
  <script src="{{ asset('huiadmin/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

  <!-- Sparkline demo data  -->
  <script src="{{ asset('huiadmin/js/demo/sparkline-demo.js') }}"></script>

  <script>
    $(document).ready(function () {
      $('.chart').easyPieChart({
        barColor: '#f8ac59',
        //                scaleColor: false,
        scaleLength: 5,
        lineWidth: 4,
        size: 80
      });

      $('.chart2').easyPieChart({
        barColor: '#1c84c6',
        //                scaleColor: false,
        scaleLength: 5,
        lineWidth: 4,
        size: 80
      });

      var data2 = [
        [gd(2012, 1, 1), 7], [gd(2012, 1, 2), 6], [gd(2012, 1, 3), 4], [gd(2012, 1, 4), 8],
        [gd(2012, 1, 5), 9], [gd(2012, 1, 6), 7], [gd(2012, 1, 7), 5], [gd(2012, 1, 8), 4],
        [gd(2012, 1, 9), 7], [gd(2012, 1, 10), 8], [gd(2012, 1, 11), 9], [gd(2012, 1, 12), 6],
        [gd(2012, 1, 13), 4], [gd(2012, 1, 14), 5], [gd(2012, 1, 15), 11], [gd(2012, 1, 16), 8],
        [gd(2012, 1, 17), 8], [gd(2012, 1, 18), 11], [gd(2012, 1, 19), 11], [gd(2012, 1, 20), 6],
        [gd(2012, 1, 21), 6], [gd(2012, 1, 22), 8], [gd(2012, 1, 23), 11], [gd(2012, 1, 24), 13],
        [gd(2012, 1, 25), 7], [gd(2012, 1, 26), 9], [gd(2012, 1, 27), 9], [gd(2012, 1, 28), 8],
        [gd(2012, 1, 29), 5], [gd(2012, 1, 30), 8], [gd(2012, 1, 31), 25]
      ];

      var data3 = [
        [gd(2012, 1, 1), 800], [gd(2012, 1, 2), 500], [gd(2012, 1, 3), 600], [gd(2012, 1, 4), 700],
        [gd(2012, 1, 5), 500], [gd(2012, 1, 6), 456], [gd(2012, 1, 7), 800], [gd(2012, 1, 8), 589],
        [gd(2012, 1, 9), 467], [gd(2012, 1, 10), 876], [gd(2012, 1, 11), 689], [gd(2012, 1, 12), 700],
        [gd(2012, 1, 13), 500], [gd(2012, 1, 14), 600], [gd(2012, 1, 15), 700], [gd(2012, 1, 16), 786],
        [gd(2012, 1, 17), 345], [gd(2012, 1, 18), 888], [gd(2012, 1, 19), 888], [gd(2012, 1, 20), 888],
        [gd(2012, 1, 21), 987], [gd(2012, 1, 22), 444], [gd(2012, 1, 23), 999], [gd(2012, 1, 24), 567],
        [gd(2012, 1, 25), 786], [gd(2012, 1, 26), 666], [gd(2012, 1, 27), 888], [gd(2012, 1, 28), 900],
        [gd(2012, 1, 29), 178], [gd(2012, 1, 30), 555], [gd(2012, 1, 31), 993]
      ];


      var dataset = [
        {
          label: "订单数",
          data: data3,
          color: "#1ab394",
          bars: {
            show: true,
            align: "center",
            barWidth: 24 * 60 * 60 * 600,
            lineWidth: 0
          }

        }, {
          label: "付款数",
          data: data2,
          yaxis: 2,
          color: "#464f88",
          lines: {
            lineWidth: 1,
            show: true,
            fill: true,
            fillColor: {
              colors: [{
                opacity: 0.2
              }, {
                opacity: 0.2
              }]
            }
          },
          splines: {
            show: false,
            tension: 0.6,
            lineWidth: 1,
            fill: 0.1
          },
        }
      ];


      var options = {
        xaxis: {
          mode: "time",
          tickSize: [3, "day"],
          tickLength: 0,
          axisLabel: "Date",
          axisLabelUseCanvas: true,
          axisLabelFontSizePixels: 12,
          axisLabelFontFamily: 'Arial',
          axisLabelPadding: 10,
          color: "#838383"
        },
        yaxes: [{
          position: "left",
          max: 1070,
          color: "#838383",
          axisLabelUseCanvas: true,
          axisLabelFontSizePixels: 12,
          axisLabelFontFamily: 'Arial',
          axisLabelPadding: 3
        }, {
          position: "right",
          clolor: "#838383",
          axisLabelUseCanvas: true,
          axisLabelFontSizePixels: 12,
          axisLabelFontFamily: ' Arial',
          axisLabelPadding: 67
        }
        ],
        legend: {
          noColumns: 1,
          labelBoxBorderColor: "#000000",
          position: "nw"
        },
        grid: {
          hoverable: false,
          borderWidth: 0,
          color: '#838383'
        }
      };

      function gd(year, month, day) {
        return new Date(year, month - 1, day).getTime();
      }

      var previousPoint = null,
              previousLabel = null;

      $.plot($("#flot-dashboard-chart"), dataset, options);

      var mapData = {
        "US": 298,
        "SA": 200,
        "DE": 220,
        "FR": 540,
        "CN": 120,
        "AU": 760,
        "BR": 550,
        "IN": 200,
        "GB": 120,
      };

      $('#world-map').vectorMap({
        map: 'world_mill_en',
        backgroundColor: "transparent",
        regionStyle: {
          initial: {
            fill: '#e4e4e4',
            "fill-opacity": 0.9,
            stroke: 'none',
            "stroke-width": 0,
            "stroke-opacity": 0
          }
        },

        series: {
          regions: [{
            values: mapData,
            scale: ["#1ab394", "#22d6b1"],
            normalizeFunction: 'polynomial'
          }]
        },
      });
    });
  </script>

  <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script>
  <!--统计代码，可删除-->

@stop
