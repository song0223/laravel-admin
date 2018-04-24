<?php

namespace App\Admin\Http\Controllers\Admin\Order;

use App\Admin\Http\Controllers\BaseController;
use App\Model\Order\Order;
use App\Admin\Repository\Admin\Order\OrderRepository;
use Illuminate\Http\Request;

class OrderController extends BaseController
{

    public function index(Request $request)
    {
        $data = [];
        $order = new Order();
        $data = OrderRepository::index();
        $data['status_map'] = $order::statusMap();
        $data['is_pay_map'] = $order::isPayMap();
        $data['search_list'] = $this->getAppends($request->all());
        return $this->view('admin.order.order.index', $data);
    }


    protected function getAppends($search_list)
    {
        return $search_list;
    }

    public function delete(Request $request, $id)
    {
        OrderRepository::destroy($id);
        return redirect('admin/order/order/index');
    }
}