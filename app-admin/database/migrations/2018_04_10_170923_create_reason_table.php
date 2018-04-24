<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReasonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reason', function (Blueprint $table) {
            $table->increments('id');
            $table->string('desc',255)->comment('理由描述');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `reason` comment'理由表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reason');
    }
}
