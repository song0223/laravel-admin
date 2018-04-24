<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYyOrderTypeTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yy_order_type_time', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->comment('订单id');
            $table->integer('order_type')->comment('订单状态');
            $table->dateTime('type_time')->comment('订单状态变动时间');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `yy_order_type_time` comment'记录订单状态更改时间表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yy_order_type_time');
    }
}
