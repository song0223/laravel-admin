<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYyUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yy_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',100)->comment('姓名');
            $table->string('user_tel',30)->comment('手机号');
            $table->string('password',255)->comment('密码');
            $table->string('province',20)->comment('省');
            $table->string('city',20)->comment('市');
            $table->string('area',20)->comment('区');
            $table->string('address',100)->comment('详细地址');
            $table->string('scope',200)->comment('经营范围');
            $table->string('tax_num',100)->comment('纳税人识别号');
            $table->string('reg_address',150)->comment('公司注册地址');
            $table->string('bank',100)->comment('公司开户银行');
            $table->string('license',100)->comment('公司营业执照');
            $table->string('email',100)->comment('用户邮箱');
            $table->tinyInteger('user_type')->default(0)->comment('会员类型(0货主)');
            $table->tinyInteger('is_cert')->default(0)->comment('是否认证(0否1是)');
            $table->tinyInteger('is_audit')->default(0)->comment('审核状态(0审核中1通过2未通过)');
            $table->string('not_through',255)->comment('未通过理由');
            $table->tinyInteger('user_source')->default(0)->comment('会员来源(0pc1微信3QQ4app)');
            $table->tinyInteger('is_type')->default(0)->comment('用户状态(0启用1禁用)');
            $table->dateTime('reg_time')->comment('注册时间');
            $table->string('reg_tel',20)->comment('公司注册电话');
            $table->integer('credibility')->comment('用户信誉度');
            $table->integer('user_score')->comment('用户积分');
            $table->string('shorthand',100)->comment('公司简写');
            $table->enum('sex', ['男','女','']);
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `yy_user` comment'货主会员表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yy_user');
    }
}
