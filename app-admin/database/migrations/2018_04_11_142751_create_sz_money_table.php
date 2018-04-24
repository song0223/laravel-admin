<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSzMoneyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sz_money', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('money',10,2)->comment('押金金额');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `sz_money` comment'后台设置押金金额表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sz_money');
    }
}
