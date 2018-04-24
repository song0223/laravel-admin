@extends('admin.admin')
@section('content-header')
    <h1>
        基础设置管理
        <small>品类设置</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">基础管理 -  设置品类</li>
    </ol>
@stop

@section('content')
    <h3 class="page-header"><a href="{{url('/cate/index')}}" class="btn btn-block btn-primary" style="width:100px">返回</a></h3>
    <div class="box box-primary">
       
        <div class="col-md-6" style="margin-left:20%">
          <!-- Horizontal Form -->
          <div class="box box-info">
           
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" enctype="multipart/form-data" action="{{url('/cate/add')}}" method="post" value="{{csrf_token()}}">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputName3" class="col-sm-2 control-label">品类名称</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName3" name="cate_name" placeholder="品类名称">
                  </div>
                </div>


                


               <!--  <div class="form-group">
                  <label for="inputame3" class="col-sm-2 control-label">图片</label>

                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="inputame3" name="img" placeholder="图片">
                  </div>
                </div> -->

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