<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('货主id');
            $table->string('phone',20)->comment('手机号');
            $table->string('name',50)->comment('姓名');
            $table->integer('province_id')->comment('省id');
            $table->integer('city_id')->comment('市id');
            $table->integer('area_id')->comment('区id');
            $table->string('address',50)->comment('详细地址');
            $table->tinyInteger('is_type')->default(0)->comment('是否默认(0否1是)');
            $table->tinyInteger('start')->default(0)->comment('地址状态(0取货地址1收货地址)');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `address` comment'用户地址表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address');
    }
}
