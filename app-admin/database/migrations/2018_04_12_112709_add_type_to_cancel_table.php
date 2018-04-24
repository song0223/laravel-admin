<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeToCancelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cancel', function (Blueprint $table) {
            $table->tinyInteger('type')->default(1)->comment('所属上级(1订单异常2订单取消)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cancel', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
