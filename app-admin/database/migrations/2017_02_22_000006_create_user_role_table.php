<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_role', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->default(0)->comment('用户ID');
            $table->bigInteger('role_id')->default(0)->comment('角色ID');
            $table->timestamps();
            $table->softDeletes();
        });
         DB::statement("ALTER TABLE `user_role` comment'用户角色表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_role');
    }
}
