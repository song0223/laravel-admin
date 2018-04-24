<?php

namespace App\Model\BasicInfo;

use App\Model\CarriersUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class YyVehicleInfo extends Model
{
    use SoftDeletes;

    protected $table = 'yy_vehicleinfo';

    protected $fillable = ['carriers_id', 'conductor', 'load', 'area', 'vehicle_num', 'uuid', 'type', 'state', 'order_num', 'driver_name'];


    /**
     *  入库类型
     */
    const X = 1;
    const T = 2;
    const D = 3;

    public static function stateMap($key = null)
    {
        $items = [
            self::X => '行',
            self::T => '停',
            self::D => '怠',
        ];
        return get_items($items, $key);
    }

    public function carriers()
    {
        return $this->hasOne(CarriersUser::class, 'id', 'carriers_id');
    }
}
