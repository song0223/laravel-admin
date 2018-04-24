<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsTypeToYyOrderAbnormalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('yy_order_abnormal', function (Blueprint $table) {
            $table->tinyInteger('is_type')->default(0)->comment('异常状态(0否1是)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('yy_order_abnormal', function (Blueprint $table){
            $table->dropColumn('is_type');
        });
    }
}
