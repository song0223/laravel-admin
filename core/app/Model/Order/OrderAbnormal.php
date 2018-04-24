<?php

namespace App\Model\Order;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class OrderAbnormal extends Model
{
    use SoftDeletes;

    protected $table = 'yy_order_abnormal';

    protected $fillable = ['order_id', 'abnormal_type', 'note', 'deal', 'deal_time', 'is_type'];


    /**
     *  是否异常
     */
    const YES = 1;
    const NO = 2;

    public static function isTypeMap($key = null)
    {
        $items = [
            self::YES => '是',
            self::NO  => '否',
        ];
        return get_items($items, $key);
    }

    /**
     *  异常
     */
    const WZS = 1;
    const CH = 2;
    const HZBZ = 3;

    public static function abnormalTypeMap($key = null)
    {
        $items = [
            self::WZS  => '未准时',
            self::CH   => '车祸',
            self::HZBZ => '货主不在',
        ];
        return get_items($items, $key);
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }
}
