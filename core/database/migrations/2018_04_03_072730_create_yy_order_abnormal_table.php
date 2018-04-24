<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYyOrderAbnormalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yy_order_abnormal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->comment('订单id');
            $table->tinyInteger('abnormal_type')->default(0)->comment('订单异常(0未准时1车祸2货主不再)');
            $table->string('note',255)->comment('异常订单备注');
            $table->string('deal',50)->comment('处理人信息');
            $table->dateTime('deal_time')->comment('处理时间');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `yy_order_abnormal` comment'订单异常处理表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yy_order_abnormal');
    }
}
