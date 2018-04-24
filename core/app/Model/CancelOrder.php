<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CancelOrder extends Model
{
    use SoftDeletes;

    protected $table = 'cancel';

    protected $fillable = ['cancel_name', 'id', 'type'];

    /**
     *  订单问题类型
     */
    const YC = 1;//订单异常
    const QX = 2;//订单取消

    public static function typeMap($key = null)
    {
        $items = [
            self::YC => '订单异常',
            self::QX => '订单取消',
        ];
        return get_items($items, $key);
    }


}

