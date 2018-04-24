<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDriverNameToYyVehicleinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('yy_vehicleinfo', function (Blueprint $table) {
            $table->string('driver_name', 50)->comment('司机姓名')->after('vehicle_num');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('yy_vehicleinfo', function (Blueprint $table) {
            $table->dropColumn('driver_name');
        });
    }
}
