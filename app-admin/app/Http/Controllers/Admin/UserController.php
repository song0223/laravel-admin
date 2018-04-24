<?php

namespace App\Admin\Http\Controllers\Admin;

use App\Admin\Http\Controllers\BaseController;
use App\Model\Address;
use App\Model\YyUser;
use App\Admin\Repository\Admin\AddressRepository;
use App\Admin\Repository\Admin\UserRepository;
use Illuminate\Http\Request;

class UserController extends BaseController
{

    public function index(Request $request)
    {
        $data = [];
        $yy_user = new YyUser();
        $data = UserRepository::index();
        $data['type_map'] = $yy_user::typeMap();
        $data['cert_map'] = $yy_user::certMap();
        $data['audit_map'] = $yy_user::checkMap();
        $data['search_list'] = $request->all();
        return $this->view('admin.user.index', $data);
    }

    public function cert(Request $request, $id)
    {
        $user_repository = new UserRepository;
        $data['cert_info'] = $user_repository->getUsersById($id);
        return $this->view('admin.user.cert', $data);
    }

    public function changeStatus(Request $request)
    {
        $results = [];
        if ($request->isMethod('post')){
            $yy_user_repository = new UserRepository();
            $status = $request->get('status');
            $id = $request->get('id');
            $results = $yy_user_repository->mark($id, $status);
        }
        return response()->json($results, 200);
    }

    public function changeAudit(Request $request, $id, $audit)
    {
        $results = [];
        $not_through = $request->get('not_through', '');
        $user_repository = new UserRepository();
        $user_repository->audit($id, $audit, $not_through);
        return redirect('admin/user/index');
    }


    public function address(Request $request, $id){
        $request->merge(['type' => Address::HZ, 'user_id' => $id]);
        $data = AddressRepository::index();
        $data['status_map'] = Address::statusMap();
        $data['search_list'] = $request->all();
        $data['id'] = $id;
        return $this->view('admin.user.address', $data);
    }

    public function delAddress(Request $request, $id)
    {
        AddressRepository::destroy($id);
        return redirect('admin/user/address/'. $id);
    }
}