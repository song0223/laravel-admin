<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYyOrderInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yy_order_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->comment('订单id');
            $table->string('goods_name',100)->comment('货品名称');
            $table->string('goods_img',255)->comment('货品图片');
            $table->string('goods_spe',100)->comment('货品规格');
            $table->tinyInteger('goods_type')->default(0)->comment('货品类型(0冷藏1冷冻2常温)');
            $table->decimal('goods_weight',10,2)->comment('货品重量');
            $table->decimal('goods_price',10,2)->comment('货品单价');
            $table->decimal('goods_total_price',10,2)->comment('货品总价');
            $table->integer('goods_num')->comment('货品数量');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `yy_order_info` comment'订单详情表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yy_order_info');
    }
}
