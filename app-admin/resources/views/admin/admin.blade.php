@extends('admin.layout.base')

{{--顶部导航--}}
@section('main-header')
    <header class="main-header">
        <a href="{{url('/dashboard')}}" style="background-color: #222d32" class="logo">
            <span class="logo-mini">un</span>
            <span class="logo-lg"><img src="{{url('images/logo.png')}}"></span>
        </a>
        <nav class="navbar navbar-static-top" style="background-color: #222d32">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown notifications-menu">
                        <a href="{{url('/dashboard')}}">
                            <i class="fa fa-home"></i>
                            <span class="label label-info">H</span>
                        </a>
                    </li>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{url('img/avatar5.png')}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{$basic_data['user']->name or ''}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('logout')}}">退出</a>
                    </li>
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
@endsection
{{--/顶部导航--}}



{{--主导航栏--}}
@section('main-sidebar')
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{url('img/avatar5.png')}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>admin</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">主导航栏</li>
                <li>
                    <a href="{{url('/dashboard')}}">
                        <i class="fa fa-dashboard"></i> <span>系统管理</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>用户管理</span>
                        <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('/admin/info/index')}}"><i class="fa fa-star-o"></i>个人资料</a></li>
                        <li><a href="{{url('/admin/usermember/index')}}"><i class="fa fa-star-o"></i>管理员(用户)</a></li>
                        <li><a href="{{url('/admin/role/index')}}"><i class="fa fa-star-o"></i>角色</a></li>
                        <li><a href="{{url('/admin/permission/index')}}"><i class="fa fa-star-o"></i>权限</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>会员管理</span>
                        <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('admin/user/index')}}"><i class="fa fa-star-o"></i>会员列表</a></li>
                    </ul>
                {{--<li class="header">LABELS</li>
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>--}}
                </li>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>基础设置</span>
                        <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('cate/index')}}"><i class="fa fa-star-o"></i>货物品类设置</a></li>
                        <li><a href="{{url('cancel/index')}}"><i class="fa fa-star-o"></i>订单异常/取消设置</a></li>
                        <li><a href="{{url('cancel/m_index')}}"><i class="fa fa-star-o"></i>押金金额设置</a></li>
                    </ul>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
@endsection

{{--底部--}}
@section('main-footer')
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <span>Copyright2017.All Rights Reserved  沪ICP备17052912号-2</span>
        </div>
        <strong>&nbsp;</strong>
    </footer>
@endsection
{{--/底部--}}

{{--右侧边栏--}}
@section('right-sidebar')
    <aside class="control-sidebar control-sidebar-dark">
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">最近活动</h3>
                <ul class='control-sidebar-menu'>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">1111</h4>
                                <p>hahah</p>
                            </div>
                        </a>
                    </li>
                </ul><!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">任务进度</h3>
                <ul class='control-sidebar-menu'>
                    <li>
                        <a href="javascript:void(0);">
                            <h4 class="control-sidebar-subheading">
                                自定义模版设计
                                <span class="label label-danger pull-right">70%</span>
                            </h4>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                </ul><!-- /.control-sidebar-menu -->

            </div><!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">常规设置</h3>
                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            报告面板用法
                            <input type="checkbox" class="pull-right" checked/>
                        </label>
                        <p>
                            关于常规设置选项的一些信息
                        </p>
                    </div><!-- /.form-group -->
                </form>
            </div><!-- /.tab-pane -->

        </div>
    </aside>
    <div class="control-sidebar-bg"></div>
@endsection
{{--/右侧边栏--}}