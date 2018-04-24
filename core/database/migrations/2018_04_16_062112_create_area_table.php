<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 32)->default('')->comment('名称');
            $table->string('area_id', 8)->comment();
            $table->string('city_id', 8)->comment();
        });
        DB::statement("ALTER TABLE `area` comment'区域表'"); // 表注
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area');
    }
}
