<?php

namespace App\Admin\Http\Controllers\Admin;

use App\Admin\Http\Controllers\BaseController;
use App\Admin\User;
use App\Model\Address;
use App\Model\Role;
use App\Model\YyUser;
use App\Admin\Repository\Admin\AddressRepository;
use App\Admin\Repository\Admin\UserRepository;
use Illuminate\Http\Request;

class UserController extends BaseController
{

    public function index(Request $request)
    {
        $data = [];
        $data = UserRepository::index();
        $data['search_list'] = $request->all();
        return $this->view('admin.user.index', $data);
    }

    public function edit(Request $request, $id)
    {
        $data = [];
        if (!empty($id)) {
            $user_repository = new UserRepository();
            $data['user_info'] = $user_repository->getUsersById($id);
        }
        $role_model = new Role();
        $data['role_list'] = $role_model->get();
        $data['id'] = $id;
        return $this->view('admin.user.edit', $data);
    }

    public function store(Request $request, $id)
    {
        $user_repository = new UserRepository();
        $user_repository->store($request, $id);
        return redirect('admin/user/index/');
    }

    public function delete(Request $request, $id)
    {
        UserRepository::destroy($id);
        return redirect('admin/user/index');
    }
}