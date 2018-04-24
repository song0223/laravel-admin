<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYyWareAbnormalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yy_ware_abnormal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ware_id')->comment('仓库id');
            $table->string('alarm_time',20)->comment('报警时长');
            $table->dateTime('alarm_start')->comment('报警开始时间');
            $table->dateTime('alarm_stop')->comment('报警结束时间');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `yy_ware_abnormal` comment'仓库温控异常表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yy_ware_abnormal');
    }
}
