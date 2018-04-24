<?php

namespace App\Model;

use App\Model\Area\Area;
use App\Model\Area\City;
use App\Model\Area\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Address extends Model
{
    use SoftDeletes;

    protected $table = 'address';

    protected $fillable = ['user_id', 'phone', 'name', 'province_id', 'city_id', 'area_id', 'address', 'is_type', 'start', 'type'];


    /**
     *  所属类型
     */
    const HZ = 1;//货主
    const CJ = 2;//司机承运商

    public static function userTypeMap($key = null)
    {
        $items = [
            self::HZ => '货主',
            self::CJ => '司机/承运商',
        ];
        return get_items($items, $key);
    }

    /**
     * 是否默认
     */
    const YES = 1;
    const NO = 2;

    public static function typeMap($key = null)
    {
        $items = [
            self::YES => '是',
            self::NO  => '否',
        ];
        return get_items($items, $key);
    }

    /**
     * 状态
     */
    const ENABLE = 1;
    const DISABLE = 2;

    public static function statusMap($key = null)
    {
        $items = [
            self::ENABLE  => '取货地址',
            self::DISABLE => '收货地址',
        ];
        return get_items($items, $key);
    }

    public function province()
    {
        return $this->hasOne(Province::class, 'province_id', 'province_id');
    }

    public function city()
    {
        return $this->hasOne(City::class, 'city_id', 'city_id');
    }

    public function area()
    {
        return $this->hasOne(Area::class, 'area_id', 'area_id');
    }
}
