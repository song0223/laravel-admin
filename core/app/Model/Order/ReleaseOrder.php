<?php

namespace App\Model\Order;

use App\Model\CarriersUser;
use App\Model\YyUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ReleaseOrder extends Model
{
    use SoftDeletes;

    protected $table = 'release_order';

    protected $fillable = ['user_id', 'order_number', 'phone', 'good_name', 'good_num', 'good_type', 'good_img', 'q_add_id', 'q_name', 'q_tel', 'q_time', 's_add_id', 's_name', 's_tel', 'is_type', 'desc', 'not_through', 'is_start', 'reason_id'];


    /**
     *  货品类型
     */
    const LC = 1;
    const LD = 2;
    const WK = 3;

    public static function goodTypeMap($key = null)
    {
        $items = [
            self::LC => '冷藏',
            self::LD => '冷冻',
            self::WK => '常温',
        ];
        return get_items($items, $key);
    }

    /**
     *  审核状态
     */
    const IN = 1;
    const LIT = 2;
    const NOT = 3;

    public static function typeMap($key = null)
    {
        $items = [
            self::IN  => '审核中',
            self::LIT => '审核通过',
            self::NOT => '未通过',
        ];
        return get_items($items, $key);
    }

    public function users()
    {
        return $this->hasOne(YyUser::class, 'id', 'user_id');
    }
}
