<?php

namespace App\Admin\Http\Controllers\Admin;

use App\Admin\Http\Controllers\BaseController;
use App\Admin\Repository\AdminRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use DB;


class PermissionController extends BaseController
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
  
  //权限列表
  public function index()
  {
  	$list=DB::table('permission')->get();
    return $this->view('admin.permission.index')
    ->with('list',$list);
  }

  //
  //添加权限
  //
  public function add(Request $request)
  {

  	if($request->isMethod('post')){ 
      	$arr['name']=$request->input('name');
      	$arr['code']=$request->input('code');
      	$arr['desc']=$request->input('desc');
      	$arr['created_at']=date('Y-m-d H:i:s',time());
      	$arr['updated_at']=date('Y-m-d H:i:s',time());
    		
    		/* 验证权限名称是否重复 */
    		// $admins = DB::table('permission')->where(['name' => $arr['name']])->first();
  	    //  if($admins){
  	    //      return new JsonResponse(['name' => '权限名称已经存在'], 422);
  	    //  }
  	    /* 验证权限编码是否重复 */
  	    // $admins = DB::table('permission')->where(['code' => $arr['code']])->first();
  	    // if($admins){
  	    //     return new JsonResponse(['code' => '权限编码已经存在'], 422);
  	    // }

  	    $admin_id = DB::table('permission')->insert($arr);
          if($admin_id){
              return redirect('/admin/permission/index');
          }else{
              return ['status' => 0, 'msg' => '添加失败'];
          }

  	}
    return $this->view('admin.permission.add');
  }
  //
  //删除权限
  //
  public function del(Request $request)
  {
    if($request->isMethod('get')){ 
        $arr['id']=$request->input('id');
        $admin_id = DB::table('permission')->delete($arr);
        if($admin_id){
            return redirect('/admin/permission/index');
        }else{
            return ['status' => 0, 'msg' => '删除失败'];
        }
    }
  }
  //
  //编辑权限
  //
  public function edit(Request $request)
  {
    if($request->isMethod('get')){
        $arr['id']=$request->input('id');
    }
    if($request->isMethod('post')){
        $info['name']=$request->input('name');
        $info['code']=$request->input('code');
        $info['desc']=$request->input('desc');
        $info['updated_at']=date('Y-m-d H:i:s',time());
        $admin_id = DB::table('permission')->where('id','=',$request->input('id'))->update($info);
        if($admin_id){
            return redirect('/admin/permission/index');
        }else{
            return ['status' => 0, 'msg' => '更新失败'];
        }
    }
    $list=DB::table('permission')->where($arr)->get();
    return $this->view('admin.permission.edit')
    ->with('list',$list);
  }

    
}