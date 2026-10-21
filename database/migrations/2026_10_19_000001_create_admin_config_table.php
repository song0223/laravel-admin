<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table = config('admin.database_config.table', 'admin_config');

        if (! Schema::hasTable($table)) {
            Schema::create($table, function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->unique();
                $table->text('value');
                $table->string('description')->default('');
                $table->timestamps();
            });
        }

        $menuTable = config('admin.database.menu_table', 'admin_menu');

        if (Schema::hasTable($menuTable)
            && ! \Illuminate\Support\Facades\DB::table($menuTable)->where('uri', 'config')->exists()) {
            \Illuminate\Support\Facades\DB::table($menuTable)->insert([
                'parent_id'  => 0,
                'order'      => 9,
                'title'      => '数据库配置',
                'icon'       => 'fa-gears',
                'uri'        => 'config',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // intentionally keep data on rollback
    }
}
