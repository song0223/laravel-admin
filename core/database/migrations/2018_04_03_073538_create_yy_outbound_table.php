<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYyOutboundTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yy_outbound', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ware_id')->comment('仓库id');
            $table->string('out_goods',100)->comment('出库商品名');
            $table->integer('out_num')->comment('出库数量');
            $table->dateTime('out_time')->comment('出库时间');
            $table->string('check_cargo',50)->comment('检货人');
            $table->string('consignee',50)->comment('收货人');
            $table->tinyInteger('out_type')->default(0)->comment('出库类型(0冷藏1冷冻2常温)');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `yy_outbound` comment'出库表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yy_outbound');
    }
}
