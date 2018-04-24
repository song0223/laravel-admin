<?php

namespace App\Admin\Http\Controllers\Admin\Finance;

use App\Admin\Http\Controllers\BaseController;
use App\Model\CarriersUser;
use App\Admin\Repository\Admin\Finance\DepositRepository;
use Illuminate\Http\Request;

class DepositController extends BaseController
{

    public function index(Request $request)
    {
        $data = [];
        $data = DepositRepository::index();
        $data['search_list'] = $this->getAppends($request->all());
        return $this->view('admin.finance.deposit.index', $data);
    }


    protected function getAppends($search_list)
    {
        if (isset($search_list['user_id'])) {
            $carriers_user = new CarriersUser();
            $carriers_user_model = $carriers_user->getOneById($search_list['user_id']);
            if (isset($carriers_user_model)){
                $search_list['user_name'] = $carriers_user_model->company_name;
            }
        }
        return $search_list;
    }

    public function delete(Request $request, $id)
    {
        DepositRepository::destroy($id);
        return redirect('admin/finance/deposit/index');
    }
}