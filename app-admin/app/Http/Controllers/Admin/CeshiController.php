<?php

namespace App\Admin\Http\Controllers\Admin;

use App\Admin\Http\Controllers\BaseController;
use App\Admin\Repository\AdminRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class CeshiController extends BaseController
{

  public $admin;

    /**
     * AdminController constructor.
     * @param AdminRepository $admin
     */
  public function __construct(AdminRepository $admin)
  {
      $this->admin = $admin;
  }

  //
  //首页大地图测试页面
  //
  public function ddtu()
  {

    $list=DB::table('yy_order')
    ->join('release_order','yy_order.release_id','=','release_order.id')
    ->join('yy_order_info','yy_order_info.order_id','=','yy_order.id')
    ->select('yy_order.*','yy_order_info.*')
    ->get();

    return $this->view('admin.ceshi.yuanyi')
    ->with('list',$list);
  }

  //
  //供应商位置
  //
  public function coor()
  {
      return $this->view('admin.ceshi.coor');
  }


   //
  //仓库位置
  //
  public function ware()
  {
      return $this->view('admin.ceshi.ware');
  }

  //
  //统计界面展示图
  //
  public function tji()
  {
    return $this->view('admin.ceshi.System_analysis2');
  }

  //
  //订单数据统计
  //
  public function t_data()
  {
    //$a=DB::table('yy_order')->get();
  }







    
}