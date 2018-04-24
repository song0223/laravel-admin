@extends('admin.admin')
@section('content-header')
    <h1>
        用户管理
        <small>注册管理员</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">用户管理 - 注册管理员</li>
    </ol>
@stop

@section('content')
    <h3 class="page-header"><a href="{{url('/admin/usermember/index')}}" class="btn btn-block btn-primary"
                               style="width:100px">返回</a></h3>
    <form action="{{url('/admin/add')}}" method="post" value="{{csrf_token()}}">
        {{csrf_field()}}
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">主要内容</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="form-group">
                        <label>登录用户名</label>
                            <input type="text" class="form-control" id="inputName3" name="name" placeholder="name">
                    </div>

                    <div class="form-group">
                        <label>邮箱</label>
                            <input type="text" class="form-control" id="inputEmail3" name="email" placeholder="email">
                    </div>

                    <div class="form-group">
                        <label>登录密码</label>
                            <input type="password" class="form-control" id="inputPassword3" name="password"
                                   placeholder="password">
                    </div>

                    <div class="form-group">
                        <label>角色分组</label>
                            <select name="role_id" class="form-control">
                                @foreach($list as $val)
                                    <option value="{!!$val->id!!}">{!!$val->name!!}</option>
                                @endforeach
                            </select>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-info right">注册</button>
                </div>
            </div>
        </div>
        <!-- /.box-footer -->
    </form>
@stop