<?php

namespace App\Admin\Repository\Admin;

use App\Model\YyAbnormal;

class AbnormalRepository
{
    public static function index()
    {
        $per_page = request('per_page', 15); ///*获取条数*/

        $order_num = request('order_num', '');
        $vehicle_num = request('vehicle_num', '');
        $company_name = request('company_name', '');
        $uuid = request('uuid', '');

        $model = new YyAbnormal();

        if ($order_num) {
            $model = $model->where('order_num', $order_num);
        }

        if ($company_name) {
            $model = $model->where('company_name', $company_name);
        }

        if ($vehicle_num) {
            $model = $model->where('vehicle_num', $vehicle_num);
        }

        if ($uuid) {
            $model = $model->where('uuid', $uuid);
        }

        $paginate = $model->paginate($per_page);

        $data['items'] = $paginate;
        $data['pager']['total'] = $paginate->total();
        $data['pager']['last_page'] = $paginate->lastPage();
        $data['pager']['current_page'] = $paginate->currentPage();
        return $data;
    }

}