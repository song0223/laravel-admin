@extends('admin.admin')
@section('content-header')
    <h1>
        基础管理
        <small>设置订单异常</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">基础管理 -  设置订单异常</li>
    </ol>
@stop

@section('content')
    <h3 class="page-header"><a href="{{url('/cancel/index')}}" class="btn btn-block btn-primary" style="width:100px">返回</a></h3>
    <div class="box box-primary">
       
        <div class="col-md-6" style="margin-left:20%">
          <!-- Horizontal Form -->
          <div class="box box-info">
           
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{url('/cancel/add')}}" method="post" value="{{csrf_token()}}">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputName3" class="col-sm-2 control-label">异常问题</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName3" name="cancel_name" placeholder="异常问题">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">问题所属</label>
                  <div class="col-sm-10">
                    <select name="type" class="form-control">
                            <option value="1">订单异常</option>
                            <option value="2">订单取消</option>
                    </select>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">添加</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>

    </div>
@stop