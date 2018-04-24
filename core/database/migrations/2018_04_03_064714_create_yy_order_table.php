<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYyOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yy_order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_num',20)->comment('订单号');
            $table->integer('cate_id')->comment('品类id');
            $table->integer('order_info_id')->comment('订单详情id');
            $table->integer('release_id')->comment('发布订单id');
            $table->string('phone',20)->comment('手机号');
            $table->tinyInteger('start')->default(0)->comment('订单状态(0未配送1开始配送2到达取货地3已取货4到达送货地5货主收货6配送完成)');
            $table->dateTime('order_time')->comment('下单时间');
            $table->decimal('money',10,2)->comment('订单价格');
            $table->string('vehicle_num',20)->comment('车牌号');
            $table->integer('carriers_id')->comment('承运商公司id');
            $table->string('str_name',20)->comment('收货人名字');
            $table->string('str_tel',20)->comment('收货人电话');
            $table->dateTime('delivery_time')->comment('发货时间');
            $table->dateTime('ps_time')->comment('货主要求配送时间');
            $table->string('str_start_address',200)->comment('发货地址');
            $table->string('str_address',200)->comment('收货地址');
            $table->tinyInteger('periodic')->default(0)->comment('周期性(0短(单配)1长)');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::statement("ALTER TABLE `yy_order` comment'订单表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yy_order');
    }
}
