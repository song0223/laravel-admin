<?php

namespace App\Model\Order;

use App\Model\YyUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
    use SoftDeletes;

    protected $table = 'yy_order';

    protected $fillable = ['order_num', 'order_info_id', 'release_id', 'phone', 'start', 'order_time', 'money', 'vehicle_num', 'carriers_id', 'str_name', 'str_tel', 'delivery_time', 'str_start_address', 'str_address', 'is_pay', 'is_type', 'is_abnormal'];


    /**
     *  订单状态
     */
    const WPS = 1;
    const KSPS = 2;
    const DDQHD = 3;
    const YQH = 4;
    const DDSHD = 5;
    const HZSH = 6;
    const PSWC = 7;
    const QX = 8;

    public static function statusMap($key = null)
    {
        $items = [
            self::WPS   => '未配送',
            self::KSPS  => '开始配送',
            self::DDQHD => '到达取货地',
            self::YQH   => '已取货',
            self::DDSHD => '到达送货地',
            self::HZSH  => '货主收货',
            self::PSWC  => '配送完成',
            self::QX    => '取消订单',
        ];
        return get_items($items, $key);
    }

    /**
     *  付款状态
     */
    const YFK = 1;
    const NOT = 2;

    public static function isPayMap($key = null)
    {
        $items = [
            self::YFK => '已付款',
            self::NOT => '未付款',
        ];
        return get_items($items, $key);
    }

    /**
     *  支付方式
     */
    const WX = 1;
    const ZFB = 2;

    public static function payTypeMap($key = null)
    {
        $items = [
            self::WX  => '微信支付',
            self::ZFB => '支付宝支付',
        ];
        return get_items($items, $key);
    }

    /**
     *  是否异常
     */
    const YES = 1;
    const NO = 2;

    public static function isAbnormalMap($key = null)
    {
        $items = [
            self::YES => '是',
            self::NO  => '否',
        ];
        return get_items($items, $key);
    }

    public function users()
    {
        return $this->hasOne(YyUser::class, 'id', 'user_id');
    }

    public function orderInfo()
    {
        return $this->hasOne(OrderInfo::class, 'id', 'order_info_id');
    }

    public function releaseOrder()
    {
        return $this->hasOne(ReleaseOrder::class, 'id', 'release_id');
    }
}
