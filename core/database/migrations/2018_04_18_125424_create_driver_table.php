<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriverTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('承运商id');
            $table->string('name',100)->comment('姓名');
            $table->string('phone',30)->comment('手机号');
            $table->string('vehicle_num',20)->comment('车牌号');
            $table->string('uuid',50)->comment('设备号');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `driver` comment'司机表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('driver');
    }
}
