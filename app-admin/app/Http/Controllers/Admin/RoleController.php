<?php

namespace App\Admin\Http\Controllers\Admin;

use App\Admin\Http\Controllers\BaseController;
use App\Admin\Repository\Admin\RoleRepository;
use App\Admin\Repository\AdminRepository;
use App\Model\Permission;
use Illuminate\Http\Request;
use Bacao\Alert\Alert;
use Symfony\Component\HttpFoundation\JsonResponse;
use DB;

class RoleController extends BaseController
{

    public function index(Request $request)
    {
        $data = [];
        $data = RoleRepository::index();
        $data['search_list'] = $request->all();
        return $this->view('admin.role.index', $data);
    }

    public function edit(Request $request, $id)
    {
        $data = [];
        if (!empty($id)) {
            $role_repository = new RoleRepository();
            $data['role_info'] = $role_repository->getRoleById($id);
        }
        $data['permission_list'] = Permission::all();
        $data['id'] = $id;
        return $this->view('admin.role.edit', $data);
    }

    public function store(Request $request, $id)
    {
        $role_repository = new RoleRepository();
        $role_repository->store($request, $id);
        return redirect('admin/role/index/');
    }

    public function delete(Request $request, $id)
    {
        RoleRepository::destroy($id);
        return redirect('admin/role/index');
    }

}