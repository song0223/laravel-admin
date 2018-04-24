<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta property="wb:webmaster" content="b1217e0e46e1e300"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta id="token" name="token" value="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @section('head-css')
        <link href="//cdn.bootcss.com/font-awesome/4.6.0/css/font-awesome.css" rel="stylesheet">
        <link href="//cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="//cdn.bootcss.com/select2/4.0.3/css/select2.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{url('dist/css/ionicons.min.css')}}">
        <link rel="stylesheet" href="{{url('dist/css/AdminLTE.css')}}">
        <link rel="stylesheet" href="{{url('dist/css/skins/_all-skins.min.css')}}">
        <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet"/>
        <link href="{{url('css/common.css')}}" rel="stylesheet"/>
        <link href="{{url('css/bootstrap-switch.min.css')}}" rel="stylesheet"/>
        <link href="{{url('theme/default/layer.css')}}" rel="stylesheet"/>
    @show


    @section('other-css')
    @show  {{----}}
</head>
<body class="hold-transition skin-blue">
@section('master.main')
    <div class="wrapper">
        {{--顶部导航--}}
        @section('main-header')
        @show
        {{--/顶部导航--}}

        {{--主导航栏--}}
        @include('admin.layout.sidebar')
        {{--/主导航栏--}}

        {{--中间的内容--}}
        <div class="content-wrapper">
            <section class="content-header">
                @section('content-header')
                @show
            </section>
            <section class="content">
                @section('content')
                @show
            </section>
        </div>
        {{--/中间的内容--}}

        {{--底部--}}
        @section('main-footer')
        @show
        {{--/底部--}}

        {{--右侧边栏--}}
        @section('right-sidebar')
        @show
        {{--/右侧边栏--}}
        @include('bcalert::message')
    </div>
@show
@section('head-js')
    <script src="//cdn.bootcss.com/jquery/2.1.0/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//cdn.bootcss.com/vue/2.0.0-rc.5/vue.min.js"></script>
    <script src="//cdn.bootcss.com/select2/4.0.3/js/select2.min.js"></script>
    <script src="{{url('select2/zh-CN.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/vue.resource/1.0.2/vue-resource.min.js"></script>
    <script src="{{url('dist/js/admin.js')}}"></script>
    <script src="{{url('dist/js/demo.js')}}"></script>
    <script src="{{url('pop/src/scripts.min.js')}}"></script>
    <script src="{{url('js/bootstrap-switch.min.js')}}"></script>
    <script src="{{url('js/layer.js')}}"></script>
@show

{{-- 引入额外依赖JS插件 --}}
@section('other-js')
@show
@section('login-js')
@show
@section('msg-js')
@show

</body>
</html>