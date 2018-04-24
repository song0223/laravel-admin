<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYyControlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yy_control', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('承运商id');
            $table->string('vehicle_num',20)->comment('车牌号');
            $table->decimal('cold_c',10,2)->comment('冷藏');
            $table->decimal('cold_d',10,2)->comment('冷冻');
            $table->decimal('often_wen',10,2)->comment('常温');
            $table->dateTime('gps_time')->comment('GPS时间');
            $table->tinyInteger('is_abnormal')->default(0)->comment('是否异常(0正1异)');
            $table->decimal('min_wen',10,2)->comment('最低温度');
            $table->decimal('max_wen',10,2)->comment('最高温度');
            $table->decimal('flat_wen',10,2)->comment('平均温度');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::statement("ALTER TABLE `yy_control` comment'温控表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yy_control');
    }
}
