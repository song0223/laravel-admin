<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCancelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cancel_name',100)->comment('异常问题');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `cancel` comment'异常问题设置表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cancel');
    }
}
