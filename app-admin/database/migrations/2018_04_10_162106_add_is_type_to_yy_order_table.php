<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsTypeToYyOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('yy_order', function (Blueprint $table) {
            $table->tinyInteger('is_type')->default(0)->comment('支付方式(0微信支付1支付宝支付)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('yy_order', function (Blueprint $table) {
            $table->dropColumn('is_type');
        });
    }
}
