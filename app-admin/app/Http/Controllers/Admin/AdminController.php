<?php

namespace App\Admin\Http\Controllers\Admin;

use App\Admin\Http\Controllers\BaseController;
use App\Admin\Repository\AdminRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use DB;
date_default_timezone_set('Asia/Shanghai');
class AdminController extends BaseController
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

    /**
     * 显示后台首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $collects = $this->admin->rdashboard();
        return $this->view('admin.dashboard.index', compact('collects'));
    }

    /**
     * 显示后台管理员个人信息
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function admininfo()
    {
        return $this->view('admin.admin.index');
    }

    /**
     * 显示用户信息页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function usermembershow()
    {
        $list=DB::table('users')->get();
        return $this->view('admin.usermember.index')
        ->with('list',$list);
    }

    /**
     * 显示文章列表页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function articleshow()
    {
        return $this->view('admin.article.index');
    }

    /**
     * 创建文章页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function uploadarticle()
    {
        return $this->view('admin.article.create');
    }
    //
    //用户管理--添加管理员
    //
    public function add(Request $request){
        if($request->isMethod('post')){ 
            $arr['name']=$request->input('name');
            $arr['email']=$request->input('email');
            $arr['password']=bcrypt($request->input('password'));
            $arr['role_id']=$request->input('role_id');
            $arr['created_at']=date('Y-m-d H:i:s',time());
            $arr['updated_at']=date('Y-m-d H:i:s',time());
            
            /* 验证权限名称是否重复 */
            // $admins = DB::table('users')->where(['name' => $arr['name']])->first();
            //  if($admins){
            //      return new JsonResponse(['name' => '管理员已经存在'], 422);
            //  }
            $admin_id = DB::table('users')->insert($arr);
            if($admin_id){
                return redirect('/admin/usermember/index');
            }else{
                return ['status' => 0, 'msg' => '添加失败'];
            }
        }
        $list=DB::table('role')->get();
        return $this->view('admin.admin.add')
        ->with('list',$list);
    }

    //
    //用户管理--删除管理员
    //
    public function del(Request $request)
    {
        if($request->isMethod('get')){ 
            $arr['id']=$request->input('id');
            $admin_id = DB::table('users')->delete($arr);
            if($admin_id){
                return redirect('/admin/usermember/index');
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
            $list['id']=$request->input('id');
            $admin = DB::table('users')->where($list)->first();
            $info['name']=$request->input('name');
            $info['role_id']=$request->input('role_id');
            if($request->input('password')==""){
                $info['password']=$admin->password;
            }else{
                $info['password']=bcrypt($request->input('password'));
            }
            $info['updated_at']=date('Y-m-d H:i:s',time());
            $admin_id = DB::table('users')->where($list)->update($info);
            if($admin_id){
                return redirect('/admin/usermember/index');
            }else{
                return ['status' => 0, 'msg' => '更新失败'];
            }
        }
        $list=DB::table('users')->where($arr)->get();
        $lis=DB::table('role')->get();
        return $this->view('admin.usermember.edit')
        ->with('list',$list)
        ->with('lis',$lis);
    }
}