<?php

namespace App\Admin\Http\Controllers\Admin;

use App\Admin\Http\Controllers\BaseController;
use App\Admin\Repository\AdminRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Admin\Repository\Admin\AbnormalRepository;
use App\Model\YyAbnormal;
use DB;
use Bacao\Alert\Alert;

class AbnormalController extends BaseController
{

  public $admin;

    /**
     * AdminController constructor.
     * @param AdminRepository $admin
     */
  public function __construct(AdminRepository $admin)
  {
      $this->admin = $admin;

  }


  //车辆温控列表
  public function index(Request $request)
  {
    $data = [];
    $control = new YyAbnormal();
    $data = AbnormalRepository::index();
    $data['search_list'] = $this->getAppends($request->all());
    return $this->view('admin.abnormal.index', $data);
  }
  protected function getAppends($search_list)
  {
      return $search_list;
  }

  
    
}
