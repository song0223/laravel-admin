<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\YyUser;
use App\Model\Order\Order;
use App\Model\BasicInfo\YyVehicleInfo;


/**
 * App\Model\YyUser
 *
 * @mixin \Eloquent
 */
class YyControl extends Model
{
    use SoftDeletes;

    protected $table = 'yy_control';

    protected $fillable = ['id','user_id','vehicle_num','cold_c','cold_d','often_wen','is_abnormal','min_wen','max_wen','flat_wen','company_name','uuid','order_num'];

    /**
     *  订单问题类型
     */
    const ZC = 1;//温度正常
    const YC = 2;//温度异常

    public static function typeMap($key = null)
    {
        $items = [
            self::ZC  => '温度正常',
            self::YC  => '温度异常',
        ];
        return get_items($items, $key);
    }

    public function users()
    {
        return $this->hasOne(YyUser::class, 'id', 'user_id');
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'yy_order.vehicle_num', 'yy_control.vehicle_num');
    }

    public function vehicleinfo()
    {
        return $this->hasOne(YyVehiceInfo::class, 'vehicle_num', 'vehicle_num');
    }
    

}
