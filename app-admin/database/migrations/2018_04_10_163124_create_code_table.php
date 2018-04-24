<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('code', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('承运商id');
            $table->integer('user_code')->comment('承运商邀请码');
            $table->tinyInteger('type')->default(0)->comment('所属状态(0承运商1货主)');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `code` comment'注册码表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('code');
    }
}
