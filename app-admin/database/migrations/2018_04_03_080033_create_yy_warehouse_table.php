<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYyWarehouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yy_warehouse', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('公司id');
            $table->integer('inventory')->comment('库存总量');
            $table->integer('used_inventory')->comment('已用库存');
            $table->integer('area')->comment('区域');
            $table->integer('number')->comment('仓库编号');
            $table->string('ware_name',100)->comment('仓库名');
            $table->string('ware_address',200)->comment('仓库地址');
            $table->dateTime('add_time')->comment('时间');
            $table->tinyInteger('ware_type')->default(0)->comment('仓库类型(0冷藏1冷冻2常温)');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `yy_warehouse` comment'仓库表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yy_warehouse');
    }
}
