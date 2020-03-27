<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台管理中心 - @yield('title', config('app.name', 'Laravel'))</title>
    <meta name="keywords" content="{{ config('app.name', 'Laravel') }}">
    <meta name="description" content="{{ config('app.name', 'Laravel') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="shortcut icon" href="favicon.ico"> <link href="{{ asset('huiadmin/css/bootstrap.min.css?v=3.3.6') }}" rel="stylesheet">
    <link href="{{ asset('huiadmin/css/font-awesome.min.css?v=4.4.0') }}" rel="stylesheet">
    <link href="{{ asset('huiadmin/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('huiadmin/css/style.css?v=4.1.0') }}" rel="stylesheet">

    <!-- Morris -->
    <link href="{{ asset('huiadmin/css/plugins/morris/morris-0.4.3.min.css') }}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{ asset('huiadmin/js/plugins/gritter/jquery.gritter.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    @include('flash::message')
    @yield('content')
</div>
<!-- 全局js -->
<script src="{{ asset('huiadmin/js/jquery.min.js?v=2.1.4') }}"></script>
<script src="{{ asset('huiadmin/js/bootstrap.min.js?v=3.3.6') }}"></script>
<script src="{{ asset('huiadmin/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('huiadmin/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('huiadmin/js/plugins/layer/layer.min.js') }}"></script>

<!-- 自定义js -->
<script src="{{ asset('huiadmin/js/hplus.js?v=4.1.0') }}"></script>
<script type="text/javascript" src="{{ asset('huiadmin/js/contabs.js') }}"></script>

<!-- 第三方插件 -->
<script src="{{ asset('huiadmin/js/plugins/pace/pace.min.js') }}"></script>

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


{{-- 2020.2.11 --}}
<!-- Chosen -->
<script src="{{ asset('huiadmin/js/plugins/chosen/chosen.jquery.js') }}"></script>

<!-- JSKnob -->
<script src="{{ asset('huiadmin/js/plugins/jsKnob/jquery.knob.js') }}"></script>

<!-- Input Mask-->
<script src="{{ asset('huiadmin/js/plugins/jasny/jasny-bootstrap.min.js') }}"></script>

<!-- Data picker -->
<script src="{{ asset('huiadmin/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>

<!-- Prettyfile -->
<script src="{{ asset('huiadmin/js/plugins/prettyfile/bootstrap-prettyfile.js') }}"></script>

<!-- NouSlider -->
<script src="{{ asset('huiadmin/js/plugins/nouslider/jquery.nouislider.min.js') }}"></script>

<!-- Switchery -->
<script src="{{ asset('huiadmin/js/plugins/switchery/switchery.js') }}"></script>

<!-- IonRangeSlider -->
<script src="{{ asset('huiadmin/js/plugins/ionRangeSlider/ion.rangeSlider.min.js') }}"></script>

<!-- iCheck -->
<script src="{{ asset('huiadmin/js/plugins/iCheck/icheck.min.js') }}"></script>

<!-- MENU -->
<script src="{{ asset('huiadmin/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>

<!-- Color picker -->
<script src="{{ asset('huiadmin/js/plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>

<!-- Clock picker -->
<script src="{{ asset('huiadmin/js/plugins/clockpicker/clockpicker.js') }}"></script>

<!-- Image cropper -->
<script src="{{ asset('huiadmin/js/plugins/cropper/cropper.min.js') }}"></script>

<script src="{{ asset('huiadmin/js/demo/form-advanced-demo.js') }}"></script>


@yield('js')
<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>
@yield('footer-js')
</body>
</html>