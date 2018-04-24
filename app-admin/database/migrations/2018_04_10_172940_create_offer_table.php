<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_number',20)->comment('发布订单编号');
            $table->integer('user_id')->comment('承运商id');
            $table->string('phone',20)->comment('手机号');
            $table->decimal('money',10,2)->comment('出价金额');
            $table->tinyInteger('is_type')->default(1)->comment('是否成功(0否1是)');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `offer` comment'出价表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offer');
    }
}
