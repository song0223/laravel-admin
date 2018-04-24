<?php

namespace App\Admin\Http\Controllers\Admin;

use App\Admin\Http\Controllers\BaseController;
use App\Admin\Repository\AdminRepository;
use Illuminate\Http\Request;
use Bacao\Alert\Alert;
use Symfony\Component\HttpFoundation\JsonResponse;
use DB;

class RoleController extends BaseController
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
  
  //用户管理--角色展示
  public function index()
  {
  	$list=DB::table('role')->get();
    return $this->view('admin.role.index')
    ->with('list',$list);
  }
  //
  //用户管理--添加角色
  //
  public function add(Request $request){
  	if($request->isMethod('post')){ 
        $arr['name']=$request->input('name');
        $arr['desc']=$request->input('desc');
        $arr['created_at']=date('Y-m-d H:i:s',time());
        $arr['updated_at']=date('Y-m-d H:i:s',time());
        $admin_id = DB::table('role')->insertGetId($arr);
        if(is_array($request->input('permission_id'))){
              $id=array();
              $id=$request->input('permission_id');
              foreach($id as $key=>$val){
                  $info['role_id']=$admin_id;
                  $info['permission_id']=$val;
                  $info['created_at']=date('Y-m-d H:i:s',time());
                  $info['updated_at']=date('Y-m-d H:i:s',time());
                  DB::table('role_permission')->insert($info);
              }
        }
  		/* 验证角色名称是否重复 */
  		// $admins = DB::table('role')->where(['name' => $arr['name']])->first();
	    // if($admins){
	    //     return new JsonResponse(['name' => '角色名称已经存在'],422);
	    // }
      if($admin_id){
          return redirect('/admin/role/index');
      }else{
          return ['status' => 0, 'msg' => '添加失败'];
      }
	}
	$list=DB::table('permission')->get();
      return $this->view('admin.role.add')->with('list',$list);
  }
  //
  //用户管理--角色删除
  //
  public function del(Request $request)
  {
    if($request->isMethod('get')){ 
        $arr['id']=$request->input('id');
        $admin_id = DB::table('role')->delete($arr);
        if($admin_id){
            return redirect('/admin/role/index');
        }else{
            return ['status' => 0, 'msg' => '删除失败'];
        }
    }
  }

  //
  //编辑角色
  //
  public function edit(Request $request)
  {
    if($request->isMethod('get')){
        $arr['id']=$request->input('id');
    }
    if($request->isMethod('post')){
        $info['name']=$request->input('name');
        $info['desc']=$request->input('desc');
        $info['updated_at']=date('Y-m-d H:i:s',time());
        $admin_id = DB::table('role')->where('id','=',$request->input('id'))->update($info);
        if(is_array($request->input('permission_id'))){
              $id=array();
              $id=$request->input('permission_id');
              DB::table('role_permission')->where('role_id','=',$request->input('id'))->delete();
              foreach($id as $key=>$val){
                  $inf['role_id']=$request->input('id');
                  $inf['permission_id']=$val;
                  $inf['created_at']=date('Y-m-d H:i:s',time());
                  $inf['updated_at']=date('Y-m-d H:i:s',time());
                  DB::table('role_permission')->insert($inf);
              }
        }
        if($admin_id){
            Alert::success('更新成功！');
            return redirect('/admin/role/index');
        }else{
            return ['status'=>0,'msg'=>'更新失败'];
        }
    }

    $list=DB::table('role')->where($arr)->get();
    foreach($list as $key=>$val){
        $lis=DB::table('role_permission')->where('role_id','=',$val->id)->get();
        foreach ($lis as $key1=>$val1){
          $val->per[]=$val1;
        }
    }

    $lis=DB::table('permission')->get();
    return $this->view('admin.role.edit')
    ->with('list',$list)
    ->with('lis',$lis);
  }


  

  


    
}