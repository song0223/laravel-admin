<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsPayToYyOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('yy_order', function (Blueprint $table) {
            $table->tinyInteger('is_pay')->default(0)->comment('是否付款(0未付款1已付款)');
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
            $table->dropColumn('is_pay');
        });
    }
}
