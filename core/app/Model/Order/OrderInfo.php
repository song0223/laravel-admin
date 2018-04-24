<?php

namespace App\Model\Order;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class OrderInfo extends Model
{
    use SoftDeletes;

    protected $table = 'yy_order_info';

    protected $fillable = ['order_id', 'goods_name', 'goods_spe', 'goods_type', 'goods_weight', 'goods_price', 'goods_total_price', 'goods_num'];

}
