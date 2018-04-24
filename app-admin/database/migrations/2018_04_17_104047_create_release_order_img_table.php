<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReleaseOrderImgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('release_order_img', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('release_order_id')->comment('发布订单id');
            $table->string('img_path',255)->comment('图片路劲');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `release_order_img` comment'发布订单图片信息表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('release_order_img');
    }
}
