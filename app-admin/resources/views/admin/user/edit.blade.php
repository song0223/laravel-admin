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
    <h3 class="page-header"><a href="{{route('admin.user.index')}}" class="btn btn-block btn-primary"
                               style="width:100px">返回</a></h3>
    <form action="{{route('admin.user.store', ['id' => $id ?? 0])}}" method="post">
        {{csrf_field()}}
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">主要内容</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="form-group">
                        <label>用户名</label>
                            <input type="text" class="form-control" id="inputName3" name="name" placeholder="用户名" value="{{$user_info['name'] or ''}}">
                    </div>

                    <div class="form-group">
                        <label>邮箱</label>
                            <input type="text" class="form-control" id="inputEmail3" name="email" placeholder="邮箱" value="{{$user_info['email'] or ''}}">
                    </div>

                    <div class="form-group">
                        <label>密码</label>
                            <input type="password" class="form-control" id="inputEmail3" name="password" placeholder="密码">
                    </div>

                    <div class="form-group">
                        <label>角色分组</label>
                            <select name="role" class="form-control">
                                @foreach(($role_list ?? []) as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-info right">提交</button>
                </div>
            </div>
        </div>
        <!-- /.box-footer -->
    </form>
@stop