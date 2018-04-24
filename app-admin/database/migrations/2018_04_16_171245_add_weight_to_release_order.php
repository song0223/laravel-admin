<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWeightToReleaseOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('release_order', function (Blueprint $table) {
            $table->decimal('weight',10,2)->comment('货物重量');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('release_order', function (Blueprint $table) {
             $table->dropColumn('weight');
        });
    }
}
