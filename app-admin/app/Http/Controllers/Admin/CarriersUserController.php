<?php

namespace App\Admin\Http\Controllers\Admin;

use App\Admin\Http\Controllers\BaseController;
use App\Model\Address;
use App\Model\CarriersUser;
use App\Admin\Repository\Admin\AddressRepository;
use App\Admin\Repository\Admin\CarriersUserRepository;
use Illuminate\Http\Request;

class CarriersUserController extends BaseController
{

    public function index(Request $request)
    {
        $data = [];
        $yy_user = new CarriersUser();
        $data = CarriersUserRepository::index();
        $data['type_map'] = $yy_user::typeMap();
        $data['cert_map'] = $yy_user::certMap();
        $data['audit_map'] = $yy_user::checkMap();
        $data['search_list'] = $request->all();
        return $this->view('admin.carrier-user.index', $data);
    }

    public function cert(Request $request, $id)
    {
        $carriers_user_repository = new CarriersUserRepository;
        $data['cert_info'] = $carriers_user_repository->getUsersById($id);
        return $this->view('admin.carrier-user.cert', $data);
    }


    /**
     * 获取公司名
     * @param Request $request
     * @return array
     */
    public function getCarriersUser(Request $request)
    {
        $results = [];
        $input = $request->get('q');
        $carriers_user_repository = new CarriersUserRepository();
        $results = $carriers_user_repository->findCarriersUserByUserName($input);
        return array('results' => $results);
    }

    /**
     * 修改公司简写
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateSd(Request $request)
    {
        $results = [];
        $text = $request->get('text');
        $id = $request->get('id');
        $carriers_user_repository = new CarriersUserRepository();
        $results = $carriers_user_repository->updateShorthand($id, $text);
        return response()->json($results, 200);
    }


    /**
     * 修改用户状态
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatus(Request $request)
    {
        $results = [];
        if ($request->isMethod('post')) {
            $carriers_user_repository = new CarriersUserRepository();
            $status = $request->get('status');
            $id = $request->get('id');
            $results = $carriers_user_repository->mark($id, $status);
        }
        return response()->json($results, 200);
    }

    public function changeAudit(Request $request, $id, $audit)
    {
        $results = [];
        $not_through = $request->get('not_through', '');
        $carriers_user_repository = new CarriersUserRepository();
        $carriers_user_repository->audit($id, $audit, $not_through);
        return redirect('admin/carriers-user/index');
    }


    public function address(Request $request, $id){
        $request->merge(['type' => Address::CJ, 'user_id' => $id]);
        $data = AddressRepository::index();
        $data['status_map'] = Address::statusMap();
        $data['search_list'] = $request->all();
        $data['id'] = $id;
        return $this->view('admin.carrier-user.address', $data);
    }

    public function delAddress(Request $request, $id)
    {
        AddressRepository::destroy($id);
        return redirect('admin/carriers-user/address/'. $id);
    }
}