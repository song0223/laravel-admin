<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReleaseOrderTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('release_order_time', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('release_id')->comment('发布订单id');
            $table->dateTime('re_time')->comment('配送时间');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `release_order_time` comment'长期订单日期明细表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('release_order_time');
    }
}
