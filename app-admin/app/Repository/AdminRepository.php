<?php

namespace App\Admin\Repository;
class AdminRepository
{
    /**
     * 显示dashborad页面的数据
     * @return \Illuminate\Support\Collection
     */
    public function rdashboard()
    {
        return $collects = collect(
            [
                [
                    'count' => '地图管理',
                    'title' => 'Map Management',
                    'sup'   => '人',
                    'icon'  => 'ion-person-add',
                    'bck'   => 'bg-aqua',
                    'url'   => '/ceshi',
                ],
                [
                    'count' => '用户管理',
                    'title' => 'User Management',
                    'sup'   => '篇',
                    'icon'  => 'ion-document',
                    'bck'   => 'bg-green',
                    'url'   => '/admin/usermember/index',
                ],
                [
                    'count' => '会员管理',
                    'title' => 'Member Management',
                    'sup'   => '个',
                    'icon'  => 'ion-videocamera',
                    'bck'   => 'bg-purple',
                    'url'   => '/admin/user/index',
                ],
                [
                    'count' => '基础信息管理',
                    'title' => 'Basic Information Management',
                    'sup'   => '个',
                    'icon'  => 'ion-film-marker',
                    'bck'   => 'bg-yellow',
                    'url'   => '/admin/basic-info/vehicle-info/index',
                ],
                [
                    'count' => '订单管理',
                    'title' => 'Order Management',
                    'sup'   => '条',
                    'icon'  => 'ion-document',
                    'bck'   => 'bg-red',
                    'url'   => '/admin/order/order/index',
                ],
                [
                    'count' => '基础设置',
                    'title' => 'Basic Setting',
                    'sup'   => '条',
                    'icon'  => 'ion-android-textsms',
                    'bck'   => 'bg-orange',
                    'url'   => '/cate/index',
                ],
                [
                    'count' => '温控管理',
                    'title' => 'Temperature Management',
                    'sup'   => '条',
                    'icon'  => 'ion-pricetags',
                    'bck'   => 'bg-olive',
                    'url'   => '/admin/control/index',
                ],
                [
                    'count' => '财务管理',
                    'title' => 'Finance Management',
                    'sup'   => '首',
                    'icon'  => 'ion-music-note',
                    'bck'   => 'bg-maroon',
                    'url'   => '/admin/finance/deposit/index',
                ],
            ]
        );
    }
}