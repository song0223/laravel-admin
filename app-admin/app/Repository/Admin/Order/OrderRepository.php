<?php

namespace App\Admin\Repository\Admin\Order;

use App\Model\Order\Order;
use Bacao\Alert\Alert;

class OrderRepository
{
    public static function index()
    {
        $per_page = request('per_page', 15); ///*获取条数*/

        $phone = request('phone', '');
        $order_num = request('order_num', '');
        $vehicle_num = request('vehicle_num', '');
        $is_type = request('is_type', 0);
        $status = request('start', 0);

        $model = new Order();

        if ($phone) {
            $model = $model->where('phone', $phone);
        }

        if ($order_num) {
            $model = $model->where('order_num', $order_num);
        }

        if ($is_type) {
            $model = $model->where('is_type', $is_type);
        }

        if ($vehicle_num) {
            $model = $model->where('vehicle_num', $vehicle_num);
        }

        if ($status) {
            $model = $model->where('status', $status);
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
        $is_delete = Order::destroy($id);
        if ($is_delete) {
            Alert::success('删除成功！');
            return true;
        }
        Alert::error('删除失败！');
        return false;
    }
}