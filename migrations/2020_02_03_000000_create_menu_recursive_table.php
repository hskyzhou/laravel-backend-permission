<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateMenuRecursiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_recursives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('menu_id');
            $table->unsignedInteger('parent_menu_id');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `menu_recursives` comment '菜单关系表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_recursives');
    }
}
