<?php

namespace App\Admin\Http\Controllers\Admin;

use App\Admin\Http\Controllers\BaseController;
use App\Admin\Repository\AdminRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\JsonResponse;
use DB;


class CateController extends BaseController
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

  
  //品类列表
  public function index()
  {
  	$list=DB::table('category')->get();
    return $this->view('admin.cate.index')
    ->with('list',$list);
  }

  //
  //添加品类
  //
  public function add(Request $request)
  {
  	if($request->isMethod('post')){ 

        // 接收文件file类型上传测试代码，文件存放在storage/uploads文件夹下
        // $file = $request->file('img'); //接文件
        // if($file->isValid()){ //判断文件是否上传成功
        //     $originalName = $file->getClientOriginalName(); // 文件原名
        //     $ext = $file->getClientOriginalExtension();     // 扩展名
        //     $realPath = $file->getRealPath();   //临时文件的绝对路径
        //     $type = $file->getClientMimeType();     // image/jpeg
        //     // 上传文件
        //     $filename = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;
        //     // 使用我们新建的uploads本地存储空间（目录）
        //     //这里的uploads是配置文件的名称
        //     $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
        // }

      	$arr['cate_name']=$request->input('cate_name');
      	$arr['created_at']=date('Y-m-d H:i:s',time());
      	$arr['updated_at']=date('Y-m-d H:i:s',time());
    		/* 验证品类名称是否重复 */
    		// $admins = DB::table('category')->where(['name' => $arr['cate_name']])->first();
  	    //  if($admins){
  	    //      return new JsonResponse(['name' => '品类名称已经存在'], 422);
  	    //  }
  	    $admin_id = DB::table('category')->insert($arr);
          if($admin_id){
              return redirect('/cate/index');
          }else{
              return ['status' => 0, 'msg' => '添加失败'];
          }

  	}
    return $this->view('admin.cate.add');
  }
  //
  //删除品类
  //
  public function del(Request $request)
  {
    if($request->isMethod('get')){ 
        $arr['id']=$request->input('id');
        $admin_id = DB::table('category')->delete($arr);
        if($admin_id){
            return redirect('/cate/index');
        }else{
            return ['status' => 0, 'msg' => '删除失败'];
        }
    }
  }
  //
  //编辑品类
  //
  public function edit(Request $request)
  {
    if($request->isMethod('get')){
        $arr['id']=$request->input('id');
    }
    if($request->isMethod('post')){
        $info['cate_name']=$request->input('cate_name');
        $info['updated_at']=date('Y-m-d H:i:s',time());
        $admin_id = DB::table('category')->where('id','=',$request->input('id'))->update($info);
        if($admin_id){
            return redirect('/cate/index');
        }else{
            return ['status' => 0, 'msg' => '更新失败'];
        }
    }
    $list=DB::table('category')->where($arr)->get();
    return $this->view('admin.cate.edit')
    ->with('list',$list);
  }

    
}
