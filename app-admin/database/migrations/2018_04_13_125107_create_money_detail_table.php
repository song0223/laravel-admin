<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoneyDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('money_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('会员id');
            $table->string('phone',20)->comment('手机号');
            $table->tinyInteger('user_type')->default(null)->comment('会员类型(0货主1承运商2司机)');
            $table->decimal('bd_money',10,2)->comment('变动金额');
            $table->tinyInteger('pay_type')->default(null)->comment('付款方式(0支付宝1微信2余额3线下汇款)');
            $table->tinyInteger('change_type')->default(null)->comment('变动类型(0用户付款1用户充值2取消返回3资金冻结4扣除金额5违约罚金6余额提现7货主付款8保证金)');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `money_detail` comment'账户资金明细表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('money_detail');
    }
}
