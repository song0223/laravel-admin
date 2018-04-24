<?php
return [
    '1'      => [
        1 => 'admin.index',
    ],
    //用户管理
    '地图管理'   => [
        '大地图'   => 'ceshi',
        '供应商地图' => 'coor',
        '仓库地图'  => 'ware',
    ],
    '用户管理'   => [
        '个人资料'    => 'admin.info.index',
        '管理员(用户)' => 'admin.usermember.index',
        '角色'      => 'admin.role.index',
        '权限'      => 'admin.permission.index',
        1         => 'permission.add',
        2         => 'permission.del',
        3         => 'permission.edit',
        4         => 'role.del',
        5         => 'role.edit',
        6         => 'admin.del',
        7         => 'admin.edit',
        8         => 'admin.add',
        9         => 'role.add',
    ],
    '会员管理'   => [
        '货主列表'     => 'admin.user.index',
        '承运商/司机列表' => 'admin.carriers-user.index',
        1          => 'admin.carriers-user.cert',
        2          => 'admin.user.address',
        3          => 'admin.carriers-user.address',
        4          => 'admin.user.change-audit',
        5          => 'admin.user.change-status',
        6          => 'admin.carriers-user.change-status',
        7          => 'admin.carriers-user.change-audit',
        8          => 'admin.carriers-user.update-sd',
        9          => 'admin.user.cert',
    ],
    '基础信息管理' => [
        '车辆信息列表' => 'admin.basic-info.vehicle-info.index',
    ],
    '订单管理'   => [
        '发布订单列表' => 'admin.order.release-order.index',
        '订单列表'   => 'admin.order.order.index',
        '订单异常列表' => 'admin.order.order-abnormal.index',
    ],
    '基础设置'   => [
        '货物品类设置'    => 'cate.index',
        '订单异常/取消设置' => 'cancel.index',
        '保证金设置'     => 'cancel.m_index',
        1           => 'cancel.add',
        2           => 'cancel.del',
        3           => 'cancel.edit',
        4           => 'cancel.m_add',
        5           => 'cancel.m_del',
        6           => 'cancel.m_edit',
        7           => 'cate.edit',
        8           => 'cate.del',
        9           => 'cate.add',
    ],

    '温控管理' => [
        '车辆温控' => 'control.index',
        '异常温控' => 'abnormal.index',


    ],

    '财务管理' => [
        '缴纳保证金列表'  => 'admin.order.deposit.index',
        '账户资金明细列表' => 'admin.order.money-detail.index',
    ],

];
