<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYyInboundTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yy_inbound', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ware_id')->comment('仓库id');
            $table->string('in_goods',100)->comment('入库商品名');
            $table->integer('in_num')->comment('入库数量');
            $table->dateTime('in_time')->comment('入库时间');
            $table->string('check_cargo',20)->comment('检货人');
            $table->tinyInteger('in_type')->default(0)->comment('入库类型(0冷藏1冷冻2常温)');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `yy_inbound` comment'入库表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yy_inbound');
    }
}
