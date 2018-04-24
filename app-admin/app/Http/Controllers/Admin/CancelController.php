<?php

namespace App\Admin\Http\Controllers\Admin;

use App\Admin\Http\Controllers\BaseController;
use App\Admin\Repository\AdminRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Model\CancelOrder;
use DB;
use Bacao\Alert\Alert;

class CancelController extends BaseController
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


  //异常问题列表
  public function index(Request $request)
  {
    $cancel = new CancelOrder();

    $arr['type']=$request->input('type');
    if($arr['type']==null){
        $list = CancelOrder::paginate(15);
    }else{
        $list=CancelOrder::where($arr)->paginate(15);
    }
    return $this->view('admin.cancel.index')->with('list',$list)->with('arr',$arr);
  }

  //
  //添加异常问题
  //
  public function add(Request $request)
  {
    $cancel = new CancelOrder();
  	if($request->isMethod('post')){ 
      	$arr['cancel_name']=$request->input('cancel_name');
        $arr['type']=$request->input('type');
      	$arr['created_at']=date('Y-m-d H:i:s',time());
      	$arr['updated_at']=date('Y-m-d H:i:s',time());
    		
    		/* 验证名称是否重复 */
    		// $admins = $cancel->where(['name' => $arr['cancel_name']])->first();
  	    //  if($admins){
  	    //      return new JsonResponse(['name' => '名称已经存在'], 422);
  	    //  }
        
  	    $admin_id = $cancel->insert($arr);
        if($admin_id){
            return redirect('/cancel/index');
        }else{
            return ['status' => 0, 'msg' => '添加失败'];
        }

  	}
    return $this->view('admin.cancel.add');
  }
  //
  //删除异常问题
  //
  public function del(Request $request)
  {
    $cancel = new CancelOrder();
    if($request->isMethod('get')){ 
        $arr['id']=$request->input('id');
        $admin_id =$cancel->where($arr)->delete();
        if($admin_id){
            return redirect('/cancel/index');
        }else{
            return ['status' => 0, 'msg' => '删除失败'];
        }
    }
  }
  //
  //编辑异常问题
  //
  public function edit(Request $request)
  {
    $cancel = new CancelOrder();
    if($request->isMethod('get')){
        $arr['id']=$request->input('id');
    }
    if($request->isMethod('post')){
        $info['cancel_name']=$request->input('cancel_name');
        $info['type']=$request->input('type');
        $info['updated_at']=date('Y-m-d H:i:s',time());

        $admin_id = $cancel->where('id','=',$request->input('id'))->update($info);
        if($admin_id){
            Alert::success('修改成功！');
            return redirect('/cancel/index');
        }else{
            return ['status' => 0, 'msg' => '更新失败'];
        }
    }
    $list=$cancel->where($arr)->get();
    return $this->view('admin.cancel.edit')
    ->with('list',$list);
  }


//
//后台设置押金金额
//


  //押金金额列表
  public function m_index()
  {
    $list=DB::table('sz_money')->get();
    return $this->view('admin.cancel.m_index')
    ->with('list',$list);
  }

  //
  //添加押金金额
  //
  public function m_add(Request $request)
  {

    if($request->isMethod('post')){ 
        $arr['money']=$request->input('money');
        $arr['created_at']=date('Y-m-d H:i:s',time());
        $arr['updated_at']=date('Y-m-d H:i:s',time());
        
        /* 验证金额是否重复 */
        // $admins = DB::table('sz_money')->where(['name' => $arr['money']])->first();
        //  if($admins){
        //      return new JsonResponse(['name' => '金额已经存在'], 422);
        //  }
        $admin_id = DB::table('sz_money')->insert($arr);
          if($admin_id){
              return redirect('/cancel/m_index');
          }else{
              return ['status' => 0, 'msg' => '添加失败'];
          }

    }
    return $this->view('admin.cancel.m_add');
  }
  //
  //删除押金金额
  //
  public function m_del(Request $request)
  {
    if($request->isMethod('get')){ 
        $arr['id']=$request->input('id');
        $admin_id = DB::table('sz_money')->delete($arr);
        if($admin_id){
            return redirect('/cancel/m_index');
        }else{
            return ['status' => 0, 'msg' => '删除失败'];
        }
    }
  }
  //
  //编辑押金金额
  //
  public function m_edit(Request $request)
  {
    if($request->isMethod('get')){
        $arr['id']=$request->input('id');
    }
    if($request->isMethod('post')){
        $info['money']=$request->input('money');
        $info['updated_at']=date('Y-m-d H:i:s',time());
        $admin_id = DB::table('sz_money')->where('id','=',$request->input('id'))->update($info);
        if($admin_id){
            return redirect('/cancel/m_index');
        }else{
            return ['status' => 0, 'msg' => '更新失败'];
        }
    }
    $list=DB::table('sz_money')->where($arr)->get();
    return $this->view('admin.cancel.m_edit')->with('list',$list);
  }

    
}
