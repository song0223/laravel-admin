<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsAbnormalToYyOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('yy_order', function (Blueprint $table) {
            $table->tinyInteger('is_abnormal')->default(0)->comment('是否异常(0否1是)');
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
            $table->dropColumn('is_abnormal');
        });
    }
}
