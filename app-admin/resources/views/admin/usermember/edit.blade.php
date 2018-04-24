@extends('admin.admin')
@section('content-header')
    <h1>
        用户管理
        <small>编辑管理员</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">用户管理 - 编辑管理员</li>
    </ol>
@stop

@section('content')
    <h3 class="page-header"><a href="{{url('/admin/usermember/index')}}" class="btn btn-block btn-primary"
                               style="width:100px">返回</a></h3>
    <form action="{{url('/admin/edit')}}" method="post" value="{{csrf_token()}}">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">主要内容</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    {{csrf_field()}}
                    @foreach($list as $val)
                        <div class="tab-content">
                            <div class="form-group">
                                <label>登录用户名
                                </label>
                                <input type="hidden" class="form-control" name="id" value="{!!$val->id!!}"
                                       hidden="hidden">
                                <input type="text" class="form-control" id="inputName3" name="name"
                                       value="{!!$val->name!!}">
                            </div>

                            <div class="form-group">
                                <label>邮箱</label>
                                <input type="text" class="form-control" id="inputEmail3" name="email"
                                           value="{!!$val->email!!}">
                            </div>

                            <div class="form-group">
                                <label>登录密码</label>
                                <input type="password" class="form-control" id="inputPassword3" name="password" value="">
                            </div>

                            <div class="form-group">
                                <label>角色分组</label>
                                    <select name="role_id" class="form-control">
                                        @foreach($lis as $va)
                                            <option value="{!!$va->id!!}"
                                                    @if($va->id == $val->role_id) selected @endif>{!!$va->name!!}</option>
                                        @endforeach
                                    </select>
                            </div>

                        </div>
                </div>
            </div>
        @endforeach
        <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-info right">编辑</button>
            </div>
            <!-- /.box-footer -->
    </form>
@stop