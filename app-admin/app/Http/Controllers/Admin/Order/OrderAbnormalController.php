<?php

namespace App\Admin\Http\Controllers\Admin\Order;

use App\Admin\Http\Controllers\BaseController;
use App\Model\Order\Order;
use App\Model\Order\OrderAbnormal;
use App\Admin\Repository\Admin\Order\OrderAbnormalRepository;
use App\Admin\Repository\Admin\Order\OrderRepository;
use Illuminate\Http\Request;

class OrderAbnormalController extends BaseController
{

    public function index(Request $request)
    {
        $data = [];
        $order = new OrderAbnormal();
        $data = OrderAbnormalRepository::index();
        $data['search_list'] = $this->getAppends($request->all());
        return $this->view('admin.order.order-abnormal.index', $data);
    }


    protected function getAppends($search_list)
    {
        return $search_list;
    }

    public function delete(Request $request, $id)
    {
        OrderRepository::destroy($id);
        return redirect('admin/order/order-abnormal/index');
    }
}