<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('permission_id')->default(0)->comment('权限ID');
            $table->string('name', 50)->default('')->comment('角色名称');
            $table->string('desc')->default('')->copmment('描述');
            $table->timestamps();
            $table->softDeletes();
        });
         DB::statement("ALTER TABLE `role` comment'角色表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('role');
    }
}
