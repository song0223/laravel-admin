<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYyVehicleinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yy_vehicleinfo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('carriers_id')->comment('承运商id');
            $table->integer('conductor')->comment('车辆长度');
            $table->integer('load')->comment('载重');
            $table->integer('area')->comment('车箱面积');
            $table->string('vehicle_num',30)->comment('车牌号');
            $table->string('uuid',50)->comment('设备号');
            $table->string('type',50)->comment('车厢类型');
            $table->string('place',100)->comment('车辆坐标');
            $table->dateTime('gps_time')->comment('GPS时间');
            $table->tinyInteger('state')->default(0)->comment('入库类型(0停1行2怠)');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `yy_vehicleinfo` comment'车辆信息表'"); // 表注释

        Schema::table('yy_vehicleinfo', function ($table) {
            $table->dropColumn(['place','gps_time']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yy_vehicleinfo');
    }
}
