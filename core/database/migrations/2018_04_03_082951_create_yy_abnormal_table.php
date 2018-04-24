<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYyAbnormalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yy_abnormal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('control_id')->comment('温控id');
            $table->string('vehicle_num',30)->comment('车牌号');
            $table->string('alarm_time',15)->comment('报警时长');
            $table->dateTime('alarm_start')->comment('报警开始时间');
            $table->dateTime('alarm_stop')->comment('报警结束时间');
            $table->string('alarm_start_place',150)->comment('报警开始地址');
            $table->string('alarm_stop_place',150)->comment('报警结束地址');
            $table->timestamps();
            $table->softDeletes();
           
        });
        DB::statement("ALTER TABLE `yy_abnormal` comment'温控异常表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yy_abnormal');
    }
}
