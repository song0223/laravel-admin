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
            @foreach($menus as $key => $menu)
                @menu($menu)
                @if(!is_numeric($key))
                    <li class="treeview @if(in_array($url_name,$menu) ) active @endif">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>{{$key}}</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                         </span>
                        </a>
                        <ul class="treeview-menu">
                            @foreach($menu as $k => $v)
                                @if(!is_numeric($k))
                                    @permission($v)
                                    <li class="@if($url_name == $v) active @endif">
                                        <a href="{{route($v)}}" style="margin-left:8%"
                                          @if($key == '地图管理') target="_blank" @endif
                                        >{{$k}}</a>
                                    </li>
                                    @endpermission
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endif
                @endmenu
            @endforeach
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
{{--/主导航栏--}}