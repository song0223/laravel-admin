@extends('admin.admin')
@section('content-header')
    <h1>
        权限管理
        <small>编辑权限</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">权限管理 - 编辑权限</li>
    </ol>
@stop

@section('content')
    <h3 class="page-header"><a href="{{url('/admin/permission/index')}}" class="btn btn-block btn-primary"
                               style="width:100px">返回</a></h3>
    <form action="{{url('/permission/edit')}}" method="post" value="{{csrf_token()}}">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">主要内容</a></li>
            </ul>
            {{csrf_field()}}
            @foreach($list as $val)
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="form-group">
                            <label>权限名称</label>
                                <input type="hidden" class="form-control" name="id" value="{!!$val->id!!}"
                                       hidden="hidden">
                                <input type="text" class="form-control" id="inputName3" name="name"
                                       value="{!!$val->name!!}">
                        </div>

                        <div class="form-group">
                            <label>权限编码</label>
                                <input type="text" class="form-control" id="inputCode3" name="code"
                                       value="{!!$val->code!!}">
                        </div>

                        <div class="form-group">
                            <label>权限描述</label>
                                <input type="text" class="form-control" id="inputDesc3" name="desc"
                                       value="{!!$val->desc!!}">
                        </div>

                    </div>
                @endforeach
                <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info right">编辑</button>
                    </div>
                </div>
        </div>
        <!-- /.box-footer -->
    </form>
@stop