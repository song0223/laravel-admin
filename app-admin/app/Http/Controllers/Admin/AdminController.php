<?php

namespace App\Admin\Http\Controllers\Admin;

use App\Admin\Http\Controllers\BaseController;
use App\Admin\Repository\AdminRepository;

class AdminController extends BaseController
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

    /**
     * 显示后台首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $collects = $this->admin->rdashboard();
        return $this->view('admin.dashboard.index', compact('collects'));
    }
}