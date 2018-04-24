<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReleaseOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('release_order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('货主id');
            $table->integer('cate_id')->comment('品类id');
            $table->string('order_number',20)->comment('发布订单编号');
            $table->string('phone',20)->comment('手机号');
            $table->string('good_name',50)->comment('货品名称');
            $table->string('good_num',50)->comment('货品数量');
            $table->decimal('good_weight',10,2)->comment('货品重量');
            $table->tinyInteger('good_type')->default(0)->comment('温控类型(0冷藏1冷冻2温控)');
            $table->string('good_img',255)->comment('货品图片');
            $table->string('q_province',20)->comment('取货-省');
            $table->string('q_city',20)->comment('取货-市');
            $table->string('q_area',20)->comment('取货-区');
            $table->string('q_address',100)->comment('取货-详细地址');
            $table->string('q_name',50)->comment('联系人名字');
            $table->string('q_tel',50)->comment('联系人电话');
            $table->dateTime('q_time')->comment('取货时间');
            $table->string('s_province',20)->comment('收货-省');
            $table->string('s_city',20)->comment('收货-市');
            $table->string('s_area',20)->comment('收货-区');
            $table->string('s_address',100)->comment('收货-详细地址');
            $table->string('s_name',50)->comment('收获人名字');
            $table->string('s_tel',50)->comment('收获人电话');
            $table->tinyInteger('is_type')->default(0)->comment('审核状态(0审核中1已审核2未通过)');
            $table->string('desc',255)->comment('备注信息');
            $table->string('not_through',255)->comment('未通过理由');
            $table->tinyInteger('is_start')->default(0)->comment('发布订单状态(0等待出价1选择伙伴2订单取消)');
            $table->integer('reason_id')->comment('取消理由');
            $table->tinyInteger('periodic')->default(0)->comment('周期性(0短(单配)1长)');
            $table->string('box_g',100)->comment('箱/规(长/宽/高)');
            $table->tinyInteger('type_way')->default(0)->comment('结算方式(0全款1周付2月付)');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `release_order` comment'货主发布订单表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('release_order');
    }
}
