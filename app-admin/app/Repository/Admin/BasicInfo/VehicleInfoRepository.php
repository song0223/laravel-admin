<?php

namespace App\Admin\Repository\Admin\BasicInfo;

use App\Model\BasicInfo\YyVehicleInfo;
use Bacao\Alert\Alert;

class VehicleInfoRepository
{
    public static function index()
    {
        $per_page = request('per_page', 15); ///*获取条数*/

        $carriers_id = request('carriers_id', 0);
        $vehicle_num = request('vehicle_num', '');

        $model = new YyVehicleInfo();

        if ($vehicle_num) {
            $model = $model->where('vehicle_num', $vehicle_num);
        }

        if ($carriers_id) {
            $model = $model->where('carriers_id', $carriers_id);
        }

        $paginate = $model->paginate($per_page);

        $data['items'] = $paginate;
        $data['pager']['total'] = $paginate->total();
        $data['pager']['last_page'] = $paginate->lastPage();
        $data['pager']['current_page'] = $paginate->currentPage();
        return $data;
    }


    public static function destroy($id)
    {
        $is_delete = YyVehicleInfo::destroy($id);
        if ($is_delete) {
            Alert::success('删除成功！');
            return true;
        }
        Alert::error('删除失败！');
        return false;
    }
}