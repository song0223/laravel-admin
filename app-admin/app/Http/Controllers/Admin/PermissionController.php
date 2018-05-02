<?php

namespace App\Admin\Http\Controllers\Admin;

use App\Admin\Http\Controllers\BaseController;
use App\Admin\Repository\Admin\PermissionRepository;
use App\Admin\Repository\AdminRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use DB;


class PermissionController extends BaseController
{

    public function index(Request $request)
    {
        $data = [];
        $data = PermissionRepository::index();
        $data['search_list'] = $request->all();
        return $this->view('admin.permission.index', $data);
    }

    public function edit(Request $request, $id)
    {
        $data = [];
        if (!empty($id)) {
            $permission_repository = new PermissionRepository();
            $data['permission_info'] = $permission_repository->getPermissionById($id);
        }
        $data['id'] = $id;
        return $this->view('admin.permission.edit', $data);
    }

    public function store(Request $request, $id)
    {
        $permission_repository = new PermissionRepository();
        $permission_repository->store($request, $id);
        return redirect('admin/permission/index/');
    }

    public function delete(Request $request, $id)
    {
        PermissionRepository::destroy($id);
        return redirect('admin/permission/index');
    }
}