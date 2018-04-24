<?php

namespace App\Admin\Http\Controllers\Admin\BasicInfo;

use App\Admin\Http\Controllers\BaseController;
use App\Model\CarriersUser;
use App\Admin\Repository\Admin\BasicInfo\VehicleInfoRepository;
use Illuminate\Http\Request;

class VehicleInfoController extends BaseController
{

    public function index(Request $request)
    {
        $data = [];
        $data = VehicleInfoRepository::index();
        $data['search_list'] = $this->getAppends($request->all());
        return $this->view('admin.basic-info.vehicle-info.index', $data);
    }


    protected function getAppends($search_list)
    {
        if (isset($search_list['carriers_id'])) {
            $carriers_user = new CarriersUser();
            $carriers_user_model = $carriers_user->getOneById($search_list['carriers_id']);
            if (isset($carriers_user_model)){
                $search_list['carriers_name'] = $carriers_user_model->company_name;
            }
        }
        return $search_list;
    }


    public function delete(Request $request, $id){
        VehicleInfoRepository::destroy($id);
        return redirect('admin/basic-info/vehicle-info/index');
    }
}