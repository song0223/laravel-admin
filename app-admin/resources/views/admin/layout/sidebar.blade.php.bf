{{--主导航栏--}}
<?php
$menus = config('permissions');
$url_name = request()->route()->getName();
?>
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
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <!-- <li class="header">主导航栏</li> -->
            <li>
                <a href="{{url('/dashboard')}}">
                    <i class="fa fa-dashboard"></i> <span>系统管理</span>
                </a>
            </li>


            <li class="treeview @if(in_array($url_name,$menus['地图管理']) ) active @endif">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>地图管理</span>
                    <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if($url_name == $menus['地图管理'][1]) active @endif"><a
                                href="{{url('/ceshi')}}" style="margin-left:8%">大地图</a></li>
                    <li class="@if($url_name == $menus['地图管理'][2]) active @endif"><a
                                href="{{url('/coor')}}" style="margin-left:8%" target="_blank">供应商地图</a></li>
                    <li class="@if($url_name == $menus['地图管理'][3]) active @endif"><a
                                href="{{url('/ware')}}" style="margin-left:8%" target="_blank">仓库地图</a></li>
                </ul>
            </li>


            <li class="treeview @if(in_array($url_name,$menus['用户管理']) ) active @endif">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>用户管理</span>
                    <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                </a>
                <ul class="treeview-menu">
                        <li class="@if($url_name == $menus['用户管理'][1]) active @endif"><a
                                    href="{{url('/admin/info/index')}}" style="margin-left:8%">个人资料</a>
                        </li>
                    <li class="@if($url_name == $menus['用户管理'][2]) active @endif"><a
                                href="{{url('/admin/usermember/index')}}" style="margin-left:8%">管理员(用户)</a></li>
                    <li class="@if($url_name == $menus['用户管理'][3]) active @endif"><a
                                href="{{url('/admin/role/index')}}" style="margin-left:8%">角色</a></li>
                    <li class="@if($url_name == $menus['用户管理'][4]) active @endif"><a
                                href="{{url('/admin/permission/index')}}" style="margin-left:8%">权限</a></li>
                </ul>
            </li>

            <li class="treeview @if(in_array($url_name,$menus['会员管理']) ) active @endif">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>会员管理</span>
                    <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if($url_name == $menus['会员管理'][1]) active @endif"><a href="{{url('admin/user/index')}}" style="margin-left:8%">货主列表</a>
                    </li>
                    <li class="@if($url_name == $menus['会员管理'][2]) active @endif"><a
                                href="{{url('admin/carriers-user/index')}}" style="margin-left:8%">承运商/司机列表</a>
                    </li>
                </ul>
            </li>
            <li class="treeview @if(in_array($url_name,$menus['基础信息管理']) ) active @endif">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>基础信息管理</span>
                    <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if($url_name == $menus['基础信息管理'][1]) active @endif"><a
                                href="{{route('admin.basic-info.vehicle-info.index')}}"
                                style="margin-left:8%">车辆信息列表</a>
                    </li>
                </ul>
            </li>

            <li class="treeview @if(in_array($url_name,$menus['订单管理']) ) active @endif">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>订单管理</span>
                    <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if($url_name == $menus['订单管理'][1]) active @endif"><a
                                href="{{route('admin.order.release-order.index')}}" style="margin-left:8%">发布订单列表</a>
                    </li>
                    <li class="@if($url_name == $menus['订单管理'][2]) active @endif"><a
                                href="{{route('admin.order.order.index')}}" style="margin-left:8%">订单列表</a>
                    </li>
                    <li class="@if($url_name == $menus['订单管理'][3]) active @endif"><a
                                href="{{route('admin.order.order-abnormal.index')}}" style="margin-left:8%">订单异常列表</a>
                    </li>
                </ul>
            </li>

            <li class="treeview @if(in_array($url_name,$menus['基础设置']) ) active @endif">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>基础设置</span>
                    <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                     </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if($url_name == $menus['基础设置'][1]) active @endif"><a href="{{url('cate/index')}}"
                                                                                     style="margin-left:8%">货物品类设置</a>
                    </li>
                    <li class="@if($url_name == $menus['基础设置'][2]) active @endif"><a href="{{url('cancel/index')}}"
                                                                                     style="margin-left:8%">订单异常/取消设置</a>
                    </li>
                    <li class="@if($url_name == $menus['基础设置'][3]) active @endif"><a href="{{url('cancel/m_index')}}"
                                                                                     style="margin-left:8%">保证金设置</a>
                    </li>
                </ul>
            </li>


            <li class="treeview @if(in_array($url_name,$menus['温控管理']) ) active @endif">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>温控管理</span>
                    <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                     </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if($url_name == $menus['温控管理'][1]) active @endif"><a
                                href="{{url('admin/control/index')}}" style="margin-left:8%">车辆温控</a></li>
                    <li class="@if($url_name == $menus['温控管理'][2]) active @endif"><a
                                href="{{url('admin/abnormal/index')}}" style="margin-left:8%">异常温控</a></li>
                </ul>
            </li>

            <li class="treeview @if(in_array($url_name,$menus['财务管理']) ) active @endif">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>财务管理</span>
                    <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                     </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if($url_name == $menus['财务管理'][1]) active @endif"><a
                                href="{{url('admin/finance/deposit/index')}}" style="margin-left:8%">缴纳保证金列表</a></li>
                    <li class="@if($url_name == $menus['财务管理'][2]) active @endif"><a
                                href="{{url('admin/finance/money-detail/index')}}" style="margin-left:8%">账户资金明细列表</a>
                    </li>
                </ul>
            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
{{--/主导航栏--}}