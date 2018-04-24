<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddYAmountToYyUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('yy_user', function (Blueprint $table) {
            $table->decimal('y_amount',10,2)->comment('余额');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('yy_user', function (Blueprint $table) {
            $table->dropColumn('y_amount');
        });
    }
}
