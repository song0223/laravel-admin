<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



/**
 * App\Model\YyUser
 *
 * @mixin \Eloquent
 */
class YyAbnormal extends Model
{
    use SoftDeletes;

    protected $table = 'yy_abnormal';

    protected $fillable = ['id','control_id','vehicle_num','alarm_time','alarm_star','alarm_stop','alarm_start_place','alarm_stop_place'];


    

}
