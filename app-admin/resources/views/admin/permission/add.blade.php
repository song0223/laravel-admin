@extends('admin.admin')
@section('content-header')
    <h1>
        权限管理
        <small>注册权限</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">权限管理 - 注册权限</li>
    </ol>
@stop

@section('content')
    <h3 class="page-header"><a href="{{url('/admin/permission/index')}}" class="btn btn-block btn-primary"
                               style="width:100px">返回</a></h3>
    <form action="{{url('/permission/add')}}" method="post" value="{{csrf_token()}}">
        {{csrf_field()}}
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">主要内容</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="form-group">
                        <label>权限名称</label>
                            <input type="text" class="form-control" id="inputName3" name="name" placeholder="权限名称...">
                    </div>

                    <div class="form-group">
                        <label>权限编码</label>
                            <input type="text" class="form-control" id="inputCode3" name="code" placeholder="权限编码...">
                    </div>

                    <div class="form-group">
                        <label>权限描述</label>
                            <input type="text" class="form-control" id="inputDesc3" name="desc" placeholder="权限描述...">
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